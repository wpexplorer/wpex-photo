<?php
/**
 * Header.php is generally used on all the pages of your site and is called somewhere near the top
 * of your template files. It's a very important file that should never be deleted.
 * @package Photo WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if( of_get_option('custom_favicon') ) { ?>
		<link rel="icon" type="image/png" href="<?php echo $data['custom_favicon']; ?>" />
	<?php } ?>
	<?php wp_head(); ?>
</head>


<!-- Begin Body
================================================== -->
<body <?php body_class(); ?>>

<div id="wrap" class="clearfix">

	<div id="header-wrap">
		<?php wpex_hook_header_before(); ?>
		<header id="header" class="clearfix">
			<?php wpex_hook_header_top(); ?>
				<div id="logo">
					<?php
					// Show custom image logo if defined in the admin
					if( of_get_option('custom_logo') ) { ?>
						<a href="<?php echo home_url(); ?>/" title="<?php get_bloginfo( 'name' ); ?>" rel="home"><img src="<?php echo of_get_option('custom_logo'); ?>" alt="<?php get_bloginfo( 'name' ) ?>" /></a>
					<?php }
					// No custom img logo - show text logo
						else { ?>
						 <h2><a href="<?php echo home_url(); ?>/" title="<?php get_bloginfo( 'name' ); ?>" rel="home"><?php echo get_bloginfo( 'name' ); ?></a></h2>
						 <p><?php echo get_bloginfo('description'); ?></p>
					<?php } ?>
				</div><!-- /logo -->
			<?php wpex_hook_header_bottom(); ?>
		</header><!-- /header -->
		<?php wpex_hook_header_after(); ?>
	</div><!-- /header-wrap -->
	
	
	<div id="navigation-wrap" class="clearfix">
		<nav id="navigation">
			<?php wp_nav_menu( array(
				'theme_location' => 'main_menu',
				'sort_column' => 'menu_order',
				'menu_class' => 'sf-menu',
				'fallback_cb' => false
			)); ?>
		</nav><!-- /navigation -->
		<ul id="header-social" class="clearfix">
			<?php
			// Show social icons if enabled
			if ( of_get_option('header_social') == '1' ) { 
				$wpex_social_links = wpex_get_social();
				//social loop
				foreach( $wpex_social_links as $wpex_social_link ) {
					if( of_get_option( $wpex_social_link ) ) {
						echo '<li><a href="'. of_get_option($wpex_social_link) .'" title="'. $wpex_social_link .'" target="_blank"><img src="'. get_template_directory_uri() .'/images/social/'.$wpex_social_link.'.png" alt="'. $wpex_social_link .'" /></a></li>';
				} }
			}
			?>
		</ul><!-- /header-social -->
	</div>

	
	<?php wpex_hook_content_before(); ?>
	<div id="main-content" class="clearfix">
	<?php wpex_hook_content_top(); ?>
	
	<?php
	//Fun code on homepage only
	if ( is_front_page() ) {
		
		// Run code on non-paginated pages
		if ( ! is_paged() ) {
			// Check if the soliloquy slider plugin is activated
			if ( function_exists( 'soliloquy_slider' ) ) {
				// Display soliloqury slider
				if ( 'Select' != of_get_option('home_slider') ) { ?>
					<div id="home-slider"><?php soliloquy_slider( of_get_option('home_slider') ) ?></div>
			<?php } // Emd is_paged check
			} // End slider function check
		} // End slider select check
		
		// Display subtitle if defined in the options panel
		if ( of_get_option('home_subtitle') !== '' ) {
			// Display subtitle as long as it's not a paginated page
			if ( !is_paged() ) {
			?>
			<h2 id="homepage-title">
				<span><?php echo of_get_option('home_subtitle', 'Most Recent'); ?></span>
			</h2>
		<?php } // end is_paged check
		} // End home subtitle check
	} // End if is_front_page
	?>