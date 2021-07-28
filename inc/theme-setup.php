<?php
/**
 * Theme basic setup.
 *
 * @package vick_fords
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

add_action( 'after_setup_theme', 'ch_setup' );

if ( ! function_exists ( 'ch_setup' ) ) {

	function ch_setup() {

		load_theme_textdomain( 'vick_fords', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		register_nav_menus( array(
			'main_menu_left'   => esc_html__( 'Main menu (left)', 'vick_fords' ),
			'main_menu_right'   => esc_html__( 'Main menu (right)', 'vick_fords' ),
			'footer_menu'   => esc_html__( 'Footer menu', 'vick_fords' ),
			'mobile_menu'   => esc_html__( 'Mobile menu', 'vick_fords' ),
			// 'lang_menu'   => esc_html__( 'Lang menu', 'vick_fords' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'post-thumbnails' );
		add_image_size( 'progressive', 25, 25, true ); // Кадрирование изображения

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

		add_theme_support( 'custom-background', apply_filters( 'sd_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		add_theme_support( 'custom-logo' );

		add_theme_support( 'responsive-embeds' );
	}
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}


// add_filter( 'excerpt_more', 'ch_custom_excerpt_more' );

// if ( ! function_exists( 'ch_custom_excerpt_more' ) ) {

// 	function ch_custom_excerpt_more( $more ) {
// 		if ( ! is_admin() ) {
// 			$more = '';
// 		}
// 		return $more;
// 	}

// }

// add_filter( 'wp_trim_excerpt', 'ch_all_excerpts_get_more_link' );

// if ( ! function_exists( 'ch_all_excerpts_get_more_link' ) ) {

// 	function ch_all_excerpts_get_more_link( $post_excerpt ) {
// 		if ( ! is_admin() ) {
// 			$post_excerpt = $post_excerpt . ' <a href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . __( 'Read More...',
// 			'vick_fords' ) . '</a>';
// 		}
// 		return $post_excerpt;
// 	}

// }

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
	  'page_title'   => 'option',
	  'menu_title'  => 'options',
	  'menu_slug'   => 'theme-general-settings',
	  'capability'  => 'edit_posts',
	  'redirect'    => false
	));
  
}



add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Add parent.
        acf_add_options_page(array(
            'page_title'  => __('Services'),
            'menu_title'  => __('Services'),
            'redirect'    => false,
        ));

        // // Add sub page.
        // $child = acf_add_options_page(array(
        //     'page_title'  => __('Social Settings'),
        //     'menu_title'  => __('Social'),
        //     'parent_slug' => $parent['menu_slug'],
        // ));
    }
}