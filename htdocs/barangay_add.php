<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>eLUEASP</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<meta name="keywords" content="scholarship">
		<meta name="description" content="La Union Scholars">
		<meta name="Author" content="JKJ">
		<META NAME="robots" CONTENT="index, follow"> <!-- (Robot commands: All, None, Index, No Index, Follow, No Follow) -->
		<META NAME="revisit-after" CONTENT="30 days">
		<META NAME="distribution" CONTENT="global"> 
		<META NAME="rating" CONTENT="general">
		<META NAME="Content-Language" CONTENT="english">


		<script language="JavaScript" type="text/JavaScript" src="menu.js"></script>
		<link href="templates.css" rel="stylesheet" type="text/css">
		
		<!--<script>
		function validateForm(setupForm){
			if (setupForm.muncode.value==""){
			alert('All fields are required.');
			return false;
		}
		}
		</script>	-->
		
		<script language="javascript" type="text/JavaScript">
		function validateForm(){
			if (document.setupForm.brgycode.value=="" | document.setupForm.brgydesc.value==""){
			alert('All fields are required.');
			return false;
			}
		}
		</script>

	</head>

<body>

<?php include "header.php";?>

<div class="scholar">
	<table>
		<tr>
			<td valign="top">
				<?php include "menu_setup.php";?>
			</td>

			<!--edit here-->
			<td valign="top">
			<form method="post" onsubmit="return validateForm()" name="setupForm" action="barangay_addsave.php">
			<!--<form method="post" onsubmit="validateForm(this)" action="barangay_addsave.php">-->
			<table class="setup" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center">SET-UP MENU</td>
				</tr>
				
				<tr>
					<td>Add - BARANGAY</td>
				</tr>	
				
				<tr>
					<td width="250">
						<table class="setup" align="left">
							<tr>
								<td align="right">Barangay Code :&nbsp;&nbsp;</td>
								<td colspan="2"><input type="text" id="brgycode" name="brgycode"></td>
							</tr>
							<tr>
								<td  align="right">Name : &nbsp;&nbsp;</td>
								<td colspan="2"><input type="text" id="brgydesc" name="brgydesc" size="50"></td>
							</tr>
							<tr>
								<td  align="right">Municipality : &nbsp;&nbsp;</td>
								<td colspan="2">
									<select name="munselect" id="munselect">
									<option value="" selected></option>
									
									<?php
									$con=mysqli_connect("localhost","root","","lueasp");

									// Check connection
									if (mysqli_connect_errno()) {
									  echo "Failed to connect to MySQL: " . mysqli_connect_error();
									}

									$result = mysqli_query($con, "SELECT * FROM municipality order by idmun");
					
									while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
											echo "<option value='" . $row['muncode'] . "'>" . $row['mundesc'] . "</option>";
									}			
									mysqli_close($con);
									echo "</select>"
									?>
									
									</select>
								  
								</td>
							</tr>	
						</table>
					</td>
				</tr>
				
				<tr>
					<td align="right">
						<input type="submit" value="Save" style="height:25px; width:60px">&nbsp;
						<input type="button" value="Cancel" style="height:25px; width:60px" onclick="window.location.href=('barangay_browse.php')"></a>
					</td>
				</tr>		
			</table>
			</form>
			</td>
			<!--until here-->
		</tr>
	</table>
</div>

<?php include "footer.php";?>

</table>
</body>
</html>