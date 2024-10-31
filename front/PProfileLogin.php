<?php
/**
 * PARAGON-PROFILE BY KINGSLEY PARAGON
 * HTTP://MRPARAGON.ME/PARAGON-PROFILE.
 */
if (!defined('ABSPATH')) {
    exit;
}
class PProfileLogin
{
    public function loginContent()
    {
        if (!is_user_logged_in()): ?>
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
							
							<button type="submit" id="pploginbtn" class="btn btn-block btn-primary"> <?php _e('LOGIN', 'paragon-profile');
        ?> </button>
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
	<?php if (is_user_logged_in()): ?>
       <h1> You are currently logged in </h1>
         <?php if ((int) get_option('pp_ppprofile') > 0): ?>
         	 <p> Visit your profile <a href="<?php echo get_page_link(get_option('pp_ppprofile'));
        ?>"> instead </a></p>
         
        <?php endif;
        ?>
	<?php endif;
        ?>

<?php

    }
}

?>