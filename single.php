<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
get_header();
?>
<div id="primary">
    <div id="content" role="main">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('content', 'single'); ?>
            <?php comments_template('', true); ?>
        <?php endwhile; // end of the loop. ?>
    </div><!-- #content -->
    <div id="footer">
        <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
    </div>
</div><!-- #primary -->
<?php get_footer(); ?>