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
//if (!is_user_logged_in()) {
//    header('Location: '.wp_login_url(home_url()));
//// You page code goes here
//}
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
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="keywords" content="<?php
if (is_singular()): echo wp_get_post_tags($post->ID) . 'dinhkhanhdk, dinhkhanh, tran dinh khanh, khi moc, mốc, khimoc';
else : echo 'dinhkhanhdk, dinhkhanh, tran dinh khanh, khi moc, mốc, khimoc';
endif;
?>">
        <meta name="author" content="Trần Đình Khánh">
        <meta name="viewport" content="width=device-width" />
        <meta property="fb:app_id" content="391869864192445" />
        <meta property="og:type" content="blog" />
        <meta property="og:title" content="PIS - Place Information System" />
        <meta property="og:image" content="<?php
              if (is_singular() && has_post_thumbnail($post->ID)): $url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array(150, 150));
                  echo $url['0'];
              else: echo theme_dir . '/img/avt.jpg';
              endif;
?>" />
        <meta itemprop="name" content="<?php wp_title(''); ?>">
        <meta itemprop="description" content="<?php
              if (is_singular()): echo get_excerpt_by_id($post->ID, 40);
              else : echo 'Place Information System';
              endif;
?>">
        <meta itemprop="image" content="<?php
              if (is_singular() && has_post_thumbnail($post->ID)): $url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array(150, 150));
                  echo $url['0'];
              else: echo theme_dir . '/img/avt.jpg';
              endif;
?>">
        <title><?php
              /*
               * Print the <title> tag based on what is being viewed.
               */
              global $page, $paged;

              wp_title('-', true, 'right');

              // Add the blog name.
              bloginfo('name');

              // Add the blog description for the home/front page.
              $site_description = get_bloginfo('description', 'display');
              if ($site_description && ( is_home() || is_front_page() ))
                  echo " - $site_description";

              // Add a page number if necessary:
              if ($paged >= 2 || $page >= 2)
                  echo ' - ' . sprintf(__('Page %s', 'pis'), max($paged, $page));
?></title>
        <link href="https://plus.google.com/117861443762606356548" rel="publisher" />
        <link href="https://plus.google.com/117861443762606356548" rel="author" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
        <![endif]-->
        <?php
        if (is_singular() && get_option('thread_comments'))
            wp_enqueue_script('comment-reply');
        wp_head();
        ?>
    </head>

    <body <?php body_class(); ?>>
        <nav id="colophon" role="contentinfo">
            <div class="nav-wrapper">
                <ul class="notify_bar alignleft">
                    <li class="notifications"> <a href="<?php echo get_home_url(); ?>"><img src="<?php echo theme_dir; ?>/img/logo.png" width=34 id="logo" /></a> </li>
                    <li class="notifications notify_icon"><h3>Địa điểm</h3>
                        <ul class="notify" id="place_bar">
                            <li><a href="<?php echo get_home_url(); ?>/place/">Tất cả</a></li>
                            <?php if (is_user_logged_in()) { ?>
                                <li><a href="<?php echo get_home_url(); ?>/add-place/">Thêm mới<span class="addpost"></span></a></li>
                            <?php } ?>
                            <?php
                            $places = get_categories('taxonomy=places');
                            foreach ($places as $place) :
                                ?>
                                <li><a href="<?php echo get_term_link($place->slug, 'places') ?>"><?php echo $place->name ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="notifications notify_icon"> <h3>Sự kiện</h3>
                        <ul class="notify" id="event_bar">
                            <li><a href="<?php echo get_home_url(); ?>/event/">Tất cả</a></li>
                            <?php if (is_user_logged_in()) { ?>
                                <li><a href="<?php echo get_home_url(); ?>/add-event/">Thêm mới<span class="addpost"></span></a></li><?php } ?>
                            <?php
                            $events = get_categories('taxonomy=events');
                            foreach ($events as $event) :
                                ?>
                                <li><a href="<?php echo get_term_link($event->slug, 'events') ?>"><?php echo $event->name ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="notifications notify_icon"> <h3>Bài viết</h3>
                        <ul class="notify" id="news-bar">
                            <li><a href="<?php echo get_home_url(); ?>/news/">Tất cả</a></li>
                            <?php if (is_user_logged_in()) { ?>
                                <li><a href="<?php echo get_home_url(); ?>/add-post/">Thêm mới<span class="addpost"></span></a></li> <?php } ?>
                            <?php
                            $news = get_categories();
                            foreach ($news as $new) :
                                ?>
                                <li><a href="<?php echo get_category_link($new->term_id) ?>"><?php echo $new->name ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="notifications notify_icon"> <h3><a href="<?php echo get_home_url(); ?>/map/">Bản đồ</a></h3>
                    </li>
                </ul>
                <ul class="user_bar alignright">
                    <?php
                    if (is_user_logged_in()) {
                        $current_user = wp_get_current_user();
                        ?>
                        <li class="notifications notify_icon"><h3><?php echo get_avatar($current_user->user_email, '32'); ?><?php echo $current_user->display_name; ?></h3>
                            <ul class="notify" id="user_profile_bar">
                                <?php
                                $user_info = get_userdata($current_user->ID);
                                $user_level = $user_info->user_level;
                                if ($user_level == 10) {
                                    ?>
                                    <li>
                                        <a href="<?php echo get_home_url() . '/wp-admin/'; ?>">Trang quản trị</a>
                                    </li>
                                <?php } ?>
                                <li>
                                    <a href="<?php echo get_home_url() . '/author/' . $current_user->user_login; ?>/">Trang cá nhân</a>
                                </li>
                                <li>
                                    <a href="<?php echo get_home_url() . '/my-places/' ?>">Địa điểm của tôi</a>
                                </li>
                                <li>
                                    <a href="<?php echo get_home_url() . '/my-events/' ?>">Sự kiện của tôi</a>
                                </li>
                                <li>
                                    <a href="<?php echo get_home_url() . '/my-posts/' ?>">Bài viết của tôi</a>
                                </li>
                                <li>
                                    <a href="<?php echo get_home_url(); ?>/update-profile/">Cập nhật thông tin</a>
                                </li>
                                <li>
                                    <a href="<?php echo wp_logout_url(home_url()); ?>" title="Logout">Thoát</a>
                                </li>
                            </ul>
                        </li>
                    <?php } else {
                        ?>
                        <li class="notifications notify_icon"><h3><a href="<?php echo get_home_url() . '/register/'; ?>">Đăng ký</a></h3></li>
                        <li class="notifications notify_icon"><h3><a href="<?php echo get_home_url() . '/login/'; ?>">Đăng nhập</a></h3></li>
                    <?php } ?>
                </ul>
                <!--
                 <h3 id='dolly'></h3>
                -->
            </div>
        </nav>
        <div id="page" class="hfeed">
            <header id="branding" role="banner">
                <?php
                // Has the text been hidden?
                if ('blank' == get_header_textcolor()) :
                    ?>
                    <div class="only-search<?php if (!empty($header_image)) : ?> with-image<?php endif; ?>">
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
                <?php if (is_home() || is_archive()||has_shortcode('wpuf_addpost')||has_shortcode('wpuf_dashboard')) { ?>
                    <div id="map_canvas" style="width: 100%; height: 300px; margin-bottom: 1px"></div>
                <?php } ?>

                <?php
//echo get_slide();
//echo user_profile();
                ?>