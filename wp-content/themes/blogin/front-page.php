<?php
/**
 * The front page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogin
 */

get_header(); 

if ( adore_blog_is_latest_posts() ) {

	require get_home_template();

} elseif ( adore_blog_is_frontpage() ) {

	$sorted_sections = array( 'slider', 'posts-carousel', 'main-content-section', 'latest-posts', 'subscription' );

	foreach ( $sorted_sections as $sorted_section ) {

		if ( in_array( $sorted_section, array( 'slider', 'posts-carousel', 'main-content-section', 'latest-posts' ) ) ) {

			require get_theme_file_path() . '/inc/frontpage-sections/' . $sorted_section . '.php';

		} else {

			require get_template_directory() . '/inc/frontpage-sections/' . $sorted_section. '.php';
		}

	}

}

get_footer();