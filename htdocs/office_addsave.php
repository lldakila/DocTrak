<?php
session_start();
$con=mysqli_connect("localhost","root","","lueasp");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$_SESSION['viewcode'] =$_POST['officecode'];
$_SESSION['viewdesc'] =$_POST['officedesc'];
$officecode=$_POST['officecode'];
$officedesc=$_POST['officedesc'];
$officedate = date('Y-m-d H:i:s');


$sql="INSERT INTO office(officecode, officedesc, officetransdate) VALUES ('$officecode','$officedesc','$officedate')";


// Execute query
if (mysqli_query($con,$sql)) {
  header("Location: http://localhost/office_view.php");
		
} else {
  echo "<br/><br/>Error inserting to table: " . mysqli_error($con) ."<br>".$sql;
}



?>