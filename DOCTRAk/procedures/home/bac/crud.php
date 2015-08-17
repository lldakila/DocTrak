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

//CHECK IF BAC OR POWER USERS
if ($_SESSION['BAC']!=1)
{
    if ($_SESSION['GROUP']!='POWER ADMIN')
    {
	
	echo "Insuficient privilege.";
	die();
    }

}
else if ($_SESSION['GROUP']!='POWER ADMIN')
{

    if ($_SESSION['BAC']!=1)
    {
	
	echo "Insuficient privilege.";
	die();
    }
}
//else
//{
//    $restrictedUser=false;
//}




switch($_POST['module'])
{
    
    case 'searchDoc':
        SearchDoc($_POST['searchText']);
        break;
        
    case 'historyCheckin':
        historyCheckin($_POST['docId']);
        break;
    
     case 'checkIn':
        checkMeIn($_POST['docId']);
        break;
    
    case 'updateDeadlineIcon':
        updateStatusIcon();
        break;
    
    case 'searchReceive':
	searchReceive($_POST['searchText']);
	break;
    
    case 'renderReceive':
	renderReceive($_POST['docId']);
	break;
    
    case 'receiveBacDocument':
	receiveBacDocument($_POST['docId']);
	break;
    
    case 'searchRelease':
	searchRelease($_POST['searchText']);
	break;
    
    case 'renderRelease';
	renderRelease($_POST['docId']);
	break;
    
    case 'releaseBacDocument':
	releaseBacDocument($_POST['docId']);
	break;
    
    
//    case 'renderTransDetail':
//        renderTransDetail($_POST['transId']);
//        break;
}





function SearchDoc($queryText)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $searchText=mysqli_real_escape_string($con,$queryText);
    $SQLstring='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date FROM bacdocumentlist WHERE (bacdocument_id LIKE "'.$searchText.'%" OR bacdocumentdetail like "%'.$searchText.'%") AND bacdocument_id IN (SELECT fk_bacdocumentlist_id FROM bacdocumentlist_tracker WHERE receive_date IS NULL )ORDER BY transdate ASC';
    $result=mysqli_query($con, $SQLstring);
    
    echo"<tr class='usercolortest'><th>Barcode</th><th>Detail</th><th>Cost</th><th>Date</th></tr>";
    $rowcolor="blue";
    while ($rows=mysqli_fetch_array($result))
    {
       
        if (filterSearch($rows['bacdocument_id']))
        {
            
            $bacdocument_id=$rows['bacdocument_id'];
            $bacdocumentdetail=$rows['bacdocumentdetail'];
            $prcost=$rows['prcost'];
            $date = date_create($rows['pr_date']);
         
        if ($rowcolor=="blue")
        {
            echo "<tr class='usercolor' onClick='clickSearch(\"".$bacdocument_id."\",\"".$bacdocumentdetail."\",\"".$prcost."\",\"".date_format($date,'m/d/Y')."\")'><td>";
            $rowcolor="notblue";
        }
        else
        {
            echo "<tr class='usercolor1' onClick='clickSearch(\"".$bacdocument_id."\",\"".$bacdocumentdetail."\",\"".$prcost."\",\"".date_format($date,'m/d/Y')."\")'><td>";
            $rowcolor="blue";
        }
            echo $rows['bacdocument_id'];
            echo "</td><td>";
            echo $rows['bacdocumentdetail'];
            echo "</td><td>";
            echo $rows['prcost'];
            echo "</td><td>";
            echo date_format($date,'m/d/Y');
            echo "</td></tr>";  
        }
        
    }
    
}

//SEARCH FILTER
function filterSearch($documentId)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
//    $sqlString="SELECT * FROM bacdocumentlist_tracker WHERE fk_bacdocumentlist_id = '".$documentId."' ORDER BY sortorder DESC";
    $sqlString="SELECT receive_release from bacdocumentlist WHERE bacdocument_id = '".$documentId."' ";
    $result=  mysqli_query($con, $sqlString);
    $recSet=  mysqli_fetch_array($result);
    //RECEIVED
    if ($recSet['receive_release']==1)
    {
	return true;
    }
    //RELEASED
    
    return false;
//    while ($rows=  mysqli_fetch_array($result))
//    {
//       if ($rows['receive_date']==NULL OR $rows['receive_date']=='0000-00-00 00:00:00')
//       {
//           return true;
//       }
//    }
//    return false;
}




