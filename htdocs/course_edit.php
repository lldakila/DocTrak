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

		<script language="javascript" type="text/JavaScript">
		function validateForm(){
			if (document.setupForm.coursecode.value=="" | document.setupForm.coursedesc.value==""){
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
			<form method="post" onsubmit="return validateForm()" name="setupForm" action="course_editsave.php">
			<table class="setup" cellpadding="0" cellspacing="0">
				<tr>
					<td>Edit - COURSE</td>
				</tr>	
				<?php
				$con=mysqli_connect("localhost","root","","lueasp");

				// Check connection
				if (mysqli_connect_errno()) {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

				$result = mysqli_query($con, "SELECT * FROM course WHERE idcourse='".$_GET['id']."'");

		
				
				?>
				
				<tr>
					<td width="250">
					<?php 
					  $row = mysqli_fetch_array($result, MYSQLI_BOTH);
					?>
					<form action="course_editsave.php" method="POST">
						<table class="setup" align="left">
							<tr>
								<td align="right">Course Code :&nbsp;&nbsp;</td>
								<td colspan="2">
								<input type="hidden" name="idcourse" value="<?php echo"".$row['idcourse']."";?>">
								<input type="text" id="coursecode" name="coursecode" value="<?php echo"".$row['coursecode']."";?>"></td>
							</tr>
							<tr>
								<td  align="right">Name : &nbsp;&nbsp;</td>
								<td colspan="2"><input type="text" id="coursedesc" name="coursedesc" size="50" value="<?php echo"".$row['coursedesc']."";?>"></td>
							</tr>
							<tr>
								<td  align="right">Field : &nbsp;&nbsp;</td>
								<td colspan="2"><input type="text" id="coursefield" name="coursefield" size="50" value="<?php echo"".$row['coursefield']."";?>"></td>
							</tr>
						</table>
					</td>
				</tr>
				
				<tr>
					<td align="right">
						<input type="submit" value="Save" style="height:25px; width:60px">&nbsp;
						<input type="button" value="Cancel" style="height:25px; width:60px" onclick="window.location.href=('course_browse.php')"></a>
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