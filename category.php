<?php
get_header(); ?>

<section id="primary">
  <div id="content" role="main">
    <?php if ( have_posts() ) : ?>
    <header class="page-header">
      <h1 class="page-title">
        <?php	printf( __( '%s' ), '<span>' . single_cat_title( '', false ) . '</span>' );	?>
      </h1>
      <?php	$category_description = category_description();
				if ( ! empty( $category_description ) )
					echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
	?>
    </header>
    <?php /* Start the Loop */ ?>
    <?php while ( have_posts() ) : the_post(); ?>
    <?php	get_template_part( 'content', get_post_format() );?>
    <?php endwhile; ?>
    <?php moc_content_nav( 'nav-below' ); ?>
    <?php else : ?>
    <article id="post-0" class="post no-results not-found">
      <header class="entry-header">
        <h1 class="entry-title">
          <?php _e( 'Không tìm thấy' ); ?>
        </h1>
      </header>
      <!-- .entry-header -->

      <div class="entry-content">
        <p>
          <?php _e( 'Không tìm thấy bài viết.' ); ?>
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
