<style>
    .table td, .table th {
    padding:5px 0 !important;
    font-size: 12.5px;
}
.table-striped tbody tr:nth-of-type(odd) {
    background: #f2f4f859 !important;
}
span.label.label-info {
    cursor: pointer;
}
li.error_list {
    list-style-type: none;
}
i.fa-brands.fa-linkedin {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    /* font-size: inherit; */
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
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
                        <li class="breadcrumb-item active">Pending Leads </li>
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
                                <h4 class="m-b-0 text-white">Pending Leads of <?php echo e($data[0]['source']['source_name']); ?></h4>
                            </div>

                            <div class="card-body">
                                <div class="seacrh-by-dropdown-wrapper">
                                    <label for="recipient-name" class="control-label">Select Search By: </label>
                                    <select class="form-control"  id="status_search" name="status_search">
                                    <option id="option" value="0">All</option>
                                    <option value="1">Sr. No</option>
                                    <option value="2">Company Name</option>
                                    <option value="3">Prospect Name</option>
                                    <option style="display: none" value="6">LinkedIn Name</option> 
                                    <option value="5">Time Zone</option>
                                    <option value="6">Designation</option>
                                    <option value="7">Phone No.</option>
                                    <option style="display: none" value="9">Action</option>
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
                                        <tr id="filter_global0" class="show">
                                            <td class="search-label">Search</td>
                                            <td align="center"><input type="text" placeholder="Global Search" class="global_filter" id="global_filter"></td>
                                        </tr>
                                        <tr id="filter_col1" class="filter_call" data-column="0">
                                            <td class="search-label">Search</td>
                                            <td align="center"><input type="text" placeholder="Sr. Number Search"  class="column_filter" id="col0_filter"></td>
                                        </tr>
                                        <tr id="filter_col2" class="filter_call" data-column="1">
                                            <td class="search-label">Search</td>
                                            <td align="center"><input type="text" placeholder="Company name Search" class="column_filter" id="col1_filter"></td>
                                        </tr>
                                        <tr  id="filter_col3" class="filter_call" data-column="2">
                                            <td class="search-label">Search</td>
                                            <td align="center"><input type="text" placeholder="Prospect name Search" class="column_filter" id="col2_filter"></td>
                                        </tr>
                                        <tr  style="visibility: hidden" id="filter_col4" class="filter_call" data-column="3">
                                            <td class="search-label">Search</td>
                                            <td align="center"><input type="text" class="column_filter" id="col3_filter"></td>
                                        </tr>
                                        <tr id="filter_col5" class="filter_call" data-column="4">
                                            <td class="search-label">Search</td>
                                            <td align="center"><input type="text" placeholder="Time Zone Search" class="column_filter" id="col4_filter"></td>
                                        </tr>
                                        <tr id="filter_col6" class="filter_call" data-column="5">
                                            <td class="search-label">Search</td>
                                            <td align="center"><input type="text"  placeholder="Designation Search" class="column_filter" id="col5_filter"></td>
                                        </tr>
                                        <tr id="filter_col7" class="filter_call" data-column="6">
                                            <td class="search-label">Search</td>
                                            <td align="center"><input type="text" placeholder="Phone Number Search" class="column_filter" id="col6_filter"></td>
                                        </tr>
                                        <tr style="visibility: hidden" id="filter_col7" class="filter_call" data-column="6">
                                            <td class="search-label">Search</td>
                                            <td align="center"><input type="text" class="column_filter" id="col6_filter"></td>
                                        </tr>
                                    </tbody>
                                </table>
							
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
							
                                <!--<h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->
                             
                                <div class="table-responsive m-t-40">

                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sr. No</th>
                                                <th>Company Name</th>
                                                <th>Prospect Name</th>
                                                <th>LinkedIn</th>
                                                <th>Time Zone</th>
                                                <th>Designation</th>
                                                <th>Phone No.</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($i); ?></td>
                                                <td><?php echo e($data['company_name']); ?></td>
                                                <?php
                                                    // $sources_data = App\Models\Source::where(['id'=>$data['source_id']])->first();
                                                    ?>
                                                    
                                                <td><a href="<?php echo e(url('/leads', [$data['id']])); ?>"><?php echo e($data['prospect_first_name'].' '.$data['prospect_last_name']); ?></a></td>
                                                <td><a href="<?php echo e($data['linkedin_address']); ?>" target="_blank"><i  alt="LinkedIn Address" title="LinkedIn Address" class="fa-brands fa-linkedin" aria-hidden="true"></i></a></td>
                                                <td><?php echo e($data['timezone']); ?></td>
                                                <td class="designation"><?php echo e($data['designation']); ?></td>
                                                <!--<td><?php echo e($data['company_name']); ?></td>
                                                <td><?php echo e($data['job_title']); ?></td>-->
                                                
                                                <td><?php echo e($data['contact_number_1']); ?></td>
                                                
             
                                                <td>
                                                    <a href="<?php echo e(url('/leads', [$data['id']])); ?>"><span class="label" data-toggle="tooltip" data-placement="top" title="View" style="color:#000;font-size: 15px;"><i class="fa fa-eye" aria-hidden="true"></i></span></a>   
                                                    <a href="<?php echo e(url('/leads/' . $data['id'] . '/edit')); ?>"><span class="label" data-toggle="tooltip" data-placement="top" title="Edit Lead" style="color:#000;font-size: 15px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a>
                                                    <a href="<?php echo e(url('/notes/add', [$data['id']])); ?>">
                                                    <span class="label" data-toggle="tooltip" data-placement="top" title="Add Notes" style="color:#000;font-size: 15px;"> <span class="material-icons">library_add</span></span>
                                                    </a>
                                                    
                                                    <a href="<?php echo e(url('/notes/view', [$data['id']])); ?>">
                                                        <span  class="label" data-toggle="tooltip" data-placement="top" title="View All Notes" style="color:#000;font-size: 15px;"> <span class="material-icons">preview</span></span>
                                                    </a>
                                                    <span class="label label-info" onclick="document.getElementById('lead_id_quick_note').value=<?php echo e($data['id']); ?>" data-toggle="modal" data-target="#status-modal-quicknote">Add Quick note</span>
                                                    <span class="label label-info" onclick="document.getElementById('lead_id').value=<?php echo e($data['id']); ?>" data-toggle="modal" data-target="#status-modal">Change Status</span>
                                                </td>
                                                <?php
                                                 $notesCount =  App\Models\Note::where(['lead_id'=>$data['id']])->count();
                                                 $LhsReportCount =  App\Models\LhsReport::where(['lead_id'=>$data['id']])->count();

                                                ?>
                                                 <input type="hidden" id="notes_count_<?php echo e($data['id']); ?>" name="notes_count" value="<?php echo e($notesCount); ?>">
                                                 <input type="hidden" id="Lhsreport_count_<?php echo e($data['id']); ?>" name="Lhsreport_count" value="<?php echo e($LhsReportCount); ?>">

                                                </tr>
                                            <?php $i = $i+1; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                              
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Sr. No</th>
                                                <th class="campain_name">Company Name</th>
                                                <th  class="prospect_name" style="visibility: hidden">Prospect Name</th>
                                                <th style="visibility: hidden">LinkedIn</th>
                                                <th>Time Zone</th>
                                                <th class="designation">Designation</th>
                                                <th class="phone_no" style="visibility: hidden">Phone No.</th>
                                                <th class="prospect_name" style="visibility: hidden">Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
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
  
    <!--<script type = "text/javascript" src = "//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js" ></script>-->
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
        }
    });
</script>

  
  
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\cem_leadmanagement_10_feb\resources\views/notes/particular_camp_assign_emp.blade.php ENDPATH**/ ?>