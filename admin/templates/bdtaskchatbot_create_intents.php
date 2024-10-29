<?php 
if ( ! defined( 'WPINC' ) ) {
  die;// Exit if accessed directly.
}
global $wpdb;

  if(isset($_POST['add_intents'])):
   if(isset( $_POST['indentss_name_nonce'] ) && wp_verify_nonce($_POST['indentss_name_nonce'], 'create_indentss_action_nonce')){

	   global $intents ; 
	   $intents = BDTASKCHATBOT_Intents::bdtaskchatbot_process_intent_data(); 
       if( isset($intents['action_status']) ):

	   	?>
       <div class = "row">
         <div class = "col-sm-12" style="display:block;">
         	
	      <?php if($intents['action_status'] == 'no_error_data_save_successfully'): ?> 
	      	
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?php echo esc_html('Intent save successfully','bdtaskchatbot');?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>

          <?php elseif($intents['action_status'] == 'something_is_error') : ?>
          		<div class="alert alert-danger  alert-dismissible fade show" role="alert">
					<?php echo esc_html('Something is error','bdtaskchatbot');?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>

	      <?php endif ;?>
          </div>
       </div>
      <?php 
   endif;
}else{?>
<div class = "row">
  <div class = "col-sm-12" style="display:block;">
<p><strong> <?php esc_html_e('Your nonce is not  verified ! .','bdtaskchatbot') ;?></strong></p>
  </div>
 </div>

<?php 	
}
endif;
?>


<div class="bd-content-body">
	<!-- alert message -->
	<!-- main content body -->
	<form action="" class="form-inner" method="post" id="create_intents" accept-charset="utf-8">
	   <?php wp_nonce_field("create_indentss_action_nonce","indentss_name_nonce");?>
		<div class="row">
			<div class="col-sm-12">
				<div class="card" style="width:100%!important;max-width:100%!important;">
					<div class="card-header">
						<div class="col-lg-8 col-sm-12">
							<div class="form-group row">
								<label for="user_type" class="col-sm-3 col-form-label" style="text-align:left;"><?php echo esc_html('Agent name','bdtaskchatbot');?></label>
								<div class="col-sm-9">
									<select name="department_id" class="form-control" tabindex="1"> 
								<option value=""><?php echo esc_html('Select Option','bdtaskchatbot');?></option>
								<?php
                                  $table_department      = $wpdb->prefix .'bdtaskchatboard_department';
                                  $department_names = $wpdb->get_results("SELECT * FROM  $table_department  ORDER BY department_id ASC");
                                 foreach ($department_names as $department_name) {
                                 ?>
									<option value="<?php echo  $department_name->department_id;?>"><?php echo esc_html($department_name->department_name,'bdtaskchatbot');?></option>

                                  <?php }?>

									</select>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card" style="width:100%!important;max-width:100%!important;">
					<div class="row">
						<div class="col-lg-6 col-sm-12">
							<div class="form-group">
								<input name="intent_name" type="text" class="form-control" id="intent_name" placeholder="Intent name" tabindex="2">
							</div>
						</div>
						<div class="col-lg-4 col-sm-12">
							<div class="form-group">
								<div class="radio radio-success radio-inline pt-2">
									<input type="radio" id="regular" value="1" name="status" checked="" tabindex="3">
									<label for="regular"><?php echo esc_html('Regular','bdtaskchatbot');?> </label>&nbsp;&nbsp;
									<input type="radio" id="welcome" value="2" name="status" tabindex="4">
									<label for="welcome"><?php echo esc_html('Welcome','bdtaskchatbot');?> </label>&nbsp;&nbsp;
									<input type="radio" id="fallback" value="0" name="status" tabindex="5">
									<label for="fallback"><?php echo esc_html('Fallback','bdtaskchatbot');?> </label>
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-sm-12">
							<div class="form-group">
								<button type="submit" class="btn btn-success w-md m-b-5" name="add_intents"><?php echo esc_html('Save','bdtaskchatbot');?></button>
							</div>
						</div>
					</div>

					<div class="card-body">
						<div class="row justify-content-center">
							<div class="col-lg-8 col-sm-12">
<div id="accordion" role="tablist">
	<div class="card" id="fallback_false" style="width: 100%!important;max-width:100%!important">
		<div class="card-header" id="headingThree">
			<h5 class="card-header__title mb-0" style="width: 100%!important;max-width:100%!important">
			<a class="collapsed text-success" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			<?php echo esc_html('Training Phrase','bdtaskchatbot');?>                                 </a>
			</h5>
		</div>
		
		<div id="collapseThree" class="collapse show" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
			<div class="card-body">
				<table width="100%" id="Training">
					<tbody id="training">
						<tr>
							<td>
								<input type="text" name="train_phrase[]" id="tp_1" class="form-control" placeholder="Add user expression" tabindex="6">
							</td>
							<td>
								<button style="text-align: right;" class="btn btn-danger" type="button" value="" onclick="deleteTrRow(this)"><i class="fa fa-trash"></i></button>
								<a class="btn btn-info add_point" id="add_more" onclick="addTrainPhras('training');" tabindex="7"><i class="fa fa-plus"></i></a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
