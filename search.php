<?php
/**
 * The template for displaying Search Results pages.
 */
get_header();
?>

<section id="primary">
    <div id="content" role="main">
        <header class="page-header">
            <h1 class="page-title">
                <form role="search" method="get" id="searchform2" action="<?php echo home_url('/'); ?>" style="display: inline-block;margin-top: 15px;">
                    <input style="display: inline-block; float: left; margin-right: 10px;" type="text" name="s" id="s"
                    <?php if (is_search()) { ?>
                               value="<?php the_search_query(); ?>"
                           <?php } else {
                               ?>value="Nhập từ khóa &hellip;" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"
                           <?php } ?> />

                    <?php $query_types = get_query_var('post_type'); ?>
                    <div style="display: inline-block; float: left">
                        <input type="checkbox" name="post_type[]" value="post" <?php
                    if (in_array('post', $query_types)) {
                        echo 'checked="checked"';
                    }
                    ?> /><label>Bài viết</label>
                        <input type="checkbox" name="post_type[]" value="place" <?php
                               if (in_array('place', $query_types)) {
                                   echo 'checked="checked"';
                               }
                    ?> /><label>Địa điểm</label>
                        <input type="checkbox" name="post_type[]" value="event" <?php
                               if (in_array('event', $query_types)) {
                                   echo 'checked="checked"';
                               }
                    ?> /><label>Sự kiện</label>
                    </div>
                    <input type="submit" id="searchsubmit" value="Tìm kiếm" />
                    <div class="clearfix"></div>
                </form>
            </h1>
        </header>
        <?php if (have_posts()) : ?>
            <header class="page-header">
                <h1 class="page-title"><?php printf(__('Kết quả tìm kiếm của: %s', 'moc'), '<span>' . get_search_query() . '</span>'); ?></h1>
            </header>
            <?php /* Start the Loop */ ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php
                get_template_part('content', get_post_format());
                ?>
            <?php endwhile; ?>
            <?php moc_content_nav('nav-below'); ?>

        <?php else : ?>
            <article id="post-0" class="post no-results not-found">
                <header class="entry-header">
                    <h1 class="entry-title"><?php _e('Không tìm thấy', 'moc'); ?></h1>
                </header><!-- .entry-header -->
                <div class="entry-content">
                    <p><?php _e('Không tìm thấy bài viết phù hợp với từ khóa. Vui lòng thử lại', 'moc'); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- .entry-content -->
            </article><!-- #post-0 -->

        <?php endif; ?>

    </div><!-- #content -->
</section><!-- #primary -->

<?php get_footer(); ?>