<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       www.bdtask.com
 * @since      1.0.0
 *
 * @package    Bdtaskchatbot
 * @subpackage Bdtaskchatbot/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Bdtaskchatbot
 * @subpackage Bdtaskchatbot/public
 * @author     bdtask <bdtask@gmail.com>
 */
class Bdtaskchatbot_Public {

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
   * @param      string    $plugin_name       The name of the plugin.
   * @param      string    $version    The version of this plugin.
   */
  public function __construct( $plugin_name, $version ) {

    $this->plugin_name = $plugin_name;
    $this->version = $version;
         // Start the session
            session_start();
    global $wpdb;
    add_action('init',array($this,'bdtaskchatbot_shortcode_register'));
    add_action('init',array($this,'bdtaskchatbot_quotations'));

    add_action( 'wp_ajax_professional_ajaxProsessData',
                  array($this,'bdtaskchatbot_professional_ajaxProsessData'));
    add_action( 'wp_ajax_nopriv_professional_ajaxProsessData',
                  array($this,'bdtaskchatbot_professional_ajaxProsessData'));

add_action( 'wp_ajax_wlcomechat_ajaxProsessData',
                  array($this,'bdtaskchatbot_welcomechat_ajaxProsessData'));
 add_action( 'wp_ajax_nopriv_wlcomechat_ajaxProsessData',
                  array($this,'bdtaskchatbot_welcomechat_ajaxProsessData'));

 add_action( 'wp_ajax_manualchat_messate_ajaxProsessData',
                  array($this,'bdtaskchatbot_manualchat_messate_ajaxProsessData'));
 add_action( 'wp_ajax_nopriv_manualchat_messate_ajaxProsessData',
                  array($this,'bdtaskchatbot_manualchat_messate_ajaxProsessData'));

 add_action( 'wp_ajax_messagess',
                  array($this,'bdtaskchatbot_messagess'));
 add_action( 'wp_ajax_nopriv_messagess',
                  array($this,'bdtaskchatbot_messagess')); 

 add_action( 'wp_ajax_visitor_enter_message',
                  array($this,'bdtaskchatbot_visitor_enter_message'));
 add_action( 'wp_ajax_nopriv_visitor_enter_message',
                  array($this,'bdtaskchatbot_visitor_enter_message'));

add_action( 'wp_ajax_upload_files',array($this,'bdtaskchatbot_upload_files'));
add_action( 'wp_ajax_nopriv_upload_files',array($this,'bdtaskchatbot_upload_files'));


add_action( 'wp_ajax_logout',array($this,'bdtaskchatbot_logout'));
add_action( 'wp_ajax_nopriv_logout',array($this,'bdtaskchatbot_logout'));

add_action( 'wp_ajax_live_chat_emus',array($this,'bdtaskchatbot_live_chat_emus'));
add_action( 'wp_ajax_nopriv_live_chat_emus',array($this,'bdtaskchatbot_live_chat_emus'));



  }

  /**
   * Register the stylesheets for the public-facing side of the site.
   *
   * @since    1.0.0
   */
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


    wp_enqueue_style('bootstrap-min-css', plugin_dir_url( __FILE__ ) . 'assets/plugins/bootstrap/css/bootstrap.min.css', array(), $this->version, 'all' ); 

    wp_enqueue_style('fontawesome', plugin_dir_url( __FILE__ ) . 'assets/plugins/fontawesome/css/all.min.css', array(), $this->version, 'all' );  

    wp_enqueue_style('emojionearea-min-css', plugin_dir_url( __FILE__ ) . 'assets/plugins/emojionearea/dist/emojionearea.min.css', array(), $this->version, 'all' ); 

    wp_enqueue_style('chat-ui-css', plugin_dir_url( __FILE__ ) . 'assets/dist/css/chat-ui.css', array(), $this->version, 'all' ); 


    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bdtaskchatbot-public.css', array(), $this->version, 'all' );

  }

  /**
   * Register the JavaScript for the public-facing side of the site.
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


    wp_enqueue_script( 'popper-min-js',plugin_dir_url( __FILE__ ).'assets/dist/js/popper.min.js',array( 'jquery' ), $this->version,false  );
    wp_enqueue_script( 'bootstrap-min-js',plugin_dir_url( __FILE__ ).'assets/plugins/bootstrap/js/bootstrap.min.js',array( 'jquery' ), $this->version,true  );
    wp_enqueue_script( 'emojionearea-min-js',plugin_dir_url( __FILE__ ).'assets/plugins/emojionearea/dist/emojionearea.min.js',array( 'jquery' ), $this->version,false  );   

      remove_action('wp_head', 'print_emoji_detection_script', 7);
      remove_action('wp_print_styles', 'print_emoji_styles');
      remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
      remove_action( 'admin_print_styles', 'print_emoji_styles' );


      }

  public function bdtaskchatbot_quotations(){
         wp_enqueue_script( 'bdtaskchatbot_quotations', 
                        plugin_dir_url( __FILE__ ).'js/bdtask_log.js?v=50', 
                        array( 'jquery' ), $this->version, true ); 
         wp_localize_script( 'bdtaskchatbot_quotations', 
                        'object',
                         array(  'ajaxurl'  => admin_url( 'admin-ajax.php' ),
                                 'nonce'    => wp_create_nonce('randomnonce'),
                          )
                    );
    }

   public function bdtaskchatbot_professional_ajaxProsessData(){
  global $wpdb;
  session_start();
     
  //=================== nonce Security verified checked======================= 
    if(wp_verify_nonce($_POST['security'], 'randomnonce')){ 
  //=================== nonce Security verified checked=======================
  $name      =sanitize_text_field($_POST['vname']);
  $email     =sanitize_email($_POST['email']);
  $department=sanitize_text_field($_POST['department']);
  $phone     =sanitize_text_field($_POST['phone']);
  $from_url =sanitize_text_field($_POST['visit_url']);


$acronym = "";
if(!empty($name)){
    // Delimit by multiple spaces, hyphen, underscore, comma
    $words = preg_split("/[\s,_-]+/", $name);
    foreach ($words as $w) {
      $acronym .= ucfirst($w[0]);
    }
}


$fname = (!empty($words[0])?$words[0]:'');
$lname = (!empty($words[1])?$words[1]:'').(!empty($words[2])?' '.$words[2]:'');


// opareting system
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$os_platform  = "Unknown OS Platform";
$os_array     = array(
          '/windows nt 10/i'      =>  'Windows 10',
          '/windows nt 6.3/i'     =>  'Windows 8.1',
          '/windows nt 6.2/i'     =>  'Windows 8',
          '/windows nt 6.1/i'     =>  'Windows 7',
          '/windows nt 6.0/i'     =>  'Windows Vista',
          '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
          '/windows nt 5.1/i'     =>  'Windows XP',
          '/windows xp/i'         =>  'Windows XP',
          '/windows nt 5.0/i'     =>  'Windows 2000',
          '/windows me/i'         =>  'Windows ME',
          '/win98/i'              =>  'Windows 98',
          '/win95/i'              =>  'Windows 95',
          '/win16/i'              =>  'Windows 3.11',
          '/macintosh|mac os x/i' =>  'Mac OS X',
          '/mac_powerpc/i'        =>  'Mac OS 9',
          '/linux/i'              =>  'Linux',
          '/ubuntu/i'             =>  'Ubuntu',
          '/iphone/i'             =>  'iPhone',
          '/ipod/i'               =>  'iPod',
          '/ipad/i'               =>  'iPad',
          '/android/i'            =>  'Android',
          '/blackberry/i'         =>  'BlackBerry',
          '/webos/i'              =>  'Mobile'
    );

foreach ($os_array as $regex => $value){
if (preg_match($regex, $user_agent)){
    $os_platform = $value;

}
 }

// end function oparationg system


// start browser detect section 
$browser        = "Unknown Browser";
$browser_array = array(
            '/msie/i'      => 'Internet Explorer',
            '/firefox/i'   => 'Firefox',
            '/safari/i'    => 'Safari',
            '/chrome/i'    => 'Chrome',
            '/edge/i'      => 'Edge',
            '/opera/i'     => 'Opera',
            '/netscape/i'  => 'Netscape',
            '/maxthon/i'   => 'Maxthon',
            '/konqueror/i' => 'Konqueror',
            '/mobile/i'    => 'Handheld Browser'
     );
foreach ($browser_array as $regex => $value){
if (preg_match($regex, $user_agent)){
$browser = $value;
}
}

// mac address
if (preg_match('/linux/i', $agent)) {
  $mac = system('arp -an'); 
} else {
  $string=exec('getmac');
  $mac=substr($string, 0, 17); 
}

if (!empty($_SERVER['HTTP_CLIENT_IP'])){  //check ip from share internet
   $ip=$_SERVER['HTTP_CLIENT_IP'];
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){   //to check ip is pass from proxy
   $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}
else{
   $ip=$_SERVER['REMOTE_ADDR'];
}
// device type 
if (wp_is_mobile()) {
/* Include/display resources targeted to phones/tablets here */
   $device = 'Mobile';
} else {
/* Include/display resources targeted to laptops/desktops here */
   $device = 'PC';
}

