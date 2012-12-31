<?php
/**
 * The template for displaying Author Archive pages.
 */
get_header();
?>
<section id="primary">
    <div id="content" role="main">
        <?php
        global $wp_query;
        $curauth = $wp_query->get_queried_object();
        ?>
        <article class="post hentry">
            <div id="author-info">
                <header class="entry-header">
                    <div id="author-avatar">
                        <?php echo get_avatar($curauth->ID, 120); ?>
                    </div><!-- #author-avatar -->
                    <div id="author-description">
                        <h2><?php echo get_the_author_meta('display_name', $curauth->ID); ?>&nbsp;<span class="user-badge <?php echo get_user_class($curauth->ID); ?>" title="<?php echo get_user_class($curauth->ID); ?>"></span></h2>
                        <?php echo get_the_author_meta('description', $curauth->ID); ?>
                        <p><?php printf('%s địa điểm &middot; %s sự kiện &middot %s bài viết', posts_count($curauth->ID, 'place'), posts_count($curauth->ID, 'event'), posts_count($curauth->ID, 'post'))?></p>
                        <p><?php printf('%s &middot %s tuổi &middot %s', get_the_author_meta('gender', $curauth->ID) == 1?'Nam':'Nữ', get_the_author_meta('age', $curauth->ID), get_the_author_meta('user_address', $curauth->ID));?>
                    </div><!-- #author-description	-->

                </header>
            </div><!-- #author-info -->
        </article>
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
             get_template_part('content', get_post_format());
            endwhile;
        endif;
        ?>
    </div><!-- #content -->
    <div id="footer">
        <?php wp_nav_menu(array('theme_location' => 'primary'));
        wp_reset_query();
        ?></div>
</section><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>