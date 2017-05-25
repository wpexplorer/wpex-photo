<?php
/**
 * Author.php loads the author pages with a listing of their posts
 * @package Photo WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

get_header(); // Loads the header.php template

// Start loop
if(have_posts()) : ?>

<header id="page-heading">
	<?php
    if(isset($_GET['author_name'])) :
    $curauth = get_userdatabylogin($author_name);
    else :
    $curauth = get_userdata(intval($author));
    endif; ?>
    <h1><?php _e('Posts by','wpex'); ?>: <?php echo $curauth->display_name; ?></h1>
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