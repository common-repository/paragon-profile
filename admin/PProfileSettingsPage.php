<?php
/**
 * Paragon Profile
 * HTTP://MRPARAGON.ME/paragon-profile;.
 */
if (!defined('ABSPATH')) {
    exit;
}
class PProfileSettingsPage
{
    public function __construct()
    {
        add_action('admin_init', array($this, 'registerPageSetting'));
        add_action('admin_menu', array($this, 'addmenuPage'));
        add_action('admin_footer', array($this, 'addTestAjaxCall'));
    }

    public function addmenuPage()
    {
        add_options_page(__('Paragon Profile Options', 'paragon-profile'), __('Paragon Profile Settings', 'paragon-profile'), 'manage_options', 'pp_settings_option', array($this, 'PProfileCurrentPage'));
    }

    public function registerPageSetting()
    {
        register_setting('ppgen_setting_group', 'pp_admintab_show', array($this, 'savePPSetting'));
        register_setting('ppgen_setting_group', 'pp_clientuser_adminaccess', array($this, 'savePPSetting'));
        register_setting('ppgen_setting_group', 'pp_clientuser_dashpage', array($this, 'savePPSetting'));
        register_setting('ppgen_setting_group', 'pp_set_logout_url', array($this, 'savePPSetting'));

        register_setting('ppregfield_setting_group', 'pp_regfields_list', array($this, 'savePPSetting'));

        register_setting('ppcontactfield_setting_group', 'pp_contactfields_list', array($this, 'savePPSetting'));
        register_setting('ppcontactfield_setting_group', 'pp_contactemail_subject', array($this, 'savePPSetting'));
        register_setting('ppcontactfield_setting_group', 'pp_contactemail_mailto', array($this, 'savePPSetting'));
        register_setting('ppcontactfield_setting_group', 'pp_contactemail_msg', array($this, 'savePPSetting'));

        register_setting('ppstyleset_setting_group', 'pp_icon_menu_item', array($this, 'savePPSetting'));
        register_setting('ppstyleset_setting_group', 'pp_my_theme_has_bootstrap', array($this, 'savePPSetting'));
        register_setting('ppstyleset_setting_group', 'pp_chosen_form_style', array($this, 'savePPSetting'));
    }

    public function PProfileCurrentPage()
    {
        $args = array(
    'sort_order' => 'asc',
    'sort_column' => 'post_title',
    'hierarchical' => 1,
    'exclude' => '',
    'include' => '',
    'meta_key' => '',
    'meta_value' => '',
    'authors' => '',
    'child_of' => 0,
    'parent' => -1,
    'exclude_tree' => '',
    'number' => '',
    'offset' => 0,
    'post_type' => 'page',
    'post_status' => 'publish',
);
        $allpages = get_pages($args);

        // general registration
        $pp_admintab_show = get_option('pp_admintab_show');
        $pp_clientuser_adminaccess = get_option('pp_clientuser_adminaccess');
        $pp_clientuser_dashpage = get_option('pp_clientuser_dashpage');
        $pp_set_logout_url = get_option('pp_set_logout_url');

        // registration
        $pp_regfields_list = get_option('pp_regfields_list');

        //contact 
        $pp_contactfields_list = get_option('pp_contactfields_list');
        $pp_contactemail_msg = get_option('pp_contactemail_msg');
        $pp_contactemail_mailto = get_option('pp_contactemail_mailto');
        $pp_contactemail_subject = get_option('pp_contactemail_subject');

        // style settings
        $pp_my_theme_has_bootstrap = get_option('pp_my_theme_has_bootstrap');
        $pp_icon_menu_item = get_option('pp_icon_menu_item');
        $pp_chosen_form_style = get_option('pp_chosen_form_style');
        ?>
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">General Settings</a></li>
    <li><a href="#tabs-2">Registration Fields </a></li>
    <li><a href="#tabs-3">Contact Form </a></li>
    <li><a href="#tabs-4">Style Settings </a></li>
  </ul>
  <div id="tabs-1">
    <div class="panelGeneral">
    <h4 class="set-h"> Settings </h4>
    <form class="" method="POST" action="options.php">
    <?php settings_fields('ppgen_setting_group');
        ?>
    <table class="pp-gen-setting-table">
<tr> <td><label for="pp_admintab_show"> Hide Admin Bar for Non-Admin Users</label></td> <td> <input type="checkbox" name="pp_admintab_show" <?php if ($pp_admintab_show == 'Yes'): ?> checked <?php endif;
        ?> value="Yes"></td>  </tr>

<tr>
<td><label for ="pp_clientuser_adminaccess"> Allow Users to Access Wordpress Admin Dashboard </label> </td>
<td> <select class="form-control "  name="pp_clientuser_adminaccess" id="pp_clientuser_adminaccess">
    <option value="Yes" <?php if ($pp_clientuser_adminaccess == 'Yes') {
    echo 'selected';
}
        ?> > Yes</option>
    <option value="No" <?php if ($pp_clientuser_adminaccess == 'No') {
    echo 'selected';
}
        ?>> No  </option>
</select> </td>
 </tr>

<tr> 
<td><label for ="pp_clientuser_dashpage"> Select Page to redirect users after login </label></td>
<td>
<select class="form-control "  name="pp_clientuser_dashpage" id="sp_clientuser_dashpage">
    <?php foreach ($allpages as $page) {
    ?>
 <option value="<?php echo $page->ID;
    ?>" <?php if ($pp_clientuser_dashpage == $page->ID) {
    echo 'selected';
}
    ?> > <?php echo $page->post_title;
    ?></option>
        <?php

}
        ?>

</select>
</td>
 </tr>
 <tr>
     <td><label for="pp_set_logout_url"> Logout redirect to </label> </td> 

