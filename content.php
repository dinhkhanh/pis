<?php

/**

 * The default template for displaying content

 *

 * @package WordPress

 * @subpackage Twenty_Eleven

 * @since Twenty Eleven 1.0

 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php if ( is_sticky() ) : ?>
    <hgroup>
      <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark">
        <?php the_title(); ?>
        </a></h2>
      <h3 class="entry-format">
        <?php _e( 'Featured', 'twentyeleven' ); ?>
      </h3>
    </hgroup>
    <?php else : ?>
    <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark">
            <?php the_title(); ?>
      </a></h1>
    <?php endif; ?>
    <?php if ( 'place' == get_post_type() ) : ?>
      <span>Place</span>
    <?php endif; ?>
    <?php if ( 'event' == get_post_type() ) : ?>
      <span>Event</span>
    <?php endif; ?>

  </header>
  <!-- .entry-header -->

  <?php if ( is_search() ) : // Only display Excerpts for Search ?>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
  <!-- .entry-summary -->

  <?php else : ?>
  <div class="entry-content"> <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Click to read %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
    <?php if (has_post_thumbnail( $post->ID ))
			echo get_the_post_thumbnail( $post->ID, 'thumbnail', array('class'=>'aligncenter post_thumb', 'title'=> trim(strip_tags( $post->post_title ))));
		?>
    </a>
    <?php the_excerpt(); ?>
      <?php if ( 'event' == get_post_type() ) : ?>
      <?php echo get_post_meta($post->ID, 'location', true); ?>
        <?php echo get_post_meta($post->ID, 'start_date', true); ?>
      <?php echo get_post_meta($post->ID, 'end_date', true); ?>

      <?php endif; ?>
    <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
  </div>
  <!-- .entry-content -->

  <?php endif; ?>
</article>
<!-- #post-<?php the_ID(); ?> -->