//FUNCTION TO DRAW BAC HISTORY DETAIL
function historyCheckin($docId)
{
    
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
   // $sqlString='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date,`bacdocumentlist`.`transdate`,sortorder,receive_date,expire_date,activity,receive_by, office_description FROM bacdocumentlist JOIN bacdocumentlist_tracker ON bacdocumentlist.bacdocument_id = bacdocumentlist_tracker.fk_bacdocumentlist_id JOIN office on bacdocumentlist.fk_officename_bacdocumentlist = office.office_name WHERE   bacdocument_id = "'.$docId.'" ';
 $sqlString='SELECT bacdocumentlist_tracker_id,checkin_date,bacdocument_id,bacdocumentdetail,prcost,pr_date,`bacdocumentlist`.`transdate` as transdate,sortorder,receive_date,expire_days,activity,receive_by, fk_officename_bacdocumentlist FROM bacdocumentlist JOIN bacdocumentlist_tracker ON bacdocumentlist.bacdocument_id = bacdocumentlist_tracker.fk_bacdocumentlist_id  WHERE   bacdocument_id = "'.$docId.'" ORDER BY sortorder asc';
    
    $result=mysqli_query($con, $sqlString);
    
   // if (!$result)
    //{
    $x=0;
    $color='gray';
    echo '<div id="ajaxhistory"><form>';
        
         
        while ($recSet = mysqli_fetch_array($result))
        {
           
                
                if ($x==0)
                {   
                    echo '<div id="details" class="retriveDataAllign">';
                    
                    echo '<table>';
                    echo '<tr>';
                    echo '<input id="pKey" type="hidden" readonly="readonly" value="'.$recSet["bacdocument_id"].'" />';
                    echo '<td>Barcode No:&nbsp;<b>'.$recSet['bacdocument_id'].'</b>';
                    echo '</td><td>Cost:&nbsp;<b>'. number_format($recSet["prcost"], 2, '.', ',').'</b>';
                    echo '</td><td>PR Date:&nbsp;<b>'.date("F j, Y",strtotime($recSet["pr_date"])).'</b>';
                echo '</td></tr>';
                echo '<tr><td>';
                    echo 'Details:&nbsp;<b>'.$recSet['bacdocumentdetail'].'</b>';
                    echo '</td><td>';
                    echo 'Office:&nbsp;<b>'.$recSet['fk_officename_bacdocumentlist'].'</b>';
                    echo '</td><td>';
                    echo 'Entry Date:&nbsp;<b>'.date("F j, Y, g:i a",strtotime($recSet['transdate'])).'</b>';
                    echo '</td>';
                echo '</tr>';
                echo '</table>';
                echo '</div>';
                
                echo '<div id="checkinScroll">';
                echo '<table id="historydata" class="table scroll">';
                echo '<tr class="bgcolor">';
                    echo '<th style="width:2%;">Step</th>';
                    echo '<th style="width:25%;">Activity</th>';
                    echo '<th style="width:15%;">Checked-In</th>';
                    echo '<th style="width:15%;">Checked-Out</th>';
                    echo '<th style="width:15%;">Responsible</th>';
                    echo '<th style="width:15%;">Details</th>';
                echo '</tr>';
               
                
                }
              if ($color=='gray')
              {
                   echo "<tr class='usercolor1'><td>";
                  $color='notgray';
              }
              else
              {
                   echo "<tr class='usercolor'><td>";
                  $color='gray';
              }
           
            echo $recSet['sortorder'];
            echo "</td><td>";
            echo $recSet['activity'];
            echo "</td><td>";
            echo $recSet['checkin_date']; 
            echo "</td><td>";
            echo $recSet['receive_date']; 
            echo "</td><td>";
            echo $recSet['receive_by'];
            
            if (checkDetails($recSet['bacdocumentlist_tracker_id']))
            {
                echo "</td><td>";
                echo "<a href='javascript:clickTransDetail(".$recSet['bacdocumentlist_tracker_id'].")' title='Click for complete detail'>details</a>";
            }
            else
            {
               echo "</td><td>"; 
            }
            echo "</td></tr>";
                
                
                
         
            $x++;
        }
        echo '</table>';
        echo '</div>';
         echo '</div>';
         
         echo '<div id="checkinRIGHT">';
            echo '<button id="checkMe"  type="submit" class="btn btn-primary" onclick="javascript:checkMeIn()">Check In</button>';
         echo '</div></form>';
      

}
//CHECK IF PROCESS HAS BACKLOG DETAILS
function checkDetails($tracker_id)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    $sql='SELECT count(*) as rowCount FROM bacdocumentlist_trackerdetail WHERE fk_bacdocumentlist_tracker_id = '.$tracker_id.' ';
    
    $result=  mysqli_query($con, $sql);
    $row=  mysqli_fetch_array($result);
    if ($row['rowCount']==0)
    {
        return false;
    }
    else
    {
        return true;
    }
    
}

