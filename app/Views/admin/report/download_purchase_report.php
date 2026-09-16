<?php


 if(!empty($html)){
      ?>
<!doctype html>
<html>
    <head>
        <title>Bill</title>
        
            <style>  
                    * {
                            margin: 5px 0px 10px 5px !important;
                            padding: 0px 0px 0px 0px !important;
                            /* margin: 0;
                            padding:0; */
                            box-sizing:border-box;
                            
                           }
                           
                           body{
                               width: 100%;
                                height: 100vh;
                                background-size: cover;
                              background-repeat: no-repeat;
                           }
                          
                            table{
                                width:98%;
                                padding:2px !important;
                                border-collapse: collapse;
                            }
                           th{
                            padding: 0px !important;
                              text-align:center;
                              font-size:15px;
                               border: 1px solid black;
                            border-collapse: collapse;
                            
                           }

                           td{
                            padding: 0px !important;
                              text-align:center;
                              font-size:16px;
                               border: 1px solid black;
                            border-collapse: collapse;
                            
                           }
                           
                           span{
                              width:500px; 
                              font-size:13px; 
                              text-align:left; 
                              overflow:hidden; 
                              word-wrap: break-word;
                            word-break: break-all;
                            font-weight:bold; 
                            color:#2e8af1;
                           }
                           

                         
                    </style>
				 
    </head>
  <body>

 <div class="table-responsive">
     <h5>Purchase Report : <?php echo  date('d-m-Y',strtotime($from_date)) . " ---- " .date('d-m-Y',strtotime($to_date)); ?></h5>
     
     <div class="table-responsive">
                    <table class="table table table-hover table-bordered">
                          <thead>
                                        <tr style="background-color: #077c9c; font-weight:bold; font-size:18px; color:#fff;">
                                            <th>Product Name</th>
                                            <th>Category Name</th>
                                            <th>Purchase Date</th>
                                            <th>Purchase Quantity</th>
                                            <th>In Stock</th>
                                            <th>Net Sale Qty</th>
                                            <th>Rate</th>
                                            <th>Selling Price</th>
                                        </tr>
                                    </thead>
                     <?php
                    for($i=0; $i<count($html); $i++){
                    
                    ?>
                    
                    <tr >
                                <td style="text-align:left;"><?php echo $html[$i]['product_name']; ?></td>
                                <td><?php echo $html[$i]['category_name']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($html[$i]['entry_date'])); ?></td>
                                <td><?php echo $html[$i]['real_qty']; ?></td>
                                <td><?php echo $html[$i]['product_qty']; ?></td>
                                <td><?php echo $html[$i]['real_qty'] -  $html[$i]['product_qty']; ?></td>
                                <td><?php echo $html[$i]['product_price']; ?></td>
                                <td><?php echo $html[$i]['selling_price']; ?></td>
                                
                                                   
                                                 
                    </tr>
                                                
                     <?php   } ?>
                             
                    </table>
                    </div>


 </div>

  </body>
</html>

<?php
}else{
    ?>
    <h1>No Purchase Record Found...</h1>
    <?php
}
?>
        
       