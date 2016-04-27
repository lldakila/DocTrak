<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:index.php');
}
date_default_timezone_set($_SESSION['Timezone']);
require_once('procedures/connection.php');

include ("procedures/home/document/common/history.php");
//LOG ALL USERS LOGGING IN TO THE SYSTEM
require_once("audit.php");
require_once ("message.php");
switch($_POST['module'])
{
    case 'newDocu':
        NewDocument();
        break;

    case 'searchReceiveDocument':
        searchDocInfo($_POST['docId']);
        break;

    case 'receiveDocu':
        receiveDocument($_POST['docId']);
        break;

    case 'searchReleaseDocument':
        searchDocInfo($_POST['docId']);
        break;

     case 'releaseDocu':
        releaseDocument($_POST['docId']);
        break;

    case 'searchForReleaseDocument':
        searchDocInfo($_POST['docId']);
        break;

    case 'ForreleaseDocu':
        ForReleaseDocument($_POST['docId']);
        break;

}

//NEW DOCUMENT FUNCTION
function NewDocument()
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $cons=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    mysqli_autocommit($cons,FALSE);
    $flag=true;

        //CREATE NEW DOCUMENT

            //INSERT INTO DOCUMENTLIST
            $query="INSERT INTO documentlist(DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,FK_SECURITY_USERNAME,TRANSDATE,FK_OFFICE_NAME_DOCUMENTLIST) VALUES ('".$_POST['docId']."','".mysqli_real_escape_string($cons, $_POST['docTitle'])."','".mysqli_real_escape_string($cons, $_POST['docDesc'])."','".$_POST['docTemplate']."','".$_POST['docType']."','".$_SESSION['usr']."','".date("Y-m-d H:i:s")."','".$_SESSION['OFFICE']."')";
            $RESULT1=mysqli_query($cons,$query);
            if (!$RESULT1)
            {
                $flag=false;
                 $errMsg = mysqli_error($cons)."<br>";

            }
        //LOG

            $KEY=get_key();
            log_audit($KEY,$query,'New Document',''.$_SESSION['security_name'].'');

            //SELECT DATA WITH THESAME TEMPLATE SELECTED
            $query="SELECT  fk_office_name,SORT,docprocess FROM template_list WHERE fk_template_id= '".$_POST['docTemplate']."' order by sort asc";
            $RESULT2=mysqli_query($cons,$query);

            while ($row = mysqli_fetch_array($RESULT2))
            {
                //INSERT OFFICES/TEMPLATE LIST AT DOCUMENTLIST_TRACKER
                $query="INSERT INTO documentlist_tracker(OFFICE_NAME,SORTORDER,fk_documentlist_id,docprocess) VALUES ('".$row['fk_office_name']."','".$row['SORT']."','".$_POST['docId']."','".$row['docprocess']."')";
                $outcome=mysqli_query($cons,$query);

                if (!$outcome)
                {
                   $flag=false;
                   $errMsg = mysqli_error($cons)."<br>";
                }
                 log_audit($KEY,$query,'New Document',''.$_SESSION['security_name'].'');
            }

            $sqlquery="insert into documentlist_history(fk_documentlist_id,fk_officename,document_process,transdate,document_comment,document_details) values ('".$_POST['docId']."','".$_SESSION['OFFICE']."','Document Created','".date("Y-m-d H:i:s")."','','Created by ".$_SESSION['security_name']."')";

//            //INSERT INTO DOCUMENTLIST_HISTORY
//            if(!InsertHistory($_POST['docId'],$_SESSION['OFFICE'],'Document Created','','Created by '.$_SESSION['security_name']))
//            {
//                $flag=false;
//            }

            $RESULT=mysqli_query($cons,$sqlquery);
             log_audit($KEY,$sqlquery,'New Document',''.$_SESSION['security_name'].'');
            if (!$RESULT)
            {
               $flag=false;
                $errMsg = mysqli_error($cons)."<br>";
            }
            if ($flag)
            {
                $errMsg = "Save Successful";
                mysqli_commit($cons);
            }
            else
            {
                //$errMsg = "Something went wrong. Try Again";
                log_audit($KEY,'','RolledBack',''.$_SESSION['security_name'].'');
                mysqli_rollback($cons);
            }

            echo filterMessage($errMsg);
            mysqli_close($cons);


    }

