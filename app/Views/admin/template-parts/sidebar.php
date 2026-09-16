<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url('admin/dashboard'); ?>" class="brand-link text-center">
    <h4 style="font-weight:bold">Admin Panel</h4>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="info">
        <a href="#" class="d-block" style="font-weight:bold">
          <?php
          $loggedAdmin = session()->get('loggedAdmin');
          echo $loggedAdmin['fname']; ?>&nbsp;<?php echo $loggedAdmin['lname'];
                                              ?>
        </a>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>

    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="<?php echo base_url('admin/dashboard'); ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p style="font-weight:bold">
              Dashboard
            </p>
          </a>

        </li>
        <!-- <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> -->
          
            <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p style="font-weight:bold">
              Category
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('admin/category/create'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/category/view'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View All Categories</p>
              </a>
            </li>
          </ul>
        </li> 

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-list-alt"></i>
            <p style="font-weight:bold">
              Product Name
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo  base_url('admin/products/name/create'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo  base_url('admin/products/name/view'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View All</p>
              </a>
            </li>
          </ul>
        </li>
<?php if( $loggedAdmin['id'] == 1){ ?>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fas fa-edit"></i>
            <p style="font-weight:bold">
              Purchase Entry
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo  base_url('admin/products/create'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/products/view'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View All</p>
              </a>
            </li>
          </ul>
        </li>
<?php  } ?>
         <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cube"></i>
            <p style="font-weight:bold">
              Billing
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('admin/bill/create'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New Bill</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/bill/view'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View All Bills</p>
              </a>
            </li>
          </ul>
        </li> 

<?php if( $loggedAdmin['id'] == 1){ ?>
         <li class="nav-item">
          <a href="<?php echo  base_url('admin/report'); ?>" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p style="font-weight:bold">
               Report
            </p>
          </a>
        </li>
     <?php } ?>  
        <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advanced Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validation</p>
                </a>
              </li>
            </ul>
          </li> -->


        <li class="nav-item">
          <a href="<?php echo base_url('admin/logout'); ?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt" style="color:#f7562f"></i>
            <p style="color:#f7562f; font-weight:bold">
              Log Out
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>