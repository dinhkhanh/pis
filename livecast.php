<?php
/*
Template Name: Live Blogging
Description: Show all feedback
*/

get_header();
?>
<style>
#branding {
	display: none !important;
}
.liveblog-image {
	text-align: center !important;
}
.liveblog-image img{
	border: 1px solid #ccc;
	border-radius: 3px;
	padding: 5px;
}
.singular.page .hentry {
	padding: 0 0 0 !important;
}
</style>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<h1 class="entry-title"><?php the_title(); ?></h1>
		<h2 style="font-family: Segoe UI Light;font-size: 20px;">Livestream tự động hiển thị tin mới, không cần refresh lại trang</h2>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
<?php comments_template( '', true ); ?>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22715401-1']);
  _gaq.push(['_setDomainName', 'khimoc.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>