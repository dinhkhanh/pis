<?php
/**
 * The Template for displaying all single posts.
 */

get_header(); ?>
	<div id="primary">
		<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'single-place' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>
		</div><!-- #content -->
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>