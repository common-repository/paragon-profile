<?php

/**
 * Plugin Name: Paragon Profile
 * Plugin URI: http://mrparagon.me/paragon-profile
 * Description: Wordpress Login, Registration, Profile, Password Recovery, Secure Ajax  Forms, styled to your need, with options to adjust colors, All bootstrap. Wooh!!
 * Version: 1.1
 * Author: Kingsley Paragon
 * Author URI: http://mrparagon.me/
 * Text Domain:  paragon-profile
 * Domain Path:  /languages
 * License: GPLV2+.
 */
if (!defined('ABSPATH')) {
    exit;
}

function pprofileActivate()
{
    require_once plugin_dir_path(__FILE__).'/paragon_inc/PPActivation.php';
    PPActivation::doActivation();
}

function pprofileDeactivate()
{
    require_once plugin_dir_path(__FILE__).'/paragon_inc/PPDeactivation.php';
    PPDeactivation::doDeactivation();
}

register_activation_hook(__FILE__, 'pprofileActivate');
register_deactivation_hook(__FILE__, 'pprofileDeactivate');

/**
 * Let's Do it.
 */
require_once plugin_dir_path(__FILE__).'/paragon_inc/PProfileLoader.php';
 new PProfileLoader();
