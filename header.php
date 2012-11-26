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
        <meta name="keywords" content="<?php if (is_singular()): echo wp_get_post_tags($post->ID) . 'dinhkhanhdk, dinhkhanh, tran dinh khanh, khi moc, mốc, khimoc'; else : echo 'dinhkhanhdk, dinhkhanh, tran dinh khanh, khi moc, mốc, khimoc'; endif; ?>">
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
                    <li class="notifications notify_icon"><h3 id="logo">Places</h3>
                        <ul class="notify" id="place_bar">
                            <li><a href="<?php echo get_home_url(); ?>/places">All</a>
                            <?php $places = get_categories('taxonomy=place');
                                foreach ($places as $place) : ?>
                            <li><a href="<?php echo get_term_link($place->slug, 'place') ?>"><?php echo $place->name ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="notifications notify_icon"> <h3 id="logo">Events</h3>
                        <ul class="notify" id="event_bar">
                            <li><a href="<?php echo get_home_url(); ?>/event">All</a></li>
                            <?php $events = get_categories('taxonomy=event');
                                foreach ($events as $event) : ?>
                            <li><a href="<?php echo get_term_link($event->slug, 'event') ?>"><?php echo $event->name ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
                <ul class="user_bar alignright">
                    <?php
                    if (is_user_logged_in()) {
                        $current_user = wp_get_current_user();
                        ?>
                        <li class="notifications notify_icon"><h3><?php echo get_avatar($current_user->user_email, '32'); ?><?php echo $current_user->display_name ; ?></h3>
                            <ul class="notify" id="user_profile_bar">
                                <li>
                                    <a href="<?php echo get_home_url() . '/wp-admin/'; ?>">Dashboard</a>
                                </li>
                                <li>
                                    <a href="<?php echo get_home_url() . '/author/' . $current_user->user_login; ?>">Profile</a>
                                </li>
                                <li>
                                    <a href="<?php echo get_home_url(); ?>/wp-admin/profile.php">Update info</a>
                                </li>
                                <li>
                                    <a href="<?php echo wp_logout_url(home_url()); ?>" title="Logout">Logout</a>
                                </li>
                            </ul>
                        </li>
                    <?php } else {
                        ?>
                        <li class="notifications notify_icon"><h3><a href="<?php echo get_home_url().'/register'; ?>">Register</a></h3></li>
                        <li class="notifications notify_icon"><h3><a href="<?php echo get_home_url().'/login'; ?>">Login</a></h3></li>
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
                <!--<iframe width="1000" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Da+Nang,+Vietnam&amp;aq=0&amp;oq=Da+na&amp;sll=37.0625,-95.677068&amp;sspn=60.806372,135.263672&amp;ie=UTF8&amp;hq=&amp;hnear=Thanh+Kh%C3%AA,+Da+Nang,+Vietnam&amp;t=m&amp;ll=16.051587,108.214903&amp;spn=0.02887,0.085831&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>-->

                <?php
//echo get_slide();
//echo user_profile();
                ?>