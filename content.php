<?php

/**
 * The default template for displaying content
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php if ( is_sticky() ) : ?>
    <hgroup>
      <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark">
        <?php the_title(); ?>
        </a></h2>
        <?php if(current_user_can('edit_posts')) { ?>
            <a href="<?php echo get_edit_post_link($post->ID); ?>" title="Edit">
                <span class="bagde bagde-hot">Edit</span>
            </a>
        <?php } else { ?>
                <span class="bagde bagde-hot">Edit</span>
        <?php } ?>
    </hgroup>
    <?php else : ?>
    <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark">
            <?php the_title(); ?>
      </a></h1>
      <?php if(current_user_can('edit_posts')) { ?>
            <a href="<?php echo get_edit_post_link($post->ID); ?>" title="Edit">
                <span class="bagde bagde-<?php echo get_post_type(); ?>">Edit</span>
            </a>
      <?php } else { ?>
                <span class="bagde bagde-<?php echo get_post_type(); ?>">Edit</span>
        <?php } ?>
    <?php endif; ?>
  </header>
  <!-- .entry-header -->
  <!-- .entry-summary -->
  <div class="entry-content"> <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Click to read %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
    <?php if (has_post_thumbnail( $post->ID ))
			echo get_the_post_thumbnail( $post->ID, 'thumbnail', array('class'=>'aligncenter post_thumb', 'title'=> trim(strip_tags( $post->post_title ))));
		?>
    </a>
      <?php if ('post' == get_post_type()) {
            the_excerpt();
      }?>
      <?php if ( 'event' == get_post_type() ) : ?>
        <p stylte="display: block; float: left;">Địa điểm:
        <?php echo get_post_meta($post->ID, 'location', true); ?>
        <br />
        Kết thúc:
        <?php echo get_post_meta($post->ID, 'end_date', true); ?>
        </p>
      <?php endif; ?>
      <?php if ('place' == get_post_type()) { ?>
          <p style="display: block; float: left;">Địa chỉ:
            <?php echo get_post_meta($post->ID, 'location', true); ?><br />
            Mặt hàng:
              <?php echo get_post_meta($post->ID, 'mainmenu', true); ?></p>
           <?php } ?>
    <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
  </div>
  <!-- .entry-content -->

</article>
<!-- #post-<?php the_ID(); ?> -->

