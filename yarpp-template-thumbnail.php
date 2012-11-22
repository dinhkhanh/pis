<?php /*
Example template for use with post thumbnails
Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>
<?php if (have_posts()):?>
<h3>Xem thêm</h3>
<ul class="related_post">
	<?php while (have_posts()) : the_post(); ?>
		<?php if (has_post_thumbnail()):?>
		<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" ><?php the_post_thumbnail('thumbnail',array('class'=>'post_thumb','title'=>trim(strip_tags( $post->post_title )))); ?></a></li>
		<?php endif; ?>
	<?php endwhile; ?>
</ul>
<?php endif; ?>
