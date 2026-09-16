<?php echo $this->include('admin/template-parts/header'); ?>
<?php echo $this->include('admin/template-parts/navbar'); ?>
<?php echo $this->include('admin/template-parts/sidebar'); ?>
<?php date_default_timezone_set('Asia/Kolkata'); ?>

<div class="content-wrapper pt-2">
    <!-- Content Header (Page header) -->
    <!--<div class="content-header">-->
    <!--    <div class="container-fluid">-->
    <!--        <div class="row mb-0">-->
    <!--            <div class="col-sm-6">-->
    <!--                <h5 class="m-0">Download Report</h5>-->
    <!--            </div>-->
    <!--            <div class="col-sm-6">-->
    <!--                <ol class="breadcrumb float-sm-right">-->
    <!--                    <li class="breadcrumb-item"><a href="<?php //echo base_url('admin/dashboard'); ?>">Dashboard</a></li>-->
    <!--                    <li class="breadcrumb-item"><a href="<?php //echo base_url('admin/customer/view'); ?>">View All Customers</a></li>-->
    <!--                    <li class="breadcrumb-item active">Download Report</li>-->
    <!--                </ol>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row mb-2">
               
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <div class="col-md-12">
                
                    <?php echo $this->include('message'); ?>
                    
                    <div class="card card-primary card-outline">
                        <div class="pt-2 pb-2">
                            <!-- <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                            </div> -->

                            <form action="#" name="d1" method="POST" autocomplete="off">

                                <div class="container">
                                   
                                    <div class="row mb-4">
                                        <div class="col-md-3">
                                            <label style="font-size:13px;">From: <span class="text-red">*</span></label>
                                            <input type="text" id="date" name="from_date" class="form-control form-control-sm" value="<?php echo date('Y-m-d'); ?>" placeholder="Select Date From" required>
                                        
                                        </div>
                                        <div class="col-md-3">
                                            <label style="font-size:13px;">To: <span class="text-red">*</span></label>
                                            <input type="text" id="date1" name="to_date" class="form-control form-control-sm" value="<?php echo date('Y-m-d'); ?>" placeholder="Select Date To" required>
                                        
                                        </div>

                                        <div class="col-md-2">
                                            <label style="font-size:13px;">Report Type: <span class="text-red">*</span></label>
                                            <select name="report_type" class="form-control form-control-sm" required>
                                                 <option value="1" selected>Purchase Report</option>
                                                 <option value="2">Sale Report</option>
                                                
                                            </select>
                                        
                                      </div>
                                      
                                    <div class="col-md-4">
                                            <div class="form-group" style="margin-top: 25px;background-color: #b6b6cf;width:240px; border-radius:5px;">
                                               
                                                 <select id="framework" name="product_id[]" multiple class="form-control" required >
                                                  <!--<option value="0">Select All</option>-->
                                                  <?php
                                                foreach ($res as  $product) {  ?>
                                                    <option value="<?php echo $product['product_id']; ?>" ><?php echo $product['product_name']; ?> </option>
                                                
                                              <?php }  ?>
                                                 </select>
                                            </div>
                                         </div>
                                    
                                      
                                    </div>

                                    <div class="row">
                                       <div class="col-md-3 mb-2">
                                         <a href="#"><button class="btn btn-sm btn-primary btn-block" onclick="d1.action='<?php echo base_url('admin/download_report'); ?>'"><b><i class="fa fa-download"></i>&nbsp;&nbsp;Download Report</b></button></a>
                                       </div>

                                       <div class="col-md-3 mb-2">
                                         <button class="btn btn-sm btn-success btn-block" onclick="d1.action='<?php echo base_url('admin/view_report'); ?>'; d1.target='_blank';"><b><i class="fa fa-eye"></i>&nbsp;&nbsp;View Report</b></button>
                                       </div>

                                    </div>
       
                                </div>

                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
                                  <!--<div class="col-md-2 mb-2">-->
                                  <!--                  <a href="#" class="btn btn-sm btn-danger btn-block"><b><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</b></a>-->
                                  <!--              </div>-->
</div>


<?php echo $this->include('admin/template-parts/footer'); ?>



<script>
  $(document).ready(function() {
                // alert('check');
                $('#date').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd',
                // minDate: 0, 
	            maxDate: "+30"  
                });
                $("#date").focus();
            });

            $(document).ready(function() {
                // alert('check');
                $('#date1').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd',
                // minDate: 0, 
	            maxDate: "+30"  
                });
                
             $(document).ready(function() {
             $('#framework').multiselect({
              nonSelectedText: 'Select Product',
              includeSelectAllOption:true,
              enableFiltering: true,
              enableCaseInsensitiveFiltering: true,
              buttonWidth:'240px'
         });
             });
            });
            
</script>