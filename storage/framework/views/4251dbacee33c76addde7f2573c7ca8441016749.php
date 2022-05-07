
<style>
    .table td, .table th {
    padding:5px 0 !important;
    font-size: 12.5px;
    vertical-align: middle !important;
}
.table-striped tbody tr:nth-of-type(odd) {
    background: #f2f4f859 !important;
}
.table th {
    padding: 5px !important;
}
.wraping {
    height: auto !important;
}
td {
    white-space: pre-wrap;
}
.feedback_td {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow-y: auto;
    border: none !important;
}
/* width */
.feedback_td::-webkit-scrollbar {
  width:4px;
}

/* Track */
.feedback_td::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
.feedback_td::-webkit-scrollbar-thumb {
  background: rgb(187, 187, 187);
}

/* Handle on hover */
.feedback_td::-webkit-scrollbar-thumb:hover {
  background: rgb(100, 100, 100);
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
                        <li class="breadcrumb-item active">Reminders</li>
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
                                <h4 class="m-b-0 text-white">Reminders</h4>
                            </div>

                            <div class="card-body">
                                <!--<h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->

                    
                          
                                <div class="table-responsive m-t-40">

                                	
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                       
                                                <!--<th>Date</th>-->
                                                <th>Lead Name</th>
                                                 <th>Job Title</th>
                                                <th>Note</th>
                                                <th>Reminder Date</th>
                                                <th>Reminder For</th>
                                                
                                              
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php if($data): ?>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <!--<td><?php echo e($record['created_at']); ?></td>-->
                                                <td><?php echo e($record['lead']['prospect_first_name'].' '.$record['lead']['prospect_last_name']); ?></td>
                                                 <td><?php echo e($record['lead']['lead_name']); ?></td>
                                                <td class="feedback_td"><?php echo e($record['feedback']); ?></td>
                                                <td><?php echo e(date('d M, Y', strtotime( $record['reminder_date']))); ?></td>
                                                <td class="feedback_td"><?php echo e($record['reminder_for']); ?></td>
                                                

                      
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
                               
                              
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

               
        </div>
  
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u709485375/domains/fortecsalesforce.com/public_html/cem_leadmanagement/resources/views/reminder/view.blade.php ENDPATH**/ ?>