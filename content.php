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
    <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><span class="incr_number"><?php echo get_post_meta($post->ID,'incr_number',true); ?></span>
      <?php the_title(); ?>
      </a></h1>
    <?php endif; ?>
    <?php if ( 'post' == get_post_type() ) : ?>
    <?php endif; ?>
    <?php

				$categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );
				if ( $categories_list ):

			?>
    <span class="cat-links"> <?php printf( __( '%2$s', 'twentyeleven' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list ); ?> </span>
    <?php endif; // End if categories ?>
    <?php if ( comments_open() && ! post_password_required() ) : ?>
    <div class="comments-link">
      <?php comments_popup_link( _x( '0', 'comments number', 'twentyeleven' ), _x( '1', 'comments number', 'twentyeleven' ), _x( '%', 'comments number', 'twentyeleven' ) ); ?>
    </div>
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
			echo get_the_post_thumbnail( $post->ID, array(150,150), array('class'=>'alignleft post_thumb', 'title'=> trim(strip_tags( $post->post_title ))));
		?>
    </a>
    <?php the_excerpt(); ?>
    <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
  </div>
  <!-- .entry-content -->
  
  <?php endif; ?>
</article>
<!-- #post-<?php the_ID(); ?> --> 

