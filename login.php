<?php
/*
  Template Name: Login
 */

get_header();
?>

<div id="login-page">
    <?php
    global $user_ID;
    if (!$user_ID) {
        if ($_POST) {
            if (empty($_POST['log'])) {
                echo "<p>Username should not be empty.</p>  <p><a href='" . get_option('siteurl') . "/login'>Try again?</a><p>";
            } else if (empty($_POST['pwd'])) {
                echo "<p>Password should not be empty.</p>  <p><a href='" . get_option('siteurl') . "/login'>Try again?</a><p>";
            } else {
                $user_verify = wp_signon();
                if (is_wp_error($user_verify)) {
                    echo $user_verify->get_error_message() . " <p><a href='" . get_option('siteurl') . "/login'>Try again?</a><p>";
                    exit();
                } else {
                    echo "<h2>Login successfully.</h2> <p>Click <a href='" . get_option('siteurl') . "'>here</a> to return to homepage.</p>";
                    exit();
                }
            }
        } else {
            ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <h2>Login</h2>
                    <form action="" method="post">
                        <label for="log">Username: </label>
                        <input type="text" name="log" id="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" size="20" placeholder="Username" autocomplete="no" />
                        <label for="pwd">Password: </label>
                        <input type="password" name="pwd" id="pwd" size="20" placeholder="Password"/>
                        <p></p>
                        <p></p>
                        <input type="submit" name="submit" value="Login" class="button" />
                        <input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /><label class="rememberlabel" for="rememberme">Remember me</label>
                        <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                        <p><a href="<?php echo get_option('home'); ?>/forgot-password">Forgot password?</a></p>
                        <input type="hidden" name="action" value="moc_login" />
                        <input type="hidden" name="tg_pwd_nonce" value="<?php echo wp_create_nonce("tg_pwd_nonce"); ?>" />
                        <div class="clearfix"></div>
                    </form>
                <?php endwhile; ?>
            <?php else : ?>
                <h2><?php _e('Not Found'); ?></h1>
                <?php endif; ?>
        </div><!-- login-page -->
        <?php
        get_footer();
    }
}

else {
    wp_redirect(home_url());
    exit;
}
?>