<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title;?></title>
</head>
<body>

<table width="100%" border="0" align="center" cellpadding="15" cellspacing="0" bgcolor="#FAFAFA" style="max-width: 600px; font-family:'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;color: #000;font-weight: normal;line-height: 1.6;font-size: 14px;border-radius:0px 0px 3px 3px;">
    <tbody>
    <?php /*<tr>
        <td bgcolor="#ece8e8"><img src="<?php echo base_url();?>assets/admin/img/logo.png"></td>
    </tr>*/ ?>
    
    <tr>
        <td style="border:1px solid #f0f0f0;border-bottom:1px solid #c0c0c0;"><h3 style="margin:0px;margin-bottom: 15px;font-size: 24px;line-height: 1.1;font-weight: 500;"> Hi, </h3>
            <p style="margin:0px 0px 10px 0px;">Below are the details for Quotes Details from Guest user.</p>
           	<p style="margin:0px 0px 10px 0px;"><strong>Customers details:</strong></p>
           	<p style="margin:0px 0px 10px 0px;">Full Name: <?php echo $guest_user_data["tb_firstname"].' '.$guest_user_data["tb_lastname"];?></p>
           	<p style="margin:0px 0px 10px 0px;">Email address: <?php echo $guest_user_data["tb_emailaddress"];?></p>
           	<p style="margin:0px 0px 10px 0px;">Contact Number: <?php echo $guest_user_data["tb_contactno"];?></p>
           	<p style="margin:0px 0px 10px 0px;">Facility Name: <?php echo $guest_user_data["tb_facilityname"];?></p>
           	<p style="margin:0px 0px 10px 0px;">Account No: <?php echo $guest_user_data["tb_accno"];?></p>
           	<p style="margin:0px 0px 10px 0px;">Department: <?php echo $guest_user_data["tb_department"];?></p>
           	<p style="margin:0px 0px 10px 0px;">Address: <?php echo $user_address;?></p>
           	
        </td>
    </tr>
    <tr>
        <td style="border:1px solid #f0f0f0;border-bottom:1px solid #c0c0c0;">
            <p style="margin:0px 0px 10px 0px;"><Strong>Product Details:</Strong></p>
            <p style="margin:0px 0px 10px 0px;">Order Unique ID: <?php echo $order_unique_id;?></p>
	           <table class="table table-bordered" width="100%">
					<thead>
					<tr>
						<th align="left" width="5%">#</th>
						<th align="left" width="40%">Product Name</th>
						<th align="left" width="15%">Model No. </th>
						<th align="left" width="30%">Comments </th>
						<th align="left" width="10%">Quantity</th>
						</tr>
					</thead>
					 <?php if(count($cart_item_data) > 0) {
					 	$i=1; ?>
					<tbody>
	            		<?php foreach($cart_item_data as $iRow) { ?>
						<tr class="spacer">
						<td><?php echo $i;?></td>
						<td><?php echo str_replace("&", " and ", $iRow["product_name"]);?></td>
						<td><?php echo $iRow["product_modelno"];?></td>
						<td><?php echo str_replace("&", " and ", $iRow["comments"]);?></td>
						<td align="center"><?php echo $iRow["product_quantity"];?></td>
						</tr>
						
						<?php $i++; } ?>
					</tbody>
					<?php } ?>
				</table>
				<br/><br/>
            <p style="margin:0px;">Best Regards,</p>
            <p style="margin:0px 0px 10px 0px;">The <?php echo $this->config->item('site_name');?> team</p>
            <p style="color:#b9b9b9;font-size:12px;">This email can't receive replies. For more information, visit the <a href="<?php echo base_url();?>" style="color:#47a0cb"><?php echo $this->config->item('site_name');?></a>. </p>
        </td>
    </tr>
	
    </tbody>
</table>
</body>
</html>