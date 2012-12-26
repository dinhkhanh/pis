<?php
/*
  Template Name: Register
 */
require_once(ABSPATH . WPINC . '/registration.php');
get_header();
global $wpdb, $user_ID;
//Check whether the user is already logged in
?>
<div id="login-page">
    <?php
    if (!$user_ID) {
        if ($_POST) {
            //We shall SQL escape all inputs
            $username = $wpdb->escape($_POST['username']);
            if (empty($username)) {
                echo "Tài khoản không được để trống <a href='" . get_option('siteurl') . "/register'>Thử lại?</a>";
                exit();
            } else {
                if (!preg_match("/^[a-z0-9]*$/", $username)) {
                    echo "Tài khoản chỉ dùng số và ký tự alphabet. <a href='" . get_option('siteurl') . "/register'>Thử lại?</a>";
                    exit();
                }
                if (strlen($username) < 3) {
                    echo "Tài khoản phải lớn hơn 3 ký tự. <a href='" . get_option('siteurl') . "/register'>Thử lại?</a>";
                    exit();
                }
            }
            $email = $wpdb->escape($_POST['email']);
            if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) {
                echo "Vui lòng nhập email hợp lệ. <a href='" . get_option('siteurl') . "/register'>Thử lại?</a>";
                exit();
            }

            $random_password = wp_generate_password(12, false);
            $status = wp_create_user($username, $random_password, $email);
            if (is_wp_error($status))
                echo $status->get_error_message() . "<p><a href='" . get_option('siteurl') . "/register'>Thử lại?</a></p>";
            else {
                $from = get_option('admin_email');
                $headers = 'Từ: ' . $from . "\r\n";
                $subject = "Đăng ký tài khoản tại PIS thành công";
                $msg = "Bạn vừa đăng ký thành công tài khoản tại PIS.\nThông tin đăng nhập của bạn\nTài khoản: $username\nMật khẩu: $random_password";
                $msg .= "\nBạn có thể đăng nhập tại " . get_option('siteurl') . "/login\r\n\r\n";
                wp_mail($email, $subject, $msg, $headers);
                echo "Đăng ký tài khoản thành công. Vui lòng kiểm tra hòm thư và làm theo hướng dẫn.";
            }

            exit();
        } else {
            ?>
            <?php
            if (get_option('users_can_register')) { //Check whether user registration is enabled by the administrator
                ?>
                <h2>Đăng ký</h2>
                <form id="wp_signup_form" action="" method="post">
                    <label for="username">Tài khoản:</label>
                    <input type="text" name="username" class="text" value="" placeholder="Username"/>
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="text" value="" placeholder="Email address"/>
                    <p></p>
                    <input type="submit" id="submitbtn" name="submit" value="Đăng ký" />
                    <p>Đã có tài khoản? <a href="<?php echo get_home_url(); ?>/login">Đăng nhập</a></p>
                    <div class="clearfix"></div>
                </form>
                <?php
            }
            else
                echo "Đăng ký tạm thời đóng. Vui lòng thử lại lần sau.";
            ?>

        </div>
        </div>
        </div>
        <?php
        get_footer();
    } //end of if($_post)
}
else {
    wp_redirect(home_url());
    exit;
}
?>