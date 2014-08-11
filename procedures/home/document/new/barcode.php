<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
    $_SESSION['in'] ="start";
    header('Location:../../../../index.php');
}
?>



<?php

session_start();

    $now = new DateTime();
    $year = $now->format("Y");

    $month = $now->format("m");



        require_once("../../../connection.php");

        $query=select_info_multiple_key("SELECT FK_OFFICE_NAME from security_user WHERE SECURITY_USERNAME = '".$_SESSION['usr']."' ");
        //echo $query[0]['FK_OFFICE_NAME'];

        $value= substr($query[0]['FK_OFFICE_NAME'],0,3);

        $query=select_info_multiple_key("SELECT COUNTER from GENERATOR WHERE GENERATOR_NAME = 'BARCODE' ");


        $gen= $query[0]['COUNTER'];

        $gen=$gen+1;
        $query=insert_update_delete("UPDATE GENERATOR SET COUNTER='.$gen.' WHERE GENERATOR_NAME = 'BARCODE'");

        echo $value. "-" .$year.$month. "-" .$gen;

      //  return $query['FK_OFFICE_NAME'];



  //  }


?>