</div>


                   <div class="card"  id="show_acc" style="width: 100%!important;max-width:100%!important">
                    <div class="card-header" id="headingRes">
                        <h5 class="card-header__title mb-0" style="width: 100%!important;max-width:100%!important">
                            <a class="collapsed text-success" data-toggle="collapse" data-target="#collapseResponse" aria-expanded="false" aria-controls="collapseResponse">
                                <?php echo esc_html('Responses Phrase','bdtaskchatbot');?> </a>
                        </h5>
                      </div>
                    <div id="collapseResponse" class="collapse show" role="tabpanel" aria-labelledby="headingRes" data-parent="#accordion">
                          <div class="card-body">
                             <table width="100%" id="Responses">
                                <tbody id="responses">
                                    <tr>
                                        <td>
                                             <input type="text" name="response_name[]" id="response_1" class="form-control" placeholder="Enter a text response" tabindex="8"> 
                                        </td>
                                        <td>
                                            <button style="text-align: right;" class="btn btn-danger" type="button" value="" onclick="deleteResRow(this)"><i class="fa fa-trash"></i></button>
                                            <a class="btn btn-info add_point" id="add_more" onclick="addResPhras('responses');" tabindex="10"><i class="fa fa-plus"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                              </table>
                          </div>
                      </div>
                  </div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
</div>






<script type="text/javascript">


  // add training phrase
   "use strict";
  function addTrainPhras(divName){
      var row =jQuery("#Training").length;
      var count = row + 1;
      var limits = 100;
      if (count == limits) alert("You have reached the limit of adding " + count + " inputs");
      else {
            var newdiv = document.createElement('tr');
            var tabindex = count * 2;

            newdiv = document.createElement("tr");
            newdiv.innerHTML ="<td><input type=\"text\" name=\"train_phrase[]\" id=\"tp_"+count+"\" class=\"form-control\" placeholder=\"Add user expression\" /></td><td><button style=\"text-align: right;\" class=\"btn btn-danger\" type=\"button\" onclick=\"deleteTrRow(this)\"><i class=\"fa fa-trash\"></i></button> <a class=\"btn btn-info add_point\" id=\"add_more\" onClick=\"addTrainPhras('training');\" tabindex=\"7\"><i class=\"fa fa-plus\"></i></a></td>";
            document.getElementById(divName).appendChild(newdiv);
            count++;

        }
    }
      "use strict";
    function deleteTrRow(e) {
        var t =jQuery("#Training > tbody > tr").length;
        if (1 == t) alert("There only one row you can't delete.");
        else {
            var a = e.parentNode.parentNode;
            a.parentNode.removeChild(a)
        }
    }

    // add Responses expression
       "use strict";
    function addResPhras(divName){
      var row = jQuery("#Responses").length;
      var count = row + 1;
      var limits = 100;
      if (count == limits) alert("You have reached the limit of adding " + count + " inputs");
      else {
            var newdiv = document.createElement('tr');
            var tabindex = count * 2;

            newdiv = document.createElement("tr");
            newdiv.innerHTML ="<td><input type=\"text\" name=\"response_name[]\" id=\"response_"+count+"\" class=\"form-control\" placeholder=\"Enter a text response\" /></td><td><button style=\"text-align: right;\" class=\"btn btn-danger\" type=\"button\" onclick=\"deleteResRow(this)\"><i class=\"fa fa-trash\"></i></button> <a class=\"btn btn-info add_point\" id=\"add_more\" onClick=\"addResPhras('responses');\" tabindex=\"10\"><i class=\"fa fa-plus\"></i></a></td>";
            document.getElementById(divName).appendChild(newdiv);
            count++;
        }
    }
     "use strict";
    function deleteResRow(e) {
        var t = jQuery("#Responses > tbody > tr").length;
        if (1 == t) alert("There only one row you can't delete.");
        else {
            var a = e.parentNode.parentNode;
            a.parentNode.removeChild(a)
        }
    }
    
    jQuery('#fallback').click(function(){
    	   "use strict";
        jQuery('#fallback_false').hide();
    })    
	jQuery(document).ready(function(){
	     "use strict";
	  jQuery("#regular,#welcome").click(function(){
	     jQuery('#fallback_false').show();
	  });
	});


 (function($) { 
  "use strict"; 
    jQuery().ready(function() {
    jQuery("#create_intents").validate({
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
      submitHandler: function(form) {
          jQuery(form).ajaxSubmit();
      },
        errorElement: 'span',
        errorClass: 'help-block', 
         rules: {

           department_id:{
              required: true,
            }, 

            intent_name:{
              required: true,
            },
        },
              
        });
    });
 })(jQuery);
</script> 



