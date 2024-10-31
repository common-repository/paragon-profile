<?php
/**
 * PARAGON-PROFILE BY KINGSLEY PARAGON
 * HTTP://MRPARAGON.ME/PARAGON-PROFILE.
 */
if (!defined('ABSPATH')) {
    exit;
}
class PProfileContact
{
    public function contactContent()
    {
        ?>
       
        <div class="contactform-content">
  <form action="" class="pp-contact-form" id="ppcontactform" method="post" data-form-title="CONTACT FORM">
                          <?php if (get_option('pp_contactfields_list') == '') : ?>   
                            <div class="form-group">
                                <input type="text" class="form-control" name="Fullname" required="" placeholder="FullName">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" required="" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" name="phone" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" placeholder="Message" rows="7"></textarea>
                            </div>

                        <?php endif;
        ?>
                        <?php if (is_array(get_option('pp_contactfields_list'))) {
    $contactfields = get_option('pp_contactfields_list');
    foreach ($contactfields as $cfield) {
        switch ($cfield) {
                                    case 'Message': ?>
                                 <div class="form-group">
                                <textarea class="form-control" name="message" placeholder="Message" rows="7" ></textarea>
                            </div>
                                    <?php
                                        break;

                                    case 'Phone': ?>
                                        <div class="form-group">
                                        <input type="tel" class="form-control" name="phone" placeholder="Phone" data-form-field="Phone">
                                       </div>

                                    <?php
                                    break;

                                    case 'Email': ?>

                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" required="" placeholder="Email" data-form-field="Email">
                                       </div>
                                    <?php
                                    break;

                                    case 'Firstname': ?>
                                    <div class="form-group">
                                            <input type="text" class="form-control" name="FirstName" required="" placeholder="FirstName" >
                                        </div>
                                        <?php

                                    break;

                                    case 'Fullname': ?>
                                         <div class="form-group">
                                            <input type="text" class="form-control" name="Fullname" required="" placeholder="Fullname" >
                                        </div>

                                  <?php 
                                    break;

                                    case 'Website': ?>
                                    <div class="form-group">
                                        <input type="url" class="form-control" name="Website" placeholder="Website" >
                                       </div>
                                    <?php

                                    break;

                                        default: ?>
                                        <div class="form-group">
                                        <input type="text" class="form-control" name="<?php echo $cfield; ?>" placeholder="<?php echo $cfield; ?>" >
                                       </div>
                                        
                                        <?php
                                        break;
                                }
    }
}
        ?>
                            <div class="mbr-buttons mbr-buttons--right"><button type="submit" class="btn-purpose btn btn-lg btn-primary pull-right" id="contactformbtn"> <?php _e('CONTACT US', 'paragon-profile');
        ?></button></div>
                        
               

                        </form>


</div>


<?php

    }
}
