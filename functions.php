<?php
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

?>