<?php

/**
 * The class PProfileLoader 
 * Loads all other pages and features.
 */
if (!defined('ABSPATH')) {
    exit;
}
class PProfileLoader
{
    private $version;

    public function __construct()
    {
        $this->version = '1.1';
        $this->doCore();
        $this->checkAccessSetting();
        $this->getAllAdminActionFilters();
        $this->getAllFrontActionFilters();
        $this->addAllShortCode();
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function addRequiredFrontJS()
    {
        if (get_option('pp_my_theme_has_bootstrap') != 'on') {
            wp_enqueue_script('bootpressjs', plugins_url().'/paragon-profile/js/bootstrap.min.js');
        }
        wp_enqueue_script('paragonjs', plugins_url().'/paragon-profile/js/paragon.js', array('jquery'), '', true);
        if (get_option('pp_icon_menu_item') == 'on') {
            wp_enqueue_script('ppiconstyle', plugins_url().'/paragon-profile/js/iconedmenu.js', array('jquery'), '', true);
        }
    }

    public function addRequiredFrontCSS()
    {
        if (get_option('pp_my_theme_has_bootstrap') != 'on') {
            wp_enqueue_style('bootpresscss', plugins_url().'/paragon-profile/css/bootstrap.min.css', array(), $this->getVersion(), 'All');
        }

        if (get_option('pp_chosen_form_style') == '' || get_option('pp_chosen_form_style') == 'SMSPress') {
            wp_enqueue_style('paragoncss', plugins_url().'/paragon-profile/css/paragoncss.css', array(), $this->getVersion(), 'All');
        } else {
            wp_enqueue_style('userstlye', plugins_url().'/paragon-profile/css/'.get_option('pp_chosen_form_style').'.css', array(), $this->getVersion(), 'All');
        }
    }

    public function addRequiredBackJS()
    {
        wp_enqueue_script('jquery-ui-tabs', false, array('jquery'), '', true);
        wp_enqueue_script('uiscript', plugins_url().'/paragon-profile/js/uiscript.js');
        wp_enqueue_script('paragonaddminjs', plugins_url().'/paragon-profile/js/paragonaddminjs.js');
    }

    public function addRequiredBackCSS()
    {
        wp_enqueue_style('sv_jqueryui_css', plugins_url().'/paragon-profile/css/jquery-ui.min.css');
        wp_enqueue_style('paraadmincss', plugins_url().'/paragon-profile/css/paraadmincss.css');
        wp_enqueue_style('paraadmincss2', plugins_url().'/paragon-profile/css/paraadmincss2.css');
    }

    public function getAllAdminActionFilters()
    {
        add_action('admin_enqueue_scripts', array($this, 'addRequiredBackCSS'));
        add_action('admin_enqueue_scripts', array($this, 'addRequiredBackJS'));
        require_once plugin_dir_path(dirname(__FILE__)).'admin/PProfileSettingsPage.php';
    }

    public function getAllFrontActionFilters()
    {
        add_action('wp_enqueue_scripts', array($this, 'addRequiredFrontCSS'));
        add_action('wp_enqueue_scripts', array($this, 'addRequiredFrontJS'));

        return;
    }

    public function addAllShortCode()
    {
        require_once plugin_dir_path(dirname(__FILE__)).'shortcode/PProfileShortCode.php';
        $shortcode = new PProfileShortCode();
    }

    public function doCore()
    {
        require_once plugin_dir_path(dirname(__FILE__)).'core/PPCore.php';
    }

    public function checkAccessSetting()
    {
        require_once plugin_dir_path(dirname(__FILE__)).'core/PPUserPower.php';
    }
}
