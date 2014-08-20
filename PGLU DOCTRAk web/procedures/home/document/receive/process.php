<?php

    session_start();
    if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
      $_SESSION['in'] ="start";
     header('Location:../../../../index.php');
    }

   require_once("../../../connection.php");
    date_default_timezone_set($_SESSION['Timezone']);
   global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
   $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
//echo "UPDATE DOCUMENT SET DOCUMENT_ID='".$_POST['barcode']."',DOCUMENT_TITLE='".$_POST['title']."',DOCUMENT_DESCRIPTION='".$_POST['description']."',DOCUMENT_FILE='".$_POST['file']."',FK_TEMPLATE_ID='".$_POST['template']."',FK_DOCUMENTTYPE_ID='".$_POST['type']."' WHERE DOCUMENT_ID = '".$_POST['primarykey']."' ";

    if ($_SESSION['keytracker']=='') {
        $_SESSION['operation']=='error';

    }
    else {
        $query="UPDATE DOCUMENTLIST_TRACKER SET RECEIVED_VAL=1,RECEIVED_BY='".$_SESSION['security_name']."',RECEIVED_DATE='".date("Y-m-d H:i:s")."',RECEIVED_COMMENT='".$_POST['comment']."' WHERE DOCUMENTLIST_TRACKER_ID = ". $_SESSION['keytracker']." ";
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
   header('Location:../../../../receiveddoc.php');

 ?>