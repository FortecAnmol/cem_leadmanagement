 
<?php $__env->startSection('content'); ?>

<style type="text/css">
    .control-label {
            font-weight: 500;
    }
    
    .vw-lead .col-md-4 {
    background: #fff;
}
.vw-lead .col-md-4 .form-group {
    background: #ffffff;
    padding: 10px 15px;
    text-align: center;
    text-transform: uppercase;
    height: 100%;
    left: 14px;
    position: absolute;
    top: -8px;
    z-index: 5;
    padding-left: 8px;
}
    
.vw-lead .control-label {
    font-weight: 500;
    height: 100%;
    /* vertical-align: top; */
    align-items: center;
    display: flex;
    justify-content: center;
    margin: 0;
    color: #222;
    font-weight: 600;
}
    
    .vw-lead.form-body .col-md-8 {
    border: 1px solid #efefef;
    padding-right: 0 !important;
    max-width: 64.5% !important;
    padding:0;
}
    
    .form-body.vw-lead {
    display: inline-block;
    width: 100%;
    padding-left: 15px;
}

    .vw-lead.form-body .form-group {
    margin-bottom: 0;
}
.vw-lead.form-body .form-group .statusbtnmargin {
    margin-bottom: 16px;
    margin-left: 20px;
}
.vw-lead .form-body {
    padding-left:13px;
}
.col-md-6.show_lead .form-group input.form-control{
/* height:calc(2.5em + 1.75rem + 0px) !important; */
height:47px !important;
color: #747474;
padding-left: 20px;
}
.col-md-6.show_lead .form-group input.form-control::-webkit-input-placeholder { 
color: #747474;
}

.col-md-6.show_lead .form-group input.form-control:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: #747474;
}

.col-md-6.show_lead .form-group input.form-control::placeholder {
  color: #747474;
}
.form-control[readonly]{
    border: none !important;
}


    @media  screen and (max-width: 767px) { 
  .vw-lead .col-md-8 .form-group input {
    text-align: center;
}

.vw-lead.form-body .col-md-8 { 
    max-width: 100% !important;
}

}
/* Anmol */ 
a.form-control {
    height: 47px !important;
    color: #747474;
    display: block;
    padding-left: 20px;
    padding-top: 13px;
}
i.fa-brands.fa-linkedin {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    /* font-size: inherit; */
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
}

    
    
</style>

