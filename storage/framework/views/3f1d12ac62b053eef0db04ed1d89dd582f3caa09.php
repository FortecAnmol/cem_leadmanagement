 
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
                                           
                                                            <input class="form-control" type="text" name="email" value="<?php echo e($data['email']); ?>" readonly>
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
                                                            <input class="form-control" type="text" name="industry" value="<?php echo e($data['industry']); ?>" readonly>
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
                                                       
                                                        <input class="form-control" type="text" name="linkedin_address" value="<?php echo e($data['linkedin_address']); ?>" readonly>
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
                                                            <?php elseif($data['status'] == 2): ?>
                                                            <span class="label label-danger statusbtnmargin">Failed</span>
                                                            <?php else: ?>
                                                            <span class="label label-success statusbtnmargin">Closed</span>
                                                            <a href="<?php echo e(url('/employee/lhs_report/view_lhs', [$data['id']])); ?>"><button type="button" class="btn btn-info">View Report</button></a>
                                                            <?php endif; ?></h6>
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
  
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\lead_updated\resources\views/leads/show.blade.php ENDPATH**/ ?>