//FUNCTION THAT UPDATES THE BACDOCUMENT
function checkMeIn($docuId)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $docId=mysqli_real_escape_string($con,$docuId);
    mysqli_autocommit($con,FALSE);
    $flag=true;
 
    $arrHolder=checkInSeek($docId);

    if ($arrHolder[2])
    {
        if ($arrHolder[3]!=NULL)
        {
            $sqlString="UPDATE bacdocumentlist_tracker set receive_date=NOW(),expire_days='$arrHolder[1]',receive_by='".$_SESSION["security_name"]."' WHERE bacdocumentlist_tracker_id = '$arrHolder[0]' ";
        }
        else
        {
            $sqlString="UPDATE bacdocumentlist_tracker set receive_date=NOW(),expire_days='$arrHolder[1]',receive_by='".$_SESSION["security_name"]."',checkin_date=NOW() WHERE bacdocumentlist_tracker_id = '$arrHolder[0]' ";
        }
        
    }
    
    else
    {
        echo "error";
        die();
    }
  
    $result=  mysqli_query($con, $sqlString);
    if (!$result)
    {
        $flag=false;
        printf("Errormessage: %s\n", mysqli_error($con));
        echo '<br>';
    }
    
    $addFk=$arrHolder[0]+1;
    $sqlString="UPDATE bacdocumentlist_tracker set checkin_date=NOW(),receive_by='".$_SESSION["security_name"]."' where  bacdocumentlist_tracker_id = $addFk AND fk_bacdocumentlist_id = '".$docId."' ";
    $result=  mysqli_query($con, $sqlString);
    if (!$result)
    {
        $flag=false;
        printf("Errormessage: %s\n", mysqli_error($con));
        echo '<br>';
    }
    
    //DELETE DOCUMENT ON BACMONITORING TABLE
    $sqlString="DELETE FROM bacdocument_monitoring WHERE fk_bacdocumentlist_tracker_id = $arrHolder[0] ";
    $result=  mysqli_query($con, $sqlString);
    if (!$result)
    {
        $flag=false;
        printf("Errormessage: %s\n", mysqli_error($con));
        echo '<br>';
    }
    
    if (!checkDocumentDeadline())
    {
        $flag=false;
        printf("Errormessage: Error updating tables.");
        echo '<br>';
    }

	
    if(isFinalStep($docuId))
    {
	if (!insertMail($docuId))
	{
	    $flag=false;
	    printf("Errormessage: Error Inserting Mail.");
	    echo '<br>';
	}
    }
    
  
    if($flag)
    {
        mysqli_commit($con);
        historyCheckin($docId);
    }
    else
    {
        mysqli_rollback($con);
        echo 'Error on checking in document. Try Again.';
    }
    
}

function isFinalStep($bacdocumentId)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    $sql="SELECT count(*) as numOfRows FROM bacdocumentlist_tracker WHERE receive_date IS NULL AND checkin_date IS NULL AND fk_bacdocumentlist_id = '".$bacdocumentId."' ";
    $result=  mysqli_query($con, $sql);
    $recSet=  mysqli_fetch_array($result);
    
    if ($recSet['numOfRows'] == 0)
    {
	return true;
    }
    else
    {
	return false;
    }
    
    
}



//INSERT MAIL FOR NOTIFICATION TO THE OWNER OF THE DOCUMENT
function insertMail($bacdocumentId)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    mysqli_autocommit($con,FALSE);
    
    $flag=true;
    require_once("../../../audit.php");
    $KEY=get_key();

    
    $sql="SELECT fk_officename_bacdocumentlist,fk_officename_bacdocumentlist,fk_security_username,bacdocument_id,bacdocumentdetail,prcost,pr_date,transdate 
	FROM bacdocumentlist WHERE bacdocument_id = '$bacdocumentId' ";

    $result=  mysqli_query($con, $sql);
    $recordSet=mysqli_fetch_array($result);
    
    $document_office=$recordSet['fk_officename_bacdocumentlist'];
    $document_id=$recordSet['bacdocument_id'];
    $document_detail=$recordSet['bacdocumentdetail'];
    $document_cost=$recordSet['prcost'];
    $document_date=$recordSet['pr_date'];
    $document_message = $_SESSION['AutoMessage1'];
    $document_message=$document_message . '<br><br>Barcode: <font style="font-weight:bold;">'.$document_id.'</font><br>Detail:<font style="font-weight:bold;">'.$document_detail.'</font><br>Cost:<font style="font-weight:bold;">'.$document_cost.'</font><br>Date:<font style="font-weight:bold;">'.$document_date.'</font><br><br>'.$_SESSION['AutoMessage2'];
    
    $sql="SELECT security_username FROM security_user WHERE fk_office_name = '$document_office'";
    $secNameQuery=mysqli_query($con,$sql);

    
    while ($secNameResult=mysqli_fetch_array($secNameQuery))
    {
        $query="INSERT INTO mail(MAILCONTENT,FK_SECURITY_USERNAME_OWNER,MAILDATE,MAILTITLE,FK_SECURITY_USERNAME_SENDER,MAILSTATUS,fk_table,fk_key) VALUES ('".$document_message."','".$secNameResult['security_username']."','".date("Y-m-d H:i:s")."','BAC Document','".$_SESSION['usr']."',0,'bacdocument','".$document_id."')";
        $RESULT=mysqli_query($con,$query);
        //echo $query;      
	if (!$RESULT)
	{
	    $flag=false;
	}
        //log_audit($KEY,$query,'Add Mail',''.$_SESSION['security_name'].'');  
    }
    
    if ($flag) 
        {
                mysqli_commit($con);
		return true;
        }
        else 
        {
                mysqli_rollback($con);
                log_audit($KEY,'','RolledBack',''.$_SESSION['security_name'].'');
		return false;
        }
}

