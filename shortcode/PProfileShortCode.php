<?php

/**
 * PARAGON-PROFILE
 * HTTP://MRPARAGON.ME/paragon-profile.
 */
if (!defined('ABSPATH')) {
    exit;
}

class PProfileShortCode
{
    public function __construct()
    {
        add_action('wp_head', array($this, 'addRequiredAjaxJS'));
        add_action('wp_ajax_nopriv_ppAjaxLoginPHP', array($this, 'ppAjaxLoginPHP'));
        add_action('wp_ajax_nopriv_ppAjaxPasswordRecoveryPHP', array($this, 'ppAjaxPasswordRecoveryPHP'));
        add_action('wp_ajax_ppAjaxPasswordLoggedInPHP', array($this, 'ppAjaxPasswordLoggedInPHP'));
        add_action('wp_ajax_nopriv_ppAjaxRegistrationPHP', array($this, 'ppAjaxRegistrationPHP'));
        add_action('wp_ajax_ppAjaxRegistrationPHP', array($this, 'ppAjaxRegistrationLoggedInPHP'));
        add_action('wp_ajax_nopriv_ppProcessUserLogin', array($this, 'ppProcessUserLogin'));
        add_action('wp_ajax_ppAjaxProfilePHP', array($this, 'ppAjaxProfilePHP'));
        add_action('wp_ajax_ppAjaxPasswordChangePHP', array($this, 'ppAjaxPasswordChangePHP'));
        add_action('wp_ajax_ppAjaxContactPHP', array($this, 'ppAjaxContactPHP'));

        add_action('wp_ajax_nopriv_ppAjaxContactPHP', array($this, 'ppAjaxContactPHP'));
        add_shortcode('ppprofile', array($this, 'ppProfileProfile'));
        add_shortcode('pplogin', array($this, 'ppCreateLogin'));
        add_shortcode('ppregister', array($this, 'ppCreateRegister'));
        add_shortcode('ppcontact', array($this, 'ppCreateContact'));
        add_shortcode('pppasswordrecovery', array($this, 'ppCreatePasswordRecovery'));
        add_shortcode('ppdoshutdownbtn', array($this, 'ppCreateLogoutBtn'));
    }

    public function ppProfileProfile()
    {
        require_once plugin_dir_path(dirname(__FILE__)).'front/PProfileProfile.php';
        $pppro = new PProfileProfile();
        call_user_func(array($pppro, 'profileContent'));
    }

    public function ppCreateLogin()
    {
        require_once plugin_dir_path(dirname(__FILE__)).'front/PProfileLogin.php';
        $plogin = new PProfileLogin();
        call_user_func(array($plogin, 'loginContent'));
    }

    public function ppCreateRegister()
    {
        require_once plugin_dir_path(dirname(__FILE__)).'front/PProfileRegister.php';
        $pregister = new PProfileRegister();
        call_user_func(array($pregister, 'registerContent'));
    }

    public function ppCreatePasswordRecovery()
    {
        require_once plugin_dir_path(dirname(__FILE__)).'front/PProfilePasswordRecovery.php';
        $precovery = new PProfilePasswordRecovery();
        call_user_func(array($precovery, 'passwordRecoveryContent'));
    }

    public function ppCreateContact()
    {
        require_once plugin_dir_path(dirname(__FILE__)).'front/PProfileContact.php';
        $pcontact = new PProfileContact();
        call_user_func(array($pcontact, 'contactContent'));
    }

    public function ppCreateLogoutBtn()
    {
        ?>

<?php if ((int) get_option('pp_set_logout_url') > 0): ?>
                                <a class="btn btn-lg btn-purpose btn-danger push-left" href="<?php echo wp_logout_url(get_page_link(get_option('pp_set_logout_url')));
        ?>"><?php _e('LOGOUT', 'paragon-profile');
        ?></a>
                            <?php endif;
        ?>
                           <?php if (get_option('pp_set_logout_url') == ''): ?>
                                <a class="btn btn-lg btn-purpose btn-danger push-left" href="<?php echo wp_logout_url(home_url());
        ?>"><?php _e('LOGOUT', 'paragon-profile');
        ?></a>
                            <?php endif;
        ?>

   <?php

    }
    public function addRequiredAjaxJS()
    {
        ?>
        <script>  
        var pp_ajaxurl = "<?php echo admin_url().'admin-ajax.php';
        ?>";
        var pp_formtoken ="<?php echo get_option('pp_formtoken');
        ?>";
        </script>
        <?php
        //require_once 'ajaxProfileWill.php';
    }
    public function ppAjaxPasswordLoggedInPHP()
    {
        require_once plugin_dir_path(dirname(__FILE__)).'helper/PPTools.php';
        PPTools::naInfo(__('You are currently logged In', 'paragon-profile'));
        wp_die();
    }

