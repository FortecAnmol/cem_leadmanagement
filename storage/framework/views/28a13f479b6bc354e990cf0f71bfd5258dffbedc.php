 
<?php $__env->startSection('content'); ?>

<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(url('employees')); ?>">Employees</a></li>
                        <li class="breadcrumb-item active">Add Employee (Manager)</li>
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
                                <h4 class="m-b-0 text-white">Add Employee  (Manager)</h4>
                            </div>
                            <div class="card-body">
                                <form method='post' action="<?php echo e(route('employees.storeManagerEmployee')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-body">
                                        <!--<h3 class="card-title">Add Employee Details</h3>
                                        <hr>-->
                                        <div class="row p-t-20">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Select Manager</label>
                                                    <select  name="manager_id" class="form-control custom-select" data-placeholder="Select Manager" tabindex="1">
                                                        <option value="">Select Manager</option>
                                                        <?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $managers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(old('manager_id') == $managers['id']): ?>
                                                                <option value="<?php echo e($managers['id']); ?>" selected><?php echo e($managers['name']); ?></option>
                                                            <?php else: ?>
                                                                <option value="<?php echo e($managers['id']); ?>"><?php echo e($managers['name']); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                       
                                                    </select>
                                                    <?php if($errors->has('manager_id')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('manager_id')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input type="text" id="prospect_first_name" name='prospect_first_name'class="form-control" placeholder="Enter First Name" value="<?php echo e(old('prospect_first_name')); ?>">
                                                    <?php if($errors->has('prospect_first_name')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('prospect_first_name')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" id="prospect_last_name" name='prospect_last_name' class="form-control form-control-danger" placeholder="Enter Last Name" value="<?php echo e(old('prospect_last_name')); ?>">
                                                    <?php if($errors->has('prospect_last_name')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('prospect_last_name')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Phone No</label>
                                                    <input type="text" id="contact_number_1"  name='contact_number_1' class="form-control" placeholder="Enter Phone No" value="<?php echo e(old('contact_number_1')); ?>">
                                                    <?php if($errors->has('contact_number_1')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('contact_number_1')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" id="email" name='email' class="form-control" placeholder="Enter Email" value="<?php echo e(old('email')); ?>">
                                                    <?php if($errors->has('email')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('email')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Address</label>
                                                    <input type="text" id="address" name='address' class="form-control" placeholder="Enter Address" value="<?php echo e(old('address')); ?>">
                                                    <?php if($errors->has('address')): ?>
                                                        <div class="alert alert-danger"><?php echo e($errors->first('address')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>

                                        <!--/row-->
                                
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <input type="reset" class="btn btn-inverse" value="Cancel" />
                                          <a href="<?php echo e(url('managers')); ?>"><button type="button" class="btn btn-info">Back</button></a>

                                         
                                    </div>
                                </form>
                                 
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
        
               
       
               
               
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
                                    <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\lead\resources\views/employees/addManagerEmployee.blade.php ENDPATH**/ ?>