<?php
/**
 * The template for displaying content in the event template
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <div class="event-header">
            <h1 class="entry-title event-entry-title">
                <?php the_title(); ?>
            </h1>
            <?php
            if (has_post_thumbnail($post->ID))
                echo get_the_post_thumbnail($post->ID, 'large', array('class' => 'aligncenter event_thumb', 'title' => trim(strip_tags($post->post_title))));
            else echo theme_dir .'/img/default_event.jpg';
            ?>
        </div>
        <div class="event-infos">
            <div class="event-info event-address">
                <h1><?php echo get_post_meta($post->ID, 'host', true); ?></h1>
                <h3><?php echo get_post_meta($post->ID, 'location', true); ?></h3>
            </div> <!-- end event address -->
            <div class="event-info event-time">
                <div class="event-start">
                    <span><?php echo get_post_meta($post->ID, 'start_time', true); ?></span><br />
                    Start:
                    <?php echo get_post_meta($post->ID, 'start_date', true); ?>
                </div>
                <div class="event-end">
                    <span>
                        <?php echo get_post_meta($post->ID, 'end_time', true); ?> <br /></span>
                    End:
                    <?php echo get_post_meta($post->ID, 'end_date', true); ?>
                </div>
                <span class="clearfix"></span>
            </div><!-- end event time -->
            <span class="clearfix"></span>
        </div> <!-- end event info -->
    </header>
    <!-- .entry-header -->

    <div class="entry-content">
        <h1 class="event-info-title">EVENT DETAIL</h1>
        <?php the_content(); ?>
        <?php wp_link_pages(array('before' => '<div class="page-link"><span>' . __('Pages:') . '</span>', 'after' => '</div>')); ?>

    </div>
    <!-- .entry-content -->

    <footer class="entry-meta">
        <?php
        $tag_list = get_the_tag_list('<p class="tag-list">', ' ', '</p>');
        if ('' != $tag_list) {
            $utility_text = __('%1$s');
            printf($tag_list);
        }
        ?>
    </footer>
    <!-- .entry-meta -->

</article>

<!-- #post-<?php the_ID(); ?> -->