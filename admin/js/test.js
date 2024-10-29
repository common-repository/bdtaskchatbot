 jQuery(document).ready(function () {
   "use strict";
        totalinfo();
  });
 "use strict";
   function totalinfo(){
      var ajaxurl = object.ajaxurl;
      //var ajaxurl ="<?php echo admin_url('admin-ajax.php');?>";
	    data ={
	        type: "GET",
	        action:'all_info',
	        security :object.nonce
	      };
	    jQuery.post(ajaxurl,data, function(response) {
	    	var data=JSON.parse(response);
             // console.log(data); 
             jQuery('#online_visitor').html(data.onlineVisitor[0].total_visitor);
             jQuery('#total_customer').html(data.customer[0].total_customer);
             jQuery('#total_lead').html(data.lead[0].total_lead);
             jQuery('#total_issues').html(data.issues[0].total_issues);
             jQuery('#total_solved').html(data.solved[0].total_solved);
	    });
     return false;  

}




// bdtaskchatbot_chat

// notifications counter
"use strict";
function load_notify_counter(){
         var ajaxurl = object.ajaxurl;
            data ={
                type: "GET",
                action:'nofity_counter',
                security :object.nonce
              };
            jQuery.post(ajaxurl,data, function(response) {
             // alert(response);
            jQuery("#notify_counter").html(response); 
      }); 
    return false;    
  
}



// recentChat list
"use strict";
function recentChat(){
   var ajaxurl = object.ajaxurl;
    data ={
        type: "GET",
        action:'RecentChatlist',
        security :object.nonce
      };
    jQuery.post(ajaxurl,data, function(response) {

    jQuery("#recentChat_load").html(response); 
  }); 

    return false;    
}    



// onlineVisitor list
"use strict";
function onlineVisitor(){
   var ajaxurl = object.ajaxurl;
        data ={
            type: "GET",
            action:'onlinevisitor',
            security :object.nonce
          };
        jQuery.post(ajaxurl,data, function(response) {
           jQuery("#visitors_list").html(response); 
          //alert(response);
  }); 

  return false;    
}


// contact list
"use strict";
function contactList(){
      var ajaxurl = object.ajaxurl;
        data ={
            type: "GET",
            action:'visitors_contact',
            security :object.nonce
          };
        jQuery.post(ajaxurl,data, function(response) {
         // alert(response);
        jQuery("#contact_list").html(response); 
      });  
    return false;   
 }



"use strict";
function Notification(){
  var ajaxurl = object.ajaxurl;
        data ={
            type: "GET",
            action:'notifications',
            security :object.nonce
          };
        jQuery.post(ajaxurl,data, function(response) {
    
        jQuery("#newnotification").html(response);  
      });   
    return false;  
}




// visitor information
"use strict";
function visitor_info(id){

  jQuery(".empty-content-hide").hide();
  var ajaxurl = object.ajaxurl;
        data ={
            type: "post",
            action:'chat_conversiton',
            data:id,
             security :object.nonce
          };
        jQuery.post(ajaxurl,data, function(response) {
        // alert(response);
         jQuery("#chat_conversiton_both").html(response);

        jQuery('.chat-list__in').each(function () {
            const ps = new PerfectScrollbar(jQuery(this)[0]);
        });
        jQuery('.message-content-scroll').each(function () {
            const ps = new PerfectScrollbar(jQuery(this)[0]);
        });

        jQuery('.chat-list__sidebar--right').each(function () {
            const ps = new PerfectScrollbar(jQuery(this)[0]);
        });
    //emojionearea
        jQuery(".emojionearea").emojioneArea({
            pickerPosition: "top",
            filtersPosition: "bottom",
            tones: false,
            autocomplete: false,
            inline: true,
            hidePickerOnBlur: false
        });
        jQuery('.change-bg-color label').on('click', function () {
            var color = jQuery(this).data('color');
            jQuery('.message-content').each(function () {
                jQuery(this).removeClass(function (index, css) {
                    return (css.match(/(^|\s)bg-\S+/g) || []).join(' ');
                });
                jQuery(this).addClass('bg-text-' + color);
            });
        });  
        
      });   
   return false;
}




 // search contact list
 "use strict";
jQuery('#search_query').on('keyup', function(){
    jQuery(".nav-link").removeClass( "active" );
    jQuery("#chat").removeClass( "show active" );
    jQuery("#contacts").addClass( "show active" );
        var txt = jQuery(this).val();
            if(txt==''){
            jQuery('#contact_list').show();
            jQuery('#search_view').hide();
             }else{
        jQuery('#contact_list').hide();
      }
     if(txt.length>2){
      var ajaxurl = object.ajaxurl;
        data ={
            type: "post",
            action:'contact_list_search',
            data:txt,
            security :object.nonce
          };
       jQuery.post(ajaxurl,data, function(response) {
       
        jQuery('#search_view').html("");
         jQuery("#search_view").html(response); 
         jQuery('#search_view').show();
         jQuery("#contacts-tab").addClass("active show");
        });  
     } 
}); 


