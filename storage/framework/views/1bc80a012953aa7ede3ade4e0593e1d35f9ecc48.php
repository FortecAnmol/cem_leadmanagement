<style>
.table td, .table th {
    padding: 7px 0 !important;
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
<style>

.checl_all_leads {
    width: 34%;
    float: right;
    margin-top: 18px;
    padding: 10px 10px 10px 10px;
    background: #192e62;
    border: 1px solid #192e62;
    color: white;
    border-radius: 0.25rem;
}
.checl_all_leads h4 {
    color: white;
    font-size: 16px;
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
                        <li class="breadcrumb-item active">Assign Leads</li>
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

                         <?php if($errors->has('lead_id')): ?>
                            <div class="alert alert-danger"><?php echo e($errors->first('lead_id')); ?></div>
                        <?php endif; ?>
                        
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Assign Leads</h4>
                            </div>
                            <?php
                             $admin = App\Models\User::where(['is_admin'=>Null,'id'=>auth()->user()->id])->first();
                             if(!empty($admin)){  ?>
                            <form class="form-horizontal form-label-left input_mask" id="assignForm" method='post' action="<?php echo e(route('assignLeadsManager')); ?>">
                            <?php } else { ?>
                                <form class="form-horizontal form-label-left input_mask" id="assignForm" method='post' action="<?php echo e(route('assignLeadsEmployee')); ?>">
                            <?php } ?>
                            <div class="card-body">

                                

                                <div class="table-responsive m-t-40">

                                        
                                            <?php echo csrf_field(); ?>
                                            <div class="mian-dp">
                                            <?php
                                            $admin = App\Models\User::where(['is_admin'=>Null,'id'=>auth()->user()->id])->first();
                                            if(!empty($admin)){  ?>
                                            <div class="main-first">
                                                    <select class="form-control"  name="employee_id" id="employee_id">
                                                        <option value="">Select Manager</option>
                                                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(old('employee_id') == $employees['id']): ?>
                                                                <option value="<?php echo e($employees['id']); ?>" selected><?php echo e($employees['name']); ?></option>
                                                            <?php else: ?>
                                                                <option value="<?php echo e($employees['id']); ?>"><?php echo e($employees['name']); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <?php if($errors->has('employee_id')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('employee_id')); ?></div>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="second">
                                                <button type="submit" id="submitButton" class="btn btn-success save-data">Assign</button>
                                              
                                            
                                            </div>
                                                
                                            </div>
                                          <?php  } else { ?>
                                               <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="ByCheck" data-toggle="tab" href="#searchByCheck" role="tab" aria-controls="check" aria-selected="true">Assign by Checkbox</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="ByRange" data-toggle="tab" href="#searchByRange" role="tab" aria-controls="range" aria-selected="false">Assign by Range</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="searchByCheck" role="tabpanel" aria-labelledby="ByCheck">
                                                        
                                                        <div class="main-first">
                                                            <select class="form-control"  name="employee_id" id="employee_id">
                                                                <option value="">Select Employee</option>
                                                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if(old('employee_id') == $employees['id']): ?>
                                                                <option value="<?php echo e($employees['id']); ?>" selected><?php echo e($employees['name']); ?></option>
                                                                <?php else: ?>
                                                                <option value="<?php echo e($employees['id']); ?>"><?php echo e($employees['name']); ?></option>
                                                                <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <?php if($errors->has('employee_id')): ?>
                                                            <div class="alert alert-danger"><?php echo e($errors->first('employee_id')); ?></div>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="second">
                                                            <button type="submit" id="submitButton" class="btn btn-success save-data">Assign</button>
                                                        </div>
                                                         <div class="checl_all_leads">
                                                                <input class="switch-input all_leads" id="all_leads" name="lead_id[]" type="checkbox" value="all_leads">
                                                                <label for ="all_leads" >
                                                                <h4> Check All Leads</h4>
                                                                </label>
                                                         </div>
                                                    </div>
                                                <div class="tab-pane fade" id="searchByRange" role="tabpanel" aria-labelledby="ByRange">
                                                   
                                                    <div class="col-md-12 mannual_assign">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                            <input type="text" class=" form-control assign_start_id" name="assign_start_id" placeholder="Enter Start Lead ID">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                            <input type="text" class=" form-control assign_end_id" name="assign_end_id" placeholder="Enter End Lead ID">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                              
                                                    
                                                </div>
                                            <!-- </div> -->
                                            <?php } ?>
                                            
                            

                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Campaign Name</th>
                                                <th>Lead Name</th>
                                                <th>Lead ID</th>
                                               <!-- <th>Job Title</th>-->
                                                <th>Email</th>
                                                <th>Phone No.</th>
                                                <th>Date</th>
                            
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                <td class="wraping"><?php echo e($data['id']); ?></td>
                                                <td class="wraping"><?php echo e($data['prospect_email']); ?></td>
                                                <td><?php echo e($data['contact_number_1']); ?></td>
                                                <td><?php echo e(date('d M, Y', strtotime($data['created_at']))); ?></td>

                                                
                                                <td><input type="checkbox" class="basic_checkbox" name="lead_id[]" value="<?php echo e($data['id']); ?>" id="basic_checkbox_<?php echo e($data['id']); ?>" >
                                    <label for="basic_checkbox_<?php echo e($data['id']); ?>"></label></td>


                      
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                               
                              
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>

               
        </div>
        

 
  
<?php $__env->stopSection(); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
     $(document).ready(function () {
        $('input#all_leads').click(function () {     
        $(".basic_checkbox").prop('checked', $(this).prop('checked'));
        });
});
</script>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\cem_leadmanagement\resources\views/leads/assign.blade.php ENDPATH**/ ?>