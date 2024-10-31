<?php
/**
 * PARAGON-PROFILE BY KINGSLEY PARAGON
 * HTTP://MRPARAGON.ME/PARAGON-PROFILE.
 */
if (!defined('ABSPATH')) {
    exit;
}
class PProfileRegister
{
    public function registerContent()
    {
        ?>
  <div class="form-register">
<div id="showdatregistrationState">  </div>
<!-- the form -->
<form action="" id="ppregistrationmform" method="POST">
<?php if (get_option('pp_regfields_list') == '') : ?>
                            <div class="form-group">
                            <label for="username"> <?php _e('Username', 'paragon-profile');
        ?> </label>
                                <input type="text" class="form-control" name="Username" required="">
                            </div>
                             <div class="form-group">
                            <label for="password"> <?php _e('Password', 'paragon-profile');
        ?> </label>
                                <input type="password" class="form-control" name="Password" required="">
                            </div>

                            <div class="form-group">
                            <label for="email"> <?php _e('Email', 'paragon-profile');
        ?> </label>
                                <input type="email" class="form-control" name="Email" required="">
                            </div>
                            

                            <div class="form-group">
                            <label for="Firstname"> <?php _e('First Name', 'paragon-profile');
        ?> </label>
                                <input type="text" class="form-control" name="Firstname" required="">
                            </div>

                            <div class="form-group">
                            <label for ="lastname"> <?php _e('Last Name', 'paragon-profile');
        ?> </label>
                                <input type="text" class="form-control" name="Lastname" required="" >
                            </div>

                             <div class="form-group">
                             <label for="nickname"> <?php _e('Nick Name', 'paragon-profile');
        ?> </label>
                                <input type="text" class="form-control" name="Nickname" required="" >
                            </div>

                            <div class="form-group">
                            <label for= "bio"> <?php _e('Bio', 'paragon-profile');
        ?> </label>
                                <textarea class="form-control" name="bio"  rows="7"></textarea>
                            </div>
<?php endif;
        ?>
<?php if (is_array(get_option('pp_regfields_list'))) {
    $ppfields = get_option('pp_regfields_list');
    foreach ($ppfields as $field) {
        switch ($field) {
        case 'Username': ?>
        <div class="form-group">
                            <label for="username"> <?php _e('Username', 'paragon-profile'); ?> </label>
                                <input type="text" class="form-control" name="Username" required="">
                            </div>
        <?php
            break;

case 'Email': ?>
                    <div class="form-group">
                        <label for="email"> <?php _e('Email', 'paragon-profile'); ?> </label>
                            <input type="email" class="form-control" name="Email" required="">
                        </div>


<?php
        break;

        case 'Website': ?>

                    <div class="form-group">
                            <label for="Website"><?php _e(' Website', 'paragon-profile'); ?> </label>
                                <input type="url" class="form-control" name="Website" required="">
                            </div>
       <?php
        break;

        case 'Bio': ?>
      <div class="form-group">
                            <label for= "Bio"> <?php _e('Bio', 'paragon-profile'); ?> </label>
                                <textarea class="form-control" name="Bio"  rows="7"></textarea>
                            </div>

<?php
        break;

        case 'Password': ?>

                            <div class="form-group">
                            <label for="password"> <?php _e('Password', 'paragon-profile'); ?> </label>
                                <input type="password" class="form-control" name="Password" required="">
                            </div>
       <?php 
        break;

        default: ?>
           <div class="form-group">
                            <label for="<?php echo $field; ?>"> <?php echo $field; ?> </label>
                                <input type="text" class="form-control" name="<?php echo $field; ?>" required="">
                            </div>
        <?php
            break;
    }
    }
}
        ?>
                            <div class="mbr-buttons mbr-buttons--right"><button type="submit" class="mbr-buttons__btn btn 

btn-lg btn-primary btn-purpose pull-right"> <?php _e('SIGN UP', 'paragon-profile');
        ?></button></div>
                        </form>

<!-- /form -->


</div>

<?php

    }
}

?>