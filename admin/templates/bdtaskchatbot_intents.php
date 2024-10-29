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
				<div class="small-text"><?php echo esc_html('Intents','bdtaskchatbot');?></div>
			</div>
		</div>
	</section>
	<div class="bd-content-body">
		<!-- main content body -->
<?php 
if(isset($_GET['active_id'])):
        $active_id = intval( $_GET['active_id']  );
        global $delete_data;
         $delete_data= BDTASKCHATBOT_Intents::bdtaskchatbot_department_map_delete($active_id);
               if( $delete_data['action_status'] == 'no_error_data_delete_successfully'):?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo esc_html('Delete data successfully!','bdtaskchatbot');?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php 
        endif;
 endif;  

?>

		<div class="row">
			<div class="col-sm-12">
				<div class="card" style="width:100%!important;max-width:100%!important;">
					<div class="card-header">
						
			                 <div class="col-lg-10 col-sm-12">
			                      <label for="name" class="col-form-label pl-5"><i class="fa fa-1x fa-edit text-success"></i><?php echo esc_html('Intents','bdtaskchatbot');?></label>
			                 </div>
			                 <div class="col-lg-2 col-sm-12">
			                     <a href="<?php echo wp_nonce_url(admin_url('admin.php?page=bdtaskchatbot_create_intents'),'bdtaskchatbot_action_qtns', 'bdtaskchatbot_qtns_nonce'); ?>" class="btn btn-success text-white w-md m-b-5"><?php echo esc_html('Create Intent','bdtaskchatbot');?></a>
			                 </div>
			             
					</div>
					<div class="card-body">
						
								<table class="table table-bordered">
									<tbody>
										<?php
										$current_user_id = get_current_user_id();
										 $table_intents      = $wpdb->prefix .'bdtaskchatboard_intents';
										 $department_mapping = $wpdb->prefix .'bdtaskchatboard_department_mapping';

                                        $department_agn_list = $wpdb->get_results("SELECT * FROM  $department_mapping  WHERE department_id=$current_user_id");  
                                         $department_agn_id=$department_agn_list[0]->department_id;




                                        $department_intent_list =$wpdb->get_results("SELECT * FROM $table_intents WHERE department_id='$department_agn_id' ORDER BY (intent_type <> 0), (intent_type <> 2) , intent_id DESC"); 
                                      
                                         foreach ($department_intent_list as $value) {
										?>
										<tr>
											<td width="90%">
												<i class="fa fa-circle text-success"></i> &nbsp;<a href="<?php echo wp_nonce_url(admin_url('admin.php?page=bdtaskchatbot_update_intents&id='.$value->intent_id),'bdtaskchatbot_action_qtns', 'bdtaskchatbot_qtns_nonce'); ?>"><?php echo esc_html($value->intent_name);?></a>
											</td>
											<td>
												 <a onclick="return confirm('Are you sure?')" href="<?php echo wp_nonce_url(admin_url('admin.php?page=bdtaskchatbot_intents&active_id='.$value->intent_id),'bdtaskchatbot_action_d', 'bdtaskchatbot_qtnfs_nonce');?>" title="Delete"><i class="fa fa-trash text-warning"></i></a> 
											</td>
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