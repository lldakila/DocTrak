<?php


if (session_status() == PHP_SESSION_NONE) 
{
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../../index.php');
}

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

date_default_timezone_set($_SESSION['Timezone']);
require_once('../../../procedures/connection.php');


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
//        $dateToday = date_create('now');
//        date_add($dateToday, date_interval_create_from_date_string($rows2['max_day'].' days'));
//        $dateAdded=date_format($dateToday, 'Y-m-d');
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

function SearchDoc($searchText)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
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

    //echo "<br>Finally, search is working!!!";
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


function historyCheckin($docId)
{
    
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
   // $sqlString='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date,`bacdocumentlist`.`transdate`,sortorder,receive_date,expire_date,activity,receive_by, office_description FROM bacdocumentlist JOIN bacdocumentlist_tracker ON bacdocumentlist.bacdocument_id = bacdocumentlist_tracker.fk_bacdocumentlist_id JOIN office on bacdocumentlist.fk_officename_bacdocumentlist = office.office_name WHERE   bacdocument_id = "'.$docId.'" ';
 $sqlString='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date,`bacdocumentlist`.`transdate` as transdate,sortorder,receive_date,expire_days,activity,receive_by, fk_officename_bacdocumentlist FROM bacdocumentlist JOIN bacdocumentlist_tracker ON bacdocumentlist.bacdocument_id = bacdocumentlist_tracker.fk_bacdocumentlist_id  WHERE   bacdocument_id = "'.$docId.'" ORDER BY sortorder asc';
    
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
                    echo '</td><td>Cost:&nbsp;<b>'.$recSet['prcost'].'</b>';
                    echo '</td><td>PR Date:&nbsp;<b>'.$recSet['pr_date'].'</b>';
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
                
                echo '<div id="scroll">';
                echo '<table id="historydata" class="table scroll">';
                echo '<tr class="bgcolor">';
                    echo '<th>Step</th>';
                    echo '<th>Activity</th>';
                    echo '<th>Checked In</th>';
                    echo '<th>Checked Out</th>';
                    echo '<th>Responsible</th>';
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
            echo $recSet['receive_date']; 
             echo "</td><td>";
              echo $recSet['receive_by'];
              echo "</td><td>";
               echo $recSet['receive_by'];
               echo "</td><tr>";
                
                
                
         
            $x++;
        }
        echo '</table>';
        echo '</div>';
         echo '</div>';
         
         echo '<div id="checkinRIGHT">';
            echo '<button id="checkMe"  type="submit" class="btn btn-primary" onclick="javascript:checkMeIn()">Check In</button>';
         echo '</form></div>';
      
        

        
  
    //}
 //else {
   // echo "not result";    
    //}
}


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
        $sqlString="UPDATE bacdocumentlist_tracker set receive_date=NOW(),expire_days='$arrHolder[1]',receive_by='".$_SESSION["security_name"]."' WHERE bacdocumentlist_tracker_id = '$arrHolder[0]' ";
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
    
        
    if($flag)
    {
        mysqli_commit($con);
        historyCheckin($docId);
        //echo 'Document deleted.';
    }
    else
    {
        mysqli_rollback($con);
        echo 'Error on deleting document.';
    }
    
}
//CHECK IF THE CURRENT DOCUMENT
//RETURNS TRUE OR FALSE
function checkInSeek($docId)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
 
    
    $sqlString="SELECT bacdocumentlist_tracker_id,receive_date,expire_days FROM  bacdocumentlist_tracker WHERE fk_bacdocumentlist_id = '$docId' ORDER BY sortorder ASC";
    $recSet=  mysqli_query($con, $sqlString);
 
    while ($rows=mysqli_fetch_array($recSet))
    {
        if ($rows['receive_date']==NULL OR $rows['receive_date']=='0000-00-00 00:00:00')
        {
            //echo $rows['bacdocumentlist_tracker_id'];
            //$expireDays= date('Y-m-d', strtotime("+".$rows['expire_days']." days"));
            $checkInDetail=array($rows["bacdocumentlist_tracker_id"],$rows["expire_days"],true);
            return $checkInDetail;
            
        }
       
    }
    
    $checkInDetail=array('','',false);
    return $checkInDetail;
    
    
    
    
}
