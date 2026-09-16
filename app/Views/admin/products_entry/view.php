<?php echo  $this->include('admin/template-parts/header'); ?>
<?php echo  $this->include('admin/template-parts/navbar'); ?>
<?php echo  $this->include('admin/template-parts/sidebar'); ?>
<style>
    th, td{
        padding: 4px !important;
        text-align: center !important;
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

                            <?php
                            if (!empty($data)) {
                            ?>
                                <div class="table-responsive p-0 w-100">
                                <table id="example" class="table table-bordered table-hover mt-2 mb-2" >
                                    <thead>
                                        <tr>
                                            <th>Entry Date</th>
                                            <th>Product Name</th>
                                            <th>Product Qty.</th>
                                            <th>Product price</th>
                                            <th>Selling Price</th>
                                            <th width="10px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($data as $val) {
                                        ?>
                                            <tr>
                                                <td><?php echo date('d-m-Y', strtotime($val['entry_date'])); ?></td>
                                                <td>
                                                <?php   
                                                    foreach($res as $res1){
                                                        if($res1['product_id'] == $val['product_id']){
                                                        echo $res1['product_name'];
                                                    } 
                                                    }
                                                ?>
                                                </td>
                                                <td><?php echo $val['product_qty']; ?></td>
                                                <td><?php echo $val['product_price']; ?></td>
                                                <td><?php echo $val['selling_price']; ?></td>
                                               
                                                <td>
                                                    <a href="<?php echo base_url('admin/products/edit/'. $val['product_entry_id']); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;
                                                    <a href="#" onClick="deleteConfirm(<?php echo $val['product_entry_id'] ?>)" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                     <tfoot>
                                    <tr>
                                       <th>Entry Date</th>
                                            <th>Product Name</th>
                                            <th>Product Qty.</th>
                                            <th>Product price</th>
                                            <th>Selling Price</th>
                                    </tr>
                                </tfoot>
                                </table>
                                </div>
                            <?php
                            } else {
                            ?>
                                <h1> No Records Found..</h1>
                            <?php
                            }
                            ?>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>

</div>

<?php echo  $this->include('admin/template-parts/footer'); ?>


<script>
  function deleteConfirm(id) {
    // alert(id);
    if (confirm("Are You Sure! You want to delete?")) {
      window.location.href = '<?= base_url('admin/products/delete') ?>/' + id
    }
  }
</script>