     <td> 
<select class="form-control "  name="pp_set_logout_url" id="pp_set_logout_url">
    <?php foreach ($allpages as $page) {
    ?>
 <option value="<?php echo $page->ID;
    ?>" <?php if ($pp_set_logout_url == $page->ID) {
    echo 'selected';
}
    ?> > <?php echo $page->post_title;
    ?></option>
        <?php

}
        ?>

</select>


        </td>
 </tr>
<tr> <td colspan="2"> <button type="submit" class="btn btn-primary"> Save Settings</button> </td>  </tr>
    </table>
    </form>
    </div>

  </div>
  <div id="tabs-2">
    <div class="panelReg">
    <div id="ppdisplay_view_form"> </div>
    <form class="" id="ppregform" method="POST" action="options.php">
<?php settings_fields('ppregfield_setting_group');
        ?>
    <div class="form-row">
    <div class="col-6">
     <label for="pp_regfields_list"> Selected Registration Fields </label> <br>
     <input type='button' id="ppdownbtn" class="btn btn-primary" value='Dn'>
    <input type='button' id="ppupbtn" class="btn btn-primary" value='Up'> 
    
     <select class="select-control" id="regisfield" name="pp_regfields_list[]" multiple>
     <?php foreach ($pp_regfields_list as $regfield): ?>
        <option value="<?php echo $regfield;
        ?>"> <?php echo $regfield;
        ?> </option>
        <?php endforeach;
        ?>
     </select> 
     
      <button class="btn btn-red" id="fieldremovebtn" name="fieldremovebtn" type="button" > Remove </button>
     </div> 
     <div class="col-6">
     <label for="availabefield"> Available Fields </label> <br>
     <select class="select-control" id="availabefield" name="availabefield" multiple> 
     <option value="Username"> Username </option>
     <option value="Password"> Password </option>
     <option value="Email"> Email</option>
     <option value="Firstname"> First Name</option>
     <option value="Lastname"> Last Name</option>
     <option value="Nickname"> Nick Name </option>
     <option value="Bio"> Bio</option>
     <option value="Website"> Website</option>
     </select>
 
     <button class="btn btn-green" id="availablefieldbtn" type="button" > Add </button>
     </div>
     </div>
<div class="cls"> </div>
<button type="button" id="ppsavefieldsbtn" class="btn btn-blue"> Save Settings</button>

        </form>
    </div>
 
  </div>
  <div id="tabs-3">
    <div class="panelOthers">
    <form class="" id="ppcontactform" method="POST" action="options.php">
