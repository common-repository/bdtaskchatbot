<?php 
if ( ! defined( 'WPINC' ) ) {
  die;// Exit if accessed directly.
} 
  global $wpdb; 
?>
<div class="bd-content bd-content-dashboard-two">
	<section class="content-header">
		<div class="p-l-30 p-r-30">
			<div class="header-icon"><i class="ti-face-smile"></i></div>
			<div class="header-title">
				<h2><?php echo esc_html('Chatboard','bdtaskchatbot');?></h2>
				<div class="small-text"><?php echo esc_html('Agents','bdtaskchatbot');?></div>
			</div>
		</div>
	</section>
	<div class="bd-content-body">



    <?php 
    if(isset($_POST['add_department'])):
    if(isset( $_POST['department_name_nonce'] ) && wp_verify_nonce($_POST['department_name_nonce'], 'create_department_action_nonce')){
	   global $department ; 
	   $department = BDTASKCHATBOT_Departments::bdtaskchatbot_process_department_data(); 
	   if( isset($department['action_status']) ):?>
       <div class = "row">
         <div class = "col-sm-12" style="display:block;">
	      <?php if($department['action_status'] == 'no_error_data_save_successfully'): ?> 
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?php echo esc_html('Department name saved successfully!','bdtaskchatbot');?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
          <?php elseif($department['action_status'] == 'something_is_error') : ?>
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
   endif;}else{?>
  <div class = "row">
  <div class = "col-sm-12" style="display:block;">
   	 <p><strong> <?php esc_html_e('Your nonce is not  verified ! .','bdtaskchatbot') ;?></strong></p>
   	</div>
  </div>
   <?php }
