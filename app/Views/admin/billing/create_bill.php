<?php echo $this->include('admin/template-parts/header'); ?>
<?php echo $this->include('admin/template-parts/navbar'); ?>
<?php echo $this->include('admin/template-parts/sidebar'); ?>
 <?php date_default_timezone_set('Asia/Kolkata'); ?>
<style>
    th, td{
        padding: 3px !important;
        text-align: center !important;
        font-size: 14px !important;
    }
    
    
</style>

<style>
    .col-md-1, .col-md-2,.col-md-3,.col-md-4{
        padding-right: 2px !important;
     padding-left: 2px !important;
    }
    .select2-container .select2-selection--single { 
        /*height: 36px !important;*/
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
    /*height: 30px !important;*/
        
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

                            <form action="<?php echo base_url('admin/bill/store'); ?>" method="post" autocomplete="off">

                        
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
                                    <a href="" class="btn btn-sm btn-warning font-weight-bold" id="add-item-btn">Add More products</a>
                                </div>
                            </div>
                                
                                <div class="container" >
                                      <table class="table table-bordered"  >
                                          <thead>
                                            <tr class="table-secondary">
                                              <th >Product</th>
                                              <th >Quantity</th>
                                              <th >Selling Price</th>
                                              <th >Total (&#8377;)</th>
                                              <th >--</th>
                                            </tr>
                                          </thead>
                                          <tbody class="main" style="background:#6bc7c7;">
                                            <tr ><td style="width: 450px;">
                                			      <select class="select2 form-control form-control-sm" name="product_id[]" required >
                                			          <option value="" >Select Product</option>
                                			          <?php
                                                            foreach ($data as $value) {
                                                                ?>
                                                                <option value="<?php echo $value['product_id']; ?>" ><?php echo $value['category_name'].' - '.$value['product_name'].' - '.$value['selling_price'].' - '.$value['product_qty'];?></option>
                                                                <?php
                                                            }
                                                         ?>
                                			     </select></td>
                                			     <td><input type="number" name="product_qty[]" min="1" step="1" class="form-control form-control-sm qty" placeholder="Product Qty." onchange="Calc(this);" required></td>
                                			     <td><input type="number" name="selling_price[]" step="0.01" value="0" class="form-control form-control-sm rate" placeholder="Selling Price" onchange="Calc(this);" required></td>
                                			      <td><input type="number" name="total[]" step="0.01" value="0" class="form-control form-control-sm total" placeholder="Total" readonly></td>
                                			 </tr>
                                          </tbody>
                                        </table>
                                        <hr>
                                       <div class="row col-md-8">
                                            <table class="table table-bordered">
                                          <thead>
                                            <tr class="table-success">
                                              
                                              <th scope="col">Total Price (&#8377;)</th>
                                              <th scope="col">Discount (&#8377;)</th>
                                              <th scope="col">GST (%)</th>
                                              <th scope="col">Total (Amount + GST)</th>
                                              
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td><input type="number" name="ftotal" value="0" class="form-control form-control-sm ftotal" id="ftotal" placeholder="Total" readonly></td>
                                              <td><input type="number" name="discount" value="0"  class="form-control form-control-sm discount" id="discount" onchange="GetTotal()" placeholder="Discount"></td>
                                              <td><input type="number" name="gst" value="0" class="form-control form-control-sm gst" id="gst" placeholder="GST" onchange="GetTotal()" required></td>
                                              <td><input type="number" name="gross_total" value="0"  class="form-control form-control-sm gtotal" id="gtotal" placeholder="Gross Total" required readonly></td>
                                              
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

<table  style="display:none;" >
    <tbody class="show-items">
     <tr><td   style="width: 450px;">
                                			      <select class=" select2 form-control form-control-sm" name="product_id[]" required >
                                			          <option value="" >Select Product</option>
                                			          <?php
                                                            foreach ($data as $value) {
                                                                ?>
                                                                <option value="<?php echo $value['product_id']; ?>" ><?php echo $value['category_name'].' - '.$value['product_name'].' - '.$value['selling_price'].' - '.$value['product_qty'];?></option>
                                                                <?php
                                                            }
                                                         ?>
                                			     </select></td>
                                			     <td><input type="number" name="product_qty[]" min="1" step="1" class="form-control form-control-sm qty" placeholder="Product Qty." onchange="Calc(this);" required></td>
                                			     <td><input type="number" name="selling_price[]" step="0.01" value="0" class="form-control form-control-sm rate" placeholder="Selling Price" onchange="Calc(this);" required></td>
                                			      <td><input type="number" name="total[]" step="0.01" value="0" class="form-control form-control-sm total" placeholder="Total" readonly></td>
                                			      <td><button class="btn btn-sm btn-danger" id="remove-item-btn">Remove</button></td>
    </tbody>                            			 </tr>
</table>

<?php echo $this->include('admin/template-parts/footer'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
     function selectRefresh() {
  $('.main .select2').select2({
    //-^^^^^^^^--- update here
    tags: true,
    placeholder: "Select Product",
    allowClear: true,
    width: '100%'
  });
}
        $(document).ready(function(){
            selectRefresh();
            
             $('#add-item-btn').click(function(e){
            e.preventDefault();
           $('.main').append($('.show-items').html());
           selectRefresh();
          });
          
        });
    
        $(document).ready(function(){
       

          $(document).on('click', '#remove-item-btn' , function(e){
              e.preventDefault();
              var row_items = $(this).parent().parent();
                $(row_items).remove();
                GetTotal();
          });

          // Ajax request to insert all form data

        //   $('#add-btn').submit(function(e){
        //         e.preventDefault();
        //         $('#add-btn').val('Adding...');

        //         $.ajax({
        //           url: 'form_action',
        //           method: 'post',
        //           data: $(this).serialize(),
        //           success:function(response){
        //              console.log(response);
        //           }
        //         });
        //   });
        });
             
             
    </script>
    
    
    
    <script>
       
        function Calc(v){
            var index = $(v).parent().parent().index();
            
            var qty = document.getElementsByClassName("qty")[index].value;
            var rate = document.getElementsByClassName("rate")[index].value;
            
            var amt = qty * rate;
            
            document.getElementsByClassName("total")[index].value = amt;
            
            GetTotal();
        } 
        
        
        function GetTotal(){
            
            var sum = 0;
            var amts = document.getElementsByClassName("total");
            
            for (let index = 0; index < amts.length; index++){
                
                var amt = amts[index].value;
                sum = +(sum) + +(amt);
            }
            document.getElementById('ftotal').value = sum;
            
            var gst = document.getElementById('gst').value;
            net = +(sum) + +(sum * gst/100);
            
            
            var dis = document.getElementById('discount').value;
            var gtotal  = (net - dis).toFixed(2);
            document.getElementById('gtotal').value = gtotal;
        }
        
        
    </script>
    
    
    
    <script>
        
        $(document).ready(function() {
              $(window).keydown(function(event){
                if(event.keyCode == 13) {
                  event.preventDefault();
                  return false;
                }
              });
            });

    </script>
    
