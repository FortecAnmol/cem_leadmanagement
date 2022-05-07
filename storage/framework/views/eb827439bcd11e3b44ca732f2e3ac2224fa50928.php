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
<div class="row page-titles">
   <div class="col-md-5 align-self-center">
      <h3 class="text-themecolor">Dashboard</h3>
   </div>
   <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
         <li class="breadcrumb-item active">Feedbacks</li>
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
               <h4 class="m-b-0 text-white">Notes</h4>
            </div>
            <div class="card-body">
               <!--<h4 class="card-title">Data Export</h4>
                  <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->
               <div class="table-responsive m-t-40">
                  <form id="ajaxform">
                     <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
                     <div class="mian-dp">
                        <div class="main-first">
                           <select class="form-control"  name="employee_id" id="employee_id">
                              <option value="">Select Employee</option>
                              <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if(old('id') == $employees['id']): ?>
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
                        <div class="main-second">
                           <select class="form-control"   id="lead_id" name="lead_id">
                              <option value="">Select Leads</option>
                           </select>
                        </div>
                        <div class="main-third">
                           <button type="submit" id="submitButton" class="btn btn-success">Search</button>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                        </div>
                     </div>
                  </form>
                  <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th>Campaign Name</th>
                           <th>Lead Name</th>
                           <th>Note</th>
                           <th>Date</th>
                           <th>Reminder Date</th>
                           <th>Reminder For</th>
                        </tr>
                     </thead>
                     <tbody></tbody>
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
   $(function(){
   
         $('#employee_id').change(function() {
   
           var  employee_id = $(this).val();
           var _token   = $('meta[name="csrf-token"]').attr('content');
           console.log(employee_id);
   
         $.ajax({
             url: '<?php echo e(route("getLeads")); ?>',
             type:"POST",
             data:{
               employee_id:employee_id,
               _token: _token
             },
             success:function(response){
             console.log(response);
               $('#lead_id').empty();
   
               $.each(response, function(index, response) {
                 if( employee_id ) {
                     $('#lead_id').append('<option value='+response.id+'>'+response.prospect_first_name+' '+response.prospect_last_name+'</option>');
                 }
           });
   
             },
         });
         
     
   
         $.ajax({
             url: '<?php echo e(route("getFeedbacks")); ?>',
             type:"POST",
             data:{
               employee_id:employee_id,
               _token: _token
             },
             success:function(response){
   
                 //console.log(response);
   
                 // $('#showData').html(data);
   
                 $('tbody').empty();
   
               $.each(response, function(index, response) {
   
                 //console.log(response.notes)
   
                 var notes = response.notes;
                  $.each(notes, function(inx, notes) {
                   //console.log(notes.feedback);
                   //var urls = '<?php echo e(url('/leads')); ?>'+'/'+response.id;
         
               $('tbody').append('<tr><td><a href="<?php echo e(url('/leads')); ?>'+'/'+response.id+'">'+response.prospect_first_name+' '+response.prospect_last_name+'</a></td><td class="wraping">'+notes.feedback+'</td><td>'+notes.created_at  +'</td><td>'+notes.reminder_date +'</td><td>'+notes.reminder_for+'</td></tr>');
               });
                  });
   
             },
           });
   
   
   
   
   
         });
   
       $("#submitButton").click(function(event){
   
           event.preventDefault();
      
           var lead_id = $("#lead_id").val();
           var _token   = $('meta[name="csrf-token"]').attr('content');
   
           $.ajax({
             url: '<?php echo e(route("getFeedbacks")); ?>',
             type:"POST",
             data:{
               lead_id:lead_id,
               _token: _token
             },
             success:function(response){
   
                 console.log(response);
   
                 // $('#showData').html(data);
   
                 $('tbody').empty();
   
               $.each(response, function(index, response) {
   
               $('tbody').append('<tr><td>'+response.lead.prospect_first_name+' '+response.lead.prospect_last_name+'</td><td>'+response.feedback+'</td><td>'+response.created_at  +'</td><td>'+response.reminder_date +'</td><td>'+response.reminder_for+'</td></tr>');
           });
   
             },
           });
       });
   
     });
   
   
</script>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\cem_leadmanagement_10_feb\resources\views/feedbacks/list.blade.php ENDPATH**/ ?>