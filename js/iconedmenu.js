/*

*/

jQuery(document).ready(function($){
	//alert('0 is a number');
$(".sidebar a").each(function(){
    //alert( $(this).html());
   var atext = $(this).html();
    var ement = $(this);
     if(atext.indexOf('Login') != -1 ){
     	ement.html('<span class="glyphicon glyphicon-eye-close"  aria-hidden="true"></span> '+atext);
           return;
     }
     else if(atext.indexOf('Register') != -1){
      ement.html('<span class="glyphicon glyphicon-user"  aria-hidden="true""></span> '+atext);
      return;
     }
     else if(atext.indexOf('Profile') != -1){
      ement.html('<span class="glyphicon glyphicon-user"  aria-hidden="true""></span> '+atext);
      return;
     }

     else if(atext.indexOf('Compose') != -1){
      ement.html('<span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span> '+atext);
      return;
     }
     else if(atext.indexOf('Sent') != -1){
     ement.html('<span class="glyphicon glyphicon-ok"  aria-hidden="true"></span> '+atext);
      //return;
     }
     else if(atext.indexOf('Schedule') != -1){
      ement.html('<span class="glyphicon glyphicon-calendar"  aria-hidden="true"></span> '+atext);
     }
     else if(atext.indexOf('Inbox') != -1){
      $(this).html('<span class="glyphicon glyphicon-envelope"  aria-hidden="true"> </span> '+atext);
     }
     else if(atext.indexOf('Recharge') != -1){
      $(this).html('<span class="glyphicon glyphicon-credit-card"  aria-hidden="true"> </span>'+atext);
     }
     else if(atext.indexOf('Voucher')!= -1){
      $(this).html('<span class="glyphicon glyphicon-barcode"  aria-hidden="true"> </span>'+atext);
     }
     else if(atext.indexOf('Transfer')!= -1 ){
      $(this).html('<span class="glyphicon glyphicon-share-alt"  aria-hidden="true"></span> '+atext);
     }
     else if(atext.indexOf('Invoice') != -1){
      $(this).html('<span class="glyphicon glyphicon-cog"  aria-hidden="true"> </span> '+atext);
     }
     else if(atext.indexOf('Report') != -1){
      $(this).html('<span class="glyphicon glyphicon-log-in"  aria-hidden="true"></span> '+atext);
     }

  else if(atext.indexOf('Account Pin') != -1){
      $(this).html('<span class="glyphicon glyphicon-eye-close"  aria-hidden="true"></span> '+atext);
     }

     else if(atext.indexOf('Sort') != -1){
      $(this).html('<span class="glyphicon glyphicon-sort"  aria-hidden="true"></span> '+atext);
     }
    else if(atext.indexOf('Number') != -1){
      $(this).html('<span class="glyphicon glyphicon-sort"  aria-hidden="true"></span> '+atext);
     }

     else if(atext.indexOf('Sent') != -1){
      $(this).html('<span class="glyphicon glyphicon-send"  aria-hidden="true"></span> '+atext);
     }

     else if(atext.indexOf('Draft') != -1){
      $(this).html('<span class="glyphicon glyphicon-file"  aria-hidden="true"></span> '+atext);
     }

     else if(atext.indexOf('Manage') != -1){
      $(this).html('<span class="glyphicon glyphicon-list-alt"  aria-hidden="true"></span> '+atext);
     }

     else if(atext.indexOf('Password') != -1){
      $(this).html('<span class="glyphicon glyphicon-lock"  aria-hidden="true"></span> '+atext);
     }

     else if(atext.indexOf('Home') != -1){
      $(this).html('<span class="glyphicon glyphicon-home"  aria-hidden="true"></span> '+atext);
     }

    
});

$("aside a").each(function(){
    //alert( $(this).html());
   var atext = $(this).html();
    var ement = $(this);
     if(atext.indexOf('Login') != -1 ){
      ement.html('<span class="glyphicon glyphicon-eye-close"  aria-hidden="true"></span> '+atext);
           return;
     }
     else if(atext.indexOf('Register') != -1){
      ement.html('<span class="glyphicon glyphicon-user"  aria-hidden="true""></span> '+atext);
      return;
     }
     else if(atext.indexOf('Profile') != -1){
      ement.html('<span class="glyphicon glyphicon-user"  aria-hidden="true""></span> '+atext);
      return;
     }

     else if(atext.indexOf('Compose') != -1){
      ement.html('<span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span> '+atext);
      return;
     }
     else if(atext.indexOf('Sent') != -1){
     ement.html('<span class="glyphicon glyphicon-ok"  aria-hidden="true"></span> '+atext);
      //return;
     }
     else if(atext.indexOf('Schedule') != -1){
      ement.html('<span class="glyphicon glyphicon-calendar"  aria-hidden="true"></span> '+atext);
     }
     else if(atext.indexOf('Inbox') != -1){
      $(this).html('<span class="glyphicon glyphicon-envelope"  aria-hidden="true"> </span> '+atext);
     }
     else if(atext.indexOf('Recharge') != -1){
      $(this).html('<span class="glyphicon glyphicon-credit-card"  aria-hidden="true"> </span>'+atext);
     }
     else if(atext.indexOf('Voucher')!= -1){
      $(this).html('<span class="glyphicon glyphicon-barcode"  aria-hidden="true"> </span>'+atext);
     }
     else if(atext.indexOf('Transfer')!= -1 ){
      $(this).html('<span class="glyphicon glyphicon-share-alt"  aria-hidden="true"></span> '+atext);
     }
     else if(atext.indexOf('Invoice') != -1){
      $(this).html('<span class="glyphicon glyphicon-cog"  aria-hidden="true"> </span> '+atext);
     }
     else if(atext.indexOf('Report') != -1){
      $(this).html('<span class="glyphicon glyphicon-log-in"  aria-hidden="true"></span> '+atext);
     }

  else if(atext.indexOf('Account Pin') != -1){
      $(this).html('<span class="glyphicon glyphicon-eye-close"  aria-hidden="true"></span> '+atext);
     }

     else if(atext.indexOf('Sort') != -1){
      $(this).html('<span class="glyphicon glyphicon-sort"  aria-hidden="true"></span> '+atext);
     }
     else if(atext.indexOf('Number') != -1){
      $(this).html('<span class="glyphicon glyphicon-sort"  aria-hidden="true"></span> '+atext);
     }

     else if(atext.indexOf('Sent') != -1){
      $(this).html('<span class="glyphicon glyphicon-send"  aria-hidden="true"></span> '+atext);
     }

     else if(atext.indexOf('Draft') != -1){
      $(this).html('<span class="glyphicon glyphicon-file"  aria-hidden="true"></span> '+atext);
     }

     else if(atext.indexOf('Manage') != -1){
      $(this).html('<span class="glyphicon glyphicon-list-alt"  aria-hidden="true"></span> '+atext);
     }

     else if(atext.indexOf('Password') != -1){
      $(this).html('<span class="glyphicon glyphicon-lock"  aria-hidden="true"></span> '+atext);
     }

     else if(atext.indexOf('Home') != -1){
      $(this).html('<span class="glyphicon glyphicon-home"  aria-hidden="true"></span> '+atext);
     }

    
});
});

