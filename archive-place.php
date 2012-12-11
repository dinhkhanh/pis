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
                    <?php query_posts(array('post_type' => array('place'), 'posts_per_page' => 5)); ?>
                    <?php if (have_posts()) : $count = 1; ?>
                        <div id="slider">
                            <?php while (have_posts()) : the_post(); ?>
                                <div id="slide<?php echo $count++; ?>" class="slide">
                                    <div class="content">
                                        <?php
                                        if (has_post_thumbnail($post->ID))
                                            echo get_the_post_thumbnail($post->ID, 'large', array('class' => 'aligncenter slide_thumb', 'title' => trim(strip_tags($post->post_title))));
                                        else {
                                            echo '<img class="alignleft event_thumb" src="' . theme_dir . '/img/default_place.jpg" />';
                                        }
                                        ?>

                                        <div class="slide-event-info">
                                            <div class="event-infos">
                                                <div class="event-info event-address">
                                                    <h1><?php the_title(); ?></h1>
                                                    <h3><?php echo get_post_meta($post->ID, 'location', true); ?></h3>
                                                </div> <!-- end event address -->
                                                <div class="event-info event-time">
                                                    <div class="event-start">
                                                        Giờ mở cửa <br />
                                                        <?php echo get_post_meta($post->ID, 'open', true); ?>
                                                    </div>
                                                    <div class="event-end">
                                                        Lĩnh vực<br />
                                                        <?php
                                                        $categories = get_the_terms($post->ID, 'places');
                                                        $separator = ' ';
                                                        if ($categories) {
                                                            foreach ($categories as $category) {
                                                                echo $category->name . $separator;
                                                            }
                                                        }
                                                        ?>
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

                        <?php query_posts(array('post_type' => array('place'), 'posts_per_page' => 5)); ?>
                        <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <div class="link-header"><?php the_title(); ?></div>
                                <div class="link-content">
                                    <?php the_excerpt(); ?>
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
        <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
                <article  class="place hentry">
                    <div class="temp-place-thumb">
                        <?php
                        if (has_post_thumbnail($post->ID))
                             place_post_thumbnail($post->ID, 2, 'thumbnail', 'alignleft place_list_thumb');
                        else {
                            echo '<img class="alignleft place_thumb" src="' . theme_dir . '/img/default_place.jpg" />';
                        }
                        ?></div>
                    <div class="temp-place-infos">
                        <div class="temp-place-info temp-place-left">
                            <br /><br />
                            <h1><span class="place-verified verified<?php echo get_post_meta($post->ID, 'verified', true); ?>" title="<?php echo get_post_meta($post->ID, 'verified', true) == 'on' ? 'This place is verified.' : 'This place is not verified.' ?>"></span>&nbsp;<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                            <span><?php echo get_post_meta($post->ID, 'location', true); ?></span><br />
                            <span>Người tạo: <?php the_author_posts_link(); ?></span>
                            <span class="clearfix"></span>
                        </div>
                    </div> <!-- end place info -->
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
                    <?php _e('Không tìm thấy bài viết.'); ?>
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
