<?php
define('theme_dir', dirname(get_bloginfo('stylesheet_url')));

//define('theme_dir', 'http://www.facemoc.com/themes');
register_nav_menu('primary', __('Primary Menu'));
register_nav_menu('secondary', __('Secondary Menu'));
add_theme_support('post-thumbnails');

function add_custom_meta_box() {
    add_meta_box('custom_meta_box', 'Place Details', 'show_place_meta_box', 'place', 'normal', 'high');
    add_meta_box('event_metabox', 'Event Details', 'show_event_meta_box', 'event', 'normal', 'high');
}

add_action('add_meta_boxes', 'add_custom_meta_box');

function show_event_meta_box() {
    global $post;
    $start_date = get_post_meta($post->ID, 'start_date', true);
    $start_time = get_post_meta($post->ID, 'start_time', true);
    $end_date = get_post_meta($post->ID, 'end_date', true);
    $end_time = get_post_meta($post->ID, 'end_time', true);
    $location = get_post_meta($post->ID, 'location', true);
    $host = get_post_meta($post->ID, 'host', true);
    echo '<form>';
    echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';
    echo '<table class="form-table">
        <tr>
            <th><label for="start_date">Start Date</label></th>
            <td>
                <input type="date" required="required" name="start_date" id="start_date" value="' . $start_date . '"/>
                    <br /><span class="description">When will this event start? *required</span>
            </td>
        </tr>';
    echo '
        <tr>
            <th><label for="start_time">Start Time</label></th>
            <td>
                <input type="text" name="start_time" id="start_time" value="' . $start_time . '"/>
                    <br /><span class="description">What time will this event start?</span>
            </td>
        </tr>';
    echo '<tr>
            <th><label for="end_date">End Date</label></th>
            <td>
                <input type="date" required="required" name="end_date" id="end_date" value="' . $end_date . '" />
                <br /><span class="description">When will this event end? *required</span>
            </td>
        </tr>';
    echo '
        <tr>
            <th><label for="end_time">End Time</label></th>
            <td>
                <input type="text" name="end_time" id="end_time" value="' . $end_time . '"/>
                    <br /><span class="description">What time will this event end?</span>
            </td>
        </tr>';
    echo '<tr>
            <th><label for="location">Host</label></th>
            <td>
                <input type="text" name="host" id="host" required="required" value="' . $host . '" />
                    <br /><span class="description">Who host this event? *required</span>
            </td>
        </tr>';
    echo '<tr>
            <th><label for="location">Location</label></th>
            <td>
                <input type="text" name="location" id="location" required="required" value="' . $location . '" />
                    <br /><span class="description">Where will this event happen? *required</span>
            </td>
        </tr>';
    echo '</table>'; // end table
    echo '</form>';
}

function show_place_meta_box() {
    global $post;
    $location = get_post_meta($post->ID, 'location', true);
    $pros = get_post_meta($post->ID, 'pros', true);
    $cons = get_post_meta($post->ID, 'cons', true);
    $website = get_post_meta($post->ID, 'website', true);
    $open = get_post_meta($post->ID, 'open', true);
    $phone = get_post_meta($post->ID, 'phone', true);
    $menu = get_post_meta($post->ID, 'mainmenu', true);
    $cost = get_post_meta($post->ID, 'cost', true);
    $values = get_post_custom($post->ID);
    $rating = isset($values['rating']) ? esc_attr($values['rating'][0]) : "";
    $check = isset($values['verified']) ? esc_attr($values['verified'][0]) : "";
    ?>
    <form>
        <input type="hidden" name="custom_meta_box_nonce" value="<?php echo wp_create_nonce(basename(__FILE__)); ?>" />
        <table class="form-table">
            <tr>
                <th><label for="location">Address</label></th>
                <td>
                    <input type="text" required="required" name="location" id="location" value="<?php echo $location; ?>"/>
                    <br /><span class="description">Where is this place? *required</span>
                </td>
            </tr>
            <tr>
                <th><label for="pros">Advantage</label></th>
                <td>
                    <textarea type="text" required="required" name="pros" id="pros" value=""><?php echo $pros; ?></textarea>
                    <br /><span class="description">What are this place\'s advantages? *required</span>
                </td>
            </tr>
            <tr>
                <th><label for="cons">Weakness</label></th>
                <td>
                    <textarea type="text" required="required" name="cons" id="cons" value="" ><?php echo $cons; ?></textarea>
                    <br /><span class="description">What are this place\'s disadvantages? *required</span>
                </td>
            </tr>
            <tr>
                <th><label for="open">Open Hours</label></th>
                <td>
                    <input type="text" name="open" id="open" required="required" value="<?php echo $open; ?>" />
                    <br /><span class="description">Who host this event? *required</span>
                </td>
            </tr>
            <tr>
                <th><label for="mainmenu">Main Products</label></th>
                <td>
                    <input type="text" name="mainmenu" id="mainmenu" value="<?php echo $menu; ?>" />
                    <br /><span class="description">What are main menu of this place?</span>
                </td>
            </tr>
            <tr>
                <th><label for="cost">Cost Range</label></th>
                <td>
                    <input type="text" name="cost" id="cost" value="<?php echo $cost; ?>" />
                    <br /><span class="description">What is cost range of this place?</span>
                </td>
            </tr>
            <tr>
                <th><label for="website">Website</label></th>
                <td>
                    <input type="text" name="website" id="website" value="<?php echo $website; ?>"/>
                    <br />
                </td>
            </tr>
            <tr>
                <th><label for="phone">Phone Number</label></th>
                <td>
                    <input type="text" name="phone" id="phone" value="<?php echo $phone; ?>" />
                    <br />
                </td>
            </tr>
            <tr>
                <th>
                    <label for="rating">Rating</label>
                </th>
                <td>
                    <select name="rating" id="rating">
                        <option value="1" <?php selected($rating, '1'); ?>>1</option>
                        <option value="2" <?php selected($rating, '2'); ?>>2</option>
                        <option value="3" <?php selected($rating, '3'); ?>>3</option>
                        <option value="4" <?php selected($rating, '4'); ?>>4</option>
                        <option value="5" <?php selected($rating, '5'); ?>>5</option>
                    </select>
                </td>
            </tr>
            <?php if (current_user_can('edit_others_posts')) { ?>
                <tr>
                    <th> <label for="verifed">Verified?</label>  </th>
                    <td>
                        <input type="checkbox" id="verified" name="verified" <?php checked($check, 'on'); ?> />
                    </td>
                </tr>
                <?php
            }
            echo '</table>'; // end table
            echo '</form>';
        }

