 
<?php $__env->startSection('content'); ?>


<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(url('leads')); ?>">Leads</a></li>
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
                                <form method='post' action="<?php echo e(route('leads.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-body add_custom_table">
                                        <!--<h3 class="card-title">Add Lead Details</h3>
                                        <hr>-->

                                           
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Select Source</label>
                                                    <select  name="source_id" class="form-control custom-select" data-placeholder="Select Source" tabindex="1">
                                                        <option value="">Select Source</option>
                                                        <?php $__currentLoopData = $sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sources): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(old('source_id') == $sources['id']): ?>
                                                                <option value="<?php echo e($sources['id']); ?>" selected><?php echo e($sources['source_name']); ?></option>
                                                            <?php else: ?>
                                                                <option value="<?php echo e($sources['id']); ?>"><?php echo e($sources['source_name']); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                       
                                                    </select>
                                                    <?php if($errors->has('source_id')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('source_id')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>


                                            <!--<div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Company Name</label>
                                                    <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Enter Company Name" value="<?php echo e(old('company_name')); ?>">
                                                    <?php if($errors->has('company_name')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('company_name')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" id="prospect_email" name="prospect_email" class="form-control form-control-danger" placeholder="Enter Email" value="<?php echo e(old('prospect_email')); ?>">
                                                    <?php if($errors->has('prospect_email')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('prospect_email')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!--/span-->
                                        </div>

                              

                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input type="text" id="prospect_first_name" name="prospect_first_name" class="form-control" placeholder="Enter First Name" value="<?php echo e(old('prospect_first_name')); ?>">
                                                    <?php if($errors->has('prospect_first_name')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('prospect_first_name')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" id="prospect_last_name" name="prospect_last_name" class="form-control form-control-danger" placeholder="Enter Last Name" value="<?php echo e(old('prospect_last_name')); ?>">
                                                    <?php if($errors->has('prospect_last_name')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('prospect_last_name')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>


                                        <!-- <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Job Title</label>
                                                    <input type="text" id="job_title" name="job_title" class="form-control" placeholder="Enter Job Title" value="<?php echo e(old('job_title')); ?>">
                                                    <?php if($errors->has('job_title')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('job_title')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" id="prospect_email" name="prospect_email" class="form-control form-control-danger" placeholder="Enter Email" value="<?php echo e(old('prospect_email')); ?>">
                                                    <?php if($errors->has('prospect_email')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('prospect_email')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                        </div>-->


                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Phone No</label>
                                                    <input type="text" id="contact_number_1" name="contact_number_1" class="form-control" placeholder="Enter Phone No" value="<?php echo e(old('contact_number_1')); ?>">
                                                    <?php if($errors->has('contact_number_1')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('contact_number_1')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <!--<div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Web Address</label>
                                                    <input type="text" id="web_address" name="web_address" class="form-control form-control-danger" placeholder="Enter Web Address" value="<?php echo e(old('web_address')); ?>">
                                                    <?php if($errors->has('web_address')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('web_address')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>-->
                                            <!--/span-->
                                        </div>


                                       <!-- <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Employee Size</label>
                                                    <input type="text" id="employee_size" name="employee_size" class="form-control" placeholder="Enter Employee Size" value="<?php echo e(old('employee_size')); ?>">
                                                    <?php if($errors->has('employee_size')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('employee_size')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                          
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Revenue Size</label>
                                                    <input type="text" id="revenue_size" name="revenue_size" class="form-control form-control-danger" placeholder="Enter Revenue Size" value="<?php echo e(old('revenue_size')); ?>">
                                                    <?php if($errors->has('revenue_size')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('revenue_size')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                        </div>-->


                                         <div class="row p-t-20">
                                            <!--<div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">company_industry</label>
                                                    <input type="text" id="company_industry" name="company_industry" class="form-control" placeholder="Enter Industry" value="<?php echo e(old('company_industry')); ?>">
                                                    <?php if($errors->has('company_industry')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('company_industry')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Physical Address</label>
                                                    <input type="text" id="physical_address" name="physical_address" class="form-control form-control-danger" placeholder="Enter Physical Address" value="<?php echo e(old('physical_address')); ?>">
                                                    <?php if($errors->has('physical_address')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('physical_address')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                           
                                        </div>-->


                                        <!-- <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">City</label>
                                                    <input type="text" id="city" name="city" class="form-control" placeholder="Enter City" value="<?php echo e(old('city')); ?>">
                                                    <?php if($errors->has('city')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('city')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">State</label>
                                                    <input type="text" id="state" name="state" class="form-control form-control-danger" placeholder="Enter State" value="<?php echo e(old('state')); ?>">
                                                    <?php if($errors->has('state')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('state')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                           
                                        </div>-->

                                        <!-- <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Zip Code</label>
                                                    <input type="text" id="zip_code" name="zip_code" class="form-control" placeholder="Enter Zip Code" value="<?php echo e(old('zip_code')); ?>">
                                                    <?php if($errors->has('zip_code')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('zip_code')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Country</label>
                                                    <input type="text" id="country" name="country" class="form-control form-control-danger" placeholder="Enter Country" value="<?php echo e(old('country')); ?>">
                                                    <?php if($errors->has('country')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('country')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                      
                                        </div>-->

                                       <!-- <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Linkedin Address</label>
                                                    <input type="text" id="linkedin_address" name="linkedin_address" class="form-control" placeholder="Enter Linkedin Address" value="<?php echo e(old('linkedin_address')); ?>">
                                                    <?php if($errors->has('linkedin_address')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('linkedin_address')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                           
                                        </div>-->






                                     
                                
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                         <input type="reset" class="btn btn-inverse" value="Cancel" />
                                            <a href="<?php echo e(url('leads')); ?>"><button type="button" class="btn btn-info">Back</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
        
               
        </div>
  
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\cem_leadmanagement_10_feb\resources\views/leads/add.blade.php ENDPATH**/ ?>