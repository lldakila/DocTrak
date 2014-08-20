<?php
session_start();
$con=mysqli_connect("localhost","root","","lueasp");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$_SESSION['viewcode'] =$_POST['muncode'];
$_SESSION['viewdesc'] =$_POST['mundesc'];
$muncode=$_POST['muncode'];
$mundesc=$_POST['mundesc'];
$munid=$_POST['munid'];
$mundate = date('Y-m-d H:i:s');

$sql="UPDATE municipality SET muncode='$muncode', mundesc='$mundesc' WHERE idmun='$munid'";


// Execute query
if (mysqli_query($con,$sql)) {
  header("Location: http://localhost/municipality_view.php");
		
} else {
  echo "<br/><br/>Error inserting to table: " . mysqli_error($con) ."<br>".$sql;
}



?>+