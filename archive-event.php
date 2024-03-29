<?php
/*
 * Archive for Places
 */
get_header();
?>

<section id="primary">
    <div id="content" role="main">
        <?php if (have_posts()) : ?>
            <!-- slide --><article  class="hentry">
                <div id="slidorion">
                    <?php query_posts(array('post_type' => array('event'), 'posts_per_page' => 5)); ?>
                    <?php if (have_posts()) : $count = 1; ?>
                        <div id="slider">
                            <?php while (have_posts()) : the_post(); ?>
                                <div id="slide<?php echo $count++; ?>" class="slide">
                                    <div class="content">
                                        <?php
                                        if (has_post_thumbnail($post->ID))
                                            echo get_the_post_thumbnail($post->ID, 'large', array('class' => 'aligncenter slide_thumb', 'title' => trim(strip_tags($post->post_title))));
                                        else {
                                            echo '<img class="alignleft event_thumb" src="' . theme_dir . '/img/default_event.jpg" />';
                                        }
                                        ?>

                                        <div class="slide-event-info">
                                            <div class="event-infos">
                                                <div class="event-info event-address">
                                                    <h1><?php echo get_post_meta($post->ID, 'host', true); ?></h1>
                                                    <h3><?php echo get_post_meta($post->ID, 'location', true); ?></h3>
                                                </div> <!-- end event address -->
                                                <div class="event-info event-time">
                                                    <div class="event-start">
                                                        Bắt đầu: <br />
                                                        <span><?php echo get_post_meta($post->ID, 'start_time', true); ?></span>
                                                    </div>
                                                    <div class="event-end">
                                                        Kết thúc: <br />
                                                        <span>
                                                            <?php echo get_post_meta($post->ID, 'end_time', true); ?></span>
                                                    </div>
                                                    <span class="clearfix"></span>
                                                </div><!-- end event time -->
                                                <span class="clearfix"></span>
                                            </div> <!-- end event info -->
                                        </div>
                                    </div>
                                </div>

                                <?php
                            endwhile;
                            wp_reset_query();
                            ?>
                        </div>
                    <?php endif;
                    ?>
                    <div id="accordion">

                        <?php query_posts(array('post_type' => array('event'), 'posts_per_page' => 5)); ?>
                        <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <div class="link-header"><?php the_title(); ?></div>
                                <div class="link-content">
                                    <?php the_excerpt('More'); ?>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_query();
                        endif;
                        ?>
                    </div>
                </div>
            </article>
        <?php endif;
        ?>
        <!-- end slide -->
        <?php query_posts(array('post_type' => array('event'), 'posts_per_page' => 6)); ?>
        <?php if (have_posts()) : ?>
            <?php /* Start the Loop */ ?>
    <?php while (have_posts()) : the_post(); ?>
                <article  class="event hentry">
                    <div class="temp-event-thumb">
                        <?php
                        if (has_post_thumbnail($post->ID))
                            echo get_the_post_thumbnail($post->ID, 'thumbnail', array('class' => 'alignleft event_thumb', 'title' => trim(strip_tags($post->post_title))));
                        else {
                            echo '<img class="alignleft event_thumb" src="' . theme_dir . '/img/default_event.jpg" />';
                        }
                        ?></div>
                    <div class="temp-event-infos">
                        <div class="temp-event-info temp-event-left">
                            <h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                            <p><?php
                        echo get_post_meta($post->ID, 'host', true);
                        echo ', ' . get_post_meta($post->ID, 'location', true)
                        ?></p>
                        </div>
                        <div class="temp-event-info temp-event-right">
                            Bắt đầu: <br />
                            <span><?php echo get_post_meta($post->ID, 'start_time', true); ?></span>
                        </div>
                        <div class="temp-event-info temp-event-left">
                        <?php the_excerpt(); ?>
                        </div>
                        <div class="temp-event-info temp-event-right">
                            Kết thúc: <br />
                            <span>
                                <?php echo get_post_meta($post->ID, 'end_time', true); ?></span>
                        </div>
                        <span class="clearfix"></span>
                        <span class="clearfix"></span>
                    </div> <!-- end event info -->
                </article>
            <?php endwhile; ?>
            <?php moc_content_nav('nav-below'); ?>
<?php else : ?>
            <article id="post-0" class="post no-results not-found">
                <header class="entry-header">
                    <h1 class="entry-title">
    <?php _e('Không tìm thấy'); ?>
                    </h1>
                </header>
                <!-- .entry-header -->

                <div class="entry-content">
                    <p>
                    <?php _e('Không tìm thấy bài viết nào.'); ?>
                    </p>
    <?php get_search_form(); ?>
                </div>
                <!-- .entry-content -->

            </article>
            <!-- #post-0 -->

<?php endif; ?>
    </div>
    <!-- #content -->
    <div id="footer">
<?php wp_nav_menu(array('theme_location' => 'primary')); ?>
    </div>
</section>
<!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
