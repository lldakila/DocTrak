<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../../index.php');
}

    require_once("../../../connection.php");
    date_default_timezone_set('Asia/Manila');
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);

    if ($_SESSION['keytracker']=='') {
        $_SESSION['operation']=='error';

    }
    else {
        $query="UPDATE DOCUMENTLIST_TRACKER SET RELEASED_VAL=1,RELEASED_BY='".$_SESSION['security_name']."',RELEASED_DATE='".date("Y-m-d H:i:s")."',RELEASED_COMMENT='".$_POST['comment']."' WHERE DOCUMENTLIST_TRACKER_ID = ". $_SESSION['keytracker']." ";
        $RESULT=mysqli_query($con,$query);

        if (!$RESULT) {
            $_SESSION['operation']='error';
        }
        else {
            $_SESSION['operation']='save';
            $_SESSION['keytracker']='';
        }

        mysqli_free_result($RESULT);
    }

    mysqli_close($con);
    header('Location:../../../../releasedoc.php');

 ?>