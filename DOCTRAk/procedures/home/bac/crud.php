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
        header('Location:../../../index.php');
    }

}
else if ($_SESSION['GROUP']!='POWER ADMIN')
{

    if ($_SESSION['BAC']!=1)
    {
        header('Location:../../../index.php');
    }
}
//else
//{
//    $restrictedUser=false;
//}




switch($_POST['module'])
{
    case 'newSAVE':
        NewDocument($_POST['docId'],$_POST['docDesc'],$_POST['docuAmount'],$_POST['docuDate']);
        break;
    case 'newEDIT':
        newEDIT($_POST['pkey'],$_POST['docId'],$_POST['docDesc'],$_POST['docuAmount'],$_POST['docuDate']);
        break;
    
    case 'searchDoc':
        SearchDoc($_POST['searchText']);
        break;
    
    case 'newDELETE':
        NewDelete($_POST['docId']);
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
}


//NEW BAC DOCUMENT
function NewDocument($docid,$docdetail,$prcost,$docDate)
{
    
   global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    mysqli_autocommit($con,FALSE);
    $flag=true;
    
    $date = date_parse($docDate);
    if (!checkdate($date["month"],$date["day"],$date["year"]))
    {
        $flag=false;
        printf("Invalid date.");
        echo '<br>';
    }

    $validDate= $date["month"]."/".$date["day"]."/".$date["year"];

    $query1 ='SELECT template_id FROM bacdocument_template WHERE '.$prcost.' >= min_cost and '.$prcost.' <=max_cost';
    $result1 =  mysqli_query($con, $query1);
    $recSet1 = mysqli_fetch_assoc($result1);
    $template_id=$recSet1['template_id'];
    
    
    
    $query = 'INSERT  INTO bacdocumentlist(bacdocument_id,bacdocumentdetail,prcost,fk_officename_bacdocumentlist,fk_security_username,
            pr_date,fk_bacdocument_template) VALUES ("'.$docid.'","'.$docdetail.'",'.$prcost.',"'.$_SESSION['OFFICE'].'","'.$_SESSION['security_name'].'",STR_TO_DATE("'.$validDate.'","%m/%d/%Y"),"'.$template_id.'")';

//    echo $query;
//    die();
    $result = mysqli_query($con, $query);
    if(!$result) { 
        $flag=false; 
        printf("Errormessage: %s\n", mysqli_error($con));
        echo '<br>';
    }
   
        
 
       
    
    
    $query2 ='SELECT sortorder,activity,max_day FROM bacdocument_templatelist WHERE fk_template_id ='.$template_id.' ORDER BY sortorder ASC';
    $result2 =  mysqli_query($con, $query2);
    //$recSet2 = mysqli_fetch_array($result2);

  
   $countX=true;
     while ($rows2=mysqli_fetch_array($result2))
    {
//        if ($countX)
//        {
//        $expirationDay = date_create('now');
//        date_add($expirationDay, date_interval_create_from_date_string($rows2['max_day'].' days'));
//        $dateAdded=date_format($expirationDay, 'Y-m-d');
//        
//        $query3='INSERT INTO bacdocumentlist_tracker(fk_bacdocumentlist_id,sortorder,receive_date,expire_date,activity)
//                VALUES ("'.$docid.'",'.$rows2['sortorder'].',"'.date("Y-m-d H:i:s").'","'.$dateAdded.'",
//               "'.$rows2['activity'].'")'; 
//        $countX=false;
//         }
//        else 
//        {
            $query3='INSERT INTO bacdocumentlist_tracker(fk_bacdocumentlist_id,sortorder,activity,expire_days)
                VALUES ("'.$docid.'",'.$rows2['sortorder'].',"'.$rows2['activity'].'",'.$rows2['max_day'].')';
//        }
//        
//        echo $query3;
//        echo $countz.'<br>';
//        $countz++;
        $result3 =  mysqli_query($con, $query3);
        if(!$result3) 
            { 
            $flag=false; 
            printf("Errormessage: %s\n", mysqli_error($con));
            echo '<br>';
//        echo $query3.'<br>';
        }

    }
    
    if($flag)
    {
//        mysqli_rollback($con);
        mysqli_commit($con);
        echo 'Document saved.';
    }
    else
    {
        mysqli_rollback($con);
        echo 'Error on saving document.';
    }
    
}

