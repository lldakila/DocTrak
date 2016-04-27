<?php
if (session_status() == PHP_SESSION_NONE) 
{
    session_start();
}

if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd']))
{
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
    
//LOG ALL USERS LOGGING IN TO THE SYSTEM
require_once("../../../../audit.php");

if (mysqli_connect_error()) 
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die;
}

mysqli_autocommit($con,FALSE);
$flag=true;
$KEY=get_key();
    
if ($_SESSION['keytracker']=='')
{
    $_SESSION['operation']=='error';
}


else 
{
    $query="UPDATE documentlist_tracker SET FORRELEASE_VAL=1,FORRELEASE_DATE='".date("Y-m-d H:i:s")."',forrelease_comment='".$_POST['commenttext']."' WHERE DOCUMENTLIST_TRACKER_ID = ". $doc_tracker_id." ";
    $docid=$doc_tracker_id;

    $RESULT=mysqli_query($con,$query);
    if (!$RESULT) 
    {
        $flag=false;
    }
  
   
    log_audit($KEY,$query,'For Release Document',''.$_SESSION['security_name'].'');  
    $query="SELECT fk_office_name_documentlist,FK_SECURITY_USERNAME,DOCUMENT_ID,DOCUMENT_TITLE,TRANSDATE,FK_DOCUMENTTYPE_ID,OFFICE_NAME FROM documentlist JOIN documentlist_tracker ON documentlist.DOCUMENT_ID = documentlist_tracker.FK_DOCUMENTLIST_ID WHERE DOCUMENTLIST_TRACKER_ID = ".$docid;
    $RESULT=mysqli_query($con,$query);
    while ($rows=mysqli_fetch_array($RESULT))
    {
        $document_office=$rows['fk_office_name_documentlist'];
        $office_receiving=$rows['OFFICE_NAME'];
        $document_owner = $rows['FK_SECURITY_USERNAME'];
        $document_id=$rows['DOCUMENT_ID'];
        $document_title=$rows['DOCUMENT_TITLE'];
        $document_transdate=$rows['TRANSDATE'];
        $document_documenttype=$rows['FK_DOCUMENTTYPE_ID'];
        $document_message = $_SESSION['AutoMessage1'];
        $document_message = $document_message . '<br><br>Barcode: <font style="font-weight:bold;">'.$document_id.'</font><br>Title:<font style="font-weight:bold;">'.$document_title.'</font><br>Type:<font style="font-weight:bold;">'.$document_documenttype.'</font><br>Date:<font style="font-weight:bold;">'.$document_transdate.'</font><br><br>'.$_SESSION['AutoMessage2'];
    }

//    $query="INSERT INTO mail(MAILCONTENT,FK_SECURITY_USERNAME_OWNER,MAILDATE,MAILTITLE,FK_SECURITY_USERNAME_SENDER,MAILSTATUS) VALUES ('".$document_message."','".$document_owner."','".date("Y-m-d H:i:s")."','".$document_title."','".$_SESSION['usr']."',0)";
//    $RESULT=mysqli_query($con,$query);
//    if (!$RESULT) 
//    {
//        $flag=false;
//    }
//    
$sql="SELECT security_username FROM security_user WHERE fk_office_name = '".$document_office."' ";
    $secNameQuery=mysqli_query($con,$sql);
   
    while ($secNameResult=mysqli_fetch_array($secNameQuery))
    {
        $query="INSERT INTO mail(MAILCONTENT,FK_SECURITY_USERNAME_OWNER,MAILDATE,MAILTITLE,FK_SECURITY_USERNAME_SENDER,MAILSTATUS,fk_table,fk_key) VALUES ('".$document_message."','".$secNameResult['security_username']."','".date("Y-m-d H:i:s")."','".$document_title."','".$_SESSION['usr']."',0,'Document Tracking','".$document_id."')";
        $RESULT=mysqli_query($con,$query);
        //echo $query;      
        if (!$RESULT) 
        {
            $flag=false;
        }
        log_audit($KEY,$query,'Add Mail',''.$_SESSION['security_name'].'');  
    }

}
  
        //START INSERT INTO DOCUMENTLIST_HISTORY

        include ("../common/history.php");
        if(!InsertHistory($doc_documentid,$_SESSION['OFFICE'],'Document ready for release',$_POST['commenttext'],'Processed by '.$_SESSION['security_name']))
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
                log_audit($KEY,'','RolledBack',''.$_SESSION['security_name'].'');
                
        }


mysqli_free_result($RESULT);
mysqli_close($con);
header('Location:../forreleasedoc.php');

