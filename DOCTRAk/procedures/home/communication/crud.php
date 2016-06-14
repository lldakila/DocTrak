<?php

if (session_status() == PHP_SESSION_NONE) 
{
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../../index.php');
}

date_default_timezone_set($_SESSION['Timezone']);
require_once('../../../procedures/connection.php');
require_once('../document/common/encrypt.php');
//LOG ALL USERS LOGGING IN TO THE SYSTEM
require_once("../../../audit.php");
$KEY=get_key();
switch($_POST['module'])
{
    case 'saveMe':
	SaveLetter();
        break;
    
    case 'SearchLetter':
	SearchLetter();
	break;
    
    case 'getType':
	getDocType();
	break;
    
    case 'getSender':
	getSender();
	break;
    
    case 'getFile':
	getFile();
	break;
    
     case 'getOffices':
	getOffices();
	break;
    
    
}

function SaveLetter()
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    global $KEY;
    if (mysqli_connect_error()) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
				die();
    }
    
    mysqli_autocommit($con,FALSE);
    $flag = true;
    $mailTitle = $_POST['header_name'];
    $mailNote = $_POST['note_name'];
    $mailOwner = $_SESSION['security_name'];
    $mailType = $_POST['mail_type'];
    $mailOffice = array_unique(explode("|",$_POST['OfficeArray']));
    $transdate=date("Y-m-d H:i:s");
    
    ///GET DOCUMENT DATA
    
    if (empty($_FILES['filepdf']['name']))
    {
			echo "empty file";
			die();
    }
 
	    $docData=addslashes(file_get_contents($_FILES['filepdf']['tmp_name']));
	    $docInfo= finfo_open(FILEINFO_MIME_TYPE);
	    $docProp=finfo_file($docInfo,$_FILES['filepdf']['tmp_name']);
	    if ($docProp <> "application/pdf")
	    {
					echo "Not PDF file. Error Saving Data";
					die();
	    }
	    
	    else if (filesize($_FILES['filepdf']['tmp_name']) > $_SESSION['MaxUploadSize'])
	    {
					$flag=false;
					echo "Maximum allowed document size is ".$_SESSION['MaxUploadSize']." bytes.";
					die();
	    }
    //GET DOCUMENT DATA
    
	    
    //INSERT INTO COMMAIL
    $sqlString="INSERT INTO commail(title,note,owner,fk_document_type_id,mail_file,transdate,fk_security_username,fk_office_name) VALUES ('".$mailTitle."','".$mailNote."','".$mailOwner."','".$mailType."','{$docData}','".$transdate."','".$_SESSION['usr']."','".$_SESSION['OFFICE']."')";
    
   	log_audit($KEY,$sqlString,'New Comm Letter',$_SESSION['security_name']);  
   	
    $result=mysqli_query($con,$sqlString);
    if (!$result) 
    {
			$flag=false;
			echo mysqli_error($con);
			die();
    }
    //GET COMMAIL AUTOINCREMENT ID
    $sql='SELECT LAST_INSERT_ID()';
    $results=  mysqli_query($con, $sql);
    $commailID=mysqli_fetch_row($results);
    
    //INSERT INTO MAIL MODULE
    $encrypted=urlencode(base64_encode(encryptText($commailID[0])));
    $mailLink='<a target="_blank" href="/procedures/home/communication/previewfile.php?download_file='.$encrypted.'">Download</a>';
    
    $document_message='The document with the following details are for download for your reference.';
    $document_message=$document_message . '<br><br>Title: <font style="font-weight:bold;">'.$mailTitle.'</font><br>Note: <font style="font-weight:bold;">'.$mailNote.'</font><br>Type: <font style="font-weight:bold;">'.$mailType.'</font><br>Attachment: <font style="font-weight:bold;">'.$mailLink.'</font><br><br>'.$_SESSION['AutoMessage2'];
    
    foreach($mailOffice as $officeList) 
    { 
	//GET RECEPIENT NAME AND ADMINUSER
//	$sqlstring="SELECT security_username FROM security_user WHERE fk_security_groupname='POWER USER' AND fk_office_name = '".$officeList."' ";
//	$results=  mysqli_query($con, $sqlstring);
//	$security_ownermail=mysqli_fetch_row($results);
//	echo $security_ownermail[0];
//	echo "<br>";
	//INSERT INTO MAIL
//		$query="select security_username from security_user where fk_office_name = '".$officeList."' ";
//		$query_result=mysqli_query($con,$query);
//		while ($query_recordset=mysqli_fetch_array($query_result))
//		{
//echo $officeList;
//echo getOffice($officeList);
//die();
	$sqlString1="INSERT INTO mail (mailcontent, fk_security_username_owner, maildate, mailtitle, fk_security_username_sender,fk_table) VALUES ('".$document_message."', '".getOffice($officeList)."', '".$transdate."', '".$mailTitle."', '".$_SESSION['usr']."', 'Communication Letter')";


//$sqlString1="INSERT INTO mail (mailcontent, fk_security_username_owner, maildate, mailtitle, fk_security_username_sender,fk_table) VALUES ('".$document_message."', '".$query_recordset['security_username']."', '".$transdate."', '".$mailTitle."', '".$_SESSION['usr']."', 'Communication Letter')";

//	$sqlString="INSERT INTO mail (mailcontent, fk_security_username_owner, maildate, mailtitle, fk_security_username_sender,fk_table) VALUES ('".$document_message."', '".$security_ownermail[0]."', '".$transdate."', '".$mailTitle."', '".$_SESSION['usr']."', 'Communication Letter')";
	$result=mysqli_query($con,$sqlString1);
	// echo $sqlString1."<br>";
//	die();
	log_audit($KEY,$sqlString1,'New Comm Letter',$_SESSION['security_name']); 
	
	if (!$result) 
	{
	    $flag=false;
	    echo mysqli_error($con);
	    die();
	}
	
	//GET MAIL AUTOINC ID
	$sql='SELECT LAST_INSERT_ID()';
	$results=  mysqli_query($con, $sql);
	$mailID=mysqli_fetch_row($results);
	
	//INSERT INTO COMMAIL_CON
	$sqlString="INSERT INTO commail_con(fk_commail_id,fk_mail_id,fk_office_name) VALUES (".$commailID[0].",".$mailID[0].",'".$officeList."') ";
	$result=mysqli_query($con,$sqlString);
	log_audit($KEY,$sqlString,'New Comm Letter',$_SESSION['security_name']); 
	if (!$result) 
	{
	    $flag=false;
	    echo mysqli_error($con);
	    die();
	}
	
//	INSERT INTO COMOFFICE_CON
	$sqlString="INSERT INTO comoffice_con(fkcommail_id,fkoffice_name) VALUES ('$commailID[0]','$officeList') ";
	$result=mysqli_query($con,$sqlString);
	log_audit($KEY,$sqlString,'New Comm Letter',$_SESSION['security_name']); 
	if (!$result) 
	{
	    $flag=false;
	    echo mysqli_error($con);
	    die();
	}
	
   // }
   }
    //die();
    //MYSQL TRANSACTION
    if ($flag) 
        {
			    mysqli_commit($con);
			    //echo "Letter Saved Successfully";
			    return true;
        }
        else 
        {
				    mysqli_rollback($con);
				    log_audit($KEY,$sqlString,'Rollback',$_SESSION['security_name']);
				    return false;
        }
    
    
}
function getOffice($accountName)
{
	 	global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    if (mysqli_connect_error()) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
				die();
		}
		
		$sqlstring="SELECT security_username FROM security_user WHERE fk_security_groupname='POWER USER' AND fk_office_name = '".$accountName."' ";
		$results=  mysqli_query($con, $sqlstring);
		$security_ownermail=mysqli_fetch_array($results);
		mysqli_close($con);
		return $security_ownermail['security_username'];
}
function getSecurityName($username)
{
	global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    if (mysqli_connect_error()) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
				die();
		}
		
		$sqlstring="SELECT security_name FROM security_user WHERE security_username = '".$username."' ";
		$results=  mysqli_query($con, $sqlstring);
		$security_ownermail=mysqli_fetch_array($results);
		mysqli_close($con);
		return $security_ownermail['security_name'];
	}



