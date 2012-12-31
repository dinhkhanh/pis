<?php
/*
 * Template Name: Advance Search
 */
get_header();
?>
<article id="post-0" class="hentry">
    <header class="entry-header">
        <h1 class="entry-title"><?php _e('Advance Search', 'moc'); ?></h1>
    </header><!-- .entry-header -->
    <div class="entry-content">
        <div class="only-search">
            <form role="search" method="get" id="searchform2" action="<?php echo home_url('/'); ?>">
                <input type="text" name="s" id="s"
                    <?php if (is_search()) { ?>
                       value="<?php the_search_query(); ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"
                    <?php }
                    else { ?>value="Enter keywords &hellip;" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"
                        <?php } ?> /><br />

                <?php $query_types = get_query_var('post_type'); ?>
                <input type="checkbox" name="post_type[]" value="post" <?php if (in_array('post', $query_types)) {
                    echo 'checked="checked"';
                } ?> /><label>News</label>
                <input type="checkbox" name="post_type[]" value="place" <?php if (in_array('place', $query_types)) {
                    echo 'checked="checked"';
                } ?> /><label>Places</label>
                <input type="checkbox" name="post_type[]" value="event" <?php if (in_array('event', $query_types)) {
                    echo 'checked="checked"';
                } ?> /><label>Events</label>

                <input type="submit" id="searchsubmit" value="Search" />
            </form>

        </div>
    </div><!-- .entry-content -->
</article><!-- #post-0 -->
<?php get_footer(); ?>