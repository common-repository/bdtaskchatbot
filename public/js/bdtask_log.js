
    "use strict";
  function start_chat_with_admin(id){
    var userName = jQuery('#uname').attr('data-id');
    var ajaxurl = object.ajaxurl;
              data ={
              type:'GET',
              action:'wlcomechat_ajaxProsessData',
              user:id,
              security :object.nonce,
            };
        jQuery.post(ajaxurl,data, function(response) {
         // alert(response);
         jQuery('#head_line_title').html(userName);
         jQuery('#table_hide').hide();
         jQuery('#chatmessage').show();
          jQuery("#chat-text-message").html(response);
         jQuery('#div_result').hide();
         jQuery('#chat-text').hide();
         jQuery('#message_show').hide();
         jQuery('.chat-settings').show();
        });   
  return false;
}

// submit user information 
    "use strict";
function store_visitor_data(){
     var vname = jQuery('#vname').val();
     var email = jQuery('#email').val();
     var department = jQuery('#department').val();
     var phone = jQuery('#phone').val();
     var visit_url =jQuery('#url').val();
     if(vname !='' && email!='' && department !='' && phone!=''){
     jQuery('#chat-text').hide();
     var ajaxurl = object.ajaxurl;
     data ={
     action:'professional_ajaxProsessData',
     vname:vname,email:email,department:department,phone:phone,visit_url:visit_url,
     security :object.nonce
    };
    jQuery.post(ajaxurl,data, function(response) {
     //alert(response);
     jQuery('.full_name').html(vname);
     jQuery('#chat-text').hide();
     jQuery("#div_result").html(response);
     jQuery('.chat-settings').show();
  });
  }else{
    jQuery('#error').html("<div class='alert alert-danger alert-dismissible'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Error!</strong>Please fill in all fields. </div>");
  }
return false; 
}


    "use strict";
jQuery('#formmsg').submit(function(e){
var  message=jQuery('#message').val();
var ajaxurl = object.ajaxurl;
            data ={
            type:'post',
             action:'manualchat_messate_ajaxProsessData',
             message:message,
              security :object.nonce
          };
      jQuery.post(ajaxurl,data, function(response) {
          // alert(response);
      jQuery('#message_show').show();
      jQuery("#chat-text-messaged").html(response);
        jQuery("#message").val('');
        jQuery(".emojionearea-editor").text('');
        jQuery("#message").focus();
        jQuery(".emojionearea-editor").focus();
        jQuery('.emojionearea-button').removeClass('active');
        jQuery('.emojionearea-search-position-top').addClass('hidden');
        var div = jQuery("<div class='message me'>")
        .append(jQuery("<div class='text-main'>").append(jQuery("<span class='time-ago'><?= date('h:i A')?></span>").append(jQuery("<div class='text-group me'>")
        .append(jQuery("<div class='text me'>").append("<p>"+message+"</p>")))));
        jQuery("#chat-text-message" ).append(div);
        jQuery('.bd-message-content')[0].scrollTop = jQuery('.bd-message-content')[0].scrollHeight;
      });   
    return false;
});


// noton 
    "use strict";
jQuery('#formmsgs').submit(function(e){
        var  message=jQuery('#message').val();
        var ajaxurl = object.ajaxurl;
            data ={
               type:'post',
               action:'manualchat_messate_ajaxProsessData',
               message:message,
              security :object.nonce,
            };
          jQuery.post(ajaxurl,data, function(response) {
         //alert(response);    
          jQuery('#message_show').show();
          jQuery('.chat-settings').show();
          jQuery("#message").val('');
          jQuery(".emojionearea-editor").text('');
          jQuery("#message").focus();
          jQuery(".emojionearea-editor").focus();
          jQuery('.emojionearea-button').removeClass('active');
          jQuery('.emojionearea-search-position-top').addClass('hidden');
          var div = jQuery("<div class='message me'>")
          .append(jQuery("<div class='text-main'>").append(jQuery("<span class='time-ago'><?php //echo date('h:i A');?></span>").append(jQuery("<div class='text-group me'>")
          .append(jQuery("<div class='text me'>").append("<p>"+message+"</p>")))));
           jQuery("#message_show" ).append(div);
          jQuery('.bd-message-content')[0].scrollTop = jQuery('.bd-message-content')[0].scrollHeight;
      });   
    return false;
});


//logout
  "use strict";
function logout_info(){
var ajaxurl = object.ajaxurl;
    data ={
          type: "get",
          action:'logout',
          security :object.nonce
     };
    jQuery.post(ajaxurl,data, function(response) {
     // alert(response);
      setTimeout(function(){
       window.location.reload(1);
    },1000);
       
    }); 
  }


