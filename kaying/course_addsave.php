<?php
session_start();
$con=mysqli_connect("localhost","root","","lueasp");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$_SESSION['viewcode'] =$_POST['coursecode'];
$_SESSION['viewdesc'] =$_POST['coursedesc'];
$_SESSION['viewfield'] =$_POST['coursefield'];
$coursecode=$_POST['coursecode'];
$coursedesc=$_POST['coursedesc'];
$coursefield=$_POST['coursefield'];
$coursedate = date('Y-m-d H:i:s');


$sql="INSERT INTO course(coursecode, coursedesc, coursefield, coursetransdate) VALUES ('$coursecode','$coursedesc', '$coursefield', '$coursedate')";


// Execute query
if (mysqli_query($con,$sql)) {
  header("Location: http://localhost/course_view.php");
		
} else {
  echo "<br/><br/>Error inserting to table: " . mysqli_error($con) ."<br>".$sql;
}



?>