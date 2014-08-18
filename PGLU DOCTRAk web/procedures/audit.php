<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
    header('Location:../index.php');
}
?>



<?php

    require_once("connection.php");
    session_start();









?>