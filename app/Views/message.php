<?php
  if (!empty(session()->getFlashdata('success'))) {
     ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Hello!</strong> <?php echo session()->getFlashdata('success'); ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
 <?php
   }
?>


<?php
  if (!empty(session()->getFlashdata('fail'))) {
     ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Hello!</strong> <?php echo session()->getFlashdata('fail'); ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
 <?php
   }
?>

<?php
  if (!empty(session()->getFlashdata('danger'))) {
     ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Hello!</strong> <?php echo session()->getFlashdata('danger'); ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
 <?php
   }
?>