//CHECK IF THE CURRENT DOCUMENT
//RETURNS TRUE OR FALSE
function checkInSeek($docId)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    $sqlString="SELECT bacdocumentlist_tracker_id,receive_date,expire_days,checkin_date FROM  bacdocumentlist_tracker WHERE fk_bacdocumentlist_id = '$docId' ORDER BY sortorder ASC";
    $recSet=  mysqli_query($con, $sqlString);
 
    while ($rows=mysqli_fetch_array($recSet))
    {
        if ($rows['receive_date']==NULL OR $rows['receive_date']=='0000-00-00 00:00:00')
        {
            //echo $rows['bacdocumentlist_tracker_id'];
            //$expireDays= date('Y-m-d', strtotime("+".$rows['expire_days']." days"));
            $checkInDetail=array($rows["bacdocumentlist_tracker_id"],$rows["expire_days"],true,$rows["checkin_date"]);
            return $checkInDetail;
        }
    }
    
    $checkInDetail=array('','',false);
    return $checkInDetail;
    
}

//CHECK FOR BAC DOCUMENTS THAT ARE PASSED THE DEADLINE SET BY BAC

function checkDocumentDeadline()
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $sqlString="select  bacdocumentlist_tracker_id, fk_bacdocumentlist_id,sortorder,receive_date,expire_days,checkin_date from bacdocumentlist_tracker 
                WHERE checkin_date IS NOT NULL AND receive_date IS NULL ORDER BY fk_bacdocumentlist_id, sortorder ASC";
    mysqli_autocommit($con, false);
    $flag=true;
    
    $result=  mysqli_query($con, $sqlString);
    $dateNow=date('Y-m-d');
    while ($rows=  mysqli_fetch_array($result))
    {
//        $expirationDay = date_create('now');
////        date_add($expirationDay, date_interval_create_from_date_string($rows2['max_day'].' days'));
////        $dateAdded=date_format($expirationDay, 'Y-m-d');
////        
//        $date = date_create('2000-01-01');
//date_add($date, date_interval_create_from_date_string('10 days'));
//echo date_format($date, 'Y-m-d');

        $deadlineDay=$rows['expire_days']+1;
        $expirationDay = date_create($rows['checkin_date']);
        date_add($expirationDay, date_interval_create_from_date_string($deadlineDay.' days'));
        $expirationDay=date_format($expirationDay, 'Y-m-d');
        
//        echo $rows['bacdocumentlist_tracker_id'].' -  '.$expirationDay .'   -   '.$dateNow ;
//        echo '<br>';
//     echo date_create($expirationDay.' 00:00:00');
//     die;
        if (checkDuplicate($rows['bacdocumentlist_tracker_id'])==false AND checkStatusUpdatedToday($rows["bacdocumentlist_tracker_id"])==false AND $rows["expire_days"]<>0)
        {
            if (strtotime($expirationDay)<=strtotime($dateNow))
            {
                $sqlString='INSERT INTO bacdocument_monitoring set fk_bacdocumentlist_tracker_id = "'.$rows["bacdocumentlist_tracker_id"].'" ';
                $myQuery=  mysqli_query($con, $sqlString);
                if (!$myQuery)
                {
                    printf("Errormessage: %s\n", mysqli_error($con));
                    echo '<br>';
                    $flag=false;
                }
            }
        }
//        
//        $days_added='+'.$rows['expire_days'].' days';
//        echo date('Y-m-d', strtotime($days_added));
    }
//    die();
//    
       if($flag)
    {
        //mysqli_rollback($con);
        mysqli_commit($con);
        return true;

    }
    else
    {
        mysqli_rollback($con);
        return false;
    }
}

//
//CHECK IF DOCUMENT TRACKER ALREADY EXIST IN MONITORING TABLE

function checkDuplicate($documentlist_tracker_id)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    $sqlQuery='SELECT COUNT(bacdocument_monitoring_id) as rowCount FROM bacdocument_monitoring WHERE fk_bacdocumentlist_tracker_id = "'.$documentlist_tracker_id.'" ';
    $result=mysqli_query($con,$sqlQuery);
    $row=  mysqli_fetch_array($result);
    if ($row['rowCount']==0)
    {
        return false;
    }
    else
    {
        return true;
    }
}
//
function updateStatusIcon()
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    $query='SELECT COUNT(*) as numOfRow FROM bacdocument_monitoring';
    
    $result=mysqli_query($con,$query)or die(mysqli_error($con));
    
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {

        if ($row['numOfRow']<>0)
        {
            echo '<img  src="'.$_POST['imgPath'].'images/home/icon/exclamation.gif" width="30" height="20" align="left" />'.$row['numOfRow'];
            break;
        }
        else
        {
            break; 
        }
    }
    
    
}

