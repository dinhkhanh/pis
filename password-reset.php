<?php
/*
  Template Name: Forgot Password
 */

get_header();
?>

<div id="login-page">
    <?php
    global $wpdb, $user_ID;

    function tg_validate_url() {
        global $post;
        $page_url = esc_url(get_permalink($post->ID));
        $urlget = strpos($page_url, "?");
        if ($urlget === false) {
            $concate = "?";
        } else {
            $concate = "&";
        }
        return $page_url . $concate;
    }

    if (!$user_ID) { //block logged in users
        if (isset($_GET['key']) && $_GET['action'] == "reset_pwd") {
            $reset_key = $_GET['key'];
            $user_login = $_GET['login'];
            $user_data = $wpdb->get_row($wpdb->prepare("SELECT ID, user_login, user_email FROM $wpdb->users WHERE user_activation_key = %s AND user_login = %s", $reset_key, $user_login));

            $user_login = $user_data->user_login;
            $user_email = $user_data->user_email;

            if (!empty($reset_key) && !empty($user_data)) {
                $new_password = wp_generate_password(12, false);
                //echo $new_password; exit();
                wp_set_password($new_password, $user_data->ID);
                //mailing reset details to the user
                $message = __('Mật khẩu mới của bạn tại:') . "\r\n\r\n";
                $message .= get_option('siteurl') . "\r\n\r\n";
                $message .= sprintf(__('Tài khoản: %s'), $user_login) . "\r\n\r\n";
                $message .= sprintf(__('Mật khẩu: %s'), $new_password) . "\r\n\r\n";
                $message .= __('Bạn có thể đăng nhập tại at: ') . get_option('siteurl') . "/login" . "\r\n\r\n";

                if ($message && !wp_mail($user_email, '[PIS] Quên mật khẩu', $message)) {
                    echo "<div class='error'>Email chưa được gửi vì một lý do nào đó.</div>";
                    exit();
                } else {
                    echo '<div class="success">Mật khẩu của bạn đã được khởi tạo lại thành công. Vui lòng kiểm tra hộp thư của bạn để biết chi tiết. <a href="'.get_option("siteurl") . '"/login">Đăng nhập?</a></div>';
//                    $redirect_to = get_bloginfo('url') . "/login?action=reset_success";
//                    wp_safe_redirect($redirect_to);
                    exit();
                }
            }
            else
                exit('Your reset link is not valid.');
        }
        //exit();

        if ($_POST['action'] == "tg_pwd_reset") {
            if (!wp_verify_nonce($_POST['tg_pwd_nonce'], "tg_pwd_nonce")) {
                exit("No trick please");
            }
            if (empty($_POST['user_input'])) {
                echo "<div class='error'>Vui lòng nhập tài khoản hoặc email. <a href='".get_option('siteurl') . "/forgot-password'>Thử lại?</a></div>";
                exit();
            }
            //We shall SQL escape the input
            $user_input = $wpdb->escape(trim($_POST['user_input']));

            if (strpos($user_input, '@')) {
                $user_data = get_user_by_email($user_input);
                if (empty($user_data)) { //delete the condition $user_data->caps[administrator] == 1, if you want to allow password reset for admins also
                    echo "<div class='error'>Email không hợp lệ! <a href='".get_option('siteurl') . "/forgot-password'>Thử lại?</a></div>";
                    exit();
                }
            } else {
                $user_data = get_userdatabylogin($user_input);
                if (empty($user_data)) { //delete the condition $user_data->caps[administrator] == 1, if you want to allow password reset for admins also
                    echo "<div class='error'>Tài khoản không tồn tại! <a href='".get_option('siteurl') . "/forgot-password'>Thử lại?</a></div>";
                    exit();
                }
            }

            $user_login = $user_data->user_login;
            $user_email = $user_data->user_email;

            $key = $wpdb->get_var($wpdb->prepare("SELECT user_activation_key FROM $wpdb->users WHERE user_login = %s", $user_login));
            if (empty($key)) {
                //generate reset key
                $key = wp_generate_password(20, false);
                $wpdb->update($wpdb->users, array('user_activation_key' => $key), array('user_login' => $user_login));
            }

            //mailing reset details to the user
            $message = __('Vừa có một yêu cầu khởi tạo lại mật khẩu tại:') . "\r\n\r\n";
            $message .= get_option('siteurl') . "\r\n\r\n";
            $message .= sprintf(__('Tài khoản: %s'), $user_login) . "\r\n\r\n";
            $message .= __('Nếu không phải bạn thực hiện yêu cầu đó, vui lòng bỏ qua email này..') . "\r\n\r\n";
            $message .= __('Để khởi tạo lại mật khẩu, vui lòng truy cập đường link:') . "\r\n\r\n";
            $message .= tg_validate_url() . "action=reset_pwd&key=$key&login=" . rawurlencode($user_login) . "\r\n";

            if ($message && !wp_mail($user_email, '[PIS] Quên mật khẩu', $message)) {
                echo "<div class='error'>Email chưa được gửi vì một lý do nào đó.</div>";
                exit();
            } else {
                echo "<div class='success'>Chúng tôi đã gửi email cho bạn. Vui lòng kiểm tra hòm thư và làm theo hướng đẫn để khởi tạo lại mật khẩu.</div>";
                exit();
            }
        } else {
            ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <h2>Forgot Password</h2>
                    <p style="margin-bottom: 5px;">Enter your username or email address.</p>
                    <form class="user_form" id="wp_pass_reset" action="" method="post">
                        <input type="submit" id="submitbtn" class="reset_password" name="submit" value="Reset" />
                        <input type="text" class="text" name="user_input" value="" placeholder="Email or Username" /><br />
                        <input type="hidden" name="action" value="tg_pwd_reset" />
                        <input type="hidden" name="tg_pwd_nonce" value="<?php echo wp_create_nonce("tg_pwd_nonce"); ?>" />
                        <div class="clearfix"></div>
                    </form>

                <?php endwhile; ?>
            <?php else : ?>
                <h2><?php _e('Không tìm thấy'); ?></h1>
                <?php endif; ?>
        </div><!-- login-page -->
        <?php
        get_footer();
    }
}
else {
    wp_redirect(home_url());
    exit;
    //redirect logged in user to home page
}
?>