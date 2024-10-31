/*


*/
jQuery(document).ready(function($){
            $('#ppregistrationmform').on('submit', function(event){
                $('#showdatregistrationState').html('Doing registration........');
                event.preventDefault();
                var formdaa = $(this).serialize()+'&token='+pp_formtoken+'&action=ppAjaxRegistrationPHP';
                var senddat = $.post(pp_ajaxurl, formdaa);
                senddat.success(function(rdata){
                    $('#showdatregistrationState').html(rdata);
                });  
            });

            $('#ppuserprofileform').on('submit', function(event){
                event.preventDefault();
               var fdata = $(this).serialize()+'&token='+pp_formtoken+'&action=ppAjaxProfilePHP';
               var sdata = $.post(pp_ajaxurl, fdata);
                   sdata.success(function(dareturn){
                    //alert(dareturn);
                $('.showupdate_report').html(dareturn); 
                   });

            });

      $('#passwordupdaterbtnsv').on('click', function(event){
        event.preventDefault();
        var oldpwd = $("input[name='opassword']").val();
        var newpwd = $("input[name='npassword']").val();
        // alert(oldpwd);
        // alert(newpwd);
        if( (oldpwd.length < 4) || (newpwd.length < 4) ){
            $('#.showupdate_report').html('<div class="alert alert-danger"> Enter old and new Password required </div>');
            return;
        }
        
            var datapassword = {
                'oldpwd': oldpwd,
                'newpwd' :newpwd,
                'token': pp_formtoken,
                'action': 'ppAjaxPasswordChangePHP',
            }
            
            var savenew = $.post(pp_ajaxurl, datapassword);
            savenew.success(function(rdatax){
                $('.showupdate_report').html(rdatax);
               // alert(rdatax);


            });
       
      });
      $('#svpasswordrecoveryform').on('submit', function(event){
            event.preventDefault();
             $('#passwordrecoverydata').html('Rendering recovery process.........');
            var fdatas = $(this).serialize()+'&token='+pp_formtoken+'&action=ppAjaxPasswordRecoveryPHP';
            var sendf = $.post(pp_ajaxurl, fdatas);
                sendf.success(function(report){
                    $('#passwordrecoverydata').html(report);
                });
      });

      $('#ppcontactform').on('submit', function(event){
        event.preventDefault();
         $('#contactformbtn').html('SENDING...');
         var cdata = $(this).serialize()+'&token='+pp_formtoken+'&action=ppAjaxContactPHP';
         
         var cformsend = $.post(pp_ajaxurl, cdata);

         cformsend.success(function(rdatx){
            
            $('#contactformbtn').html('DONE');

            $('#ppcontactform').append(rdatx);
         });
         cformsend.error(function(err){
           //alert(err);
         });
      });

$('#pp_loginform').on('submit', function(event){
	event.preventDefault();
	$('#pploginbtn').html('Logging In......');
	var logindata = $(this).serialize()+'&token='+pp_formtoken+'&action=ppProcessUserLogin';
	var goform = $.post(pp_ajaxurl, logindata);
		goform.success(function(report){
			$('.form-proc-result').html(report)
      $('#pploginbtn').html('Completed');
		    
		 if(report.indexOf('Login successful') != -1 ){
        var i = 1;
            setInterval(function () {
                if(i == 0) {
                    window.location = window.location.href;
                }
                i--;
            }, 1000);
    }
		})
})
});
