<?php
/**
 * The template for displaying search forms
 */
?>
<div class="only-search">
    <form method="get" id="searchform2" action="<?php echo esc_url(home_url('/')); ?>">
        <label for="s" class="assistive-text"><?php _e('Search', 'twentyeleven'); ?></label>
        <input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e('Search', 'moc'); ?>" autocomplete="off" />
        <input type="submit" class="submit" name="submit" id="searchsubmit" value="Search" />

        <input type="hidden" name="post_type[]" value="post" />
        <input type="hidden" name="post_type[]" value="place" />
        <input type="hidden" name="post_type[]" value="event" />
    </form>
</div>