<?php
/**
 * Default file for single regular posts.
 * @package Photo WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
get_header(); // Loads the header.php template
if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="single-post-content" class="clearfix">
    
    <div id="single-post" class="clearfix">
    
        <header id="post-header">
            <h1><?php the_title(); ?></h1>
            <ul class="meta clearfix">
                <li><strong>Posted on:</strong> <?php echo get_the_date(); ?></li>
                <li><strong>By:</strong> <?php the_author_posts_link(); ?></li>   
                <?php if(comments_open()) { ?><li class="comment-scroll"><strong>With:</strong> <?php comments_popup_link(__('0 Comments', 'wpex'), __('1 Comment', 'wpex'), __('% Comments', 'wpex'), 'comments-link' ); ?></li><?php } ?>
            </ul>
        </header><!-- /post-header -->
        
        <!-- Entry Content Start -->
        <article <?php post_class('entry clearfix fitvids'); ?>>
        	<div class="inner-post">
            	<?php the_content(); // This is your main post content output ?>
            </div><!-- /inner-post -->
        </article><!-- /entry -->
        <!-- Entry Content End -->
        
        <?php wp_link_pages(); // Paginate pages when <!- next --> is used ?>
        
        <?php the_tags('<div id="post-tags" class="clearfix">','','</div>'); ?>

		<div class="clearfix">
       		<?php comments_template(); ?>
			<?php 
			// Get random posts
			$wpex_related_posts = get_posts('numberposts=3&orderby=rand&exclude='. $post->ID);
            if($wpex_related_posts) { ?>
            <section id="related-posts" class="clearfix">
                <h2><span><?php _e('Random Posts','wpex'); ?></span></h2>
                <div id="entries-wrap" class="clearfix"> 
                    <?php
                    //start loop
                    $wpex_count=0;
					global $post;
                    foreach($wpex_related_posts as $post) : setup_postdata($post);
                    $wpex_count++;
                        get_template_part( 'content', '' ); // get entry
                    if( $wpex_count == 3 ) { echo '<div class="clear"></div>'; $wpex_count=0; } endforeach; wp_reset_postdata(); ?>
                </div><!-- entries-wrap -->
            </section><!-- /related-posts -->
            <?php } ?>
  		</div><!-- /clearfix -->
                  
    </div><!-- entries-wrap -->
    
</div><!--/container -->

<?php
//end post loop
endwhile; endif;
//get template footer
get_footer(); ?>