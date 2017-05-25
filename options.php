<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {
    $optionsframework_settings = get_option('optionsframework');
    $optionsframework_settings['id'] = 'options_wpex_themes';
    update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();
	
	
	//GENERAL
	
	$options[] = array(
		'name' => __('General', 'options_framework_theme'),
		'type' => 'heading');
		
	$options['custom_logo'] = array(
		'name' => __('Custom Logo', 'options_framework_theme'),
		'desc' => __('Upload your custom logo.', 'options_framework_theme'),
		'std' => '',
		'id' => 'custom_logo',
		'type' => 'upload');
		
	$options['custom_favicon'] = array(
		'name' => __('Custom Favicon', 'options_framework_theme'),
		'desc' => __('Upload your custom site favicon.', 'options_framework_theme'),
		'id' => 'custom_favicon',
		'type' => 'upload');
		
	$options['responsive'] = array(
		'name' => __('Responsive?', 'options_framework_theme'),
		'desc' => __('Check box to enable the responsive layout.', 'options_framework_theme'),
		'id' => 'responsive',
		'std' => '1',
		'type' => 'checkbox');

	if ( function_exists( 'soliloquy_slider' ) ) {
			
		//Sliders
		$sliders = array();
		$sliders_obj = get_posts('post_type=soliloquy&sort_column=post_parent,menu_order&numberposts=-1');   
		$sliders = array( __("Select", 'wpex') => __("Select", 'wpex') ); 
		foreach ($sliders_obj as $slider) {
		$sliders[$slider->ID] = $slider->post_title; }
			 
		$options['home_slider'] = array(
			'name' => __('Homepage Soliloquy Slider', 'options_framework_theme','wpex'),
			'desc' => __('Select your homepage Soliloquy Slider.', 'options_framework_theme','wpex'),
			'id' => 'home_slider',
			'std' => 'Select',
			'type' => 'select',
			'options' => $sliders );
			
	}
	
	$options['home_subtitle'] = array(
		'name' => __('Homepage Subtitle', 'options_framework_theme'),
		'desc' => __('Check box to enable the responsive layout.', 'options_framework_theme'),
		'id' => 'home_subtitle',
		'std' => __('Most Recent','wpex'),
		'type' => 'text');
		
		
	//SOCIAL

	$options[] = array(
		'name' => __('Social', 'options_framework_theme'),
		'type' => 'heading');	
		
		
	$options['header_social'] = array(
		'name' => __('Social?', 'options_framework_theme'),
		'desc' => __('Check box to enable the social section in the main menu.', 'options_framework_theme'),
		'id' => 'header_social',
		'std' => '1',
		'type' => 'checkbox');
		
	if(function_exists('wpex_get_social')) {
	$social_links = wpex_get_social();
		foreach($social_links as $social_link) {
			$options[] = array( "name" => ucfirst($social_link),
								'desc' => ' '. __('Enter your ','wpex') . $social_link . __(' url','wpex') .' <br />'. __('Include http:// at the front of the url.', 'wpex'),
								'id' => $social_link,
								'std' => '',
								'type' => 'text');
		}
	}
	return $options;
}