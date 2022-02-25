@extends('layouts.admin')

 
@section('content')


<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('leads') }}">Leads</a></li>
                        <li class="breadcrumb-item active">Add Lead</li>
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
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info add_custom_table">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Add Lead</h4>
                            </div>
                            <div class="card-body">
                                <form method='post' action="{{ route('leads.store') }}">
                                    @csrf
                                    <div class="form-body add_custom_table">
                                        <!--<h3 class="card-title">Add Lead Details</h3>
                                        <hr>-->

                                           
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Select Source</label>
                                                    <select  name="source_id" class="form-control custom-select" data-placeholder="Select Source" tabindex="1">
                                                        <option value="">Select Source</option>
                                                        @foreach($sources as $sources)
                                                            @if (old('source_id') == $sources['id'])
                                                                <option value="{{ $sources['id'] }}" selected>{{ $sources['source_name'] }}</option>
                                                            @else
                                                                <option value="{{ $sources['id'] }}">{{ $sources['source_name'] }}</option>
                                                            @endif
                                                        @endforeach
                                                       
                                                    </select>
                                                    @if($errors->has('source_id'))
                                                        <div class="alert alert-danger">{{ $errors->first('source_id') }}</div>
                                                    @endif
                                                </div>
                                            </div>


                                            <!--<div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Company Name</label>
                                                    <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Enter Company Name" value="{{ old('company_name') }}">
                                                    @if($errors->has('company_name'))
                                                        <div class="alert alert-danger">{{ $errors->first('company_name') }}</div>
                                                    @endif
                                                </div>
                                            </div>-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" id="prospect_email" name="prospect_email" class="form-control form-control-danger" placeholder="Enter Email" value="{{ old('prospect_email') }}">
                                                    @if($errors->has('prospect_email'))
                                                        <div class="alert alert-danger">{{ $errors->first('prospect_email') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <!--/span-->
                                        </div>

                              

                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input type="text" id="prospect_first_name" name="prospect_first_name" class="form-control" placeholder="Enter First Name" value="{{ old('prospect_first_name') }}">
                                                    @if($errors->has('prospect_first_name'))
                                                        <div class="alert alert-danger">{{ $errors->first('prospect_first_name') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" id="prospect_last_name" name="prospect_last_name" class="form-control form-control-danger" placeholder="Enter Last Name" value="{{ old('prospect_last_name') }}">
                                                    @if($errors->has('prospect_last_name'))
                                                        <div class="alert alert-danger">{{ $errors->first('prospect_last_name') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>


                                        <!-- <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Job Title</label>
                                                    <input type="text" id="job_title" name="job_title" class="form-control" placeholder="Enter Job Title" value="{{ old('job_title') }}">
                                                    @if($errors->has('job_title'))
                                                        <div class="alert alert-danger">{{ $errors->first('job_title') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" id="prospect_email" name="prospect_email" class="form-control form-control-danger" placeholder="Enter Email" value="{{ old('prospect_email') }}">
                                                    @if($errors->has('prospect_email'))
                                                        <div class="alert alert-danger">{{ $errors->first('prospect_email') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                        </div>-->


                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Phone No</label>
                                                    <input type="text" id="contact_number_1" name="contact_number_1" class="form-control" placeholder="Enter Phone No" value="{{ old('contact_number_1') }}">
                                                    @if($errors->has('contact_number_1'))
                                                        <div class="alert alert-danger">{{ $errors->first('contact_number_1') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <!--<div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Web Address</label>
                                                    <input type="text" id="web_address" name="web_address" class="form-control form-control-danger" placeholder="Enter Web Address" value="{{ old('web_address') }}">
                                                    @if($errors->has('web_address'))
                                                        <div class="alert alert-danger">{{ $errors->first('web_address') }}</div>
                                                    @endif
                                                </div>
                                            </div>-->
                                            <!--/span-->
                                        </div>


                                       <!-- <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Employee Size</label>
                                                    <input type="text" id="employee_size" name="employee_size" class="form-control" placeholder="Enter Employee Size" value="{{ old('employee_size') }}">
                                                    @if($errors->has('employee_size'))
                                                        <div class="alert alert-danger">{{ $errors->first('employee_size') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                          
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Revenue Size</label>
                                                    <input type="text" id="revenue_size" name="revenue_size" class="form-control form-control-danger" placeholder="Enter Revenue Size" value="{{ old('revenue_size') }}">
                                                    @if($errors->has('revenue_size'))
                                                        <div class="alert alert-danger">{{ $errors->first('revenue_size') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                        </div>-->


                                         <div class="row p-t-20">
                                            <!--<div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">company_industry</label>
                                                    <input type="text" id="company_industry" name="company_industry" class="form-control" placeholder="Enter Industry" value="{{ old('company_industry') }}">
                                                    @if($errors->has('company_industry'))
                                                        <div class="alert alert-danger">{{ $errors->first('company_industry') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Physical Address</label>
                                                    <input type="text" id="physical_address" name="physical_address" class="form-control form-control-danger" placeholder="Enter Physical Address" value="{{ old('physical_address') }}">
                                                    @if($errors->has('physical_address'))
                                                        <div class="alert alert-danger">{{ $errors->first('physical_address') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                           
                                        </div>-->


                                        <!-- <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">City</label>
                                                    <input type="text" id="city" name="city" class="form-control" placeholder="Enter City" value="{{ old('city') }}">
                                                    @if($errors->has('city'))
                                                        <div class="alert alert-danger">{{ $errors->first('city') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">State</label>
                                                    <input type="text" id="state" name="state" class="form-control form-control-danger" placeholder="Enter State" value="{{ old('state') }}">
                                                    @if($errors->has('state'))
                                                        <div class="alert alert-danger">{{ $errors->first('state') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                           
                                        </div>-->

                                        <!-- <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Zip Code</label>
                                                    <input type="text" id="zip_code" name="zip_code" class="form-control" placeholder="Enter Zip Code" value="{{ old('zip_code') }}">
                                                    @if($errors->has('zip_code'))
                                                        <div class="alert alert-danger">{{ $errors->first('zip_code') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Country</label>
                                                    <input type="text" id="country" name="country" class="form-control form-control-danger" placeholder="Enter Country" value="{{ old('country') }}">
                                                    @if($errors->has('country'))
                                                        <div class="alert alert-danger">{{ $errors->first('country') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                      
                                        </div>-->

                                       <!-- <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Linkedin Address</label>
                                                    <input type="text" id="linkedin_address" name="linkedin_address" class="form-control" placeholder="Enter Linkedin Address" value="{{ old('linkedin_address') }}">
                                                    @if($errors->has('linkedin_address'))
                                                        <div class="alert alert-danger">{{ $errors->first('linkedin_address') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                           
                                        </div>-->






                                     
                                
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                         <input type="reset" class="btn btn-inverse" value="Cancel" />
                                            <a href="{{ url('leads') }}"><button type="button" class="btn btn-info">Back</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
        
               
        </div>
  
@endsection

