<?php echo $this->include('admin/template-parts/header'); ?>
<?php echo $this->include('admin/template-parts/navbar'); ?>
<?php echo $this->include('admin/template-parts/sidebar'); ?>


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

                            <form action="<?php echo  base_url('admin/products/update/'. $resp['product_entry_id']); ?>" method="post" autocomplete="off">

                                <div class="container">
                                <div class="row  mt-2">
                                <div class="col-md-2 mb-2">
                                    <input type="date" name="entry_date" value="<?php echo $resp['entry_date']; ?>" class="form-control" placeholder="Enter Date" required>
                                </div>
                               <div class="col-md-4 mb-4">
                                    <select name="product_id" class="form-control" required>
                                         <?php  for($i=0; $i<count($res); $i++){ ?>
                                                
                                                <option value="<?php echo $res[$i]['category_id'].'_'.$res[$i]['product_id'] ; ?>" <?php if ($res[$i]['product_id'] ==  $resp['product_id'] ) echo 'selected = "selected"'; ?>><?php echo $res[$i]['category_name'].'--'.$res[$i]['product_name'] ; ?></option>
                                                
                                                <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-2">
                                    <input type="number" name="product_qty" step="1" value="<?php echo $resp['product_qty']; ?>" class="form-control" placeholder="Product Qty." required>
                                </div>
                                <div class="col-md-2 mb-2">
                                    <input type="number" name="product_price" step="0.01" value="<?php echo $resp['product_price']; ?>" class="form-control" placeholder="Product Price" required>
                                </div>
                                <div class="col-md-2 mb-2">
                                    <input type="number" name="selling_price" step="0.01" value="<?php echo $resp['selling_price']; ?>" class="form-control" placeholder="Selling Price" required>
                                </div>
                            </div>


                                    <div class="row">
                                    <div class="col-md-4">
                                       <input type="submit" value="Update Product" class="btn btn-primary btn-block font-weight-bold">
                                    </div>
                                    <div class="col-md-2">
                                       <a  class="btn btn-danger btn-block font-weight-bold" href="<?php echo base_url('admin/products/view'); ?>">Back</a>
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

<?php echo $this->include('admin/template-parts/footer'); ?>