//SEARCH USER SCANNED FROM BARCODE
function searchUser($user_Id,$docid)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $_userid=mysqli_real_escape_string($con,$user_Id);







//    $sql='select fk_office_name_documentlist FROM documentlist WHERE document_id ="'.$docid.'"   LIMIT 1';
//    $query=mysqli_query($con, $sql);
//    $result=  mysqli_fetch_array($query);
//    $office=$result['fk_office_name_documentlist'];
//
//    $sql='SELECT security_name,count(security_name) as num_rows FROM security_user WHERE security_username = "'.$_userid.'" and fk_office_name = "'.$office.'" ';
//
//
//    $query=mysqli_query($con, $sql);
//    $result=  mysqli_fetch_array($query);
//    $return['security_name']=$result['security_name'];
//    $return['num_rows']=$result['num_rows'];
//    mysqli_close($con);
//
//    return $return;



    $sql='select fk_office_name_documentlist FROM documentlist WHERE document_id ="'.$docid.'"   LIMIT 1';
    $query=mysqli_query($con, $sql);
    $result=  mysqli_fetch_array($query);
    $office=$result['fk_office_name_documentlist'];




     $sql=' select fk_template_id,public from documentlist join document_template on documentlist.fk_template_id =
					document_template.template_id WHERE document_id ="'.$docid.'" ';
		$query=mysqli_query($con, $sql);
    $result=  mysqli_fetch_array($query);
    if ($result['public']==1)
    {
    		 $sql='SELECT security_name,count(security_name) as num_rows,master FROM security_user WHERE security_username = "'.$_userid.'"  ';
    }
    else
    {
    		$sql='SELECT security_name,count(security_name) as num_rows,master FROM security_user WHERE security_username = "'.$_userid.'" and fk_office_name = "'.$office.'" ';
    }


		//CHECK IF MASTER USER
		if(checkIfMaster($_userid))
		{
			
		  $return['security_name']=getUser($user_Id);
    	$return['num_rows']=1;
    	return $return;
		}



    $query=mysqli_query($con, $sql);
    $result=  mysqli_fetch_array($query);
//    if ($result['security_name']==1)
   
    $return['security_name']=$result['security_name'];
    $return['num_rows']=$result['num_rows'];
    mysqli_close($con);

    return $return;



}

//CHECK IF MASTER USER
	function checkIfMaster($userName)
	{
		  global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
	    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
	    $_userid=mysqli_real_escape_string($con,$userName);
	    
	    $sql="select master from security_user where security_username = '".$userName."' ";
	    $query=mysqli_query($con, $sql);
    	$result=  mysqli_fetch_array($query);
	    
	    if ($result['master']==1)
	    {
	    	return true;
	    }
	    
	    return false;
		
	}



//GET SECURITY NAME
function getUser($user_Id)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $_userid=mysqli_real_escape_string($con,$user_Id);
    if (mysqli_connect_error())
    {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
    }

    $sql="SELECT security_name FROM security_user WHERE security_username = '".$user_Id."' ";
    $result=mysqli_query($con,$sql);
    $recSet=  mysqli_fetch_array($result);
//    echo ("alert('".$recSet['security_name']."')");
//    die();
    return $recSet['security_name'];


}


//RECIEVE DOCUMENT FUNCTION
function receiveDocument($document_id)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE,$_tracker_id;
    $cons=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $docID=mysqli_real_escape_string($cons,$document_id);
    mysqli_autocommit($cons,FALSE);
    if (mysqli_connect_error())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
    }

    $flag=true;

    if (SearchFilter($docID, 'receive'))
    {

       $query="UPDATE documentlist_tracker SET RECEIVED_VAL=1,RECEIVED_BY='".$_SESSION['security_name']."',
               RECEIVED_DATE='".date("Y-m-d H:i:s")."', received_from='".getUser($_POST['ownerId'])."' WHERE
               DOCUMENTLIST_TRACKER_ID = ". $_tracker_id." ";

       $result=mysqli_query($cons,$query);
        if(!$result)
        {
             $flag=false;
             //echo "Something went wrong.<br>" .$query ;
        }

        $KEY=get_key();
        log_audit($KEY,$query,'Receive Document',''.$_SESSION['security_name'].'');



        //CHECK IF OWNER INPUTTED/SCANNED IS VALID
        if ($_POST['ownerId']!='')
        {
           $docOwnerInfo=searchUser($_POST['ownerId'],$docID);
//	   echo searchUser($_POST['ownerId'],$docID);
//	die();
           if ($docOwnerInfo['num_rows']==0)
           {
						$errMsg= "Invalid owner or ID does not exist.<br>";
                $flag=false;
                $document_process='';
           }
           else
           {
               $document_process='Document Received from '.$docOwnerInfo['security_name'];
           }

        }
        else
        {
            $document_process='Document Received.';
        }

        if ($flag==true){
        if(!InsertHistory($document_id,$_SESSION['OFFICE'],$document_process,'','Received by '.$_SESSION['security_name']))
        {
            $flag=false;
        }
        }


    }

    else
    {
    		$errMsg=RetrieveBarcodeInfo($document_id);
        //$errMsg= "Barcode does not exist. Please try again.<br>";
         $flag=false;
    }

    if ($flag)
    {
        mysqli_commit($cons);
        $errMsg= "Document received.";
    }
    else
    {
        mysqli_rollback($cons);
        //$errMsg= "Something went wrong. Try Again";
        log_audit($KEY,'','RolledBack',''.$_SESSION['security_name'].'');
    }
    
    		echo filterMessage($errMsg);
        mysqli_close($cons);


}

