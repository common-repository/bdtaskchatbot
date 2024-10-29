<?php
/**
 * @package    admin
 * @subpackage admin/templates
 * @author     bdtask@gmail.com
 */
if ( ! defined( 'WPINC' ) ) {
  die;// Exit if accessed directly.
}
function bdtaskchatbot_shortcode_setting_form(){
 global $pagenow , $current_user ;
 if(($_REQUEST['page']==='bdtaskchatbot_setting')&& ($pagenow == 'admin.php')){    
        settings_errors(); 
?>

<style type="text/css">
  svg {
    display: block;
    font: 10.5em 'Montserrat';
    width: 960px;
    height: 300px;
    margin: 0 auto;
}

.text-copy {
    fill: none;
    stroke: white;
    stroke-dasharray: 6% 29%;
    stroke-width: 5px;
    stroke-dashoffset: 0%;
    animation: stroke-offset 5.5s infinite linear;
}

.text-copy:nth-child(1){
    stroke: #4D163D;
  animation-delay: -1;
}

.text-copy:nth-child(2){
  stroke: #840037;
  animation-delay: -2s;
}

.text-copy:nth-child(3){
  stroke: #BD0034;
  animation-delay: -3s;
}

.text-copy:nth-child(4){
  stroke: #BD0034;
  animation-delay: -4s;
}

.text-copy:nth-child(5){
  stroke: #FDB731;
  animation-delay: -5s;
}

@keyframes stroke-offset{
  100% {stroke-dashoffset: -35%;}
}
</style>
  <div class="row">
    <div class="col-sm-12">
      <div class="card" style="width:100%!important;max-width:100%!important;">
        <div class="card-header">
          <div class="row">
             <svg viewBox="0 0 960 300">
              <symbol id="s-text">
              <text text-anchor="middle" x="50%" y="80%">Bdtaskchatbot</text>
            </symbol>

            <g class = "g-ants">
              <use xlink:href="#s-text" class="text-copy"></use>
              <use xlink:href="#s-text" class="text-copy"></use>
              <use xlink:href="#s-text" class="text-copy"></use>
              <use xlink:href="#s-text" class="text-copy"></use>
              <use xlink:href="#s-text" class="text-copy"></use>
            </g>
          </svg>
          </div>
        </div>
        <div class="card-body">
          
          <div class="row">
            <div class="col-lg-6 col-sm-12">
              <form action="" class="form-inner" method="post" accept-charset="utf-8">
                <h3 class="btn-danger"><?php echo esc_html('Please copy this shortcode and put the theme header or footer','bdtaskchatbot');?> </h3>
                <div class="row">
                  <div class="col-lg-10 col-sm-12">
                    <input name="shortcode" type="text" class="form-control" id="shortcode" placeholder=" do_shortcode('[bdtaskchatbot]')" value=" echo do_shortcode('[bdtaskchatbot]')">
                  </div>
                </div>
              </form> 
            </div>

              </div>
            </div>
          </div>
        </div>
      </div>
<div class="bd-content bd-content-dashboard-two">


    <div class="row">
        <!--  table area -->
        <div class="col-sm-12">
            <div class="card" style="width:100%!important;max-width:100%!important;">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table display table-bordered table-striped table-hover base-style" >
                            <thead>
                                <tr>
                                    <th class="card-title" style="background-color:green;color:#fff"><?php echo esc_html('Featurs free plugin','bdtaskchatbot');?></th>
                                    <th class="card-title" style="background-color: #E5343D;color: #fff"><?php echo esc_html('Premium version','bdtaskchatbot');?></th>
                                   
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                <td> <div class="card">
                                  <div class="card-body">
                                      <h3 class="card-title"></h3>
                                       <ul class="list-unstyled">
                                        <li><i class="far fa-check-circle" style="color:#40d960;    margin-right: 12px;"></i> Add Department</li>
                                        <li><i class="far fa-check-circle" style="color:#40d960;    margin-right: 12px;"></i>Department Mapping</li>
                                        <li><i class="far fa-check-circle" style="color:#40d960;    margin-right: 12px;"></i>Chatting</li>
                                        <li><i class="far fa-check-circle" style="color:#40d960;    margin-right: 12px;"></i>Create Intents(Wlwelcome message)</li>
                                         <li><i class="far fa-times-circle" style="color:red;    margin-right: 12px;"></i> AI Chatbot</li> 
                                        <li><i class="far fa-times-circle" style="color:red;    margin-right: 12px;"></i>In Role Permission</li>
                                        <li><i class="far fa-times-circle" style="color:red;    margin-right: 12px;"></i>Facebook bots</li>
                                        <li><i class="far fa-times-circle" style="color:red;    margin-right: 12px;"></i>Mail</li>
                                        <li><i class="far fa-times-circle" style="color:red;    margin-right: 12px;"></i>SMS gateway</li>
                                         <li><i class="far fa-times-circle" style="color:red;    margin-right: 12px;"></i>Subscription pop widget Responsive</li>
                                      </ul>

                                  </div>
                                </div>  
                               </td>
                               <td>
                                  <div class="card">
                                    <div class="card-body">
                                      <ul class="list-unstyled">
                                        <li><i class="far fa-check-circle" style="color:#40d960;    margin-right: 12px;"></i> AI Chatbot</li>  

                                        <li><i class="far fa-check-circle" style="color:#40d960;    margin-right: 12px;"></i> Add Department</li>
                                        <li><i class="far fa-check-circle" style="color:#40d960;    margin-right: 12px;"></i>Department Mapping</li>
                                        <li><i class="far fa-check-circle" style="color:#40d960;    margin-right: 12px;"></i>Chatting</li>  
                                        <li><i class="far fa-check-circle" style="color:#40d960;    margin-right: 12px;"></i>Create Intents(Wlwelcome message)</li>
                                        <li><i class="far fa-check-circle" style="color:#40d960;    margin-right: 12px;"></i>In Role Permission</li>
                                        <li><i class="far fa-check-circle" style="color:#40d960;    margin-right: 12px;"></i>Facebook bots</li>
                                        <li><i class="far fa-check-circle" style="color:#40d960;    margin-right: 12px;"></i>Mail</li>
                                        <li><i class="far fa-check-circle" style="color:#40d960;    margin-right: 12px;"></i>SMS gateway</li>
                                         <li><i class="far fa-check-circle" style="color:#40d960;    margin-right: 12px;"></i>Subscription pop widget Responsive</li>
                                 
                                      </ul>

                                    </div>
                                  </div>
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
<?php
        
    }else{
        wp_die();
    }

}