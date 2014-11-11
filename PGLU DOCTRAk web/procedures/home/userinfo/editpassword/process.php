<?php
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
		$_SESSION['in'] ="start";
		header('Location:../../../../index.php');
	}


	require_once("../../../connection.php");
	
	
	if ($_SESSION['pswd'] != md5($_POST['currentpass']))
	{
		$_SESSION['operation']='passwordValidation';
		header('Location:../editpassword.php');
		exit;
		//echo $_SESSION['pswd']." != " .md5($_POST['currentpass']);
			
	}
	/*echo "<br>";
	echo $_SESSION['pswd'];
	echo "<br>";
	echo $_SESSION['operation'];
	echo "<br>";
	echo md5($_POST['currentpass']);
	echo "<br>";
	echo md5($_POST['verifypass']);
	echo "<br>";
	echo $_SESSION['usr'];
	echo "<br";
	echo $_POST['currentpass'];*/

	
	global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
	$query="UPDATE security_user SET SECURITY_PASSWORD = '".md5($_POST['newpass'])."' WHERE SECURITY_USERNAME = '".$_SESSION['usr']."' ";

	$RESULT=mysqli_query($con,$query);

	if (!$RESULT)
	{
		$_SESSION['operation']='error';
		//echo mysqli_error($con);
		//echo "<br>";
	}

	else
	{
		$_SESSION['operation']='save';
	}

	mysqli_free_result($RESULT);
	mysqli_close($con);



	header('Location:../editpassword.php');
?>