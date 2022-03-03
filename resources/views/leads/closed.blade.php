@extends('layouts.admin')
<style>
    .table td, .table th {
    padding:5px 0 !important;
    font-size: 12.5px;
    vertical-align:middle !important;
}
.table-striped tbody tr:nth-of-type(odd) {
    background: #f2f4f859 !important;
}
.wraping {
    height: auto !important;
}
.table-responsive>.table-bordered {
    border: 1px solid #dee2e6 !important;
}

</style>
 
@section('content')

<style type="text/css">
    
    .icons {

     width: 40px;

    }
</style>
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
                        <li class="breadcrumb-item active">Closed Lead List</li>
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
                                <h4 class="m-b-0 text-white">Closed Lead List</h4>
                            </div>

                            <div class="card-body">
                                <div class="seacrh-by-dropdown-wrapper">
                                    <label for="recipient-name" class="control-label">Search By: </label>
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
                                                <th>Last Updated Note</th>
                                                <th>Duration of Last Updated Note</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot class="custom-table-foot">
                                            <tr>
                                                    <th>Sr. No</th>
                                                    <th class="campain_name">Campaign Name</th>
                                                    <th class="company_name">Company Name</th>
                                                    <th class="prospect_name">Prospect Name</th>
                                                    <th style="visibility: hidden;">LinkedIn</th>
                                                    <th class="time_zone">Time Zone</th>
                                                    <th class="designation">Designation</th>
                                                    <th class="phone_no" style="visibility: hidden;">Phone No.</th>
                                                    <th>Date</th>
                                                    <th class="phone_no" style="visibility: hidden;">Last Updated Note</th>
                                                    <th>Duration of Last Updated Note</th>
                                                    <th class="prospect_name">Action</th>
                                                    </tr>
                                             </tfoot>
                                        <tbody>
                                             @php $i = 1; 
                                            use App\Models\Note; 
                                             @endphp
                                            @foreach($data as $data)
                                            <tr>
                                                <td>
                                                    <?php
                                                $date_today = date('Y-m-d');
                                                    $get_dates = Note::where('lead_id',$data['id'])->groupBy('reminder_date')->get();
                                                        $get_date['reminder_date'] ?? 'default value';
                                                    ?>
                                                    @foreach($get_dates as $get_date)
                                                    @if($date_today == $get_date['reminder_date'])
                                                    <img src="{{ asset('storage/app/images/new_alert.gif') }}"  width='50' height='35' title='Today is Reminder Date' alt='Today is Reminder Date'>
                                                    @else
                                                    @endif
                                                    @endforeach{{ $i }}</td>
                                                <?php
                                                    $sources_data = App\Models\Source::where(['id'=>$data['source_id']])->first();
                                                    ?>
                                                    <td>{{ $sources_data->source_name }}</td>
                                                <td class="wraping">{{ $data['company_name'] }}</td>
                                                <td class="wraping"><a href="{{ url('/leads', [$data['id']]) }}">{{ $data['prospect_first_name'].' '.$data['prospect_last_name'] }}</a></td>
                                                @php
                                                $var = $data['linkedin_address'];
                                                @endphp
                                                @if(strpos($var, 'linkedin') == 0)
                                                <td><a href="javascript:void(0)" ><i style="color: #000" alt="LinkedIn" title="LinkedIn Address Not Valid" class="fa-brands fa-linkedin" aria-hidden="true"></i></a></td>
                                                @else
                                                <td><a href="<?php
                                                        // $var = $data[6]['linkedin_address'];
                                                        if(strpos($var, 'https://') !== 0) {
                                                            echo $kasa = 'https://' . $var;
                                                        } else {
                                                        echo $var;
                                                        }
                                                    ?>" target="_blank" ><i  alt="LinkedIn" title="LinkedIn" class="fa-brands fa-linkedin" aria-hidden="true"></i></a></td>
                                                @endif
                                                <td>{{$data['timezone']}}</td>
                                                <td class="designation">{{ $data['designation'] }}</td>
                                                {{-- <td>{{ $data['job_title'] }}</td> --}}
                                                {{-- <td class="wraping">{{ $data['prospect_email'] }}</td> --}}
                                                <td>{{ $data['contact_number_1'] }}</td>
                                                <td>
                                                   
                                                    {{-- {{ date('d M, Y H:i:s', strtotime($data['updated_at'])) }} --}}
                                                    
                                                    {{ date('d M, Y h:i A', strtotime($data['updated_at'])) }}
                                                
                                                </td>
                                                <td><?php
                                                    $sget_dates = Note::where('lead_id',$data['id'])->orderBy('created_at','desc')->get()->unique('lead_id');
                                                 ?>
                                                 @foreach($sget_dates as $get_date)
                                                 @if($get_date['feedback'] == '')
                                                 <p> </p>
                                                 @else
                                                 <p class="campain_name" data-toggle="tooltip" data-placement="top" title="{{$get_date['feedback']}}">
                                                     @php
                                                     $result = substr($get_date['feedback'], 0, 20);
                                                     @endphp
                                                     @if (strlen($get_date['feedback']) > 20)
                                                     {{$result}}.....
                                                     @else
                                                     {{$get_date['feedback']}}
                                                     @endif
                                                   </p>
                                                 @endif
                                                 @endforeach</td>
                                                 <td><?php
                                                     foreach ($sget_dates as $get_date) {
                                                         if($get_date['created_at'] == ''){
                                                            echo  "Null";
                                                         }else{
                                                           echo  $get_date['created_at'];
                                                         }  
                                                     } 
                                                    ?></td>
                  
                                                <td>

                                                     <a href="{{ url('/feedbacks/add', [$data['id']]) }}">
                                                     <span type="button" class="label" data-toggle="tooltip" data-placement="top" title="Add Feedback" style="color:#000;font-size: 15px;"> <span class="material-icons">chat</span></span>
                                                    </a>
                                                   
                                                    <a href="{{ url('/notes/view', [$data['id']]) }}">
                                                    <span type="button" class="label" data-toggle="tooltip" data-placement="top" title="View All Notes" style="color:#000;font-size: 15px;"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                                    </a>
                                                    <?php
                                                      $getlhs_report =  App\Models\LhsReport::where(['lead_id'=>$data['id']])->first();
                                                  
                                                    ?>
                                                    @if(!empty($getlhs_report))
                                                    <a href="{{ url('/employee/lhs_report/view_lhs', [$data['id']]) }}">
                                                        <span class="label" data-toggle="tooltip" data-placement="top" title="View LHS Report" style="color:#000;font-size: 15px;"><span class="material-icons">pageview</span></span>
                                                    </a>
                                                    <a href="{{ url('/employee/lhs_report/edit', [$data['id']]) }}">
                                                        <span class="label" data-toggle="tooltip" data-placement="top" title="Edit LHS Report" style="color:#000;font-size: 15px;"><span class="material-icons">drive_file_rename_outline</span></span>
                                                    </a>
                                                    @else
                                                    <a href="{{ url('/employee/lhs_report', [$data['id']]) }}">
                                                        <span class="label" data-toggle="tooltip" style="display: none" data-placement="top" title="Add LHS Report" style="color:#000;font-size: 15px;"> <span class="material-icons">library_add</span></span>
                                                    </a>
                                                    
                                                    @endif

                                                </td>
                      
                                            </tr>
                                             @php $i = $i+1; @endphp
                                            @endforeach
                               
                              
                                        </tbody>
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
  
@endsection

