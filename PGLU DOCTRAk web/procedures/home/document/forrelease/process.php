<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../../index.php');
}
?>

<?php
session_start();
    require_once("../../../connection.php");
    date_default_timezone_set('Asia/Manila');
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);

    if ($_SESSION['keytracker']=='')
    {
        $_SESSION['operation']=='error';
        echo "waley";

    }
    else {
        $query="UPDATE DOCUMENTLIST_TRACKER SET FORRELEASE_VAL=1,FORRELEASE_DATE='".date("Y-m-d H:i:s")."' WHERE DOCUMENTLIST_TRACKER_ID = ". $_SESSION['keytracker']." ";
        //echo $query;
        $RESULT=mysqli_query($con,$query);
        if (!$RESULT) {
            $_SESSION['operation']='error';
        }
        else {
            $_SESSION['operation']='save';
            $_SESSION['keytracker']='';

	        $getID=select_info_multiple_key("SELECT FK_SECURITY_USERNAME,DOCUMENT_ID,DOCUMENT_TITLE,TRANSDATE,FK_DOCUMENTTYPE_ID FROM DOCUMENTLIST JOIN DOCUMENTLIST_TRACKER ON DOCUMENTLIST.DOCUMENT_ID = DOCUMENTLIST_TRACKER.FK_DOCUMENTLIST_ID WHERE FK_DOCUMENTLIST_ID = '".$_SESSION['keytracker']."'");
			$document_owner = $getID[0]['FK_SECURITY_USERNAME'];
	        $document_id=$getID[0]['DOCUMENT_ID'];
	        $document_title=$getID[0]['DOCUMENT_TITLE'];
	        $document_transdate=$getID[0]['TRANSDATE'];
	        $document_documenttype=$getID[0]['FK_DOCUMENTTYPE_ID'];
			$document_message = $_SESSION['AutoMessage1'];
	        $document_message = $document_message . "<br>Barcode:'.$document_id.'<br>Title:'.$document_title.'<br>Type:'.$document_documenttype.'<br>Date:'.$document_transdate.'<br><br>'".$_SESSION["AutoMessage2"]."'";
	        $query="INSERT INTO MAIL(MAILCONTENT,FK_SECURITY_USERNAME_OWNER,MAILDATE,MAILTITLE,FK_SECURITY_USERNAME_SENDER,MAILSTATUS) VALUES ('".$document_message."','".$document_owner."','".date("Y-m-d H:i:s")."','".$document_title."','".$_SESSION['usr']."',0)";
	        mysqli_query($con,$query);
	        echo $query;

        }
        mysqli_free_result($RESULT);

    }

    mysqli_close($con);
    //header('Location:../forreleasedoc.php');

 ?>