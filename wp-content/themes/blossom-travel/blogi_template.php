<?php
/**
 * Template name: Blogi
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blossom_Travel
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main-blogi">
	
			<?php
						
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 100,
				'orderby' => array( 'date' => 'DESC'),		
			);
			
			// The Query
			$the_query = new WP_Query( $args );
			 
			// The Loop
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post(); 
					
					$url 		= get_permalink();
					$title		= get_the_title();
					$category	= get_the_category( $id )[0]->name;
					
					echo '<hr>';
					echo "<a href='$url'>'$title'</a>";
					echo '<span><span>  </span>'. get_the_category( $id )[0]->name .'</span>';
				}				
			} else {
				// no posts found
			}
			/* Restore original Post Data */	
			
			?>

		</div><!-- #main -->
	</section><!-- #primary -->

<?php

get_sidebar();
get_footer();
