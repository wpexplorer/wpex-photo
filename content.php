<?php
/**
 * This file is used for your standard post entry
 * @package Photo WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
?>

<article <?php post_class('single-entry clearfix'); ?>>  
	<?php if( has_post_thumbnail() ) {  ?>
        <div class="single-entry-thumbnail">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ),  wpex_img( 'blog_entry_width' ), wpex_img( 'blog_entry_height' ), wpex_img( 'blog_entry_crop' ) ); ?>" alt="<?php echo the_title(); ?>" /></a>
        </div><!-- /single-entry-thumbnail -->
    <?php } ?>
    <div class="entry-text clearfix">
        <header>
        	<div class="entry-cats"><?php the_category(','); ?></div>
            <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
        </header>
		<?php
        if( !empty($post->post_excerpt) ) {
            the_excerpt();
            } else {
               echo wp_trim_words(get_the_content(), 20); } ?>
    </div><!-- /entry-text -->
</article><!-- /single-entry -->