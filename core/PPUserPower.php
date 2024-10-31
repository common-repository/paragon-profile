<?php

/**
 * PARAGON-PROFILE BY KINGSLEY PARAGON
 * HTTP://MRPARAGON.ME/paragon-profile.
 */
if (!defined('ABSPATH')) {
    exit;
}
class PPUserPower
{
    public function __construct()
    {
        add_action('init', array($this, 'PPcheckStatusForwardUser'));
        add_filter('login_redirect', array($this, 'PPcheckAfterLoginShowPage'));
        // add_action('before_delete_post', array($this, 'PPcheckPageDeletedDoNeedful'));
    }

    public function PPcheckStatusForwardUser()
    {
        if (get_option('pp_clientuser_adminaccess') == 'No') {
            if (is_user_logged_in() && is_admin() && !current_user_can('administrator') && !defined('DOING_AJAX')) {
                wp_redirect(home_url());
            }
        }

        // return;
    }

    public function PPcheckAfterLoginShowPage($redirect_to)
    {
        //print_r(func_get_args());
        if (get_option('pp_clientuser_adminaccess') == 'No') {
            global $user;

            if (isset($user->roles) && is_array($user->roles)) {
                if (in_array('administrator', $user->roles)) {
                    return $redirect_to;
                } else {
                    if ((int) get_option('pp_clientuser_dashpage') > 0) {
                        return get_page_link(get_option('pp_clientuser_dashpage'));
                    } else {
                        return home_url();
                    }
                }
            } else {
                return $redirect_to;
            }
        } else {
            return $redirect_to;
        }
    }

    // public function checkPageDeletedDoNeedful($postid)
    // {
    //     $content = get_post_field('post_content', $postid);
    //     if (strpos($content, '[')) {
    //         if (isset($short[0]) && $short[0] == '[') {
    //             $short = explode('[', $content);
    //             if (isset($short[1])) {
    //                 delete_option('pp_'.$short[1]);
    //             }
    //         }
    //     }
    //     // exit;
    // }
}
$PPuserpower = new PPUserPower();
