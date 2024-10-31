<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit();
}

 delete_option('pp_admintab_show');
 delete_option('pp_clientuser_adminaccess');
 delete_option('pp_clientuser_dashpage');

 delete_option('pp_set_logout_url');
 delete_option('pp_regfields_list');
 delete_option('pp_contactfields_list');

 delete_option('pp_contactemail_msg');
 delete_option('pp_contactemail_mailto');
 delete_option('pp_contactemail_subject');

 delete_option('pp_my_theme_has_bootstrap');
 delete_option('pp_icon_menu_item');
 delete_option('pp_chosen_form_style');
wp_clear_scheduled_hook('ppTokenGeneratorStarter');
