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
                <div class="col-md-6">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <!-- <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                            </div> -->
                            <?php
                            if (!empty(session()->getFlashdata('fail'))) {
                            ?>
                                <div class="alert alert-danger">
                                    <?php echo session()->getFlashdata('fail'); ?>
                                </div>
                            <?php
                            }
                            ?>

                            <?php
                            if (!empty(session()->getFlashdata('success'))) {
                            ?>
                                <div class="alert alert-success">
                                    <?php echo session()->getFlashdata('success'); ?>
                                </div>
                            <?php
                            }
                            ?>
                            <form action="<?php echo base_url('admin/name-update'); ?>" method="post">
                                <h3 class="profile-username text-center">Update Name</h3>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <label for="">First Name <span class="text-red">*</span></label>
                                        <input type="text" name="fname" value="<?php echo set_value('fname', isset($res['fname']) ? $res['fname'] : ''); ?>" class="form-control" placeholder="Enter First Name">
                                        <span class="text-red"><?php echo isset($validation) ? displayError($validation, 'fname') : ''; ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <label for="">Last Name <span>(Optional)</span></label>
                                        <input type="text" name="lname" value="<?php echo set_value('lname', isset($res['lname']) ? $res['lname'] : ''); ?>" class="form-control" placeholder="Enter Last Name">
                                    </li>
                                </ul>

                                <a href="#"><button class="btn btn-primary btn-block"><b>Update Name</b></button></a>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <!-- <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                            </div> -->
                            <?php
                            if (!empty(session()->getFlashdata('fails'))) {
                            ?>
                                <div class="alert alert-danger">
                                    <?php echo session()->getFlashdata('fails'); ?>
                                </div>
                            <?php
                            }
                            ?>

                            <?php
                            if (!empty(session()->getFlashdata('successs'))) {
                            ?>
                                <div class="alert alert-success">
                                    <?php echo session()->getFlashdata('successs'); ?>
                                </div>
                            <?php
                            }
                            ?>
                            <form action="<?php echo base_url('admin/update-password'); ?>" method="post">
                                <h3 class="profile-username text-center">Update Password</h3>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <label for="">Password <span class="text-red">*</span></label>
                                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                        <span class="text-red"><?php echo isset($validation) ? displayError($validation, 'password') : ''; ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <label for="">Confirm-Password <span class="text-red">*</span></label>
                                        <input type="password" name="cpassword" class="form-control" placeholder="Enter Confirm Password">
                                        <span class="text-red"><?php echo isset($validation) ? displayError($validation, 'cpassword') : ''; ?></span>
                                    </li>
                                </ul>

                                <a href="#"><button class="btn btn-primary btn-block"><b>Update Password</b></button></a>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>

</div>
<!-- /.content-wrapper -->

<?php echo $this->include('admin/template-parts/footer'); ?>