$response = wp_remote_get( 'http://ip-api.com/json/'.$ip);
$info = json_decode(wp_remote_retrieve_body( $response ));

$visitorInfos = array(
'first_name'      =>sanitize_text_field($fname),
'last_name'       =>sanitize_text_field($lname),
'acronyms'        =>sanitize_text_field($acronym),
'email'           =>sanitize_email($email),
'phone'           =>sanitize_text_field($phone),
'from_url'        => sanitize_text_field($from_url),
'ip_address'      =>sanitize_text_field($ip),
'country'         =>sanitize_text_field($info->country),
'city'            =>sanitize_text_field($info->city),
'mac_address'     =>sanitize_text_field($mac),
'operating_system'=>sanitize_text_field($os_platform),
'time_zone'       =>sanitize_text_field($info->timezone),
'geo_long'        =>sanitize_text_field($info->lon),
'geo_lat'         =>sanitize_text_field($info->lat),
'visit_date'      => date("Y-m-d"),
'visit_time'      => date("h:i:s"),
'browser'         =>sanitize_text_field($browser),
'last_activity'   => date('Y-m-d h:i:s'),
'isOnline'        =>  1
);

$visitors=$wpdb->prefix .'bdtaskchatboard_visitors';      
$sql = "SELECT * FROM $visitors WHERE email='".$email."'";
$check_email = $wpdb->get_results( $sql  , OBJECT ) ;

if(!empty($check_email)){
  $visitorData = array(
      'isVisitor'     => true,
      'CHT_visitor_id'=>intval($check_email[0]->visitor_id),
      'full_name'     =>sanitize_text_field($check_email[0]->first_name).' '.sanitize_text_field($check_email[0]->last_name),
      'email'         => sanitize_text_field($check_email[0]->email),
      'CHT_department'=> sanitize_text_field($department),
      'phone'         => sanitize_text_field($check_email[0]->phone),
      'time_zone'     => sanitize_text_field($check_email[0]->time_zone),
  );


  $_SESSION['old'] = $visitorData;
  $status['last_activity'] = date('Y-m-d H:i:s');
  $status['isOnline'] = 1;
  $status=array(
   'last_activity'=>date('Y-m-d H:i:s'),
   'isOnline'=>1
  );
  $wpdb->update($visitors,$status,array('visitor_id' =>$check_email[0]->visitor_id));

  $history = array(

      'visitor_id'    => $check_email[0]->visitor_id,
      'login_time'    => date('Y-m-d h:i:s'),
      'visit_ip'      => $ip
  );

  $bdtaskchatboard_visitors_history= $wpdb->prefix .'bdtaskchatboard_visiting_history';
  $wpdb->insert($bdtaskchatboard_visitors_history,$history);

}else{
  if (preg_match('/bot|crawl|curl|dataprovider|search|get|spider|find|java|majesticsEO|google|yahoo|teoma|contaxe|yandex|libwww-perl|facebookexternalhit/i', $_SERVER['HTTP_USER_AGENT'])) {

  } else {   


$visitors=$wpdb->prefix .'bdtaskchatboard_visitors';
$add_new_department = $wpdb->insert($visitors, $visitorInfos);
if($add_new_department){
    $visitorId =$wpdb->insert_id;
    $visitorNewData = array(
        'isVisitor'     => true,
        'CHT_visitor_id'=>sanitize_text_field($visitorId),
        'full_name'     => sanitize_text_field($fname).' '.sanitize_text_field($lname),
        'CHT_department'=> sanitize_text_field($department),
        'email'         => sanitize_email($email),
        'phone'         => sanitize_text_field($phone),
        'time_zone'     => sanitize_text_field($info->timezone)
    );
    $_SESSION['myKey'] = $visitorNewData;
    
   }
}


}

$visitorDataff=$_SESSION['old'];
$value = $_SESSION['myKey'];
if($value){
$name=$_SESSION['myKey']['full_name'];
$department=$_SESSION['myKey']['CHT_department'];
$visitorId=$_SESSION['myKey']['CHT_visitor_id'];
}
if($visitorDataff){
$name=$_SESSION['old']['full_name'];
$department=$_SESSION['old']['CHT_department'];
$visitorId=$_SESSION['old']['CHT_visitor_id'];
}


