 
<?php $__env->startSection('content'); ?>
<style>
    textarea#description1 {
    display: block;
    width: 100%;
    height: calc(1.5em + 1.30rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    resize: auto;
}
</style>


<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(url('sources')); ?>">Campaigns</a></li>
                        <li class="breadcrumb-item active">Add Campaign</li>
                    </ol>
                </div>
                <div>
                    <!--<button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>--->
                </div>
            </div>


    <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
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
                                <h4 class="m-b-0 text-white">Add Campaign</h4>
                            </div>
                            <div class="card-body">
                                <form id="ajaxform" action="<?php echo e(route('import')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                      <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
                                    
                                    <div class="form-body add_custom_table">
                                        <!--<h3 class="card-title">Add Lead Details</h3>
                                        <hr>-->

                                        <div class="alert alert-danger print-error-msg" style="display:none">
                                            <ul></ul>
                                        </div>

                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Campaign</label>
                                                    <input type="text" id="source_name1" name='source_name' class="form-control" placeholder="Enter Campaign" value="<?php echo e(old('source_name')); ?>">
                                                    <?php if($errors->has('source_name')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('source_name')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Description</label>
                                                    <textarea id="description1" name="description"  maxlength="255" placeholder="Enter Description" rows="5" cols="50"><?php echo e(old('description')); ?></textarea>
                                                    <?php if($errors->has('description')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('description')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Start Date</label>
                                                    <input type="date" name="start_date" class="form-control" value="<?php echo e(old('start_date')); ?>">
                                                    <?php if($errors->has('start_date')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('start_date')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">End Date</label>
                                                    <input type="date" name="end_date" class="form-control" value="<?php echo e(old('end_date')); ?>" >
                                                    <?php if($errors->has('end_date')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('end_date')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Import Bulk Leads </label>
                                                    <input style="padding-top: 10px" type="file" name="file" class="form-control">
                                                        <?php if($errors->has('file')): ?>
                                                                <div class="alert alert-danger"><?php echo e($errors->first('file')); ?></div>
                                                        <?php endif; ?>
                                                        <br><br>
                                                   
                                                    <?php if($errors->has('file')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('file')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <br>
                                                <!-- <a class="btn btn-warning" href="<?php echo e(url('/public/leads.csv')); ?>">Download Format</a> -->
                                                </div>
                                            </div>

                                            

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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\lead_updated\resources\views/sources/add.blade.php ENDPATH**/ ?>