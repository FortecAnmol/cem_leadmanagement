<style>
    .table td, .table th {
    padding:5px 0 !important;
    font-size: 12.5px;
}
.table-striped tbody tr:nth-of-type(odd) {
    background: #f2f4f859 !important;
}
.form-control {
    padding: 2 !important;
}
</style>

 
<?php $__env->startSection('content'); ?>

<?php
    $urls = '?employee_id='.request()->get('employee_id').'&campaign_id='.request()->get('campaign_id').'&date_from='.request()->get('date_from').'&date_to='.request()->get('date_to');
?>

 <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Daily Report </li>
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
                                <h4 class="m-b-0 text-white">Daily Report </h4>
                            </div>

                            <div class="card-body">
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
                                              <option value="">Select Campaign Name</option>
                                                    <?php $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaigns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($campaign_id == $campaigns['id']): ?>
                                                            <option value="<?php echo e($campaigns['id']); ?>" selected><?php echo e($campaigns['source_name']); ?>  (<?php echo e($campaigns['description']); ?>)</option>
                                                        <?php else: ?>
                                                            <option value="<?php echo e($campaigns['id']); ?>"><?php echo e($campaigns['source_name']); ?> (<?php echo e($campaigns['description']); ?>)</option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Date From</label>
                                            <input type="datetime-local" class="form-control" placeholder="Date From" name="date_from" value="<?php echo e(old($date_from)); ?>" id="date_from_new">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Date To</label>
                                        <input type="datetime-local" class="form-control" placeholder="Date To" name="date_to" value="<?php echo e(old($date_to)); ?>"  id="date_to_new">
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <br>
                                        <button type="button" id="sub_cmap" class="btn btn-success">Search</button>
                                    </div>
                                </div>
							</div>
                                <div class="form-group" style="
                                    display: flex;
                                    justify-content: flex-end;
                                    width: 100%;">
                                    <br>
                                    <a type="button" href="<?php echo e(url('/employee/man_daily_report'.$urls)); ?>" class="btn btn-success addButton"> Export Report </a>

                                </div>
							 <!-- sample modal content -->
                                <div id="status-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <form id="ajaxform">

                                             <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

                                             <div>
                                            <ul></ul>
                                        </div>

											<div class="modal-header">
                                                <h4 class="modal-title">Change Status</h4>
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                              <div class="alert alert-danger print-error-msg" style="display:none">
                                               <ul></ul>
                                                </div>
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Select Status: </label>
                                                        <select class="form-control" id="status" name="status" required>
														<option value="">Select Status</option>
														<option value="3">Closed</option>
														<option value="2">Failed</option>
														</select>
                                                        <?php if($errors->has('status')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('status')); ?></div>
                                                    <?php endif; ?>
                                                    </div>
                                                
                                            </div>
                                            <div class="modal-footer">
											<input type="hidden" id="lead_id" name="lead_id">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <button id="save-data" type="button" class="btn btn-info waves-effect waves-light ">Save changes</button>
                                            </div>
                                        </div>
									</form>
                                    </div>
                                </div>
                                
							
                                <!--<h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->
                             
                                <div class="table-responsive m-t-40">

                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="Latest_Updated">Sr. No</th>
                                                <th>Lead Name</th>
                                                <th>Reminder Type</th>
                                                <th>Latest Updated Note</th>
                                                <th>Updated Note Date</th>
                                                
                                                <th>Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($i); ?></td>
                                                <?php
                                                $get_ids = App\Models\Lead::where('id',$data['lead_id'])->get();
                                                foreach ($get_ids as $get_lead_id) {
                                                    # code...
                                                }
                                                ?>
                                                    <td><a href="<?php echo e(url('/leads', [$get_lead_id['id']])); ?>"><?php echo e($data['prospect_first_name'].' '.$data['prospect_last_name']); ?></a></td>
                                                    <td>
                                                        <?php
                                                        $sget_dates = App\Models\Note::where('lead_id',$data['lead_id'])->orderBy('created_at','desc')->get()->unique('lead_id');
                                                     ?>
                                                    
                                                    <?php if($data['reminder_for'] == ''): ?>
                                                    <p> </p>
                                                    <?php else: ?>
                                                        <p class="campain_name" data-toggle="tooltip" data-placement="top"><span><?php echo e($data['reminder_for']); ?></span><?php echo e($data['reminder_for']); ?></p>
                                                    <?php endif; ?>
                                                    
                                                </td>
                                                    <td>
                                                     
                                                     <?php if($data['feedback'] == ''): ?>
                                                     <p> </p>
                                                     <?php else: ?>
                                                     
                                                         <?php
                                                         $result = substr($data['feedback'], 0, 20);
                                                         ?>
                                                         <?php if(strlen($data['feedback']) > 20): ?>
                                                         <p class="campain_name" data-toggle="tooltip" data-placement="top"><span><?php echo e($data['feedback']); ?></span><?php echo e($result); ?></p>
                                                         <?php else: ?>
                                                         <?php echo e($data['feedback']); ?>

                                                         <?php endif; ?>
                                                     <?php endif; ?>
                                                     
                                                 </td>
                                                 <?php   
                                                //  $updated_date =  date('Y-m-d', strtotime($data['updated_at']));
                                                 $updated_date =  $data['updated_at'];
                                                 $time = optional($updated_date)->format('h:i a',strtotime($updated_date));
                                                 $new_updated_date   = optional($updated_date)->format('d-m-Y H:m:s');
                                                 ?>
                                                 <td><?php echo e($new_updated_date); ?></td>
                                                 
                                                 <?php
                                                //  $status = '';
                                                //  if ($data['status'] == 1) {
                                                //     $status =  'pending';
                                                // } elseif ($data['status'] == 3) {
                                                //     $status =  'closed';
                                                // } elseif ($data['status'] == 2) {
                                                //     $status =  'failed';
                                                // } else{
                                                //     $status =  'In Progress';
                                                // }
                                                 ?>
                                                 <?php if($data['status'] == 1): ?>
                                                 <td> <span class="label" data-toggle="tooltip" data-placement="top" title="Pending" style="color:#000;font-size: 15px;"><img style="width: 20px" src="<?php echo e(asset('public/admin/assets/images/pending.png')); ?>" alt="pending"><span class="lead_status_sapn">1</span></span></td>
                                                 <?php elseif($data['status'] == 3): ?>
                                                <td><span  class="label" data-toggle="tooltip" data-placement="top" title="Closed" style="color:#000;font-size: 15px;"><img style="width: 20px" src="<?php echo e(asset('public/admin/assets/images/completed.png')); ?>" alt="completed"><span class="lead_status_sapn">3</span></span></td>
                                                 <?php elseif($data['status'] == 2): ?>
                                                <td><span class="label"  data-toggle="tooltip" data-placement="top" title="Failed" style="color:#000;font-size: 15px;" class="label"><img style="width: 20px" src="<?php echo e(asset('public/admin/assets/images/failed.png')); ?>" alt="failed"><span class="lead_status_sapn">2</span></span></td>
                                                 <?php elseif($data['status'] == 4): ?>
                                                <td><span class="label"  data-toggle="tooltip" data-placement="top" title="In Progress" style="color:#000;font-size: 15px;" class="label"><img style="width: 20px" src="<?php echo e(asset('public/admin/assets/images/in-progress.png')); ?>" alt="In Progress"><span class="lead_status_sapn">4</span></span></td>
                                                 <?php endif; ?>
                                    
                                            </tr>
                                            <?php $i = $i+1; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          
                              
                                        </tbody>
                                    </table>
                                    <?php
                                           //$cookie_name = "last_url";
                                          // $cookie_value =  route('employe.view_camp', [$data['source_id']]) ;
                                          // setcookie($cookie_name, $cookie_value,time()+3600,'/');
                                           
                                            ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

               
        </div>
  
    <!--<script type = "text/javascript" src = "//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js" ></script>-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const camp_id = urlParams.get('camp_id');
        const emp_id = urlParams.get('emp_id');
        const date_from = urlParams.get('date_from');
        const date_to = urlParams.get('date_to');
       
 $(document).on("click","#sub_cmap",function() {
               var campaign_id = $('#campaign_id').val();
               var employee_id = $('#employee_id').val();
               var date_from = $('#date_from_new').val();
               var date_to = $('#date_to_new').val();
               var base_url = $('meta[name="base_url"]').attr('content');
               var  Current_url = base_url+"/man_daily_report?"+"employee_id="+employee_id+"&campaign_id="+campaign_id+"&date_from="+date_from+"&date_to="+date_to;
    
                $(window).attr("location",Current_url);
        });
