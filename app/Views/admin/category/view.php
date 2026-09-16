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
                            if (!empty($res)) {
                            ?>
                                <div class="table-responsive p-0 w-100">
                                <table id="example" class="table table-bordered table-hover mt-2 mb-2" >
                                    <thead>
                                        <tr>
                                            <th>Category Id</th>
                                            <th>Category Name</th>
                                            <th>Status</th>
                                            <th width="10px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($res as $val) {
                                        ?>
                                            <tr>
                                                <td><?php echo $val['category_id']; ?></td>
                                                <td><?php echo $val['category_name']; ?></td>
                                                <td><?php
                                                    if ($val['status'] == 1) {
                                                    ?>
                                                        <span class="badge bg-success">Active</span>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <span class="badge bg-danger">Inactive</span>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url('admin/category/edit/'. $val['category_id']); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;
                                                    <!--<a href="#" onClick="deleteConfirm(<?= $val['category_id'] ?>)" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fa fa-trash"></i></a>-->
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                     <tfoot>
                                    <tr>
                                        <th>Category Id</th>
                                            <th>Category Name</th>
                                            <th>Status</th>
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
      window.location.href = '<?= base_url('admin/category/delete/') ?>/' + id
    }
  }
</script>