function checkStatusUpdatedToday($tracker_id)
{
    
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $dateNow=date('Y-m-d');
  
   $sql='SELECT count(*) as rowCount  FROM bacdocumentlist_trackerdetail WHERE date(transdate) = "'.$dateNow.'" AND fk_bacdocumentlist_tracker_id = '.$tracker_id.' ';
   $result=  mysqli_query($con, $sql); 
   $row=  mysqli_fetch_array($result);
  
    if ($row['rowCount']==0)
    {
        return false;
    }
    else
    {
        return true;
    }
}
//
//function renderTransDetail($detailId)
//{
//    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
//    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
//    
//    $sql="SELECT sortorder,activity,receive_date,receive_by,checkin_date FROM bacdocumentlist_tracker WHERE bacdocumentlist_tracker_id = $detailId ";
//    
////    echo $sql;
////    die();
//    $result=mysqli_query($con, $sql);
//    $row=mysqli_fetch_array($result);
//    echo "<table width='100%'>";
//    echo "<tr><td width='13%'>Step No.: </td><td><strong>".$row['sortorder']."</strong></td>";
//    echo "<td width='13%'>Activity: </td><td><strong>".$row['activity']."</strong></td></tr>";
////    echo "<tr><td width='13%'>Checked In: </td><td><strong>".date("F j, Y, g:i a",strtotime($row['receive_date']))."</strong></td>";
//    echo "<tr><td width='13%'>Checked In: </td><td><strong>".date("F j, Y, g:i a",strtotime($row['checkin_date']))."</strong></td>";
//    echo "<td width='13%'>By: </td><td><strong>".$row['receive_by']."</strong></td></tr>";
//    echo "</table>";
//    
//    
//    $sql="SELECT transdate,noted_by,remark FROM bacdocumentlist_trackerdetail WHERE fk_bacdocumentlist_tracker_id = $detailId ORDER BY Transdate ASC";
//    $result=mysqli_query($con, $sql);
//    echo '<table id="historydata" class="table scroll">';
//    echo '<tr class="bgcolor">';
//        echo '<th style="width:2%;">No</th>';
//        echo '<th style="width:25%;">Note</th>';
//        echo '<th style="width:15%;">Transdate</th>';
//        echo '<th style="width:15%;">By</th>';
//    echo '</tr>';
//   $color='gray';
//   $counter=1;
//    while ($row=mysqli_fetch_array($result))
//    {
//        if ($color=='gray')
//        {
//             echo "<tr class='usercolor1'><td>";
//            $color='notgray';
//        }
//        else
//        {
//             echo "<tr class='usercolor'><td>";
//            $color='gray';
//        }
//        //echo "<tr>td>";
//        echo $counter;
//        echo "</td><td>";
//        echo $row['remark'];
//        echo "</td><td>";
//        echo date("F j, Y, g:i a",strtotime($row['transdate']));
//        echo "</td><td>";
//        echo $row['noted_by'];
//        echo "</td></tr>";
//        
//        $counter++;
//    }
//    echo "</table>";
//}

////////////////////////////////////////
//RECEIVE BAC DOCUMENT SEARCH
////////////////////////////////////////
function searchReceive($searchText)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    $sql='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date FROM bacdocumentlist WHERE (bacdocument_id LIKE "'.$searchText.'%" OR bacdocumentdetail like "%'.$searchText.'%") AND receive_release is null ORDER BY transdate ASC';
    $result=  mysqli_query($con, $sql);
    //$recSet=  mysqli_fetch_array($result);
    
    
    echo"<tr class='usercolortest'><th>Barcode</th><th>Detail</th><th>Cost</th><th>Date</th></tr>";
    $rowcolor="blue";
    while ($recSet=mysqli_fetch_array($result))
    {
       
        
            
            $bacdocument_id=$recSet['bacdocument_id'];
            $bacdocumentdetail=$recSet['bacdocumentdetail'];
            $prcost=$recSet['prcost'];
            $date = date_create($recSet['pr_date']);
         
        if ($rowcolor=="blue")
        {
            echo "<tr class='usercolor' onClick='clickSearch(\"".$bacdocument_id."\",\"".$bacdocumentdetail."\",\"".$prcost."\",\"".date_format($date,'m/d/Y')."\")'><td>";
            $rowcolor="notblue";
        }
        else
        {
            echo "<tr class='usercolor1' onClick='clickSearch(\"".$bacdocument_id."\",\"".$bacdocumentdetail."\",\"".$prcost."\",\"".date_format($date,'m/d/Y')."\")'><td>";
            $rowcolor="blue";
        }
            echo $recSet['bacdocument_id'];
            echo "</td><td>";
            echo $recSet['bacdocumentdetail'];
            echo "</td><td>";
            echo $recSet['prcost'];
            echo "</td><td>";
            echo date_format($date,'m/d/Y');
            echo "</td></tr>";  
       
    }
    
    
}

