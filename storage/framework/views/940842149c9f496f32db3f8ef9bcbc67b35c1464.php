<?php $__env->startSection('content'); ?>
<style>
   .form-control:disabled, .form-control[readonly] {
    background-color: #e9ecef !important; 
    border: 1px solid #ced4da !important;
    opacity: 0.7;
}
</style>


<div class="row page-titles">
   <div class="col-md-5 align-self-center">
      <h3 class="text-themecolor">Dashboard</h3>
   </div>
   <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
         <li class="breadcrumb-item"><a href="<?php echo e(url('employees')); ?>">Closed Leads</a></li>
         <li class="breadcrumb-item active">Add LHS Report</li>
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
               <h4 class="m-b-0 text-white">LHS Report</h4>
            </div>
            <div class="card-body lhs">
               <form method='post' action="<?php echo e(route('employee.lhs_report_save')); ?>">
                  <?php echo csrf_field(); ?>
                  <div class="form-body ">
                     <div class="row p-t-20">
                        <div class="col-md-6">
                           <div class="form-group">
                              <input type="hidden" id="lead_id" name='lead_id'class="form-control" placeholder="NA" value="<?php echo e($data->id); ?>">

                              <label class="control-label read-only-label">Contact's Name:</label>
                              <input type="text" id="prospect_first_name" name='prospect_first_name'class="form-control" readonly placeholder="Enter Contact Name" value="<?php echo e($data->prospect_first_name .' '. $data->prospect_last_name); ?>" >
                              <?php if($errors->has('prospect_first_name')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('prospect_first_name')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Board Number:</label>
                              <input type="text" id="board_no" name='board_no' class="form-control form-control-danger" placeholder="Enter Board Number" value="<?php echo e(old('board_no')); ?>">
                              <?php if($errors->has('board_no')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('board_no')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label read-only-label">Contact's Designation:</label>
                              <input type="text" id="designation" name='designation'class="form-control" readonly placeholder="Enter Contact's Designation" value="<?php echo e($data->designation); ?>">
                              <?php if($errors->has('designation')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('designation')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Direct Number:</label>
                              <input type="text" id="direct_no" name='direct_no'class="form-control" placeholder="Enter Direct Number" value="<?php echo e(old('direct_no')); ?>">
                              <?php if($errors->has('direct_no')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('direct_no')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label read-only-label">Company:</label>
                              <input type="text" id="company_name" name='company_name'class="form-control" readonly placeholder="Enter Company" value="<?php echo e($data->company_name); ?>">
                              <?php if($errors->has('company_name')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('company_name')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Ext (if any):</label>
                              <input type="text" id="ext_if_any" name='ext_if_any'class="form-control" placeholder="Enter Ext (if any)" value="<?php echo e(old('ext_if_any')); ?>">
                              <?php if($errors->has('ext_if_any')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('ext_if_any')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label read-only-label">Industry:</label>
                              <input type="text" id="industry" name='industry'class="form-control" placeholder="Enter Industry" readonly value="<?php echo e($data->industry); ?>">
                              <?php if($errors->has('industry')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('industry')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label read-only-label">Cell Number:</label>
                              <input type="text" id="contact_number_1" name='contact_number_1'class="form-control" placeholder="Enter Cell Number" readonly value="<?php echo e($data->contact_number_1); ?>">
                              <?php if($errors->has('contact_number_1')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('contact_number_1')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Employees:</label>
                              <input type="text" id="employees_strength" name='employees_strength'class="form-control" placeholder="Enter Employees" value="<?php echo e(old('employees_strength')); ?>">
                              <?php if($errors->has('employees_strength')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('employees_strength')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label read-only-label">Email</label>
                              <input type="text" id="email" name='email' class="form-control" placeholder="Enter Email" readonly value="<?php echo e($data->email); ?>">
                              <?php if($errors->has('email')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('email')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Revenue:</label>
                              <input type="text" id="revenue" name='revenue'class="form-control" placeholder="Enter Revenue" value="<?php echo e(old('revenue')); ?>">
                              <?php if($errors->has('revenue')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('revenue')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">EA Name:</label>
                              <input type="text" id="ea_name" name='ea_name'class="form-control" placeholder="Enter EA Name" value="<?php echo e(old('ea_name')); ?>">
                              <?php if($errors->has('ea_name')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('ea_name')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Address</label>
                              <input type="text" id="address" name='address' class="form-control" placeholder="Enter Address" value="<?php echo e(old('address')); ?>">
                              <?php if($errors->has('address')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('address')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">EA Phone Number:</label>
                              <input type="text" id="ea_contact_number_1" name='ea_contact_number_1'class="form-control" placeholder="Enter EA Phone Number" value="<?php echo e(old('ea_contact_number_1')); ?>">
                              <?php if($errors->has('ea_contact_number_1')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('ea_contact_number_1')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label read-only-label">LinkedIn Profile:</label>
                              <input type="text" id="linkedin_address" name='linkedin_address'class="form-control" readonly placeholder="Enter EA LinkedIn Profile" value="<?php echo e($data->linkedin_address); ?>">
                              <?php if($errors->has('linkedin_address')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('linkedin_address')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">EA Email:</label>
                              <input type="text" id="ea_email" name='ea_email' class="form-control" placeholder="Enter EA Email:" value="<?php echo e(old('ea_email')); ?>">
                              <?php if($errors->has('ea_email')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('ea_email')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Prospect Level:</label>
                              <input type="text" id="prospects_level" name='prospects_level'class="form-control" placeholder="Enter Prospect Level" value="<?php echo e(old('prospects_level')); ?>">
                              <?php if($errors->has('prospects_level')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('prospects_level')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Website:</label>
                              <input type="text" id="website" name='website'class="form-control" placeholder="Enter Website" value="<?php echo e(old('website')); ?>">
                              <?php if($errors->has('website')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('website')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Prospect Vertical:</label>
                              <input type="text" id="	prospect_vertical" name='prospect_vertical'class="form-control" placeholder="Enter Prospect Vertical" value="<?php echo e(old('prospect_vertical')); ?>">
                              <?php if($errors->has('prospect_vertical')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('prospect_vertical')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Opt-in Status:</label>
                              <input type="text" id="opt_in_status" name='opt_in_status'class="form-control" placeholder="Enter Opt-in Status" value="<?php echo e(old('opt_in_status')); ?>">
                              <?php if($errors->has('opt_in_status')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('opt_in_status')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="control-label">Company Description</label>
                              <textarea placeholder="Enter Company Description" id="company_desc" name='company_desc' class="form-control"><?php echo e(old('opt_in_status')); ?></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Responsibilities:</label>
                              <textarea placeholder="Enter Responsibilities" id="responsibilities" name='responsibilities' class="form-control"><?php echo e(old('responsibilities')); ?></textarea>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Team Size:</label>
                              <textarea placeholder="Enter Team Size" id="team_size" name='team_size' class="form-control"><?php echo e(old('team_size')); ?></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Pain Areas:</label>
                              <textarea placeholder="Enter Pain Areas" id="pain_areas" name='pain_areas' class="form-control"><?php echo e(old('pain_areas')); ?></textarea>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">PInterest/New Initiatives:</label>
                              <textarea placeholder="Enter Interest/New Initiatives" id="interest_new_initiatives" name='interest_new_initiatives' class="form-control"><?php echo e(old('interest_new_initiatives')); ?></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Budget:</label>
                              <textarea placeholder="Enter Budget" id="budget" name='budget' class="form-control"><?php echo e(old('budget')); ?></textarea>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Defined Agenda:</label>
                              <textarea placeholder="Enter Defined Agenda" id="defined_agenda" name='defined_agenda' class="form-control"><?php echo e(old('defined_agenda')); ?></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="control-label">Call Notes:</label>
                              <textarea placeholder="Enter Call Notes" id="call_notes" name='call_notes' class="form-control"><?php echo e(old('call_notes')); ?></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label"></label>
                              <h5>Does the prospect wish to have a Face to Face meeting or teleconference?</h5>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label"></label>
                              <input type="text" id="meeting_teleconference" name='meeting_teleconference'class="form-control" placeholder="Teleconference" value="<?php echo e(old('meeting_teleconference')); ?>">
                              <?php if($errors->has('meeting_teleconference')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('meeting_teleconference')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label"></label>
                              <h5>Is the contact the decision maker? If No, then who is?</h5>
                              
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label"></label>
                              <input type="text" id="contact_decision_maker" name='contact_decision_maker'class="form-control" placeholder="Yes/No" value="<?php echo e(old('contact_decision_maker')); ?>">
                              <?php if($errors->has('contact_decision_maker')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('contact_decision_maker')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label"></label>
                              <h5>Who else would be the influencers in the decision making process?</h5>
                              
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label"></label>
                              <input type="text" id="influencers_decision_making_process" name='influencers_decision_making_process'class="form-control" placeholder="NA" value="<?php echo e(old('influencers_decision_making_process')); ?>">
                              <?php if($errors->has('influencers_decision_making_process')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('influencers_decision_making_process')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label"></label>
                              <h5>Is the Company already affiliated with any other similar services? If Yes, Name?</h5>
                              
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label"></label>
                              <input type="text" id="company_already_affiliated" name='company_already_affiliated'class="form-control" placeholder="NA" value="<?php echo e(old('company_already_affiliated')); ?>">
                              <?php if($errors->has('company_already_affiliated')): ?>
                              <div class="alert alert-danger"><?php echo e($errors->first('company_already_affiliated')); ?></div>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Date 1:</label>
                              <input type="date" class="form-control" placeholder="23-Dec-21" name="meeting_date1" value="{ old('meeting_date1') }}" >
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Date 1:</label>
                              <input type="date" class="form-control" placeholder="23-Dec-21" name="meeting_date2" value="{ old('meeting_date2') }}" >
                           </div>
                        </div>
                     </div>
                     
                  </div>
                  <div class="form-actions">
                     <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                     <input type="reset" class="btn btn-inverse" value="Cancel" />
                     <a href=""><button type="button" class="btn btn-info">Back</button></a>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\lead\resources\views/employees/export_Lhs.blade.php ENDPATH**/ ?>