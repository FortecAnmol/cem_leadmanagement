<style>
    .table-responsive>.table-bordered{
        border: 1px solid #dee2e6 !important;
    }
    .table td, .table th {
    padding:5px 0 !important;
    font-size: 12.5px;
    vertical-align: middle !important;
}
.table-striped tbody tr:nth-of-type(odd) {
    background: #f2f4f859 !important;
}
.table th {
    padding: 5px !important;
}
.wraping {
    height: auto !important;
}
.tablecustomheader {
        text-align: right !important;
    }
</style>

 
<?php $__env->startSection('content'); ?>


<?php
                                
    $urls = '?emp_id='.intval(request()->get('emp_id')).'&camp_id='.request()->get('camp_id').'&date_from='.request()->get('date_from').'&date_to='.request()->get('date_to');

//dd('hdhdhdh');
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
                               
                              
                                 <form id="ajaxform1">
                                    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
                                    <div class="form-body">
                                        
                                         <div class="row p-t-20">
                                <div class="col-md-12 tablecustomheader">
                                    <?php
                                    $emp_id =  request()->get('emp_id');
                                    $emp_info = App\Models\User::where(['id' => $emp_id])->first();
                                    ?>
                                    <span>Employee Name:</span>
                                    <span><?php echo e($emp_info->name); ?></span>
                                </div>
                                            
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Campaign Name</label>
                                                    <select class="form-control"  name="camp_id" id="camp_id">
                                                        <option value="">Select Campaign</option>
                                                              <?php $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaigns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                   <?php if($camp_id == $campaigns['source']['id']): ?>
                                                                      <option value="<?php echo e($campaigns['source']['id']); ?>" selected><?php echo e($campaigns['source']['source_name']); ?></option>
                                                                  <?php else: ?> 
                                                                      <option value="<?php echo e($campaigns['source']['id']); ?>"><?php echo e($campaigns['source']['source_name']); ?></option>
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
                                                     <button type="button" id="sub_cmap" class="btn btn-success">Search</button>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-3">
                                    <div class="form-group">
                                        <br>
                                        <a type="button" href="<?php echo e(url('/employees/' . request()->get('emp_id') . '/performace').$urls); ?>" class="btn btn-success addButton"> View in Graphical Format</a>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" style="
                                    display: flex;
                                    justify-content: flex-end;
                                    width: 100%;
                                ">
                                        <br>
                                        <a type="button" href="<?php echo e(url('/employee/export').$urls); ?>" class="btn btn-success addButton"> Export Report </a>
                                    </div>
                                </div>

                                        </div>
                                        
                                    </div>
                                </form>
                                
                                <div class="table-responsive m-t-40">

                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Campaign</th>
                                                <th>Lead Name</th>
                                                <!--<th>Comapny Name</th>
                                                <th>Job Title</th>-->
                                                <th>Email</th>
                                                <th>Phone No.</th>
                                                <th>Date</th>
                                                <th>View Notes</th>
                                                <th>Status</th>
                                                <th>Report</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                <td class="wraping"><a href="<?php echo e(url('/leads', [$data['id']])); ?>"><?php echo e($data['prospect_first_name'].' '.$data['prospect_last_name']); ?></a></td>
                                                <!--<td class="wraping"><?php echo e($data['company_name']); ?></td>
                                               <td><?php echo e($data['job_title']); ?></td>-->
                                               <td class="wraping"><?php echo e($data['email']); ?></td>
                                               <td><?php echo e($data['contact_number_1']); ?></td>
                                                <td><?php echo e(date('d M, Y', strtotime($data['created_at']))); ?></td>
                   
                                                <td>    <a href="<?php echo e(url('/notes/view', [$data['id']])); ?>">
                                                    <span class="label" data-toggle="tooltip" data-placement="top" title="View All Notes" style="color:#000;font-size: 15px;"><span class="material-icons">
                                                        grading
                                                        </span></span></a></span>
                                                </a>
                                                </td>
                                                

                                                <?php if($data['status'] == 1): ?>
                                                    <td>
                                                        <span class="label" data-toggle="tooltip" data-placement="top" title="Pending" style="color:#000;font-size: 15px;"><img style="width: 20px" src="<?php echo e(asset('public/admin/assets/images/pending.png')); ?>" alt="pending"></span></td>
                                                <?php elseif($data['status'] == 2): ?>
                                                    <td><span class="label"  data-toggle="tooltip" data-placement="top" title="Failed" style="color:#000;font-size: 15px;" class="label"><img style="width: 20px" src="<?php echo e(asset('public/admin/assets/images/failed.png')); ?>" alt="failed"></span></td>
                                                <?php elseif($data['status'] == 4): ?>
                                                    <td><span class="label"  data-toggle="tooltip" data-placement="top" title="In Progress" style="color:#000;font-size: 15px;" class="label"><img style="width: 20px" src="<?php echo e(asset('public/admin/assets/images/in-progress.png')); ?>" alt="In Progress"></span></td>
    
                                                    <?php else: ?>
                                                    <td><span  class="label" data-toggle="tooltip" data-placement="top" title="Closed" style="color:#000;font-size: 15px;"><img style="width: 20px" src="<?php echo e(asset('public/admin/assets/images/completed.png')); ?>" alt="completed"></span></td>
                                                <?php endif; ?>
                                                <?php
                                                $lhs = App\Models\LhsReport::where(['lead_id' => $data['id']])->first();
                                                ?>
                                                <?php if(!empty($lhs)): ?>
                                                <?php if($data['status'] == 3): ?>
                                                <td> <a href="<?php echo e(url('/employee/export/' . $data['id']. '/pdf_single_down').$urls); ?>"><span class="label label-warning">
                                                            <i class="ti-download"> </i> PDF</span>
                                                    </a>
                                                    <a href="<?php echo e(url('/notes/view', [$data['id']])); ?>">
                                                        <span class="label label-warning">View All Notes</span>
                                                    </a>
                                                </td>
                
                                                <?php endif; ?>
                                                <?php endif; ?>


                                                
                      
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                               
                              
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

               
        </div>
  
<?php $__env->stopSection(); ?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const camp_id = urlParams.get('camp_id');
        const emp_id = urlParams.get('emp_id');
        const date_from = urlParams.get('date_from');
        const date_to = urlParams.get('date_to');
       
 $(document).on("click","#sub_cmap",function() {
               var camp_id = $('#camp_id').val();
               var date_from = $('#date_from').val();
               var date_to = $('#date_to').val();
               var base_url = $('meta[name="base_url"]').attr('content');
               var  Current_url = base_url+"/emp/leads/view?emp_id="+emp_id+"&camp_id="+camp_id+"&date_from="+date_from+"&date_to="+date_to;
    
                $(window).attr("location",Current_url);
        });
</script>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\lead_updated\resources\views/employees/single_emp_view.blade.php ENDPATH**/ ?>