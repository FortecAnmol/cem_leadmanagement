<style>
    .table td, .table th {
    padding:5px 0 !important;
    font-size: 12.5px;
    vertical-align:middle !important;
}
.table-striped tbody tr:nth-of-type(odd) {
    background: #f2f4f859 !important;
}
.wraping {
    height: auto !important;
}
.table-responsive>.table-bordered {
    border: 1px solid #dee2e6 !important;
}

</style>
 
<?php $__env->startSection('content'); ?>

<style type="text/css">
    
    .icons {

     width: 40px;

    }
</style>
<?php
date_default_timezone_set('Asia/Kolkata');
?>
<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Closed Lead List</li>
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
                                <h4 class="m-b-0 text-white">Closed Lead List</h4>
                            </div>

                            <div class="card-body">
                                <div class="seacrh-by-dropdown-wrapper">
                                    <label for="recipient-name" class="control-label">Select Search By: </label>
                                    <select class="form-control"  id="status_search" name="status_search">
                                    <option id="option" value="0">All</option>
                                    <option value="1">Sr. No</option>
                                    <option value="2">Campaign Name</option>
                                    <option value="3">Company Name</option>
                                    <option value="5">Prospect Name</option> 
                                    <option value="6">Time Zone</option>
                                    <option value="7">Designation</option>
                                    <option value="8">Phone No.</option>
                                    <option value="9">Date</option>
                                    </select>
                                 </div>
                            <table class="custom-seacrh-table" cellpadding="3" cellspacing="0" border="0" style="width: 67%; margin: 0 auto 2em auto;">
                                <thead>
                                    <tr>
                                        <th>Target</th>
                                        <th>Search text</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    <tr id="filter_global0" class="show">
                                        <td class="search-label">Search</td>
                                        <td align="center"><input type="text" placeholder="Global Search" class="global_filter" id="global_filter"></td>
                                    </tr>
                                    <tr id="filter_col1" class="filter_call"  data-column="0">
                                        <td class="search-label">Search</td>
                                        <td align="center"><input type="text" placeholder="Sr. Number Search" class="column_filter" id="col0_filter"></td>
                                    </tr>
                                    <tr id="filter_col2" class="filter_call" data-column="1">
                                        <td class="search-label">Search</td>
                                        <td align="center"><input type="text" placeholder="Compaign name Search" class="column_filter" id="col1_filter"></td>
                                    </tr>
                                    <tr id="filter_col3" class="filter_call" data-column="2">
                                        <td class="search-label">Search</td>
                                        <td align="center"><input type="text" placeholder="Company name Search" class="column_filter" id="col2_filter"></td>
                                    </tr>
                                    <tr id="filter_col4" class="filter_call" data-column="3">
                                        <td class="search-label">Search</td>
                                        <td align="center"><input type="text" placeholder="Prospect name Search" class="column_filter" id="col3_filter"></td>
                                    </tr>
                                    <tr id="filter_col6" class="filter_call" data-column="5">
                                        <td class="search-label">Search</td>
                                        <td align="center"><input type="text" placeholder="Time Zone Search" class="column_filter" id="col5_filter"></td>
                                    </tr>
                                    <tr id="filter_col7" class="filter_call" data-column="6">
                                        <td class="search-label">Search</td>
                                        <td align="center"><input type="text" placeholder="Designation Search" class="column_filter" id="col6_filter"></td>
                                    </tr>
                                    <tr id="filter_col8" class="filter_call" data-column="7">
                                        <td class="search-label">Search</td>
                                        <td align="center"><input type="text" placeholder="Phone Number Search" class="column_filter" id="col7_filter"></td>
                                    </tr>
                                    <tr id="filter_col9" class="filter_call" data-column="8">
                                        <td class="search-label">Search</td>
                                        <td align="center"><input type="text" placeholder="Date Search" class="column_filter" id="col8_filter"></td>
                                    </tr>
                                </tbody>
                            </table>
                               
                                <!--<h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->
                             
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php $i = 1; ?>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($i); ?></td>
                                                <?php
                                                    $sources_data = App\Models\Source::where(['id'=>$data['source_id']])->first();
                                                    ?>
                                                    <td><?php echo e($sources_data->source_name); ?></td>
                                                <td class="wraping"><?php echo e($data['company_name']); ?></td>
                                                <td class="wraping"><a href="<?php echo e(url('/leads', [$data['id']])); ?>"><?php echo e($data['prospect_first_name'].' '.$data['prospect_last_name']); ?></a></td>
                                                <td><a href="<?php echo e($data['linkedin_address']); ?>" target="_blank" ><i  alt="LinkedIn" title="LinkedIn" class="fa-brands fa-linkedin" aria-hidden="true"></i></a></td>
                                                <td><?php echo e($data['timezone']); ?></td>
                                                <td class="designation"><?php echo e($data['designation']); ?></td>
                                                
                                                
                                                <td><?php echo e($data['contact_number_1']); ?></td>
                                                <td>
                                                   
                                                    
                                                    
                                                    <?php echo e(date('d M, Y h:i A', strtotime($data['updated_at']))); ?>

                                                
                                                </td>
                  
                                                <td>

                                                     <a href="<?php echo e(url('/feedbacks/add', [$data['id']])); ?>">
                                                     <span type="button" class="label" data-toggle="tooltip" data-placement="top" title="Add Feedback" style="color:#000;font-size: 15px;"> <span class="material-icons">chat</span></span>
                                                    </a>
                                                   
                                                    <a href="<?php echo e(url('/notes/view', [$data['id']])); ?>">
                                                    <span type="button" class="label" data-toggle="tooltip" data-placement="top" title="View All Notes" style="color:#000;font-size: 15px;"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                                    </a>
                                                    <?php
                                                      $getlhs_report =  App\Models\LhsReport::where(['lead_id'=>$data['id']])->first();
                                                  
                                                    ?>
                                                    <?php if(!empty($getlhs_report)): ?>
                                                    <a href="<?php echo e(url('/employee/lhs_report/view_lhs', [$data['id']])); ?>">
                                                        <span class="label" data-toggle="tooltip" data-placement="top" title="View LHS Report" style="color:#000;font-size: 15px;"><span class="material-icons">pageview</span></span>
                                                    </a>
                                                    <a href="<?php echo e(url('/employee/lhs_report/edit', [$data['id']])); ?>">
                                                        <span class="label" data-toggle="tooltip" data-placement="top" title="Edit LHS Report" style="color:#000;font-size: 15px;"><span class="material-icons">drive_file_rename_outline</span></span>
                                                    </a>
                                                    <?php else: ?>
                                                    <a href="<?php echo e(url('/employee/lhs_report', [$data['id']])); ?>">
                                                        <span class="label" data-toggle="tooltip" data-placement="top" title="Add LHS Report" style="color:#000;font-size: 15px;"> <span class="material-icons">library_add</span></span>
                                                    </a>
                                                    
                                                    <?php endif; ?>

                                                </td>
                      
                                            </tr>
                                             <?php $i = $i+1; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                              
                                        </tbody>
                                        <tfoot    class="custom-table-foot">
                                            <tr>
                                                    <th>Sr. No</th>
                                                    <th class="campain_name">Campaign Name</th>
                                                    <th class="company_name">Company Name</th>
                                                    <th class="prospect_name">Prospect Name</th>
                                                    <th style="visibility: hidden;">LinkedIn</th>
                                                    <th>Time Zone</th>
                                                    <th class="designation">Designation</th>
                                                    <th class="phone_no" style="visibility: hidden;">Phone No.</th>
                                                    <th>Date</th>
                                                    <th class="prospect_name">Action</th>
                                                    </tr>
                                             </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

               
        </div>
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
                 else if($(this).val() == "5"){
                $('.filter_call').removeClass('show');
                   $('#filter_col4').addClass('show');
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
                }
            });
        </script>
  
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ANMOL\xampp\htdocs\cem_leadmanagement_18_feb\resources\views/leads/closed.blade.php ENDPATH**/ ?>