<?php
session_start();if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../../index.php');
}

    require_once("../../../connection.php");
    date_default_timezone_set($_SESSION['Timezone']);
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $flag=true;
    mysqli_autocommit($con,FALSE);
    if ($_SESSION['keytracker']=='') {
        $_SESSION['operation']=='error';

    }
    else 
    {
        $query="UPDATE documentlist_tracker SET RELEASED_VAL=1,RELEASED_BY='".$_SESSION['security_name']."',RELEASED_DATE='".date("Y-m-d H:i:s")."',RELEASED_COMMENT='".$_POST['comment']."' WHERE DOCUMENTLIST_TRACKER_ID = ". $_SESSION['keytracker']." ";
        $RESULT=mysqli_query($con,$query);
        
        if (!$RESULT) 
        {
           $flag=false;
        }
        $query="SELECT max(documentlist_tracker_id),documentlist_tracker_id,fk_documentlist_id FROM documentlist_tracker WHERE fk_documentlist_id= ". $_POST['barcodeno'];
        $queryresult=mysqli_query($con,$query);
        $row=mysqli_fetch_array($queryresult,MYSQLI_ASSOC);
       
        if ($_SESSION['keytracker']==$row["documentlist_tracker_id"])
        {
            $query="update documentlist set complete=1 where document_id ='".$row['fk_documentlist_id']."'";  
            $RESULT=mysqli_query($con,$query);
            
        if (!$RESULT) 
        {
            $flag=false;
        }

        }

        
        //START INSERT INTO DOCUMENTLIST_HISTORY

        include ("../common/history.php");
        if(!InsertHistory($_POST['barcodeno'],$_SESSION['OFFICE'],'Document Released',$_POST['comment'],'Released by '.$_SESSION['security_name']))
        {
            $flag=false;
        }

        //END INSERT INTO DOCUMENTLIST_HISTORY
        
        if ($flag) 
        {
            mysqli_commit($con);
            $_SESSION['operation']='save';
            $_SESSION['keytracker']='';

        }
        else
        {
            mysqli_rollback($con);
            $_SESSION['operation']='error'; 
        }
            

    }
    
    mysqli_free_result($RESULT);
    mysqli_close($con);
    header('Location:../releasedoc.php');

 ?>