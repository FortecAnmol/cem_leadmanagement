<style>
    .table td, .table th {
    padding:5px 0 !important;
    font-size: 12.5px;
}
.table-striped tbody tr:nth-of-type(odd) {
    background: #f2f4f859 !important;
}
form label {
    margin-bottom: 0;
    color: #081840;
    font-weight: 700 !important;
}
.form-body .row-changed .form-group {
    position: relative;
}

.form-body .row-changed .form-group .control-label {
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
                        <li class="breadcrumb-item"><a href="<?php echo e(url('notes')); ?>">Notes</a></li>
                        <li class="breadcrumb-item active">Add Note</li>
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
                                <h4 class="m-b-0 text-white">Add Note</h4>
                            </div>

                            <div class="card-body">
                               

                    
                            <form action="<?php echo e(route('notes.store')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                    <div class="form-body">
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                     <label class="control-label">Lead Name</label>
                                                    <h6 class="card-subtitle"><?php echo e($data['prospect_first_name'].' '.$data['prospect_last_name']); ?></h6>
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


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Date</label>
                                                    <h6 class="card-subtitle"><?php echo e($data['created_at']); ?></h6>
                                                </div>
                                            </div>
                                        </div>


                                         <div class="row p-t-20 row-changed">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Reminder Date</label>
                                                    <!--<input type="date" class="form-control" placeholder="Reminder Date" name="reminder_date" value="<?php echo e(old('reminder_date')); ?>">-->

                                                      <input type="text" class="form-control" placeholder="Reminder Date" name="reminder_date" value="<?php echo e(old('reminder_date')); ?>" id="min-date">

                                                    <?php if($errors->has('reminder_date')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('reminder_date')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                   
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Reminder For</label>
                                                    <input type="text" class="form-control" placeholder="Reminder For" name="reminder_for" value="<?php echo e(old('reminder_for')); ?>">
                                                    <?php if($errors->has('reminder_for')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('reminder_for')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row  row-changed">
                                          
                                   
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Note</label>
                                                    <input type="hidden" class="form-control" name="lead_id" placeholder="Lead Id" value="<?php echo e($data['id']); ?>">
                                                    <textarea type="text" class="form-control" name="note" placeholder="Enter Note" style="min-height: 130px;"><?php echo e(old('note')); ?></textarea>
                                                    <?php if($errors->has('note')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('note')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                     
                               
                                   
                                  <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                         <input type="reset" class="btn btn-inverse" value="Cancel" />
                                       <?php 
                                       if(!isset($_COOKIE['get_last_url'])) {
                                        $last_url = redirect()->getUrlGenerator()->previous();
                                    } else {
                                        $last_url =  $_COOKIE['get_last_url'];
                                    }
                                    ?>
                                            <a href="<?php echo e($last_url); ?>"><button type="button" class="btn btn-info">Back</button></a>
                                    </div>

                                    </form>     


                                    <div class="table-responsive m-t-40">

                                	
                                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                           
                                                    <!--<th>Date</th>-->
                                                    <th>Lead Name</th>
                                                    <th>Note</th>
                                                    <th>Reminder Date</th>
                                                    <th>Reminder For</th>
                                                     <?php if(auth()->user()->is_admin == 1): ?>
                                                    <th>Action</th>
                                                    <?php endif; ?>
                                                  
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $data['notes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <!--<td><?php echo e($record['created_at']); ?></td>-->
                                                    <td><?php echo e($record['lead']['prospect_first_name'].' '.$record['lead']['prospect_last_name']); ?></td>
                                                    <td><?php echo e($record['feedback']); ?></td>
                                                    <td><?php echo e(date('d M, Y', strtotime( $record['reminder_date']))); ?></td>
                                                    <td><?php echo e($record['reminder_for']); ?></td>
                                                    <?php if(auth()->user()->is_admin == 1): ?>
                                                    <td><a href="<?php echo e(url('/notes/' . $record['id'] . '/edit')); ?>"><span class="label" data-toggle="tooltip" data-placement="top" title="Edit Lead" style="color:#000;font-size: 15px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a></td>
                                                    <?php endif; ?>
                                        
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   
                                  
                                            </tbody>
                                        </table>
                                    </div>
                                        
                                    </div>
                                   
                      
                    
                          
                                
                            </div>
                        </div>

                    </div>
                </div>

               
        </div>
  
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\lead\resources\views/notes/add.blade.php ENDPATH**/ ?>