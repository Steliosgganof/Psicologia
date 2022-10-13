<?php
/**
* Adore Themes Customizer
*
* @package Adore Blog
*
* Primary Slider section
*/

$wp_customize->add_section(
	'adore_blog_primary_slider_section',
	array(
		'title' 	=> esc_html__( 'Primary Slider', 'blogin' ),
		'panel' 	=> 'adore_blog_frontpage_panel',
		'priority'	=> 35,
	)
);

// Primary Slider enable settings
$wp_customize->add_setting(
	'blogin_primary_slider_enable',
	array(
		'default'			=> 'disable',
		'sanitize_callback' => 'adore_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'blogin_primary_slider_enable',
	array(
		'section'		=> 'adore_blog_primary_slider_section',
		'label'			=> esc_html__( 'Content type:', 'blogin' ),
		'description'	=> esc_html__( 'Choose where you want to render the content from.', 'blogin' ),
		'type'			=> 'select',
		'choices'		=> array( 
			'disable'		=> esc_html__( '--Disable--', 'blogin' ),
			'post'			=> esc_html__( 'Post', 'blogin' ),
		)
	)
);

// Primary Slider title settings
$wp_customize->add_setting(
	'blogin_primary_slider_title',
	array(
		'default'			=>  __('Primary Slider', 'blogin'),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'blogin_primary_slider_title',
	array(
		'label'				=> esc_html__( 'Section Title:', 'blogin' ),		
		'section'			=> 'adore_blog_primary_slider_section',
		'active_callback'	=> 'blogin_if_primary_slider_enabled',

	)
);

$wp_customize->selective_refresh->add_partial( 
	'blogin_primary_slider_title', 
	array(
		'selector'				=> '#primary-slider-section h2.section-title',
		'settings'				=> 'blogin_primary_slider_title',
		'container_inclusive'	=> false,
		'fallback_refresh'		=> true,
		'render_callback'		=> 'blogin_primary_slider_partial_title',
	) 
);

for ($i=1; $i <= 3; $i++) { 
// Primary Slider post setting
	$wp_customize->add_setting(
		'blogin_primary_slider_post_'.$i,
		array(
			'sanitize_callback' => 'adore_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'blogin_primary_slider_post_'.$i,
		array(
			'label'				=> sprintf( esc_html__( 'Post %d', 'blogin' ), $i ),
			'section'			=> 'adore_blog_primary_slider_section',
			'active_callback'	=> 'blogin_if_primary_slider_enabled',
			'type'				=> 'select',
			'choices'			=> adore_blog_get_post_choices(),
		)
	);

}

// Primary Slider button settings
$wp_customize->add_setting(
	'blogin_primary_slider_button_label',
	array(	
		'default'			=> esc_html__( 'View All', 'blogin' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'blogin_primary_slider_button_label',
	array(
		'label'				=> __('Button Label', 'blogin'),  
		'section'			=> 'adore_blog_primary_slider_section',   		
		'type'				=> 'text',
		'active_callback'	=> 'blogin_if_primary_slider_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'blogin_primary_slider_button_label', 
	array(
		'selector'            => '#primary-slider-section .show-more a',
		'settings'            => 'blogin_primary_slider_button_label',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'blogin_primary_slider_partial_button',
	) 
);

// Primary Slider button url settings
$wp_customize->add_setting(
	'blogin_primary_slider_button_url',
	array(
		'default'			=> '#',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'blogin_primary_slider_button_url',
	array(
		'label'				=> esc_html__( 'Button Url', 'blogin' ),
		'section'			=> 'adore_blog_primary_slider_section',
		'type'				=> 'url',
		'active_callback'	=> 'blogin_if_primary_slider_enabled',
	)
);

/*========================Active Callback==============================*/
function blogin_if_primary_slider_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'blogin_primary_slider_enable' )->value();
}

/*========================Partial Refresh==============================*/
function blogin_primary_slider_partial_button() {
	return esc_html( get_theme_mod( 'blogin_primary_slider_button_label' ) );
}
function blogin_primary_slider_partial_title() {
	return esc_html( get_theme_mod( 'blogin_primary_slider_title' ) );
}