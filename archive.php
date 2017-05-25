<?php
/**
 * Archive.php renders your categories, tags and archive pages
 * @package Photo WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

get_header(); // Loads the header.php template

//start loop
if(have_posts()) : ?>

<header id="page-heading">
	<?php $post = $posts[0]; ?>
	<?php if (is_category()) { ?>
		<h1><?php single_cat_title(); ?></h1>
	<?php } elseif( is_tag() ) { ?>
		<h1>Posts Tagged &quot;<?php single_tag_title(); ?>&quot;</h1>
	<?php  } elseif (is_day()) { ?>
		<h1>Archive for <?php the_time('F jS, Y'); ?></h1>
	<?php  } elseif (is_month()) { ?>
		<h1>Archive for <?php the_time('F, Y'); ?></h1>
	<?php  } elseif (is_year()) { ?>
		<h1>Archive for <?php the_time('Y'); ?></h1>
	<?php  } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1>Blog Archives</h1>
	<?php } ?>
</header><!-- /page-heading -->

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