function newEDIT($primKey,$docid,$docdetail,$prcost,$docDate)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $pKey=mysqli_real_escape_string($con,$primKey);
    mysqli_autocommit($con,FALSE);
    $flag=true;
    
    $date = date_parse($docDate);
    if (!checkdate($date["month"],$date["day"],$date["year"]))
    {
        $flag=false;
        printf("Invalid date.");
        echo '<br>';
    }
    $validDate= $date["month"]."/".$date["day"]."/".$date["year"];
    
    $sqlString="UPDATE bacdocumentlist SET bacdocument_id='$docid',bacdocumentdetail='$docdetail',prcost='$prcost',pr_date=STR_TO_DATE('$validDate','%m/%d/%Y') WHERE bacdocument_id ='$pKey' ";
    $result=  mysqli_query($con, $sqlString);
    if (!$result)
    {
        $flag=false;
        printf("Errormessage: %s\n", mysqli_error($con));
        echo '<br>'; 
    }
    
    if($flag)
    {
        mysqli_commit($con);
        echo 'Document Updated.';
    }
    else
    {
        mysqli_rollback($con);
        echo 'Error on updating document.';
    }
    
}

function SearchDoc($queryText)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $searchText=mysqli_real_escape_string($con,$queryText);
    $SQLstring='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date FROM bacdocumentlist WHERE bacdocument_id LIKE "'.$searchText.'%" OR bacdocumentdetail like "%'.$searchText.'%" ORDER BY transdate ASC';
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
//RETURNS TRUE IF RECEIVED DATE IS NULL
function filterSearch($documentId)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $sqlString="SELECT * FROM bacdocumentlist_tracker WHERE fk_bacdocumentlist_id = '".$documentId."' ORDER BY sortorder DESC";
    $result=  mysqli_query($con, $sqlString);
    
    while ($rows=  mysqli_fetch_array($result))
    {
       if ($rows['receive_date']==NULL OR $rows['receive_date']=='0000-00-00 00:00:00')
       {
           return true;
       }
    }
    return false;
}


function NewDelete($docid)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $docid=mysqli_real_escape_string($con,$docid);
    mysqli_autocommit($con,FALSE);
    $flag=true;
    
    
    $sqlString="DELETE FROM bacdocumentlist WHERE bacdocument_id = '$docid'";
    $result=mysqli_query($con, $sqlString);
  
    if(!$result)
    {
        $flag=false;
        printf("Errormessage: %s\n", mysqli_error($con));
        echo '<br>';
    }
    
    
    if($flag)
    {
//        mysqli_rollback($con);
        mysqli_commit($con);
        
        echo 'Document deleted.';
    }
    else
    {
        mysqli_rollback($con);
        echo 'Error on deleting document.';
    }
    
    
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
                    echo 'Entry Date:&nbsp;<b>'.$recSet['transdate'].'</b>';
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
                echo "<a href='javascript:alert('bye bye')'>details</a>";
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
         echo '</form></div>';
      

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
    $sqlString="UPDATE bacdocumentlist_tracker set checkin_date=NOW() where  bacdocumentlist_tracker_id = $addFk AND fk_bacdocumentlist_id = '".$docId."' ";
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
    
//    echo $sqlString;
//    die();
//    
    
    if (!checkDocumentDeadline())
    {
        $flag=false;
        printf("Errormessage: Error updating tables.");
        echo '<br>';
    }
    //die();
   
    
    
    if($flag)
    {
        mysqli_commit($con);
        historyCheckin($docId);
        //echo 'Document deleted.';
    }
    else
    {
        mysqli_rollback($con);
        echo 'Error on checking in document. Try Again.';
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
        if (checkDuplicate($rows['bacdocumentlist_tracker_id'])==false AND checkStatusUpdatedToday($rows["bacdocumentlist_tracker_id"])==false)
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
            echo '<img  src="'.$_POST['imgPath'].'/images/home/icon/exclamation.gif" width="30" height="20" align="left" />'.$row['numOfRow'];
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