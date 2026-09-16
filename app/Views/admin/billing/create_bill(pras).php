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
                                			      <select class="select2 form-control form-control-sm spro" name="product_id[]" required >
                                			          <option value="" >Select Product</option>
                                			          <?php
                                                            foreach ($data as $value) {
                                                                ?>
                                                                <option value="<?php echo $value['category_id'].'_'.$value['product_id']; ?>" ><?php echo $value['category_name'].' - '.$value['product_name'].' - '.$value['selling_price'].' - '.$value['product_qty'];?></option>
                                                                <?php
                                                            }
                                                         ?>
                                			     </select></td>
                                			     <td><input type="number" name="product_qty[]" min="1" step="1" class="form-control form-control-sm qty calculate" placeholder="Product Qty." required></td>
                                			     <td><input type="number" name="selling_price[]" step="0.01" value="0" class="form-control form-control-sm unit calculate" placeholder="Selling Price" required></td>
                                			      <td><input type="number" name="total[]" step="0.01" value="0" class="form-control form-control-sm total" placeholder="Total" readonly></td>
                                			      <td></td>
                                			      
                                			     <!--<td class="hidden"><span><input style="width:40px;" type="number" class="discount" name="discount[]" required value="0" ></span> <span>-->
                                			     <!--    <input style="width:100px" type="text" class="discount_amt" name="discount_amt[]" value="0" required  readonly></span>-->
                                			     <!--</td><td class="hidden"><input type="number" class="form-control total_unit" name="total_unit[]" required value="0" ></td>-->

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
                                              <th scope="col">GST</th>
                                              <th scope="col">Total (Amount + GST)</th>
                                              
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td><input type="number" name="total" value="0" class="form-control form-control-sm tamt" placeholder="Total" readonly></td>
                                              <td><input type="number" name="discount" value="0"  class="form-control form-control-sm" placeholder="Discount"></td>
                                              <td><input type="number" name="gst" value="0" class="form-control form-control-sm cgst_amt" placeholder="GST" required></td>
                                              <td><input type="number" name="gross_total" value="0"  class="form-control form-control-sm ptot" placeholder="Gross Total" required></td>
                                              
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
                                			      <select class=" select2 form-control form-control-sm spro" name="product_id[]" required >
                                			          <option value="" >Select Product</option>
                                			          <?php
                                                            foreach ($data as $value) {
                                                                ?>
                                                                <option value="<?php echo $value['category_id'].'_'.$value['product_id']; ?>" ><?php echo $value['category_name'].' - '.$value['product_name'].' - '.$value['selling_price'].' - '.$value['product_qty'];?></option>
                                                                <?php
                                                            }
                                                         ?>
                                			     </select></td>
                                			     <td><input type="number" name="product_qty[]" min="1" step="1" class="form-control form-control-sm qty calculate" placeholder="Product Qty." required></td>
                                			     <td><input type="number" name="selling_price[]" step="0.01" value="0" class="form-control form-control-sm unit calculate" placeholder="Selling Price" required></td>
                                			      <td><input type="number" name="total[]" step="0.01" value="0" class="form-control form-control-sm total" placeholder="Total" readonly></td>
                                			      <td><button class="btn btn-sm btn-danger" id="remove-item-btn">Remove</button></td>
                                			     <!--<td class="hidden"><span><input style="width:40px;" type="number" class="discount" name="discount[]" required value="0" ></span> <span>-->
                                			     <!--    <input style="width:100px" type="text" class="discount_amt" name="discount_amt[]" value="0" required  readonly></span>-->
                                			     <!--</td><td class="hidden"><input type="number" class="form-control total_unit" name="total_unit[]" required value="0" ></td>-->

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
           $('.main').prepend($('.show-items').html());
           selectRefresh();
          });
          
        });
    
        $(document).ready(function(){
       

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
	$( document ).ready(function() {
		
		$(document ).on('change','.actual_calculate', function(e){
			
			var actual_rate = parseFloat ($(this).closest("tr").find(".actual_rate").val());
			//var qty = parseFloat($(this).closest("tr").find(".qty").val());
			//var dis_per = parseFloat($(this).closest("tr").find(".discount").val());
			
			var actual_total_qty = 0;
			
			$(this).closest("tr").find(".actual_qty").each(function() {
			  var qty = parseFloat($(this ).val());
			    
			  if(isNaN(qty)){
				 qty = 0; 
			  }
			  actual_total_qty = actual_total_qty + parseFloat(qty);
			});
			
			actual_total_qty = parseFloat(actual_total_qty).toFixed(2);
			
			var t = parseFloat(actual_total_qty*actual_rate).toFixed(2)
			
			$(this).closest("tr").find(".actual_tweight").val(actual_total_qty);
			$(this).closest("tr").find(".actual_tprice").val(t);
			
			actual_cal();
			
		});
		
		
		
		
		$(document ).on('change','.calculate', function(e){
			
			
			var unit = parseFloat ($(this).closest("tr").find(".unit").val());
			var qty = parseFloat($(this).closest("tr").find(".qty").val());
			var dis_per = parseFloat($(this).closest("tr").find(".discount").val());
			
			$(this).closest("tr").find(".total").val(unit*qty);
			$(this).closest("tr").find(".discount_amt").val(unit*qty*dis_per/100);
			
			cal();
			
		});
		
		$(document ).on('change','.discount', function(e){
			
			
			var unit = parseFloat ($(this).closest("tr").find(".unit").val());
			var qty = parseFloat($(this).closest("tr").find(".qty").val());
			var dis_per = parseFloat($(this).closest("tr").find(".discount").val());
			
			$(this).closest("tr").find(".total").val(unit*qty);
			$(this).closest("tr").find(".discount_amt").val(unit*qty*dis_per/100);
			
			cal();
			
		});
		
		$(document ).on('change','.ocost', function(e){
			
			var ocost = parseFloat ($(this).val());
			var actual_total_price = parseFloat ($('.actual_total_price').val());
			//var tdis = parseFloat ($('.tdis').val());
			//var cgst = parseFloat ($('.cgst_amt').val());
			//var sgst = parseFloat ($('.sgst_amt').val());
			//var igst = parseFloat ($('.igst_amt').val());
			
			var v = parseFloat(actual_total_price + ocost).toFixed(0) ;
			
			$('.actual_gross').val(v);
			
			//alert(v);
			actual_cal();
		});
		
		$(document ).on('change','.cgst', function(e){
			
			
			var tamt = parseFloat ($('.tamt').val());
			var tdis = parseFloat ($('.tdis').val());
			var rate_cgst = parseFloat($(this).val());
			
			$('.cgst_amt').val((tamt-tdis)*rate_cgst/100);
			
			cal();
			
		});
		
		$(document ).on('change','.sgst', function(e){
			
			
			var tamt = parseFloat ($('.tamt').val());
			var tdis = parseFloat ($('.tdis').val());
			var rate_sgst = parseFloat($(this).val());
			
			$('.sgst_amt').val((tamt-tdis)*rate_sgst/100);
			
			cal();
			
		});
		
		$(document ).on('change','.igst', function(e){
			
			
			var tamt = parseFloat ($('.tamt').val());
			var tdis = parseFloat ($('.tdis').val());
			var rate_igst = parseFloat($(this).val());
			
			$('.igst_amt').val((tamt-tdis)*rate_igst/100);
			
			cal();
			
		});
		
		
		
// 		$('#datetimepicker3').datetimepicker({
// 			format: 'DD-MM-YYYY'
   		  	
// 		});
		
		
		function actual_cal(){
			var actual_total_weight = 0;
			var actual_total_price = 0;
			
			
			$(".actual_tweight").each(function() {
			  var actual_tweight = $(this ).val();
			    
			  if(isNaN(actual_tweight)){
				 actual_tweight = 0; 
			  }
			  actual_total_weight = actual_total_weight + parseFloat(actual_tweight);
			});
			
			actual_total_weight = parseFloat(actual_total_weight).toFixed(2);
			
			$(".actual_tprice").each(function() {
			  var actual_tprice = $(this ).val();
			    
			  if(isNaN(actual_tprice)){
				 actual_tprice = 0; 
			  }
			  actual_total_price = actual_total_price + parseFloat(actual_tprice);
			});
			
			var othercost = $(".ocost" ).val();
			
			
			
			actual_total_price = parseFloat(actual_total_price).toFixed(0);
			var gt = parseFloat(actual_total_price) + parseFloat(othercost);
			
			var actual_gross = parseFloat(gt).toFixed(0);
			
			//alert(actual_total_price);
			//alert(gt);
			//alert(actual_gross);
			
			
			$(".actual_total_weight").val(actual_total_weight);
			$(".actual_total_price").val(actual_total_price);
			$(".actual_gross").val(actual_gross);
		}
		
		
		function cal(){
			var amt = 0;
			var gst = 0;
			var total = 0;
			var total_dis = 0;
			var total_pay = 0;
			
			$(".total").each(function() {
			  var total = $(this ).val();
			    
			  if(isNaN(total)){
				 total = 0; 
			  }
			  amt = amt + parseFloat(total);
			});
			
			$(".discount_amt").each(function() {
			  var dis = $(this ).val();
			    
			  if(isNaN(dis)){
				 dis = 0; 
			  }
			  total_dis = total_dis + parseFloat(dis);
			});
			
			amt = parseFloat(amt).toFixed(2);
			total_dis = parseFloat(total_dis).toFixed(2);
;
			var rate_cgst = parseFloat($(".cgst").val());
			
			cgst = parseFloat((amt-total_dis)*rate_cgst/100).toFixed(2);
			
			var t = parseFloat(amt - total_dis) + parseFloat(cgst)  ;
			total_pay = parseFloat(t).toFixed(0);
			
			
			$(".tamt").val(amt);
			$(".cgst_amt").val(cgst);
			
			$(".ptot").val(total_pay);
			
			
		}
		
		$(document ).on('change','.tpay', function(e){
			
			
			var tpay = parseFloat ($(this).val());
			var total_pay = parseFloat($(".ptot").val());
			tdue = total_pay - tpay;
			$(".tdue").val(tdue);
			
		});
		
		$(document ).on('change','.invo_type', function(e){
			var val = $(this).val();
			if(val == 3){
				$(".spro").val(1);
				//$(".purchaser_id").val(3);
				$("#morerow").addClass("hidden");
				$("#pro_val").addClass("hidden");
				$(".hdn").removeClass("hidden");
				$(".addmore").addClass("hidden");
				
					
			}else{
				$(".purchaser_id").val();
				$("#morerow").removeClass("hidden");
				$("#pro_val").removeClass("hidden");
				$(".addmore").removeClass("hidden");
				$(".hdn").addClass("hidden");
			}
		});
		
		
    
	});
	
	$(document).ready(function() {
		$('.js-example-basic-single').select2();
	});
</script>
