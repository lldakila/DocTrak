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
		
		<script language="JavaScript" type="text/javascript">
		function edit(id)
        {
          window.location="course_edit.php?id="+id;
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
			<table class="setup" cellpadding="1" cellspacing="1">
				<tr>
					<td align="center">SET-UP MENU</td>
				</tr>
				
				<tr>
					<td>Browse - COURSE</td>
				</tr>	
				
				<tr>
					<td>
					<table class="setup" cellpadding="0" cellspacing="0">
						<tr>
							<td width="100" align="center">Course Code</td>
							<td width="300" align="center">Name</td>
							<td width="300" align="center">Field</td>
							<td width="50" align="center">Edit</td>
						</tr>
							<?php
							$con=mysqli_connect("localhost","root","","lueasp");

							// Check connection
							if (mysqli_connect_errno()) {
							  echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}

							$result = mysqli_query($con, "SELECT * FROM course order by idcourse");
							 
							$i=1;
							$color1="#CCEEFF";
							$color2="#FFFFFF";
							
							while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
								if ($i%2==1) $color=$color1;
								else $color=$color2;
								echo "
									<tr bgcolor='$color' onclick='javascript:window.location.href='course_view.php?'>
									<td>".$row['coursecode']."</td>
									<td>".$row['coursedesc']."</td>
									<td>".$row['coursefield']."</td>
									<td align=center><a onclick='edit(".$row['idcourse'].");'>"."<img src='images/edit.png' height='12px'/></a></td>
									</tr>
								";$i++;
							}			
							mysqli_close($con);
							?>
					</table>
					</td>
				</tr>
				<tr>
					<td align="right"><input type="button" value="Add" style="height:25px; width:60px" onclick="window.location.href=('course_add.php')"></td>
				</tr>
			</table>
			</td>
			
			
			<!--until here-->
		</tr>
	</table>
</div>

<?php include "footer.php";?>

</table>
</body>
</html>
