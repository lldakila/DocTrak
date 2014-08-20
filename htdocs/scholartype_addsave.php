<?php
session_start();
$con=mysqli_connect("localhost","root","","lueasp");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$_SESSION['viewcode'] =$_POST['typecode'];
$_SESSION['viewdesc'] =$_POST['typedesc'];
$_SESSION['viewslot'] =$_POST['typeslot'];
$typecode=$_POST['typecode'];
$typedesc=$_POST['typedesc'];
$typeslot=$_POST['typeslot'];
$typedate = date('Y-m-d H:i:s');

if(($typecode=="")||($typedesc=="")||($typecode=="")||(($typedesc==""))){
	echo "All fields must be filled-up.";
	exit();
}

$sql="INSERT INTO type(typecode, typedesc, typeslot, typetransdate) VALUES ('$typecode','$typedesc','$typeslot','$typedate')";



// Execute query
if (mysqli_query($con,$sql)) {
  header("Location: http://localhost/scholartype_view.php");
		
} else {
  echo "<br/><br/>Error inserting to table: " . mysqli_error($con) ."<br>".$sql;
}



?>