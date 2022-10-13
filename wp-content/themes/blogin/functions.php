<?php

if ( ! function_exists( 'blogin_enqueue_styles' ) ) :

	function blogin_enqueue_styles() {
		
		wp_enqueue_style( 'blogin-style-parent', get_template_directory_uri() . '/style.css' );

		wp_enqueue_style( 'blogin-style', get_stylesheet_directory_uri() . '/style.css', array( 'blogin-style-parent' ), '1.0.0' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'blogin_enqueue_styles', 99 );

function blogin_customize_control_style() {
	wp_enqueue_style( 'blogin-customize-controls', get_theme_file_uri() . '/customize-controls.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'blogin_customize_control_style' );

function blogin_customize_register( $wp_customize ) {

	//customizer section
	require get_theme_file_path() . '/inc/customizer/frontpage-customizer/primary-slider.php';
	require get_theme_file_path() . '/inc/customizer/frontpage-customizer/trending.php';
	require get_theme_file_path() . '/inc/customizer/frontpage-customizer/latest-posts.php';
}
add_action( 'customize_register', 'blogin_customize_register' );