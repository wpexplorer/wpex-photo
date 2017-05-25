<?php
/**
 * Search.php is used for your search result pages.
 * @package Photo WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

get_header(); // Loads the header.php template
?>

<header id="page-heading">
	<h1 id="archive-title"><?php _e('Search Results For','wpex'); ?>: &quot<?php the_search_query(); ?>&quot</h1>
</header><!-- /page-heading -->

<div id="entries-wrap" class="clearfix">
	<?php
    if (have_posts()) : 
    
        //show posts using the serach loop
        $wpex_count=0;
        while (have_posts()) : the_post();
        $wpex_count++;
            get_template_part( 'content', get_post_format() );   
        if( $wpex_count==3 ) { echo '<div class="clear"></div>'; $wpex_count=0; }
        endwhile;
    
    else :
    
        _e('Sorry, no results where found','wpex');
    
    endif;
    ?>
</div><!-- /entries-wrap -->
<?php wpex_pagination(); //paginate pages ?>
<?php get_footer(); // Loads the footer.php file ?>