<?php

/**

 * The template for displaying content in the single.php template

 *

 * @package WordPress

 * @subpackage Twenty_Eleven

 * @since Twenty Eleven 1.0

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
  <iframe src="//www.facebook.com/plugins/like.php?href=<?php echo urlencode(the_permalink()); ?>&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=391869864192445" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:92px; height:21px;" allowTransparency="true"></iframe>
    <div class="g-plusone" data-annotation="inline" data-width="300"></div>
    <p style="font-family:Georgia; font-style:italic"><?php echo get_the_date(); ?>,</p>
    <?php the_content(); ?>
    <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:') . '</span>', 'after' => '</div>' ) ); ?>
    
    <iframe src="//www.facebook.com/plugins/like.php?href=<?php echo urlencode(the_permalink()); ?>&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=391869864192445" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:92px; height:21px;" allowTransparency="true"></iframe>
    <div class="g-plusone" data-annotation="inline" data-width="300"></div>
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
    <?php echo dk_related_posts(); ?>
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