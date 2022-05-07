<style>
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
</style>

 
<?php $__env->startSection('content'); ?>

<?php 


if (isset($_GET["status"]))
{

if(isset($_GET['status']) && '1' == $_GET['status']) {
    
    $title = "Pending Leads";
}else if($_GET['status'] == 3){
    
    $title = "Closed Leads";
}else if($_GET['status'] == 2){
    
    $title = "Failed Leads";
} else{
    $title = "Leads";
}

}  else{
    $title = "Leads";
}





?>


<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo e($title); ?></li>
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

                                <h4 class="m-b-0 text-white"><?php echo e($title); ?></h4>
                            </div>

                            <div class="card-body">
                                <!--<h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->

                                 <a type="button" href="<?php echo e(route('leads.create')); ?>" class="btn btn-success addButton"> + Add Lead</a>
                                 
                                    <form class="form-horizontal form-label-left input_mask" id="assignForm" method='post' action="<?php echo e(route('searchLead')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <div class="mian-dp">

                                        <div class="main-first">
                                                    <select  name="source_id" class="form-control custom-select" data-placeholder="Select Campaign" tabindex="1">
                                                        <option value="">Select Campaign</option>
                                                        <?php $__currentLoopData = $sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sources): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($source_ids == $sources['id']): ?>
                                                                <option value="<?php echo e($sources['id']); ?>" selected><?php echo e($sources['source_name']); ?></option>
                                                            <?php else: ?>
                                                                <option value="<?php echo e($sources['id']); ?>"><?php echo e($sources['source_name']); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                       
                                                    </select>
                                                    <?php if($errors->has('source_id')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('source_id')); ?></div>
                                                    <?php endif; ?>
                                                </div>

                                

                                        <div class="main-second">
                                                <button type="submit" id="submitButton" class="btn btn-success">Search</button>
                                                </div>
                                                
                                            </div>

                                        </form>


                               
                                <div class="table-responsive m-t-40">

                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sr. No</th>
                                                <th>Campaign</th>
                                                <th>Lead Name</th>
                                                <!--<th>Company Name</th>
                                                 <th>Job Title </th>-->
                                                 <th>Email</th>
                                                 <th>Phone No.</th>
                                        
                                                <th>Date</th>
                                    
                                                <th>Status</th>
                                                <th class="action_th"style="width: auto">Action</th>
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
                                                  $source_data = App\Models\Source::where(['id'=>$data['source_id']])->first();
                                                  // echo"<pre>";print_r($source_data);echo"</pre>";
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


                                                <td><!--<a href="<?php echo e(url('/feedbacks/add', [$data['id']])); ?>"><span class="label label-info">Add Feedback</span></a>--->
                                                    <a href="<?php echo e(url('/notes/view', [$data['id']])); ?>">
                                                        <span class="label" data-toggle="tooltip" data-placement="top" title="View All Notes" style="color:#000;font-size: 15px;"><i class="fa fa-list" aria-hidden="true"></i></span></a></span>
                                                    </a>
                                                 <a href="<?php echo e(url('/leads', [$data['id']])); ?>"><span class="label" data-toggle="tooltip" data-placement="top" title="View" style="color:#000;font-size: 15px;"><i class="fa fa-eye" aria-hidden="true"></i></span></a></span></a>   
                                                 <?php if($data['status'] == 3): ?>
                                                 <a href="<?php echo e(url('/employee/lhs_report/view_lhs', [$data['id']])); ?>">
                                                    <span class="label" data-toggle="tooltip" data-placement="top" title="Download Report" style="color:#000;font-size: 15px;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span></a></span>
                                                </a>
                                                <?php else: ?>
                                                <a href="javascript:void(0)">
                                                    <span class="label" data-toggle="tooltip" data-placement="top" title="Download Report" style="color:#000;font-size: 15px;"><i class="fa fa-ban" aria-hidden="true"></i></span></a></span>
                                                </a>
                                                <?php endif; ?>
                                                <a href="<?php echo e(url('/leads/' . $data['id'] . '/edit')); ?>"><span class="label" data-toggle="tooltip" data-placement="top" title="Edit" style="color:#000;font-size: 15px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a>
                                                
                                                <a href="<?php echo e(url('leads/delete', ['id' => $data['id']])); ?>"  ><span class="label" data-toggle="tooltip" data-placement="top" title="Delete" style="color:red;font-size: 15px;" onclick="return confirm('Are you sure you want to delete this lead ?')"><i class="fa fa-trash" aria-hidden="true"></i></span></a> 

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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\lead_updated\resources\views/leads/list.blade.php ENDPATH**/ ?>