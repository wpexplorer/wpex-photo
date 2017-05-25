<?php
/**
 * Index.php is the default template. This file is used when a more specific template can not be found to display your posts.
 * It is unlikely this template file will ever be used, but it's here to back you up just incase.
 * @package Photo WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

get_header(); // Loads the header.php template

if (have_posts()) : ?>
<div id="entries-wrap" class="clearfix">   
	<?php
	$wpex_count=0;
	// Loop through each post
    while (have_posts()) : the_post();
	$wpex_count++;
        get_template_part( 'content', get_post_format() );   
	if( $wpex_count==3 ) { echo '<div class="clear"></div>'; $wpex_count=0; }
    endwhile; ?>
</div><!-- entries-wrap -->
<?php
wpex_pagination(); // Paginate your posts
endif;
get_footer(); //get template footer ?>