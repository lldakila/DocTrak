<?php
    session_start();
    if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
        $_SESSION['in'] ="start";
        header('Location:../../../../index.php');
    }
    
    date_default_timezone_set($_SESSION['Timezone']);
    require_once("../../../connection.php");
		$con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
		
		
		
    
    
    
?>