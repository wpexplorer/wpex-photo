<?php
/**
 * This file loads the CSS and Javascript used for the theme.
 * @package Photo WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */


add_action('wp_enqueue_scripts','wpex_load_scripts');
function wpex_load_scripts() {
	
	
	/*******
	*** CSS
	*******************/
	
	// Main
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	// Responsive
	if( of_get_option('responsive') == '1') wp_enqueue_style('wpex-responsive', WPEX_CSS_DIR . '/responsive.css');
		
	// Google Fonts
	wp_enqueue_style('droid-serif-gfont','http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic', 'style');
	
	
	/*******
	*** jQuery
	*******************/
	
	// Main Scripts
	wp_enqueue_script( 'wpex-plugins', WPEX_JS_DIR .'/plugins.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'wpex-global', WPEX_JS_DIR .'/global.js', array( 'jquery', 'wpex-plugins' ), '', true );
	
	// Comment replies
	if(is_single() || is_page()) {
		wp_enqueue_script('comment-reply');
	}
	
	// Localize responsive nav
	wp_localize_script( 'wpex-global', 'responsiveLocalize', array( 'text' => __('Menu','wpex') ) );

	
} //end wpex_load_scripts()