function SearchLetter()
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    if (mysqli_connect_error()) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
    }
    
    $searchString=$_POST['searchText'];
    $searchString = mysqli_real_escape_string($con, $searchString);
    
    if (($_SESSION['GROUP']=='POWER ADMIN') OR ($_SESSION['GROUP']=='ADMIN'))
    {
	$sqlString="SELECT distinct (commail_id),title,note,fk_security_username,fk_document_type_id,transdate FROM commail 
		    JOIN commail_con ON commail.commail_id= commail_con.fk_commail_id 
		    JOIN mail ON commail_con.fk_mail_id = mail.mail_id WHERE title LIKE 
		    '%".$searchString."%' OR note LIKE '%".$searchString."%' ORDER BY transdate desc ";
    }
    else
    {
	$sqlString="SELECT distinct (commail_id),title,note,fk_security_username,fk_document_type_id,transdate FROM commail 
		    JOIN commail_con ON commail.commail_id= commail_con.fk_commail_id 
		    JOIN mail ON commail_con.fk_mail_id = mail.mail_id WHERE (title LIKE 
		    '%".$searchString."%' OR note LIKE '%".$searchString."%') AND 
		    `commail`.fk_office_name='".$_SESSION['OFFICE']."' ORDER BY transdate desc";
    }

		
    $result=mysqli_query($con,$sqlString);
