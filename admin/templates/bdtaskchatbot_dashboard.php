<?php 
if ( ! defined( 'WPINC' ) ) {
  die;// Exit if accessed directly.
}

global $wpdb;
$bdtaskchatboard_visitors =$wpdb->prefix .'bdtaskchatboard_visitors';
$bdtaskchatboard_support =$wpdb->prefix .'bdtaskchatboard_support';
// online vistior
$online="SELECT count(*) as total_visitor FROM $bdtaskchatboard_visitors WHERE  isConvert=0";
$onlineVisitor= $wpdb->get_results($online, OBJECT ) ;
// total customer
$customer="SELECT count(*) as total_customer FROM $bdtaskchatboard_visitors WHERE  isConvert=1";
$total_customer= $wpdb->get_results($customer, OBJECT ) ;
$lead="SELECT count(*) as total_lead FROM $bdtaskchatboard_visitors WHERE  isConvert=2";
$total_lead= $wpdb->get_results($lead, OBJECT ) ;
?>
 

<div class="main-content">
 
    <div class="body-content">
        
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box mb-4">
                    <div class="card-header card-header-warning card-header-icon position-relative border-0 text-right px-3 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                            <i class="fa fa-users"></i>
                        </div>
                        <h3 class="card-title text-success" id="total_customer"></h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats">
                             <i class="typcn typcn-calendar-outline mr-2"></i>
                            <?php echo esc_html('Total Customer','bdtaskchatbot');?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box mb-4">
                    <div class="card-header card-header-success card-header-icon position-relative border-0 text-right px-3 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                            <i class="fa fa-users"></i>
                        </div>
                        <h3 class="card-title text-success" id="total_lead"></h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats">
                            <i class="typcn typcn-calendar-outline mr-2"></i><?php echo esc_html('Total Lead','bdtaskchatbot');?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box mb-4">
                    <div class="card-header card-header-danger card-header-icon position-relative border-0 text-right px-3 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                            <i class="typcn typcn-info-outline"></i>
                        </div>
               
                    <h3 class="card-title">
                        <i class="text-danger" id="total_issues"><?php echo esc_html('0','bdtaskchatbot');?></i>/
                        <i class="text-success" id="total_solved"><?php echo esc_html('0','bdtaskchatbot');?></i></h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats">
                            <div class="text-danger"><?php echo esc_html('Issues','bdtaskchatbot');?></div>/
                            <div class="text-success"><?php echo esc_html('Solved','bdtaskchatbot');?></div>
                        </div>
                    </div>
                </div>
            </div>

               <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">


                <div class="card card-stats statistic-box mb-4">
                    <div class="card-header card-header-info card-header-icon position-relative border-0 text-right px-3 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                            <i class="fa fa-users"></i>
                        </div>
                        <h3 class="card-title text-success" id="online_visitor"></h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats">
                            <i class="typcn typcn-calendar-outline mr-2"></i>
                            <?php echo esc_html('Visitor Online','bdtaskchatbot');?>
                        </div>
                    </div>
                </div>
            </div>


        </div>
       
    <div class="row">
    <div class="col-sm-9">
            <div class="card" style="width:100%!important;max-width:100%!important;">
                <div class="card-header"><h6 class="fs-17 font-weight-600 mb-0"><?php echo esc_html('Last Visitor List','bdtaskchatbot');?> </h6></div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover base-style">
                        <thead>
                            <tr>
                                <th><?php echo esc_html('Visitor Name','bdtaskchatbot');?></th>
                                <th><?php echo esc_html('Email Address','bdtaskchatbot');?></th>
                                <th><?php echo esc_html('Phone','bdtaskchatbot');?></th>
                                <th><?php echo esc_html('Country Name','bdtaskchatbot');?></th>
                                <th><?php echo esc_html('City','bdtaskchatbot');?></th>
                                <th><?php echo esc_html('Action','bdtaskchatbot');?></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                             global $wpdb;
                           $bdtaskchatboard_visitors =$wpdb->prefix .'bdtaskchatboard_visitors';

                           $visitor = $wpdb->get_results("SELECT * FROM   $bdtaskchatboard_visitors  ORDER BY visitor_id DESC LIMIT 5");
                            $s=0;
                             foreach ( $visitor as $value) {
                             ?>
                            <tr>
                                <td><?php echo esc_html($value->first_name.$value->last_name);?></td>
                                <td><?php echo esc_html($value->email);?></td>
                                <td > 
                                 <?php echo esc_html($value->phone);?>
                                </td> 
                                <td> 
                                 <?php echo esc_html($value->country);?>
                                </td>
                                <td> 
                                 <?php echo esc_html($value->city);?>
                                </td>
                                <td>
                                       
                                  <a  class="btn btn-success-soft btn-sm" data-toggle='modal' data-target='#visitor_form<?php echo $value->visitor_id ; ?>'>
                                    <i class="far fa-eye"></i>
                                 </a>

                                </td>
                                
                            </tr>
                           <?php }?>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--  table area -->
    <div class="col-lg-3">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo esc_html('Total Conversion Percentage','bdtaskchatbot');?></h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="chart mb-3">
                <canvas id="doughutChart" height="310"></canvas>
            </div>
            <div class="chart-legend">
                <div class="chart-legend-item">
                    <div class="chart-legend-color kelly-green"></div>
                    <p><?php echo esc_html('Customers','bdtaskchatbot');?></p>
                    <p class="percentage text-muted"><?php echo esc_html($total_customer[0]->total_customer);?></p>
                </div>
                <div class="chart-legend-item">
                    <div class="chart-legend-color kelly-green2"></div>
                    <p><?php echo esc_html('Leads','bdtaskchatbot');?></p>
                    <p class="percentage text-muted"><?php echo esc_html($total_lead[0]->total_lead);?></p>
                </div>
                <div class="chart-legend-item">
                    <div class="chart-legend-color whisper"></div>
                    <p><?php echo esc_html('General','bdtaskchatbot');?></p>
                    <p class="percentage text-muted"><?php echo esc_html($onlineVisitor[0]->total_visitor);?> </p>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>



