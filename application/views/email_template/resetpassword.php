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
		<tr>
			<td bgcolor="#ece8e8"><img src="<?php echo base_url();?>assets/admin/img/logo.png"></td>
		</tr>
		<tr>
			<td style="border:1px solid #f0f0f0;border-bottom:1px solid #c0c0c0;"><h3 style="margin:0px;margin-bottom: 15px;font-size: 24px;line-height: 1.1;font-weight: 500;"> Hi <?php echo $user_firstname;?>, </h3>
				<p style="margin:0px 0px 10px 0px;">You are receiving this email because you requested help with your password.</p>
				<p>Please <a href="<?php echo site_url('index.php/admin/resetpassword');?>/index/<?php echo $code;?>">click here </a></p>
				<p style="margin:0px;">Best Regards,</p>
				<p style="margin:0px 0px 10px 0px;">The <?php echo $this->config->item('site_name');?> team</p>
				<p style="color:#b9b9b9;font-size:12px;">This email can't receive replies. For more information, visit the <a href="<?php echo base_url();?>" style="color:#47a0cb"><?php echo $this->config->item('site_name');?></a>. </p>
				</td>
		</tr>
		
	</tbody>
</table>
</body>
</html>