//RELEASE DOCUMENT FUNCTION
function ReleaseDocument($document_id)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE,$_tracker_id;
    $cons=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $docID=mysqli_real_escape_string($cons,$document_id);
    mysqli_autocommit($cons,FALSE);
    if (mysqli_connect_error())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
    }

    $flag=true;

    if (SearchFilter($docID, 'release'))
    {

        //"UPDATE documentlist_tracker SET RELEASED_VAL=1,RELEASED_BY='".$_SESSION['security_name']."',RELEASED_DATE='".date("Y-m-d H:i:s")."',RELEASED_COMMENT='".$_POST['commenttext']."' WHERE DOCUMENTLIST_TRACKER_ID = '". $doc_tracker_id."' ";
       $query="UPDATE documentlist_tracker SET RELEASED_VAL=1,RELEASED_BY='".$_SESSION['security_name']."',
               RELEASED_DATE='".date("Y-m-d H:i:s")."',RELEASED_COMMENT='".$_POST['docuComment']."',released_to='".getUser($_POST['ownerId'])."' WHERE
               DOCUMENTLIST_TRACKER_ID = ". $_tracker_id." ";
//       echo $query;
//       die();
       $result=mysqli_query($cons,$query);
        if(!$result)
        {
            $flag=false;
            echo mysqli_error($cons)."<br>";
        }

        $KEY=get_key();
        log_audit($KEY,$query,'Release Document',''.$_SESSION['security_name'].'');

        //CHECK IF OWNER INPUTTED/SCANNED IS VALID
        if ($_POST['ownerId']!='')
        {
           $docOwnerInfo=searchUser($_POST['ownerId'],$docID);
           if ($docOwnerInfo['num_rows']==0)
           {
                $errMsg=  "Invalid owner or does not exist.<br>";
                $flag=false;
                $document_process='';

           }
           else
           {
               $document_process='Document Released to '.$docOwnerInfo['security_name'];
           }

        }
        else
        {
            $document_process='Document Released.';
        }


        //SET DOCUMENT TO COMPLETE
        $query="SELECT max(documentlist_tracker_id) as max,documentlist_tracker_id,fk_documentlist_id FROM documentlist_tracker WHERE fk_documentlist_id= '". $docID."'";

        $queryresult=mysqli_query($cons,$query);
        $row=mysqli_fetch_array($queryresult,MYSQLI_ASSOC);

         if ($_tracker_id==$row['max'])
        {
        	  if ($flag==true){
        if(!InsertHistory($document_id,$_SESSION['OFFICE'],$document_process,$_POST['docuComment'],'Released by '.$_SESSION['security_name']))
        {
            $flag=false;
        }
        }


            $query="update documentlist set complete=1 where document_id ='".$docID."'";
            $RESULT=mysqli_query($cons,$query);
            log_audit($KEY,$query,'Document Complete',''.$_SESSION['security_name'].'');
        if (!$RESULT)
        {
            $flag=false;
        }





    }



   
       

}
 else
    {
    	$errMsg=RetrieveBarcodeInfo($document_id);
        //echo "Barcode does not exist.<br>";
         $flag=false;
    }
    
     if ($flag)
    {
        mysqli_commit($cons);
        $errMsg= "Document released.";
    }
    else
    {
        mysqli_rollback($cons);
        //echo "Something went wrong. Try Again";
        log_audit($KEY,'','RolledBack',''.$_SESSION['security_name'].'');
    }
    
    echo filterMessage($errMsg);
     mysqli_close($cons);
        
}