<?php 
 foreach ( $visitor as $value) {?>
<div class="modal fade " id="visitor_form<?php echo $value->visitor_id ; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-modal="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo esc_html('View profile','bdtaskchatbot');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="row">
            <!-- left column -->
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="text-center">
                <img alt="avatar" src="<?php echo esc_url(plugins_url().'/bdtaskchatbot/admin/templates/avatar1.png');?>">
              </div>
            </div>
            <!-- edit form column -->
            <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
               <h3><?php echo esc_html('Personal info','bdtaskchatbot');?></h3>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo esc_html('Full Name','bdtaskchatbot');?></label>
                    <div class="col-sm-9">
                        <div class="form-control" id="fname"><?php echo esc_html($value->first_name.' '.$value->last_name);?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo esc_html('Email','bdtaskchatbot');?></label>
                    <div class="col-sm-9">
                        <div class="form-control" id="email"><?php echo esc_html($value->email);?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo esc_html('Mobile','bdtaskchatbot');?></label>
                    <div class="col-sm-9">
                        <div class="form-control" id="phone"><?php echo esc_html($value->phone);?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo esc_html('Country','bdtaskchatbot');?></label>
                    <div class="col-sm-9">
                        <div class="form-control" id="country"><?php echo esc_html($value->country);?></div>
                    </div>
                </div> 

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo esc_html('City','bdtaskchatbot');?></label>
                    <div class="col-sm-9">
                        <div class="form-control" id="city"><?php echo esc_html($value->city);?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo esc_html('IP Address','bdtaskchatbot');?></label>
                    <div class="col-sm-9">
                        <div class="form-control" id="ip_address"><?php echo esc_html($value->ip_address);?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo esc_html('Auto bot','bdtaskchatbot');?></label>
                    <div class="col-sm-9">
                        <div class="form-control" id="auto_bot"><?php echo esc_html('No','bdtaskchatbot');?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo esc_html('Conversions','bdtaskchatbot');?></label>
                    <div class="col-sm-9">
                        <?php if($value->isConvert==1){?>
                        <div class="form-control" id="conversion"><?php echo esc_html('Customer','bdtaskchatbot');?></div>
                    <?php }elseif($value->isConvert==2){?>
                      <div class="form-control" id="conversion"><?php echo esc_html('Lead','bdtaskchatbot');?></div>
                    <?php }else{?>
                          <div class="form-control" id="conversion"><?php echo esc_html('General');?></div>
                    <?php }?>
                    </div>
                </div>

            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php }?>

    </div><!--/.body content-->
</div><!--/.main content-->

<div class="overlay"></div>



<script type="text/javascript">
      //doughut chart
      (function($) { 
       "use strict";
        var ctx = document.getElementById("doughutChart");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                        data: [<?php echo $total_customer[0]->total_customer;?>,<?php echo $total_lead[0]->total_lead;?>,<?php echo $onlineVisitor[0]->total_visitor;?>],
                        backgroundColor: [
                            "#59b9c1",
                            "#42b704",
                            "#fde235",
                        ],
                        hoverBackgroundColor: [
                            "#59b9c1",
                            "#4cd604",
                            "#fde235"
                        ]
                    }],
                labels: [
                    "Customer",
                    "Lead",
                    "General",
                    
                ]
            },
            options: {
                legend: false,
                responsive: true,
                cutoutPercentage: 80,
            }
        });
        })(jQuery);

</script>    

            
