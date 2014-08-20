<html>
<head>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr> 
		<td><img src="images/final.png" width="100%"></td>
	</tr>

	<tr> 
		<td valign="top" align="right" bgcolor="#0d6cb6">	
			<a href="personal_data.php"><img src="images/btn_info.jpg" name="btn_info" height="33" id="btn_info" onMouseOver="MM_swapImage('btn_info','','images/btn_info_dn.jpg',1)" onMouseOut="MM_swapImgRestore()"></a>		
			<a href="status.php"><img src="images/btn_status.jpg" name="btn_status" height="33" id="btn_status" onMouseOver="MM_swapImage('btn_status','','images/btn_status_dn.jpg',1)" onMouseOut="MM_swapImgRestore()"></a>
			<a href="payroll.php"><img src="images/btn_payroll.jpg" name="btn_payroll" height="33" id="btn_payroll" onMouseOver="MM_swapImage('btn_payroll','','images/btn_payroll_dn.jpg',1)" onMouseOut="MM_swapImgRestore()"></a>
			<a href="reports.php"><img src="images/btn_reports.jpg" name="btn_reports" height="33" id="btn_reports" onMouseOver="MM_swapImage('btn_reports','','images/btn_reports_dn.jpg',1)" onMouseOut="MM_swapImgRestore()"></a>
			<a href="setup.php"><img src="images/btn_setup.jpg" name="btn_setup" height="33" id="btn_setup" onMouseOver="MM_swapImage('btn_setup','','images/btn_setup_dn.jpg',1)" onMouseOut="MM_swapImgRestore()"></a>
			<a href="about.php"><img src="images/btn_about.jpg" name="btn_about" height="33" id="btn_about" onMouseOver="MM_swapImage('btn_about','','images/btn_about_dn.jpg',1)" onMouseOut="MM_swapImgRestore()"></a>
			<a href="logout.php"><img src="images/btn_logout.jpg" name="btn_logout" height="33" id="btn_logout" onMouseOver="MM_swapImage('btn_logout','','images/btn_logout_dn.jpg',1)" onMouseOut="MM_swapImgRestore()"></a>
		</td>
	<tr>
		<td valign="top" align="right" bgcolor="#0d6cb6">
		<?php
			date_default_timezone_set('Asia/Taipei'); 
			echo "<h1 class='today'> Today is ".date('m-d-Y H:i:s')."</h1>"; 
		?>
		</td>	
	</tr>
</table>
	
</body>
</html>