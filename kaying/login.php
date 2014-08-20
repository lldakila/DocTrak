<?php
 
date_default_timezone_set('Asia/Taipei');
$con=mysqli_connect("localhost","root","","lueasp");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

session_start();
$_SESSION['user'] =$_POST['username'];
$_SESSION['pass'] =$_POST['password'];
$username=$_POST['username'];
$password=$_POST['password'];
$datetrandsdate = date('Y-m-d H:i:s');

$result = mysqli_query($con, "select * from login where username='".$_POST['username']."' AND password='".$_POST['password']."'");						  
$query1 = mysqli_fetch_array($result, MYSQLI_BOTH);

if($query1){
	$sql= "insert into datelogin(login_idlogin, datetransdate) values ('".$query1[0][0]."','$datetrandsdate')";
		if (mysqli_query($con,$sql)) {
			header("Location:personal_data.php");
		} 
		else {
			echo "<br/><br/>Error inserting to table: " . mysqli_error($con) ."<br>".$sql;
		}
}
else{
	session_start();
	$_SESSION['checkq']='invalid';
	header("Location:index.php");
	}
?>