</script>
  <script>
$( document ).ready(function() {
  
    $("#status").change(function() {
       var selected_val =   $('option:selected', this).val();
       lead_id = $("input[name=lead_id]").val(); 
        if(selected_val == 3){
            $("#save-data").attr("disabled", true);
             var create_notes_count_id   =  "notes_count_"+lead_id;
             var total_notes_count = $("#"+create_notes_count_id).val();
             if(total_notes_count > 0){
                var base_url = $('meta[name="base_url"]').attr('content');
                var  Current_url = base_url+"/employee/lhs_report/"+ lead_id+"?status="+selected_val;
                window.location.href = Current_url;
             }else{
                 $('.alert.alert-danger.print-error-msg').show();
                $('ul.custom_text').html('<li class="error_list"><span class="tab">Please add a notes first.</span></li>');
                 alert('jjdjdjj');
        
              }
          
        }else{
            $("#save-data").attr("disabled", false);
        }
    });

  $("#save-data").click(function(event){
      event.preventDefault();
     
      let status = $("select[name=status]").val(); 
      let lead_id = $("input[name=lead_id]").val(); 
      let _token   = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        url: '<?php echo e(route("changeStatus")); ?>',
        type:"POST",
        data:{
          lead_id:lead_id,
          status:status,
          _token: _token
        },
        success:function(response){
            if($.isEmptyObject(response.error)){
                toastr.success(response.success,'Success!')
                  $('#user-notf-count').val(response.notification_count);
                  if(response) {
                     $(".print-error-msg").css('display','none');
                     alert(response.notification_count);
                     console.log(response.notification_count);
                    $('.success').text(response.success);
                    $("#ajaxform")[0].reset();
                  }
            }else{
                  toastr.error(response.error,'Error!');
            }
        },
       });


      function printErrorMsg (msg) {
        console.log(msg);
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            //$.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+msg+'</li>');
           // });
        }


  });
        $(".set_camp_id").click(function () {
          var get_url =   $(this).attr('href');
           console.log(get_url);
           $.cookie("get_last_url", get_url,{ path: '/' });
        });

});
</script>

  
  
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ANMOL\wamp64\www\cem_leadmanagement\resources\views/employees/man_daily_report.blade.php ENDPATH**/ ?>