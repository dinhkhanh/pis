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
	<form method="get" id="searchform2" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'twentyeleven' ); ?></label>
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Tìm kiếm (gõ rồi nhấn Enter)', 'twentyeleven' ); ?>" autocomplete="off" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" />
	</form>
</div>