<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
                        <?php if(Auth::user()->is_admin == 1): ?>
                        <?php  $last_url = redirect()->getUrlGenerator()->previous();  ?>
                        <li class="breadcrumb-item"><a href="<?php echo e($last_url); ?>">View Campaign Leads</a></li>
                        <?php else: ?>
                        <li class="breadcrumb-item"><a href="<?php echo e(url('leads')); ?>">Leads</a></li>
                        <?php endif; ?>

                        <?php if(Auth::user()->is_admin == 1): ?>
                        <?php  $last_url = redirect()->getUrlGenerator()->previous();  ?>
                        <li class="breadcrumb-item active">View Lead</li>
                        <?php else: ?>
                        <li class="breadcrumb-item active">View Leads</li>
                        <?php endif; ?>
                        
                        
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

                    
                          
                                    <div class="form-body vw-lead ">
                                        
                                        <!--<div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label labelstyle">Job Title</label>   
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">   
                                      
                                                            <input class="form-control" type="text" name="lead_name" value="<?php echo e($data['lead_name']); ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label labelstyle">Company Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                          
                                                            <input class="form-control" type="text" name="company_name" value="<?php echo e($data['company_name']); ?>" readonly>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>  
                                        </div>-->
                                        
                                            
                                     <div class="row p-t-20">
                                            <div class="col-md-6 show_lead">
                                                <div class="row ">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label labelstyle">First Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                               
                                                            <input class="form-control" type="text" name="prospect_first_name" value="<?php echo e($data['prospect_first_name']); ?>" readonly>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                            <div class="col-md-6 show_lead">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label labelstyle">Last Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            
                                                            <input class="form-control" type="text" name="prospect_last_name" value="<?php echo e($data['prospect_last_name']); ?>" readonly>
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="row p-t-20">
                                            <div class="col-md-6 show_lead">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label labelstyle">Email</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                           
                                                            <input class="form-control" type="text" name="prospect_email" value="<?php echo e($data['prospect_email']); ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 show_lead">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label class="control-label labelstyle">Campaign Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                     
                                                        <input class="form-control" type="text" name="source_name" value="<?php echo e($data['source']['source_name']); ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="row p-t-20">
                                            <div class="col-md-6 show_lead">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label labelstyle">Contact No 1</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                
                                                           <input class="form-control" type="text" name="contact_number_1" value="<?php echo e($data['contact_number_1']); ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="col-md-6 show_lead">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label labelstyle">Contact No 2</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                      
                                                            <input class="form-control" type="text" name="contact_number_2" value="<?php echo e($data['contact_number_2']); ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-t-20">
                                            
                                            <div class="col-md-6 show_lead">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label labelstyle">Organization Industry</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" name="company_industry" value="<?php echo e($data['company_industry']); ?>" readonly>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>   
                                            <div class="col-md-6 show_lead">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label labelstyle">Organization</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                          
                                                            <input class="form-control" type="text" name="company_name" value="<?php echo e($data['company_name']); ?>" readonly>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>            
                                        </div>

                                        <div class="row p-t-20">
                                            <div class="col-md-6 show_lead">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label class="control-label labelstyle">Prospect Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                       
                                                        <input class="form-control" type="text" name="prospect_name" value="<?php echo e($data['prospect_name']); ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 show_lead">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label class="control-label labelstyle">Designation</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                       
                                                            <input class="form-control" type="text" name="designation" value="<?php echo e($data['designation']); ?>" readonly>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>             
                                        </div>
                

                                        <div class="row p-t-20">
                                            <div class="col-md-6 show_lead">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label class="control-label labelstyle">Linkedin Address</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                       <a class="form-control" target="_blank"  href="<?php echo e($data['linkedin_address']); ?>"><?php echo e($data['linkedin_address']); ?></a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>    
                                            <div class="col-md-6 show_lead">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label labelstyle">Bussiness Function</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                       
                                                            <input class="form-control" type="text" name="bussiness_function" value="<?php echo e($data['bussiness_function']); ?>" readonly>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>             
                                        </div>

                                        <div class="row p-t-20">
                                            <div class="col-md-6 show_lead">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label class="control-label labelstyle">Designation Level</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                  
                                                        <input class="form-control" type="text" name="designation_level" value="<?php echo e($data['designation_level']); ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 show_lead">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label class="control-label labelstyle">Timezone</label>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                            
                                                        <input class="form-control" type="text" name="timezone" value="<?php echo e($data['timezone']); ?>" readonly>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>             
                                        </div>
                                        <!--<div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label class="control-label labelstyle">Country</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                               
                                                        <input class="form-control" type="text" name="country" value="<?php echo e($data['country']); ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label class="control-label labelstyle">Linkedin Address</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                       
                                                        <input class="form-control" type="text" name="linkedin_address" value="<?php echo e($data['linkedin_address']); ?>" readonly>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>             
                                        </div>-->

                                        <div class="row p-t-20">
                                            <div class="col-md-6 show_lead">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label class="control-label labelstyle">Location</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                       
                                                        <input class="form-control" type="text" name="location" value="<?php echo e($data['location']); ?>" readonly>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>  
                                            <div class="col-md-6 show_lead">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label class="control-label labelstyle">Status</label><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                        <?php if($data['status'] == 1): ?>
                                                            <span class="label label-warning statusbtnmargin">Pending</span>
                                                            <span class="label label-info" onclick="document.getElementById('lead_id').value=<?php echo e($data['id']); ?>" data-toggle="modal" data-target="#status-modal">Change Status</span>
                                                            <?php elseif($data['status'] == 2): ?>
                                                            <span class="label label-danger statusbtnmargin">Failed</span>
                                                             <?php elseif($data['status'] == 4): ?>
                                                            <span class="label label-warning statusbtnmargin">In Progress</span>
                                                            <span class="label label-info" onclick="document.getElementById('lead_id').value=<?php echo e($data['id']); ?>" data-toggle="modal" data-target="#status-modal">Change Status</span>
                                                            <?php else: ?>
                                                            <span class="label label-success statusbtnmargin">Closed</span>
                                                            <a href="<?php echo e(url('/employee/lhs_report/view_lhs', [$data['id']])); ?>"><button type="button" class="btn btn-info">View Report</button></a>
                                                            <?php endif; ?></h6>
                                                    <span class="label label-info" onclick="document.getElementById('lead_id_quick_note').value=<?php echo e($data['id']); ?>" data-toggle="modal" data-target="#status-modal-quicknote">Add Quick note</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                      
                                     
                                    </div>

                            </div>
                        </div>

                    </div>
                </div>

               
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
                       <ul class="custom_text"></ul>
                        </div>
                    <div class="modal-body">
                        
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Select Status: </label>
                                <select class="form-control" id="status" name="status" required>
                                <option value="">Select Status</option>
                                <option value="4">In progress</option>
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
        <!-- Quick Notes Add -->

    
    <form id="form">