// Save the Data
        function save_event_meta() {
            $post_id = $_POST['post_ID'];
            // verify nonce
            if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
                return $post_id;
            // check autosave
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
                return $post_id;
            // check permissions
            if ('page' == $_POST['post_type']) {
                if (!current_user_can('edit_page', $post_id))
                    return $post_id;
            } elseif (!current_user_can('edit_post', $post_id)) {
                return $post_id;
            }
            if ('event' == $_POST['post_type']) {
                $start_date = $_POST['start_date'];
                add_post_meta($post_id, 'start_date', $start_date, true);
                update_post_meta($post_id, 'start_date', $start_date);

                $start_time = $_POST['start_time'];
                add_post_meta($post_id, 'start_time', $start_time, true);
                update_post_meta($post_id, 'start_time', $start_time);

                $end_date = $_POST['end_date'];
                add_post_meta($post_id, 'end_date', $end_date, true);
                update_post_meta($post_id, 'end_date', $end_date);

                $end_time = $_POST['end_time'];
                add_post_meta($post_id, 'end_time', $end_time, true);
                update_post_meta($post_id, 'end_time', $end_time);

                $location = $_POST['location'];
                add_post_meta($post_id, 'location', $location, true);
                update_post_meta($post_id, 'location', $location);

                $host = $_POST['host'];
                add_post_meta($post_id, 'host', $host, true);
                update_post_meta($post_id, 'host', $host);
            }
        }

        function save_place_meta() {
            $post_id = $_POST['post_ID'];
            // verify nonce
            if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
                return $post_id;
            // check autosave
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
                return $post_id;
            // check permissions
            if ('page' == $_POST['post_type']) {
                if (!current_user_can('edit_page', $post_id))
                    return $post_id;
            } elseif (!current_user_can('edit_post', $post_id)) {
                return $post_id;
            }
            if ('place' == $_POST['post_type']) {
                $pros = $_POST['pros'];
                add_post_meta($post_id, 'pros', $pros, true);
                update_post_meta($post_id, 'pros', $pros);

                $cons = $_POST['cons'];
                add_post_meta($post_id, 'cons', $cons, true);
                update_post_meta($post_id, 'cons', $cons);

                $open = $_POST['open'];
                add_post_meta($post_id, 'open', $open, true);
                update_post_meta($post_id, 'open', $open);

                $website = $_POST['website'];
                add_post_meta($post_id, 'website', $website, true);
                update_post_meta($post_id, 'website', $website);

                $location = $_POST['location'];
                add_post_meta($post_id, 'location', $location, true);
                update_post_meta($post_id, 'location', $location);

                $phone = $_POST['phone'];
                add_post_meta($post_id, 'phone', $phone, true);
                update_post_meta($post_id, 'phone', $phone);

                $rating = $_POST['rating'];
                add_post_meta($post_id, 'rating', $rating, true);
                update_post_meta($post_id, 'rating', $rating);

                $verified = $_POST['verified'];
                add_post_meta($post_id, 'verified', $verified, true);
                update_post_meta($post_id, 'verified', $verified);

                $mainmenu = $_POST['mainmenu'];
                add_post_meta($post_id, 'mainmenu', $mainmenu, true);
                update_post_meta($post_id, 'mainmenu', $mainmenu);

                $cost = $_POST['cost'];
                add_post_meta($post_id, 'cost', $cost, true);
                update_post_meta($post_id, 'cost', $cost);
            }
        }

        add_action('save_post', 'save_event_meta');
        add_action('save_post', 'save_place_meta');


        add_action('init', 'create_post_type');

        function create_post_type() {
            register_post_type('place', array(
                'labels' => array(
                    'name' => __('Places'),
                    'singular_name' => __('Place'),
                    'add_new' => 'Add Place',
                    'add_new_item' => 'Add New Place',
                    'edit' => 'Edit',
                    'edit_item' => 'Edit Place',
                    'new_item' => 'New Place',
                    'view_item' => 'View Place',
                    'search_items' => 'Search Place',
                    'not_found' => 'No place Found',
                    'not_found_in_trash' => 'No place found in trash'
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'place'),
                'supports' => array('title',
                    'author',
                    'excerpt',
                    'thumbnail',
                    'comments',
                    'editor',
                    'trackbacks',
                    'custom-fields',
                    'revisions'),
                'show_in_nav_menus' => true,
                'taxonomies' => array('places', 'post_tag', 'link_category')
                    )
            );
            register_post_type('event', array(
                'labels' => array(
                    'name' => __('Events'),
                    'singular_name' => __('Event'),
                    'add_new' => 'Add Event',
                    'add_new_item' => 'Add New Event',
                    'edit' => 'Edit',
                    'edit_item' => 'Edit Event',
                    'new_item' => 'New Event',
                    'view_item' => 'View Event',
                    'search_items' => 'Search Event',
                    'not_found' => 'No event Found',
                    'not_found_in_trash' => 'No event found in trash'
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'event'),
                'supports' => array('title',
                    'author',
                    'excerpt',
                    'thumbnail',
                    'comments',
                    'editor',
                    'trackbacks',
                    'custom-fields',
                    'revisions'),
                'show_in_nav_menus' => true,
                'taxonomies' => array('events', 'post_tag', 'link_category')
                    )
            );
        }

        add_action('init', 'create_taxonomies', 0);

