	
	// submit message by button
	"use strict";
	function submit_admin_data(){
		var  admin_message=jQuery('#admin_message').val();
		var ajaxurl = object.ajaxurl;
		data ={
		type: "post",
		action:'admin_message',
		data:admin_message,
		security :object.nonce,
		};
		jQuery.post(ajaxurl,data, function(response) {
		// alert(response);
		jQuery("#admin_message").val('');
		jQuery(".emojionearea-editor").text('');
		jQuery("#admin_message").focus();
		jQuery(".emojionearea-editor").focus();
		jQuery('.emojionearea-button').removeClass('active');
		jQuery('.emojionearea-search-position-top').addClass('hidden');
		var div =jQuery("<div class='message' style='margin-bottom:20px'>")
			.append(jQuery("<div class='text-main'>").append(jQuery("<span class='time-ago'><?php date_default_timezone_set(get_option('timezone_string')); echo date('h:i A') ;?></span>").append(jQuery("<div class='text-group'>")
			.append(jQuery("<div class='text'>").append("<p>"+admin_message+"</p>")))));
			// jQuery("#chat-text-message" ).append(div);
			jQuery("#message_show" ).append(div);
			
			});
	return false;
}

"use strict";
function bdtaskchatbot_enter_admin_messages(){
// enter submit message
jQuery('.enterValue').on("keyup", ".messageChat", function(e){
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
			action:'admin_enter_message',
			data:img,
			security :object.nonce,
		};
	jQuery.post(ajaxurl,data, function(response) {
	// alert(response);
		jQuery(".messageChat").val('');
		jQuery(".emojionearea-editor").text('');
		jQuery(".messageChat").focus();
		jQuery(".emojionearea-editor").focus();
		jQuery('.emojionearea-button').removeClass('active');
		jQuery('.emojionearea-search-position-top').addClass('hidden');
		var div =jQuery("<div class='message' style='margin-bottom:20px'>")
		.append(jQuery("<div class='text-main'>").append(jQuery("<span class='time-ago'><?php date_default_timezone_set(get_option('timezone_string')); echo date('h:i A') ;?></span>").append(jQuery("<div class='text-group'>")
		.append(jQuery("<div class='text'>").append("<p>"+chat_message+"</p>")))));
		// jQuery("#chat-text-message" ).append(div);
		jQuery("#message_show" ).append(div);
		jQuery('#out')[0].scrollTop =jQuery('#out')[0].scrollHeight;

	   });
	  }
	}

});
}



// message reload
"use strict";
function get_messagef(){
jQuery('#out')[0].scrollTop =jQuery('#out')[0].scrollHeight;
var ajaxurl = object.ajaxurl;
	data ={
		type: "get",
		action:'message',
		security :object.nonce,
	};
jQuery.post(ajaxurl,data, function(response) {
// alert(response);
 jQuery("#message_show").html(response);
});
return false;
}

// convert customer 
"use strict";
function customer(){
// var target = $('.msg');
	var customer = jQuery('#customer').val();
	var ajaxurl = object.ajaxurl;
	data ={
		type: "post",
		action:'convert_visitor',
		data:customer,
		security :object.nonce,
	};
	jQuery.post(ajaxurl,data, function(response) {
	// alert(response);
	});
}

// lead 
"use strict";
function lead(){
	var customer = jQuery('#lead').val();
	var ajaxurl = object.ajaxurl;
		data ={
			type: "post",
			action:'convert_visitor',
			data:customer,
			security :object.nonce,
		};
		jQuery.post(ajaxurl,data, function(response) {
		// alert(response);
		});
}






// support
"use strict";
function bdtaskchat_support(){
var support_id = jQuery('#support_id').val();
var ajaxurl = object.ajaxurl;
	data ={
	type: "post",
	action:'support_visitors',
	support:support_id,
	security :object.nonce,
	};
jQuery.post(ajaxurl,data, function(response) {
 // alert(response);
});
				
	
}


// discussion
"use strict";
function bdtaskchatbot_discussion(){
var discussion = jQuery('#discussion').val();
var ajaxurl = object.ajaxurl;
	data ={
	type: "post",
	action:'discussion_visitor',
	data:discussion,
	security :object.nonce,
	};
jQuery.post(ajaxurl,data, function(response) {
//alert(response);
});
}



// solved
"use strict";
function bdtaskchat_solved(){

var solved = jQuery('#solved').val();
// alert(solved);
var ajaxurl = object.ajaxurl;
		data ={
		type: "post",
		action:'solved_visitor',
		data:solved,
		security :object.nonce,
		};
jQuery.post(ajaxurl,data, function(response) {
// console.log(response);
});

}



// chat history clear 
"use strict";
function clear_history(){
	var ajaxurl = object.ajaxurl;
	data ={
	type: "post",
	action:'clear_history',
	security :object.nonce,
	};
	jQuery.post(ajaxurl,data, function(response) {
	jQuery('#message_show').hide();
	});
}
// block visitor 
"use strict";
function block_visitor(){
	var ajaxurl = object.ajaxurl;
	data ={
	type: "post",
	action:'visitor_block',
	security :object.nonce,
	};
	jQuery.post(ajaxurl,data, function(response) {

		// alert(response);
	});
}
// delete vistior 
"use strict";
function delete_visitor(){
	var ajaxurl = object.ajaxurl;
	data ={
		type: "post",
		action:'visitor_delete',
		security :object.nonce,
		};
		jQuery.post(ajaxurl,data, function(response) {
		location.reload(true);
	});
}






// file upload 
jQuery(function($) {
"use strict";
	jQuery('body').on('change', '#file', function() {
       var ajaxurl = object.ajaxurl;
		var file_data = jQuery(this).prop('files')[0];
		var form_data = new FormData();
		form_data.append('file', file_data);
		form_data.append('action', 'upload_file');
		
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



	// update Notifications
	"use strict";
	function bdtaskchatbot_hover(){
		jQuery(".message-re").hover(function (event) {
			var ajaxurl = object.ajaxurl;
			data ={
			type: "post",
			action:'vis_not_0',
			security :object.nonce,
			};
			jQuery.post(ajaxurl,data, function(response) {

			// alert(response);
			
			});
		});
	}

"use strict";
function bdtaskchatbot_color(){
// color setting
jQuery('.change-bg-color label').on('click', function () {
var color = jQuery(this).data('color');
var ajaxurl = object.ajaxurl;
	data ={
	type: "post",
	action:'visitor_message_color',
	data:color,
	security :object.nonce,
	};
jQuery.post(ajaxurl,data, function(response) {
	jQuery('.message-content').each(function () {
	    jQuery(this).removeClass(function (index, css) {
	     return (css.match(/(^|\s)bg-\S+/g) || []).join(' ');
	    });
	  jQuery(this).addClass('bg-text-' + color);
	});
});
 return false;
});
}




				// change visitor typing status
				var timeout;
				jQuery(document).on('keypress', '.messageChat', function(){
				       var is_type = 'yes';
				    //   alert(is_type);
				      var ajaxurl = object.ajaxurl;
				        data ={
				            type: "post",
				            action:'live_chat_type_staus',
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
				            action:'live_chat_type_staus',
				            is_type:is_typeno,
				            security :object.nonce,
				      };
				    jQuery.post(ajaxurl,data, function(response) {
				        // alert(response);
				     });
				    },2000)
				 });				
	