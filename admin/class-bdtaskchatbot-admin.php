<?php
/**
* The admin-specific functionality of the plugin.
*
* @link       www.bdtask.com
* @since      1.0.0
*
* @package    Bdtaskchatbot
* @subpackage Bdtaskchatbot/admin
*/
/**
* The admin-specific functionality of the plugin.
*
* Defines the plugin name, version, and two examples hooks for how to
* enqueue the admin-specific stylesheet and JavaScript.
*
* @package    Bdtaskchatbot
* @subpackage Bdtaskchatbot/admin
* @author     bdtask <bdtask@gmail.com>
*/
class Bdtaskchatbot_Admin {
	/**
	* The ID of this plugin.
	*
	* @since    1.0.0
	* @access   private
	* @var      string    $plugin_name    The ID of this plugin.
	*/
	private $plugin_name;
	/**
	* The version of this plugin.
	*
	* @since    1.0.0
	* @access   private
	* @var      string    $version    The current version of this plugin.
	*/
	private $version;
	/**
	* Initialize the class and set its properties.
	*
	* @since    1.0.0
	* @param      string    $plugin_name       The name of this plugin.
	* @param      string    $version    The version of this plugin.
	*/
	public function __construct( $plugin_name, $version ) {
			$this->plugin_name = $plugin_name;
			$this->version = $version;
			add_action('init',array($this,'bdtaskchatconversion_loc'));
			 add_action('init',array($this,'bdtaskcrm_quotations_order_ajax'));
			add_action( 'admin_menu',array($this,'bdtaskcrm_page_creater')  ) ;
			add_action( 'admin_init',array($this,'bdtaskchatbot_dependence_loader')  ) ;
			add_action( 'wp_ajax_notifications',array($this,'bdtaskchatbot_notifications_ajax'));
			add_action( 'wp_ajax_nopriv_notifications',array($this,'bdtaskchatbot_notifications_ajax'));
			add_action( 'wp_ajax_chat_conversiton',array($this,'bdtaskchatbot_chat_conversiton_ajax'));
			add_action( 'wp_ajax_nopriv_chat_conversiton',array($this,'bdtaskchatbot_chat_conversiton_ajax'));
			add_action( 'wp_ajax_admin_message',array($this,'bdtaskadmin_message'));
			add_action( 'wp_ajax_nopriv_admin_message',array($this,'bdtaskadmin_message'));
			add_action( 'wp_ajax_message',array($this,'bdtaskmessage'));
			add_action( 'wp_ajax_nopriv_message',array($this,'bdtaskmessage'));
			add_action( 'wp_ajax_RecentChatlist',array($this,'bdtaskchatbot_RecentChatlist'));
			add_action( 'wp_ajax_nopriv_RecentChatlist',array($this,'bdtaskchatbot_RecentChatlist'));
			add_action( 'wp_ajax_onlinevisitor',array($this,'bdtaskchatbot_onlinevisitor'));
			add_action( 'wp_ajax_nopriv_onlinevisitor',array($this,'bdtaskchatbot_onlinevisitor'));
			add_action( 'wp_ajax_visitors_contact',array($this,'bdtaskchatbot_visitors_contact'));
			add_action( 'wp_ajax_nopriv_visitors_contact',array($this,'bdtaskchatbot_visitors_contact'));
			add_action( 'wp_ajax_nofity_counter',array($this,'bdtaskchatbot_nofity_counter'));
			add_action( 'wp_ajax_nopriv_nofity_counter',array($this,'bdtaskchatbot_nofity_counter'));
			add_action( 'wp_ajax_admin_enter_message',array($this,'bdtaskchatbot_admin_enter_message'));
			add_action('wp_ajax_nopriv_admin_enter_message',array($this,'bdtaskchatbot_admin_enter_message'));
			add_action( 'wp_ajax_visitor_message_color',array($this,'bdtaskchatbot_visitor_message_color'));
			add_action( 'wp_ajax_nopriv_visitor_message_color',array($this,'bdtaskchatbot_visitor_message_color'));
			add_action( 'wp_ajax_contact_list_search',array($this,'bdtaskchatbot_contact_list_search'));
			add_action( 'wp_ajax_nopriv_contact_list_search',array($this,'bdtaskchatbot_contact_list_search'));
			add_action( 'wp_ajax_upload_file',array($this,'bdtaskchatbot_upload_file'));
			add_action( 'wp_ajax_nopriv_upload_file',array($this,'bdtaskchatbot_upload_file'));
			add_action( 'wp_ajax_vis_not_0',array($this,'bdtaskchatbot_vis_not_0'));
			add_action( 'wp_ajax_nopriv_vis_not_0',array($this,'bdtaskchatbot_vis_not_0'));
			add_action( 'wp_ajax_clear_history',array($this,'bdtaskchatbot_clear_history'));
			add_action( 'wp_ajax_nopriv_clear_history',array($this,'bdtaskchatbot_clear_history'));
			add_action( 'wp_ajax_visitor_block',array($this,'bdtaskchatbot_visitor_block'));
			add_action( 'wp_ajax_nopriv_visitor_block',array($this,'bdtaskchatbot_visitor_block'));
			add_action( 'wp_ajax_visitor_delete',array($this,'bdtaskchatbot_visitor_delete'));
			add_action( 'wp_ajax_nopriv_visitor_delete',array($this,'bdtaskchatbot_visitor_delete'));
			add_action( 'wp_ajax_convert_visitor',array($this,'bdtaskchatbot_convert_visitor'));
			add_action( 'wp_ajax_nopriv_convert_visitor',array($this,'bdtaskchatbot_convert_visitor'));
			add_action( 'wp_ajax_support_visitors',array($this,'bdtaskchatbot_support_visitors'));
			add_action( 'wp_ajax_nopriv_support_visitors',array($this,'bdtaskchatbot_support_visitors'));
			add_action( 'wp_ajax_discussion_visitor',array($this,'bdtaskchatbot_discussion_visitor'));
			add_action( 'wp_ajax_nopriv_discussion_visitor',array($this,'bdtaskchatbot_discussion_visitor'));
			add_action( 'wp_ajax_solved_visitor',array($this,'bdtaskchatbot_solved_visitor'));
			add_action( 'wp_ajax_nopriv_solved_visitor',array($this,'bdtaskchatbot_solved_visitor'));
			add_action( 'wp_ajax_all_info',array($this,'bdtaskchatbot_all_info'));
			add_action( 'wp_ajax_nopriv_all_info',array($this,'bdtaskchatbot_all_info'));			
			
			add_action( 'wp_ajax_live_chat_type_staus',array($this,'bdtaskchatbot_live_chat_type_staus'));
			add_action( 'wp_ajax_nopriv_live_chat_type_staus',array($this,'bdtaskchatbot_live_chat_type_staus'));
			add_action( 'init',array($this,'bdtaskchatbot_logout'));
			add_action( 'init',array($this,'bdtaskchatbot_login'));
}
	/**
	* Register the stylesheets for the admin area.
	*
	* @since    1.0.0
	*/
	
public function bdtaskchatbot_logout(){
if (!function_exists("wplc_maa_agent_logout")) {
	add_action('wp_logout', 'wplc_maa_agent_logout');
	function wplc_maa_agent_logout(){
	    $current_user = wp_get_current_user();
	   $current_user_id= $current_user->ID; 
	    delete_user_meta($current_user_id, "bdtaskchatbot_onlive");
	}
}
}

public function bdtaskchatbot_login(){
if (!function_exists("bdtaskchatbot_maa_agent_login")) {
	if ( is_user_logged_in() ) {
	    $current_user = wp_get_current_user();
	   $current_user_id= $current_user->ID; 
	   add_user_meta( $current_user_id,'bdtaskchatbot_onlive','1',true);
	}

}
}	
	
public function enqueue_styles() {
		/**
		* This function is provided for demonstration purposes only.
		*
		* An instance of this class should be passed to the run() function
		* defined in Bdtaskchatbot_Loader as all of the hooks are defined
		* in that particular class.
		*
		* The Bdtaskchatbot_Loader will then create the relationship
		* between the defined hooks and the functions defined in this
		* class.
		*/
global $pagenow, $current_screen;
 $page = (isset($_REQUEST['page'])) ? sanitize_text_field( $_REQUEST['page']) : '' ;
 if(  is_admin() &&
   ( $page == 'bdtaskchatbot' ||
	    $page == 'bdtaskchatbot_chat' ||
	    $page == 'bdtaskchatbot_update_mapping' ||
	    $page == 'bdtaskchatbot_department' ||
	    $page == 'bdtaskchatbot_department_mapping' ||
	    $page == 'bdtaskchatbot_intents'||
	    $page == 'bdtaskchatbot_create_intents'||
	    $page == 'bdtaskchatbot_update_intents'||
	    $page == 'bdtaskchatbot_visitors_list'||
	    $page == 'bdtaskchatbot_lead'||
	    $page == 'bdtaskchatbot_customer'||
	    $page == 'bdtaskchatbot_setting'
	) ){


wp_enqueue_style('bootstrap-min-css',plugin_dir_url( __FILE__ ).'assets/plugins/bootstrap/css/bootstrap.min.css',array(), $this->version, 'all' );

wp_enqueue_style('themify-icons-css',
plugin_dir_url( __FILE__ ).'assets/plugins/themify-icons/themify-icons.css',
array(), $this->version, 'all' );
wp_enqueue_style( 'fontawesome',
plugin_dir_url( __FILE__ ).'assets/plugins/fontawesome/css/all.min.css',
array(), $this->version, 'all' );
wp_enqueue_style( 'dataTables-min-css',
plugin_dir_url( __FILE__ ).'assets/plugins/datatables/dataTables.min.css',array(), $this->version, 'all' );
wp_enqueue_style( 'dataTables-bootstrap4-min-css',
plugin_dir_url( __FILE__ ).'assets/plugins/datatables/dataTables.bootstrap4.min.css',array(), $this->version, 'all' );
wp_enqueue_style( 'responsive-datatable',
plugin_dir_url( __FILE__ ).'assets/plugins/datatables/dataTables.responsive.min.js',array(), $this->version, 'all' );
wp_enqueue_style( 'dataTables-responsive-min-js',
plugin_dir_url( __FILE__ ).'assets/plugins/datatables/responsive.bootstrap4.min.css',array(), $this->version, 'all' );
wp_enqueue_style( 'main-css',plugin_dir_url( __FILE__ ).'assets/dist/css/styleBD.min.css?v=0',
array(), $this->version, 'all' );
wp_enqueue_style( 'Material-Icons','//fonts.googleapis.com/icon?family=Material+Icons',array(), $this->version, 'all' );
wp_enqueue_style( 'emojionearea-min-css',plugin_dir_url( __FILE__ ).'assets/plugins/emojionearea/dist/emojionearea.min.css',array(), $this->version, 'all' );
wp_enqueue_style( 'messengers-css',plugin_dir_url( __FILE__ ).'assets/dist/css/messenger.css',array(), $this->version, 'all' );

wp_enqueue_style( 'materia_icons-css',plugin_dir_url( __FILE__ ).'assets/plugins/material_icons/materia_icons.css',array(), $this->version, 'all' );
wp_enqueue_style( 'typicons-css',plugin_dir_url( __FILE__ ).'assets/plugins/typicons/src/typicons.css',array(), $this->version, 'all' );
wp_enqueue_style( 'custom-css',plugin_dir_url( __FILE__ ).'assets/dist/css/custom.css',array(), $this->version, 'all' );
wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bdtaskchatbot-admin.css', array(), $this->version, 'all' );
}
	}
	/**
	* Register the JavaScript for the admin area.
	*
	* @since    1.0.0
	*/
	public function enqueue_scripts() {
		/**
		* This function is provided for demonstration purposes only.
		*
		* An instance of this class should be passed to the run() function
		* defined in Bdtaskchatbot_Loader as all of the hooks are defined
		* in that particular class.
		*
		* The Bdtaskchatbot_Loader will then create the relationship
		* between the defined hooks and the functions defined in this
		* class.
		*/
global $pagenow, $current_screen;
 $page = (isset($_REQUEST['page'])) ? sanitize_text_field( $_REQUEST['page']) : '' ;
 if(  is_admin() &&
   ( $page == 'bdtaskchatbot' ||
	    $page == 'bdtaskchatbot_chat' ||
	    $page == 'bdtaskchatbot_update_mapping' ||
	    $page == 'bdtaskchatbot_department' ||
	    $page == 'bdtaskchatbot_department_mapping' ||
	    $page == 'bdtaskchatbot_intents'||
	    $page == 'bdtaskchatbot_create_intents'||
	    $page == 'bdtaskchatbot_update_intents'||
	    $page == 'bdtaskchatbot_visitors_list'||
	    $page == 'bdtaskchatbot_lead'||
	    $page == 'bdtaskchatbot_customer'||
	    $page == 'bdtaskchatbot_setting'
) ){

wp_enqueue_script( 'popper-min-js',plugin_dir_url( __FILE__ ).'assets/dist/js/popper.min.js',array( 'jquery' ), $this->version,true  );
wp_enqueue_script( 'bootstrap-min-js',plugin_dir_url( __FILE__ ).'assets/plugins/bootstrap/js/bootstrap.min.js',array( 'jquery' ), $this->version,true  );


wp_enqueue_script( 'perfect-scrollbar-min-js',plugin_dir_url( __FILE__ ).'assets/dist/js/perfect-scrollbar.min.js',array( 'jquery' ), $this->version,true  );

wp_enqueue_script( 'moment-js',plugin_dir_url( __FILE__ ).'assets/plugins/moment/moment.js',array( 'jquery' ), $this->version,true  );

wp_enqueue_script( 'emojionearea-min-js',plugin_dir_url( __FILE__ ).'assets/plugins/emojionearea/dist/emojionearea.min.js',array( 'jquery' ), $this->version,true  );

wp_enqueue_script( 'dataTables-min-js',plugin_dir_url( __FILE__ ).'assets/plugins/datatables/dataTables.min.js',array( 'jquery' ), $this->version,true  );

wp_enqueue_script( 'dataTables-bootstrap4-min-js',plugin_dir_url( __FILE__ ).'assets/plugins/datatables/dataTables.bootstrap4.min.js',array( 'jquery' ), $this->version,true  );

wp_enqueue_script( 'dataTables-responsive-min-js',plugin_dir_url( __FILE__ ).'assets/plugins/datatables/dataTables.responsive.min.js',array( 'jquery' ), $this->version,true  );

wp_enqueue_script( 'responsive-bootstrap4-min-js',plugin_dir_url( __FILE__ ).'assets/plugins/datatables/responsive.bootstrap4.min.js',array( 'jquery' ), $this->version,true  );

wp_enqueue_script( 'dataTables-buttons-min-js',plugin_dir_url( __FILE__ ).'assets/plugins/datatables/dataTables.buttons.min.js',array( 'jquery' ), $this->version,true  );

wp_enqueue_script( 'buttons-bootstrap4-min-js',plugin_dir_url( __FILE__ ).'assets/plugins/datatables/buttons.bootstrap4.min.js',array( 'jquery' ), $this->version,true  );

wp_enqueue_script( 'zif-min-min-js',plugin_dir_url( __FILE__ ).'assets/plugins/datatables/jszip.min.js',array( 'jquery' ), $this->version,true  );

wp_enqueue_script( 'pdf-min-js',plugin_dir_url( __FILE__ ).'assets/plugins/datatables/pdfmake.min.js',array( 'jquery' ), $this->version,true  );

wp_enqueue_script( 'vfs_fonts-js',plugin_dir_url( __FILE__ ).'assets/plugins/datatables/vfs_fonts.js',array( 'jquery' ), $this->version,true  );

wp_enqueue_script( 'buttons-html5-min-js',plugin_dir_url( __FILE__ ).'assets/plugins/datatables/buttons.html5.min.js',array( 'jquery' ), $this->version,true  );

wp_enqueue_script( 'buttons-print-js',plugin_dir_url( __FILE__ ).'assets/plugins/datatables/buttons.print.min.js',array( 'jquery' ), $this->version,true  );

wp_enqueue_script( 'script-min-js',plugin_dir_url( __FILE__ ).'assets/dist/js/script.js',array( 'jquery' ), $this->version,true  );
// chart
wp_enqueue_script( 'Chart-min-js',plugin_dir_url( __FILE__ ).'assets/plugins/chartJs/Chart.min.js',array( 'jquery' ), $this->version,false  );

wp_enqueue_script( 'sparkline-min-js',plugin_dir_url( __FILE__ ).'assets/plugins/sparkline/sparkline.min.js',array( 'jquery' ), $this->version,false  );

wp_enqueue_script( 'home-demo',plugin_dir_url( __FILE__ ).'assets/dist/js/pages/home-demo.js',array( 'jquery' ), $this->version,false );

wp_enqueue_script( 'jQuery-validate',plugin_dir_url( __FILE__ ).'assets/dist/js/jquery.validate.min.js',array( 'jquery' ), $this->version,true );
// end chart


wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bdtaskchatbot-admin.js', array( 'jquery' ), $this->version, false );
 }


 if(  is_admin() &&
   ($page == 'bdtaskchatbot_chat')){
  wp_enqueue_script( 'messenger-min-js',plugin_dir_url( __FILE__ ).'assets/dist/js/messenger.js',array( 'jquery' ), $this->version,false  );

 }




}
public function bdtaskchatbot_dependence_loader(){
require_once plugin_dir_path( __FILE__ ) . 'query/bdtaskchatbot-department.php';
require_once plugin_dir_path( __FILE__ ) . 'query/bdtaskchatbot_department_mapping.php';
require_once plugin_dir_path( __FILE__ ) . 'query/bdtaskchatbot-intends_query.php';
}
//==============Main Menu==================
public function bdtaskcrm_define_page(){
		
$parents = array(
	array(
	'page_title'  => 'live_chat',              //$parent_slug
			'menu_title'  => 'Live Chat',          //$page_title
			'capability'  => 'manage_options',           //$capability
			'menu_slug'   => 'bdtaskchatbot',              //$menu_title
			'dashicons'   => 'dashicons-format-chat'    //$dashicons
	));
return $parents ;
}

//==========Submenu=======================
public function bdtaskcrm_define_subpage(){
$parents = array(
	array(
	'parent_slug' => 'bdtaskchatbot',    //$parent_slug
				'page_title'  => 'Dashboard',       //$page_title
				'menu_title'  => 'Dashboard',       //$menu_title
				'capability'  => 'manage_options', //$capability
				'menu_slug'   => 'bdtaskchatbot',
	),

	array(
	'parent_slug' => 'bdtaskchatbot',    //$parent_slug
				'page_title'  => 'Chat',       //$page_title
				'menu_title'  => 'Chat',       //$menu_title
				'capability'  => 'manage_options', //$capability
				'menu_slug'   => 'bdtaskchatbot_chat',
	),
	array(
	'parent_slug' => null,    //$parent_slug
				'page_title'  => 'Update Mapping',       //$page_title
				'menu_title'  => 'Update Mapping',       //$menu_title
				'capability'  => 'manage_options', //$capability
				'menu_slug'   => 'bdtaskchatbot_update_mapping',
				),
	array(
	'parent_slug' => 'bdtaskchatbot',    //$parent_slug
				'page_title'  => 'Agents/Departments',       //$page_title
				'menu_title'  => 'Agents/Departments ',       //$menu_title
				'capability'  => 'manage_options', //$capability
				'menu_slug'   => 'bdtaskchatbot_department',
	),
	array(
	'parent_slug' => 'bdtaskchatbot',    //$parent_slug
				'page_title'  => 'Department Mapping',       //$page_title
				'menu_title'  => 'Department Mapping ',       //$menu_title
				'capability'  => 'manage_options', //$capability
				'menu_slug'   => 'bdtaskchatbot_department_mapping',
	),
	  array(
	   'parent_slug' => 'bdtaskchatbot',    //$parent_slug
		     'page_title'  => 'Intents',       //$page_title
		     'menu_title'  => 'Intents',       //$menu_title
		     'capability'  => 'manage_options', //$capability
		     'menu_slug'   => 'bdtaskchatbot_intents', 
	    ), 
                           
	array(
	'parent_slug' => null,    //$parent_slug
				'page_title'  => 'Create Intents',       //$page_title
				'menu_title'  => 'Create Intents',       //$menu_title
				'capability'  => 'manage_options', //$capability
				'menu_slug'   => 'bdtaskchatbot_create_intents',
	),
	array(
	'parent_slug' => null,    //$parent_slug
				'page_title'  => 'Update Intents',       //$page_title
				'menu_title'  => 'Update Intents',       //$menu_title
				'capability'  => 'manage_options', //$capability
				'menu_slug'   => 'bdtaskchatbot_update_intents',
	),

	array(
	'parent_slug' => 'bdtaskchatbot',    //$parent_slug
				'page_title'  => 'Settings',       //$page_title
				'menu_title'  => 'Settings',       //$menu_title
				'capability'  => 'manage_options', //$capability
				'menu_slug'   => 'bdtaskchatbot_setting',
	),
	);
return $parents ;
}
public function bdtaskcrm_create_menu_page(){
$parents = $this->bdtaskcrm_define_page();
if ( $parents ) {
foreach ($parents as $parent) {
add_menu_page(   $parent['page_title'],
	$parent['menu_title'],
	$parent['capability'],
	$parent['menu_slug'],
	array( $this , $parent['menu_slug'].'_callback'),
	$parent['dashicons'] ) ;
 }
 }
}
public function bdtaskcrm_create_submenu_page(){
$parents = $this->bdtaskcrm_define_subpage();
if ( $parents ) {
foreach ($parents as $parent) {
add_submenu_page($parent['parent_slug'] ,
	$parent['page_title'],
	$parent['menu_title'],
	$parent['capability'],
	$parent['menu_slug'],
	array( $this , $parent['menu_slug'].'_callback' )) ;
}
}
}
public function bdtaskcrm_page_creater(){
	$this->bdtaskcrm_create_menu_page();
	$this->bdtaskcrm_create_submenu_page();
}
public function  bdtaskchatbot_setting_callback(){
       require_once plugin_dir_path( __FILE__ ) . '/templates/bdtaskchatbot_settings.php';
       $setting = (current_user_can('manage_options') && is_admin())?
                    bdtaskchatbot_shortcode_setting_form(): 
                    wp_die();
 }

public function  bdtaskchatbot_department_callback(){
require_once plugin_dir_path( __FILE__ ) . '/templates/bdtaskchatbot_create_department.php';
}
public function  bdtaskchatbot_department_mapping_callback(){
require_once plugin_dir_path( __FILE__ ) . '/templates/bdtaskchatbot_department_mapping.php';
}
public function  bdtaskchatbot_update_mapping_callback(){
require_once plugin_dir_path( __FILE__ ) . '/templates/bdtaskchatbot_update_mapping.php';
}
public function  bdtaskchatbot_intents_callback(){
require_once plugin_dir_path( __FILE__ ) . '/templates/bdtaskchatbot_intents.php';
}
public function  bdtaskchatbot_create_intents_callback(){
require_once plugin_dir_path( __FILE__ ) . '/templates/bdtaskchatbot_create_intents.php';
}
public function  bdtaskchatbot_update_intents_callback(){
require_once plugin_dir_path( __FILE__ ) . '/templates/bdtaskchatbot_update_intents.php';
}
public function  bdtaskchatbot_chat_callback(){
require_once plugin_dir_path( __FILE__ ) . '/templates/bdtaskchatbot_chat.php';
}

public function  bdtaskchatbot_callback(){
require_once plugin_dir_path( __FILE__ ) . '/templates/bdtaskchatbot_dashboard.php';
}



