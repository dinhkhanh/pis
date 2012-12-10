<?php
/*
 * Template Name: Map
 */
get_header();
?>
<div id="map_canvas" style="width: 100%; height: 600px"></div>
<div id="footer" style="background-color: transparent; position: relative; width: 100%"><?php wp_nav_menu(array('theme_location' => 'primary')); ?></div>
<?php get_footer(); ?>