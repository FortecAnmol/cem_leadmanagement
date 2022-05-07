<style>
    .table td, .table th {
    padding:5px 0 !important;
    font-size: 12.5px;
    height: auto;
}
.table-striped tbody tr:nth-of-type(odd) {
    background: #f2f4f859 !important;
}
.emp_lead_info ul {
    list-style: none;
    padding-left: 0;
}
.emp_lead_info ul li {
    line-height: 1.4;
}
.emp_lead_info ul span {
    font-size: 12.5px;
    font-weight: 600;
    color: #192e62;
}
table#example23 {
    border: 1px solid #dee2e6;
}


span.assign_emp_wrapper_heading {
    font-weight: 700;
    color: #192e62;
}
span.assign_emp_wrapper_list{
    display: block;
    /* max-height: 30vh;
    overflow-y: scroll; */
    }
    .assign_emp_wrapper_list  div {
        font-size: 12.5px;
        font-weight: 400;
        color: #455a64;
    }
    /* width */
     span.assign_emp_wrapper_list::-webkit-scrollbar {
    width: 5px;
    }

    /* Track */
     span.assign_emp_wrapper_list::-webkit-scrollbar-track {
    background: #f1f1f1;
    }

    /* Handle */
     span.assign_emp_wrapper_list::-webkit-scrollbar-thumb {
    background: #888;
    }

    /* Handle on hover */
     span.assign_emp_wrapper_list::-webkit-scrollbar-thumb:hover {
    background: #555;
    }
    /* 12-1-2022 */
    .col-md-6.emp_lead_info {
        background: #a3a4a752;
        padding: 14px;
        border-radius: 10px;
        margin-left: 15px;
        flex: 0 0 48%;
        max-width: 48%;
    }
    .emp_lead_info ul li {
        line-height: 1.4;
        display: inline-block;
        background: #192e62;
        padding: 4px 12px;
        border-radius: 50px;
        margin-bottom: 8px;
    }
    .emp_lead_info ul span {
        color: #fff;
    }
    .assign_emp_wrapper_list div {
        font-weight: 500;
        color: #192e62;
    }
    /* ANKITA 16_feb_2022  */
    .global_search {
    top: 400px !important;
    right: 18px !important;
}
@media  only screen and (max-width: 767px) {
  .global_search {
    top: 650px !important;
    right: 5px !important;
}
}
</style>
 
<?php $__env->startSection('content'); ?>


<?php
                                

    $urls = '?employee_id='.request()->get('employee_id').'&campaign_id='.request()->get('campaign_id').'&date_from='.request()->get('date_from').'&date_to='.request()->get('date_to');


?>

<style>
    .form-control {
      height: calc(0em + .0rem + 0px) !important; 
    }
    .btn {
        margin-top: 5px;
    }
</style>

