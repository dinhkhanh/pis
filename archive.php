<?php
get_header(); ?>

<section id="primary">
  <div id="content" role="main">
    <?php if ( have_posts() ) : ?>
    <header class="page-header">
      <h1 class="page-title">
        <?php if ( is_day() ) : ?>
        <?php printf( __( '%s' ), '<span>' . get_the_date() . '</span>' ); ?>
        <?php elseif ( is_month() ) : ?>
        <?php printf( __( '%s' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format' ) ) . '</span>' ); ?>
        <?php elseif ( is_year() ) : ?>
        <?php printf( __( '%s' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format' ) ) . '</span>' ); ?>
        <?php else : ?>
        <?php _e( 'Blog Archives' ); ?>
        <?php endif; ?>
      </h1>
    </header>
    <?php /* Start the Loop */ ?>
    <?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', get_post_format() ); ?>
    <?php endwhile; ?>
    <?php moc_content_nav( 'nav-below' ); ?>
    <?php else : ?>
    <article id="post-0" class="post no-results not-found">
      <header class="entry-header">
        <h1 class="entry-title">
          <?php _e( 'Nothing Found' ); ?>
        </h1>
      </header>
      <!-- .entry-header -->
      
      <div class="entry-content">
        <p>
          <?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.' ); ?>
        </p>
        <?php get_search_form(); ?>
      </div>
      <!-- .entry-content --> 
      
    </article>
    <!-- #post-0 -->
    
    <?php endif; ?>
  </div>
  <!-- #content --> 
  <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
</section>
<!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
