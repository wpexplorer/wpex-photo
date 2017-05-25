<?php
/**
 * Sidebar.php is used to show your sidebar widgets on pages/posts
 * @package Photo WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
?>

<?php wpex_hook_sidebar_before(); ?>
<aside id="sidebar">
	<?php wpex_hook_sidebar_top(); ?>
	<?php dynamic_sidebar('sidebar'); ?>
    <?php wpex_hook_sidebar_bottom(); ?>
</aside><!-- /sidebar -->
<?php wpex_hook_sidebar_after(); ?>