//FOR RELEASE GOVERNMENT STATISUS
function ForReleaseDocument($document_id)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE,$_tracker_id,$cons;
    $cons=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $docID=mysqli_real_escape_string($cons,$document_id);
    mysqli_autocommit($cons,FALSE);
    if (mysqli_connect_error())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
    }

    $flag=true;

    if (SearchFilter($docID, 'forrelease'))
    {
        $query="UPDATE documentlist_tracker SET FORRELEASE_VAL=1,FORRELEASE_DATE='".date("Y-m-d H:i:s")."',forrelease_comment='".$_POST['docuComment']."',forrelease_by='".$_SESSION['security_name']."' WHERE DOCUMENTLIST_TRACKER_ID = ". $_tracker_id." ";
        $RESULT=mysqli_query($cons,$query);

    if (!$RESULT)
    {
        $flag=false;
        $errMsg= mysqli_error($cons)."<br>";
    }
    $KEY=get_key();
    log_audit($KEY,$query,'For Release Document',''.$_SESSION['security_name'].'');
    $query="SELECT fk_office_name_documentlist,FK_SECURITY_USERNAME,DOCUMENT_ID,DOCUMENT_TITLE,TRANSDATE,FK_DOCUMENTTYPE_ID FROM documentlist JOIN documentlist_tracker ON documentlist.DOCUMENT_ID = documentlist_tracker.FK_DOCUMENTLIST_ID WHERE DOCUMENTLIST_TRACKER_ID = ".$_tracker_id;

    $RESULT=mysqli_query($cons,$query);
    while ($rows=mysqli_fetch_array($RESULT))
    {
        $document_office=$rows['fk_office_name_documentlist'];
        $document_owner = $rows['FK_SECURITY_USERNAME'];
        $document_id=$rows['DOCUMENT_ID'];
        $document_title=$rows['DOCUMENT_TITLE'];
        $document_transdate=$rows['TRANSDATE'];
        $document_documenttype=$rows['FK_DOCUMENTTYPE_ID'];
        $document_message = $_SESSION['AutoMessage1'];
        $document_message = $document_message . '<br><br>Barcode: <font style="font-weight:bold;">'.$document_id.'</font><br>Title:<font style="font-weight:bold;">'.$document_title.'</font><br>Type:<font style="font-weight:bold;">'.$document_documenttype.'</font><br>Date:<font style="font-weight:bold;">'.$document_transdate.'</font><br><br>'.$_SESSION['AutoMessage2'];

    }

    $sql="SELECT security_username FROM security_user WHERE fk_office_name = '".$document_office."' ";
    $secNameQuery=mysqli_query($cons,$sql);

    while ($secNameResult=mysqli_fetch_array($secNameQuery))
    {
        $query="INSERT INTO mail(MAILCONTENT,FK_SECURITY_USERNAME_OWNER,MAILDATE,MAILTITLE,FK_SECURITY_USERNAME_SENDER,MAILSTATUS,fk_table) VALUES ('".$document_message."','".$secNameResult['security_username']."','".date("Y-m-d H:i:s")."','".$document_title."','".$_SESSION['usr']."',0,'Document Tracking')";
        $RESULT=mysqli_query($cons,$query);
        //echo $query;
        if (!$RESULT)
        {
            $flag=false;
            $errMsg= mysqli_error($cons)."<br>";
        }
        log_audit($KEY,$query,'Add Mail',''.$_SESSION['security_name'].''); 
    }

    if ($flag==true){
    if(!InsertHistory($docID,$_SESSION['OFFICE'],'Document ready for release',$_POST['docuComment'],'Processed by '.$_SESSION['security_name']))
        {

            $flag=false;
        }
    }

         if ($flag)
        {
                mysqli_commit($cons);
                $errMsg= "Document ready to release.";
        }
        else
        {
                mysqli_rollback($cons);
               // echo "Something went wrong. Try Again";

        }

		



    }
    else
    {
    	    		$errMsg=RetrieveBarcodeInfo($document_id);
        //$errMsg= "Barcode does not exist. Please try again.<br>";
         $flag=false;
    }

		echo filterMessage($errMsg);
		mysqli_close($cons);
}
//SEARCH DOCUMENT ON SCAN OF BARCODE / AJAX FUNCTION
function searchDocInfo($docID)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $document_id=mysqli_real_escape_string($con,$docID);
    $sql='SELECT documentlist.document_title as title,document_type.description as type,office.office_description as office,
        document_template.template_name as template FROM documentlist JOIN
        document_type ON documentlist.fk_documenttype_id = document_type.documenttype_id JOIN
        document_template ON documentlist.fk_template_id = document_template.template_id JOIN
        office on documentlist.fk_office_name_documentlist = office.office_name
        WHERE documentlist.document_id = "'.$document_id.'" ';
