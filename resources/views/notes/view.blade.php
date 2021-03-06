@extends('layouts.admin')

 
@section('content')
<style>
.table td{
    white-space: pre-wrap;
}
.table td, .table th {
    padding:5px 0 !important;
    font-size: 12.5px;
}
.table-striped tbody tr:nth-of-type(odd) {
    background: #f2f4f859 !important;
}
.feedback_td {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow-y: auto;
    border: none !important;
}
/* width */
.feedback_td::-webkit-scrollbar {
  width:4px;
}

/* Track */
.feedback_td::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
.feedback_td::-webkit-scrollbar-thumb {
  background: rgb(187, 187, 187);
}

/* Handle on hover */
.feedback_td::-webkit-scrollbar-thumb:hover {
  background: rgb(100, 100, 100);
}
 </style>
<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('notes') }}">Notes</a></li>
                        <li class="breadcrumb-item active">View Note</li>
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
                                <h4 class="m-b-0 text-white">View Note</h4>
                            </div>


                            <div class="card-body">

                                   <!--<a type="button" href="{{ url('/notes/add', [$data['id']]) }}" class="btn btn-success addButton"> + Add Notes</a><br>
                                   <br>
                                   <br>-->

                                <!--<h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->

                    
                          
                                    <div class="form-body">
                                        
                                        <div class="row p-t-20">
                                           <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Campaign Name</label>
                                                    <?php
                                                    $sources_data = App\Models\Source::where(['id'=>$data['source_id']])->first();
                                                    ?>
                                                   <h6 class="card-subtitle">{{$sources_data->source_name}}</h6>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Lead Name</label>
                                                   <h6 class="card-subtitle">{{$data['prospect_first_name'].' '.$data['prospect_last_name']}}</h6>
                                                </div>
                                            </div>
                                   
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                   <h6 class="card-subtitle">{{$data['prospect_email']}}</h6>
                                                </div>
                                            </div>
                              

                      
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Phone No</label>
                                                   <h6 class="card-subtitle">{{$data['contact_number_1']}}</h6>
                                                </div>
                                            </div>
                                   
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Source</label>
                                                    <h6 class="card-subtitle">{{$data['source']['source_name']}}</h6>
                                                </div>
                                            </div>
                                            @if(auth()->user()->is_admin == 1)
                                             <div class="col-md-2">
                                                <div class="form-group">
                  
                                                    <a type="button" href="{{ url('/notes/add', [$data['id']]) }}" class="btn btn-success addButton"> + Add Notes</a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>

                                    </div>
                                   
                      
                    
                          
                                <div class="table-responsive m-t-40">

                                	
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                       
                                                <!--<th>Date</th>-->
                                                <th>Lead Name</th>
                                                <th  width="400">Note</th>
                                                <th>Reminder Date</th>
                                                <th>Reminder Type</th>
                                              
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data['notes'] as $record)
                                            <tr>
                                                <!--<td>{{ $record['created_at'] }}</td>-->
                                                <td>{{ $record['lead']['prospect_first_name'].' '.$record['lead']['prospect_last_name'] }}</td>
                                                <td class="feedback_td" width="400">{{ $record['feedback'] }}</td>
                                                <td>{{ date('d M, Y', strtotime( $record['reminder_date'])) }}</td>
                                                <td class="feedback_td">{{ $record['reminder_for'] }}</td>
                                                {{-- @if(auth()->user()->is_admin == 1)
                                                <td>
                                                <a href="{{ url('/notes/' . $record['id'] . '/edit') }}"><span class="label" data-toggle="tooltip" data-placement="top" title="Edit Lead" style="color:#000;font-size: 15px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a>
                                                </td>
                                                @endif --}}
                                    
                                            </tr>
                                            @endforeach
                               
                              
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

               
        </div>

  
@endsection

