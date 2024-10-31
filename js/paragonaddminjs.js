/**
 * PARAGON-PROFILE
 * HTTP://MRPARAGON.ME/PARAGON-PROFILE;.
 */
jQuery(document).ready(function($){
$('#availablefieldbtn').on('click', function(){

$('#availabefield :selected').each(function(i, selected){ 
  
  $('#regisfield').append('<option value="'+ $(selected).val() + '">'+$(selected).text()+'</option>');

});
});

$('#fieldremovebtn').on('click', function(){
  $('#regisfield :selected').each(function(i, selected){ 
$('#regisfield option[value="'+$(selected).val()+'"]').remove();
 });   
});
$('#ppsavefieldsbtn').on('click',function(){
   $('#regisfield option').prop('selected', true);
  $('#ppregform').submit();
});



//
$('#ppdownbtn').on('click', function(){
var rf = $('#regisfield :selected');
rf.next().after(rf);
});

$('#ppupbtn').on('click', function(){
var rp = $('#regisfield :selected');
rp.prev().before(rp);
});



$('#availablecontactbtn').on('click', function(){

$('#sel_ava_contactfields :selected').each(function(i, selected){ 
  
  $('#contacfield').append('<option value="'+ $(selected).val() + '">'+$(selected).text()+'</option>');

});
});

$('#contactremovebtn').on('click', function(){
  $('#contacfield :selected').each(function(i, selected){ 
$('#contacfield option[value="'+$(selected).val()+'"]').remove();
 });   
});
$('#ppsavecontactfieldsbtn').on('click',function(){
   $('#contacfield option').prop('selected', true);
  $('#ppcontactform').submit();
});



//
$('#ppcdownbtn').on('click', function(){
var cf = $('#contacfield :selected');
cf.next().after(cf);
});

$('#ppcupbtn').on('click', function(){
var cp = $('#contacfield :selected');
cp.prev().before(cp);
});

  });

