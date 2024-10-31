<?php

/**
 * PARAGON-PROFILE BY KINGSLEY PARAGON
 * HTTP://MRPARAGON.ME/paragon-profile.
 */
if (!defined('ABSPATH')) {
    exit;
}
class PPCore
{
    public function __construct()
    {
        add_action('ppTokenGeneratorStarter', array($this, 'createHourlyFormToken'));
        add_filter('show_admin_bar', array($this, 'ppShowHideAdminBar'));
    }

    public function createHourlyFormToken()
    {
        update_option('pp_formtoken', $this->generateToken());
    }

    public function generateToken($length = 25)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@%^';
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

    public function ppShowHideAdminBar()
    {
        if (get_option('pp_admintab_show') == 'on') {
            if (!current_user_can('manage_options')) {
                return false;
            }
        }
    }
}
new PPCore();
