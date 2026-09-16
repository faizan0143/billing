<html>
    <head>
        <title>Bill</title>
        
             <style>  
				@page {
						margin: 10px !important;
						padding: 0px 0px 0px 0px !important;
					  }
				  
				 </style>
				 
    </head>
    
    <body>
               
		
		<table border="0" cellpadding="6" style="width:100%;border-collapse: collapse;margin:5px 0px;">
						<tr>
							<td style="font-weight:bold;text-align: left;width:20%" ><u><span  style=""> BILL No. - <?php echo $data[0]['order_id']; ?></span></u></td>
							<td style="font-size:20px;text-align: center;width:60%" ><u><span style="font-weight:bold;" >TAX INVOICE</span></u></td>
							<td style="font-weight:bold;text-align: right;width:20%" ><u><span  style="font-weight:bold;"><b> <?php echo date("d-m-Y", strtotime($data[0]["bill_date"])); ?></b></span></u></td>
						</tr>
						</table>			
								
					
					<table border="1" cellpadding="2" cellspacing="0" style="width:100%;margin:4px 0px;font-size:12px;">
						<tr>
					     	<td style="font-weight:bold;text-align: left;" >Serial No.</td>
							<td style="font-weight:bold;text-align: left;" >Product Name</td>
							<td style="font-weight:bold;text-align: left;" >Quantity</td>
							<td style="font-weight:bold;text-align: left;" >Rate</td>
							<td style="font-weight:bold;text-align: left;" >Amount</td>
						</tr>
		
		<?php
			$j=0;	
		for ($i=0; $i<count($data); $i++) {
			$j=$j+1;
			
		?>
			
		           	<tr>
							<td style="text-align: left;" ><b><?php echo $j; ?></b></td>
							<td style="text-align: left;" > <?php echo $data[$i]["product_name"]; ?></td>
							<td style="text-align: left;" > <?php echo $data[$i]["quantity"]; ?></td>
							<td style="text-align: left;" > <?php echo $data[$i]["rate"]; ?></td>
							<td style="text-align: left;" > <?php echo $data[$i]["total"]; ?></td>
						</tr>	
						
		<?php
		}
		?>
		
		
		</table>
		
		    <table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
						<tr><td style="text-align: left;width:60%" ></td>
							<td style="text-align: right;width:40%" >
							<table border="0" cellpadding="2" cellspacing="0" style="width:100%;margin:4px 0px;font-size:12px;">
								<tr>
									<td style="text-align: left;border-bottom:1px solid black;">GST(<?php echo $data[0]["gst"]; ?> %) </td>
									<td style="text-align: right;border-bottom:1px solid black;"><b><?php echo $data[0]["gst_amount"]; ?></b></td>
								</tr>
									<tr>
									<td style="text-align: left;border-bottom:1px solid black;">Discount (Rs.) </td>
									<td style="text-align: right;border-bottom:1px solid black;"><b><?php echo $data[0]["discount"]; ?></b></td>
								</tr>
								<tr>
									<td style="text-align: left;border-bottom:1px solid black;">Gross Payable Amount : </td>
									<td style="text-align: right;border-bottom:1px solid black;"><b><?php echo $data[0]["gross_total"] ?></b></td>
								</tr>
							</table>
							</td>
						</tr></table>
    </body>
</html>