<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(url('leads')); ?>">Leads</a></li>
                        <li class="breadcrumb-item active">View Leads</li>
                    </ol>
                </div>
                <div>
                    <!--<button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>--->
                </div>
            </div>

 <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">

                        <?php if(Session::has('success')): ?>
                           <div class="alert alert-success" role="alert">
                               <?php echo e(Session::get('success')); ?>

                           </div>
                        <?php elseif(Session::has('error')): ?>
                           <div class="alert alert-danger" role="alert">
                               <?php echo e(Session::get('error')); ?>

                           </div>
                        <?php endif; ?>
                        
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">View Leads</h4>
                            </div>

                            <div class="card-body">
                                <!--<h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->
                               <!-- <a type="button" href="<?php echo e(route('leads.create')); ?>" class="btn btn-success addButton"> + Add Lead</a>-->
                               
                              
                                 <form id="ajaxform">
                                    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
                                    <div class="form-body">
                                        
                                        <div class="row p-t-20">
                                            
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Employee Name</label>
                                                     <select class="form-control"  name="employee_id" id="employee_id">
                                                      <option value="">Select Employee</option>
                                                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($employee_id == $employees['id']): ?>
                                                                    <option value="<?php echo e($employees['id']); ?>" selected><?php echo e($employees['name']); ?></option>
                                                                <?php else: ?>
                                                                    <option value="<?php echo e($employees['id']); ?>"><?php echo e($employees['name']); ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Campaign Name</label>
                                                     <select class="form-control"  name="campaign_id" id="campaign_id">
                                                      <option value="">Select Campaign ID</option>
                                                            <?php $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaigns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($campaign_id == $campaigns['id']): ?>
                                                                    <option value="<?php echo e($campaigns['id']); ?>" selected><?php echo e($campaigns['source_name']); ?></option>
                                                                <?php else: ?>
                                                                    <option value="<?php echo e($campaigns['id']); ?>"><?php echo e($campaigns['source_name']); ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Date From</label>
                                                        <input type="text" class="form-control" placeholder="Date From" name="date_from" value="<?php echo e($date_from); ?>" id="date_from">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Date To</label>
                                                    <input type="text" class="form-control" placeholder="Date To" name="date_to" value="<?php echo e($date_to); ?>" id="date_to">
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <br>
                                                     <button type="submit" class="btn btn-success">Search</button>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-12">
                                                <div class="row">
                                                     <?php if(!empty(request()->get('campaign_id'))): ?>
                                                    <div class="col-md-6 emp_lead_info">
                                                       
                                                        <?php
                                                        $Grand_total_leads = App\Models\Lead::where(['source_id'=>request()->get('campaign_id')])->count();
                                                        $total_pending_leads = App\Models\Lead::where(['source_id'=>request()->get('campaign_id'),'status'=> 1])->count();
                                                        $total_completed_leads = App\Models\Lead::where(['source_id'=>request()->get('campaign_id'),'status'=> 3])->count();
                                                        $total_failed_leads = App\Models\Lead::where(['source_id'=>request()->get('campaign_id'),'status'=> 2])->count();
                                                        $total_Assigned_leads = App\Models\Lead::where(['source_id'=>request()->get('campaign_id')])->whereNotNull(['asign_to'])->count();
                                                        $total_Pending_Assign_leads = App\Models\Lead::where(['source_id'=>request()->get('campaign_id')])->whereNull(['asign_to'])->count();
                                                        $total_Assigned_emp_leads = App\Models\Lead::where(['source_id'=>request()->get('campaign_id')])->whereNotNull(['asign_to'])->groupBy('asign_to')->get()->toArray();
                                                        $emp_names = array();
                                                        foreach($total_Assigned_emp_leads as $data_new){
                                                           // print_r( $data_new['asign_to']);
                                                            $user_data = App\Models\User::select('id','name')->where(['id' => $data_new['asign_to'] ])->first();
                                                            $user_data_name = $user_data->name;
                                                            $emp_names[] =  $user_data;
                                                        }
                                                        ?>
                                                        <ul>
                                                            <li><span>Total Leads </span><span><?php echo e($Grand_total_leads); ?></span></li>
                                                            <li><span>Total Pending Leads </span><span><?php echo e($total_pending_leads); ?></span></li>
                                                            <li><span>Total Closed Leads </span><span><?php echo e($total_completed_leads); ?></span></li>
                                                            <li><span>Total Failed Leads </span><span><?php echo e($total_failed_leads); ?></span></li>
                                                            <li><span>Total Assigned Leads </span><span><?php echo e($total_Assigned_leads); ?></span></li>
                                                            <li><span>Total Pending Assign Leads </span><span><?php echo e($total_Pending_Assign_leads); ?></span></li>
                                                        </ul>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        <div class="assign_emp_wrapper">
                                                            <span class="assign_emp_wrapper_heading">Assigned Emplyee </span><span class="assign_emp_wrapper_list">
                                                                <?php $__currentLoopData = $emp_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_latest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                   <?php
                                                                    $emp_user_Id = $data_latest->id;
                                                                    $Emp_total_leads = App\Models\Lead::where(['source_id'=>request()->get('campaign_id'),'asign_to'=>$emp_user_Id])->count();
                                                                    $emp_urls = '?employee_id='. $emp_user_Id.'&campaign_id='.request()->get('campaign_id').'&date_from='.request()->get
                                                                    ('date_from').'&date_to='.request()->get('date_to');
                                                                    ?>
                                                                        <div><a href="<?php echo e(route('getViewLeads').$emp_urls); ?>"><?php echo e($data_latest->name); ?> (<?php echo e($Emp_total_leads); ?>)</a></div>
                                                               
                                                              <!--<div><?php echo e($data_latest); ?></div>-->
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </span>
                                                        </div>
                                                        </div>
                                                        <?php else: ?>
                                                        <div class="col-md-6">
                                                        </div>
                                                        <?php endif; ?>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <br>
                                                            <a type="button" href="<?php echo e(route('employees_performance').$urls); ?>" class="btn btn-success addButton"> View in Graphical Format</a>
                                                        </div>
                                                        <div class="form-group" style="
                                                            display: flex;
                                                            justify-content: flex-end;
                                                            width: 100%;">
                                                            <br>
                                                            <a type="button" href="<?php echo e(url('/employees_performance/exportExcel').$urls); ?>" class="btn btn-success addButton"> Export Report </a>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>

                                        </div>
                                        
                                    </div>
                                </form>
                                <div class="seacrh-by-dropdown-wrapper">
                                    <label for="recipient-name" class="control-label">Select Search By: </label>
                                    <select class="form-control"  id="status_search" name="status_search">
                                    <option id="option" value="0">All</option>
                                    <option value="1">Sr</option>
                                    <option value="2">Campaign Name</option>
                                    <option value="3">Company Name</option>
                                    <option value="4">Prospect Name</option>
                                    <option style="display: none" value="5">LinkedIn No.</option> 
                                    <option value="6">Time</option>
                                    <option value="7">Designation</option>
                                    <option value="8">Phone</option>
                                    <option value="9">Date</option>
                                    <option value="10">Employee Name</option>
                                    </select>
                                 </div>
                                <table  class="custom-seacrh-table" cellpadding="3" cellspacing="0" border="0" style="width: 67%; margin: 0 auto 2em auto;">
                                    <thead>
                                        <tr>
                                            <th>Target</th>
                                            <th>Search text</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="filter_global0" class="show search_box">
                                            <td class="search-label">Search</td>
                                            <td align="center"><input type="text" placeholder="Global Search" class="global_filter" id="global_filter"></td>
                                        </tr>
                                        <tr id="filter_col1" class="filter_call" data-column="0">
                                            <td class="search-label">Search</td>
                                            <td align="center"><input type="text" placeholder="Sr Search"  class="column_filter" id="col0_filter"></td>
                                        </tr>
                                        <tr id="filter_col2" class="filter_call" data-column="1">
                                            <td class="search-label">Search</td>
                                            <td align="center"><input type="text" placeholder="Campaign Search" class="column_filter" id="col1_filter"></td>
                                        </tr>
                                        <tr  id="filter_col3" class="filter_call" data-column="2">
                                            <td class="search-label">Search</td>
                                            <td align="center"><input type="text" placeholder="Company Search" class="column_filter" id="col2_filter"></td>
                                        </tr>
                                        <tr   id="filter_col4" class="filter_call" data-column="3">
                                            <td class="search-label">Search</td>
                                            <td align="center"><input type="text" placeholder="Prospect Search" class="column_filter" id="col3_filter"></td>
                                        </tr>
                                        <tr id="filter_col5" style="display: none" class="filter_call" data-column="4">
                                            <td class="search-label">Search</td>
                                            <td align="center"><input type="text" placeholder="LinkedIn Search" class="column_filter" id="col4_filter"></td>
                                        </tr>
                                        <tr id="filter_col6" class="filter_call" data-column="5">
                                            <td class="search-label">Search</td>
                                            <td align="center"><input type="text"  placeholder="Time Search" class="column_filter" id="col5_filter"></td>
                                        </tr>
                                        <tr id="filter_col7"  class="filter_call" data-column="6">
                                            <td class="search-label">Search</td>
                                            <td align="center"><input type="text" placeholder="Designation Search" class="column_filter" id="col6_filter"></td>
                                        </tr>
                                        <tr  id="filter_col8"  class="filter_call" data-column="7">
                                            <td class="search-label">Search</td>
                                            <td align="center"><input   placeholder="Phone Search" type="text" class="column_filter" id="col7_filter"></td>
                                        </tr>
                                        <tr  id="filter_col9" class="filter_call" data-column="8">
                                            <td class="search-label">Search</td>
                                            <td align="center"><input type="text"  placeholder="Date Search" class="column_filter" id="col8_filter"></td>
                                        </tr>
                                        <tr  id="filter_col10" class="filter_call" data-column="9">
                                            <td class="search-label">Search</td>
                                            <td align="center"><input type="text"  placeholder="Employee Search" class="column_filter" id="col9_filter"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="table-responsive m-t-40">

                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sr. No</th>
                                                <th>Campaign Name</th>
                                                <th>Company Name</th>
                                                <th>Prospect Name</th>
                                                <th>LinkedIn</th>
                                                <th>Time Zone</th>
                                                <th>Designation</th>
                                                <th>Phone No.</th>                                        
                                                <th>Date</th>
                                                <th>Employee Name</th>
                                                <th>Status</th>
                                                <th>View Notes</th>
                                                <th>Report</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php $i = 1; ?>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($i); ?></td>
                                            <?php
                                                if(!empty($data['source_id'])){
                                                 $campaign_id = $data['source_id'];
                                                 $source_data = App\Models\Source::where(['id'=>$campaign_id])->first();
                                                 $campaign_name = $source_data->source_name;
                                                
                                                }else{
                                                    $campaign_name = '';
                                                }
                                                ?>
                                                <td class="wraping"><?php echo e($campaign_name); ?></td>
                                                <td class="wraping"><?php echo e($data['company_name']); ?></td>
                                                <td class="wraping"><a href="<?php echo e(url('/leads', [$data['id']])); ?>"><?php echo e($data['prospect_first_name'].' '.$data['prospect_last_name']); ?></a></td>
                                                <td><a href="<?php echo e($data['linkedin_address']); ?>" target="_blank" ><i  alt="LinkedIn" title="LinkedIn" class="fa-brands fa-linkedin" aria-hidden="true"></i></a></td>
                                                <td><?php echo e($data['timezone']); ?></td>
                                                <td class="designation"><?php echo e($data['designation']); ?></td>
                                                
                                                <!--<td class="wraping"><?php echo e($data['company_name']); ?></td>
                                               <td><?php echo e($data['job_title']); ?></td>-->
                                               <td><?php echo e($data['contact_number_1']); ?></td>
                                                <td><?php echo e(date('d M, Y', strtotime($data['created_at']))); ?></td>  
                                                <?php
                                                 $emp_data = App\Models\User::select('name')->where(['id'=> $data['asign_to']])->first();
                                            
                                                  if(!empty($emp_data)){
                                                   $emp_name = $emp_data->name;
                                                    }else{
                                                        $emp_name = 'Not Assigned';
                                                    }
                                                ?>
                                                <td class="wraping"><?php echo e($emp_name); ?></td>                                                                                              
                                                <?php if($data['status'] == 1): ?>
                                                    <td>
                                                        <span class="label" data-toggle="tooltip" data-placement="top" title="Pending" style="color:#000;font-size: 15px;"><img style="width: 20px" src="<?php echo e(asset('public/admin/assets/images/pending.png')); ?>" alt="pending"><span class="lead_status_sapn">1</span></span></td>
                                                <?php elseif($data['status'] == 2): ?>
                                                    <td><span class="label"  data-toggle="tooltip" data-placement="top" title="Failed" style="color:#000;font-size: 15px;" class="label"><img style="width: 20px" src="<?php echo e(asset('public/admin/assets/images/failed.png')); ?>" alt="failed"><span class="lead_status_sapn">2</span></span></td>
                                                <?php elseif($data['status'] == 4): ?>
                                                <td><span class="label"  data-toggle="tooltip" data-placement="top" title="In Progress" style="color:#000;font-size: 15px;" class="label"><img style="width: 20px" src="<?php echo e(asset('public/admin/assets/images/in-progress.png')); ?>" alt="In Progress"><span class="lead_status_sapn">4</span></span></td>

                                                <?php else: ?>
                                                    <td><span  class="label" data-toggle="tooltip" data-placement="top" title="Closed" style="color:#000;font-size: 15px;"><img style="width: 20px" src="<?php echo e(asset('public/admin/assets/images/completed.png')); ?>" alt="completed"><span class="lead_status_sapn">3</span></span></td>
                                                <?php endif; ?>
                                                
                                                <td>    <a href="<?php echo e(url('/notes/view', [$data['id']])); ?>">
                                                    <span class="label" data-toggle="tooltip" data-placement="top" title="View All Notes" style="color:#000;font-size: 15px;"><span class="material-icons">
                                                        grading
                                                        </span></span></a></span>
                                                </a>
                                                </td>
                                                <?php
                                                $lhs = App\Models\LhsReport::where(['lead_id' => $data['id']])->first();
                                                //echo $lhs;
                                                ?>
                                                
                                                <?php if($data['status'] == 3 && !empty($lhs)): ?>
                                                <td> <a href="<?php echo e(url('/employee/export/' . $data['id']. '/word_single_down').$urls); ?>"><span class="label label-warning">
                                                            <i class="ti-download"> </i> Word</span>
                                                     </a>
                                                </td>
                                                <?php else: ?>
                                                <td> </td>
                                                <?php endif; ?>
                                                

                                                
                      
                                            </tr>
                                            <?php $i = $i+1; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                               
                              
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Sr. No</th>
                                                <th class="campain_name">Campaign Name</th>
                                                <th class="company_name">Company Name</th>
                                                <th style="visibility: hidden;">LinkedIn</th>
                                                <th class="prospect_name" class="column-wrap" style="visibility: hidden;">Prospect Name</th>
                                                <th>Time Zone</th>
                                                <th class="designation">Designation</th>
                                                <th class="phone_no" style="visibility: hidden;">Phone No.</th>
                                                <th>Date</th>
                                                <th>Employee Name</th>
                                                <th style="visibility: hidden;">Status</th>
                                                <th style="visibility: hidden">View Notes</th>
                                                <!--<th>Source</th>-->
                                                <th  style="visibility: hidden">Report</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

               
        </div>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> 
        <script>
            $("#status_search").change(function(){
                if($(this).val() == "0") {
                  $('.filter_call').removeClass('show');
                   $('#filter_col0').addClass('show');
                }
                else if($(this).val() == "1") {
                  $('.filter_call').removeClass('show');
                   $('#filter_col1').addClass('show');
                } else if($(this).val() == "2"){
                $('.filter_call').removeClass('show');
                   $('#filter_col2').addClass('show');
                }
                 else if($(this).val() == "3"){
                $('.filter_call').removeClass('show');
                   $('#filter_col3').addClass('show');
                }
                else if($(this).val() == "4"){
                $('.filter_call').removeClass('show');
                   $('#filter_col4').addClass('show');
                }
                 else if($(this).val() == "5"){
                $('.filter_call').removeClass('show');
                   $('#filter_col5').addClass('show');
                }
                else if($(this).val() == "6"){
                $('.filter_call').removeClass('show');
                   $('#filter_col6').addClass('show');
                }
                else if($(this).val() == "7"){
                $('.filter_call').removeClass('show');
                   $('#filter_col7').addClass('show');
                }
                else if($(this).val() == "8"){
                $('.filter_call').removeClass('show');
                   $('#filter_col8').addClass('show');
                }
                else if($(this).val() == "9"){
                $('.filter_call').removeClass('show');
                   $('#filter_col9').addClass('show');
                }else if($(this).val() == "10"){
                $('.filter_call').removeClass('show');
                   $('#filter_col10').addClass('show');
                }
            });
        
          /*$(function(){
              
                $('#employee_id').change(function() {
                    
                    var employee_id = $(this).val();
                    var url = '<?php echo e(route("getViewLeads")); ?>?ids='+employee_id;
                    window.location.href = url;
        
                });
                
          });*/
        
          
        </script>
<?php $__env->stopSection(); ?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="~/Scripts/data-table/jquery.dataTables.js"></script>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\cem_leadmanagement_10_feb\resources\views/leads/view.blade.php ENDPATH**/ ?>