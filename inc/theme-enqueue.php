<?php
/**
 * vick_fords enqueue scripts
 *
 * @package vick_fords
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'vick_fords_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function vick_fords_scripts() {

		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		// Styles
		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/assets/css/main.min.css' );
		wp_enqueue_style( 'vf-bt', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), $css_version );
		wp_enqueue_style( 'vf-sl', get_template_directory_uri() . '/assets/css/slick.css', array(), $css_version );
		wp_enqueue_style( 'vf-com', get_template_directory_uri() . '/assets/css/common.css', array(), $css_version );
		wp_enqueue_style( 'vf-styles', get_template_directory_uri() . '/assets/css/main.min.css', array(), $css_version );
		wp_enqueue_style( 'vf-resp', get_template_directory_uri() . '/assets/css/responsive.css', array(), $css_version );

		
		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/assets/js/common.js' );

		wp_enqueue_script( 'vf-jquery', get_template_directory_uri() . '/assets/js/jquery.js', array(), $js_version, true );
		wp_enqueue_script( 'vf-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), $js_version, true );
		wp_enqueue_script( 'vf-sl', get_template_directory_uri() . '/assets/js/slick.min.js', array(), $js_version, true );
		wp_enqueue_script( 'vf-sly', get_template_directory_uri() . '/assets/js/sly.js', array(), $js_version, true );

		wp_enqueue_script( 'vf-common', get_template_directory_uri() . '/assets/js/common.js', array(), $js_version, true );


		wp_localize_script( 'vf-common', '$nm_js', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		));

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'vick_fords_scripts' );