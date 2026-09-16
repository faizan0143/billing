<?php echo $this->include('admin/template-parts/header'); ?>
<?php echo $this->include('admin/template-parts/navbar'); ?>
<?php echo $this->include('admin/template-parts/sidebar'); ?>
 <?php date_default_timezone_set('Asia/Kolkata'); ?>
<style>
    th, td{
        padding: 0px !important;
        text-align: center !important;
        font-size: 14px !important;
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

                            <form action="#" method="post" autocomplete="off">

                        
                            <div class="row mt-2 ml-2">
                                <div class="col-md-3 mb-2">
                                    <input type="date" name="bill_date" value="<?php echo date('Y-m-d'); ?>" class="form-control form-control-sm" placeholder="Enter Date" required>
                                </div>
                                
                                <div class="col-md-3 mb-2">
                                    <input type="text" name="customer_name"  class="form-control form-control-sm" placeholder="Enter Customer Name" required>
                                </div>
                                
                                <div class="col-md-3 mb-2">
                                     <input type="number" name="phone_no" class="form-control form-control-sm" placeholder="Enter Customer Phone No." required>
                                </div>
                               
                                <div class="col-md-3 mb-4 d-grid">
                                    <button class="btn btn-sm btn-warning font-weight-bold" id="add-item-btn">Add More products</button>
                                </div>
                            </div>
                                
                                <div class="container" >
                                      <table class="table table-bordered" id="show-items">
                                          <thead>
                                            <tr class="table-secondary">
                                              <th scope="col">Product</th>
                                              <th scope="col">Quantity</th>
                                              <th scope="col">Selling Price</th>
                                              <th scope="col">Total (&#8377;)</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>
                                                   <select name="product_id[]" class="form-control form-control-sm" required>
                                                         <option value="" disbaled selected>Select Product</option>
                                                         <?php
                                                            foreach ($data as $value) {
                                                                ?>
                                                                <option value="<?php echo $value['category_id'].'_'.$value['product_id']; ?>" ><?php echo $value['category_name'].' - '.$value['product_name'].' - '.$value['selling_price'].' - '.$value['product_qty'];?></option>
                                                                <?php
                                                            }
                                                         ?>
                                                    </select>
                                              </td>
                                              <td><input type="number" name="product_qty[]" min="1" step="1" class="form-control form-control-sm" placeholder="Product Qty." required></td>
                                               <td><input type="number" name="selling_price[]" step="0.01" value="0" class="form-control form-control-sm" placeholder="Selling Price" required></td>
                                              <td><input type="number" name="total[]" step="0.01" value="0" class="form-control form-control-sm" placeholder="Total" readonly></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <hr>
                                       <div class="row col-md-6">
                                            <table class="table table-bordered">
                                          <thead>
                                            <tr class="table-success">
                                              
                                              <th scope="col">Total Price (&#8377;)</th>
                                              <th scope="col">GST</th>
                                              <th scope="col">Total (Amount + GST)</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td><input type="number" name="total" value="0" class="form-control form-control-sm" placeholder="Total" readonly></td>
                                              <td><input type="number" name="gst" value="0" class="form-control form-control-sm" placeholder="GST" required></td>
                                              <td><input type="number" name="gross_total" value="0"  class="form-control form-control-sm" placeholder="Gross Total" required></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                       </div>
                                </div>
                                
                                

                               <div class="row ml-2">
                                    <div class="col-md-3">
                                       <input type="submit" value="Create Bill" class="btn btn-sm btn-info btn-block font-weight-bold" id="add-btn">
                                    </div>
                                    <div class="col-md-2">
                                       <a class="btn btn-sm btn-danger btn-block font-weight-bold" href="<?php echo base_url('admin/bill/view'); ?>">Back</a>
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

<?php echo $this->include('admin/template-parts/footer'); ?>


<script>
        $(document).ready(function(){
          $('#add-item-btn').click(function(e){
            e.preventDefault();
            $('#show-items').append(`
                  
                                            <tr id="show-items">
                                              <td>
                                                   <select name="product_id[]" class="form-control form-control-sm" required>
                                                         <option value="" disbaled selected>Select Product</option>
                                                         <?php
                                                            foreach ($data as $value) {
                                                                ?>
                                                                <option value="<?php echo $value['category_id'].'_'.$value['product_id']; ?>" ><?php echo $value['category_name'].' - '.$value['product_name'].' - '.$value['selling_price'].' - '.$value['product_qty'];?></option>
                                                                <?php
                                                            }
                                                         ?>
                                                    </select>
                                              </td>
                                              <td><input type="number" name="product_qty[]" min="1" step="1" class="form-control form-control-sm" placeholder="Product Qty." required></td>
                                              <td><input type="number" name="selling_price[]" value="0" step="0.01" class="form-control form-control-sm" placeholder="Selling Price" required></td>
                                              <td><input type="number" name="total[]" value="0" step="0.01" class="form-control form-control-sm" placeholder="Total" readonly></td>
                                              <td><button class="btn btn-sm btn-danger" id="remove-item-btn">Remove</button></td>
                                            </tr>
                                        
            `)
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
