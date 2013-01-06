<?php
/*
  Template Name: Login
 */

get_header();
?>


<?php
global $user_ID;
if (!$user_ID) {
    ?>

    <div id = "login-page">
        <?php
        if ($_POST) {
            //check nonce
            if (empty($_POST['log'])) {
                echo "<p>Tài khoản không được để trống.</p>  <p><a href='" . get_option('siteurl') . "/login'>Thử lại?</a><p>";
            } else if (empty($_POST['pwd'])) {
                echo "<p>Mật khẩu không được để trống.</p>  <p><a href='" . get_option('siteurl') . "/login'>Thử lại?</a><p>";
            } else {
                $user_verify = wp_signon();
                if (is_wp_error($user_verify)) {
                    echo $user_verify->get_error_message() . " <p><a href='" . get_option('siteurl') . "/login'>Thử lại?</a><p>";
                    exit();
                } else {
                    echo "<h2>Đăng nhập thành công.</h2> <p>Click <a href='" . get_option('siteurl') . "'>vào đây</a> để trở về trang chủ.</p>";
                    wp_redirect(home_url());
                }
            }
        } else {
            ?>
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                    <h2>Đăng nhập</h2>
                    <form action="" method="post">
                        <label for="log">Tài khoản: </label>
                        <input type="text" name="log" id="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" size="20" placeholder="Tài khoản" autocomplete="no" />
                        <label for="pwd">Mật khẩu: </label>
                        <input type="password" name="pwd" id="pwd" size="20" placeholder="Password"/>
                        <p></p>
                        <p></p>
                        <input type="submit" name="submit" value="Đăng nhập" class="button" />
                        <input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /><label class="rememberlabel" for="rememberme">Ghi nhớ</label>
                        <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                        <p><a href="<?php echo get_option('home'); ?>/forgot-password">Quên mật khẩu?</a></p>
                        <input type="hidden" name="action" value="moc_login" />
                        <input type="hidden" name="tg_pwd_nonce" value="<?php echo wp_create_nonce("tg_pwd_nonce"); ?>" />
                        <div class="clearfix"></div>
                    </form>
                <?php endwhile; ?>
                <?php else : ?>
                <h2><?php _e('Không tìm thấy'); ?></h1>
                <?php endif; ?>
                <?php
                get_footer();
            }
            ?>
    </div><!-- login-page -->
    <?php
}

else {
    wp_redirect(home_url());
    exit;
}
?>