<?php
if ( ! defined( 'WPINC' ) ) {
  die;// Exit if accessed directly.
}

global $wpdb;
if(isset($_GET['active_id'])):
    if(isset( $_POST['de_mapping_name_nonce'] ) && wp_verify_nonce($_POST['de_mapping_name_nonce'], 'de_mapping_action_nonce')){

        $active_id = intval( $_GET['active_id']  );
        $acton = BDTASKCHATBOT_Departmentsmappings::bdtaskchatbot_department_map_delete($active_id);
}else{?>
<div class = "row">
  <div class = "col-sm-12" style="display:block;">
<p><strong> <?php esc_html_e('Your nonce is not  verified ! .','bdtaskchatbot') ;?></strong></p>
  </div>
</div>
<?php     
}
 endif;  
 $id=sanitize_text_field($_GET['id']);
 $bdtaskchatboard_department_mapping      = $wpdb->prefix .'bdtaskchatboard_department_mapping';
 $sqld ="SELECT * FROM   $bdtaskchatboard_department_mapping  WHERE id=$id ";
$update= $wpdb->get_row( $sqld  , OBJECT ) ;

?>

<div class="bd-content bd-content-dashboard-two">
    <section class="content-header">
        <div class="p-l-30 p-r-30">
            <div class="header-icon"><i class="ti-face-smile"></i></div>
            <div class="header-title">
                <h2><?php echo esc_html('Departments','bdtaskchatbot');?></h2>
                <div class="small-text"><?php echo esc_html('Department Mapping','bdtaskchatbot');?></div>
            </div>
        </div>
    </section>
    <div class="bd-content-body">
 

 <?php 
    if(isset($_POST['update_department_mapping'])):
     if(isset( $_POST['up_mapping_name_nonce'] ) && wp_verify_nonce($_POST['up_mapping_name_nonce'], 'up_mapping_action_nonce')){
       global $departmentmap ; 
       $departmentmap = BDTASKCHATBOT_Departmentsmappings::bdtaskchatbot_process_department_map_update_data();
        if( isset($departmentmap['action_status']) ):
        ?>
         <div class = "row">
          <?php if($departmentmap['action_status'] == 'no_error_data_update_successfully'): ?>
          <div class = "col-sm-12" style="display:block;">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo esc_html('Department mapping update successfully!','bdtaskchatbot');?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
          <?php elseif($departmentmap['action_status'] == 'something_is_error') : ?>
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

    <?php }endif;?>

        <div class="col-sm-12">
            <div class="card" style="width:100%!important;max-width:100%!important;">
                <div class="card-header" style="float:right;">
                    <?php echo esc_html('Department Mapping Form','bdtaskchatbot');?>
                </div>
                <div class="card-body">
                    <form action="" class="form-inner" id="department_mapping" method="post" accept-charset="utf-8">
                     <?php wp_nonce_field("up_mapping_action_nonce","up_mapping_name_nonce");?>
                        <input type="hidden" name="id" value="<?php echo  $update->id;?>">
                        <div class="form-group row">
                            <label for="department_id" class="col-sm-2 col-form-label"><?php echo esc_html('Department Name','bdtaskchatbot');?> <i class="text-danger">*</i></label>
                            <div class="col-sm-10">
                               <?php 
                                   $table_department= $wpdb->prefix .'bdtaskchatboard_department';
                                 $department_names = $wpdb->get_results("SELECT * FROM  $table_department  ORDER BY department_id ASC");
                                   
                               ?>
                                <select name="department_id" class="form-control">
                                    <option value="" ><?php echo esc_html('Select Option','bdtaskchatbot');?></option>
                                 <?php
                             
                                 foreach ($department_names as $department_name) {
                                 ?>
                               <option value="<?php echo  $department_name->department_id;?>" <?php if($department_name->department_id== $update->department_id){ echo 'selected';} ?> > <?php echo  esc_html($department_name->department_name);?></option>
                                 <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_id" class="col-sm-2 col-form-label"><?php echo esc_html('User Name','bdtaskchatbot');?> <i class="text-danger">*</i></label>
                            <div class="col-sm-10">
                                 <?php
                                 $usernames = $wpdb->get_results("SELECT user_nicename, user_url, user_email,ID  FROM $wpdb->users ORDER BY ID ASC");
                                 ?>
                                <select name="user_id" class="form-control">
                                    <option value="" ><?php echo esc_html('Select Option','bdtaskchatbot');?></option>
                                    <?php foreach ($usernames as $username) {?>
                                    <option value="<?php echo $username->ID ;?>"  <?php if(($username->ID ==  $update->user_id)){ echo 'selected'; } ?>><?php echo esc_html($username->user_nicename);?></option>
                                    <?php }?>
                                  
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8"></div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-danger w-md m-b-5"><?php echo esc_html('Reset','bdtaskchatbot');?></button>
                                <button type="submit" class="btn btn-success w-md m-b-5"  name="update_department_mapping"><?php echo esc_html('Update','bdtaskchatbot');?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!--  table area -->
        <div class="col-sm-12">
            <div class="card" style="width:100%!important;max-width:100%!important;">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table display table-bordered table-striped table-hover base-style" id="example">
                            <thead>
                                <tr>
                                    <th><?php echo esc_html('SL','bdtaskchatbot');?></th>
                                    <th><?php echo esc_html('User Name','bdtaskchatbot');?></th>
                                    <th><?php echo esc_html('Department Name','bdtaskchatbot');?></th>
                                    <th  style="text-align: center;"><?php echo esc_html('Action','bdtaskchatbot');?></th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                        if(method_exists('BDTASKCHATBOT_Departmentsmappings','bdtaskchatbot_process_department_map_select_data')) :
                        global $wpdb ;
                        $department_map_query = BDTASKCHATBOT_Departmentsmappings::bdtaskchatbot_process_department_map_select_data();    
                        $department_map_list = $wpdb->get_results( $department_map_query['query']['select_all'], OBJECT ) ;
                        endif ;
                                $s=0;
                                 foreach ($department_map_list as $value) {
                                 ?>
                                <tr>
                                    <td><?php echo ++$s;?></td>
                                    <td><?php echo esc_html($value->user_nicename);?></td>
                                    <td><?php echo esc_html($value->department_name);?></td>
                                    <td class="center" style="text-align: center;"> 
                                     
                                    <a href="<?php echo wp_nonce_url(admin_url('admin.php?page=bdtaskchatbot_update_mapping&id='.$value->id),'bdtaskcrm_action_qtns', 'bdtaskcrm_qtns_nonce'); ?>" class="mr-1" title="Edit Department"><i class="fa fa-1x fa-edit text-info"></i></a>
                                  <a onclick="return confirm('Are you sure?')" href="<?php echo wp_nonce_url(admin_url('admin.php?page=bdtaskchatbot_department_mapping&active_id='.$value->id),'de_mapping_action_nonce','de_mapping_name_nonce')?>" title="Delete"><i class="fa fa-1x fa-trash text-danger"></i></a> 
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

<script type="text/javascript">
   (function($) { 
  "use strict"; 
    jQuery().ready(function() {
    jQuery("#department_mapping").validate({
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

            user_id:{
              required: true,
            },
        },
              
        });
    });
 })(jQuery);
</script>



            
