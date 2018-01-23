<?php
	/*
	Template Name: Home
    */
    ?>

		<?php get_header(); ?>

		<content class="tcc">
			<magazine class="container">

					<?php 
						//Set a counter to check for the most recent post
						query_posts('category_name=journal,blog');
						$story_count = 0; 
					?>
					
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						<?php 
							$post_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array(300,195) );
							$sticky_post_class= "";
							$post_css_classes = "post-".get_the_ID();

							if ($story_count == 0) {
								$post_css_classes .= " latest";
								$sticky_post_class .= " latest";
							}							
						?>

						<span class="anchor" id="anchor-<?php the_ID(); ?>"></span>
						<hometile class="<?php echo $post_css_classes ?> cbox" data-ajax-post="true" >
							<hometiletags><p><?php the_tags('','&nbsp;',''); ?></p></hometiletags>
							<hometiletitle><p><a href="<?php the_permalink() ?>" data-postid="<?php the_ID(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p></hometiletitle>
							<hometileauthortime><p><?php the_time('F j, Y'); ?> : <?php the_time('g:i a'); ?></p></hometileauthortime>
							<hometileexrpt><?php the_excerpt(); ?></hometileexrpt>
						</hometile>
					
						<?php $story_count++; ?>

					<?php endwhile; else: ?>
						<p>Sorry, no posts matched your criteria.</p>
					<?php endif; ?>
	
			</magazine>

			<!--<div class="col-sm-2 hidden-xs" id="sidebar">
				<ul>
					<li></li>
					<li>
						<h2><?php _e('Archives'); ?></h2>
							<ul>
								<?php wp_get_archives('type=monthly'); ?>
							</ul>
					</li>
				</ul>
			</div> -->
		</content>

		<?php get_footer(); ?>
</body>
</html>