<?php
session_start();if (session_status() == PHP_SESSION_NONE) {
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
    require_once("../../../audit.php");
    date_default_timezone_set($_SESSION['Timezone']);
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $flag=true;
    $KEY=get_key();
    mysqli_autocommit($con,FALSE);
 
    if ($_POST['primarykey']=='') 
    {
        $_SESSION['operation']='error';

    }
    else 
    {
        
        $query="UPDATE documentlist_tracker SET RELEASED_VAL=1,RELEASED_BY='".$_SESSION['security_name']."',RELEASED_DATE='".date("Y-m-d H:i:s")."',RELEASED_COMMENT='".$_POST['commenttext']."' WHERE DOCUMENTLIST_TRACKER_ID = '". $doc_tracker_id."' ";
        log_audit($KEY,$query,'Release Document',''.$_SESSION['security_name'].'');  
        $RESULT=mysqli_query($con,$query);
        
        if (!$RESULT) 
        {
           $flag=false;
        }
        $query="SELECT max(documentlist_tracker_id) as max,documentlist_tracker_id,fk_documentlist_id FROM documentlist_tracker WHERE fk_documentlist_id= '". $doc_documentid."'";
        $queryresult=mysqli_query($con,$query);
        $row=mysqli_fetch_array($queryresult,MYSQLI_ASSOC);
       
//        echo "<br><br>";
//        echo "keytracker: ".$_SESSION['keytracker']."<br>";
//        echo "tracker id: ".$row['max']."<br>";
//       die;
        if ($doc_tracker_id==$row['max'])
        {
            $query="update documentlist set complete=1 where document_id ='".$doc_documentid."'";  
            $RESULT=mysqli_query($con,$query);
            log_audit($KEY,$query,'Document Complete',''.$_SESSION['security_name'].'');  
        if (!$RESULT) 
        {
            $flag=false;
        }

        }
        
        
        //START INSERT INTO DOCUMENTLIST_HISTORY

        include ("../common/history.php");
        if(!InsertHistory($doc_documentid,$_SESSION['OFFICE'],'Document Released',$_POST['commenttext'],'Released by '.$_SESSION['security_name']))
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
            log_audit($KEY,'','RolledBack',''.$_SESSION['security_name'].'');
        }
            

    }
    
    mysqli_free_result($RESULT);
    mysqli_close($con);
    header('Location:../releasedoc.php');

 ?>