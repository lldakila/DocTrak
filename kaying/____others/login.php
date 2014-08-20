<html>
	<head>
		<link rel="stylesheet" media="screen" href="templates.css" type="text/css" />
		
		<script type="text/JavaScript"> 
		function clearlogin(){
			document.form1.username.value="";
			document.form1.password.value="";
		}
		</script>
	</head>
	
	<body>
		<div style="color:white" align ="center">
			<?php
			session_start();
				if($_SESSION['checkq']=='invalid'){
				echo "Invalid Username or Password";
				}
			$_SESSION['checkq']='clear'
			?>	
			
		</div>
	
		<div class="bg-login">
		<form name="form1" method="post" action="checklogin.php">
		<table class="login" align="center" valign="middle">
			<tr>	
				<td class="test"><font style="font-weight:bold;">Username:</font></td>
			</tr>
			<tr>
				<td class="test"><input name="username" type="text" id="username" /></td>
			</tr>
			<tr>
				<td><font style="font-weight:bold;">Password:</font></td>
			</tr>
			<tr>
				<td class="test"><input name="password" type="password" id="password" /></td>
			</tr>
			<tr>
				<td class="test" align="left"><input type="checkbox" name="remember" value ="remeberme">remember password?</td>
			</tr>
			<tr>
				<td align="left"><input type="submit" name="Submit" value="Login"/>&nbsp;<input type="reset" name="reset" value="Clear"  onclick="clearlogin()" />
				</td>
			</tr>	
		</table>
		</form>
		</div>
	</body>
</html>

