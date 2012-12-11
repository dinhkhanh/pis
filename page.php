<?php
get_header(); ?>
<div id="primary">
  <div id="content" role="main">
    <?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', 'page' ); ?>
    <?php comments_template( '', true ); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
  <!-- #content -->
  <div id="footer">
  <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?></div>
</div>
<!-- #primary -->
<?php if(has_shortcode('wpuf_addpost')||has_shortcode('wpuf_dashboard')){
    get_sidebar();
} ?>
<?php get_footer(); ?>
