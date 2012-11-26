<?php
/**
 * The template for displaying content of Place
 *
 *
 */
?>
<div id="sidebar">
    <div class="widget">
        <div id="place_slider">
            <?php place_post_thumbnail($post->ID); ?>
        </div>
    </div>
    <div class="widget">
        <table>
            <p></p>
            <tr>
                <th>Verified: </th>
                <td><span class="place-verified verified<?php echo get_post_meta($post->ID, 'verified', true); ?>" title="<?php echo get_post_meta($post->ID, 'verified', true)=='on'?'This place is verified.':'This place is not verified.' ?>"></span></td>
            </tr>
            <tr>
                <th>Rating: </th>
                <td><span class="place-rating star-<?php echo get_post_meta($post->ID, 'rating', true); ?>"></span></td>
            </tr>
            <tr>
                <th>Open: </th>
                <td><?php echo get_post_meta($post->ID, 'open', true); ?></td>
            </tr>
            <tr>
                <th>Phone: </th>
                <td><?php echo get_post_meta($post->ID, 'phone', true); ?></td>
            </tr>
            <tr>
                <th>Website: &nbsp; </th>
                <td><?php echo get_post_meta($post->ID, 'website', true); ?></td>
            </tr>
            <tr>
                <th>Author: &nbsp; </th>
                <td><?php echo get_the_author(); ?></td>
            </tr>
        </table>
    </div>
</div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if (has_post_thumbnail($post->ID))
            echo get_the_post_thumbnail($post->ID, 'medium', array('class' => 'alignleft place_thumb', 'title' => trim(strip_tags($post->post_title))));

        else
            echo '<img class="aligncenter place_thumb" src="'.theme_dir .'/img/default_place.jpg" />';
        ?>
        <div class="place_header">
            <h1 class="entry-title">
                <?php the_title(); ?>&nbsp;<span class="place-verified verified<?php echo get_post_meta($post->ID, 'verified', true); ?>" title="<?php echo get_post_meta($post->ID, 'verified', true)=='on'?'This place is verified.':'This place is not verified.' ?>"></span>
            </h1>
            <hr />
            <p class="place_address">
                <?php echo get_post_meta($post->ID, 'location', true); ?>
            </p>
        </div>
    </header>
    <!-- .entry-header -->

    <div class="entry-content">
        <table>
            <tr>
                <th>Business type:</th>
                <td><?php
$categories = get_the_terms($post->ID, 'places');
$separator = ' ';
if ($categories) {
    foreach ($categories as $category) {
        echo '<a href="' . get_term_link($category->slug, 'places') . '" title="' . esc_attr(sprintf(__("View all places in %s"), $category->name)) . '">' . $category->name . '</a>' . $separator;
    }
}
?></td>
            </tr>
            <tr>
                <th>Advantage: </th>
                <td><?php echo get_post_meta($post->ID, 'pros', true); ?></td>
            </tr>
            <tr>
                <th>Weakness: </th>
                <td><?php echo get_post_meta($post->ID, 'cons', true); ?></td>
            </tr>
            <tr>
                <th>Main Products: </th>
                <td><?php echo get_post_meta($post->ID, 'mainmenu', true); ?></td>
            </tr>
            <tr>
                <th>Details: </th>
                <td><?php the_content(); ?></td>
            </tr>
        </table>
    </div>
    <!-- .entry-content -->
</article>

<!-- #post-<?php the_ID(); ?> -->
