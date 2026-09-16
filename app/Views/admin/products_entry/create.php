<?php echo $this->include('admin/template-parts/header'); ?>
<?php echo $this->include('admin/template-parts/navbar'); ?>
<?php echo $this->include('admin/template-parts/sidebar'); ?>

<style>
    .col-md-1, .col-md-2,.col-md-3,.col-md-4{
        padding-right: 2px !important;
     padding-left: 2px !important;
    }
    .select2-container .select2-selection--single { 
        height: 38px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 35px !important;
        
    }
</style>

<div class="content-wrapper pt-2">
  <!--<div class="content-header">-->
  <!--  <div class="container-fluid">-->
  <!--    <div class="row mb-2">-->
  <!--      <div class="col-sm-6">-->
  <!--        <h1 class="m-0">Dashboard</h1>-->
  <!--      </div>-->
  <!--      <div class="col-sm-6">-->
  <!--        <ol class="breadcrumb float-sm-right">-->
  <!--          <li class="breadcrumb-item active">Home</li>-->
  <!--          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>-->

  <!--        </ol>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

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

                            <form action="<?php echo  base_url('admin/products/store'); ?>" method="post" autocomplete="off">

                                <div class="container " >
                                    <div class="main">
                                <div class="row mt-1">
                                <div class="col-md-2 ">
                                    <input type="date" name="entry_date[]" class="form-control" placeholder="Enter Date" required>
                                </div>
                                
                                 <div class="col-md-3 ">

                        	       <select  name="product_id[]" class="select2 form-control" required >
                                         <option value="" disbaled selected>Select Product</option>
                                         <?php
                                            foreach ($data as $value) {
                                                ?>
                                                <option value="<?php echo $value['category_id'].'_'.$value['product_id']; ?>" ><?php echo $value['category_name'].' -- '.$value['product_name'];?></option>
                                                <?php
                                            }
                                         ?>
                                    </select>
                                </div>
                              
                                <div class="col-md-2 ">
                                    <input type="number" name="product_qty[]" step="1" class="form-control" placeholder="Product Qty." required>
                                </div>
                                <div class="col-md-2 ">
                                    <input type="number" name="product_price[]" step="0.01" class="form-control" placeholder="Product Price" required>
                                </div>
                                <div class="col-md-2 ">
                                    <input type="number" name="selling_price[]" step="0.01" class="form-control" placeholder="Selling Price" required>
                                </div>
                               
                                <div class="col-md-1">
                                    <button class="btn btn-sm btn-primary" id="add-item-btn">Add Row</button>
                                </div>
                            </div>
                                    
                                    </div>

                                    <div class="row">
                                    <div class="col-md-2 mt-2">
                                       <input type="submit" value="Add Product" class="btn btn-success btn-block font-weight-bold" id="add-btn">
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

</div>

        <div class="show-items" style="display:none;">
                           <div class="row mt-1">
                                <div class="col-md-2 ">
                                    <input type="date" name="entry_date[]" class="form-control" placeholder="Enter Date" required>
                                </div>
                                
                                 <div class="col-md-3 ">

                        	       <select  name="product_id[]" class="select2 form-control" required >
                                         <option value="" disbaled selected>Select Product</option>
                                         <?php
                                            foreach ($data as $value) {
                                                ?>
                                                <option value="<?php echo $value['category_id'].'_'.$value['product_id']; ?>" ><?php echo $value['category_name'].' -- '.$value['product_name'];?></option>
                                                <?php
                                            }
                                         ?>
                                    </select>
                                </div>
                              
                                <div class="col-md-2 ">
                                    <input type="number" name="product_qty[]" step="1" class="form-control" placeholder="Product Qty." required>
                                </div>
                                <div class="col-md-2 ">
                                    <input type="number" name="product_price[]" step="0.01" class="form-control" placeholder="Product Price" required>
                                </div>
                                <div class="col-md-2 ">
                                    <input type="number" name="selling_price[]" step="0.01" class="form-control" placeholder="Selling Price" required>
                                </div>
                               
                                <div class="col-md-1">
                                    <button class="btn btn-sm btn-danger" id="remove-item-btn">Remove</button>
                                </div>
                            </div>
                         </div>

<?php echo $this->include('admin/template-parts/footer'); ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    
     function selectRefresh() {
  $('.main .select2').select2({
    //-^^^^^^^^--- update here
    tags: true,
    placeholder: "Select an Option",
    allowClear: true,
    width: '100%'
  });
}
        $(document).ready(function(){
            selectRefresh();
           
          $('#add-item-btn').click(function(e){
            e.preventDefault();
           $('.main').prepend($('.show-items').html());
           selectRefresh();
         
          });

          $(document).on('click', '#remove-item-btn' , function(e){
              e.preventDefault();
              var row_items = $(this).parent().parent();
                $(row_items).remove();
          });

          // Ajax request to insert all form data

          $('#add-btn').submit(function(e){
                e.preventDefault();
                $('#add-btn').val('Adding...');

                $.ajax({
                   url: 'form_action',
                   method: 'post',
                   data: $(this).serialize(),
                   success:function(response){
                     console.log(response);
                   }
                });
          });
        });
             
    </script>
    
<script type="text/javascript">
    
   $(document).ready(function() {
                // alert('check');
                $('#datte').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'dd-mm-yy',
                // minDate: 0, 
	            maxDate: "+30"  
                });
                
            });
    //$('.select2').select2();
    
    
</script>