<div id="status-modal-quicknote" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
             <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
             <div>
            <ul></ul>
        </div>

            <div class="modal-header">
                <h4 class="modal-title">Add Quick Note</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                    <div class="form-group" id="status" name="status">
                        <label class="control-label">Reminder Date</label>
                        <input type="text" class="form-control" placeholder="Reminder Date" name="reminder_date" value="<?php echo e(old('reminder_date')); ?>" id="min-date" data-dtp="dtp_2827e">
                        <label class="control-label">Reminder For</label>
                        <input type="text" class="form-control required" placeholder="Reminder For" id="reminder_for" name="reminder_for" value="<?php echo e(old('reminder_for')); ?>">
                        <label class="control-label">Note</label>
                        <input type="hidden" class="form-control" name="lead_id" placeholder="Lead Id" value="<?php echo e($data['id']); ?>">
                        <textarea required type="text" class="form-control required" name="feedback" id="feedback" placeholder="Enter Note" style="min-height: 130px;"><?php echo e(old('note')); ?></textarea>   
                        <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul class="custom_text"></ul>
                        </div>              
                        <?php if($errors->has('status')): ?>
                        <div class="alert alert-danger"><?php echo e($errors->first('status')); ?></div>
                    <?php endif; ?>
                    </div>
            </div>
            <div class="modal-footer">
            <input type="hidden" id="lead_id_quick_note" name="lead_id_quick_note">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                
                <button id="save-data-quick-note" type="button" class="btn btn-info waves-effect waves-light ">Add Note</button>
            </div>
        </div>
</form>
    
    </div>
</div>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>      
        <script>