    public function ppAjaxRegistrationLoggedInPHP()
    {
        require_once plugin_dir_path(dirname(__FILE__)).'helper/PPTools.php';
        PPTools::naInfo(__('You are currently logged In', 'paragon-profile'));
        wp_die();
    }
    public function ppAjaxPasswordChangePHP()
    {
        require_once plugin_dir_path(dirname(__FILE__)).'helper/PPTools.php';
        global $wp_hasher;
        if (empty($wp_hasher)) {
            require_once ABSPATH.WPINC.'/class-phpass.php';
            $wp_hasher = new PasswordHash(8, true);
        }

        if (isset($_POST['token'])) {
            if ($_POST['token'] == get_option('pp_formtoken')) {
                $current_user = wp_get_current_user();

                if (($_POST['oldpwd'] != '') || ($_POST['newpwd'] != '')) {
                    $newpwd = htmlspecialchars($_POST['newpwd']);
                    $oldpwd = htmlspecialchars($_POST['oldpwd']);

                    if ($wp_hasher->CheckPassword($oldpwd, $current_user->user_pass)) {
                        wp_set_password($newpwd, get_current_user_id());
                        PPTools::naSuccess(__('Password Change successful', 'paragon-profile'));
                        wp_die();
                    } else {
                        PPTools::naError(__('Password did not match, try again', 'paragon-profile'));
                        wp_die();
                    }
                }
            } else {
                PPTools::naError(__('Refresh the page and try again', 'paragon-profile'));
                wp_die();
            }
        }
    }

    public function generatePass($length = 12)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#%^';
        if (function_exists('mb_strlen')) {
            $count = mb_strlen($chars);
        } else {
            $count = strlen($chars);
        }

        for ($i = 0, $token = ''; $i < $length; ++$i) {
            $index = rand(0, $count - 1);
            if (function_exists('mb_substr')) {
                $token .= mb_substr($chars, $index, 1);
            } else {
                $token .= substr($chars, $index, 1);
            }
        }

