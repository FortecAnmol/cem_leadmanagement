<style>
    .table td, .table th {
    padding:5px 0 !important;
    font-size: 12.5px;
    vertical-align: middle !important;
}
.table-striped tbody tr:nth-of-type(odd) {
    background: #f2f4f859 !important;
}
.wraping {
    height: auto !important;
}
</style>
 
<?php $__env->startSection('content'); ?>
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
                        <li class="breadcrumb-item active">Failed Lead List</li>
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
                                <h4 class="m-b-0 text-white">Failed Lead List</h4>
                            </div>

                            <div class="card-body">
                                <!--<h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->

                                <div class="table-responsive m-t-40">

                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sr. No</th>
                                                <th>Campaign Name</th>
                                                <th>Lead Name</th>
                                                <!--<th>Company Name</th>
                                                <th>Job Title</th>-->
                                                <th>Email</th>
                                                <th>Phone No.</th>
                                                <th>Date</th>
                                               <!-- <th>Source</th>
                                                <th>Feedback</th>-->
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
                                                <td class="wraping"><a href="<?php echo e(url('/leads', [$data['id']])); ?>"><?php echo e($data['prospect_first_name'].' '.$data['prospect_last_name']); ?></a></td>
                                                <!--<td class="wraping"><?php echo e($data['company_name']); ?></td>
                                                <td><?php echo e($data['job_title']); ?></td>-->
                                                <td class="wraping"><?php echo e($data['prospect_email']); ?></td>
                                                <td><?php echo e($data['contact_number_1']); ?></td>
                                                <td>
                                                    <?php echo e(date('d M, Y h:i A', strtotime($data['updated_at']))); ?>

                                                    
                                       
                                                <td>
                                                    <a href="<?php echo e(url('/feedbacks/add', [$data['id']])); ?>">
                                                        <span type="button" class="label" data-toggle="tooltip" data-placement="top" title="Add Feedback" style="color:#000;font-size: 15px;"> <i class="fa fa-comments-o" aria-hidden="true"></i></span>  
                                                    </a>
                                                   
                                                    <a href="<?php echo e(url('/notes/view', [$data['id']])); ?>">
                                                        <span type="button" class="label" data-toggle="tooltip" data-placement="top" title="View All Notes" style="color:#000;font-size: 15px;"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                                    </a>

                                                </td>
                      
                                            </tr>
                                             <?php $i = $i+1; ?>
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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\cem_leadmanagement_10_feb\resources\views/leads/failed.blade.php ENDPATH**/ ?>