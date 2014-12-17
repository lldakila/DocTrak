<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
      $_SESSION['in'] ="start";
     header('Location:../../../../index.php');
    }

    require_once("../common/encrypt.php");
    $doc_tracker_id=intval(decryptText(base64_decode($_POST['primarykey'])));
    $doc_documentid=decryptText(base64_decode($_POST['barcode']));
    
    require_once("../../../connection.php");
    date_default_timezone_set($_SESSION['Timezone']);
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);

    if (mysqli_connect_error()) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die;
    }
   
    mysqli_autocommit($con,FALSE);
    $flag=true;
  
    
    if ($_SESSION['keytracker']=='')
    {
        $_SESSION['operation']=='error';
        echo "waley";

    }
    else 
    {
        $query="UPDATE documentlist_tracker SET RECEIVED_VAL=1,RECEIVED_BY='".$_SESSION['security_name']."',RECEIVED_DATE='".date("Y-m-d H:i:s")."',RECEIVED_COMMENT='".$_POST['comment']."' WHERE DOCUMENTLIST_TRACKER_ID = ". $doc_tracker_id." ";
        $RESULT=mysqli_query($con,$query);
       
        if (!$RESULT) 
        {
            $flag=false;

        }
        
        
        
        //START INSERT INTO DOCUMENTLIST_HISTORY

        include ("../common/history.php");
        if(!InsertHistory($doc_documentid,$_SESSION['OFFICE'],'Document Received',$_POST['comment'],'Received by '.$_SESSION['security_name']))
        {
            $flag=false;
        }

        //END INSERT INTO DOCUMENTLIST_HISTORY

            
        if ($flag) 
        {
                $_SESSION['operation']="save";
                $_SESSION['message']="Save Successful";
                $_SESSION['keytracker']='';
                mysqli_commit($con);
        }
        else 
        {
                mysqli_rollback($con);
                $_SESSION['operation']="error";
                
        }
            
    

    }


    mysqli_free_result($RESULT);
    mysqli_close($con);
    header('Location:../receiveddoc.php');

 ?>