//    echo"<tr class='usercolortest'><th style='width:120px;'>TITLE</th><th style='width:150px;'>TYPE</th><th style='width:150px;'>OWNER</th><th>DATE</th></tr>";
//    $rowcolor="notblue";
    $resultArray=array();
    while($row=mysqli_fetch_array($result))
    {
//	if ($rowcolor=="blue")
//	{
//	    echo "<tr class='usercolor1' onClick='clickSearch(\"".$recordSet['commail_id']."\",\"".$recordSet['title']."\",\"".$recordSet['note']."\",\"".$recordSet['fk_security_username']."\",\"".$recordSet['fk_document_type_id']."\")'><td>";
////	    echo "<tr class='usercolor1' onClick='clickSearch(\"".urlencode(base64_encode(encryptText($recordSet['commail_id'])))."\",\"".$recordSet['title']."\",\"".$recordSet['note']."\",\"".$recordSet['fk_security_username']."\",\"".$recordSet['fk_document_type_id']."\")'><td>";
//	    $rowcolor="notblue";
//	}
//	else
//	{
//	    echo "<tr class='usercolor'  onClick='clickSearch(\"".$recordSet['commail_id']."\",\"".$recordSet['title']."\",\"".$recordSet['note']."\",\"".$recordSet['fk_security_username']."\",\"".$recordSet['fk_document_type_id']."\")'><td>";
////	    echo "<tr class='usercolor'  onClick='clickSearch(\"".urlencode(base64_encode(encryptText($recordSet['commail_id'])))."\",\"".$recordSet['title']."\",\"".$recordSet['note']."\",\"".$recordSet['fk_security_username']."\",\"".$recordSet['fk_document_type_id']."\")'><td>";
//	    $rowcolor="blue";
//	}
	
//	echo $recordSet['title'];
//	echo "</td><td>";
//	echo $recordSet['fk_document_type_id'];
//	echo "</td><td>";
//	echo getNameofUser($recordSet['fk_security_username']);
//	echo "</td><td>";
//	echo $recordSet['transdate']; 
//	echo "</td></tr>"; 

		 							
    array_push($resultArray, array("commailId"=>urlencode(base64_encode(encryptText($row['commail_id']))),"title"=>$row["title"], "note"=>$row["note"], "type"=>$row["fk_document_type_id"], "owner"=>getSecurityName($row["fk_security_username"]), "date"=>$row["transdate"]));
		 	
		 }
		echo json_encode($resultArray);
     
}

function getNameofUser($username)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    if (mysqli_connect_error()) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
    }
    $sqlString="SELECT security_name from security_user WHERE security_username= '".$username."' ";
    $query=  mysqli_query($con, $sqlString);
    $result= mysqli_fetch_row($query);
    return $result[0];
    
    }

function getDocType()
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    if (mysqli_connect_error()) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
    }
    
    $type_id=  mysqli_escape_string($con, $_POST['typeid']);
    $sqlString='SELECT documenttype_id, description from document_type ORDER BY documenttype_id ASC';
    $query=  mysqli_query($con, $sqlString);
    while ($result= mysqli_fetch_array($query))
    {
	if ($type_id==$result['documenttype_id'])
	{
//	    echo $result['documenttype_id']."' selected>".$result['description']."</option>";
//	}
// else 
//	{
	    echo $result['documenttype_id'];
	}
	
    }
    
}

