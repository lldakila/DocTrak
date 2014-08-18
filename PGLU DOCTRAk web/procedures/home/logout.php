<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../index.php');
}



session_start();
session_destroy();


header('Location:../../index.php');
?>


