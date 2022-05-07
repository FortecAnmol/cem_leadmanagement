<style>
    .progress-bar.bg-progress {
        background: #108c36;
    }
    i.fa.fa-check.text-progress {
        color: #108c36;
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
                        <li class="breadcrumb-item active">Dashboard</li>
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
                <div class="card-group">
                    
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <a href="<?php echo e(url('leads/closed')); ?>">
                                <div class="col-12">
                                    <h2 class="m-b-0"><i class="fa fa-check text-progress"></i></h2>
                                    <h3 class=""><?php echo e($totalClosedLeads); ?></h3>
                                    <h6 class="card-subtitle">Campaign Total Closed Leads</h6></div>
                                </a>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-progress" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <a href="<?php echo e(url('notes/in_progress')); ?>">
                                <div class="col-12">
                                    <h2 class="m-b-0"><i class="fa fa-check text-success"></i></h2>
                                    <h3 class=""><?php echo e($totalInprogressLeads); ?></h3>
                                    <h6 class="card-subtitle">Campaign Total Inprogress Leads</h6></div>
                                </a>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                 <a href="<?php echo e(url('leads/failed')); ?>">
                                <div class="col-12">
                                    <h2 class="m-b-0"><i class="fa fa-exclamation-triangle text-danger"></i></h2>
                                    <h3 class=""><?php echo e($totalFailedLeads); ?></h3>
                                    <h6 class="card-subtitle">Campaign Total Failed Leads</h6></div>
                                </a>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <a href="<?php echo e(url('reminder/view')); ?>">
                                <div class="col-12">
                                    <h2 class="m-b-0"><i class="fa fa-bell text-warning"></i></h2>
                                    <h3 class=""><?php echo e($todayReminders); ?></h3>
                                    <h6 class="card-subtitle">Today's Reminder</h6></div>
                                </a>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
                <!-- Row -->
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
                                    <h4 class="m-b-0 text-white">Campaigns</h4>
    
                                </div>
                                
                                <div class="card-body">
                                    <div class="table-responsive m-t-40">
                                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Campaign</th>
                                                    <th>Leads</th>
                                                    <th>Last Login</th>
                                                    <th>Comments since last session</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                            <?php
                                            $sources_data = App\Models\Source::where(['id'=>$data['source_id']])->first();
                                            $futureDate=date('Y-m-d h:i:s', strtotime('+1 year'));
                                            $user_name = App\Models\User::where(['id'=>auth()->user()->id])->first();
                                            $count = App\Models\Note::where(['source_id'=>$data['source_id']])
                                            ->whereBetween('created_at', [$user_name['last_login'], $futureDate])->count();
                                            $lastlogin_new = date("d-m-Y H:m:s", strtotime($user['last_login']));
                                            ?>
                                            <td><?php echo e($sources_data->source_name); ?></td>
                                                <td><?php echo e($data['totalLeads']); ?></td>
                                                <td><?php echo e($lastlogin_new); ?></td>
                                                <td><?php echo e($count); ?></td> 
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

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo e(asset('public/admin/assets/images/users/1.jpg')); ?>" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo e(asset('public/admin/assets/images/users/2.jpg')); ?>" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo e(asset('public/admin/assets/images/users/3.jpg')); ?>" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo e(asset('public/admin/assets/images/users/4.jpg')); ?>" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo e(asset('public/admin/assets/images/users/5.jpg')); ?>" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo e(asset('public/admin/assets/images/users/6.jpg')); ?>" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo e(asset('public/admin/assets/images/users/7.jpg')); ?>" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?php echo e(asset('public/admin/assets/images/users/8.jpg')); ?>" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ANMOL\wamp64\www\cem_leadmanagement\resources\views/employeeDashboard.blade.php ENDPATH**/ ?>