////////////////////////////////////////
//RENDER RECEIVE BAC DOCUMENT 
////////////////////////////////////////
function renderReceive($searchText)
{
   global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $docId=mysqli_real_escape_string($con,$searchText);
    
   // $sqlString='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date,`bacdocumentlist`.`transdate`,sortorder,receive_date,expire_date,activity,receive_by, office_description FROM bacdocumentlist JOIN bacdocumentlist_tracker ON bacdocumentlist.bacdocument_id = bacdocumentlist_tracker.fk_bacdocumentlist_id JOIN office on bacdocumentlist.fk_officename_bacdocumentlist = office.office_name WHERE   bacdocument_id = "'.$docId.'" ';
 
    if ($_SESSION['BAC']==1)
    {
       $sqlString='SELECT bacdocumentlist_tracker_id,checkin_date,bacdocument_id,bacdocumentdetail,prcost,pr_date,`bacdocumentlist`.`transdate` as transdate,sortorder,receive_date,expire_days,activity,receive_by, fk_officename_bacdocumentlist FROM bacdocumentlist JOIN bacdocumentlist_tracker ON bacdocumentlist.bacdocument_id = bacdocumentlist_tracker.fk_bacdocumentlist_id  WHERE   bacdocument_id = "'.$docId.'"  ORDER BY sortorder asc';
    }
    else if ($_SESSION['GROUP']=='POWER ADMIN')
    {
        $sqlString='SELECT bacdocumentlist_tracker_id,checkin_date,bacdocument_id,bacdocumentdetail,prcost,pr_date,`bacdocumentlist`.`transdate` as transdate,sortorder,receive_date,expire_days,activity,receive_by, fk_officename_bacdocumentlist FROM bacdocumentlist JOIN bacdocumentlist_tracker ON bacdocumentlist.bacdocument_id = bacdocumentlist_tracker.fk_bacdocumentlist_id  WHERE   bacdocument_id = "'.$docId.'"  ORDER BY sortorder asc';
    }
    else
    {
        $sqlString='SELECT bacdocumentlist_tracker_id,checkin_date,bacdocument_id,bacdocumentdetail,prcost,pr_date,`bacdocumentlist`.`transdate` as transdate,sortorder,receive_date,expire_days,activity,receive_by, fk_officename_bacdocumentlist FROM bacdocumentlist JOIN bacdocumentlist_tracker ON bacdocumentlist.bacdocument_id = bacdocumentlist_tracker.fk_bacdocumentlist_id  WHERE   (bacdocument_id = "'.$docId.'") AND (fk_officename_bacdocumentlist = "'.$_SESSION['OFFICE'].'") ORDER BY sortorder asc';
    }
 
   

    $result=mysqli_query($con, $sqlString);
    
   // if (!$result)
    //{
    $x=0;
    $color='gray';
    echo '<div id="ajaxhistory">';
        
         
        while ($recSet = mysqli_fetch_array($result))
        {
           
                
                if ($x==0)
                {   
                    echo '<div id="details" class="retriveDataAllign">';
                    
                    echo '<table>';
                    echo '<tr>';
                    echo '<input id="pKey" type="hidden" readonly="readonly" value="'.$recSet["bacdocument_id"].'" />';
                    echo '<td>Barcode No:&nbsp;<b>'.$recSet['bacdocument_id'].'</b>';
                    echo '</td><td>Cost:&nbsp;<b>'. number_format($recSet["prcost"], 2, '.', ',').'</b>';
                    echo '</td><td>PR Date:&nbsp;<b>'.date("F j, Y",strtotime($recSet["pr_date"])).'</b>';
                echo '</td></tr>';
                echo '<tr><td>';
                    echo 'Details:&nbsp;<b>'.$recSet['bacdocumentdetail'].'</b>';
                    echo '</td><td>';
                    echo 'Office:&nbsp;<b>'.$recSet['fk_officename_bacdocumentlist'].'</b>';
                    echo '</td><td>';
                    echo 'Entry Date:&nbsp;<b>'.date("F j, Y, g:i a",strtotime($recSet['transdate'])).'</b>';
                    echo '</td>';
                echo '</tr>';
                echo '</table>';
                echo '</div>';
                
                echo '<div id="checkinScroll">';
                echo '<table id="historydata" class="table scroll">';
                echo '<tr class="bgcolor">';
                    echo '<th style="width:2%;">Step</th>';
                    echo '<th style="width:25%;">Activity</th>';
                    echo '<th style="width:15%;">Checked-In</th>';
                    echo '<th style="width:15%;">Checked-Out</th>';
                    echo '<th style="width:15%;">Responsible</th>';
                    echo '<th style="width:15%;">Details</th>';
                echo '</tr>';
               
                
                }
              if ($color=='gray')
              {
                   echo "<tr class='usercolor1'><td>";
                  $color='notgray';
              }
              else
              {
                   echo "<tr class='usercolor'><td>";
                  $color='gray';
              }
           
            echo $recSet['sortorder'];
            echo "</td><td>";
            echo $recSet['activity'];
            echo "</td><td>";
            echo $recSet['checkin_date']; 
            echo "</td><td>";
            echo $recSet['receive_date']; 
            echo "</td><td>";
            echo $recSet['receive_by'];
            
            if (checkDetails($recSet['bacdocumentlist_tracker_id']))
            {
                echo "</td><td>";
                echo "<a href='javascript:clickTransDetail(".$recSet['bacdocumentlist_tracker_id'].")'>details</a>";
            }
            else
            {
               echo "</td><td>"; 
            }
            echo "</td></tr>";
                
                
                
         
            $x++;
        }
        echo '</table>';
        echo '</div>';
         echo '</div>';
         
	
	 
	 echo '<div id="checkinRIGHT">';
            echo "<button id='btnReceive' class='btn btn-primary'  onclick='javascript:receiveDoc(\"".$docId."\")'>Receive</button>";
         echo '</div>';
    
}

