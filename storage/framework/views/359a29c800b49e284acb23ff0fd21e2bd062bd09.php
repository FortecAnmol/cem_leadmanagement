

 
<?php $__env->startSection('content'); ?>



<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(url('sources')); ?>">Campaigns</a></li>
                        <li class="breadcrumb-item active">Edit Campaign</li>
                    </ol>
                </div>
                <div>
                    <!--<button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>--->
                </div>
            </div>


    <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Edit Campaign</h4>
                            </div>
                            <div class="card-body">
                                  <form method='post' action="<?php echo e(route('sources.update', [$data->id])); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <?php echo e(method_field('PATCH')); ?>

                                    
                                    <div class="form-body add_custom_table">
                                        <!--<h3 class="card-title">Edit Lead Details</h3>
                                        <hr>-->

                                        <div class="alert alert-danger print-error-msg" style="display:none">
                                            <ul></ul>
                                        </div>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Campaign</label>
                                                    <input type="text" id="source_name" name='source_name' class="form-control" placeholder="Enter Campaign" value="<?php echo e($data->source_name); ?>">
                                                    <?php if($errors->has('source_name')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('source_name')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Description</label>
                                                    <input type="text" id="description" name='description' class="form-control" placeholder="Enter Description" value="<?php echo e($data->description); ?>">
                                                    <?php if($errors->has('description')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('description')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Start Date</label>
                                                    <input type="date" name="start_date" class="form-control" value="<?php echo e($data->start_date); ?>">
                                                    <?php if($errors->has('start_date')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('start_date')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">End Date</label>
                                                    <input type="date" name="end_date" class="form-control" value="<?php echo e($data->end_date); ?>">
                                                    <?php if($errors->has('end_date')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('end_date')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        
                                
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success save-data"> <i class="fa fa-check"></i> Save</button>
                                        <input type="reset" class="btn btn-inverse" value="Cancel" />
                                            <a href="<?php echo e(url('sources')); ?>"><button type="button" class="btn btn-info">Back</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
     
    </div>
	
    
  
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u709485375/domains/fortecsalesforce.com/public_html/cem_leadmanagement/resources/views/sources/edit.blade.php ENDPATH**/ ?>