// file upload 
  jQuery(function($) {
  "use strict";
      jQuery('body').on('change', '#filesss', function() {
      var ajaxurl = object.ajaxurl;
          var file_data = jQuery(this).prop('files')[0];
          var form_data = new FormData();
          form_data.append('file', file_data);
          form_data.append('action', 'upload_files');
           jQuery.ajax({
              url: ajaxurl,
              type: 'POST',
              contentType: false,
              processData: false,
              data: form_data,
              security :object.nonce,
              success: function (response) {
                 // alert(response);
              }
          });
      });
  });

// enter value save data base 
jQuery('.enterValue').on("keyup", ".messageChat", function(e){
    "use strict";
  var chat_message = jQuery(".emojionearea-editor").html();

  var rx = /<img\s+(?=(?:[^>]*?\s)?class="[^">]*emojioneemoji)(?:[^>]*?\s)?alt="([^"]*)"[^>]*>(?:[^<]*<\/img>)?/gi;
  var img=chat_message.replace(rx, "$1");
  var code = (e.keyCode ? e.keyCode : e.which);
 if (code == 13) {
  e.preventDefault();
  if(chat_message != ''){
      var ajaxurl = object.ajaxurl;
        data ={
            type: "post",
            action:'visitor_enter_message',
            data:img,
            security :object.nonce
    };
    jQuery.post(ajaxurl,data, function(response) {
         jQuery('#message_show').show();
         jQuery(".messageChat").val('');
         jQuery(".emojionearea-editor").text('');
         jQuery(".messageChat").focus();
         jQuery(".emojionearea-editor").focus();
         jQuery('.emojionearea-button').removeClass('active');
         jQuery('.emojionearea-search-position-top').addClass('hidden');
          var div =jQuery("<div class='message me' style='margin-bottom:20px'>")
          .append(jQuery("<div class='text-main'>").append(jQuery("<span class='time-ago'><?php echo date('h:i A') ;?></span>").append(jQuery("<div class='text-group me'>")
          .append(jQuery("<div class='text me'>").append("<p>"+img+"</p>")))));
          jQuery("#message_show" ).append(div);
          jQuery('.bd-message-content')[0].scrollTop = jQuery('.bd-message-content')[0].scrollHeight;
       });  
     }

 }

});

jQuery('.enterValues').on("keyup", ".emojionearea-editor", function(e){
var chat_message = jQuery(this).html();
"use strict";
var rx = /<img\s+(?=(?:[^>]*?\s)?class="[^">]*emojioneemoji)(?:[^>]*?\s)?alt="([^"]*)"[^>]*>(?:[^<]*<\/img>)?/gi;
var img=chat_message.replace(rx, "$1");
 var code = (e.keyCode ? e.keyCode : e.which);
  if (code == 13) {
      e.preventDefault();
     var ajaxurl = object.ajaxurl;
            data ={
                type: "post",
                action:'visitor_enter_message',
                data:img,
                security :object.nonce
        };
        jQuery.post(ajaxurl,data, function(response) {
         jQuery('#message_show').show();
          jQuery(".messageChat").val('');
          jQuery(".emojionearea-editor").text('');
          jQuery(".messageChat").focus();
          jQuery(".emojionearea-editor").focus();
          jQuery('.emojionearea-button').removeClass('active');
          jQuery('.emojionearea-search-position-top').addClass('hidden');
        var div =jQuery("<div class='message me' style='margin-bottom:20px'>")
        .append(jQuery("<div class='text-main'>").append(jQuery("<span class='time-ago'><?php echo date('h:i A') ;?></span>").append(jQuery("<div class='text-group me'>")
        .append(jQuery("<div class='text me'>").append("<p>"+img+"</p>")))));
        jQuery("#message_show" ).append(div);
        jQuery('.bd-message-content')[0].scrollTop = jQuery('.bd-message-content')[0].scrollHeight;
       });  
     }
});




// change visitor typing status
var timeout;
jQuery(document).on('keypress', '.messageChats', function(){
       var is_type = 'yes';
      // alert(is_type);
      var ajaxurl = object.ajaxurl;
        data ={
            type: "post",
            action:'live_chat_emus',
            is_type:is_type,
             security :object.nonce,
      };
     jQuery.post(ajaxurl,data, function(response) {
         //alert(response);
       });  
    //if you already have a timout, clear it
    if(timeout){clearTimeout(timeout);}
   //start new time, to perform ajax stuff in 500ms
   timeout = setTimeout(function() {
     var is_typeno = 'no';
     var ajaxurl = object.ajaxurl;
      data ={
            type: "post",
            action:'live_chat_emus',
            is_type:is_typeno,
             security :object.nonce,
      };
    jQuery.post(ajaxurl,data, function(response) {
        //alert(response);
     });
    },2000)
 });