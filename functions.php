<?php
/** Add Thumbnail feature to theme.
  */
  add_theme_support( 'post-thumbnails' );

/** Register menus.
  */
  register_nav_menus( array( 
          'hamburger' => 'Hamburger menu', 
          'desktop' => 'Desktop menu',
          'footer' => 'Footer menu' 
        ) );


/** Enqueue scripts and styles.
  */
  function mohapatra_in_scripts() {
    wp_enqueue_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', false ,'4.5.0' );	// Add iconset, used in the main stylesheet.
    wp_enqueue_style( 'mohapatra-in-style', get_stylesheet_uri() );		// Add our main stylesheet.
  }
  add_action( 'wp_enqueue_scripts', 'mohapatra_in_scripts' );


/** Add Grid layout options to Posts with add_meta_box() .
  */

  function add_post_grid_layout_options() {
      add_meta_box( 'post-grid-layout', 'SimpleGrid Post Layout Options' , 'post_grid_layout_options_callback', 'post', 'side', 'high', null );
  }
  add_action( 'add_meta_boxes', 'add_post_grid_layout_options' );

  function post_grid_layout_options_callback( $post ) {

    wp_nonce_field( basename(__FILE__), "simplegrid-nonce" );

    ?>
        <div>
          <style>
              .simplegrid-tile-shape {width: 3em;display: inline-block;}
              .simplegrid-tile-shape img{width: 75%;}
              .simplegrid-tile-shape > input[type="radio"] {
                  visibility: hidden;
                  position: absolute;
              }
              .simplegrid-tile-shape > input[type="radio"] + label > img {
                  cursor: pointer;
                  box-shadow: none;
              }
              .simplegrid-tile-shape > input[type="radio"]:checked + label > img {
                  box-shadow:0px 0px 15px #333;                
              }
          </style>

          <?php 
              $tile_color = get_post_meta($post->ID, "simplegrid-tile-color", true);
              if ( $tile_color == "" ) { $tile_color = "#ffffff"; }
              $tile_shape = get_post_meta($post->ID, "simplegrid-tile-shape", true);
              if ( $tile_shape == "" ) { $tile_shape = "regular"; }
              ?>


          <p>Tile Color:</p>
          <label for="simplegrid-tile-color"> </label>
          <input name="simplegrid-tile-color" type="color" value="<?php echo $tile_color; ?>" />

          <br/>

          <p>Tile Shape:</p>
          <div>
            <span class="simplegrid-tile-shape"><input name="simplegrid-tile-shape" id="shape-xy" type="radio" value="regular" <?php if ( $tile_shape == "regular") { ?>checked="checked"<?php } ?> /><label for="shape-xy"><img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/images/meta-box-xy.svg"/></label></span>
            <span class="simplegrid-tile-shape"><input name="simplegrid-tile-shape" id="shape-2xy" type="radio" value="double-horizontal" <?php if ( $tile_shape == "double-horizontal") { ?>checked="checked"<?php } ?> /><label for="shape-2xy"><img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/images/meta-box-2xy.svg"/></label></span>
            <span class="simplegrid-tile-shape"><input name="simplegrid-tile-shape" id="shape-x2y" type="radio" value="double-vertical" <?php if ( $tile_shape == "double-vertical") { ?>checked="checked"<?php } ?> /><label for="shape-x2y"><img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/images/meta-box-x2y.svg"/></label></span>
            <span class="simplegrid-tile-shape"><input name="simplegrid-tile-shape" id="shape-2x2y" type="radio" value="double-both" <?php if ( $tile_shape == "double-both") { ?>checked="checked"<?php } ?> /><label for="shape-2x2y"><img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/images/meta-box-2x2y.svg"/></label></span>
          </div>

        </div>
    <?php  
  }

  function commit_post_grid_options( $post_id, $post, $update ) {

    if ( !isset($_POST["simplegrid-nonce"]) || !wp_verify_nonce($_POST["simplegrid-nonce"], basename(__FILE__)))
      return $post_id;
    
    if(!current_user_can("edit_post", $post_id))
      return $post_id;

    if( defined("DOING_AUTOSAVE") && DOING_AUTOSAVE )
      return $post_id;

    $slug = "post";
    if($slug != $post->post_type)
          return $post_id;

    $simplegrid_tile_color = "";
    $simplegrid_tile_shape = "";

    if( isset($_POST[ "simplegrid-tile-color" ]))
    { 
        $simplegrid_tile_color = $_POST[ "simplegrid-tile-color" ];
    }   
    update_post_meta($post_id, "simplegrid-tile-color", $simplegrid_tile_color );

    if( isset($_POST[ "simplegrid-tile-shape" ]))
    {
        $simplegrid_tile_shape = $_POST["simplegrid-tile-shape"];
    }   
    update_post_meta($post_id, "simplegrid-tile-shape", $simplegrid_tile_shape );
    
  }
  add_action( "save_post", "commit_post_grid_options", 10, 3 );

?>