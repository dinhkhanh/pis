<?php

/**

 * The template for displaying content in the single.php template

 *
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <h1 class="entry-title">
      <?php the_title(); ?>
    </h1>
    <?php if ( 'post' == get_post_type() ) : ?>
    <div class="entry-meta">
      <?php	$categories_list = get_the_category_list( __( ', ') );
			if ( $categories_list ): ?>
      <span class="cat-links"> <?php printf( __( '%2$s'), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list ); ?> </span>
      <?php endif; // End if categories ?>
      <?php if ( comments_open() && ! post_password_required() ) : ?>
      <span class="comments-link">
      <?php comments_popup_link( _x( '0', 'comments number'), _x( '1', 'comments number'), _x( '%', 'comments number') ); ?>
      </span>
      <?php endif; ?>
    </div>
    <!-- .entry-meta -->

    <?php endif; ?>
  </header>
  <!-- .entry-header -->

  <div class="entry-content">
    <p style="font-family:Georgia; font-style:italic"><?php echo get_the_date(); ?>,</p>
    <?php if (has_post_thumbnail( $post->ID ))
			echo get_the_post_thumbnail( $post->ID, 'medium', array('class'=>'aligncenter event_thumb', 'title'=> trim(strip_tags( $post->post_title ))));
		?>
    <?php echo get_post_meta($post->ID, 'location', true); ?>
    <?php echo get_post_meta($post->ID, 'address', true); ?>
    <?php the_content(); ?>
    <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:') . '</span>', 'after' => '</div>' ) ); ?>

  </div>
  <!-- .entry-content -->

  <footer class="entry-meta">
    <?php
	$tag_list = get_the_tag_list( '<p class="tag-list">',' ', '</p>');
	if ( '' != $tag_list ) {
		$utility_text = __( '%1$s');
		printf($tag_list );}
	?>
    <?php if ( get_the_author_meta( 'description' )) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
    <div id="author-info">
      <div id="author-avatar"> <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyeleven_author_bio_avatar_size', 68 ) ); ?> </div>
      <!-- #author-avatar -->
      <div id="author-description">
        <h2><?php printf( __( '%s'), get_the_author() ); ?></h2>
        <p><?php the_author_meta( 'description' ); ?></p>
      </div>
      <!-- #author-description -->
      <?php echo dk_social_links(); ?> </div>
    <!-- #entry-author-info -->
    <?php endif; ?>
  </footer>
  <!-- .entry-meta -->

  <nav id="nav-single">
    <h3 class="assistive-text">
      <?php _e( 'Post navigation'); ?>
    </h3>
    <span class="nav-previous">
    <?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Bài trước đó') ); ?>
    </span> <span class="nav-next">
    <?php next_post_link( '%link', __( 'Bài kế tiếp <span class="meta-nav">&rarr;</span>') ); ?>
    </span> </nav>
  <!-- #nav-single -->

</article>

<!-- #post-<?php the_ID(); ?> -->