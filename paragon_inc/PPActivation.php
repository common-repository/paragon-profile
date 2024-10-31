<?php

class PPActivation
{
    public static function doActivation()
    {
        self::tokenGeneratorWorkSchedule();
        self::autoCreatePages();
    }

    public static function tokenGeneratorWorkSchedule()
    {
        $nexrun = wp_next_scheduled('ppTokenGeneratorStarter');
        if ($nexrun == false) {
            wp_schedule_event(time(), 'hourly', 'ppTokenGeneratorStarter');
        }
    }

    public static function autoCreatePages()
    {
        $pp_pages = array('ppprofile', 'pplogin', 'ppregister','ppcontact','pppasswordrecovery');

        foreach ($pp_pages as $page) {
            switch ($page) {
                case 'ppprofile':
                    $pagetitle = 'Profile';
                    break;

case 'pplogin':
                    $pagetitle = 'Login';
                    break;

                    case 'ppregister':
                    $pagetitle = 'Register';
                    break;

                    case 'ppcontact':
                    $pagetitle = 'Contact Us';
                    break;

                    case 'pppasswordrecovery':
                    $pagetitle = 'Password Recovery';
                    break;

                default:
                    $pagetitle = $page.' page';
                    break;
            }
            if (!get_option('pp_'.$page)) {
                $pagecreator = array(
    'post_title' => $pagetitle,
    'post_content' => '['.$page.']',
    'post_status' => 'publish',
    'post_type' => 'page',
    'post_author' => get_current_user_id(),
    'post_date' => date('Y-m-d H:i:s'),
);
                $pageid = wp_insert_post($pagecreator);
                add_option('pp_'.$page, $pageid);
            }
        }
    }
}
