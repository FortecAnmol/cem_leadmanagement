@extends('layouts.admin')
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
 
@section('content')
<?php
date_default_timezone_set('Asia/Kolkata');
?>
<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
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

                        @if (Session::has('success'))
                           <div class="alert alert-success" role="alert">
                               {{Session::get('success')}}
                           </div>
                        @elseif (Session::has('error'))
                           <div class="alert alert-danger" role="alert">
                               {{Session::get('error')}}
                           </div>
                        @endif
                        
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Failed Lead List</h4>
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
                             <!-- sample modal content -->
                             <div id="status-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <form id="ajaxform">

                                         <meta name="csrf-token" content="{{ csrf_token() }}" />

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
                                                    <option style="display: none" value="4">In progress</option>
                                                    <option value="1">Pending</option>
                                                    <option style="display: none" value="3">Closed</option>
                                                    <option style="display: none" value="2">Failed</option>
                                                    </select>
                                                    @if($errors->has('status'))
                                                    <div class="alert alert-danger">{{ $errors->first('status') }}</div>
                                                @endif
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
                                             @php $i = 1; @endphp
                                            @foreach($data as $data)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <?php
                                                    $sources_data = App\Models\Source::where(['id'=>$data['source_id']])->first();
                                                    ?>
                                                    <td>{{ $sources_data->source_name }}</td>
                                                <td class="wraping">{{ $data['company_name'] }}</td>
                                                <td class="wraping"><a href="{{ url('/leads', [$data['id']]) }}">{{ $data['prospect_first_name'].' '.$data['prospect_last_name'] }}</a></td>
                                                <td><a href="{{$data['linkedin_address']}}" target="_blank" ><i  alt="LinkedIn" title="LinkedIn" class="fa-brands fa-linkedin" aria-hidden="true"></i></a></td>
                                                <td>{{$data['timezone']}}</td>
                                                <td class="designation">{{ $data['designation'] }}</td>

                                                {{-- <td>{{ $data['job_title'] }}</td> --}}
                                                {{-- <td class="wraping">{{ $data['prospect_email'] }}</td> --}}
                                                <td>{{ $data['contact_number_1'] }}</td>
                                                <td>
                                                    {{ date('d M, Y h:i A', strtotime($data['updated_at'])) }}
                                                    {{-- {{ date('d M, Y', strtotime($data['updated_at'])) }}</td> --}}
                                       
                                                <td>
                                                    <a href="{{ url('/feedbacks/add', [$data['id']]) }}">
                                                        <span type="button" class="label" data-toggle="tooltip" data-placement="top" title="Add Feedback" style="color:#000;font-size: 15px;"> <i class="fa fa-comments-o" aria-hidden="true"></i></span>  
                                                    </a>
                                                   
                                                    <a href="{{ url('/notes/view', [$data['id']]) }}">
                                                        <span type="button" class="label" data-toggle="tooltip" data-placement="top" title="View All Notes" style="color:#000;font-size: 15px;"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                                    </a>
                                                    <span class="label label-info" onclick="document.getElementById('lead_id').value={{ $data['id'] }}" data-toggle="modal" data-target="#status-modal">Change Status</span>

                                                </td>
                      
                                            </tr>
                                             @php $i = $i+1; @endphp
                                            @endforeach
                               
                              
                                        </tbody>
                                        <tfoot class="custom-table-foot">
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


//alert(status+'--lead='+lead_id+'--token='+_token);

      $.ajax({
        url: '{{route("changeStatus")}}',
        type:"POST",
        data:{
          lead_id:lead_id,
          status:status,
          _token: _token
        },
        success:function(response){

            //console.log(response);

            if($.isEmptyObject(response.error)){
                console.log(response);
                toastr.success(response.success,'Success!')
                  if(response) {
                     $(".print-error-msg").css('display','none');
                    $('.success').text(response.success);
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
                    //location.reload(true);
                    $("#ajaxform")[0].reset();
                  //}else{
                   // printErrorMsg(response.error);
                  }

            }else{
                //printErrorMsg(response.error);
                
                 //$('.error').text(response.error);
                  toastr.error(response.error,'Error!');
                  // location.reload(true);
               // toastr.error('errors messages');
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
  
@endsection

