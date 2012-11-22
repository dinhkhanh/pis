<?php

/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" lang="vi-VN">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" lang="vi-VN">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" lang="vi-VN">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html lang="vi-VN" xmlns:fb="https://www.facebook.com/2008/fbml" itemscope itemtype="http://schema.org/Blog">
<!--<![endif]-->
<head prefix="og: http://ogp.me/ns# Blog:http://ogp.me/ns/apps/khimoccom#" profile="http://gmpg.org/xfn/11">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="keywords" content="<?php if (is_singular()): echo wp_get_post_tags($post->ID). 'dinhkhanhdk, dinhkhanh, tran dinh khanh, khi moc, mốc, khimoc'; else : echo 'dinhkhanhdk, dinhkhanh, tran dinh khanh, khi moc, mốc, khimoc'; endif;?>">
<meta name="author" content="Trần Đình Khánh">
<meta name="viewport" content="width=device-width" />
<meta property="fb:app_id" content="391869864192445" />
<meta property="og:type" content="blog" />
<meta property="og:title" content="<?php wp_title( '' ); ?>" />
<meta property="og:image" content="<?php if ( is_singular() && has_post_thumbnail($post->ID)): $url= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array(150,150) ); echo $url['0']; else: echo theme_dir . '/img/avt.jpg'; endif; ?>" />
<meta itemprop="name" content="<?php wp_title( '' ); ?>">
<meta itemprop="description" content="<?php if (is_singular()): echo get_excerpt_by_id($post->ID, 40); else : echo 'Gọi là Mốc, Gốc Hà Tĩnh, Sinh Đăk Lăk, Lớn Đăk Nông, Sống Sài Gòn, đang lon ton ở Đà Nẵng. Là Social Media Executive tại VNG Corporation.'; endif;?>">
<meta itemprop="image" content="<?php if ( is_singular() && has_post_thumbnail($post->ID)): $url= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array(150,150) ); echo $url['0']; else: echo theme_dir . '/img/avt.jpg'; endif; ?>">
<title>
<?php wp_title( '' ); ?>
</title>
<link href="https://plus.google.com/117861443762606356548" rel="publisher" />
<link href="https://plus.google.com/117861443762606356548" rel="author" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<nav id="colophon" role="contentinfo">
<div class="nav-wrapper">
  <ul class="notify_bar aligncenter">
    <li class="notifications"> <a href="<?php echo get_home_url(); ?>"><img src="<?php echo theme_dir; ?>/img/logo.png" width=34 id="logo" /></a> </li>
    <!--<li class="notifications notify_icon">
      <h3 id="recent_comment_icon">Bình luận mới</h3>
      <?php //get_recent_comments();?>
    </li>-->
    <li class="notifications notify_icon">
      <h3 id="recent_post_icon">Bài viết mới</h3>
      <?php dk_recent_posts();?>
    </li>
    <li class="notifications notify_icon">
      <h3 id="dk_social_links_icon">
        Connecting
      </h3>
      <?php echo_dk_social_links();?> </li>
      
    <li class="notifications notify_icon large-link">
    	<h3><a href="<?php echo home_url(); ?>/about">Lời ngỏ</a></h3>
    </li>
    <li class="notifications notify_icon large-link">
    	<h3><a href="<?php echo home_url(); ?>/timeline">Tiểu sử</a></h3>
    </li>
    <!-- <li class="notifications notify_icon">
      <h3 id="contact_form_icon">Viết cảm nhận</h3>
      <?php //contact_form();?>
    </li>-->
    <li class="notifications notify_icon">
      <?php //if you do not use W3 Total Cache, use dk_random_post_no_cache_plugin function
				//if you use W3 Total Cache, use Random Post template instead
				//dk_random_post_no_cache_plugin();
				dk_random_post_cache_plugin();
			?>
    </li>
    <li class="notifications notify_icon">
    	<h3>Gió mang tôi đi tìm em</h3>
    </li>
  </ul>
  <!--
   <h3 id='dolly'></h3>
--> 
</div>
</nav>
<div id="page" class="hfeed">
<header id="branding" role="banner">
  <?php // Has the text been hidden?
		if ( 'blank' == get_header_textcolor() ) :
?>
  <div class="only-search<?php if ( ! empty( $header_image ) ) : ?> with-image<?php endif; ?>">
    <?php get_search_form(); ?>
  </div>
  <?php
		else :
			?>
  <?php get_search_form(); ?>
  <?php endif; ?>
  <!--
  <nav id="access" role="navigation">
  </nav>
  <!-- #access --> 
  
</header>
<!-- #branding -->

<div id="main">
<div id="jquery_jplayer_1" class="jp-jplayer"></div>
		<div class="jp-audio-container">
			<div class="jp-audio">
				<div class="jp-type-single">
					<div id="jp_interface_1" class="jp-interface">
						<ul class="jp-controls">
							<li><a href="#" class="jp-play" tabindex="1">play</a></li>
							<li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
							<li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
							<li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
						</ul>
						<div class="jp-progress-container">
							<div class="jp-progress">
								<div class="jp-seek-bar">
									<div class="jp-play-bar"></div>
								</div>
							</div>
						</div>
						<div class="jp-volume-bar-container">
							<div class="jp-volume-bar">
								<div class="jp-volume-bar-value"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php echo get_slide(); 
echo user_profile();
?>