<?php settings_fields('ppcontactfield_setting_group');
        ?>
    <div class="form-row">
    <div class="col-6">
     <label for="pp_contactfields_list"> Selected Registration Fields </label> <br>
     <input type='button' id="ppcdownbtn" class="btn btn-primary" value='Dn'>
    <input type='button' id="ppcupbtn" class="btn btn-primary" value='Up'> 
    
     <select class="select-control" id="contacfield" name="pp_contactfields_list[]" multiple>
     <?php foreach ($pp_contactfields_list as $contactfield): ?>
        <option value="<?php echo $contactfield;
        ?>"> <?php echo $contactfield;
        ?> </option>
        <?php endforeach;
        ?>
     </select> 
     
      <button class="btn btn-red" id="contactremovebtn" name="contactremovebtn" type="button" > Remove </button>
     </div> 
     <div class="col-6">
     <label for="sel_ava_contactfields"> Available Fields </label> <br>
     <select class="select-control" id="sel_ava_contactfields" name="sel_ava_contactfields" multiple> 
     <option value="Fullname"> Full Name </option>
     <option value="Firstname"> First Name </option>
     <option value="Lastname"> Last Name</option>
     <option value="Email"> Email</option>
     <option value="Phone"> Phone </option>
     <option value="Subject"> Subject </option>
     <option value="Message"> Message</option>
     </select>
 
     <button class="btn btn-green" id="availablecontactbtn" type="button" > Add </button>
     </div>
     </div>
 <div class="cls"> </div>

<div class="more_con_setting">
<table class="pp-gen-setting-table">
<tr>
  <td><label for="pp_contactemail_subject"> Email Subject  </label> </td>
  <td> <input type="text" value="<?php echo $pp_contactemail_subject;
        ?>" name="pp_contactemail_subject">   </td>
</tr>

<tr>
  <td><label for="pp_contactemail_mailto"> To Email (Default: Admin Email)  </label> </td>
  <td> <input type="text" value="<?php echo $pp_contactemail_mailto;
        ?>" name="pp_contactemail_mailto">   </td>
</tr>

<tr>
  <td><label for="pp_contactemail_msg"> Contact Success Message </label> </td>
  <td> <input type="text" value="<?php echo $pp_contactemail_msg;
        ?>" name="pp_contactemail_msg">   </td>
</tr>

<tr> <td> </td> <td><button type="button" id="ppsavecontactfieldsbtn" class="btn btn-blue"> Save Settings </button>
 </td></tr>
</table>
</div>
        </form>
</div>
  </div>

  <div id="tabs-4">
  <div class="panelstylesettings">
<form class="" method="POST" action="options.php">
<?php settings_fields('ppstyleset_setting_group');
        ?>

<table class="pp-gen-setting-table">
<tr><td> <label for="pp_icon_menu_item"> Show Icon on menu item on sidebar </label></td> 
<td> <input type="checkbox" name="pp_icon_menu_item" <?php if ($pp_icon_menu_item == 'on') {
    echo 'checked';
};
        ?>></td></tr>

<tr>
<td><label for="pp_my_theme_has_bootstrap">Disable  Bootstrap (if your theme supports bootstrap already) </label> </td>
<td> <input type="checkbox" <?php if ($pp_my_theme_has_bootstrap == 'on') {
    echo 'checked';
}
        ?> name="pp_my_theme_has_bootstrap"> </td>
 </tr>

 <tr> 
<td> <label for="pp_chosen_form_style"> Choose front pages style </label>  </td>
<td> <select name="pp_chosen_form_style" class="">  
<option value="SMSPress" <?php if ($pp_chosen_form_style == 'SMSPress') {
    echo 'selected';
}
        ?>> Default  </option>
<option value="Blue" <?php if ($pp_chosen_form_style == 'Blue') {
    echo 'selected';
}
        ?>> Blue  </option>

<option value="Red" <?php if ($pp_chosen_form_style == 'Red') {
    echo 'selected';
}
        ?>> Red  </option>
<option value="Yellowgreen" <?php if ($pp_chosen_form_style == 'Yellowgreen') {
    echo 'selected';
}
        ?>> YellowGreen  </option>
<option value="Dark" <?php if ($pp_chosen_form_style == 'Dark') {
    echo 'selected';
}
        ?>> Dark  </option>
<option value="Gray" <?php if ($pp_chosen_form_style == 'Gray') {
    echo 'selected';
}
        ?>> Gray  </option>
<option value="Freedom" <?php if ($pp_chosen_form_style == 'Freedom') {
    echo 'selected';
}
        ?>> Freedom  </option>
</select> </td>
  </tr>
 <tr>  <td> </td> <td> <button type="submit" class="btn btn-blue"> Submit </button></td></tr>
</table>

</form>
  </div>

  </div>
</div>  <!-- /tab -->
<?php

    }

    public function savePPSetting($var)
    {
        // you can process before returning 
        return $var;
    }

    public function addTestAjaxCall()
    {
        ?>
<script type="text/javascript">
jQuery('document').ready(function(){

// all your javascript for this page here

});

</script>

    <?php

    }
}// close class

$ppAdminOptionSet = new PProfileSettingsPage();
?>