//create two taxonomies, genres and writers for the post type "book"
        function create_taxonomies() {
            // Add new taxonomy, make it hierarchical (like categories)
            $labels_place = array(
                'name' => _x('Place Categories', 'taxonomy general name'),
                'singular_name' => _x('Place Category', 'taxonomy singular name'),
                'search_items' => __('Search Places Category'),
                'all_items' => __('All Places Category'),
                'parent_item' => __('Parent Place Category'),
                'parent_item_colon' => __('Parent Place Category:'),
                'edit_item' => __('Edit Place Category'),
                'update_item' => __('Update Place Category'),
                'add_new_item' => __('Add New Place Category'),
                'new_item_name' => __('New Place Name Category'),
                'menu_name' => __('Place Categories'),
            );

            register_taxonomy('places', 'place', array(
                'hierarchical' => true,
                'labels' => $labels_place,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'places'),
            ));

            $labels_event = array(
                'name' => _x('Events', 'taxonomy general name'),
                'singular_name' => _x('Event', 'taxonomy singular name'),
                'search_items' => __('Search Events Category'),
                'all_items' => __('All Events Category'),
                'parent_item' => __('Parent Event Category'),
                'parent_item_colon' => __('Parent Event Category:'),
                'edit_item' => __('Edit Event Category'),
                'update_item' => __('Update Event Category'),
                'add_new_item' => __('Add New Event Category'),
                'new_item_name' => __('New Event Name'),
                'menu_name' => __('Event Categories'),
            );

            register_taxonomy('events', 'event', array(
                'hierarchical' => true,
                'labels' => $labels_event,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'events'),
            ));
        }

        if (!function_exists('moc_widgets_init')):

            function moc_widgets_init() {
                register_sidebar(array(
                    'name' => __('Main Sidebar'),
                    'id' => 'sidebar-1',
                    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                    'after_widget' => "</aside>",
                    'before_title' => '<h3 class="widget-title">',
                    'after_title' => '</h3>',
                ));
            }

            add_action('widgets_init', 'moc_widgets_init');
        endif;

        function place_post_thumbnail($postID, $number, $size, $class) {
            $args = array(
                'post_type' => 'attachment',
                'numberposts' => $number,
                'post_status' => null,
                'post_parent' => $postID
            );
            $attachments = get_posts($args);
            if ($attachments) {
                foreach ($attachments as $attachment) {
                    echo wp_get_attachment_image($attachment->ID, $size, false, array(
                        'class' => $class,
                        'title' => trim(strip_tags(get_the_title($postID)))));
                }
            }
        }

        if (!function_exists('glb_scripts_method')):

            function glb_scripts_method() {
                wp_deregister_script('jquery');
                wp_enqueue_script('jquery', theme_dir . '/js/jquery.min.js');
                // wp_enqueue_script('masonry', theme_dir . '/js/masonry.js', NULL, NULL, true);
                wp_enqueue_script('jplayermain', theme_dir . '/js/jquery.jplayer.min.js', NULL, NULL, true);
                wp_enqueue_script('jquery_every', theme_dir . '/js/jquery.every.js', NULL, NULL, true);
                wp_enqueue_script('jquery_easing', theme_dir . '/js/jquery.easing.1.3.js', NULL, NULL, true);
                wp_enqueue_script('modern', theme_dir . '/js/modernizr.custom.26887.js', NULL, NULL, true);
                wp_enqueue_script('transit', theme_dir . '/js/jquery.transit.min.js', NULL, NULL, true);
                wp_enqueue_script('grid', theme_dir . '/js/jquery.gridrotator.js', NULL, NULL, true);
                wp_enqueue_script('gridconf', theme_dir . '/js/grid.js', NULL, NULL, true);
                wp_enqueue_script('nivo', theme_dir . '/js/jquery.nivo.slider.pack.js', NULL, NULL, true);

                if (is_single() || is_page()) {
                    //wp_enqueue_script('jquerySingle', theme_dir . '/js/script.single.js', NULL, NULL, true);
                    wp_enqueue_script('jplayerconf', theme_dir . '/js/jplayer.config.single.js', NULL, NULL, true);
                } else {
                    wp_enqueue_script('jplayerconf', theme_dir . '/js/jplayer.config.js', NULL, NULL, true);
                }
                if (is_home()) {
                    // wp_enqueue_script('masonryconf', theme_dir . '/js/masonry-conf.js', NULL, NULL, true);
                }
                if (is_archive()) {
                    wp_enqueue_script('slide', theme_dir . '/js/jquery.slidorion.min.js', NULL, NULL, true);
                    wp_enqueue_script('slideconf', theme_dir . '/js/slide.js', NULL, NULL, true);
                }
            }

            add_action('wp_enqueue_scripts', 'glb_scripts_method');
        endif;

        if (!function_exists('scroll_to_top')):

            function scroll_to_top() {
                ?>
                <div style="display:none;" class="nav_up" id="nav_up"></div>
                <div style="display:none;" class="nav_down" id="nav_down"></div>
                <?php
            }

            add_action('wp_footer', 'scroll_to_top');
        endif;
        if (!function_exists('favicon_link')):

            function favicon_link() {
                echo '<link rel="shortcut icon" type="image/x-icon" href="' . theme_dir . '/img/favicon.ico" />' . "\n";
                echo '<meta property="fb:admins" content="100000965423245" />';
                echo '<link rel="stylesheet" type="text/css" href="' . theme_dir . '/css/slidorion.css" />';
                if (is_home()) {
                    echo '<link rel="image_src" href="' . theme_dir . '/img/avt.jpg" />' . "\n";
                } //is_home()
            }

            add_action('wp_head', 'favicon_link');
        endif;

        function hwl_home_pagesize($query) {
            if (is_admin() || !$query->is_main_query())
                return;
            if (is_home()) {
                $query->set('post_type', array('post', 'event', 'place'));
                $query->set('orderby', 'rand');
                $query->set('ignore_sticky_posts', 1);
                return;
            }
        }

        add_action('pre_get_posts', 'hwl_home_pagesize', 1);

        function remove_roles() {

        }

        add_action('init', 'remove_roles');
        if (!function_exists('get_slide')):

            function get_slide() {
                $args = array(
                    'numberposts' => 20,
                    'offset' => 0,
                    'orderby' => 'rand',
                    'order' => 'DESC',
                    'post_type' => 'post',
                    'post_status' => 'publish'
                );
                $posts = get_posts($args);
                echo '<div id="ri-grid" class="ri-grid ri-grid-size-2"><ul>';
                foreach ($posts as $post):
                    ?>
                    <li><a href="<?php echo get_permalink($post->ID); ?>" rel="bookmark">
                            <?php
                            if (has_post_thumbnail($post->ID))
                                echo get_the_post_thumbnail($post->ID, array(150, 150), array('class' => 'alignleft grid_thumb', 'title' => trim(strip_tags($post->post_title)))) . '</a></li>';
                        endforeach;
                        echo '</ul></div>';
                    }

                endif;

                if (!function_exists('user_profile')):

                    function user_profile() {
                        global $wpdb;
                        $admin = get_userdata(1);
                        $nhatky = get_category(141, array('slug, count,name'));
                        $thoca = get_category(301, array('slug, count,name'));
                        $numcomms = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1'");
                        if (0 < $numcomms)
                            $numcomms = number_format($numcomms);
                        ?>
                        <div id="userProfile">
                            <div class="avatar-container"><a href="<?php echo home_url(); ?>" rel="bookmark"> <span class="user-avatar"><img src="<?php echo theme_dir; ?>/img/avt.jpg"></span> <span class="nickname"><?php echo $admin->display_name; ?></span></a> </div>
                            <div class="user-info">
                                <h1 class="user-name"><?php echo $admin->user_firstname . ' ' . $admin->user_lastname; ?></h1>
                                <h4 class="user-desc"><?php echo $admin->user_description; ?></h4>
                                <p id='dolly'></p>
                            </div>
                            <div class="user-stat">
                                <ul>
                                    <li><?php echo '<a href="' . home_url("/") . $nhatky->slug . '"><span class="stat-number">' . $nhatky->count . '</span><span>' . $nhatky->name . '</span></a>'; ?></li>
                                    <li><?php echo '<a href="' . home_url("/") . $thoca->slug . '"><span class="stat-number">' . $thoca->count . '</span><span>' . $thoca->name . '</span></a>'; ?></li>
                                    <li><?php echo '<span class="stat-number">' . $numcomms . '</span><span>Bình luận</span>'; ?></li>
                                </ul>
                            </div>
                        </div>
                        <?php
                    }

                endif;

                if (!function_exists('twitline_comment')):

                    function twitline_comment($comment, $args, $depth) {
                        $GLOBALS['comment'] = $comment;
                        switch ($comment->comment_type):
                            case 'pingback':
                            case 'trackback':
                                ?>
                                <li class="post pingback" style="display: none;">
                                    <p>
                                        <?php
                                        _e('Pingback:');
                                        comment_author_link();
                                        edit_comment_link(__('Edit'), '<span class="edit-link">', '</span>');
                                        ?>
                                    </p>
                                    <?php
                                    break;
                                default:
                                    ?>
                                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                                    <article id="comment-<?php comment_ID(); ?>" class="comment">
                                        <footer class="comment-meta">
                                            <div class="comment-author vcard">
                                                <?php
                                                if ('0' == $comment->comment_parent)
                                                    echo get_avatar($comment, 64);
                                                /* translators: 1: comment author, 2: date and time */
                                                printf(__('%1$s on %2$s <span class="says">said:</span>'), sprintf('<span class="fn">%s</span>', get_comment_author_link()), sprintf('<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>', esc_url(get_comment_link($comment->comment_ID)), get_comment_time('c'), /* translators: 1: date, 2: time */ sprintf(__('%1$s at %2$s'), get_comment_date(), get_comment_time())));
                                                edit_comment_link(__('Edit'), '<span class="edit-link">', '</span>');
                                                ?>
                                            </div>
                                            <!-- .comment-author .vcard -->
                                            <?php if ($comment->comment_approved == '0'): ?>
                                                <em class="comment-awaiting-moderation">
                                                    <?php _e('Your comment is awaiting moderation.'); ?>
                                                </em> <br />
                                            <?php endif; ?>
                                        </footer>
                                        <div class="comment-content">
                                            <?php comment_text(); ?>
                                        </div>
                                        <?php if (is_user_logged_in()): ?>
                                            <div class="reply">
                                                <?php
                                                comment_reply_link(array_merge($args, array(
                                                            'reply_text' => __('Reply <span>&darr;</span>'),
                                                            'depth' => $depth,
                                                            'max_depth' => $args['max_depth']
                                                        )));
                                                ?>
                                            </div>
                                            <!-- .reply -->
                                        <?php endif; ?>
                                    </article>
                                    <!-- #comment-## -->
                                    <?php
                                    break;
                            endswitch;
                        }

                    endif;

                    if (!function_exists('updateNumbers')):

                        function updateNumbers() {
                            global $wpdb;
                            $querystr = "SELECT $wpdb->posts.* FROM $wpdb->posts WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'post' ";
                            $pageposts = $wpdb->get_results($querystr, OBJECT);
                            $counts = 0;
                            if ($pageposts):
                                foreach ($pageposts as $post):
                                    setup_postdata($post);
                                    $counts++;
                                    add_post_meta($post->ID, 'incr_number', $counts, true);
                                    update_post_meta($post->ID, 'incr_number', $counts);
                                endforeach;
                            endif;
                        }

                        add_action('publish_post', 'updateNumbers');
                        add_action('deleted_post', 'updateNumbers');
                        add_action('edit_post', 'updateNumbers');
                        add_action('save_post', 'updateNumbers');
                    endif;
                    if (!function_exists('new_nav_menu_items')):

                        function new_nav_menu_items($items) {
                            $homelink = '<li class="logo"><a href="' . home_url('/') . '"><img src="' . theme_dir . '/img/avt.jpg" /></a></li>';
                            $items = $homelink . $items;
                            return $items;
                        }

                    // add_filter('wp_list_pages', 'new_nav_menu_items');
                    //add_filter('wp_nav_menu_items', 'new_nav_menu_items');
                    endif;
                    if (!function_exists('dk_addgravatar')) {

                        function dk_addgravatar($avatar_defaults) {
                            $myavatar = theme_dir . '/img/avatar.gif';
                            $avatar_defaults[$myavatar] = 'Mốc';
                            return $avatar_defaults;
                        }

                        add_filter('avatar_defaults', 'dk_addgravatar');
                    } //!function_exists('fb_addgravatar')


                    if (!function_exists('moc_content_nav')) :

                        function moc_content_nav($nav_id) {
                            global $wp_query;
                            if ($wp_query->max_num_pages > 1) :
                                ?>
                                <nav id="<?php echo $nav_id; ?>">
                                    <?php next_posts_link(__('More&hellip;')); ?>
                                </nav>
                                <!-- #nav-above -->
                                <?php
                            endif;
                        }

                    endif; // moc_content_nav

                    if (!function_exists('moc_comment')):

                        function moc_comment($comment, $args, $depth) {
                            $GLOBALS['comment'] = $comment;
                            switch ($comment->comment_type):
                                case 'pingback':
                                case 'trackback':
                                    ?>
                                <li class="post pingback">
                                    <p>
                                        <?php
                                        _e('Pingback:');
                                        comment_author_link();
                                        edit_comment_link(__('Edit'), '<span class="edit-link">', '</span>');
                                        ?>
                                    </p>
                                </li>
                                <?php
                                break;
                            default:
                                ?>
                                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                                    <article id="comment-<?php comment_ID(); ?>" class="comment">
                                        <footer class="comment-meta">
                                            <div class="comment-author vcard">
                                                <?php
                                                printf(__('%1$s %2$s'), sprintf('<span class="fn">%s</span>', get_comment_author_link()), sprintf('<span class="date_fn"><a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a></span>', esc_url(get_comment_link($comment->comment_ID)), get_comment_time('c'), sprintf(__('%1$s at %2$s'), get_comment_date(), get_comment_time())));
                                                echo comment_reply_link(array_merge($args, array(
                                                            'reply_text' => __('Reply <span>&darr;</span>'),
                                                            'depth' => $depth,
                                                            'max_depth' => $args['max_depth']
                                                        )));
                                                $avatar_size = 64;
                                                if ('0' != $comment->comment_parent)
                                                    $avatar_size = 64;
                                                echo get_avatar($comment, $avatar_size);
                                                ?>
                                            </div>
                                            <!-- .comment-author .vcard -->
                                            <?php if ($comment->comment_approved == '0'): ?>
                                                <em class="comment-awaiting-moderation">
                                                    <?php _e('Your comment is awaiting moderation.'); ?>
                                                </em> <br />
                                            <?php endif; ?>

                                        </footer>
                                        <div class="comment-content">
                                            <?php comment_text(); ?>
                                        </div>

                                        <!-- .reply -->
                                    </article>
                                    <!-- #comment-## -->
                                    <?php
                                    break;
                            endswitch;
                        }

                    endif;


                    if (!function_exists('new_length')):

                        function new_length($length) {
                            return 20;
                        }

                        add_filter('excerpt_length', 'new_length');
                    endif;

                    if (!function_exists('new_continue_reading_link')):

                        function new_continue_reading_link() {
                            return ' <a class="more-links" href="' . esc_url(get_permalink()) . '">' . __(get_the_date() . '<span style="font-size: 134%">&rarr;</span>') . '</a>';
                        }

                    endif;

                    if (!function_exists('new_auto_excerpt_more')):

                        function new_auto_excerpt_more($more) {
                            return ' &hellip;' . new_continue_reading_link();
                        }

                        //add_filter('excerpt_more', 'new_auto_excerpt_more');
                        add_action('show_user_profile', 'extra_user_profile_fields');
                        add_action('edit_user_profile', 'extra_user_profile_fields');
                    endif;


                    if (!function_exists('extra_user_profile_fields')):

                        function extra_user_profile_fields($user) {
                            ?>
                            <h3>
                                <?php
                                _e("Your informations", "blank");
                                ?>
                            </h3>
                            <table class="form-table">
                                <tr>
                                    <th><label for="gender">
                                            <?php _e("Gender"); ?>
                                        </label></th>
                                    <td>
                                        <?php $gender = esc_attr(get_the_author_meta('gender', $user->ID)); ?>
                                        <select name="gender" id="gender">
                                            <option value="1" <?php selected($gender, '1'); ?>>Male</option>
                                            <option value="2" <?php selected($gender, '2'); ?>>Female</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <th><label for="age">
                                            <?php _e("Age"); ?>
                                        </label></th>
                                    <td><input type="text" name="age" id="age" value="<?php echo esc_attr(get_the_author_meta('age', $user->ID)); ?>" class="regular-text" /></td>
                                </tr>
                                <tr>
                                    <th><label for="user_address">
                                            <?php _e("Address"); ?>
                                        </label></th>
                                    <td><input type="text" name="user_address" id="user_address" value="<?php echo esc_attr(get_the_author_meta('user_address', $user->ID)); ?>" class="regular-text" /></td>
                                </tr>
                            </table>
                            <?php
                        }

                        add_action('personal_options_update', 'save_extra_user_profile_fields');
                        add_action('edit_user_profile_update', 'save_extra_user_profile_fields');
                    endif;
                    if (!function_exists('save_extra_user_profile_fields')):

                        function save_extra_user_profile_fields($user_id) {
                            if (!current_user_can('edit_user', $user_id)) {
                                return false;
                            } //!current_user_can('edit_user', $user_id)
                            update_usermeta($user_id, 'gender', $_POST['gender']);
                            update_usermeta($user_id, 'age', $_POST['age']);
                            update_usermeta($user_id, 'user_address', $_POST['user_address']);
                        }

                    endif;

                    if (!function_exists('dk_social_links')):

                        function dk_social_links() {
                            $user = get_userdata(1);
                            echo '<ul class="social_links">';
                            echo ($user->dk_zingme != '') ? '<li class="zingme"><a class="vtip" title="I\'m on Zing Me" href="' . $user->dk_zingme . '" target="_blank"><span></span></a></li>' : "";
                            echo ($user->dk_facebook != '') ? '<li class="facebook"><a class="vtip" title="I\'m on Facebook" href="' . $user->dk_facebook . '" target="_blank"><span></span></a></li>' : "";
                            echo ($user->dk_twitter != '') ? '<li class="twitter"><a class="vtip" title="I\'m on Twitter" href="' . $user->dk_twitter . '" target="_blank"><span></span></a></li>' : "";
                            echo ($user->dk_pinterest != '') ? '<li class="pinterest"><a class="vtip" title="I\'m on Pinterest" href="' . $user->dk_pinterest . '" target="_blank"><span></span></a></li>' : "";
                            echo ($user->dk_linkedin != '') ? '<li class="linkedin"><a class="vtip" title="I\'m on LinkedIn" href="' . $user->dk_linkedin . '" target="_blank"><span></span></a></li>' : "";
                            echo ($user->dk_tumblr != '') ? '<li class="tumblr"><a class="vtip" title="I\'m on Tumblr" href="' . $user->dk_tumblr . '" target="_blank"><span></span></a></li>' : "";
                            echo ($user->dk_gplus != '') ? '<li class="gplus"><a class="vtip" title="I\'m on Google+" href="' . $user->dk_gplus . '" target="_blank"><span></span></a></li>' : "";
                            echo ($user->dk_youtube != '') ? '<li class="youtube"><a class="vtip" title="I\'m on Youtube" href="' . $user->dk_youtube . '" target="_blank"><span></span></a></li>' : "";
                            echo ($user->dk_skype != '') ? '<li class="skype"><a class="vtip" title="I\'m on Skype" href="' . $user->dk_skype . '" target="_blank"><span></span></a></li>' : "";
                            echo ($user->dk_rss != '') ? '<li class="rss"><a class="vtip" title="Subscribe to RSS" href="' . $user->dk_rss . '" target="_blank"><span></span></a></li>' : "";
                            echo '</ul>';
                        }

                    endif;


                    if (!function_exists('excerpt')):

                        function excerpt($limit) {
                            $excerpt = explode(' ', get_the_excerpt(), $limit);
                            if (count($excerpt) >= $limit) {
                                array_pop($excerpt);
                                $excerpt = implode(" ", $excerpt) . '...';
                            } else {
                                $excerpt = implode(" ", $excerpt);
                            }
                            $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
                            return $excerpt;
                        }

                    endif;

                    if (!function_exists('get_recent_comments')):

                        function get_recent_comments() {
                            $comments = get_comments(array(
                                'number' => '5',
                                'status' => 'approve'
                                    ));
                            echo '<ul class="notify" id="recent_comment">';
                            foreach ($comments as $comment):
                                ?>
                            <li> <a class="hide_notify" rel="bookmark" href="<?php echo get_comment_link($comment->comment_ID); ?>">
                                    <div class="index_comment_notify">
                                        <div class="ic_avatar">
                                            <?php echo get_avatar($comment->comment_author_email, '40'); ?>
                                        </div>
                                        <div class="ic_text">
                                            <div class="ic_meta ic_author">
                                                <?php echo get_comment_author($comment->comment_ID); ?>
                                            </div>
                                            <div class="ic_content">
                                                <?php echo comment_excerpt($comment->comment_ID); ?>
                                            </div>
                                            <div class="ic_meta ic_date">
                                                <?php echo $comment->comment_date; ?>
                                            </div>
                                        </div>
                                    </div>
                            </li>
                        </a>
                    <?php endforeach; ?>
                <li class="notify_title">
                    <h2>New Comments</h2>
                </li>
                </ul>
                <?php
            }

        endif;

        if (!function_exists('dk_recent_posts')):

            function dk_recent_posts() {
                echo '<ul class="notify" id="recent_post">';
                $args = array(
                    'numberposts' => 5,
                    'orderby' => 'date',
                    'order' => 'desc',
                    'post_type' => array('post', 'place', 'event'),
                    'post_status' => 'publish'
                );
                $recents = get_posts($args);
                foreach ($recents as $recent):
                    ?>
                    <li> <a class="hide_notify" rel="bookmark" href="<?php echo get_permalink($recent->ID); ?>">
                            <div class="index_comment_notify">
                                <div class="ic_avatar">
                                    <?php
                                    if (has_post_thumbnail($recent->ID)) {
                                        echo get_the_post_thumbnail($recent->ID, array(150, 150), array('class' => "post_thumb_notify"));
                                    } //has_post_thumbnail()
                                    else {
                                        echo get_avatar(get_the_author_meta('email'), '40');
                                    }
                                    ?>
                                </div>
                                <div class="ic_text">
                                    <div class="ic_meta ic_author">
                                        <?php echo $recent->post_title; ?>
                                    </div>
                                    <div class="ic_content">
                                        <?php echo get_excerpt_by_id($recent->ID, 19); ?>
                                    </div>
                                    <div class="ic_meta ic_date">
                                        <?php echo get_the_time('d.m.Y H:i:s', $recent->ID); ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
                <li class="notify_title">
                    <h2>New Posts</h2>
                </li>
                </ul>
                <?php
            }

        endif;

        if (!function_exists('dk_related_posts')):

            function dk_related_posts() {
                echo '<ul class="related_post">';
                $args = array(
                    'numberposts' => 4,
                    'orderby' => 'rand',
                    'order' => 'desc',
                    'post_type' => 'post',
                    'post_status' => 'publish'
                );
                $relateds = get_posts($args);
                if ($relateds):
                    foreach ($relateds as $related):
                        ?>
                        <li> <a rel="bookmark" href="<?php echo get_permalink($related->ID); ?>">
                                <div class="related_avatar">
                                    <?php
                                    if (has_post_thumbnail($related->ID)) {
                                        echo get_the_post_thumbnail($related->ID, array(150, 150), array('class' => "post_thumb_related"));
                                    } //has_post_thumbnail()
                                    else {
                                        echo get_avatar(get_the_author_meta('email'), '64');
                                    }
                                    ?>
                                </div>
                                <div class="related_info">
                                    <h2 class="related_title">
                                        <?php echo $related->post_title; ?>
                                    </h2>
                                    <p class="related_except">
                                        <?php echo get_excerpt_by_id($related->ID, 29); ?>&hellip;
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <?php
                    endforeach;
                endif;
                ?>
                </ul>
                <?php
            }

        endif;

        if (!function_exists('echo_dk_social_links')):

            function echo_dk_social_links() {
                ?>
                <ul class="notify" id="dk_social_links">
                    <li>
                        <?php echo get_avatar(1, 60); ?>
                    </li>
                    <li>
                        <?php dk_social_links(); ?>
                    </li>
                    <li class="notify_title">
                        <h2>I'm on Internet</h2>
                    </li>
                </ul>
                <?php
            }

        endif;

        if (!function_exists('get_excerpt_by_id')):

            function get_excerpt_by_id($post_id, $limit) {
                $the_post = get_post($post_id); //Gets post ID
                $the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
                $excerpt_length = $limit; //Sets excerpt length by word count
                $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
                $words = explode(' ', $the_excerpt, $excerpt_length + 1);
                if (count($words) > $excerpt_length):
                    array_pop($words);
                    $the_excerpt = implode(' ', $words);
                endif;
                return $the_excerpt;
            }

        endif;

        if (!function_exists('contact_form')):

            function contact_form() {
                global $wpdb;
                $user = get_userdata(1);
                ?>
                <ul class="notify" id="contact_area">
                    <li id="contactarea">
                        <form action="/wp-comments-post.php" method="post" id="contactform">
                            <textarea id="comment" name="comment" aria-required="true" placeholder="Your message" tabindex="1"></textarea>
                            <input name="submit" type="submit" id="submit" value="Send" tabindex="4">
                            <input id="author" name="author" type="text" value="" size="30" aria-required="true" placeholder="Name*" tabindex="2">
                            <input id="email" name="email" type="text" value="" size="30" aria-required="true" placeholder="Email * name@example.com" tabindex="3">
                            <input type="hidden" name="comment_post_ID" value="<?php
        echo ($user->dk_twitline != '') ? intval($user->dk_twitline) : 1;
                ?>" id="comment_post_ID">
                            <!--update post ID-->
                            <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                        </form>
                    </li>
                    <li class="notify_title">
                        <h2>Contact</h2>
                    </li>
                </ul>
                <?php
            }

        endif;

        // echo user role for style css
        function get_user_class($userID) {
            $user_info = get_userdata($userID);
            $user_class = $user_info->user_level;
            if ($user_class == 10) {
                return 'Administrator';
            }
            if ($user_class == 2) {
                return 'Specialist';
            }
            return 'Member';
        }

        // post count
        function posts_count($userid, $post_type = 'post') {
            global $wpdb;
            $where = get_posts_by_author_sql($post_type, TRUE, $userid);
            $count = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts $where");
            return apply_filters('get_usernumposts', $count, $userid);
        }
        ?>