//    echo $sql;
//    die();
    $values=mysqli_query($con,$sql);
//    $num_of_row=mysqli_num_rows($values);
    $resultSet=  mysqli_fetch_array($values);
//    echo $_POST['module'];
//    die();
    switch ($_POST['module'])
    {
        case 'searchReceiveDocument':
            $filter='receive';
            break;

        case 'searchReleaseDocument':
            $filter='release';
            break;

        case 'searchForReleaseDocument':
            $filter='forrelease';
            break;


        default:
            $filter='';
            break;
    }
//    echo $filter;
//    die();
    if (SearchFilter($document_id,$filter))
    {
    echo "
        <div class='row'>
            <div class='col-md-12 col-bottom'>
                <strong>Title:</strong><p>".$resultSet['title']."</p>
            </div>
        </div>

        <div class='row'>
            <div class='col-md-6 col-bottom'>
                <strong>Type:</strong><p>".$resultSet['type']."</p>
            </div>
            <div class='col-md-6 col-bottom'>
                <strong>Template:</strong><p>".$resultSet['template']."</p>
            </div>
        </div>

        <div class='row'>
            <div class='col-md-12 col-bottom'>
                <strong>Office:</strong><p>".$resultSet['office']."</p>
            </div>
        </div>

     ";
    }
    else
    {
    echo "
           <div class='row'>
               <div class='col-md-6 col-bottom'>
                   <strong>Title:</strong>
               </div>
           </div>

           <div class='row'>
               <div class='col-md-6 col-bottom'>
                   <strong>Type:</strong>
               </div>
               <div class='col-md-6 col-bottom'>
                   <strong>Template:</strong>
               </div>
           </div>

           <div class='row'>
               <div class='col-md-6 col-bottom'>
                   <strong>Office:</strong>
               </div>
           </div>
    
     ";
     
     echo "
        <script>

       $('#footerNote').html('".RetrieveBarcodeInfo($document_id)."');
       </script>
     
     ";
     
    }
    //$('#footerNote').html('Document not Found. Click <a target=\'_blank\' href=\'http://doctrak.noip.me:801/html/procedures/home/document/common/viewtemplate.php?template_id=PGSO-55\' style=\'color:#000;\'>here</a>');
    mysqli_free_result($values);
    mysqli_close($con);
}

function SearchFilter($document_id,$action)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE,$_tracker_id;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);

    $sql="SELECT FORRELEASE_VAL,RELEASED_VAL,RECEIVED_VAL,OFFICE_NAME, DOCUMENTLIST_TRACKER_ID, FK_DOCUMENTLIST_ID,SORTORDER FROM documentlist_tracker WHERE FK_DOCUMENTLIST_ID = '".$document_id."' ORDER BY SORTORDER ASC";
    $values=mysqli_query($con,$sql);
    $counterX=0;
    $row_cnt = mysqli_num_rows($values);

