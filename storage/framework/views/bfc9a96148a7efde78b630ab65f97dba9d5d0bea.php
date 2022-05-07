 
<?php $__env->startSection('content'); ?>

<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(url('notes')); ?>">Notes</a></li>
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
                                <h4 class="m-b-0 text-white">View Note</h4>
                            </div>


                            <div class="card-body">

                                   <!--<a type="button" href="<?php echo e(url('/notes/add', [$data['id']])); ?>" class="btn btn-success addButton"> + Add Notes</a><br>
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
                                                   <h6 class="card-subtitle"><?php echo e($sources_data->source_name); ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Lead Name</label>
                                                   <h6 class="card-subtitle"><?php echo e($data['prospect_first_name'].' '.$data['prospect_last_name']); ?></h6>
                                                </div>
                                            </div>
                                   
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                   <h6 class="card-subtitle"><?php echo e($data['email']); ?></h6>
                                                </div>
                                            </div>
                              

                      
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Phone No</label>
                                                   <h6 class="card-subtitle"><?php echo e($data['contact_number_1']); ?></h6>
                                                </div>
                                            </div>
                                   
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Source</label>
                                                    <h6 class="card-subtitle"><?php echo e($data['source']['source_name']); ?></h6>
                                                </div>
                                            </div>
                                            <?php if(auth()->user()->is_admin == 1): ?>
                                             <div class="col-md-2">
                                                <div class="form-group">
                  
                                                    <a type="button" href="<?php echo e(url('/notes/add', [$data['id']])); ?>" class="btn btn-success addButton"> + Add Notes</a>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                   
                      
                    
                          
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
                                                <td>
                                                    
                                                <a href="<?php echo e(url('/notes/' . $record['id'] . '/edit')); ?>"><span class="label" data-toggle="tooltip" data-placement="top" title="Edit Lead" style="color:#000;font-size: 15px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a>
                                                </td>
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
  
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\lead\resources\views/notes/view.blade.php ENDPATH**/ ?>