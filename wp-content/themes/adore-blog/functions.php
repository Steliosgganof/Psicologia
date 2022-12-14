<?php
/**
 * Adore Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Adore Blog
 */

if ( ! function_exists( 'adore_blog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function adore_blog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Adore Blog, use a find and replace
		 * to change 'adore-blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'adore-blog' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'register_block_style' );

		add_theme_support( 'register_block_pattern' );

		add_theme_support( 'responsive-embeds' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		
		add_image_size( 'adore-blog-home-blog', 400, 300, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'adore-blog' ),
			'social' => esc_html__( 'Social', 'adore-blog' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'adore_blog_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		add_theme_support( 'custom-header', array(
		        'default-image'      => '%s/assets/img/header-image.jpg',
		        'default-text-color' => '000',
		       	'width'              => 1332, /* 16:9 Aspect Ratio */
				'height'             => 749,
		    ) );
	

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	    
    	/*
    	 * This theme styles the visual editor to resemble the theme style,
    	 * specifically font, colors, and column width.
     	 */
    	add_editor_style( array( 'assets/css/editor-style.css', adore_blog_fonts_url() ) );

    	// Gutenberg support
		add_theme_support( 'editor-color-palette', array(
	       	array(
				'name' => esc_html__( 'Blue', 'adore-blog' ),
				'slug' => 'blue',
				'color' => '#3763EB',
	       	),
	       	array(
	           	'name' => esc_html__( 'Green', 'adore-blog' ),
	           	'slug' => 'green',
	           	'color' => '#008000',
	       	),
	       	array(
	           	'name' => esc_html__( 'Yellow', 'adore-blog' ),
	           	'slug' => 'yellow',
	           	'color' => '#FFCC00',
	       	),
	       	array(
	           	'name' => esc_html__( 'Purple', 'adore-blog' ),
	           	'slug' => 'purple',
	           	'color' => '#800080',
	       	),
	       	array(
	           	'name' => esc_html__( 'Brown', 'adore-blog' ),
	           	'slug' => 'brown',
	           	'color' => '#A52A2A',
	       	),
	   	));

		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-font-sizes', array(
		   	array(
		       	'name' => esc_html__( 'small', 'adore-blog' ),
		       	'shortName' => esc_html__( 'S', 'adore-blog' ),
		       	'size' => 12,
		       	'slug' => 'small'
		   	),
		   	array(
		       	'name' => esc_html__( 'regular', 'adore-blog' ),
		       	'shortName' => esc_html__( 'M', 'adore-blog' ),
		       	'size' => 16,
		       	'slug' => 'regular'
		   	),
		   	array(
		       	'name' => esc_html__( 'larger', 'adore-blog' ),
		       	'shortName' => esc_html__( 'L', 'adore-blog' ),
		       	'size' => 36,
		       	'slug' => 'larger'
		   	),
		   	array(
		       	'name' => esc_html__( 'huge', 'adore-blog' ),
		       	'shortName' => esc_html__( 'XL', 'adore-blog' ),
		       	'size' => 48,
		       	'slug' => 'huge'
		   	)
		));
		add_theme_support('editor-styles');
		add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'adore_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function adore_blog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'adore_blog_content_width', 900 );
}
add_action( 'after_setup_theme', 'adore_blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function adore_blog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'adore-blog' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'adore-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Main Content Wrapper Sidebar', 'adore-blog' ),
		'id'            => 'main-content-wrapper-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'adore-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	for ( $i=1; $i <= 4; $i++ ) { 
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area ', 'adore-blog' )  . $i,
			'id'            => 'footer-' . $i,
			'description'   => esc_html__( 'Add widgets here.', 'adore-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
}
add_action( 'widgets_init', 'adore_blog_widgets_init' );

/**
 * Register custom fonts.
 */
function adore_blog_fonts_url() {
	$fonts_url = '';
	$font_families = array();
	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Montserrat, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$lato_sans = _x( 'on', 'Rajdhani font: on or off', 'adore-blog' );

	if ( 'off' !== $lato_sans ) {
		$font_families[] = 'Rajdhani:400,500,600,700';
	}

	$mulish_sans = _x( 'on', 'Mulish font: on or off', 'adore-blog' );

	if ( 'off' !== $mulish_sans ) {
		$font_families[] = 'Mulish:400,500,600,700';
	}

	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function adore_blog_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'adore-blog-fonts', wptt_get_webfont_url( adore_blog_fonts_url() ), array(), null );
	
	//slick.css
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', '', '1.8.0' );

	//slick-theme.css
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', '', '1.8.0' );

	//font-awesome.css
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', '', '4.7.0' );

	// blocks
	wp_enqueue_style( 'adore-blog-blocks', get_template_directory_uri() . '/assets/css/blocks.css' );

	wp_enqueue_style( 'adore-blog-style', get_stylesheet_uri() );

	//slick.js
	wp_enqueue_script( 'slick-jquery', get_template_directory_uri() . '/assets/js/slick.js', array( 'jquery' ), '20151215', true );
	
	//theia-sticky-sidebar
	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array( 'jquery' ), '20151215', true );

	wp_enqueue_script( 'adore-blog-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	$adore_blog_l10n = array(
		'quote'		=> adore_blog_get_svg( array( 'icon' => 'quote-right' ) ),
		'expand'	=> esc_html__( 'Expand child menu', 'adore-blog' ),
		'collapse'	=> esc_html__( 'Collapse child menu', 'adore-blog' ),
		'icon'		=> adore_blog_get_svg( array( 'icon' => 'down', 'fallback' => true ) ),
	);

	wp_localize_script( 'adore-blog-navigation', 'adore_blog_l10n', $adore_blog_l10n );

	wp_enqueue_script( 'adore-blog-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'adore-blog-custom', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'adore_blog_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 *
 * @since adore-blog 1.0.0
 */
function adore_blog_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'adore-blog-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks.css' ) );
	// Add custom fonts.
	wp_enqueue_style( 'adore-blog-fonts', adore_blog_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'adore_blog_block_editor_styles' );

// Enqueue admin css.
function adore_blog_load_custom_wp_admin_style( $hook ) {

    wp_register_style( 'adore-blog-admin', get_theme_file_uri( 'assets/css/adore-blog-admin.css' ), false, '1.0.0' );
    wp_enqueue_style( 'adore-blog-admin' );
}
add_action( 'admin_enqueue_scripts', 'adore_blog_load_custom_wp_admin_style' );

/**
 * Webfont Loader.
 */
require get_template_directory() . '/inc/wptt-webfont-loader.php';

// Custom template tags for this theme.
require get_parent_theme_file_path( '/inc/template-tags.php' );

// Functions which enhance the theme by hooking into WordPress.
require get_parent_theme_file_path( '/inc/template-functions.php' );

// Customizer additions.
require get_parent_theme_file_path( '/inc/customizer/customizer.php' );

// SVG icons functions and filters.
require get_parent_theme_file_path( '/inc/icon-functions.php' );

// Breadcrumb trail class.
require get_parent_theme_file_path( '/inc/class-breadcrumb-trail.php' );

// Recommended Plugins
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

// Custom Style
require get_parent_theme_file_path( '/inc/custom-style.php' );

// Custom Widgets
require get_template_directory() . '/inc/widgets/widgets.php';

// One Click Demo Import after import setup.
if ( class_exists( 'OCDI_Plugin' ) ) {
	require get_template_directory() . '/inc/demo-import.php';
}