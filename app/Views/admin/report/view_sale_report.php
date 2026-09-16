<?php


 if(!empty($html)){
      ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Account Report</title>
    <style>
        *{
            padding: 5px;
        }
          th{
            padding:0px 0px !important;
            font-size:13px;
            text-align:center;
          }
          td{
            padding:0px 0px !important;
            font-size:14px;
            text-align:center;
          }
      
    </style>
  </head>
  <body>

 <div class="table-responsive">
     <h5>Sale Report : <?php echo  date('d-m-Y',strtotime($from_date)) . " ---- " .date('d-m-Y',strtotime($to_date)); ?></h5>
     
     <div class="table-responsive">
                    <table class="table table table-hover table-bordered">
                          <thead>
                                        <tr style="background-color: #077c9c; font-weight:bold; font-size:18px; color:#fff;">
                                            <th>Product Name</th>
                                            <th>Category Name</th>
                                            <th>Sale Date</th>
                                            <th>Bill No.</th>
                                            <th>Quantity</th>
                                            <th>Rate</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                     <?php
                    for($i=0; $i<count($html); $i++){
                    
                    ?>
                    
                    <tr >
                                <td style="text-align:left;"><?php echo $html[$i]['product_name']; ?></td>
                                <td><?php echo $html[$i]['category_name']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($html[$i]['bill_date'])); ?></td>
                                <td><?php echo $html[$i]['order_id']; ?></td>
                                <td><?php echo $html[$i]['quantity']; ?></td>
                                <td><?php echo $html[$i]['rate']; ?></td>
                                <td><?php echo $html[$i]['total']; ?></td>
                                        
                    </tr>
                                                
                     <?php   } ?>
                             
                    </table>
                    </div>


 </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>

<?php
}else{
    ?>
    <h1>No Purchase Record Found...</h1>
    <?php
}
?>
        
       