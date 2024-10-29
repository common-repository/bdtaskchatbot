<?php

/**
 * Fired during plugin activation
 *
 * @link       www.bdtask.com
 * @since      1.0.0
 *
 * @package    Bdtaskchatbot
 * @subpackage Bdtaskchatbot/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Bdtaskchatbot
 * @subpackage Bdtaskchatbot/includes
 * @author     bdtask <bdtask@gmail.com>
 */
class Bdtaskchatbot_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
                 
        global $wpdb ; 
        $charset_collate     = $wpdb->get_charset_collate();
        $table_department      = $wpdb->prefix .'bdtaskchatboard_department';
        $table_department_mapping       = $wpdb->prefix .'bdtaskchatboard_department_mapping';
        $table_intent     = $wpdb->prefix .'bdtaskchatboard_intents';
        $table_answer_bank = $wpdb->prefix .'bdtaskchatboard_answer_bank';
        $table_question_bank = $wpdb->prefix .'bdtaskchatboard_question_bank';
        $bdtaskchatboard_visitors = $wpdb->prefix .'bdtaskchatboard_visitors';
        $bdtaskchatboard_visitors_history= $wpdb->prefix .'bdtaskchatboard_visiting_history';
        $bdtaskchatboard_chat_history= $wpdb->prefix .'bdtaskchatboard_chat_history';
        $bdtaskchatboard_chat_color= $wpdb->prefix .'bdtaskchatboard_chat_color';
        $bdtaskchatboard_chatbox= $wpdb->prefix .'bdtaskchatboard_chatbox';
        $bdtaskchatboard_support= $wpdb->prefix .'bdtaskchatboard_support';

       
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

      /*============================ create table Client  =================================================================================*/

        $sql = ' ';
        $sql .= 'CREATE TABLE  IF NOT EXISTS  ';
        $sql .= $table_department;
        $sql .= '  (  ';
        $sql .= 'department_id   int(11)  AUTO_INCREMENT,  ';
        $sql .= 'department_name varchar(250)  NOT NULL,  ';
        $sql .= 'description     varchar(250) NOT NULL, ';
        $sql .= 'is_active       tinyint(1) NOT NULL, ';
        $sql .= 'created_by      int(11) NOT NULL, ';
        $sql .= 'create_date     date NOT NULL, ';
        $sql .= "updated_by      int(11) NOT NULL , ";
        $sql .= "update_date     date NOT NULL, ";
        $sql .= 'PRIMARY KEY (department_id)  ';
        $sql .= ' ) ';
        $sql .=  $charset_collate ; 
       
        $ct_category = (!$table_department =='' )?dbDelta($sql):'';

        // Department mapping
        
        $sql = ' ';
        $sql .= 'CREATE TABLE  IF NOT EXISTS  ';
        $sql .= $table_department_mapping;
        $sql .= '  (  ';
        $sql .= 'id   int(11)  AUTO_INCREMENT,  ';
        $sql .= 'user_id            int(11) NOT NULL, ';
        $sql .= 'department_id      int(11) NOT NULL, ';
        $sql .= 'PRIMARY KEY (id)  ';
        $sql .= ' ) ';
        $sql .=  $charset_collate ; 
       
        $ct_category = (!$table_department_mapping =='' )?dbDelta($sql):'';


        $sql = ' ';
        $sql .= 'CREATE TABLE  IF NOT EXISTS  ';
        $sql .= $table_intent;
        $sql .= '  (  ';
        $sql .= 'intent_id   int(11)  AUTO_INCREMENT,  ';
        $sql .= 'department_id       int(11) NOT NULL, ';
        $sql .= 'intent_name         varchar(150)  NOT NULL, ';
        $sql .= "intent_type         tinyint(1)  NOT NULL COMMENT ' 1=regular, 2=default and 0=fallback', ";
        $sql .= 'created_by          int(11)  NOT NULL, ';
        $sql .= 'created_date        date  NOT NULL, ';
        $sql .= 'PRIMARY KEY (intent_id)  ';
        $sql .= ' ) ';
        $sql .=  $charset_collate ; 
       
        $ct_category = (!$table_intent =='' )?dbDelta($sql):'';


        $sql = ' ';
        $sql .= 'CREATE TABLE  IF NOT EXISTS  ';
        $sql .= $table_question_bank;
        $sql .= '  (  ';
        $sql .= 'question_id         bigint(20)     AUTO_INCREMENT,  ';
        $sql .= 'question_text       text NOT NULL, ';
        $sql .= 'intent_id           int(11)  NOT NULL, ';
        $sql .= "department_id       int(11)  NOT NULL, ";
        $sql .= 'created_by          int(11)  NOT NULL, ';
        $sql .= 'created_date        date     NOT NULL, ';
        $sql .= 'updated_by          int(11)  NOT NULL, ';
        $sql .= 'update_date          date    NOT NULL, ';
        $sql .= 'PRIMARY KEY (question_id)  ';
        $sql .= ' ) ';
        $sql .=  $charset_collate ; 
       
        $ct_category = (!$table_question_bank =='' )?dbDelta($sql):'';
        

        $sql = ' ';
        $sql .= 'CREATE TABLE  IF NOT EXISTS  ';
        $sql .= $table_answer_bank;
        $sql .= '  (  ';
        $sql .= 'answer_id           bigint(20)   AUTO_INCREMENT,  ';
        $sql .= 'answer_text         text    NOT NULL, ';
        $sql .= 'intent_id           int(11) NOT NULL, ';
        $sql .= 'department_id       int(11) NOT NULL, ';
        $sql .= 'created_by          int(11)  NOT NULL, ';
        $sql .= 'created_date        date     NOT NULL, ';
        $sql .= 'updated_by          int(11)  NOT NULL, ';
        $sql .= 'update_date          date    NOT NULL, ';
        $sql .= 'PRIMARY KEY (answer_id)  ';
        $sql .= ' ) ';
        $sql .=  $charset_collate ; 
       
        $ct_category = (!$table_answer_bank =='' )?dbDelta($sql):'';        



        $sql = ' ';
        $sql .= 'CREATE TABLE  IF NOT EXISTS  ';
        $sql .= $bdtaskchatboard_visitors;
        $sql .= '  (  ';
        $sql .= 'visitor_id             int(11)   AUTO_INCREMENT,  ';
        $sql .= 'first_name         varchar(50)   NOT NULL, ';
        $sql .= 'last_name           varchar(50)  NOT NULL, ';
        $sql .= 'acronyms       varchar(4) NOT NULL, ';
        $sql .= 'email          varchar(50)  NOT NULL, ';
        $sql .= 'phone          varchar(20)     NOT NULL, ';
        $sql .= 'from_url          text  NOT NULL, ';
        $sql .= 'ip_address         varchar(50)   NOT NULL, ';
        $sql .= 'country           varchar(40)   NOT NULL, ';
        $sql .= 'city           varchar(30)   NOT NULL, ';
        $sql .= 'mac_address           varchar(50)   NOT NULL, ';
        $sql .= 'operating_system    varchar(50)   NOT NULL, ';
        $sql .= 'browser    varchar(50)   NOT NULL, ';
        $sql .= 'device_type    varchar(20)   NOT NULL, ';
        $sql .= 'image    varchar(255)  NOT NULL, ';
        $sql .= 'time_zone    varchar(50)  NOT NULL, ';
        $sql .= 'geo_long   float  NOT NULL, ';
        $sql .= 'geo_lat   float  NOT NULL, ';
        $sql .= 'visit_date   date  NOT NULL, ';
        $sql .= 'visit_time   time  NOT NULL, ';
        $sql .= 'auto_bot   tinyint(1)  NOT NULL, ';
        $sql .= 'last_activity  datetime  NOT NULL, ';
        $sql .= 'is_type  text  NOT NULL, ';
        $sql .= 'isConvert      tinyint(1)  NOT NULL, ';
        $sql .= 'default_sms tinyint(1)  NOT NULL, ';
        $sql .= 'isOnline tinyint(1)  NOT NULL, ';
        $sql .= 'status tinyint(1)  NOT NULL, ';
        $sql .= 'PRIMARY KEY (visitor_id)  ';
        $sql .= ' ) ';
        $sql .=  $charset_collate ; 
       
        $ct_category = (!$bdtaskchatboard_visitors =='' )?dbDelta($sql):'';


    
    
        $sql = ' ';
        $sql .= 'CREATE TABLE  IF NOT EXISTS  ';
        $sql .= $bdtaskchatboard_visitors_history;
        $sql .= '  (  ';
        $sql .= 'id   bigint(20)  AUTO_INCREMENT,  ';
        $sql .= 'visitor_id            int(11) NOT NULL, ';
        $sql .= 'login_time      datetime NOT NULL, ';
        $sql .= 'logout_time      datetime NOT NULL, ';
        $sql .= 'visit_ip      varchar(50) NOT NULL, ';
        $sql .= 'PRIMARY KEY (id)  ';
        $sql .= ' ) ';
        $sql .=  $charset_collate ; 
       
        $ct_category = (!$bdtaskchatboard_visitors_history =='' )?dbDelta($sql):'';




        $sql = ' ';
        $sql .= 'CREATE TABLE  IF NOT EXISTS  ';
        $sql .= $bdtaskchatboard_chat_history;
        $sql .= '  (  ';
        $sql .= 'chat_id   bigint(20)  AUTO_INCREMENT,  ';
        $sql .= 'visitor_id            int(11) NOT NULL, ';
        $sql .= 'message      text NOT NULL, ';
        $sql .= 'attach_file  varchar(250) NOT NULL, ';
        $sql .= 'department_id  int(11) NOT NULL, ';
        $sql .= 'chat_date  date NOT NULL, ';
        $sql .= 'chat_date_time  datetime NOT NULL, ';
        $sql .= 'user_id    int(11) NOT NULL, ';
        $sql .= 'action_type tinyint(1) NOT NULL, ';
        $sql .= 'status tinyint(1) NOT NULL, ';
        $sql .= "isNotify tinyint(1) NOT NULL DEFAULT '1',";
        $sql .= 'PRIMARY KEY (chat_id)  ';
        $sql .= ' ) ';
        $sql .=  $charset_collate ; 
       
        $ct_category = (!$bdtaskchatboard_chat_history =='' )?dbDelta($sql):'';



        $sql = ' ';
        $sql .= 'CREATE TABLE  IF NOT EXISTS  ';
        $sql .= $bdtaskchatboard_chat_color;
        $sql .= '  (  ';
        $sql .= 'color_id   bigint(20)  AUTO_INCREMENT,  ';
        $sql .= 'visitor_id            int(11) NOT NULL, ';
        $sql .= 'user_id    int(11) NOT NULL, ';
        $sql .= 'color_name    text NOT NULL, ';
        $sql .= 'PRIMARY KEY (color_id)  ';
        $sql .= ' ) ';
        $sql .=  $charset_collate ; 
       
        $ct_category = (!$bdtaskchatboard_chat_history =='' )?dbDelta($sql):'';
               

       

        $sql = ' ';
        $sql .= 'CREATE TABLE  IF NOT EXISTS  ';
        $sql .= $bdtaskchatboard_support;
        $sql .= '  (  ';
        $sql .= 'id   bigint(20)  AUTO_INCREMENT,  ';
        $sql .= 'visitor_id    int(11) NOT NULL, ';
        $sql .= 'user_id    int(11) NOT NULL, ';
        $sql .= "isSupport  tinyint(1) NOT NULL COMMENT ' 1=yes, 0=no', ";
        $sql .= "isSolved  tinyint(1) NOT NULL COMMENT ' 1=yes, 0=no',";
        $sql .= "isDiscussion  tinyint(1) NOT NULL COMMENT ' 1=yes, 0=no', ";
        $sql .= "date_time   datetime  NOT NULL, ";
        $sql .= "status  tinyint(1) NOT NULL COMMENT ' 1=session true, 0=false', ";
        $sql .= 'PRIMARY KEY (id)';
        $sql .= ' ) ';
        $sql .=  $charset_collate ; 
       
        $ct_category = (!$bdtaskchatboard_support =='' )?dbDelta($sql):'';



        $sql = ' ';
        $sql .= 'CREATE TABLE  IF NOT EXISTS  ';
        $sql .= $bdtaskchatboard_chatbox;
        $sql .= '  (  ';
        $sql .= 'chatbox_id   bigint(30)  AUTO_INCREMENT,  ';
        $sql .= 'visitor_id    int(11) NOT NULL, ';
        $sql .= 'user_id    int(11) NOT NULL, ';
        $sql .= "date_time   datetime  NOT NULL, ";
        $sql .= "department_id int(11) NOT NULL, ";
        $sql .= "agent_typing	enum('no', 'yes') NOT NULL, ";
        $sql .= 'PRIMARY KEY (chatbox_id)';
        $sql .= ' ) ';
        $sql .=  $charset_collate ; 
        $ct_category = (!$bdtaskchatboard_chatbox =='' )?dbDelta($sql):'';


add_role( 'custom_role', 'Custom Subscriber', array( 'read' => true, 'edit_posts' => true, ) );



	}

}