        return $token;
    }
    public function ppAjaxPasswordRecoveryPHP()
    {
        require_once plugin_dir_path(dirname(__FILE__)).'helper/PPTools.php';

        if (isset($_POST['token'])) {
            if ($_POST['token'] == get_option('pp_formtoken')) {
                if ($_POST['recoveryemail'] != '') {
                    $recoveryemail = htmlspecialchars($_POST['recoveryemail']);
                    if (!is_email($recoveryemail)) {
                        PPTools::naError(__('Email is not valid ', 'paragon-profile'));
                        wp_die();
                    }

                    if (email_exists($recoveryemail)) {
                        $user = get_user_by('email', $recoveryemail);
                        $newp = $this->generatePass();

                        $headers = 'From: '.get_option('blogname').'<'.get_option('admin_email').'>';
                        $message = 'Your temporary password is '.$newp."\n Please login and change your password \n \n Note: If you did not request for password change please contact support immediately.";
                        if (wp_mail($recoveryemail, 'Email Recovery', $message,  $headers)) {
                            wp_set_password($newp, $user->ID);
                            PPTools::naSuccess(__('Successful Password recovery, check the email provided', 'paragon-profile'));
                            wp_die();
                        } else {
                            PPTools::naError(__('Email recovery failed, try again', 'paragon-profile'));
                            wp_die();
                        }
                    } else {
                        PPTools::naError(__('Correct Email is required', 'paragon-profile'));
                        wp_die();
                    }
                }
            } else {
                PPTools::naInfo(__('Refresh your page and try again', 'paragon-profile'));
                wp_die();
            }
        }
    }
    public function ppAjaxRegistrationPHP()
    {
        require_once plugin_dir_path(dirname(__FILE__)).'helper/PPTools.php';

        if (isset($_POST['token'])) {
            if ($_POST['token'] == get_option('pp_formtoken')) {
                foreach ($_POST as $postdata => $value) {
                    $$postdata = htmlspecialchars($value);
                }

                if (!isset($Email) || !isset($Username) || !isset($Password)) {
                    PPTools::naError(__('Email, Username and Password, must be provided ', 'paragon-profile'));
                    wp_die();
                }
                $reg_errors = new WP_Error();

                if (empty($Username) || empty($Password) || empty($Email)) {
                    $reg_errors->add('field', __('Required form field is missing', 'paragon-profile'));
                }

                if (strlen($Username) < 4) {
                    $reg_errors->add('username_length', __('Username too short. At least 4 characters is required', 'paragon-profile'));
                }

                if (username_exists($Username)) {
                    $reg_errors->add('Username', __('Sorry, that username already exists!', 'paragon-profile'));
                }

                if (!validate_username($Username)) {
                    $reg_errors->add('username_invalid', __('Sorry, the username you entered is not valid', 'paragon-profile'));
                }

                if (strlen($Password) < 5) {
                    $reg_errors->add('password', __('Password length must be greater than 4', 'paragon-profile'));
                }

                if (!is_email($Email)) {
                    $reg_errors->add('email_invalid', __('Email is not valid', 'paragon-profile'));
                }

                if (email_exists($Email)) {
                    $reg_errors->add('email',  __('Email Already in use', 'paragon-profile'));
                }

                if (is_wp_error($reg_errors)) {
                    foreach ($reg_errors->get_error_messages() as $error) {
                        PPTools::naError('Error: '.$error.'<br/>');
                        wp_die();
                    }
                }

                if (count($reg_errors->get_error_messages()) < 1) {
                    $userdata = array(
        'user_login' => $Username,
        'user_email' => $Email,
        'user_pass' => $Password,
        );

                    if (isset($Firstname)) {
                        $userdata['first_name'] = $Firstname;
                    }
                    if (isset($Lastname)) {
                        $userdata['last_name'] = $Lastname;
                    }
                    if (isset($Nickname)) {
                        $userdata['nickname'] = $Nickname;
                    }
                    if (isset($Bio)) {
                        $userdata['description'] = $Bio;
                    }

                    $user = wp_insert_user($userdata);
                    if ((int) get_option('pp_pplogin') > 0) {
                        PPTools::naSuccess(__('Registration complete. Goto', 'paragon-profile').' <a href="'.get_page_link(get_option('pp_pplogin')).'">'.__('login page', 'paragon-profile').'</a>');
                        wp_die();
                    } else {
                        PPTools::naSuccess(__('Registration complete, You can login and explore your account', 'paragon-profile'));
                        wp_die();
                    }
                } else {
                    PPTools::naInfo('Unknow error occured, try gain');
                    wp_die();
                }
            } else {
                PPTools::naInfo('Refresh the page and try gain');
                wp_die();
            }
        }
    }

    public function ppAjaxContactPHP()
    {
        require_once plugin_dir_path(dirname(__FILE__)).'helper/PPTools.php';
        if (isset($_POST['token'])) {
            $allfields = array();
            if ($_POST['token'] == get_option('pp_formtoken')) {
                foreach ($_POST as $contactfield => $value) {
                    $$contactfield = htmlspecialchars(trim($value));
                    $allfields[$contactfield] = htmlspecialchars(trim($value));
                }
                if (!isset($email)) {
                    PPTools::naError(__('Valid email is required', 'paragon-profile'));
                    wp_die();
                }
                if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    PPTools::naError(__('Valid email is required', 'paragon-profile'));
                    wp_die();
                }
                //print_r($allfields);
               // exit;
                $msg = 'Contact message details';
                foreach ($allfields as $field => $value) {
                    if (($field != 'token') || ($field != 'action')) {
                        $msg .= "\n ".$field.': '.$value;
                    }
                }

                $headers = 'From: '.get_option('blogname').'<'.get_option('admin_email').'>';
                if (get_option('pp_contactemail_mailto') != '') {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
                        $to = get_option('pp_contactemail_mailto');
                    } else {
                        $to = get_option('admin_email');
                    }
                } else {
                    $to = get_option('admin_email');
                }

                if (get_option('pp_contactemail_subject') != '') {
                    $subject = get_option('pp_contactemail_subject');
                } else {
                    $subject = get_option('blogname').' Contact form';
                }

                if (wp_mail($to, $subject, $msg, $headers)) {
                    if (get_option('pp_contactemail_msg') != '') {
                        PPTools::naSuccess(get_option('pp_contactemail_msg'));
                        wp_die();
                    }
                    PPTools::naSuccess(__('Message Sent Successfully', 'paragon-profile'));
                    wp_die();
                } else {
                    PPTools::naError(__('Message could not be sent, try again later', 'paragon-profile'));
                    wp_die();
                }
            } else {
                PPTools::naError(__('Refresh your page and try again', 'paragon-profile'));
                wp_die();
            }
        }
    }
    public function ppAjaxProfilePHP()
    {
        require_once plugin_dir_path(dirname(__FILE__)).'helper/PPTools.php';
        if (isset($_POST['token'])) {
            if ($_POST['token'] == get_option('pp_formtoken')) {
                foreach ($_POST as $userfield => $value) {
                    $$userfield = htmlspecialchars($value);
                }
                $userdata = array(
                'ID' => get_current_user_id(),
                'user_firstname' => $firstname,
                'user_lastname' => $lastname,
                'display_name' => $nickname,
                'description' => trim($bio),
                );

                $userid = wp_update_user($userdata);
                if (is_wp_error($userid)) {
                    PPTools::naError(__('Error Occured try again', 'paragon-profile'));
                    wp_die();
                } else {
                    PPTools::naSuccess(__('Successful Update', 'paragon-profile'));
                    wp_die();
                }
            }
        }
    }

    public function ppProcessUserLogin()
    {
        require_once plugin_dir_path(dirname(__FILE__)).'helper/PPTools.php';
        if (isset($_POST['token'])) {
            if ($_POST['token'] == get_option('pp_formtoken')) {
                //echo 'true';
                //exit;
                if ($_POST['username'] != '') {
                    $username = htmlspecialchars($_POST['username']);
                }
                if ($_POST['username'] == '') {
                    PPTools::naError(__('Username is required', 'paragon-profile'));
                    wp_die();
                }
                if (isset($_POST['rememberme'])) {
                    $rememberme = htmlspecialchars($_POST['rememberme']);
                }
                if (!isset($_POST['rememberme'])) {
                    $rememberme = 'off';
                }

                if ($_POST['password'] != '') {
                    $password = htmlspecialchars($_POST['password']);
                }
                if ($_POST['password'] == '') {
                    PPTools::naError(__('Password is required', 'paragon-profile'));
                    wp_die();
                }

                $autho = array(
                    'user_login' => $username,
                    'user_password' => $password,
                     'remember' => true,
                    );
                if ($rememberme == 'on') {
                    $user = wp_signon($autho, false);
                } else {
                    $user = wp_authenticate($username, $password);
                }

                if (is_wp_error($user)) {
                    if ((int) get_option('pp_pppasswordrecovery') > 0) {
                        PPTools::naError(__('Invalid Username or Password, Recover your', 'paragon-profile').'<a href="'.get_page_link(get_option('pp_pppasswordrecovery')).'"> '.__('password', 'paragon-profile').' </a>');
                    } else {
                        Tools::naError(__('Invalid Login details, Please check and try again', 'paragon-profile'));
                        wp_die();
                    }
                }
                if (!is_wp_error($user)) {
                    wp_set_current_user($user->ID, $user->user_login);
                    wp_set_auth_cookie($user->ID);
                    do_action('wp_login', $user->user_login);
                    PPTools::naSuccess(__('Login successful ', 'paragon-profile'));
                    wp_die();
                }
            } else {
                PPTools::naError(__('Refresh the page and try again', 'paragon-profile'));
                wp_die();
            }
        }
    }
}