////////////////////////////////////////
//RECEIVE BAC DOCUMENT 
////////////////////////////////////////
function receiveBacDocument($id)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    mysqli_autocommit($con, false);
    $flag=true;
    $sql="UPDATE bacdocumentlist SET receive_release=1 WHERE bacdocument_id = '".$id."' ";
    $result= mysqli_query($con, $sql);
    
    if (!$result)
    {
	printf( "Errormessage: %s\n", mysqli_error($con));
	$flag=false;
	die();
	
    }
    
    $sql="UPDATE bacdocumentlist_tracker SET checkin_date=now() WHERE fk_bacdocumentlist_id = '".$id."' AND sortorder=1 ";
    $result= mysqli_query($con, $sql);
    if (!$result)
    {
	printf( "Errormessage: %s\n", mysqli_error($con));
	$flag=false;
	die();
	
    }
    
    if ($flag)
    {
	mysqli_commit($con);
    }
 else 
     
    {
	mysqli_rollback($con);
    }
}

////////////////////////////////////////
//RELEASE BAC DOCUMENT SEARCH
////////////////////////////////////////
function searchRelease($searchText)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
      
    $sql='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date FROM bacdocumentlist WHERE (bacdocument_id LIKE "'.$searchText.'%" OR bacdocumentdetail like "%'.$searchText.'%") and receive_release=1 and bacdocument_id not in (select fk_bacdocumentlist_id from bacdocumentlist_tracker
 where receive_date is null or checkin_date is null) ORDER BY transdate ASC';
    $result=  mysqli_query($con, $sql);
    //$recSet=  mysqli_fetch_array($result);
//    echo $sql;
//    die();
//    
    echo"<tr class='usercolortest'><th>Barcode</th><th>Detail</th><th>Cost</th><th>Date</th></tr>";
    $rowcolor="blue";
    while ($recSet=mysqli_fetch_array($result))
    {
       
        
            
            $bacdocument_id=$recSet['bacdocument_id'];
            $bacdocumentdetail=$recSet['bacdocumentdetail'];
            $prcost=$recSet['prcost'];
            $date = date_create($recSet['pr_date']);
         
        if ($rowcolor=="blue")
        {
            echo "<tr class='usercolor' onClick='clickSearch(\"".$bacdocument_id."\",\"".$bacdocumentdetail."\",\"".$prcost."\",\"".date_format($date,'m/d/Y')."\")'><td>";
            $rowcolor="notblue";
        }
        else
        {
            echo "<tr class='usercolor1' onClick='clickSearch(\"".$bacdocument_id."\",\"".$bacdocumentdetail."\",\"".$prcost."\",\"".date_format($date,'m/d/Y')."\")'><td>";
            $rowcolor="blue";
        }
            echo $recSet['bacdocument_id'];
            echo "</td><td>";
            echo $recSet['bacdocumentdetail'];
            echo "</td><td>";
            echo $recSet['prcost'];
            echo "</td><td>";
            echo date_format($date,'m/d/Y');
            echo "</td></tr>";  
       
    }
    
    
}



