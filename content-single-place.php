<?php
/**
 * The template for displaying content of Place
 *
 *
 */
$postID = $post->ID * -1;
?>

<div id="sidebar">
    <div class="widget">
        <div id="place_slider">
<?php place_post_thumbnail($post->ID, -1, 'medium', 'place_slide'); ?>
        </div>
    </div>
    <div class="widget">
        <h3 class="widget-title">Thông tin</h3>
        <table>
            <tr>
                <th>Xác thực: </th>
                <td><span class="place-verified verified<?php echo get_post_meta($post->ID, 'verified', true); ?>" title="<?php echo get_post_meta($post->ID, 'verified', true) == 'on' ? 'Địa điểm đã được xác thực.' : 'Địa điểm chưa được xác thực.' ?>"></span></td>
            </tr>
            <tr>
                <th>Xếp hạng: </th>
                <td><span class="place-rating star-<?php echo get_post_meta($post->ID, 'rating', true); ?>"></span></td>
            </tr>
            <tr>
                <th>Giờ mở cửa: </th>
                <td><?php echo get_post_meta($post->ID, 'open', true); ?></td>
            </tr>
            <tr>
                <th>SĐT: </th>
                <td><?php echo get_post_meta($post->ID, 'phone', true); ?></td>
            </tr>
            <tr>
                <th>Website: &nbsp; </th>
                <td><?php echo get_post_meta($post->ID, 'website', true); ?></td>
            </tr>
            <tr>
                <th>Người tạo: &nbsp; </th>
                <td><?php the_author_posts_link(); ?>&nbsp;<span class="user-badge <?php echo get_user_class(get_the_author_meta('ID')); ?>" title="<?php echo get_user_class(get_the_author_meta('ID')); ?>"></span></td>
            </tr>
        </table>
    </div>

    <div class="widget">
        <h3 class="widget-title">Chỉ đường</h3>
        <div id="map_directions" style="width: 200px; height: 400px;"></div>
    </div>
    <div class="widget widget_smSticky">
        <h3 class="widget-title">Địa điểm khác</h3>
<?php query_posts(array('post_type' => array('place'), 'posts_per_page' => 5, 'orderby' => 'rand', 'post__not_in' => array($postID))); ?>

<?php if (have_posts()) : ?>
                <ul>
    <?php while (have_posts()) : the_post(); ?>
                            <li><a href="<?php the_permalink($post->ID); ?>">
        <?php
        if (has_post_thumbnail($post->ID)) {
            echo get_the_post_thumbnail($post->ID, 'medium', array('class' => 'place_sidebar_thumb', 'title' => trim(strip_tags($post->post_title))));
        } else {
            echo '<img class="alignleft event_thumb" src="' . theme_dir . '/img/default_place.jpg" />';
        }
        the_title();
        ?>
                                </a>
                                <div class="clearfix"></div>
                            </li>
    <?php endwhile;
    ?> </ul>
    <?php
endif;
wp_reset_query();
    ?>
        </ul>
    </div>

</div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if (has_post_thumbnail($post->ID))
            echo get_the_post_thumbnail($post->ID, 'medium', array('class' => 'alignleft place_thumb', 'title' => trim(strip_tags($post->post_title))));

        else
            echo '<img class="aligncenter place_thumb" src="' . theme_dir . '/img/default_place.jpg" />';
        ?>
        <div class="place_header">
            <h1 class="entry-title">
<?php the_title(); ?>&nbsp;<span class="place-verified verified<?php echo get_post_meta($post->ID, 'verified', true); ?>" title="<?php echo get_post_meta($post->ID, 'verified', true) == 'on' ? 'Địa điểm đã được xác thực.' : 'Địa điểm chưa được xác thực.' ?>"></span>
            </h1>
            <hr />
            <p class="place_address">
<?php echo get_post_meta($post->ID, 'location', true); ?>
                <input type="hidden" id="input_address" value="<?php echo get_post_meta($post->ID, 'location', true) ;?>" />
            </p>
        </div>
    </header>
    <!-- .entry-header -->

    <div class="entry-content">
        <table>
            <tr>
                <th>Lĩnh vực:</th>
                <td><?php
$categories = get_the_terms($post->ID, 'places');
$separator = ' ';
if ($categories) {
    foreach ($categories as $category) {
        echo '<a href="' . get_term_link($category->slug, 'places') . '" title="' . esc_attr(sprintf(__("Xem tất cả địa điểm thuộc %s"), $category->name)) . '">' . $category->name . '</a>' . $separator;
    }
}
?></td>
            </tr>
            <tr>
                <th>Ưu điểm: </th>
                <td><?php echo get_post_meta($post->ID, 'pros', true); ?></td>
            </tr>
            <tr>
                <th>Nhược điểm: </th>
                <td><?php echo get_post_meta($post->ID, 'cons', true); ?></td>
            </tr>
            <tr>
                <th>Mặt hàng: </th>
                <td><?php echo get_post_meta($post->ID, 'mainmenu', true); ?></td>
            </tr>
            <tr>
                <th>Chi tiết: </th>
                <td><?php the_content(); ?></td>
            </tr>
        </table>
        <div id="map_canvas" style="width: 100%; height: 300px;"></div>
    </div>
    <!-- .entry-content -->
</article>

<!-- #post-<?php the_ID(); ?> -->
