<?php




session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../index.php');
}


########## MySql details (Replace with yours) #############
$username = "root"; //mysql username
$password = "passw0rd"; //mysql password
$hostname = "localhost"; //hostname
$databasename = 'doctrak'; //databasename

//connect to database
$mysqli = new mysqli($hostname, $username, $password, $databasename);
   

?>