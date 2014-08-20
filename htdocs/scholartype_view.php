<?php 
session_start();
?>
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
			<form method="post" action="municipality_addsave.php">
			<table class="setup" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center">SET-UP MENU</td>
				</tr>
				<tr>
					<td>View - SCHOLAR TYPE</td>
				</tr>	
				<tr>
					<td>	
						<table class="setup" align="left">
							<tr>
							
								<td width="150px" align="left" >Scholar Type Code :&nbsp;&nbsp;   </td>
								<td colspan="2"> <?php echo"".$_SESSION['viewcode']."";  ?></td>
							</tr>
							<tr>
								<td align="left">Name : &nbsp;&nbsp;  </td>
								<td colspan="2"> <?php echo"".$_SESSION['viewdesc']."";  ?></td>
							</tr>
							<tr>
								<td align="left">Slot : &nbsp;&nbsp;  </td>
								<td colspan="2"> <?php echo"".$_SESSION['viewslot']."";  ?></td>
							</tr>
							
						</table>
					</td>
				</tr>
				<tr>
					<td align="right">
						<a onclick="window.location.href='scholartype_browse.php'"><input type="button" value="Browse" style="height:25px; width:60px"></a> &nbsp;
						<a onclick="window.location.href='scholartype_add.php'"><input type="button" value="Add" style="height:25px; width:60px"></a>
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