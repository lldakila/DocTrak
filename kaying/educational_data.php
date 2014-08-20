<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>eLUEASP EDUCATIONAL DATA</title>
			<script language="JavaScript" type="text/JavaScript" src="menu.js"></script>
		<link href="template_education.css" rel="stylesheet" type="text/css" media="all" >
	
			<!-- SCRIPT FOR CLEAR!-->
		<script type="text/javascript">
		
			function cleartext(){
			var e = document.getElementsByTagName("input");
		
			//Loop through all input
			for(i = 0; i < e.length; i++){
			e[i].value = "";}
				}
		</script>	
		
		
	</head>

<body>

<?php include "header.php";?>

<div class="main">
	
	<div class="postleft"> <!-- picture -->
	
				<div class="picture">
					<center>
					<img src="images/users.jpg" width="200" height="200" />
					</center>
				
					<div class="list" width="350px" border="1"> 
						 <table class="listview" width="350px" border="1">  
							 <tr>
								<td bgcolor="#919396" width="200px" align="center"><b>ID No.</td>
								<td bgcolor="#919396" width="700px" align="center"><b>Name of Scholar</td>
							</tr>
							 <tr>
								<td align="center">81057</td>
								<td align="left">Laigo, Clarence, Angelo </td>
							</tr>
							<tr>
								<td align="center">84011</td>
								<td align="left">Noto, Jamie Rose, Aquino </td>
							</tr>
							<tr>
								<td align="center">82088</td>
								<td align="left">Oreta, Jonalyn, Geda </td>
							</tr>
						</table>
					</div>
				</div>						
	</div> <!-- postleft-->
	
	
	
	<div class="postright"> <!-- postright -->
		
		<div class="groupeduc">
			
			<div class="educational">
				<form name="educational-info" method="post" action="">
					<h2>I.  EDUCATIONAL DATA</h2>
						<div>
							<table class="eductable" align="left">  
								<tr bgcolor="#919396" align="center">
									<td  width="110px"><b>LEVEL</td>
									<td  width="250px"><b>NAME OF SCHOOL</td>
									<td  width="250px"><b>ADDRESS OF SCHOOL</td>
								</tr>
							</table>	
						</div>	
			</div>
		</div>		
	</div> <!-- postright -->


	<div class="tfclear"></div>
	
	<div class="buttons">
		<table align="center"> 	
			<tr>
				<td><input type="text" name="lname"> </td>  
				<td><button type="submit" name="search" value="Search"/>Search</td>  
				<td><button type="submit" name="edit" value="Edit"/>Edit</td> 
				<td><button type="submit" name="save" value="Save"/>Save</td> 
				<td><button type="submit" name="cancel" value="Cancel" onclick="cleartext()"/>Cancel</td> 
			</tr>	
		</table>	
	</div> 
</div>	


<?php include "footer.php";?>

	
</table>
</body>
</html>