<?php
/*
Template Name: Twitline
Description: Show all feedback
*/

get_header();
?>
<style>
#branding {
	display: none !important;
}
</style>
<div id="twitline">
	<div id="twitleft">
    </div> <!-- end twitleft -->
    <div id="twitright">
    
    </div> <!-- end twitright -->
   	<?php comments_template( '/comments-twitline.php', true ); ?>
</div><!-- end twitline -->
<?php get_footer(); ?>