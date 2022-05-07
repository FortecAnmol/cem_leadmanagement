<style>
    form label {
    font-weight: 700 !important;
    color: #081840 !important;
}
.row-changed .form-group {
    position: relative;
}

.row-changed .form-group .control-label {
    position: absolute;
    left: 5px;
    top: -10px;
    background: #fff;
    padding: 0 7px;
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
                        <li class="breadcrumb-item active">Add Feedback</li>
                    </ol>
                </div>
                <div>
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
                                <h4 class="m-b-0 text-white">Add Feedback</h4>
                            </div>

                            <div class="card-body">

                    
                          <form action="<?php echo e(route('feedbacks.store')); ?>" method="post">
                          	<?php echo csrf_field(); ?>
                                    <div class="form-body">
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Job Title</label>
                                                     <h6 class="card-subtitle"><?php echo e($data['lead_name']); ?></h6>
                                                </div>
                                            </div>
                                   
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                     <h6 class="card-subtitle"><?php echo e($data['email']); ?></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Phone No</label>
                                                     <h6 class="card-subtitle"><?php echo e($data['contact_number_1']); ?></h6>
                                                </div>
                                            </div>
                                   
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Source</label>
                                                     <h6 class="card-subtitle"><?php echo e($data['source']['source_name']); ?></h6>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row row-changed">
                                          
                                  
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Feedback</label>
                                                    <input type="hidden" class="form-control" name="lead_id" placeholder="Lead Id" value="<?php echo e($data['id']); ?>">
                                                    <textarea type="text" class="form-control" name="feedback" placeholder="Enter Feedback" ><?php if($data['feedback']): ?> <?php echo e($data['feedback']['feedback']); ?>  <?php endif; ?></textarea>
                                                    <?php if($errors->has('feedback')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('feedback')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                           
                                        </div>
                                     
                               
                                   
                                  <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                         <input type="reset" class="btn btn-inverse" value="Cancel" />
                                           <button type="button" class="btn btn-info" onclick="window.history.back()">Back</button>
                                    </div>

                                    </form>     
                                        
                                    </div>
                                   
                      
                    
                          
                                
                            </div>
                        </div>

                    </div>
                </div>

               
        </div>
  
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\lead_updated\resources\views/feedbacks/add.blade.php ENDPATH**/ ?>