$table_department_mapping= $wpdb->prefix .'bdtaskchatboard_department_mapping';
$users_tble= $wpdb->prefix .'users';
$sql = "SELECT * FROM $table_department_mapping WHERE department_id='".$department."'";
$user_id = $wpdb->get_results( $sql  , OBJECT ) ;
$user = array();
foreach ($user_id as $key => $values) {
$id_array=$values->user_id;
$users_query = "SELECT * FROM $users_tble WHERE ID='".$id_array."'";
$user_name = $wpdb->get_results($users_query, OBJECT ) ;
$user[]=$user_name[0];
}
?>

  <table class="table table-borded" id="table_hide">
  <tbody>
      <?php 
      $i=1;
      foreach ($user as $key => $value) {
         $idd=get_user_meta ($value->ID,'bdtaskchatbot_onlive',true);
       if ($idd==1) {
	
      ?>
      <tr>
          <td><i class="fa fa-circle text-success"></i>  <?php echo esc_html($value->user_nicename); ?></td>
          <td style="float: right;">
              <a href="#" id="uname" data-id="<?php echo $value->ID; ?>" onclick="start_chat_with_admin(<?php echo $value->ID; ?>)" class="btn-custom btn-success"><?php echo esc_html('Chat Now','bdtaskchatbot');?></a>
          </td>
      </tr>
      <?php
        }else{
       ?>
       <tr>
          <td><i class="fa fa-circle text-warning"></i>  <?php echo esc_html($value->user_nicename); ?></td>
          <td style="float: right;">
              <a href="#" id="uname" data-id="<?php echo $value->ID; ?>" onclick="start_chat_with_admin(<?php echo $value->ID; ?>)" class="btn-custom btn-success"><?php echo esc_html('Chat Now','bdtaskchatbot');?></a>
          </td>
      </tr>
      <?php  
      }
      $i++;
        }
      ?>
  </tbody>
</table>
<?php 

}else{
  echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
}


wp_die();   

}

// type status

function bdtaskchatbot_live_chat_emus(){
 global $wpdb;
//=================== nonce Security verified checked======================= 
 if(wp_verify_nonce($_POST['security'], 'randomnonce')){ 
//=================== nonce Security verified checked=======================
$bdtaskchatboard_visitors =$wpdb->prefix .'bdtaskchatboard_visitors';
$live_chat_emu=sanitize_text_field($_POST['is_type']);
if($_SESSION['myKey']){
$visitor_ids=$_SESSION['myKey']['CHT_visitor_id'];
}
if($_SESSION['old']){
$visitor_ids=$_SESSION['old']['CHT_visitor_id'];
}
$live_emu = array(
'is_type'=>sanitize_text_field($live_chat_emu),
);

$dfasdf=$wpdb->update($bdtaskchatboard_visitors,$live_emu,array('visitor_id' =>$visitor_ids)); 
}else{

   echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
}
die();    
}