endif;


 if(isset($_POST['update_department'])):
    if(isset( $_POST['up_department_name_nonce'] ) && wp_verify_nonce($_POST['up_department_name_nonce'], 'up_department_action_nonce')){
	   $department = BDTASKCHATBOT_Departments::bdtaskchatbot_process_department_update_data(); 
	   if( isset($department['action_status']) ):?>
       <div class = "row">
         <div class = "col-sm-12" style="display:block;">
	      <?php if($department['action_status'] == 'no_error_data_update_successfully'): ?> 
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?php echo esc_html('Department name successfully updated!','bdtaskchatbot');?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
          <?php elseif($department['action_status'] == 'something_is_error') : ?>
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
if(isset($_POST['delete_department'])):
   if(isset( $_POST['d_department_name_nonce'] ) && wp_verify_nonce($_POST['d_department_name_nonce'], 'd_department_action_nonce')){
	   $department = BDTASKCHATBOT_Departments::bdtaskchatbot_process_department_delete_data(); 
	   if( isset($department['action_status']) ):?>
       <div class = "row">
         <div class = "col-sm-12 col-md-12" style="display:block;">
	      <?php if($department['action_status'] == 'delete_successfully'): ?> 
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?php echo esc_html('Successfully deleted!','bdtaskchatbot');?>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
          <?php elseif($department['action_status'] == 'something_is_error') : ?>
          		<div class="alert alert-danger  alert-dismissible fade show" role="alert">
					<?php echo esc_html('Something is error','bdtaskchatbot');?>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
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


		<!-- main content body -->
	<div class="row">
		<div class="col-sm-12">
			<div class="card" style="width:100%!important;max-width:100%!important;">
				<div class="card-header">
					<div class="row">

					</div>
				</div>
				<div class="card-body">
					
					<div class="row">
						<div class="col-lg-6 col-sm-12">
							<form action="" class="form-inner" method="post" id="bookingform" accept-charset="utf-8">
						<?php wp_nonce_field("create_department_action_nonce","department_name_nonce");?>
								<div class="row">
									<div class="col-lg-10 col-sm-12">
										<input name="department_name" type="text" class="form-control" id="department_name" placeholder="Agents/Department Name">
									</div>
									<div class="col-lg-2 col-sm-12">
										<button type="submit" class="btn btn-success" name="add_department"><?php echo esc_html('Create','bdtaskchatbot');?></button>
									</div>
								</div>
							</form>                  </div>
							<div class="col-lg-6 col-sm-12">
								<div class="table-responsive">
									<table class="table display table-bordered table-striped table-hover base-style" id="examples">
										<thead style="display: none;">
											<tr>
												<th><?php echo esc_html('Name','bdtaskchatbot');?></th>
												<th><?php echo esc_html('Position','bdtaskchatbot');?></th>
												<th><?php echo esc_html('Office','bdtaskchatbot');?></th>
												
											</tr>
										</thead>
										<tbody>
											<?php
											$table_department      = $wpdb->prefix .'bdtaskchatboard_department';
											$department_names = $wpdb->get_results("SELECT * FROM  $table_department  ORDER BY department_id ASC");
											$s=0;
											foreach ($department_names as $department_name) {
											?>
											<tr>
												
												<td><?php echo ++$s;?></td>
												<td><?php echo esc_html($department_name->department_name);?></td>
												<td>
													<a class="mr-1" title="Edit Department" data-toggle='modal' data-target='#myModal<?php echo $department_name->department_id ; ?>'><i class="fa fa-1x fa-edit text-info"></i></a>
													<?php  bdtaskchatbot_edit_lead_form($department_name);?>
													<a   title="Delete" data-toggle='modal' data-target='#delete<?php echo $department_name->department_id ; ?>'><i class="fa fa-1x fa-trash text-danger"></i></a></td>
													
													<?php bdtaskchatbot_delete_department_form($department_name);?>
												</tr>
												<?php }?>
												
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
<?php function bdtaskchatbot_edit_lead_form($department_name){?>
<div class="modal fade" id="myModal<?php echo $department_name->department_id ; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo esc_html('Edit Department/Agents','bdtaskchatbot');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="" class="form-inner"  id='bookingform' method="post" accept-charset="utf-8">
     <?php wp_nonce_field("up_department_action_nonce","up_department_name_nonce");?>
      	 <input type="hidden" name="department_id" value="<?php echo $department_name->department_id ; ?>">
      <div class="modal-body">
         <div class="row">
            <!-- edit form column -->
            <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo esc_html('Agent name/Departments','bdtaskchatbot');?></label>
                    <div class="col-sm-9">
                    
                        <input type="text" class="form-control" name="department_name" id="department_name" placeholder="Edit Department/Agents" value="<?php echo $department_name->department_name;?>">
                    </div>
                </div>

            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal"><?php echo esc_html('Close','bdtaskchatbot');?></button>
        <button type="submit" class="btn btn-success" name="update_department"><?php echo esc_html('Update','bdtaskchatbot');?></button>
      </div>
      </form>    </div>
  </div>
</div>

<?php }?>

<?php function bdtaskchatbot_delete_department_form($department_name){?>
<div class="modal fade" id="delete<?php echo $department_name->department_id ; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo esc_html('Delete Department/Agents','bdtaskchatbot');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="" class="form-inner" method="post" accept-charset="utf-8">
      	 <?php wp_nonce_field("d_department_action_nonce","d_department_name_nonce");?>
      	 <input type="hidden" name="department_id" value="<?php echo $department_name->department_id ; ?>">
      <div class="modal-body">
         <div class="row">
            <!-- edit form column -->
            <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="form-group row">
                    <div class="col-sm-9">
                    
                        <?php echo esc_html('Are you Sure you want to delete?','bdtaskcrm');?>
                    </div>
                </div>

            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal"><?php echo esc_html('Close','bdtaskchatbot');?></button>
        <button type="submit" class="btn btn-danger" name="delete_department"><?php echo esc_html('Delete','bdtaskchatbot');?></button>
      </div>
      </form>    </div>
  </div>
</div>
<?php }?>


<script type="text/javascript">
jQuery.noConflict();
jQuery(function($){
jQuery(document).ready(function() {
	'use strict';
    jQuery('#examples').DataTable( {
        "paging":  true,
        "ordering": true,
        "info":     false,
        "lengthChange": false,
         "searching": false
    } );
} );
});

 (function($) { 
  "use strict"; 
    jQuery().ready(function() {
    jQuery("#bookingform").validate({
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
      submitHandler: function(form) {
          jQuery(form).ajaxSubmit();
      },
        errorElement: 'span',
        errorClass: 'help-block', 
         rules: {

           department_name:{
              required: true,
            },
        },
              
        });
    });
 })(jQuery);
</script>