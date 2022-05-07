 
<?php $__env->startSection('content'); ?>

<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(url('notes')); ?>">Notes</a></li>
                        <li class="breadcrumb-item active">Edit Note</li>
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
                                <h4 class="m-b-0 text-white">Edit Note</h4>
                            </div>

                            <div class="card-body">
                                <!--<h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->

                    
                          <form action="<?php echo e(route('notes.update', [$data['id']])); ?>" method="post" >
                          	<?php echo csrf_field(); ?>
                            <?php echo e(method_field('PATCH')); ?>

                                    <div class="form-body add_custom_table">
                                        
                                        
                                        <div class="row p-t-20">
                                            

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Reminder Date</label>
                                                    <!--<input type="date" class="form-control" placeholder="Reminder Date" name="reminder_date" value="<?php echo e($data['reminder_date']); ?>">--->

                                                    <input type="text" class="form-control" placeholder="Reminder Date" name="reminder_date" value="<?php echo e($data['reminder_date']); ?>" id="min-date">

                                                    <?php if($errors->has('reminder_date')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('reminder_date')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                        </div>


                                         <div class="row p-t-20">
                                            
                                   
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Reminder For</label>
                                                    <input type="text" class="form-control" placeholder="Reminder For" name="reminder_for" value="<?php echo e($data['reminder_for']); ?>">
                                                    <?php if($errors->has('reminder_for')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('reminder_for')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                        </div>



                                         <div class="row p-t-20">
                                            
                    
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Note</label>
                                                    <textarea type="text" class="form-control" name="note" placeholder="Enter Note" style="min-height: 130px;"><?php echo e($data['feedback']); ?></textarea>
                                                    <?php if($errors->has('note')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('note')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                        </div>


                                     
                               
                                   
                                  <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update</button>
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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\lead\resources\views/notes/edit.blade.php ENDPATH**/ ?>