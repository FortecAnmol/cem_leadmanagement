<?php $__env->startSection('content'); ?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Dashboard</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
            <li class="breadcrumb-item active">Export Leads </li>
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
                    <h4 class="m-b-0 text-white">Export Leads </h4>
                </div>

                <div class="card-body">
                    <h1> EXPORT PDF AND EXCEL</h1>
                    <a href="<?php echo e(url('lead/export')); ?>" id="loading" class="btn btn-info pull-right">Leads
                        Reports Download</a>
                    
                    <a href="<?php echo e(url('lead/exportCsv')); ?>" class="btn btn-info pull-right">Lead
                        Download</a>
                </div>
            </div>

        </div>
    </div>


</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\cem_leadmanagement\resources\views/exportExcelPdf.blade.php ENDPATH**/ ?>