//    echo $sql;
//    die();
    switch ($action)
    {
        case 'receive':

            while ($row_cnt > $counterX)
                {
                    mysqli_data_seek($values, $counterX);
                    $rows=mysqli_fetch_row($values);
                    if ($rows[3]==$_SESSION['OFFICE'])
                    {

                        if ($rows[6]==1)
                        {
                            if ($rows[2]!=1)
                            {
                                $_tracker_id= $rows[4];
                                return true;
                            }
                        }
                        else
                        {
                            mysqli_data_seek($values, $counterX-1);
                            $rox = mysqli_fetch_row($values);

                            //RELEASED_VAL
                            if (($rox[1]==1) AND ($rows[2]!=1))
                            {
                                $_tracker_id= $rows[4];
//                               echo $_tracker_id;
//                               die();
                                return true;
                            }
//                            echo $rox[4].' - '.$rows[4];
//                            echo $rox[1].' - '.$rows[1];
//                            echo '<br>';
                        }
                    }


                        $counterX=$counterX+1;

                }
                    return false;


        case 'release':
            while ($rows=mysqli_fetch_array($values))
                {
                    if ($rows['OFFICE_NAME']==$_SESSION['OFFICE'])
                    {

                        if (($rows['RELEASED_VAL']!=1) AND ($rows['RECEIVED_VAL']==1))
                        {
//                                if ($rows['RECEIVED_VAL']!=1)
//                                {
                                    $_tracker_id= $rows['DOCUMENTLIST_TRACKER_ID'];
                                    return true;
//                                }
                        }
//                        else
//                        {
//                            mysqli_data_seek($values, $counterX-1);
//                            $rox = mysqli_fetch_row($values);
//
//                            //RELEASED_VAL
//                            if ($rox[1]==1 AND $rows['RECEIVED_VAL']!=1)
//                            {
//                                $_tracker_id= $rows['DOCUMENTLIST_TRACKER_ID'];
//
//                                return true;
//                            }
//                        }
                    }
//                        $counterX=$counterX+1;
                }
                    return false;

        case 'forrelease':

            while ($rows=mysqli_fetch_array($values))
            {

                if ($rows['OFFICE_NAME']==$_SESSION['OFFICE'])
                        {

                        if ($rows['SORTORDER']==1)
                        {
                            if ($rows['FORRELEASE_VAL']!=1 AND $rows['RELEASED_VAL']!=1 AND $rows['RECEIVED_VAL']==1)
                            {
                               $_tracker_id=$rows['DOCUMENTLIST_TRACKER_ID'];
                                return true;
                            }

                        }
                        else
                        {

                            if ($rows['RECEIVED_VAL']==1 AND $rows['FORRELEASE_VAL']!=1 AND $rows['RELEASED_VAL']!=1)
                            {
                                $_tracker_id=$rows['DOCUMENTLIST_TRACKER_ID'];
                                //$_SESSION['keytracker']=$rows['RECEIVED_VAL'];
                                return true;
                            }

                        }


                    }

            }
            return false;

    }

}

function RetrieveBarcodeInfo($document_id)
{
	
		global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    $sql="SELECT received_val,released_val,forrelease_val,office_description,complete,scrap FROM 
				documentlist_tracker JOIN office on documentlist_tracker.office_name=office.office_name JOIN
				documentlist on documentlist_tracker.fk_documentlist_id = documentlist.document_id
    		WHERE fk_documentlist_id = '".$document_id."' ORDER BY sortorder ASC";
    $result=mysqli_query($con,$sql);

    while($resultSet=mysqli_fetch_array($result))
    {
//    	 	if (($resultSet['received_val']==1)AND($resultSet['released_val']!=1)AND ($resultSet['forrelease_val']==1))
//    	{
//    		$NameOfOffice="Document is already ready for pickup at ".$resultSet['office_description'].".";
//    		mysqli_close($con);
//    		return $NameOfOffice;
//    	}
    	if 	(($resultSet['complete']==1)OR ($resultSet['scrap']==1))
    	{
    		$NameOfOffice="Document is either completed or scrapped.";
    		mysqli_close($con);
    		return $NameOfOffice;
    	}
    	if (($resultSet['received_val']==1)AND($resultSet['released_val']!=1))
    	{
    		$NameOfOffice="Document must be released first at ".$resultSet['office_description'].".";
		 		mysqli_close($con);
   			return $NameOfOffice;
    	}
//    	elseif (($resultSet['received_val']==1)AND($resultSet['released_val']!=1)AND ($resultSet['forrelease_val']==1))
//    	{
//    		$NameOfOffice="Document is already ready for release. ".$resultSet['office_description'].".";
//    		mysqli_close($con);
//    		return $NameOfOffice;
//    	}
    	
    	elseif (($resultSet['received_val']!=1)AND($resultSet['released_val']!=1))
    	{
    		$NameOfOffice="Document must be received first at ".$resultSet['office_description'].".";
    		mysqli_close($con);
    		return $NameOfOffice;
    	}
    	
    	
    }
    
    $NameOfOffice="Document does not exist. Check Barcode encoded. ";
    mysqli_close($con);
		return $NameOfOffice;
	
}

?>