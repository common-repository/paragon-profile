<?php
/**
 * PARAGON-PROFILE BY KINGSLEY PARAGON
 * HTTP://MRPARAGON.ME/PARAGON-PROFILE.
 */
if (!defined('ABSPATH')) {
    exit;
}
class PProfileProfile
{
    public function profileContent()
    {
        if (is_user_logged_in()):

$current_user = wp_get_current_user();
        ?>
  <div class="profile-form">
  <div class="showupdate_report"> </div>
<form action="" id="ppuserprofileform" method="POST">
                              <div class="form-group">
                                <div class="profile-image">
                                <div class="avatarbux">
                                    <?php echo get_avatar(get_current_user_id());
        ?>
                             </div>
                                </div>
                              </div>
                              <div class="cls"> </div>
                             <div class="form-group">
                            <label for="password"><?php _e('Old Password', 'paragon-profile');
        ?> </label>
                                <input type="password" value="pppppppp" class="form-control" name="opassword" required="">
                            </div>

                             <div class="form-group">
                            <label for="password"><?php _e('New Password', 'paragon-profile');
        ?> </label>
                                <input type="password" value="pppppppp" class="form-control" name="npassword" required="">
                            </div>

                            <div class="mbr-buttons mbr-buttons--right"><button type="button" id="passwordupdaterbtnsv" class="btn btn-purpose btn-lg btn-primary pull-right"><?php _e('CHANGE', 'paragon-profile');
        ?></button>
                            </div>


                            <div class="form-group">
                            <label for="username"> <?php _e('Username', 'paragon-profile');
        ?> </label>
                                <input type="text" readonly value="<?php echo $current_user->user_login;
        ?>" class="form-control" name="username" required="">
                            </div>

                            <div class="form-group">
                            <label for="email"> <?php _e('Email', 'paragon-profile');
        ?> </label>
                                <input type="email" readonly value="<?php echo $current_user->user_email;
        ?>" class="form-control" name="email" required="">
                            </div>
                            

                            <div class="form-group">
                            <label for="firstname"> <?php _e('First Name', 'paragon-profile');
        ?> </label>
                                <input type="text" value="<?php echo $current_user->user_firstname;
        ?>" class="form-control" name="firstname" required="">
                            </div>

                            <div class="form-group">
                            <label for ="lastname"> <?php _e('Last Name', 'paragon-profile');
        ?> </label>
                                <input type="text" value="<?php echo $current_user->user_lastname;
        ?>" class="form-control" name="lastname" required="" >
                            </div>

                             <div class="form-group">
                             <label for="nickname"> <?php _e('Nick Name', 'paragon-profile');
        ?> </label>
                                <input type="text" value="<?php echo $current_user->display_name;
        ?>" class="form-control" name="nickname" required="" >
                            </div>

                            <div class="form-group">
                            <label for= "bio"> <?php _e('Bio', 'paragon-profile');
        ?> </label>
                                <textarea class="form-control" name="bio"  rows="7"> <?php echo $current_user->description;
        ?></textarea>
                            </div>

                            <div class="mbr-buttons mbr-buttons--right">
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

                            <button type="submit" class="btn btn-lg btn-purpose btn-primary pull-right"><?php _e('UPDATE', 'paragon-profile');
        ?></button></div>
                        </form>

</div>
<?php endif;
        ?>

<?php if (!is_user_logged_in()): ?>

            <div class="row">
                <div class="col-sm-12">
                    <div class="login-form">
                         <div class="form-proc-result"> </div>
                        <form class="pploginform" id="pp_loginform" method="POST" action="">
                        <div class="row">
                            <div class="col-sm-5">
                                <p class="bar-line"> </p>
                            </div>
                            <div class="col-sm-2">
                                <div class="login-icon"> 
                                <span class="glyphicon glyphicon-user"> </span>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <p class="bar-line"> </p>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="username"> <?php _e('Login', 'paragon-profile');
        ?></label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password"> <?php _e('Password', 'paragon-profile');
        ?></label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            
                            <button type="submit" id="pploginbtn" class="btn btn-block btn-primary"> Login </button>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 pull-left"> 
                                <input type="checkbox" name="rememberme"> <?php _e('Stay logged in', 'paragon-profile');
        ?>
                            
                            </div>
                            <div class="col-sm-6 "> <span class="forgot-pass"> <?php _e('I forgot my password', 'paragon-profile');
        ?></span> </div>
                        </div>
                        
                         </form>
                    </div>
                
                </div>
                
            </div>

<?php endif;
        ?>
<?php

    }
}

?>