function bdtaskchatbot_welcomechat_ajaxProsessData(){
 global $wpdb;
   //=================== nonce Security verified checked======================= 
    if(wp_verify_nonce($_POST['security'], 'randomnonce')){ 
  //=================== nonce Security verified checked=======================
 $id=intval($_POST['user']);

 $_SESSION['user_id']=$id;

 $users_tble= $wpdb->prefix .'users';
 $bdtaskchatboard_intents= $wpdb->prefix .'bdtaskchatboard_intents';
 $bdtaskchatboard_answer_bank= $wpdb->prefix .'bdtaskchatboard_answer_bank';
 $chat_history= $wpdb->prefix .'bdtaskchatboard_chat_history';

$users_query = "SELECT * FROM $users_tble WHERE ID='".$id."'";
$user_name = $wpdb->get_results($users_query, OBJECT ) ;
$_SESSION['user_name']=$user_name;


$table_department_mapping= $wpdb->prefix .'bdtaskchatboard_department_mapping';
$sql = "SELECT * FROM $table_department_mapping WHERE user_id='".$id."'";
$department_id = $wpdb->get_results( $sql  , OBJECT ) ;


$sql = "SELECT * FROM $bdtaskchatboard_intents WHERE intent_type=2 AND department_id='".$department_id[0]->department_id."'";
$intent= $wpdb->get_results( $sql  , OBJECT ) ;

// get intent name 
$sql = "SELECT * FROM $bdtaskchatboard_answer_bank WHERE intent_id='".$intent[0]->intent_id."'";
 $intents= $wpdb->get_results( $sql  , OBJECT ) ;
?>
<div class="message">
<div class="custom_avatar text-white rounded-circle">
  <?php 
  $name =$_SESSION['user_name'][0]->user_nicename;
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
    <div class="text-main">
      <div class="text-group">
        <div class="text"><p>
        <?php 
         $max = count($intents);
         $randpos = rand(0, $max-1);
         echo $intents[$randpos]->answer_text;

        ?>
        </p>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
 jQuery('#head_line_title').html('<?= $_SESSION['user_name'][0]->user_nicename?>'); 
</script>
<?php 
if($_SESSION['old']){
$visitorId=$_SESSION['old']['CHT_visitor_id'];
$old_info = "SELECT * FROM  $chat_history WHERE user_id=$id and visitor_id=$visitorId ORDER BY chat_id ASC";
$old_information = $wpdb->get_results($old_info, OBJECT ) ;
foreach ($old_information as $key => $value) {
    if($value->action_type==2){
?>

<div class="message me">
    <div class="text-main">
    <span>
      <?php 
      if($_SESSION['old']){
      $bd=$_SESSION['old']['time_zone'];
      }
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
      ?></span>
      <div class="text-group me">
        <div class="text me">
        <?php if(!empty($value->message)){?>
          <p>
        <?php  echo $value->message;?>
        </p>
      <?php }else{
     $pathinfo = pathinfo($value->attach_file);
         $file_name=$pathinfo['filename'].'.'.$pathinfo['extension'];
          // file size
          $size=get_headers($value->attach_file, 1);
          $file_size=size_format( $size['Content-Length'], $decimals = 2 )
          ?>
          <div class="attachment" style="height: 42px;">
            <button class="btn attach"><i class="fas fa-arrow-circle-down"></i></button>
            <div class="file">
                <h5><a href="<?php echo $value->attach_file ;?>" download><?php echo esc_html($file_name); ?></a></h5>
                <span><?php echo esc_html($file_size). esc_html(' Document','bdtaskchatbot');?></span>
            </div>
        </div>
    <?php }?>
      </div>
    </div>
  </div>
</div>
<?php }else{?>

<div class="message">
<div class="custom_avatar text-white rounded-circle">
  <?php 
  $name= $_SESSION['user_name'][0]->user_nicename;
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
    <div class="text-main">
    <span><?php 
      if($_SESSION['old']){
      $bd=$_SESSION['old']['time_zone'];
      }
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
    ?></span>
      <div class="text-group">
        <div class="text">
      <?php if(!empty($value->message)){?>
          <p><?php echo $value->message;?></p>
       <?php }else{ 
        $pathinfo = pathinfo($value->attach_file);
               $file_name=$pathinfo['filename'].'.'.$pathinfo['extension'];
                // file size
                $size=get_headers($value->attach_file, 1);
                $file_size=size_format( $size['Content-Length'], $decimals = 2 )
                ?>
                <div class="attachment" style="height: 42px;">
                  <button class="btn attach" style="background: #fff;color: #37a000;"><i class="fas fa-arrow-circle-down"></i></button>
                  <div class="file">
                      <h5><a href="<?php echo $value->attach_file ;?>" download><?php echo esc_html($file_name) ; ?></a></h5>
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
$bdtaskchatboard_chatbox =$wpdb->prefix .'bdtaskchatboard_chatbox';
$sql="SELECT * FROM $bdtaskchatboard_chatbox WHERE visitor_id='".$visitorId."' and user_id='".$id."'";
$asdfasdf= $wpdb->get_row($sql, OBJECT ) ;

if($asdfasdf->agent_typing=='yes'){
?>
<div class="message">
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
<div class="text-main">
    <div class="text-group">
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
 

}
}else{

   echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
}

 die(); 
    
}


// front end message chat 

function bdtaskchatbot_manualchat_messate_ajaxProsessData(){
global $wpdb;
//=================== nonce Security verified checked======================= 
   if(wp_verify_nonce($_POST['security'], 'randomnonce')){ 
  //=================== nonce Security verified checked======================= 
if($_SESSION['myKey']){
$department=$_SESSION['myKey']['CHT_department'];
$visitorId=$_SESSION['myKey']['CHT_visitor_id'];
}if($_SESSION['old']){
  $department=$_SESSION['old']['CHT_department'];
  $visitorId=$_SESSION['old']['CHT_visitor_id'];
}


$user_id=$_SESSION['user_id'];
$message=sanitize_text_field($_POST['message']);
    $visitorText = array(
      'visitor_id'   => intval($visitorId),
      'message'      => sanitize_text_field($message),
      'department_id'=> sanitize_text_field($department),
      'chat_date'    => date('Y-m-d'),
      'chat_date_time'=> date('Y-m-d h:i:s'),
      'user_id'      =>intval($user_id),
      'action_type'  => 2,
      'status'  => 1
    );

// insert visitor text
$chat_history =$wpdb->prefix .'bdtaskchatboard_chat_history';
$bdtaskchatboard_visitors =$wpdb->prefix .'bdtaskchatboard_visitors';
$add_new_department = $wpdb->insert($chat_history, $visitorText);
}else{

  echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
}
die();
}
// enter message 
function bdtaskchatbot_visitor_enter_message(){
global $wpdb;

//=================== nonce Security verified checked======================= 
  if(wp_verify_nonce($_POST['security'], 'randomnonce')){ 
//=================== nonce Security verified checked======================= 
if($_SESSION['myKey']){
$department=$_SESSION['myKey']['CHT_department'];
$visitorId=$_SESSION['myKey']['CHT_visitor_id'];
}if($_SESSION['old']){
  $department=$_SESSION['old']['CHT_department'];
  $visitorId=$_SESSION['old']['CHT_visitor_id'];
}

$user_id=$_SESSION['user_id'];

$message=sanitize_text_field($_POST['data']);

    $visitorText = array(
      'visitor_id'   => intval($visitorId),
      'message'      => sanitize_text_field($message),
      'department_id'=> sanitize_text_field($department),
      'chat_date'    => date('Y-m-d'),
      'chat_date_time'=> date('Y-m-d h:i:s'),
      'user_id'      => intval($user_id),
      'action_type'  => 2,
      'status'  => 1
    );
// insert visitor text
$chat_history =$wpdb->prefix .'bdtaskchatboard_chat_history';
$bdtaskchatboard_visitors =$wpdb->prefix .'bdtaskchatboard_visitors';
$add_new_department = $wpdb->insert($chat_history, $visitorText);
}else{
  echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
}
die();
}
public function bdtaskchatbot_upload_files(){
global $wpdb;
$user_id=$_SESSION['user_id'];
$upload = wp_upload_bits($_FILES["file"]["name"], null, file_get_contents($_FILES["file"]["tmp_name"]));

if($_SESSION['myKey']){
$department=$_SESSION['myKey']['CHT_department'];
$visitorId=$_SESSION['myKey']['CHT_visitor_id'];
}if($_SESSION['old']){
  $department=$_SESSION['old']['CHT_department'];
  $visitorId=$_SESSION['old']['CHT_visitor_id'];
}
$data=sanitize_text_field($_POST['data']);

$chat_history  =$wpdb->prefix .'bdtaskchatboard_chat_history';
$visitorText = array(
      'visitor_id'   => intval($visitorId),
      'attach_file'  =>sanitize_text_field($upload['url']),
      'department_id'=> sanitize_text_field($department),
      'chat_date'    => date('Y-m-d'),
      'chat_date_time'=> date('Y-m-d h:i:s'),
      'user_id'      =>intval($user_id),
      'action_type'  =>2,
      'status'  => 1,
      'isNotify'  =>0
);

$add_new_department = $wpdb->insert($chat_history, $visitorText);

die();
}


public function bdtaskchatbot_messagess(){
global $wpdb;
$user_id=$_SESSION['user_id'];
//=================== nonce Security verified checked======================= 
  if(wp_verify_nonce($_POST['security'], 'randomnonce')){ 
//=================== nonce Security verified checked======================= 

if($_SESSION['myKey']){
    $department=$_SESSION['myKey']['CHT_department'];
    $visitorId=$_SESSION['myKey']['CHT_visitor_id'];
}if($_SESSION['old']){
    $department=$_SESSION['old']['CHT_department'];
    $visitorId=$_SESSION['old']['CHT_visitor_id'];
}

$chat_history =$wpdb->prefix .'bdtaskchatboard_chat_history';
$bdtaskchatboard_visitors =$wpdb->prefix .'bdtaskchatboard_visitors';
$sql = "SELECT * FROM $chat_history WHERE user_id=$user_id and  visitor_id='".$visitorId."' ORDER BY chat_id ASC";
$chat_intormation= $wpdb->get_results( $sql  , OBJECT ) ;
// visitor name 
$sql = "SELECT * FROM $bdtaskchatboard_visitors WHERE visitor_id='".$visitorId."' ";
$visitor_name= $wpdb->get_results( $sql  , OBJECT ) ;
foreach ($chat_intormation as $key => $value) {
if($value->action_type==2){?>
<div class="message me">
  <div class="text-main">
  <span>
 <?php 
    if($_SESSION['old']){
      $bd=$_SESSION['old']['time_zone'];
    }if($_SESSION['myKey']){
       $bd=$_SESSION['myKey']['time_zone'];
    }
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
  </span>
    <div class="text-group me">
      <div class="text me">
      <?php if(!empty($value->message)){?>
      <p><?php echo $value->message?></p>
    <?php }else{
     $pathinfo = pathinfo($value->attach_file);
         $file_name=$pathinfo['filename'].'.'.$pathinfo['extension'];
          // file size
          $size=get_headers($value->attach_file, 1);
          $file_size=size_format( $size['Content-Length'], $decimals = 2 )
          ?>
          <div class="attachment" style="height: 42px;">
            <button class="btn attach"><i class="fas fa-arrow-circle-down"></i></button>
            <div class="file">
                <h5><a href="<?php echo $value->attach_file ;?>" download><?php echo esc_html($file_name); ?></a></h5>
                <span><?php echo esc_html($file_size). esc_html(' Document','bdtaskchatbot');?></span>
            </div>
        </div>
    <?php }?>
      </div>
    </div>
  </div>
</div>
<?php }else{?>
<div class="message">
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
  <div class="text-main">
  <span>
 <?php 
  if($_SESSION['old']){
    $bd=$_SESSION['old']['time_zone'];
  }if($_SESSION['myKey']){
     $bd=$_SESSION['myKey']['time_zone'];
  }
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
  </span>
    <div class="text-group">
      <div class="text">
      <?php if(!empty($value->message)){?>
        <p><?php echo $value->message?></p>
        <?php }else{ 
        $pathinfo = pathinfo($value->attach_file);
               $file_name=$pathinfo['filename'].'.'.$pathinfo['extension'];
                // file size
                $size=get_headers($value->attach_file, 1);
                $file_size=size_format( $size['Content-Length'], $decimals = 2 )
                ?>
                <div class="attachment" style="height: 42px;">
                  <button class="btn attach" style="background: #fff;color: #37a000;">
                    <i class="fas fa-arrow-circle-down"></i></button>
                  <div class="file">
                      <h5><a href="<?php echo $value->attach_file ;?>" download><?php echo esc_html($file_name) ; ?></a></h5>
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

$bdtaskchatboard_chatbox =$wpdb->prefix .'bdtaskchatboard_chatbox';
$sql="SELECT * FROM $bdtaskchatboard_chatbox WHERE visitor_id='".$visitorId."' and user_id='".$user_id."'";
$asdfasdf= $wpdb->get_row($sql, OBJECT ) ;

if($asdfasdf->agent_typing=='yes'){
?>
<div class="message">
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
<div class="text-main">
    <div class="text-group">
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


public function bdtaskchatbot_logout(){
global $wpdb;
//=================== nonce Security verified checked======================= 
  if(wp_verify_nonce($_POST['security'], 'randomnonce')){ 
//=================== nonce Security verified checked======================= 
$bdtaskchatboard_visitors =$wpdb->prefix .'bdtaskchatboard_visitors';
 if($_SESSION['old']){
  $data=array(           
        'isOnline'=>'0',      
   );
  $visitor_id=$_SESSION['old']['CHT_visitor_id'];
  $update_visitor_status =$wpdb->update($bdtaskchatboard_visitors,$data,array('visitor_id' =>$visitor_id));
  unset($_SESSION["old"]);
}

if($_SESSION['myKey']){
  $data=array(           
        'isOnline'=>'0',      
   );
  $visitor_id=$_SESSION['myKey']['CHT_visitor_id'];

  $update_department =$wpdb->update($bdtaskchatboard_visitors,$data,array('visitor_id' =>$visitor_id));
  unset($_SESSION["myKey"]);
}
}else{
  echo esc_html("Your Ajax nonce not verifyed!","bdtaskchatbot");
}
die();
}
public function bdtaskchatbot_shortcode_register(){
          add_shortcode('bdtaskchatbot',array($this,'quickview'));
    }
    
public function quickview(){
global $pagenow , $wpdb,$intentssss;
// Start the session
ob_start();
?>
<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>


<?php 
//================old visitor===================
// ================================================
// ================================================
if(@$_SESSION['old']){
$name=@$_SESSION['old']['full_name'];
$department=@$_SESSION['old']['CHT_department'];
$visitorId=@$_SESSION['old']['CHT_visitor_id'];
$table_department_mapping= $wpdb->prefix .'bdtaskchatboard_department_mapping';
$users_tble= $wpdb->prefix .'users';

$sql = "SELECT * FROM $table_department_mapping WHERE department_id='".$department."'";
$user_id = $wpdb->get_results( $sql  , OBJECT ) ;
$user = array();
foreach ($user_id as $key => $values) {
$id_array=$values->user_id;
$users_query = "SELECT * FROM $users_tble WHERE ID='".$id_array."'";
$user_name = $wpdb->get_results($users_query, OBJECT ) ;
$user[]=$user_name[0];
}
?>
 
        <div class="bd-live-chat" id="user_panel">
            
            <header class="chat-header d-flex align-items-center justify-content-between" style="background: #008000;">
                <h4  id="head_line_title">
                  <?php echo esc_html('Talk to us','bdtaskchatbot');?></h4>
                <div class="d-flex">
                    <div class="dropdown chat-settings">
                        <button class="btn" data-toggle="dropdown" aria-haspopup="true"><i class="fas fa-cog"></i></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item full_name"><?php echo esc_html($name);?></a>
                            <a href="#"  class="dropdown-item" onclick="logout_info()"><i class="fas fa-power-off"></i><?php echo esc_html('Logout','bdtaskchatbot');?></a>
                        </div>
                    </div>
                    <a href="#" class="btn chat-close"><i class="fas fa-times"></i></a>
                    <a href="#" class="btn chat-toggle">
                        <i class="fas fa-chevron-up"></i>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                  
                </div>
            </header>
            <div class="bd-chat">
                <div class="bd-message-content">
                    <div class="position-relative">
                          <table class="table table-borded" id="table_hide">
                        <tbody>
                            <?php 
                            $i=1;
                            foreach ($user as $key => $value) {
                             $idf=get_user_meta ($value->ID,'bdtaskchatbot_onlive',true);
                             if ($idf==1) {
                            ?>
                            <tr>
                                <td><i class="fa fa-circle text-success"></i>  <?php echo esc_html($value->user_nicename); ?></td>
                                <td style="float: right;">
                                    <a href="#" id="uname" data-id="<?php echo $value->ID; ?>" onclick="start_chat_with_admin(<?php echo $value->ID; ?>)" class="btn-custom btn-success"><?php echo esc_html('Chat Now','bdtaskchatbot');?></a>
                                </td>
                            </tr>
                            <?php }else{?>
                            <tr>
                                <td><i class="fa fa-circle text-warning"></i>  <?php echo esc_html($value->user_nicename); ?></td>
                                <td style="float: right;">
                                    <a href="#" id="uname" data-id="<?php echo $value->ID; ?>" onclick="start_chat_with_admin(<?php echo $value->ID; ?>)" class="btn-custom btn-success"><?php echo esc_html('Chat Now','bdtaskchatbot');?></a>
                                </td>
                            </tr>
                            <?php }  $i++;}?>
                        </tbody>
                    </table>
                   
                      <div id="chat-text-message"></div> 
                      <div id="div_result"></div>
                    </div>
                </div>
                <div class="chat-area-bottom d-flex align-items-center" id="chatmessage" style="display: none!important;">
                    <form class="position-relative w-100">
                        <input class="form-control emojionearea" placeholder="Type a message here...">
                       
                        <button type="submit" class="btn send"><i class="fab fa-telegram-plane"></i></button>
                    </form>
                    <label>
                        <input type="file">
                        <span class="btn attach d-sm-block d-none"><i class="fas fa-paperclip"></i></span>
                    </label> 
                </div>
        
            </div>
        </div>
<?php 
//================old visitor===================
// ================================================
// ================================================

 if(@$_SESSION['user_id']){
  $id=@$_SESSION['user_id'];
  $users_tble= $wpdb->prefix .'users';
  $bdtaskchatboard_intents= $wpdb->prefix .'bdtaskchatboard_intents';
  $bdtaskchatboard_answer_bank= $wpdb->prefix .'bdtaskchatboard_answer_bank';



  $users_query = "SELECT * FROM $users_tble WHERE ID='".$id."'";
  $user_name = $wpdb->get_results($users_query, OBJECT ) ;
  $_SESSION['user_name']=$user_name;

  $table_department_mapping= $wpdb->prefix .'bdtaskchatboard_department_mapping';

  $sql = "SELECT * FROM $table_department_mapping WHERE user_id='".$id."'";
  $department_id = $wpdb->get_results( $sql  , OBJECT ) ;


$sqlss = "SELECT * FROM $bdtaskchatboard_intents WHERE intent_type=2 AND department_id='".$department_id[0]->department_id."'";
$intent= $wpdb->get_results( $sqlss  , OBJECT ) ;

  // vistior message
  /// insert visitor text
  $visitorId=$_SESSION['old']['CHT_visitor_id'];
  $chat_history =$wpdb->prefix .'bdtaskchatboard_chat_history';
  $bdtaskchatboard_visitors =$wpdb->prefix .'bdtaskchatboard_visitors';
  $sql = "SELECT * FROM $chat_history WHERE user_id=$id and visitor_id='".$visitorId."'";
  $chat_intormation= $wpdb->get_results( $sql  , OBJECT ) ;
  // visitor name 
  $sql = "SELECT * FROM $bdtaskchatboard_visitors WHERE visitor_id='".$visitorId."'";
  $visitor_name= $wpdb->get_results( $sql  , OBJECT ) ;
?>
<div class="bd-live-chat" id="user_panel">
            
            <header class="chat-header d-flex align-items-center justify-content-between" style="background: #008000;">
                <h4  id="head_line_title">
                 <?php echo esc_html($_SESSION['user_name'][0]->user_nicename); ?>
                </h4>
                <div class="d-flex">
                    <div class="dropdown chat-settings">
                        <button class="btn" data-toggle="dropdown" aria-haspopup="true"><i class="fas fa-cog"></i></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item full_name"><?php echo esc_html($name);?></a>
                            <a href="#" class="dropdown-item" id="logout_infos" onclick="logout_info()"><i class="fas fa-power-off"></i><?php echo esc_html('Logout');?></a>
                        </div>
                    </div>
                    <a href="#" class="btn chat-close"><i class="fas fa-times"></i></a>
                    <a href="#" class="btn chat-toggle">
                        <i class="fas fa-chevron-up"></i>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                  
                </div>
            </header>
            <div class="bd-chat">
                <div class="bd-message-content" id="out">
                    <div class="position-relative">
                    <?php 

                     $sql = "SELECT * FROM $bdtaskchatboard_answer_bank WHERE intent_id='".$intent[0]->intent_id."'";
                     $intents= $wpdb->get_results( $sql  , OBJECT ) ;
                    ?>
                      <div id="chat-text-message">
                          <div class="message">
                            <div class="custom_avatar text-white rounded-circle">
                              <?php echo esc_html($_SESSION['user_name'][0]->user_nicename);?>
                            </div>
                            <div class="text-main">
                             
                                <div class="text-group">
                                  <div class="text">
                                    <p><?php $max = count($intents);
                                      $randpos = rand(0, $max-1);
                                      echo $intents[$randpos]->answer_text;?>
                                      </p>
                                </div>
                              </div>
                            </div>
                          </div>


                      </div> 

                     <div id="chat-text-messaged"></div>
                        <div id="message_show"></div>
                    </div>
                </div>
                <div class="chat-area-bottom d-flex align-items-center" id="chatmessage" >
                    <form class="position-relative w-100 enterValues" id="formmsg">
                        <input class="form-control emojionearea messageChats" placeholder="Type a message here..." id="message">
                       
                        <button type="submit" class="btn send"><i class="fab fa-telegram-plane"></i></button>
                    </form>

                   
                  <form method="post" enctype="multipart/form-data">
                  <label>
                        <input type="file" id="filesss">
                        <span class="btn attach d-sm-block d-none" id="upload"><i class="fas fa-paperclip"></i></span>
                  </label> 
                </form> 
                </div>
        
            </div>
        </div>

<script type="text/javascript">
jQuery(document).ready(function () {
    "use strict";
    setTimeout(function () {
       jQuery('#out')[0].scrollTop = jQuery('#out')[0].scrollHeight;
    }, 5000);
   
});
 jQuery('#user_panel').hide();
</script>
<?php 
}

//==================================================================================
// ==========================new visitor============================================
//==================================================================================
}elseif(!empty($_SESSION['myKey'])){
$name=$_SESSION['myKey']['full_name'];
$department=$_SESSION['myKey']['CHT_department'];
$visitorId=$_SESSION['myKey']['CHT_visitor_id'];


$table_department_mapping= $wpdb->prefix .'bdtaskchatboard_department_mapping';

$users_tble= $wpdb->prefix .'users';

$sql = "SELECT * FROM $table_department_mapping WHERE department_id='".$department."'";
$user_id = $wpdb->get_results( $sql  , OBJECT ) ;
$user = array();
foreach ($user_id as $key => $values) {
$id_array=$values->user_id;
$users_query = "SELECT * FROM $users_tble WHERE ID='".$id_array."'";
$user_name = $wpdb->get_results($users_query, OBJECT ) ;
$user[]=$user_name[0];
}

?>
        <div class="bd-live-chat" id="user_panel">
            
            <header class="chat-header d-flex align-items-center justify-content-between" style="background:#008000;">
                <h4  id="head_line_title">
                  <?php echo esc_html('Talk to us','bdtaskchatbot');?></h4>
                <div class="d-flex">
                    <div class="dropdown chat-settings">
                        <button class="btn" data-toggle="dropdown" aria-haspopup="true"><i class="fas fa-cog"></i></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item full_name"><?php echo esc_html($name);?></a>
                            <a href="#" class="dropdown-item" id="logout_infos" onclick="logout_info()" ><i class="fas fa-power-off"></i><?php echo esc_html('Logout');?></a>
                        </div>
                    </div>
                    <a href="#" class="btn chat-close"><i class="fas fa-times"></i></a>
                    <a href="#" class="btn chat-toggle">
                        <i class="fas fa-chevron-up"></i>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                  
                </div>
            </header>
            <div class="bd-chat">
                <div class="bd-message-content" >
                    <div class="position-relative">
                          <table class="table table-borded" id="table_hide">
                        <tbody>
                            <?php 
                            $i=1;
                            foreach ($user as $key => $value) {
                             $iddf=get_user_meta ($value->ID,'bdtaskchatbot_onlive',true);
                             if ($iddf==1) {
                            ?>
                            <tr>
                                <td><i class="fa fa-circle text-success"></i>  <?php echo esc_html($value->user_nicename); ?></td>
                                <td style="float: right;">
                                    <a href="#" id="uname" data-id="<?php echo $value->ID; ?>" onclick="start_chat_with_admin(<?php echo $value->ID; ?>)" class="btn-custom btn-success"><?php echo esc_html('Chat Now','bdtaskchatbot');?></a>
                                </td>
                            </tr>
                            <?php }else{?>
                            <tr>
                                <td><i class="fa fa-circle text-warning"></i>  <?php echo esc_html($value->user_nicename); ?></td>
                                <td style="float: right;">
                                    <a href="#" id="uname" data-id="<?php echo $value->ID; ?>" onclick="start_chat_with_admin(<?php echo $value->ID; ?>)" class="btn-custom btn-success"><?php echo esc_html('Chat Now','bdtaskchatbot');?></a>
                                </td>
                            </tr>
                            <?php
                                }
                            $i++;
                              }
                            ?>
                        </tbody>
                    </table>
                   
                      <div id="chat-text-message"></div> 
                    </div>
                </div>
                <div class="chat-area-bottom d-flex align-items-center" id="chatmessage" style="display: none!important;">
                    <form class="position-relative w-100">
                        <input class="form-control emojionearea" placeholder="Type a message here...">
                       
                        <button type="submit" class="btn send"><i class="fab fa-telegram-plane"></i></button>
                    </form>
                    <label>
                        <input type="file">
                        <span class="btn attach d-sm-block d-none"><i class="fas fa-paperclip"></i></span>
                    </label> 
                </div>
        
            </div>
        </div>


<?php 
 if(@$_SESSION['user_id']){

 $id=@$_SESSION['user_id'];
 $users_tble= $wpdb->prefix .'users';
 $bdtaskchatboard_intents= $wpdb->prefix .'bdtaskchatboard_intents';
 $bdtaskchatboard_answer_bank= $wpdb->prefix .'bdtaskchatboard_answer_bank';



$users_query = "SELECT * FROM $users_tble WHERE ID='".$id."'";
$user_name = $wpdb->get_results($users_query, OBJECT ) ;
$_SESSION['user_name']=$user_name;

$table_department_mapping= $wpdb->prefix .'bdtaskchatboard_department_mapping';

$sql = "SELECT * FROM $table_department_mapping WHERE user_id='".$id."'";
$department_id = $wpdb->get_results( $sql  , OBJECT ) ;


// department wise intent collect 
$sqls = "SELECT * FROM $bdtaskchatboard_intents WHERE intent_type=2 AND department_id='".$department_id[0]->department_id."'";
$intent= $wpdb->get_results( $sqls  , OBJECT ) ;

// vistior message
/// insert visitor text
$visitorId=$_SESSION['myKey']['CHT_visitor_id'];
$chat_history =$wpdb->prefix .'bdtaskchatboard_chat_history';
$bdtaskchatboard_visitors =$wpdb->prefix .'bdtaskchatboard_visitors';

$sql = "SELECT * FROM $chat_history WHERE user_id=$id and visitor_id='".$visitorId."'";
$chat_intormation= $wpdb->get_results( $sql  , OBJECT ) ;
// visitor name 
$sql = "SELECT * FROM $bdtaskchatboard_visitors WHERE visitor_id='".$visitorId."'";
$visitor_name= $wpdb->get_results( $sql  , OBJECT ) ;
?>
<div class="bd-live-chat" id="user_panel">
            
            <header class="chat-header d-flex align-items-center justify-content-between" style="background: #008000;">
                <h4  id="head_line_title">
                 <?php echo esc_html($_SESSION['user_name'][0]->user_nicename); ?>
                </h4>
                <div class="d-flex">
                    <div class="dropdown chat-settings">
                        <button class="btn" data-toggle="dropdown" aria-haspopup="true"><i class="fas fa-cog"></i></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item full_name"><?php echo esc_html($name);?></a>
                            <a href="#"  class="dropdown-item" id="logout_infod" onclick="logout_info()"><i class="fas fa-power-off"></i><?php echo esc_html('Logout','bdtaskchatbot');?></a>
                        </div>
                    </div>
                    <a href="#" class="btn chat-close"><i class="fas fa-times"></i></a>
                    <a href="#" class="btn chat-toggle">
                        <i class="fas fa-chevron-up"></i>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                  
                </div>
            </header>
            <div class="bd-chat">
                <div class="bd-message-content" id="out">
                    <div class="position-relative">
                      <?php 

                     $sql = "SELECT * FROM $bdtaskchatboard_answer_bank WHERE intent_id='".$intent[0]->intent_id."'";
                     $intents= $wpdb->get_results( $sql  , OBJECT ) ;
                    ?>
                      <div id="chat-text-message">
                          <div class="message">
                            <div class="custom_avatar text-white rounded-circle">
                              <?php echo $_SESSION['user_name'][0]->user_nicename;?>
                            </div>
                            <div class="text-main">
                              <div class="text-group">
                                <div class="text"><p><?php 
                                    $max = count($intents);
                                    $randpos = rand(0, $max-1);
                                    echo $intents[$randpos]->answer_text;?>
                                </p>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div> 
                     <div id="message_show"></div>
                     <div id="chat-text-message"></div>
                    </div>
                </div>
                <div class="chat-area-bottom d-flex align-items-center" id="chatmessage" >
       
                     <form class="position-relative w-100 enterValues" id="formmsg">
                        <input class="form-control emojionearea messageChats" placeholder="Type a message here..." id="message">
                       
                        <button type="submit" class="btn send"><i class="fab fa-telegram-plane"></i></button>
                    </form>

                <form method="post" enctype="multipart/form-data">
                  <label>
                        <input type="file" id="filesss">
                        <span class="btn attach d-sm-block d-none" id="upload"><i class="fas fa-paperclip"></i></span>
                  </label> 
                </form>
                </div>
        
            </div>
        </div>
        
   
        
<script type="text/javascript">
jQuery(document).ready(function () {
    "use strict";
 jQuery('.bd-message-content')[0].scrollTop = jQuery('.bd-message-content')[0].scrollHeight;
jQuery('#user_panel').hide();
});
</script>

<?php }  ?>
<?php }else{?>
<!-- login form -->

        <div class="bd-live-chat"  id="without_new_session">
            
            <header class="chat-header d-flex align-items-center justify-content-between" style="background: #008000;">
                <h4 id="head_line_title"><?php echo esc_html('Talk to us','bdtaskchatbot');?></h4>
                <div class="d-flex">
                    <div class="dropdown chat-settings">
                        <button class="btn" data-toggle="dropdown" aria-haspopup="true"><i class="fas fa-cog"></i></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item full_name"><?php echo esc_html($name);?></a>
                            <a href="#" class="dropdown-item" onclick="logout_info()" ><i class="fas fa-power-off"></i><?php echo esc_html('Logout','bdtaskchatbot');?></a>
                        </div>
                    </div>
                    <a href="#" class="btn chat-close"><i class="fas fa-times"></i></a>
                    <a href="#" class="btn chat-toggle">
                        <i class="fas fa-chevron-up"></i>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                  
                </div>
            </header>
            <div class="bd-chat">
                <div class="bd-message-content">
                    <div class="position-relative">
                        <div id="chat-text">
                            <div id="error"></div>
                            <input type="hidden" name="url" id="url" value="">
                            <div class="form-label1-group">
                            <select name="department" class="form-control txt-color" id="department" required="" autofocus="" autocomplete="off">
                            <option value="" selected="selected"><?php echo esc_html('Select Department','bdtaskchatbot');?></option>
                             <?php 
                              $table_department= $wpdb->prefix .'bdtaskchatboard_department';
                              $sql = "SELECT * FROM $table_department";
                              $department = $wpdb->get_results( $sql  , OBJECT ) ;
                              foreach ($department as  $value) {
                             ?>   
                            <option value="<?php echo  $value->department_id?>"><?php echo esc_html($value->department_name); ?></option>

                             <?php }?>
                            </select>
                             
                            </div>
                            <div class="form-label1-group">
                            <input type="text" class="form-control txt-color" placeholder="Full Name *" name="name" id="vname" required="">
                            </div>
                            <div class="form-label1-group">
                            <input type="email" id="email" class="form-control txt-color" placeholder="Email Address *" name="email" required="">
                            </div>


                            <div class="form-label1-group"> 
                            <input type="number" id="phone" class="form-control txt-color" placeholder="Mobile *" name="phone" required="">
                            </div>
                            <center>
                                <button  class="btn btn-success btn-login-custom font-weight-bold mb-2" id="v-submit" onclick="store_visitor_data()"><?php echo esc_html('Continue','bdtaskchatbot');?><i class="fa fa-arrow-right"></i></button>

                            </center>
                        </div>
                   
                        <div id="div_result"></div>
                        <!-- welcome_message -->
                        <div id="chat-text-message"></div>
                        <div id="message_show"></div>
                    </div>
                </div>
                <div class="chat-area-bottom d-flex align-items-center" id="chatmessage" style="display: none!important;">
                    <form class="position-relative w-100 enterValue" id="formmsgs">
                        <input class="form-control emojionearea messageChat" placeholder="Type a message here..." id="message">
                       
                        <button type="submit" class="btn send"><i class="fab fa-telegram-plane"></i></button>
                    </form>
                <form method="post" enctype="multipart/form-data">
                  <label>
                        <input type="file" id="filesss">
                        <span class="btn attach d-sm-block d-none" id="upload"><i class="fas fa-paperclip"></i></span>
                  </label> 
                </form>
                </div>
        
            </div>
        </div>


<script type="text/javascript">
// submit visitor information 
jQuery(document).ready(function () {
    "use strict";
var pageURL = jQuery(location).attr("href");
jQuery('#url').val(pageURL);
jQuery('.chat-settings').hide();
jQuery('#message_show').hide();
});
</script>

 <?php }?> 
      

<script>
jQuery(document).ready(function () {
    "use strict";
    setTimeout(function () {
        jQuery(".bd-chat").slideDown("slow");
    }, 3000);
    jQuery(".chat-toggle").on("click", function () {
        jQuery(".bd-chat").slideToggle(300, "swing");
        jQuery(this).toggleClass('open');
    });
    jQuery(".chat-close").on("click", function (e) {
        e.preventDefault();
        jQuery(".bd-live-chat").hide();
    });
});
//emojionearea
jQuery(".emojionearea").emojioneArea({
    pickerPosition: "top",
    tonesStyle: "radio"
});


// message reload 
jQuery(document).ready(function () {
    "use strict";
 jQuery('.bd-message-content')[0].scrollTop = jQuery('.bd-message-content')[0].scrollHeight;
          get_message();
     setInterval(function(){     
         get_message();
     }, 5000);
});

function get_message(){
     var ajaxurl = object.ajaxurl;
      data ={
          type: "get",
          action:'messagess',
          security :object.nonce
        };
      jQuery.post(ajaxurl,data, function(response) {
         // alert(response);
        jQuery("#message_show").html(response); 
        jQuery('.bd-message-content')[0].scrollTop = jQuery('.bd-message-content')[0].scrollHeight; 
    });   
  return false;
}






	

</script> 
  </body>
</html>

<?php 

    $output = ob_get_clean();
    return $output; 
    }









}