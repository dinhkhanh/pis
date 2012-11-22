<?php
/**
 * The template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<div class="only-search">
	<form method="get" id="searchform2" action="http://www.google.com.vn/search" target="_blank">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'twentyeleven' ); ?></label>
		<input type="text" class="field" name="q" id="s" placeholder="<?php esc_attr_e( 'Tìm kiếm (gõ rồi nhấn Enter)', 'twentyeleven' ); ?>" autocomplete="off" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" />
        <input type="hidden" name="sitesearch" value="<?php echo get_option('home'); ?>" />
	</form>
</div>