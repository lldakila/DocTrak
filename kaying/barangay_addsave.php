<?php
session_start();
$con=mysqli_connect("localhost","root","","lueasp");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$_SESSION['viewcode'] =$_POST['brgycode'];
$_SESSION['viewdesc'] =$_POST['brgydesc'];
$_SESSION['viewmuncode'] =$_POST['muncode'];
$brgycode=$_POST['brgycode'];
$brgydesc=$_POST['brgydesc'];
$brgydate = date('Y-m-d H:i:s');
$muncode=$_POST['muncode'];

//if(($brgycode=="")||($brgydesc=="")||($brgycode=="")||(($brgydesc==""))){
	//echo "All fields must be filled-up.";
	//exit();
//}

$sql="INSERT INTO barangay(brgycode, brgydesc, brgytransdate, muncode) VALUES ('$brgycode','$brgydesc','$brgydate','$muncode')";



// Execute query
if (mysqli_query($con,$sql)) {
  header("Location: http://localhost/barangay_view.php");
		
} else {
  echo "<br/><br/>Error inserting to table: " . mysqli_error($con) ."<br>".$sql;
}



?>