<?php
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
		$_SESSION['in'] ="start";
		header('Location:../../../../index.php');
	}


	require_once("../../../connection.php");
	global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
	$query="UPDATE security_user SET SECURITY_USERNAME = '".$_POST['username']."',SECURITY_NAME = '".$_POST['fullname']."' WHERE SECURITY_USERNAME = '".$_SESSION['usr']."' ";

	$RESULT=mysqli_query($con,$query);

	if (!$RESULT)
	{
		$_SESSION['operation']=='error';
		//echo mysqli_error($con);
		//echo "<br>";
	}

	else
	{
		$_SESSION['operation']='save';
		$_SESSION['security_name']=$_POST['fullname'];
		$_SESSION['usr']=$_POST['username'];
	}

	mysqli_free_result($RESULT);
	mysqli_close($con);



	header('Location:../editprofile.php');
?>