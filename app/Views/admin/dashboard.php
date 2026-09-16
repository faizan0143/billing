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


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-8 connectedSortable">
          <?php
          if (!empty(session()->getFlashdata('warning'))) {
          ?>
            <div class="alert alert-warning">
              <?php echo session()->getFlashdata('warning'); ?>
            </div>
          <?php
          }
          ?>
          <!-- Custom tabs (Charts with tabs)-->
         <div class="row">
          <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-desktop mr-1"></i>
                Short Cuts
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <a href="<?php echo base_url('admin/account'); ?>" class="btn btn-primary pt-3 pb-3 mr-2" style="font-weight:bold;font-size:18px"><i class="fa fa-user-cog"></i>&nbsp;Settings</a>
                <a href="<?php echo  base_url('admin/logout'); ?>" class="btn btn-primary pt-3 pb-3" style="font-weight:bold;font-size:18px"><i class="fa fa-sign-out-alt"></i>&nbsp;Logout</a>
              </div>
            </div><!-- /.card-body -->
          </div>

        

        </section>
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php echo $this->include('admin/template-parts/footer'); ?>