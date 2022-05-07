<style>
    .lead_emp_wrapper {
        display: flex;
        justify-content: space-between;
        position: absolute;
        width: 100%;
        padding-right: 5%;
    }
    ul.side_emp_asign {
    padding: 0;
    list-style: none;
    }
    ul.side_emp_asign .emp_list{
    max-height: 30vh;
    overflow-y: scroll;
    }
    ul.side_emp_asign li div {
        font-size: 12.5px;
        font-weight: 400;
        color: #455a64;
    }
    .lead_emp_wrapper
    /* width */
     ul.side_emp_asign .emp_list::-webkit-scrollbar {
    width: 5px;
    }

    /* Track */
     ul.side_emp_asign .emp_list::-webkit-scrollbar-track {
    background: #f1f1f1;
    }

    /* Handle */
     ul.side_emp_asign .emp_list::-webkit-scrollbar-thumb {
    background: #888;
    }

    /* Handle on hover */
     ul.side_emp_asign .emp_list::-webkit-scrollbar-thumb:hover {
    background: #555;
    }
    .left_side_total_leads{
        display: flex;
        flex-direction: column;
    }
    @media (max-width:767px){
        .lead_emp_wrapper {
        display: block;
        position: unset;
        padding-right: 0;
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
                        <li class="breadcrumb-item active"> Employees Performance</li>
                    </ol>
                </div>
                <div>
                    <!--<button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>--->
                </div>
            </div>



            <div class="container-fluid">

                <div class="row">
                    
                    <div class="col-12">
                       <div class="card card-outline-info">
                            
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Employee Performance</h4>
                            </div>
                            
                            <div class="card-body">
      
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
                                                <div class="form-group">
                                                    <br>
                                                     <a type="button" href="<?php echo e(route('getViewLeads').$urls); ?>" class="btn btn-success addButton"> View in Tabular Format</a>
                                                </div>
                                            </div>

                                        </div>
                                        
                                    </div>
                                </form>
                            <div>
                                <?php if(!empty(request()->get('campaign_id'))): ?>
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
                               
                               
                                <div class="lead_emp_wrapper">
                                    <ul class="list-inline left_side_total_leads m-t-40">
                                        <li>
                                            <h5><i class="fa fa-square m-r-5" style="color: #108c36"></i>Total Leads : <span id="Total_Leads"><?php echo e($Grand_total_leads); ?></span></h5>
                                        </li>
                                        <li>
                                            <h5><i class="fa fa-square m-r-5" style="color: #e35022"></i>Total Assigned Leads : <span id="Total_Assigned_Leads"><?php echo e($total_Assigned_leads); ?></span></h5>
                                        </li>
                                        <li>
                                            <h5><i class="fa fa-square m-r-5" style="color: #251e63"></i>Total Pending Assign Leads : <span id="Total_Pending_Assign_Leads"><?php echo e($total_Pending_Assign_leads); ?></span></h5>
                                        </li>
                                       
                                    </ul>
                                    <ul class="side_emp_asign">
                                        <li>
                                            <h5><i class="fa fa-square m-r-5" style="color: #560773"></i>Assigned Emplyee : <span id="Assigned_Emplyee"></span></h5>
                                           <div class="emp_list">
                                            <?php $__currentLoopData = $emp_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_latest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <?php
                                                    $emp_user_Id = $data_latest->id;
                                                     $Emp_total_leads = App\Models\Lead::where(['source_id'=>request()->get('campaign_id'),'asign_to'=>$emp_user_Id])->count();
                                                    $emp_urls = '?employee_id='. $emp_user_Id.'&campaign_id='.request()->get('campaign_id').'&date_from='.request()->get('date_from').'&date_to='.request()->get('date_to');
                                                 ?>
                                                <div><a href="<?php echo e(route('getViewLeads').$emp_urls); ?>"><?php echo e($data_latest->name); ?>  (<?php echo e($Emp_total_leads); ?>)</a></div>
                                                             
                                                <!--<div><?php echo e($data_latest); ?></div>-->
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           </div>
                                           
                                        </li>
                                    </ul>
                                </div>
                                <?php endif; ?> 
                                <h2 style="text-align:center" id="title"></h2>
                                
                                <br>

                                <canvas id="chart3" height="60"></canvas>
                                
                                <br><br>
                                    
                               <!-- <ul class="list-inline text-center m-t-40">
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5" style="color: #009efb"></i>Pending</h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5" style="color: #e30022"></i>Failed</h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5" style="color: #55ce63"></i>Closed</h5>
                                    </li>
                                </ul>-->
                                
                                 <ul class="list-inline text-center m-t-40">
                                    <li>
                                        <h5><i class="fa fa-square m-r-5" style="color: #009efb"></i>Pending Leads : <span id="pending"></span></h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-square m-r-5" style="color: #e30022"></i>Failed Leads : <span id="failed"></span></h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-square m-r-5" style="color: #55ce63"></i>Closed Leads : <span id="closed"></span></h5>
                                    </li>
                                </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
     
            </div>
            


  
<?php $__env->stopSection(); ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

/*
  $(function(){

        $('#employee_id').change(function() {
            
            var employee_id = $(this).val();
            var url = '<?php echo e(url("employees_performance")); ?>?ids='+employee_id;
            window.location.href = url;
        });
        
  });*/

</script>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ANMOL\wamp64\www\cem_leadmanagement\resources\views/employees_performance.blade.php ENDPATH**/ ?>