function getSender()
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    
    if (mysqli_connect_error()) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
    }
    
    $username=  mysqli_escape_string($con, $_POST['senderId']);
  
    $sqlString="SELECT security_name FROM security_user WHERE security_username = '".$username."' ";
    $result=  mysqli_query($con, $sqlString);
    
    if (!$result)
    {
	echo mysqli_error($con);
	die();
    }
    $recSet=  mysqli_fetch_row($result);
    
    echo $recSet[0];
}

function getFile()
{
 //$id=urlencode(base64_encode(encryptText($_POST['mailid'])));
    //$id=decryptText(base64_decode($_POST['mailid']));
    echo '<a target="_blank" href="/doctrak/doctrak/procedures/home/communication/previewfile.php?download_file='.$_POST['mailid'].'">Download</a>';
}

function getOffices()
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
   // require_once('../document/common/encrypt.php');
    
    if (mysqli_connect_error()) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
				die();
    }
    
    
//    $id=decryptText(base64_decode($_POST['mailid']));
//    $variable=decryptText(base64_decode($_POST['officeid']));
    //$variable=$_POST['officeid'];
//    die();
//echo $_POST['officeid'];
   $variable= decryptText(base64_decode(urldecode($_POST['officeid'])));

    //$sqlString="select * from mail join commail_con on mail.mail_id=commail_con.fk_mail_id
//		join commail on commail_con.fk_commail_id=commail.commail_id
//		join comoffice_con on commail.commail_id=comoffice_con.fkcommail_id WHERE commail_id= '.$decryptedId.' ";
//    $sqlString="select distinct mail_id,commail_id from mail 
//		join commail_con on mail.mail_id=commail_con.fk_mail_id
//		join commail on commail_con.fk_commail_id=commail.commail_id
//		join comoffice_con on commail.commail_id=comoffice_con.fkcommail_id where fkcommail_id=".$variable." ORDER BY mail_id ASC";
    //$id=decryptText(base64_decode($_GET['download_file']));
    //$sql="select fk_commail_id,fk_office_name,mailstatus from commail_con join mail on commail_con.fk_mail_id=mail.mail_id where fk_commail_id=".$variable." ORDER BY fk_office_name ASC";
   
   $sql="select fk_commail_id,fk_office_name,mailstatus from commail_con join mail on commail_con.fk_mail_id=mail.mail_id where fk_commail_id='".$variable."' ORDER BY fk_office_name ASC";
   
   $query=mysqli_query($con,$sql);
   while($result=mysqli_fetch_array($query))
    {
	    if ($result['mailstatus']==1)
	    {
				echo "<label class='checkbox-inline'><input type='checkbox' readonly checked  disabled >".$result["fk_office_name"]."</label>";
	    }
	    else
	    {
	      echo "<label class='checkbox-inline'><input type='checkbox' readonly disabled >".$result["fk_office_name"]."</label>"; 
	    }
////
    }
    //echo "</tr></table>";
}

function getOffice_Office($commail_id)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    
    if (mysqli_connect_error()) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
    }
    
    
    $sqlString="select commail_id,mailstatus from commail join commail_con on commail.commail_id=commail_con.fk_commail_id 
		join mail on commail_con.fk_mail_id=mail.mail_id WHERE commail_id = $commailId ";
   
    
    
}
function getMailId($mailID)
{
		global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
     if (mysqli_connect_error()) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
				die();
    }
    
    $sql="select mail_id from mail where mail_id = ".$mailID." ";
    $result=mysqli_query($con,$sql);
    $id=mysqli_fetch_array($result);
    mysqli_close($con);
    return $id['mail_id'];
}

function ifReadMail($mailId)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    
    if (mysqli_connect_error()) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
    }
    
    
    $sqlString="SELECT mailstatus from commail_con join mail on commail_con.fk_mail_id=mail.mail_id WHERE fk_commail_id = ".$commail_id." ";
   
   
    $query=  mysqli_query($con, $sqlString);
    while($recSet=  mysqli_fetch_array($query))
    {
	if ($recSet['1']==1)
	{
	    return true;
	}
	else
	{
	    return false;
	}
    }
}