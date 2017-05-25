<?php
/**
 * Footer.php outputs the code for your footer widgets, contains your footer hook and closing body/html tags
 * @package Photo WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
?>
<div class="clear"></div><!-- /clear any floats -->
<?php wpex_hook_content_bottom(); ?>
</div><!-- /main-content -->
<?php wpex_hook_content_after(); ?>
	<div id="footer-wrap">
    	<?php wpex_hook_footer_before(); ?>
        <footer id="footer">
		<?php wpex_hook_footer_top(); ?>
			<div id="copyright">
				&copy; <?php _e('Copyright','wpex'); ?> <?php the_date('Y'); ?> &middot; <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> - Theme by <a href="http://themeforest.net/user/WPExplorer?ref=wpexplorer" title="WPExplorer" target="_blank" rel="nofollow">WPExplorer</a>
           </div><!-- /copyright -->
            <?php wpex_hook_footer_bottom(); ?>
        </footer><!-- /footer -->
        <?php wpex_hook_footer_after(); ?>
    </div><!-- /footer-wrap -->
</div><!-- /wrap -->
<?php wp_footer(); // Footer hook, do not delete, ever ?>
</body>
</html>