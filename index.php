<?php
get_header(); ?>
<div id="primary">
  <div id="content" role="main">
    <?php if ( have_posts() ) : ?>
    <?php /* Start the Loop */ ?>
    <?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', get_post_type() ); ?>
    <?php endwhile; ?>
    <?php moc_content_nav( 'nav-below' ); ?>
    <?php else : ?>
    <article id="post-0" class="post no-results not-found">
      <header class="entry-header">
        <h1 class="entry-title">
          <?php _e( 'Nothing Found'); ?>
        </h1>
      </header>
      <!-- .entry-header -->

      <div class="entry-content">
        <p>
          <?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.'); ?>
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
  <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); wp_reset_query();?></div>
</div>
</div>
<!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
