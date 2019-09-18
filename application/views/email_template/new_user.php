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
            <p style="margin:0px 0px 10px 0px;">New customer has registered and needs approval.</p>
           	<p style="margin:0px 0px 10px 0px;"><strong>Customers details:</strong></p>
           	<p style="margin:0px 0px 10px 0px;">Full Name: <?php echo $user_info["user_firstname"].' '.$user_info["user_lastname"];?></p>
           	<p style="margin:0px 0px 10px 0px;">Email address: <?php echo $user_info["user_emailaddress"];?></p>
           	<p style="margin:0px 0px 10px 0px;">Contact Number: <?php echo $user_info["user_contactno"];?></p>
           	<p style="margin:0px 0px 10px 0px;">Facility Name: <?php echo $user_info["user_facility_name"];?></p>
           	<p style="margin:0px 0px 10px 0px;">Account No: <?php echo $user_info["user_account_no"];?></p>
           	<p style="margin:0px 0px 10px 0px;">Department: <?php echo $user_info["user_department"];?></p>
           	<p style="margin:0px 0px 10px 0px;">Address: <?php echo $user_address;?></p>
           	
            <p style="margin:0px;">Best Regards,</p>
            <p style="margin:0px 0px 10px 0px;">The <?php echo $this->config->item('site_name');?> team</p>
            <p style="color:#b9b9b9;font-size:12px;">This email can't receive replies. For more information, visit the <a href="<?php echo base_url();?>" style="color:#47a0cb"><?php echo $this->config->item('site_name');?></a>. </p>
        </td>
    </tr>

    </tbody>
</table>
</body>
</html>