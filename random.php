<?php
/*
Template Name: Random Post
Description: 
*/

$args = array('orderby' => 'rand', 'showposts' => 1);
$post = get_posts($args);
header('Location: '.get_permalink($post[0]->ID));