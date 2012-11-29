<?php

/**

 * The template for displaying content in the single.php template
 *
 */
$postID = $post->ID*-1;
?>
<div id="sidebar">
    <div class="widget">
        <div id="place_slider">
            <?php place_post_thumbnail($post->ID, -1, 'medium', 'place_slide'); ?>
        </div>
    </div>
    <div class="widget widget_smSticky">
        <h3 class="widget-title">Other posts</h3>
        <?php query_posts(array('post_type' => array('post'), 'posts_per_page' => 5, 'orderby' => 'rand', 'post__not_in'=>array($postID))); ?>

        <?php if (have_posts()) : ?>
            <ul>
                <?php while (have_posts()) : the_post(); ?>
                    <li><a href="<?php the_permalink($post->ID); ?>">
                            <?php
                            if (has_post_thumbnail($post->ID)) {
                                echo get_the_post_thumbnail($post->ID, 'medium', array('class' => 'place_sidebar_thumb', 'title' => trim(strip_tags($post->post_title))));
                            } else {
                                echo '<img class="alignleft event_thumb" src="' . theme_dir . '/img/default_place.jpg" />';
                            }
                            the_title();
                            ?>
                        </a>
                        <div class="clearfix"></div>
                    </li>
                <?php endwhile;
                ?> </ul>
        <?php
            endif;
            wp_reset_query();
            ?>
        </ul>
    </div>
</div>
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