  public function bdtaskcrm_quotations_order_ajax(){
         wp_enqueue_script( 'bdtaskcrm_quotations_order_ajax', 
                        plugin_dir_url( __FILE__ ).'js/test.js?v=0', 
                        array( 'jquery' ), $this->version, true ); 
         wp_localize_script( 'bdtaskcrm_quotations_order_ajax', 
                        'object',
                         array(  'ajaxurl'  => admin_url( 'admin-ajax.php' ),
                                 'nonce'    => wp_create_nonce('randomnonce'),
                          )
                    );
    }

public function bdtaskchatconversion_loc(){

wp_enqueue_script('bdtaskchatconversion_loc',
	plugin_dir_url( __FILE__ ).'js/bdtask_admin.js',
	array( 'jquery' ), $this->version, true ); 
         wp_localize_script( 'bdtaskchatconversion_loc', 
                        'object',
                array(  'ajaxurl'  => admin_url( 'admin-ajax.php' ),
                        'nonce'    => wp_create_nonce('randomnonce'),
                    )
        );
  }

public function bdtaskchatbot_live_chat_type_staus(){
global $wpdb;
//=================== nonce Security verified checked======================= 
if(wp_verify_nonce($_POST['security'], 'randomnonce')){	
//=================== nonce Security verified checked=======================
$live_chat_emu=sanitize_text_field($_POST['is_type']);
$visitor_id=$_SESSION['CH_visitor_id'];
$department_id =$_SESSION['department_id'];
$user = wp_get_current_user();
$user_id=sanitize_text_field($user->ID);
$bdtaskchatboard_chatbox =$wpdb->prefix .'bdtaskchatboard_chatbox';
$sql="SELECT * FROM $bdtaskchatboard_chatbox WHERE visitor_id=$visitor_id and user_id=$user_id";
$asdfasdf= $wpdb->get_row($sql, OBJECT ) ;
if($asdfasdf){
  $live_emu = array(
  'agent_typing'=>sanitize_text_field($live_chat_emu),
   );  
  $dfasdf=$wpdb->update($bdtaskchatboard_chatbox,$live_emu,array('visitor_id' =>$visitor_id));  
  
}else{
   $live_emu = array(
   'chatbox_id' =>'',
   'visitor_id'=>intval($visitor_id),
   'user_id'=>intval($user_id),   
   'date_time'=>date('Y-m-d h:i:s'),   
   'department_id'=>sanitize_text_field($department_id),   
   'agent_typing'=>sanitize_text_field($live_chat_emu),
   );
  $dfasdf= $wpdb->insert($bdtaskchatboard_chatbox, $live_emu);
}

}else{
	echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
}
die();
}
public function bdtaskchatbot_convert_visitor(){
global $wpdb;
$visitorConvert=sanitize_text_field($_POST['data']);

//=================== nonce Security verified checked======================= 
if(wp_verify_nonce($_POST['security'], 'randomnonce')){	
//=================== nonce Security verified checked======================= 
$visitor_ids=$_SESSION['CH_visitor_id'];
$bdtaskchatboard_visitors=$wpdb->prefix.'bdtaskchatboard_visitors';
	$color_test = array(
	'isConvert'=>intval($visitorConvert)
);
$update_color = $wpdb->update($bdtaskchatboard_visitors,$color_test,array('visitor_id' =>$visitor_ids));

}else{
	echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
}
die();
}


// all info count info dashboard
public function bdtaskchatbot_all_info(){
global $wpdb;
//=================== nonce Security verified checked======================= 
  if(wp_verify_nonce($_POST['security'], 'randomnonce')){	
//=================== nonce Security verified checked======================= 
$bdtaskchatboard_visitors =$wpdb->prefix .'bdtaskchatboard_visitors';
$bdtaskchatboard_support =$wpdb->prefix .'bdtaskchatboard_support';
// online vistior
$online="SELECT count(*) as total_visitor FROM $bdtaskchatboard_visitors WHERE  isOnline=1";
$onlineVisitor= $wpdb->get_results($online, OBJECT ) ;
// total customer
$customer="SELECT count(*) as total_customer FROM $bdtaskchatboard_visitors WHERE  isConvert=1";
$total_customer= $wpdb->get_results($customer, OBJECT ) ;
// total lead
$lead="SELECT count(*) as total_lead FROM $bdtaskchatboard_visitors WHERE  isConvert=2";
$total_lead= $wpdb->get_results($lead, OBJECT ) ;
//Total Issues
$issues="SELECT count(*) as total_issues  FROM $bdtaskchatboard_support WHERE  status=1";
$total_issues= $wpdb->get_results($issues, OBJECT ) ;
//Total solve
$solved="SELECT count(*) as total_solved  FROM $bdtaskchatboard_support WHERE  status=0";
$total_solved= $wpdb->get_results($solved, OBJECT ) ;
$data=array(
'onlineVisitor'=>$onlineVisitor,
'customer'     =>$total_customer,
'lead'         =>$total_lead,
'issues'       =>$total_issues,
'solved'       =>$total_solved,
);
echo json_encode($data);

}else{
	echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
}


die();
}
// support visitor 
public function bdtaskchatbot_support_visitors(){
global $wpdb;
$support=sanitize_text_field($_POST['support']);

//=================== nonce Security verified checked======================= 
  if(wp_verify_nonce($_POST['security'], 'randomnonce')){	
//=================== nonce Security verified checked======================= 

$visitor_ids=sanitize_text_field($_SESSION['CH_visitor_id']);
$user = wp_get_current_user();
$user_id=sanitize_text_field($user->ID); // 0
$bdtaskchatboard_support=$wpdb->prefix.'bdtaskchatboard_support';
	$support_info = array(
		'id'        =>'',
		'visitor_id'=>intval($visitor_ids),
		'user_id'=>intval($user_id),
		'isSupport'=>intval($support),
		'date_time'=>date('Y-m-d h:i:s'),
		'status'=>'1',
	);
$wpdb->insert($bdtaskchatboard_support,$support_info);
 }else{
	echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
}

die();
}
// discussion visitor
public function bdtaskchatbot_discussion_visitor(){
global $wpdb;
$discussion_visitor=sanitize_text_field($_POST['data']);

//=================== nonce Security verified checked======================= 
  if(wp_verify_nonce($_POST['security'], 'randomnonce')){	
//=================== nonce Security verified checked======================= 

$visitor_ids=$_SESSION['CH_visitor_id'];
$user = wp_get_current_user();
$user_id=sanitize_text_field($user->ID); // 0
$bdtaskchatboard_support=$wpdb->prefix.'bdtaskchatboard_support';
	$discussion_info = array(
		'id'        =>'',
		'visitor_id'=>intval($visitor_ids),
		'user_id'=>intval($user_id),
		'isDiscussion'=>intval($discussion_visitor),
		'date_time'=>date('Y-m-d h:i:s'),
	);
$dd=$wpdb->insert($bdtaskchatboard_support,$discussion_info);
 }else{
	echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
}

die();
}
// solve visitor issues
public function bdtaskchatbot_solved_visitor(){
global $wpdb;
$solved_visitor=sanitize_text_field($_POST['data']);
//=================== nonce Security verified checked======================= 
  if(wp_verify_nonce($_POST['security'], 'randomnonce')){	
//=================== nonce Security verified checked======================= 

$visitor_ids=$_SESSION['CH_visitor_id'];
$user = wp_get_current_user();
$user_id=sanitize_text_field($user->ID); // 0
$bdtaskchatboard_support=$wpdb->prefix.'bdtaskchatboard_support';
	$support_update = array(
		'user_id'=>intval($user_id),
		'isSolved'=>intval($solved_visitor),
		'date_time'=>date('Y-m-d h:i:s'),
		'status'   =>'0'
	);
 $wpdb->update($bdtaskchatboard_support,$support_update,array('visitor_id' =>$visitor_ids));
 }else{
	echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
}
die();
}
// clear history
public function bdtaskchatbot_clear_history(){
global $wpdb;
$visitor_ids=$_SESSION['CH_visitor_id'];
//=================== nonce Security verified checked======================= 
  if(wp_verify_nonce($_POST['security'], 'randomnonce')){	
//=================== nonce Security verified checked======================= 
$chat_history  =$wpdb->prefix .'bdtaskchatboard_chat_history';
// Notifications update chat_history table
$user = wp_get_current_user();
$user_id=$user->ID;
$update_department =$wpdb->delete($chat_history,array('visitor_id' =>$visitor_ids,'user_id'=>$user_id));
 }else{
	echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
}


die();
}
// visitor block
public function bdtaskchatbot_visitor_block(){
global $wpdb;
$visitor_ids=$_SESSION['CH_visitor_id'];
//=================== nonce Security verified checked======================= 
  if(wp_verify_nonce($_POST['security'], 'randomnonce')){	
//=================== nonce Security verified checked======================= 
$bdtaskchatboard_visitors =$wpdb->prefix .'bdtaskchatboard_visitors';
$data=array(
'status'=>'1',
);
$update_department =$wpdb->update($bdtaskchatboard_visitors,$data,array('visitor_id' =>$visitor_ids));
  }else{
	echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
 }
wp_die();
}
public function bdtaskchatbot_visitor_delete(){
global $wpdb;
$visitor_ids=$_SESSION['CH_visitor_id'];
//=================== nonce Security verified checked======================= 
  if(wp_verify_nonce($_POST['security'], 'randomnonce')){	
//=================== nonce Security verified checked======================= 
$bdtaskchatboard_visitors =$wpdb->prefix .'bdtaskchatboard_visitors';
$update_department =$wpdb->delete($bdtaskchatboard_visitors,array('visitor_id' =>$visitor_ids));
 }else{
	echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
}
die();
}
// update Notifications
public function bdtaskchatbot_vis_not_0(){
global $wpdb;

$visitor_ids=$_SESSION['CH_visitor_id'];
//=================== nonce Security verified checked======================= 
  if(wp_verify_nonce($_POST['security'], 'randomnonce')){	
//=================== nonce Security verified checked======================= 

	$chat_history  =$wpdb->prefix .'bdtaskchatboard_chat_history';
	// Notifications update chat_history table
	$data=array(
	'isNotify'=>'0',
	);
$update_department = $wpdb->update($chat_history,$data,array( 'visitor_id' =>$visitor_ids));
 }else{
	echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
}

die();
}
// upload file 
public function bdtaskchatbot_upload_file(){
global $wpdb;
$data=sanitize_text_field($_POST['data']);

$upload = wp_upload_bits($_FILES["file"]["name"], null, file_get_contents($_FILES["file"]["tmp_name"]));
$chat_history  =$wpdb->prefix .'bdtaskchatboard_chat_history';
$department_id =$_SESSION['department_id'];
$visitor_id=$_SESSION['CH_visitor_id'];;
$user = wp_get_current_user();
$user_id=sanitize_text_field($user->ID); // 0
	$visitorText = array(
	'visitor_id'   => $visitor_id,
	'attach_file'      =>$upload['url'],
	'department_id'=> $department_id,
	'chat_date'    => date('Y-m-d'),
	'chat_date_time'=> date('Y-m-d h:i:s'),
	'user_id'      => $user_id,
	'action_type'  => 1,
	'status'  => 1,
	'isNotify'  =>0
	);

$add_new_department = $wpdb->insert($chat_history, $visitorText);

die();
}
// contact search list
public function bdtaskchatbot_contact_list_search(){
global $wpdb;
$data=sanitize_text_field($_POST['data']);
//=================== nonce Security verified checked======================= 
  if(wp_verify_nonce($_POST['security'], 'randomnonce')){	
//=================== nonce Security verified checked======================= 

$chat_history =$wpdb->prefix .'bdtaskchatboard_chat_history';
$bdtaskchatboard_visitors =$wpdb->prefix .'bdtaskchatboard_visitors';
$contacts="SELECT * FROM $bdtaskchatboard_visitors WHERE first_name LIKE '%$data%' or last_name LIKE '%$data%' or email LIKE '%$data%' ORDER BY visitor_id DESC  ";

$contacts_list= $wpdb->get_results($contacts, OBJECT ) ;
foreach ($contacts_list as $value) {
if($value->isOnline==1){?>
<a class="item-list item-list__contact d-flex align-items-center unseen"  id="list-item-tab" data-toggle="tab" onclick="visitor_info('<?php echo $value->visitor_id?>')" href="#list-item<?php echo $value->visitor_id;?>" role="tab" aria-controls="list-item" aria-selected="true">
	<div class="avatar" style="background-color: #37a000;border-radius: 50%;">
		<?php echo esc_html($value->acronyms) ?>
		<div class="status online"></div>
	</div>
	<div class="info-text">
		<h5>  <?php echo esc_html($value->first_name.' '.$value->last_name);?></h5>
		<p><?php echo esc_html($value->city) ?>,<?php echo esc_html($value->country); ?></p>
	</div>
	<div class="person-add">
		<i class="material-icons"><?php echo esc_html('person','bdtaskchatbot');?></i>
	</div>
	</a><!--/.chat list item-->
	<?php
	}}
	 }else{
		echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
	}
	die();
	}
	public function bdtaskchatbot_nofity_counter(){
	global $wpdb;
	//=================== nonce Security verified checked======================= 
     if(wp_verify_nonce($_POST['security'], 'randomnonce')){	
    //=================== nonce Security verified checked======================= 
	$chat_history =$wpdb->prefix .'bdtaskchatboard_chat_history';
	$chat_list = "SELECT * FROM $chat_history";
	$chat_intormation= $wpdb->get_results($chat_list , OBJECT ) ;
	$isnotify=0;
	foreach ($chat_intormation as $key => $value) {
	if($value->isNotify==1){
	$isnotify++;
	}
	}
	echo $isnotify;
	}else{
		echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
	}
	die();
	}
	public function bdtaskchatbot_RecentChatlist(){
	global $wpdb;
	//=================== nonce Security verified checked======================= 
     if(wp_verify_nonce($_POST['security'], 'randomnonce')){	
    //=================== nonce Security verified checked======================= 
	$chat_history =$wpdb->prefix .'bdtaskchatboard_chat_history';
	$bdtaskchatboard_visitors =$wpdb->prefix .'bdtaskchatboard_visitors';
	
	$data="SELECT e.*,u.*,COUNT(*)
	FROM $chat_history
	AS e
	INNER JOIN
	$bdtaskchatboard_visitors AS u ON e.visitor_id = u.visitor_id  group by e.visitor_id ORDER BY chat_id DESC LIMIT 20";
	$recent_chat_history= $wpdb->get_results($data, OBJECT ) ;
	foreach ($recent_chat_history as $value) {
	
	if($value->isOnline==1){
	?>
	<a class="item-list item-list__chat d-flex align-items-start unseen" id="list-item1-tab" data-toggle="tab" onclick="visitor_info('<?php echo $value->visitor_id?>')" href="#list-item<?php echo $value->visitor_id;?>" role="tab" aria-controls="list-item1" aria-selected="true">
		<div class="avatar" style="background-color: #37a000;border-radius: 50%;">
			<?php echo esc_html($value->acronyms) ?>
			<div class="status online"></div>
	</div>
	<div class="info-text">
		<h5><?php echo esc_html($value->first_name.' '.$value->last_name);?></h5>
		<span><?php $unixTimestamp = strtotime($value->chat_date);echo $dayOfWeek = date("l", $unixTimestamp);?></span>
		<p><?php echo $value->message;?></p>
	</div>
	</a><!--/.chat list item-->
	<?php }else{?>
	<a class="item-list item-list__chat d-flex align-items-start unseen" id="list-item1-tab" data-toggle="tab" onclick="visitor_info('<?php echo $value->visitor_id?>')" href="#list-item<?php echo $value->visitor_id;?>" role="tab" aria-controls="list-item1" aria-selected="true">
		<div class="avatar" style="background-color: #ffc107;border-radius: 50%;">
			<?php echo esc_html($value->acronyms);?>
			<div class="status ofline"></div>
	</div>
	<div class="info-text">
		<h5><?php echo esc_html($value->first_name.' '.$value->last_name);?></h5>
		<span><?php $unixTimestamp = strtotime($value->chat_date);echo $dayOfWeek = date("l", $unixTimestamp);?></span>
		<p><?php echo $value->message;?></p>
	</div>
	</a><!--/.chat list item-->
	<?php
	}}

	}else{
		echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
	}
	die();
	}
public function bdtaskchatbot_onlinevisitor(){
	global $wpdb;
	//=================== nonce Security verified checked======================= 
     if(wp_verify_nonce($_POST['security'], 'randomnonce')){	
    //=================== nonce Security verified checked=======================
	$chat_history =$wpdb->prefix .'bdtaskchatboard_chat_history';
	$bdtaskchatboard_visitors =$wpdb->prefix .'bdtaskchatboard_visitors';

	$visitor_list = "SELECT * FROM $bdtaskchatboard_visitors";
		$visitor_info= $wpdb->get_results($visitor_list, OBJECT ) ;
	foreach ($visitor_info as $value) {
	if($value->isOnline==1){?>
	<a href="#" onclick="visitor_info('<?php echo $value->visitor_id?>')" class="visitor-history" data-toggle="popover" data-trigger="hover"  data-placement="right" title="User Info" data-content="<div class='chat-user__info chat-user__info-popover user-info d-flex align-items-center'><div class='avatar'><img src='<?php echo plugins_url();?>/bdtaskchatbot/admin/assets/dist/img/avatar/avatar-5.png' alt='avatar'><div class='status online'></div></div><div class='info-text'><table class='table m-0'><tbody><tr><td class='user-info-first'><?php echo esc_html('Name','bdtaskchatbot');?></td><td class='text-muted'><?php echo esc_html($value->first_name.''.$value->last_name);?></td></tr><tr><td class='user-info-first'><?php echo esc_html('ID','bdtaskchatbot');?></td><td class='text-muted'><?php echo esc_html($value->visitor_id);?></td></tr><tr><td class='user-info-first'><?php echo esc_html('Email');?></td><td class='text-muted'><?php echo esc_html($value->email);?></td></tr><tr><td class='user-info-first'><?php echo esc_html('Mobile');?></td><td class='text-muted'><?php echo esc_html($value->phone);?></td></tr><tr><td class='user-info-first'><?php echo esc_html('From URL','bdtaskchatbot');?></td><td class='text-muted'><a href='#' class='text-muted'><?php echo esc_url($value->from_url);?></a></td></tr></tbody></table></div></div>">
	<div>
		<i class="fa fa-circle text-success"></i>
		<span class="visitor-id"><?php echo esc_html('visitor.'.$value->visitor_id);?></span><span class="source-link"><?php echo esc_html($value->country);?></span></div>
		</a><!--/.visitor history-->
		<?php }else{?>
		<a href="#" onclick="visitor_info('<?php echo $value->visitor_id?>')"  class="visitor-history" data-toggle="popover" data-trigger="hover"  data-placement="right" title="User Info" data-content="<div class='chat-user__info chat-user__info-popover user-info d-flex align-items-center'><div class='avatar'><img src='<?php echo plugins_url();?>/bdtaskchatbot/admin/assets/dist/img/avatar/avatar-5.png' alt='avatar'><div class='status ofline'></div></div><div class='info-text'><table class='table m-0'><tbody><tr><td class='user-info-first'><?php echo esc_html('Name','bdtaskchatbot');?></td><td class='text-muted'><?php echo esc_html($value->first_name.''.$value->last_name);?></td></tr><tr><td class='user-info-first'><?php echo esc_html('ID','bdtaskchatbot');?></td><td class='text-muted'><?php echo esc_html($value->visitor_id);?></td></tr><tr><td class='user-info-first'><?php echo esc_html('Email');?></td><td class='text-muted'><?php echo esc_html($value->email);?></td></tr><tr><td class='user-info-first'><?php echo esc_html('Mobile');?></td><td class='text-muted'><?php echo esc_html($value->phone);?></td></tr><tr><td class='user-info-first'><?php echo esc_html('From URL','bdtaskchatbot');?></td><td class='text-muted'><a href='#' class='text-muted'><?php echo esc_url($value->from_url);?></a></td></tr></tbody></table></div></div>">
		<div>
			<i class="fa fa-circle text-warning"></i>
			<span class="visitor-id"><?php echo esc_html('visitor.'.$value->visitor_id);?></span><span class="source-link"><?php echo esc_html($value->country);?></span></div>
			</a><!--/.visitor history-->
			<?php
			}}
			}else{
				echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
			}

			die();
			}
			public function bdtaskchatbot_visitors_contact(){
			?>
			<?php
			global $wpdb;
			//=================== nonce Security verified checked======================= 
		     if(wp_verify_nonce($_POST['security'], 'randomnonce')){	
		    //=================== nonce Security verified checked=======================
			$chat_history =$wpdb->prefix .'bdtaskchatboard_chat_history';
			$bdtaskchatboard_visitors =$wpdb->prefix .'bdtaskchatboard_visitors';
			$contacts="SELECT * FROM $bdtaskchatboard_visitors ORDER BY visitor_id DESC";
			$contacts_list= $wpdb->get_results($contacts, OBJECT ) ;
			foreach ($contacts_list as $value) {
			if($value->isOnline==1){?>
			<a class="item-list item-list__contact d-flex align-items-center unseen"  id="list-item-tab" data-toggle="tab" onclick="visitor_info('<?php echo $value->visitor_id?>')" href="#list-item<?php echo $value->visitor_id;?>" role="tab" aria-controls="list-item" aria-selected="true">
				<div class="avatar" style="background-color: #37a000;border-radius: 50%;">
					<?php echo esc_html($value->acronyms) ?>
					<div class="status online"></div>
				</div>
				<div class="info-text">
					<h5>  <?php echo esc_html($value->first_name.' '.$value->last_name);?></h5>
					<p><?php echo esc_html($value->city) ?>,<?php echo esc_html($value->country); ?></p>
				</div>
				<div class="person-add">
					<i class="material-icons"><?php echo esc_html('person','bdtaskchatbot');?></i>
				</div>
				</a><!--/.chat list item-->
				<?php
				}}
				}else{
					echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
				}
			     die();
				}
public function bdtaskchatbot_notifications_ajax(){
	global $wpdb;
	//=================== nonce Security verified checked======================= 
     if(wp_verify_nonce($_POST['security'], 'randomnonce')){	
    //=================== nonce Security verified checked=======================
	$chat_history =$wpdb->prefix .'bdtaskchatboard_chat_history';
	$bdtaskchatboard_visitors =$wpdb->prefix .'bdtaskchatboard_visitors';
	$chat_list = "SELECT * FROM $chat_history";
	$chat_intormation= $wpdb->get_results($chat_list , OBJECT ) ;
	$visitor_list = "SELECT * FROM $bdtaskchatboard_visitors";
	$visitor_info= $wpdb->get_results($visitor_list , OBJECT ) ;
	$datas="SELECT e.*,u.*,COUNT(*)
	FROM $chat_history
	AS e
	INNER JOIN
	$bdtaskchatboard_visitors AS u ON e.visitor_id = u.visitor_id WHERE isNotify=1 group by e.visitor_id";
	$recent_notify= $wpdb->get_results($datas , OBJECT ) ;
	foreach ($recent_notify as $key => $value) {
	if($value->isOnline==1){
?>
			<a class="item-list item-list__contact d-flex align-items-center unseen" id="list-item-tab" data-toggle="tab" onclick="visitor_info('<?php echo $value->visitor_id?>')" href="#list-item<?php echo $value->visitor_id;?>" role="tab" aria-controls="list-item" aria-selected="true">
				<div class="avatar" style="background-color:#37a000;border-radius: 50%;"><?php echo esc_html($value->acronyms);?>
					<div class="status online"></div>
				</div>
				<div class="info-text">
					<h5><?php echo esc_html($value->message);?></h5>
					<p><?php

						$bd=get_option('timezone_string');
						if(!empty($bd)){
						$datetime = new DateTime($value->chat_date_time);
						$la_time = new DateTimeZone($bd);
						$datetime->setTimezone($la_time);
						echo $datetime->format("g:i A");
						}else{
						 
						$datetime = new DateTime($value->chat_date_time);
						$la_time = new DateTimeZone('Asia/Dhaka');
						$datetime->setTimezone($la_time);
						echo $datetime->format("g:i A");  
						}
						
					?></p>
				</div>
				</a><!--/.chat list item-->
				<?php }else{?>
				<a class="item-list item-list__contact d-flex align-items-center unseen" id="list-item-tab" data-toggle="tab" onclick="visitor_info('<?php echo $value->visitor_id?>')" href="#list-item<?php echo $value->visitor_id;?>" role="tab" aria-controls="list-item" aria-selected="true">
					<div class="avatar" style="background-color: #ffc107;border-radius: 50%;">
						<?php echo esc_html($value->acronyms);?>
						<div class="status ofline"></div>
					</div>
					<div class="info-text">
						<h5><?php echo esc_html($value->message);?></h5>
						<p><?php
					    $bd=get_option('timezone_string');
						if(!empty($bd)){
						$datetime = new DateTime($value->chat_date_time);
						$la_time = new DateTimeZone($bd);
						$datetime->setTimezone($la_time);
						echo $datetime->format("g:i A");
						}else{
						$datetime = new DateTime($value->chat_date_time);
						$la_time = new DateTimeZone('Asia/Dhaka');
						$datetime->setTimezone($la_time);
						echo $datetime->format("g:i A"); 
						}
						?>
						</p>
					</div>
					</a><!--/.chat list item-->
					<?php
					}}
						}else{
						echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
					}	
					die();
					}
					//===================admin submit message ======================
					//==============================================================
					function bdtaskadmin_message(){
					global $wpdb;
					$message=sanitize_text_field($_POST['data']);
				//=================== nonce Security verified checked======================= 
			     if(wp_verify_nonce($_POST['security'], 'randomnonce')){	
			    //=================== nonce Security verified checked=======================
					$chat_history =$wpdb->prefix .'bdtaskchatboard_chat_history';
					$visitor_id=$_SESSION['CH_visitor_id'];
					$user = wp_get_current_user();
					$user_id=sanitize_text_field($user->ID); // 0
					$department_id=$_SESSION['department_id'];
					$visitorText = array(
					'visitor_id'   =>intval($visitor_id),
					'message'      =>sanitize_text_field($message),
					'department_id'=>sanitize_text_field($department_id),
					'chat_date'    => date('Y-m-d'),
					'chat_date_time'=> date('Y-m-d h:i:s'),
					'user_id'      =>intval($user_id),
					'action_type'  => 1,
					'status'  => 1,
					'isNotify'  =>0
					);
					$add_new_department = $wpdb->insert($chat_history, $visitorText);
					}else{
						echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
					}	
					die();
					}
					function bdtaskmessage(){
					global $wpdb;
				//=================== nonce Security verified checked======================= 
			     if(wp_verify_nonce($_POST['security'], 'randomnonce')){	
			    //=================== nonce Security verified checked=======================
					session_start();
					$chat_history =$wpdb->prefix .'bdtaskchatboard_chat_history';
					$bdtaskchatboard_visitors =$wpdb->prefix .'bdtaskchatboard_visitors';
					$user = wp_get_current_user();
					$user_id=sanitize_text_field($user->ID); // 0
					$visitor_ids=$_SESSION['CH_visitor_id'];
					$dasdf="SELECT * FROM $chat_history WHERE user_id=$user_id and visitor_id=$visitor_ids ORDER BY chat_id ASC";
					$message= $wpdb->get_results($dasdf , OBJECT ) ;
					?>
					<?php
					foreach ($message as $key => $values) {
					if($values->action_type==2){
					?>
					<div class="message me">
						<div class="text-main">
							<span class="time-ago">
								<?php
								
								$bd=get_option('timezone_string');
								if(!empty($bd)){
								$datetime = new DateTime($values->chat_date_time);
								$la_time = new DateTimeZone($bd);
								$datetime->setTimezone($la_time);
								echo $datetime->format("g:i a");
								}else{
								    
								$datetime = new DateTime($values->chat_date_time);
								$la_time = new DateTimeZone('Asia/Dhaka');
								$datetime->setTimezone($la_time);
								echo $datetime->format("g:i a");
								}
							?></span>
							<div class="text-group me">
								<div class="text me">
									<?php if(!empty($values->message)){?>
									<p><?php echo $values->message;?></p>
									<?php }else{
									$pathinfo = pathinfo($values->attach_file);
									$file_name=$pathinfo['filename'].'.'.$pathinfo['extension'];
									// file size
									$size=get_headers($values->attach_file, 1);
									$file_size=size_format( $size['Content-Length'], $decimals = 2 )
									?>
									<div class="attachment">
										<button class="btn attach"><i class="material-icons md-18">archive</i></button>
										<div class="file">
											<h5><a href="<?php echo esc_url($values->attach_file) ;?>" download><?php echo esc_html($file_name) ; ?></a></h5>
											<span><?php echo esc_html($file_size). esc_html(' Document','bdtaskchatbot');?></span>
										</div>
									</div>
									<?php }?>
								</div>
							</div>
						</div>
						</div><!--/.message-->
						<?php }else{
						?>
						<div class="message">
							<div class="text-main">
								<span class="time-ago">
									<?php
								
								$bd=get_option('timezone_string');
								if(!empty($bd)){
								$datetime = new DateTime($values->chat_date_time);
								$la_time = new DateTimeZone($bd);
								$datetime->setTimezone($la_time);
								echo $datetime->format("g:i a");
								}else{
								    
								$datetime = new DateTime($values->chat_date_time);
								$la_time = new DateTimeZone('Asia/Dhaka');
								$datetime->setTimezone($la_time);
								echo $datetime->format("g:i a");
								}
							?>
									
								</span>
								<div class="text-group">
									<div class="text">
										<?php if(!empty($values->message)){?>
										<p><?php echo $values->message?></p>
										<?php }else{
										// file name
										$pathinfo = pathinfo($values->attach_file);
										$file_name=$pathinfo['filename'].'.'.$pathinfo['extension'];
										// file size
										$size=get_headers($values->attach_file, 1);
										$file_size=size_format( $size['Content-Length'], $decimals = 2 );
										?>
										<div class="attachment">
											<button class="btn attach"><i class="material-icons md-18"><?php echo esc_html('archive','bdtaskchatbot');?></i></button>
											<div class="file">
												<h5><a href="<?php echo esc_url($values->attach_file) ;?>" download><?php echo esc_html($file_name); ?></a></h5>
												<span><?php echo esc_html($file_size). esc_html(' Document','bdtaskchatbot');?></span>
											</div>
										</div>
										<?php }?>
									</div>
								</div>
							</div>
						</div>
						<?php 
					       }
					   }
                $sqls = "SELECT * FROM $bdtaskchatboard_visitors WHERE  visitor_id='".$visitor_ids."'  ORDER BY visitor_id ASC";
                $chat_type= $wpdb->get_row( $sqls  , OBJECT ) ;
                if($chat_type->is_type=='yes'){
                ?>
                    <div class="message me">
                       <div class="custom_avatar text-white rounded-circle">
                    <?php  
                    $name=$_SESSION['user_name'][0]->user_nicename;
                      $acronym = "";
                      if(!empty($name)){
                          // Delimit by multiple spaces, hyphen, underscore, comma
                          $words = preg_split("/[\s,_-]+/", $name);
                          foreach ($words as $w) {
                            $acronym .= ucfirst($w[0]);
                          }
                      }
                    echo esc_html($acronym);
                    ?>
                    </div>   
                    <div class="text-main ">
                        <div class="text-group me">
                            <div class="text typing">
                                <div class="wave">
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <?php
                    }

	                        }else{
								echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
							}
						die();
						}
						function bdtaskchatbot_admin_enter_message(){
						//session_start();
						global $wpdb;
						$message=sanitize_text_field($_POST['data']);
				//=================== nonce Security verified checked======================= 
			     if(wp_verify_nonce($_POST['security'], 'randomnonce')){	
			    //=================== nonce Security verified checked=======================
						$chat_history  =$wpdb->prefix .'bdtaskchatboard_chat_history';
						$department_id =$_SESSION['department_id'];
						$visitor_id=$_SESSION['CH_visitor_id'];
						$user = wp_get_current_user();
						$user_id=sanitize_text_field($user->ID); // 0
						$visitorText = array(
						'visitor_id'   => intval($visitor_id),
						'message'      => sanitize_text_field($message),
						'department_id'=> sanitize_text_field($department_id),
						'chat_date'    => date('Y-m-d'),
						'chat_date_time'=> date('Y-m-d h:i:s'),
						'user_id'      => intval($user_id),
						'action_type'  => 1,
						'status'  => 1,
						'isNotify'  =>0
						);
						$add_new_department = $wpdb->insert($chat_history, $visitorText);
					      }else{
								echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
						}
						die();
						}
						function bdtaskchatbot_visitor_message_color(){
						global $wpdb;
							$color=sanitize_text_field($_POST['data']);
                 //=================== nonce Security verified checked======================= 
			              if(wp_verify_nonce($_POST['security'], 'randomnonce')){	
			    //=================== nonce Security verified checked=======================
							$visitor_ids=$_SESSION['CH_visitor_id'];
							$user = wp_get_current_user();
							$user_id=sanitize_text_field($user->ID); // 0
							$chat_color=$wpdb->prefix .'bdtaskchatboard_chat_color';
							$check_color="SELECT* FROM $chat_color WHERE visitor_id=$visitor_ids AND user_id=$user_id";
								$color_test = array(
								'visitor_id'   => intval($visitor_ids),
								'user_id'      => intval($user_id),
								'color_name'      =>sanitize_text_field($color)
								);
								$age_ace= $wpdb->get_results($check_color , OBJECT ) ;
								if($age_ace){
								$update_color = $wpdb->update($chat_color,$color_test,array( 'visitor_id' =>$visitor_ids));
								}else{
								$add_new_color =$wpdb->insert($chat_color,$color_test);
								}
                          }else{
							echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
					      }
						die();
						}
						function bdtaskchatbot_chat_conversiton_ajax($id){
						global $wpdb;
						session_start();
						$visitor_id=sanitize_text_field($_POST['data']);
				//=================== nonce Security verified checked======================= 
			       if(wp_verify_nonce($_POST['security'], 'randomnonce')){	
			    //=================== nonce Security verified checked=======================
						$chat_history =$wpdb->prefix .'bdtaskchatboard_chat_history';
						$bdtaskchatboard_visitors =$wpdb->prefix .'bdtaskchatboard_visitors';
						$chat_color=$wpdb->prefix .'bdtaskchatboard_chat_color';

						$_SESSION['CH_visitor_id']=$visitor_id;
						$visitor_ids=$_SESSION['CH_visitor_id'];
						$user = wp_get_current_user();
						$user_id=sanitize_text_field($user->ID); // 0
						$visitor_data="SELECT * FROM $bdtaskchatboard_visitors WHERE visitor_id=$visitor_ids";
						$recent_notify= $wpdb->get_results($visitor_data , OBJECT ) ;
						$visitor_color="SELECT * FROM $chat_color WHERE visitor_id=$visitor_ids And user_id=$user_id";
						$visitor_color_checked= $wpdb->get_results($visitor_color, OBJECT ) ;
						$_SESSION['color']=$visitor_color_checked[0]->color_name;
						$color=$_SESSION['color'];
						// Notifications update chat_history table
						$data=array(
						'isNotify'=>'0',
						);
						$update_department = $wpdb->update($chat_history,$data,array( 'visitor_id' =>$visitor_ids));
						foreach ($recent_notify as $key => $value) {
						$dasdf="SELECT * FROM $chat_history WHERE user_id=$user_id and visitor_id='$value->visitor_id'";
						$titme= $wpdb->get_results($dasdf , OBJECT ) ;
						?>
						<div class="tab-pane" id="list-item<?php echo $value->visitor_id;?>" role="tabpanel" aria-labelledby="list-item-tab">
							<div class="chat-header d-flex align-items-center">
								
								<a href="#" class="position-relative">
									<div class="avatar" style="background-color: #37a000;border-radius: 50%;;width:40px;height:40px;margin-right:10px ">
										<?php echo esc_html($value->acronyms);?>
										<div class="status ofline"></div>
									</div>
								</a>
								<div class="meta-info data mr-auto">
									<h5><a href="#"><?php echo esc_html($value->first_name."".$value->last_name);?></a></h5>
									
								
								<span>
									<?php
									$last_activatiy=strtotime($value->last_activity) ;
									$current_time=strtotime(date('Y-m-d H:i:s'));
									$time_diff=$current_time-$last_activatiy;
									$sec     =  $time_diff;
									$min     = round($time_diff / 60 );
									$hrs     = round($time_diff  / 3600);
									$days    = round($time_diff / 86400 );
									$weeks   = round( $time_diff / 604800);
									$mnths   = round( $time_diff / 2600640 );
									$yrs     = round( $time_diff / 31207680 );
									if($sec <= 60) {
									echo esc_html("$sec seconds ago","bdtaskchatbot");
									}
									// Check for minutes
									else if($min <= 60) {
									if($min==1) {
									echo esc_html("one minute ago",'bdtaskchatbot');
									}
									else {
									echo esc_html("$min minutes ago",'bdtaskchatbot');
									}
									}
									// Check for hours
									else if($hrs <= 24) {
									if($hrs == 1) {
									echo esc_html("an hour ago","bdtaskchatbot");
									}
									else {
									echo esc_html("$hrs hours ago","bdtaskchatbot");
									}
									}
									// Check for days
									else if($days <= 7) {
									if($days == 1) {
									echo esc_html("Yesterday","bdtaskchatbot");
									}
									else {
									echo esc_html("$days days ago","bdtaskchatbot");
									}
									}
									// Check for weeks
									else if($weeks <= 4.3) {
									if($weeks == 1) {
									echo esc_html("a week ago","bdtaskchatbot");
									}
									else {
									echo esc_html("$weeks weeks ago","bdtaskchatbot");
									}
									}
									// Check for months
									else if($mnths <= 12) {
									if($mnths == 1) {
									echo esc_html("a month ago","bdtaskchatbot");
									}
									else {
									echo esc_html("$mnths months ago","bdtaskchatbot");
									}
									}
									// Check for years
									else {
									if($yrs == 1) {
									echo esc_html("one year ago","bdtaskchatbot");
									}
									else {
									echo esc_html("$yrs years ago","bdtaskchatbot");
									}
									}
									?>
								</span>
									
								</div>

						<button class="btn d-block d-lg-none chat-settings-collapse" title="Settings"><i class="material-icons"><?php echo esc_html('settings','bdtaskchatbot');?></i></button>
						<div class="dropdown">
							<button class="btn mr-0" data-toggle="dropdown" aria-haspopup="true"><i class="material-icons"><?php echo esc_html('more_vert','bdtaskchatbot');?></i></button>
							<div class="dropdown-menu dropdown-menu-right">
								<hr>
								<button class="dropdown-item" id="clear_history" onclick="clear_history()"><i class="material-icons"><?php echo esc_html('clear','bdtaskchatbot');?></i><?php echo esc_html('Clear History','bdtaskchatbot');?></button>
								<button class="dropdown-item" id="block_visitor" onclick="block_visitor()" ><i class="material-icons"><?php echo esc_html('block','bdtaskchatbot');?></i><?php echo esc_html('Block Contact','bdtaskchatbot');?></button>
								<button class="dropdown-item" id="delete_visitor" onclick="delete_visitor()"><i class="material-icons"><?php echo esc_html('delete','bdtaskchatbot');?></i><?php echo esc_html('Delete Contact','bdtaskchatbot');?></button>
							</div>
						</div>
					</div>
					<div class="messenger-dialog row m-0">
						<div class="messenger-dialog__area">
							<div class="conversation-search">
								<div class="d-flex">
									<div class="btn-group mr-3" role="group" aria-label="Basic example">
										<button type="button" class="btn"><i class="ti-angle-up"></i></button>
										<button type="button" class="btn"><i class="ti-angle-down"></i></button>
									</div>
									<div class="input-group">
										<i class="ti-search search__icon"></i>
										<input type="text" class="form-control" placeholder="Find messages in current conversation" aria-label="Find messages in current conversation" aria-describedby="button-addon1">
										<div class="input-group-append">
											<button class="btn btn-outline-secondary close-search" type="button" id="button-addon1"><?php echo esc_html('Cancel','bdtaskchatbot');?></button>
										</div>
									</div>
								</div>
								</div><!--/.conversation search-->
								<div class="message-content message-content-scroll ps ps--active-y bg-text-<?php echo $color;?> message-re" id="out" >
									<div class="position-relative" >
										<div id="message_show"></div>
										<div id="chat-text-message"></div>
										
									</div>
								</div>
								<!--/.tab content-->
								<div class="chat-area-bottom d-flex align-items-center" >
									<form class="position-relative w-100 enterValue" >
										<textarea class="form-control emojionearea messageChat" placeholder="Type a message here..." rows="1" id="admin_message"></textarea>
										
										<button type="button" class="btn send" onclick="submit_admin_data()"><i class="material-icons"><?php echo esc_html('send','bdtaskchatbot');?></i></button>
									</form>
									<label>
										<form method="post" enctype="multipart/form-data">
											<input type="file" id="file" />
											<span class="btn attach" id="upload"><i class="material-icons"><?php echo esc_html('attach_file','bdtaskchatbot');?></i></span>
										</form>
									</label>
									</div><!--/.chat area bottom-->
								</div>
								<div class="chat-list__sidebar--right">
									<div class="chat-user__info d-flex align-items-center">
										<a href="#" class="position-relative">
											<div class="avatar" style="background-color: #37a000;border-radius: 50%;">
												<?php echo esc_html($value->acronyms);?>
												
											</div>
										</a>
										<div class="info-text">
											<h5 class="m-0"><?php echo esc_html($value->first_name.' '.$value->last_name);?></h5>
											<p class="writing"><?php echo esc_html($value->country);?></p>
										</div>
									</div>
									<div class="chatting_indicate card-body">
										<h5><?php echo esc_html('Conversation With Auto bot or manual','bdtaskchatbot');?></h5>
										<p><?php echo esc_html('Everyone in this conversation will see this.','bdtaskchatbot');?></p>
										<div class="d-flex align-items-center">
											<label class="toggler toggler--is-active" id="autobot"><?php echo esc_html('Auto bot','bdtaskchatbot');?></label>
											<div class="toggle">
												<input type="checkbox" id="switcher" class="check">
												<b class="toggle-switch"></b>
											</div>
											<label class="toggler" id="manual"><?php echo esc_html('Manual','bdtaskchatbot');?></label>
										</div>
									</div>
									<div id="accordion" class="accordion">
										<div class="card">
											<div class="card-header" id="headingThree">
												<h5 class="card-header__title mb-0">
												<a href="javascript:void(0)" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
													<i class="material-icons"><?php echo esc_html('person','bdtaskchatbot');?></i><?php echo esc_html('User Details','bdtaskchatbot');?>
												</a>
												</h5>
											</div>
											<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
												<div class="card-body">
													<div class="user-info">
														<div class="table-responsive">
											<table class="table border">
												<tbody>
													<tr>
														<td class="user-info-first"><?php echo esc_html('Name','bdtaskchatbot');?></td>
														<td><?php echo esc_html($value->first_name.' '.$value->last_name);?></td>
													</tr>
													<tr>
														<td class="user-info-first"><?php echo esc_html('ID','bdtaskchatbot');?></td>
														<td><?php echo esc_html($value->visitor_id);?></td>
													</tr>
													<tr>
														<td class="user-info-first"><?php echo esc_html('E-mail','bdtaskchatbot');?></td>
														<td><?php echo esc_html($value->email);?></td>
													</tr>
													<tr>
														<td class="user-info-first"><?php echo esc_html('Phone','bdtaskchatbot');?></td>
														<td><?php echo esc_html($value->phone);?></td>
													</tr>
													<tr>
														<td class="user-info-first"><?php echo esc_html('Browser','bdtaskchatbot');?></td>
														<td><?php echo esc_html($value->browser);?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
										
							<div class="card">
								<div class="card-header" id="Vconvertion">
									<h5 class="card-header__title mb-0">
									<a class="" data-toggle="collapse" data-target="#collapseVC" aria-expanded="false" aria-controls="collapseVC">
									<i class="fa fa-exchange-alt"></i> <?php echo esc_html('Conversion','bdtaskchatbot');?>                </a>
									</h5>
								</div>
								<div id="collapseVC" class="collapse" aria-labelledby="Vconvertion" data-parent="#accordion" style="">
									<div class="card-body">
										<div class="msg"></div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input conversion_chk" name="customer" id="customer" onclick="customer()" value="1"  <?php if($value->isConvert==1){ echo 'checked';}?>>
											<label for="customer" class="custom-control-label"><?php echo esc_html('Convert to customer','bdtaskchatbot');?></label>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input conversion_chk" name="lead" onclick="lead()" id="lead" value="2"  <?php if($value->isConvert==2){ echo 'checked';}?>>
											<label for="lead" class="custom-control-label"><?php echo esc_html('Convert to lead','bdtaskchatbot');?></label>
										</div>
										
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="issueType">
									<h5 class="card-header__title mb-0">
									<a class="collapsed" data-toggle="collapse" data-target="#collapseIT" aria-expanded="false" aria-controls="collapseIT">
									<i class="material-icons"><?php echo esc_html('info_outline','bdtaskchatbot');?></i><?php echo esc_html('Issue Type','bdtaskchatbot');?>                        
								    </a>
									</h5>
								</div>
								<div id="collapseIT" class="collapse" aria-labelledby="issueType" data-parent="#accordion">
									<div class="card-body">
									
										<?php
										$visitor_ids=$_SESSION['CH_visitor_id'];
										$bdtaskchatboard_support=$wpdb->prefix.'bdtaskchatboard_support';
										$sql="SELECT * FROM $bdtaskchatboard_support WHERE visitor_id= $visitor_ids And status=1";
										$supportchecked = $wpdb->get_results( $sql  , OBJECT ) ;
										
										$sqls="SELECT * FROM $bdtaskchatboard_support WHERE visitor_id= $visitor_ids And isDiscussion=1";
										$isDiscussion = $wpdb->get_results( $sqls  , OBJECT ) ;
										?>
										<div class="custom-control custom-checkbox">

								<input type="checkbox" class="custom-control-input issue_chk" name="support_id" id="support_id"  onclick="bdtaskchat_support()" value="1" <?php if(!empty($supportchecked)){ echo 'checked';}?>>
								<label for="support_id" class="custom-control-label"><?php echo esc_html('Support','bdtaskchatbot');?></label>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input issue_chk" name="discussion" id="discussion" onclick="bdtaskchatbot_discussion()" value="1" <?php if(!empty($isDiscussion)){ echo 'checked';}?>>
											<label for="discussion" class="custom-control-label"><?php echo esc_html('Discussion','bdtaskchatbot');?></label>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input issue_chk" name="solved" id="solved" onclick="bdtaskchat_solved()" value="1">
											<label for="solved" class="custom-control-label"><?php echo esc_html('Solved','bdtaskchatbot');?></label>
										</div>
										
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingTwo">
									<h5 class="card-header__title mb-0">
									<a href="javascript:void(0)" class="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
										<i class="material-icons"><?php echo esc_html('color_lens');?></i><?php echo esc_html('Change color','bdtaskchatbot');?>
									</a>
									</h5>
								</div>
								<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
									<div class="card-body">
										<h5><?php echo esc_html('Pick a color for this conversation','bdtaskchatbot');?></h5>
										<p><?php echo esc_html('Everyone in this conversation will see this.','bdtaskchatbot');?></p>
										<div class="radio-list change-bg-color">
											<?php
											$colorBank = array('0'=>'red', '1'=>'green', '2'=>'yellow', '3'=>'olive', '4'=>'orange', '5'=>'teal', '6'=>'blue', '7'=>'violet', '8'=>'purple','9'=>'pink');
											for ($i=0; $i < 10; $i++) {
											?>
											<input type="radio" name="<?php echo  $colorBank[$i];?>" id="<?php echo  $colorBank[$i];?>"  <?php if($colorBank[$i]==$color){echo 'checked';}?>/>
											<label for="<?php echo  $colorBank[$i];?>" data-color="<?php echo  $colorBank[$i];?>"><span class="<?php echo  $colorBank[$i];?>"></span></label>
											<?php }?>
											
										</div>
									</div>
								</div>
							</div>
						</div>
						</div><!--/.chat list sidebar right-->
					</div>
				</div>
										<!-- <div class="chat-overlay"></div> -->
					<script type="text/javascript">
					 // message setInterval and checked box 
					jQuery(document).ready(function () {
					// onclick conversion checkbox checked
				    "use strict";
				    bdtaskchatbot_hover();
				    bdtaskchatbot_color();
				    bdtaskchatbot_enter_admin_messages();
					jQuery('input.conversion_chk').on('change', function() {
					jQuery('input.conversion_chk').not(this).prop('checked', false);
					});
					// if click support disable discussion checkbox
					jQuery('input#support_id').on('change', function() {
					jQuery('input#discussion').attr('disabled', true);
					});
					jQuery('#out')[0].scrollTop =jQuery('#out')[0].scrollHeight;
					get_messagef();
							setInterval(function(){
							get_messagef();
						}, 5000);
					});
											
					</script>
			<?php }
			  }else{
			   echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
			 }
	die();
}











}
