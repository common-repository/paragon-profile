<?php
/**
 * PARAGON-PROFILE BY KINGSLEY PARAGON
 * HTTP://MRPARAGON.ME/PARAGON-PROFILE.
 */
if (!defined('ABSPATH')) {
    exit;
}
class PProfilePasswordRecovery
{
    public function passwordRecoveryContent()
    {
        ?>
  
<div class="passwordrecovery-container">
  <div id="passwordrecoverydata">  </div>
<!-- the form -->
<form action="" id="svpasswordrecoveryform" method="POST">

                            <div class="form-group">
                            <label for="recoveryemail"><?php _e('Recovery Email', 'paragon-profile');
        ?> </label>
                                <input type="email" class="form-control" name="recoveryemail" required="">
                            </div>

                            <div class="mbr-buttons mbr-buttons--right"><button type="submit" class="mbr-buttons__btn btn 

btn-lg btn-primary btn-purpose"><?php _e('RECOVER PASSWORD', 'paragon-profile');
        ?></button></div>
                        </form>

<!-- /form -->

</div>



<?php

    }
}

?>