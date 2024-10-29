<?php 
if ( ! defined( 'WPINC' ) ) {
  die;// Exit if accessed directly.
}

global $wpdb;
// table
$chat_history =$wpdb->prefix .'bdtaskchatboard_chat_history';
$bdtaskchatboard_visitors =$wpdb->prefix .'bdtaskchatboard_visitors';

// chat list Query 
$chat_list = "SELECT * FROM $chat_history";
$chat_intormation= $wpdb->get_results($chat_list , OBJECT ) ;

// vistior Query 
$visitor_list = "SELECT * FROM $bdtaskchatboard_visitors";
$visitor_info= $wpdb->get_results($visitor_list , OBJECT ) ;
// current user
$user = wp_get_current_user();
$user_id=$user->ID; // 0
$department=$wpdb->prefix .'bdtaskchatboard_department_mapping';

$department="SELECT *  FROM $department  WHERE user_id=$user_id";
$department_id= $wpdb->get_results($department, OBJECT ) ;

if(!empty($department_id)){
$_SESSION['department_id']=$department_id[0]->department_id;
}else{
?>
<h1 style="color:red;"><?php echo esc_html('Please must add department this user!','bdtaskchatbot');?></h1>
<?php 
}


?>

<div class="main-content">
    <section class="content-header">
        <div class="p-l-30 p-r-30">
            <div class="header-icon"><i class="ti-face-smile"></i></div>
            <div class="header-title">
                <h2><?php echo esc_html('Chatboard','bdtaskchatbot');?></h2>
                <div class="small-text"><?php echo esc_html('Chat Interface','bdtaskchatbot');?></div>
            </div>
        </div>
    </section>
    <div class="body-content p-3 p-lg-0">
        <div class="chat-container row m-0">
            <div class="chat-list__sidebar">
                <div class="chat-list__search position-relative">
                    <form class="form-inline position-relative">
                        <input type="search" class="form-control" id="search_query" placeholder="Search Contacts">
                        <button type="button" class="btn btn-link loop"><i class="ti-search"></i></button>
                    </form>
                </div><!--/.chat list search-->
                <ul class="chat-list__sidebar-tabs nav nav-tabs" id="sidebarTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="chat-tab" data-toggle="tab" href="#chat" role="tab" aria-controls="chat" aria-selected="true"><div class="position-relative"><i class="material-icons"><?php echo esc_html('chat','bdtaskchatbot');?></i>
                        </div><span><?php echo esc_html('Chats','bdtaskchatbot');?></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="phone-tab" data-toggle="tab" href="#phone" role="tab" aria-controls="phone" aria-selected="true"><div class="position-relative"><i class="material-icons"><?php echo esc_html('whatshot','bdtaskchatbot');?></i></div><span><?php echo esc_html('Online users','bdtaskchatbot');?></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contacts-tab" data-toggle="tab" href="#contacts" role="tab" aria-controls="contacts" aria-selected="false"><div class="position-relative"><i class="material-icons"><?php echo esc_html('perm_contact_calendar','bdtaskchatbot');?></i></div><span><?php echo esc_html('Contacts','bdtaskchatbot');?></span></a>
                    </li>

                     <li class="nav-item">
                        <a class="nav-link" id="notifications-tab" data-toggle="tab" href="#notifications" role="tab" aria-controls="notifications" aria-selected="false"><div class="position-relative"><i class="material-icons"><?php echo esc_html('notifications','bdtaskchatbot');?></i><div class="counts"><div id="notify_counter"></div></div></div><span><?php echo esc_html('Notifications','bdtaskchatbot');?></span></a>
                    </li>
                </ul><!--/.chat list sidebar tabs-->
                <div class="tab-content" id="sidebarTabContent">
                    <div class="tab-pane fade show active" id="chat" role="tabpanel" aria-labelledby="chat-tab">
                        <div class="chat-list__in">
                            <h2><?php echo esc_html('Recent Chat','bdtaskchatbot');?></h2>
                            <div class="nav chat-list">
                                <div id="recentChat_load" style="width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="phone" role="tabpanel" aria-labelledby="phone-tab">
                        <div class="chat-list__in">
                            <h2><?php echo esc_html('Online Users','bdtaskchatbot');?></h2>
                            <div class="online-visitor">

                             <div id="visitors_list" style="width:100%"></div>
                            </div><!--/.online visitor-->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                        <div class="chat-list__in">
                            <h2><?php echo esc_html('Contacts','bdtaskchatbot');?></h2>
                            <div class="nav contact-list">
                                <div id="contact_list" style="width:100%"></div>
                                <div id="search_view" style="width:100%"></div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                        <div class="chat-list__in">
                            <h2><?php echo esc_html('Notifications','bdtaskchatbot');?></h2>
                            <div class="nav notification-list">
                             
                                <div id="newnotification" style="width:100%"></div>
                          
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.chat list sidebar-->
            <div class="tab-content chat-panel ">

                <div class="tab-pane show active" id="list-item-empty" role="tabpanel">
                      <button type="button" class="btn chat-sidebar-collapse  d-xl-none">
                           <i class="material-icons"><?php echo esc_html('menu','bdtaskchatbot');?></i>
                       </button>
                        <button class="btn  d-lg-none chat-settings-collapse settings_hide" title="Settings" style="float: right; display: none;"><i class="material-icons"  ><?php echo esc_html('settings','bdtaskchatbot');?></i></button>
                    <div class="message-content app-empty-page empty empty-content-hide" style="width:98%">
                        <div class="no-messages">
                            <i class="material-icons"><?php echo esc_html('forum','bdtaskchatbot');?></i>
                            <p><?php echo esc_html('Start Chatting','bdtaskchatbot');?></p>
                        </div>
                    </div><!--App empty page-->
                </div>
                 <div id="chat_conversiton_both"></div>
            </div>
            <div class="chat-overlay"></div>
        </div><!--/.chat container-->
    </div><!--/.body content-->
</div><!--/.main content-->
<footer class="footer-content shadow-none">
    <div class="footer-text d-flex align-items-center justify-content-between">
    </div>
</footer>
<div class="overlay"></div>
        <!--Global Theme Bundle(used by all pages)-->
<script type="text/javascript">
jQuery(document).ready(function() {
 "use strict";
// setInterval
 jQuery(".empty-content-hide").show();
 jQuery(".settings_hide").show();

       Notification();
       recentChat();
       onlineVisitor();
       contactList();
       load_notify_counter();
       setInterval(function(){
            Notification();
           recentChat();
           onlineVisitor();
           contactList();
          load_notify_counter();
        }, 31000);

      }); 

// test search ta niya geci 

</script>

<div class="chat-container row m-0" style="display: none">
        <div class="messenger-dialog row m-0">
            <div class="chat-list__sidebar--right">
                
                <div class="chatting_indicate card-body">
                  
                    <div class="d-flex align-items-center">
                        <label class="toggler toggler--is-active" id="autobot"><?php echo esc_html('Auto bot','bdtaskchatbot');?>?></label>
                        <div class="toggle">
                            <input type="checkbox" id="switcher" class="check">
                            <b class="toggle-switch"></b>
                        </div>
                        <label class="toggler" id="manual"><?php echo esc_html('Manual','bdtaskchatbot');?></label>
                    </div>
                </div>
               
            </div>
        </div>
<div class="chat-overlay"></div>
</div>

               

 
               