////////////////////////////////////////
//RENDER RELEASE BAC DOCUMENT 
////////////////////////////////////////
function renderRelease($searchText)
{
   global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $docId=mysqli_real_escape_string($con,$searchText);
    
   // $sqlString='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date,`bacdocumentlist`.`transdate`,sortorder,receive_date,expire_date,activity,receive_by, office_description FROM bacdocumentlist JOIN bacdocumentlist_tracker ON bacdocumentlist.bacdocument_id = bacdocumentlist_tracker.fk_bacdocumentlist_id JOIN office on bacdocumentlist.fk_officename_bacdocumentlist = office.office_name WHERE   bacdocument_id = "'.$docId.'" ';
 
    if ($_SESSION['BAC']==1)
    {
       $sqlString='SELECT bacdocumentlist_tracker_id,checkin_date,bacdocument_id,bacdocumentdetail,prcost,pr_date,`bacdocumentlist`.`transdate` as transdate,sortorder,receive_date,expire_days,activity,receive_by, fk_officename_bacdocumentlist FROM bacdocumentlist JOIN bacdocumentlist_tracker ON bacdocumentlist.bacdocument_id = bacdocumentlist_tracker.fk_bacdocumentlist_id  WHERE   bacdocument_id = "'.$docId.'"  ORDER BY sortorder asc';
    }
    else if ($_SESSION['GROUP']=='POWER ADMIN')
    {
        $sqlString='SELECT bacdocumentlist_tracker_id,checkin_date,bacdocument_id,bacdocumentdetail,prcost,pr_date,`bacdocumentlist`.`transdate` as transdate,sortorder,receive_date,expire_days,activity,receive_by, fk_officename_bacdocumentlist FROM bacdocumentlist JOIN bacdocumentlist_tracker ON bacdocumentlist.bacdocument_id = bacdocumentlist_tracker.fk_bacdocumentlist_id  WHERE   bacdocument_id = "'.$docId.'"  ORDER BY sortorder asc';
    }
//    else
//    {
//        $sqlString='SELECT bacdocumentlist_tracker_id,checkin_date,bacdocument_id,bacdocumentdetail,prcost,pr_date,`bacdocumentlist`.`transdate` as transdate,sortorder,receive_date,expire_days,activity,receive_by, fk_officename_bacdocumentlist FROM bacdocumentlist JOIN bacdocumentlist_tracker ON bacdocumentlist.bacdocument_id = bacdocumentlist_tracker.fk_bacdocumentlist_id  WHERE   (bacdocument_id = "'.$docId.'") AND (fk_officename_bacdocumentlist = "'.$_SESSION['OFFICE'].'") ORDER BY sortorder asc';
 //   }
 
 

    $result=mysqli_query($con, $sqlString);
    
   // if (!$result)
    //{
    $x=0;
    $color='gray';
    echo '<div id="ajaxhistory">';
        
         
        while ($recSet = mysqli_fetch_array($result))
        {
           
                
                if ($x==0)
                {   
                    echo '<div id="details" class="retriveDataAllign">';
                    
                    echo '<table>';
                    echo '<tr>';
                    echo '<input id="pKey" type="hidden" readonly="readonly" value="'.$recSet["bacdocument_id"].'" />';
                    echo '<td>Barcode No:&nbsp;<b>'.$recSet['bacdocument_id'].'</b>';
                    echo '</td><td>Cost:&nbsp;<b>'. number_format($recSet["prcost"], 2, '.', ',').'</b>';
                    echo '</td><td>PR Date:&nbsp;<b>'.date("F j, Y",strtotime($recSet["pr_date"])).'</b>';
                echo '</td></tr>';
                echo '<tr><td>';
                    echo 'Details:&nbsp;<b>'.$recSet['bacdocumentdetail'].'</b>';
                    echo '</td><td>';
                    echo 'Office:&nbsp;<b>'.$recSet['fk_officename_bacdocumentlist'].'</b>';
                    echo '</td><td>';
                    echo 'Entry Date:&nbsp;<b>'.date("F j, Y, g:i a",strtotime($recSet['transdate'])).'</b>';
                    echo '</td>';
                echo '</tr>';
                echo '</table>';
                echo '</div>';
                
                echo '<div id="checkinScroll">';
                echo '<table id="historydata" class="table scroll">';
                echo '<tr class="bgcolor">';
                    echo '<th style="width:2%;">Step</th>';
                    echo '<th style="width:25%;">Activity</th>';
                    echo '<th style="width:15%;">Checked-In</th>';
                    echo '<th style="width:15%;">Checked-Out</th>';
                    echo '<th style="width:15%;">Responsible</th>';
                    echo '<th style="width:15%;">Details</th>';
                echo '</tr>';
               
                
                }
		
              if ($color=='gray')
              {
                   echo "<tr class='usercolor1'><td>";
                  $color='notgray';
              }
              else
              {
                   echo "<tr class='usercolor'><td>";
                  $color='gray';
              }
           
            echo $recSet['sortorder'];
            echo "</td><td>";
            echo $recSet['activity'];
            echo "</td><td>";
            echo $recSet['checkin_date']; 
            echo "</td><td>";
            echo $recSet['receive_date']; 
            echo "</td><td>";
            echo $recSet['receive_by'];
            
            if (checkDetails($recSet['bacdocumentlist_tracker_id']))
            {
                echo "</td><td>";
                echo "<a href='javascript:clickTransDetail(".$recSet['bacdocumentlist_tracker_id'].")'>details</a>";
            }
            else
            {
               echo "</td><td>"; 
            }
            echo "</td></tr>";
                
                
                
         
            $x++;
        }
        echo '</table>';
        echo '</div>';
        echo '</div>';
         
	
	 
	 echo '<div id="checkinRIGHT">';
            //echo '<button id="btnRelease" class="btn btn-primary type="button" onclick="javascript:releaseDoc(\"".$docId."\")" >Receive</button>';
	    echo "<button id='btnRelease' class='btn btn-primary'  onclick='javascript:releaseDoc(\"".$docId."\")'>Release</button>";
         echo '</div>';
    
}

////////////////////////////////////////
//RELEASE BAC DOCUMENT 
////////////////////////////////////////

function releaseBacDocument($id)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    $sql="UPDATE bacdocumentlist SET receive_release=0 WHERE bacdocument_id = '".$id."' ";
    $result= mysqli_query($con, $sql);
    
        if (!$result)
    {
	printf( "Errormessage: %s\n", mysqli_error($con));
	die();
    }
    
    
    
}



////////////////////////////////////////
//FILTER FOR RELEASE BAC DOCUMENT SEARCH
//RETURN TRUE IF DOCUMENT IS READY FOR RELEASE
////////////////////////////////////////
function searchFilterRelease()
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    $sql="SELECT count(*) as noOfRow FROM bacdocumentlist_tracker WHERE  ";
    
}