 
<?php $__env->startSection('content'); ?>

<?php
                                

    $urls = '?emp_id='.intval(request()->get('emp_id')).'&camp_id='.intval(request()->get('camp_id')).'&date_from='.request()->get('date_from').'&date_to='.request()->get('date_to');


    $list_urls = '?emp_id='.intval(request()->get('emp_id')).'&camp_id='.intval(request()->get('camp_id')).'&date_from='.request()->get('date_from').'&date_to='.request()->get('date_to');
     $current_url = URL::current();
     $host = explode('/',$current_url);
     $emp_id = intval($host[5]);

?>

<style>
    .form-control {
      height: calc(0em + .0rem + 0px) !important; 
    }
    .btn {
        margin-top: 5px;
    }
    .tablecustomheader {
        text-align: right !important;
    }
</style>

<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active"> Employees Performance</li>
                    </ol>
                </div>
                <div>
                    <!--<button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>--->
                </div>
            </div>



            <div class="container-fluid">

                <div class="row">
                    
                    <div class="col-12">
                       <div class="card card-outline-info">
                            
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Employee Performance</h4>
                            </div>
                            
                            <div class="card-body">
      
                                <form id="1ajaxform">
                                    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
                                    <div class="form-body">
                                        
                                        <div class="row p-t-20">
                                <div class="col-md-12 tablecustomheader">
                                    <?php
                                    $emp_id =  request()->get('emp_id');
                                    $emp_info = App\Models\User::where(['id' => $emp_id])->first();
                                    ?>
                                    <span>Employee Name:</span>
                                    <span><?php echo e($emp_info->name); ?></span>

                                </div>
                                            
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Campaign Name</label>
                                                     <select class="form-control"  name="camp_id" id="camp_id">
                                                      <option value="">Select Campaign</option>
                                                            <?php $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaigns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                 <?php if($camp_id == $campaigns['source']['id']): ?>
                                                                    <option value="<?php echo e($campaigns['source']['id']); ?>" selected><?php echo e($campaigns['source']['source_name']); ?></option>
                                                                <?php else: ?> 
                                                                    <option value="<?php echo e($campaigns['source']['id']); ?>"><?php echo e($campaigns['source']['source_name']); ?></option>
                                                                 <?php endif; ?> 
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Date From</label>
                                                        <input type="text" class="form-control" placeholder="Date From" name="date_from" value="<?php echo e($date_from); ?>" id="date_from">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Date To</label>
                                                    <input type="text" class="form-control" placeholder="Date To" name="date_to" value="<?php echo e($date_to); ?>" id="date_to">
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <br>
                                                     <button type="button" id="sub_cmap" class="btn btn-success">Search</button>
                                                      
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <br>
                                                     <a type="button" href="<?php echo e(route('getSingleViewLeads').$list_urls); ?>" class="btn btn-success addButton"> View in Tabular Format</a>
                                                </div>
                                            </div>

                                        </div>
                                        
                                    </div>
                                </form>
                            <div>
                                    
                
                                <h2 style="text-align:center" id="title"></h2>
                                
                                <br>

                                <canvas id="emp_chart" height="60"></canvas>
                                
                                <br><br>
                                    
                               <!-- <ul class="list-inline text-center m-t-40">
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5" style="color: #009efb"></i>Pending</h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5" style="color: #e30022"></i>Failed</h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5" style="color: #55ce63"></i>Closed</h5>
                                    </li>
                                </ul>-->
                                
                                 <ul class="list-inline text-center m-t-40">
                                    <li>
                                        <h5><i class="fa fa-square m-r-5" style="color: #009efb"></i>Pending Leads : <span id="emp_pending"></span></h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-square m-r-5" style="color: #e30022"></i>Failed Leads : <span id="emp_failed"></span></h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-square m-r-5" style="color: #55ce63"></i>Closed Leads : <span id="emp_closed"></span></h5>
                                    </li>
                                </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
     
            </div>
            


  
<?php $__env->stopSection(); ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
$( document ).ready(function() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const camp_id = urlParams.get('camp_id');
        const emp_id = urlParams.get('emp_id');
        const date_from = urlParams.get('date_from');
        const date_to = urlParams.get('date_to');
       var url = '<?php echo e(url("new_emp_per")); ?>?emp_id='+emp_id+'&camp_id='+camp_id+'&date_from='+date_from+'&date_to='+date_to;
        console.log(url);
        $(document).on("click","#sub_cmap",function() {
               var camp_id = $('#camp_id').val();
               var date_from = $('#date_from').val();
               var date_to = $('#date_to').val();
               var base_url = $('meta[name="base_url"]').attr('content');
               var  Current_url = base_url+"/employees/"+emp_id+"/performace?emp_id="+emp_id+"&camp_id="+camp_id+"&date_from="+date_from+"&date_to="+date_to;
                $(window).attr("location",Current_url);
            
        });
        

    $.get(url, function(data, status){
        console.log(data);
        console.log('data');
        
        $("#emp_pending").text(data[0].value);
        $("#emp_failed").text(data[1].value);
        $("#emp_closed").text(data[2].value);
        
        var ctx3 = document.getElementById("emp_chart").getContext("2d");
        var data3 = data;
    
            var myPieChart = new Chart(ctx3).Pie(data3,{
                segmentShowStroke : true,
                segmentStrokeColor : "#fff",
                segmentStrokeWidth : 0,
                animationSteps : 100,
                tooltipCornerRadius: 0,
                animationEasing : "easeOutBounce",
                animateRotate : true,
                animateScale : false,
                legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
                responsive: true
            });
    });
});
</script>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\lead_updated\resources\views/employees/single_emp_performace.blade.php ENDPATH**/ ?>