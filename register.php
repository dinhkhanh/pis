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
                echo "Username should not be empty. <a href='" . get_option('siteurl') . "/register'>Try again?</a>";
                exit();
            } else {
                if (!preg_match("/^[a-z0-9]*$/", $username)) {
                    echo $username;
                    echo "Username should be only letters and numbers. <a href='" . get_option('siteurl') . "/register'>Try again?</a>";
                    exit();
                }
                if (strlen($username) < 5) {
                    echo "Username should be longer than 5 characters. <a href='" . get_option('siteurl') . "/register'>Try again?</a>";
                    exit();
                }
            }
            $email = $wpdb->escape($_POST['email']);
            if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) {
                echo "Please enter a valid email. <a href='" . get_option('siteurl') . "/register'>Try again?</a>";
                exit();
            }

            $random_password = wp_generate_password(12, false);
            $status = wp_create_user($username, $random_password, $email);
            if (is_wp_error($status))
                echo $status->get_error_message() . "<p><a href='" . get_option('siteurl') . "/register'>Try again?</a></p>";
            else {
                $from = get_option('admin_email');
                $headers = 'From: ' . $from . "\r\n";
                $subject = "Registration successful";
                $msg = "Registration successful.\nYour login details\nUsername: $username\nPassword: $random_password";
                $msg .= "\nYou can login at " . get_option('siteurl') . "/login\r\n\r\n";
                wp_mail($email, $subject, $msg, $headers);
                echo "Registration completes successfully. Please check your email for login details.";
            }

            exit();
        } else {
            ?>
            <?php
            if (get_option('users_can_register')) { //Check whether user registration is enabled by the administrator
                ?>
                <h2>Register</h2>
                <form id="wp_signup_form" action="" method="post">
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="text" value="" placeholder="Username"/>
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="text" value="" placeholder="Email address"/>
                    <p></p>
                    <input type="submit" id="submitbtn" name="submit" value="Register" />
                    <p>Already member? <a href="<?php echo get_home_url(); ?>/login">Login</a></p>
                    <div class="clearfix"></div>
                </form>
                <?php
            }
            else
                echo "Registration is currently disabled. Please try again later.";
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