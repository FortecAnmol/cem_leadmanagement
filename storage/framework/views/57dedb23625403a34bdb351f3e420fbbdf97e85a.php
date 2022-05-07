

 
<?php $__env->startSection('content'); ?>


<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(url('leads')); ?>">Leads</a></li>
                        <li class="breadcrumb-item active">Edit Lead</li>
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
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Edit Lead</h4>
                            </div>
                            <div class="card-body">
                               <form method='post' action="<?php echo e(route('leads.update', [$data->id])); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <?php echo e(method_field('PATCH')); ?>

                                    <div class="form-body add_custom_table">
                                        <!--<h3 class="card-title">Edit Lead Details</h3>
                                        <hr>-->

                                           
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Select Source</label>
                                                    <select  name="source_id" class="form-control custom-select" data-placeholder="Select Source" tabindex="1">
                                                        <option value="">Select Source</option>
                                                        <?php $__currentLoopData = $sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sources): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($data->source_id == $sources['id']): ?>
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
                                                    <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Enter Company Name" value="<?php echo e($data->company_name); ?>">
                                                    <?php if($errors->has('company_name')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('company_name')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>-->
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" id="prospect_email" name="prospect_email" class="form-control form-control-danger" placeholder="Enter Email" value="<?php echo e($data->prospect_email); ?>">
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
                                                    <input type="text" id="prospect_first_name" name="prospect_first_name" class="form-control" placeholder="Enter First Name" value="<?php echo e($data->prospect_first_name); ?>">
                                                    <?php if($errors->has('prospect_first_name')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('prospect_first_name')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" id="prospect_last_name" name="prospect_last_name" class="form-control form-control-danger" placeholder="Enter Last Name" value="<?php echo e($data->prospect_last_name); ?>">
                                                    <?php if($errors->has('prospect_last_name')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('prospect_last_name')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>


                                         <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label">Organization  Industry</label>
                                                    <input type="text" id="company_industry" name="company_industry" class="form-control" placeholder="Enter Organization Industry" value="<?php echo e($data->company_industry); ?>">
                                                    <?php if($errors->has('company_industry')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('company_industry')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label">Organization</label>
                                                    <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Enter Company Name" value="<?php echo e($data->company_name); ?>">
                                                    <?php if($errors->has('company_name')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('company_name')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                        </div>


                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Contact No </label>
                                                    <input type="text" id="contact_number_1" name="contact_number_1" class="form-control" placeholder="Enter Contact No" value="<?php echo e($data->contact_number_1); ?>">
                                                    <?php if($errors->has('contact_number_1')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('contact_number_1')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Another Contact No</label>
                                                    <input type="text" id="contact_number_2" name="contact_number_2" class="form-control form-control-danger" placeholder="Enter Another No" value="<?php echo e($data->contact_number_2); ?>">
                                                    <?php if($errors->has('contact_number_2')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('contact_number_2')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>


                                      <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label">Prospect Name</label>
                                                    <input type="text" id="prospect_name" name="prospect_name" class="form-control" placeholder="Enter Prospect Name" value="<?php echo e($data->prospect_name); ?>">
                                                    <?php if($errors->has('prospect_name')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('prospect_name')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Designation</label>
                                                    <input type="text" id="designation" name="designation" class="form-control form-control-danger" placeholder="Enter Designation" value="<?php echo e($data->designation); ?>">
                                                    <?php if($errors->has('designation')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('designation')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                           
                                        </div>


                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">Linkedin Address</label>
                                                    <input type="text" id="linkedin_address" name="linkedin_address" class="form-control" placeholder="Enter Linkedin Address" value="<?php echo e($data->linkedin_address); ?>">
                                                    <?php if($errors->has('linkedin_address')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('linkedin_address')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Bussiness Function</label>
                                                    <input type="text" id="bussiness_function" name="bussiness_function" class="form-control form-control-danger" placeholder="Enter Bussiness Function" value="<?php echo e($data->bussiness_function); ?>">
                                                    <?php if($errors->has('bussiness_function')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('bussiness_function')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Designation Level</label>
                                                    <input type="text" id="designation_level" name="designation_level" class="form-control" placeholder="Enter Designation Level" value="<?php echo e($data->designation_level); ?>">
                                                    <?php if($errors->has('designation_level')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('designation_level')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                           
                                        </div>


                                        <!-- <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">City</label>
                                                    <input type="text" id="city" name="city" class="form-control" placeholder="Enter City" value="<?php echo e($data->city); ?>">
                                                    <?php if($errors->has('city')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('city')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">State</label>
                                                    <input type="text" id="state" name="state" class="form-control form-control-danger" placeholder="Enter State" value="<?php echo e($data->state); ?>">
                                                    <?php if($errors->has('state')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('state')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                        </div>-->

                                       <!--  <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Zip Code</label>
                                                    <input type="text" id="zip_code" name="zip_code" class="form-control" placeholder="Enter Zip Code" value="<?php echo e($data->zip_code); ?>">
                                                    <?php if($errors->has('zip_code')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('zip_code')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Country</label>
                                                    <input type="text" id="country" name="country" class="form-control form-control-danger" placeholder="Enter Country" value="<?php echo e($data->country); ?>">
                                                    <?php if($errors->has('country')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('country')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                           
                                        </div>

                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Linkedin Address</label>
                                                    <input type="text" id="linkedin_address" name="linkedin_address" class="form-control" placeholder="Enter Linkedin Address" value="<?php echo e($data->linkedin_address); ?>">
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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u709485375/domains/fortecsalesforce.com/public_html/cem_leadmanagement/resources/views/leads/edit.blade.php ENDPATH**/ ?>