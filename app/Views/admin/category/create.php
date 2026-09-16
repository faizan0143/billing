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

                            <form action="<?php echo base_url('admin/category/store'); ?>" method="post" autocomplete="off">

                                <div class="container">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="">Category Name : <span class="text-red">*</span></label>
                                            <input type="text" name="category_name" class="form-control" value="<?php echo set_value('category_name'); ?>" placeholder="Enter Category Name">
                                            <span class="text-red"><?php echo isset($validation) ? displayError($validation, 'category_name') : ''; ?></span>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Status : <span class="text-red">*</span></label>
                                            <select name="status" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                       
                                    </div>

                                    <div class="row">
                                    <div class="col-md-4">
                                        <a href="#"><button class="btn btn-primary btn-block"><b>Add Category</b></button></a>
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