$('.modal').on('hidden.bs.modal', function(){
    $("#reminder_for").val('');
    $("#feedback").val('');
    $('.alert.alert-danger.print-error-msg').hide();
    $('#status').prop('selectedIndex',0);
});
// $(".label-info").click(function(){
//   $(".form-control").toggleClass("main");
// });
    $("#save-data-quick-note").click(function(event){
    event.preventDefault();
    let feedback = $("[name=feedback]").val();
    if(feedback == 0){
      $('.alert.alert-danger.print-error-msg').show();
          $('ul.custom_text').html('<li class="error_list"><span class="tab">Note Field Cannot Be Empty!</span></li>');
    } else{
    $('.alert.alert-danger.print-error-msg').hide();
      $('ul.custom_text').html('');
    //   $('alert.alert-success.print-error-msg').show();
    //   $('ul.custom_text').html('<li><span class="error_list">Note Added Successfully</span></li>');
    let feedback = $("[name=feedback]").val();
    let reminder_date = $("[name=reminder_date]").val(); 
    let reminder_for = $("[name=reminder_for]").val(); 
    let lead_id = $("input[name=lead_id_quick_note]").val(); 
    let _token   = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      url: '<?php echo e(route("add_note")); ?>',
      type:"POST",
      data:{
          reminder_date:reminder_date,
          reminder_for:reminder_for,
          lead_id:lead_id,
          feedback:feedback,
        _token: _token
      },
      success:function(response){
          if($.isEmptyObject(response.error)){
              console.log(response);
              toastr.success(response.success,'Success!')
          }else{
                toastr.error(response.error,'Error!');
          }

      },
     });
    }
    function printErrorMsg (msg) {
      console.log(msg);
          $(".print-error-msg").find("ul").html('');
          $(".print-error-msg").css('display','block');
          $(".print-error-msg").find("ul").append('<li>'+msg+'</li>');
      }
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
             var Lhsreport_count_id   =  "Lhsreport_count_"+lead_id;
             var total_Lhsreport_count = $("#"+Lhsreport_count_id).val();
            // alert(total_Lhsreport_count,'lhs');
            // alert(total_notes_count,'notes');
             if(total_Lhsreport_count == 0){
                $('.alert.alert-danger.print-error-msg').show();
                var base_url = $('meta[name="base_url"]').attr('content');
                var  Current_url = base_url+"/employee/lhs_report/"+ lead_id+"?status="+selected_val;
                $('ul.custom_text').html('<li class="error_list"><span class="tab">Please add  LHS Report first.</span><a href="'+Current_url+'" ><span class="tab">Click here to add Lhs Report</span></a></li>');
             }else{
                $("#save-data").attr("disabled", false);
             }
             if(total_notes_count > 0){
                var base_url = $('meta[name="base_url"]').attr('content');
                var  Current_url = base_url+"/employee/lhs_report/"+ lead_id+"?status="+selected_val;
              //  window.location.href = Current_url;
              
             }else{
                 $('.alert.alert-danger.print-error-msg').show();
                 $('ul.custom_text').html('<li class="error_list"><span class="tab">Please add a notes first.</span></li>');
                // alert('jjdjdjj');
            }
          
        }else{
            $("#save-data").attr("disabled", false);
        }
    });
        // $("#status").change(function() {  //redirect functionality to lhs report page
        //    var selected_val =   $('option:selected', this).val();
        //    lead_id = $("input[name=lead_id]").val(); 
        //     if(selected_val == 3){
        //         $("#save-data").attr("disabled", true);
        //          var create_notes_count_id   =  "notes_count_"+lead_id;
        //          var total_notes_count = $("#"+create_notes_count_id).val();
        //          if(total_notes_count > 0){
        //             var base_url = $('meta[name="base_url"]').attr('content');
        //             var  Current_url = base_url+"/employee/lhs_report/"+ lead_id+"?status="+selected_val;
        //             window.location.href = Current_url;
        //          }else{
        //              $('.alert.alert-danger.print-error-msg').show();
        //             $('ul.custom_text').html('<li class="error_list"><span class="tab">Please add a notes first.</span></li>');
        //             // alert('jjdjdjj');
            
        //           }
              
        //     }else{
        //         $("#save-data").attr("disabled", false);
        //     }
        // });
    
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
                    console.log(response);
                    toastr.success(response.success,'Success!')
                      if(response) {
                         $(".print-error-msg").css('display','none');
                        $('.success').text(response.success);
                        var base_url = $('meta[name="base_url"]').attr('content');
                
                            if(response.status == 'failed'){
                                var  Current_url = base_url+"/leads/failed";
                                window.location.href = Current_url;
                            }else if (response.status == 'close'){
                                var  Current_url = base_url+"/leads/closed";
                                window.location.href = Current_url;
                            }else{
                            // var  Current_url = base_url+"/leads/closed";
                            //  window.location.href = Current_url;
                            location.reload(true); // inprogress
                            }
                
                       // location.reload(true);
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
    
    });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ANMOL\xampp\htdocs\cem_leadmanagement_18_feb\resources\views/leads/show.blade.php ENDPATH**/ ?>