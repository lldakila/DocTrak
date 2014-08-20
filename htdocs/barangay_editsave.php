<?php
session_start();
$con=mysqli_connect("localhost","root","","lueasp");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$_SESSION['viewcode'] =$_POST['brgycode'];
$_SESSION['viewdesc'] =$_POST['brgydesc'];
$brgycode=$_POST['brgycode'];
$brgydesc=$_POST['brgydesc'];
$idbrgy=$_POST['idbrgy'];
$officedate = date('Y-m-d H:i:s');

$sql="UPDATE barangay SET brgycode='$brgycode', brgydesc='$brgydesc' WHERE idbrgy='$idbrgy'";


// Execute query
if (mysqli_query($con,$sql)) {
  header("Location: http://localhost/barangay_view.php");
		
} else {
  echo "<br/><br/>Error inserting to table: " . mysqli_error($con) ."<br>".$sql;
}


?>+