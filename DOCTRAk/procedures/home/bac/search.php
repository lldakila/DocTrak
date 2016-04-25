<?php

if (session_status() == PHP_SESSION_NONE) 
{
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../../index.php');
}
require_once('../../../procedures/connection.php');
date_default_timezone_set($_SESSION['Timezone']);
switch ($_POST['module'])
{
     case 'newSAVE':
        NewDocument($_POST['docId'],$_POST['docDesc'],$_POST['docuAmount'],$_POST['docuDate']);
        break;
    
    case 'newEDIT':
        newEDIT($_POST['pkey'],$_POST['docId'],$_POST['docDesc'],$_POST['docuAmount'],$_POST['docuDate']);
        break;
    
    case 'newDELETE':
        NewDelete($_POST['docId']);
        break;
    
    case 'Search':
        SearchDoc($_POST['searchText']);
        break;
    
    case 'SearchNew':
        SearchNew($_POST['searchText']);
        break;
//    SearchMonitor
    
    case 'historyCheckin':
        historyCheckin($_POST['docId']);
        break;
    
    case 'SearchArchive':
        SearchArchive($_POST['searchText']);
        break;
    
    case 'renderTransDetail':
        renderTransDetail($_POST['transId']);
        break;
    
    
}
function SearchDoc($queryText)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $searchText=mysqli_real_escape_string($con,$queryText);
    
    //CHECK RESTRICTION
    if ($_SESSION['BAC']==1)
    {
       $SQLstring='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date FROM bacdocumentlist WHERE (bacdocument_id LIKE "'.$searchText.'%" OR bacdocumentdetail like "%'.$searchText.'%") AND (bacdocument_id IN (SELECT fk_bacdocumentlist_id FROM bacdocumentlist_tracker WHERE checkin_date is null or receive_date is null )) AND receive_release = 1 ORDER BY transdate ASC';
    }
    else if ($_SESSION['GROUP']=='POWER ADMIN')
    {
        $SQLstring='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date FROM bacdocumentlist WHERE (bacdocument_id LIKE "'.$searchText.'%" OR bacdocumentdetail like "%'.$searchText.'%") AND (bacdocument_id IN (SELECT fk_bacdocumentlist_id FROM bacdocumentlist_tracker WHERE checkin_date is null or receive_date is null )) AND receive_release = 1  ORDER BY transdate ASC';
    }
    else
    {
        $SQLstring='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date FROM bacdocumentlist WHERE (bacdocument_id LIKE "'.$searchText.'%" OR bacdocumentdetail like "%'.$searchText.'%") AND (fk_officename_bacdocumentlist = "'.$_SESSION['OFFICE'].'") AND (bacdocument_id IN (SELECT fk_bacdocumentlist_id FROM bacdocumentlist_tracker WHERE checkin_date is null or receive_date is null )) AND receive_release = 1  ORDER BY transdate ASC';
    }
    
    
    $result=mysqli_query($con, $SQLstring);
    
            
    echo"<tr class='usercolortest'><th class='sizeBARCODE2'>BARCODE</th><th class='sizeDETAIL'>DETAIL</th><th class='sizeCOST'>COST</th><th>DATE</th></tr>";
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
function SearchNew($queryText)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $searchText=mysqli_real_escape_string($con,$queryText);
    
    //CHECK RESTRICTION
//    if ($_SESSION['BAC']==1)
//    {
//       $SQLstring='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date FROM bacdocumentlist WHERE bacdocument_id LIKE "'.$searchText.'%" OR bacdocumentdetail like "%'.$searchText.'%" AND (bacdocument_id IN (SELECT fk_bacdocumentlist_id FROM bacdocumentlist_tracker WHERE checkin_date is null or receive_date is null )) ORDER BY transdate ASC';
//    }
    if ($_SESSION['GROUP']=='POWER ADMIN')
    {
        $SQLstring='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date FROM bacdocumentlist WHERE bacdocument_id LIKE "'.$searchText.'%" OR bacdocumentdetail like "%'.$searchText.'%" AND (bacdocument_id IN (SELECT fk_bacdocumentlist_id FROM bacdocumentlist_tracker WHERE checkin_date is null or receive_date is null )) ORDER BY transdate ASC';
    }
    else
    {
        $SQLstring='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date FROM bacdocumentlist WHERE (bacdocument_id LIKE "'.$searchText.'%" OR bacdocumentdetail like "%'.$searchText.'%") AND (fk_officename_bacdocumentlist = "'.$_SESSION['OFFICE'].'") AND (bacdocument_id IN (SELECT fk_bacdocumentlist_id FROM bacdocumentlist_tracker WHERE checkin_date is null or receive_date is null )) ORDER BY transdate ASC';
    }
    
    
    $result=mysqli_query($con, $SQLstring);
    
            
    echo"<tr class='usercolortest'><th class='sizeBARCODE2'>BARCODE</th><th class='sizeDETAIL'>DETAIL</th><th class='sizeCOST'>COST</th><th>DATE</th></tr>";
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

function historyCheckin($searchText)
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
                    echo '<th style="width:2%;">STEP</th>';
                    echo '<th style="width:25%;">ACTIVITY</th>';
                    echo '<th style="width:15%;">CHECKED-IN</th>';
                    echo '<th style="width:15%;">CHECKED-OUT</th>';
                    echo '<th style="width:15%;">RESPONSIBLE</th>';
                    echo '<th style="width:15%;">DETAILS</th>';
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
            
         echo '</div>';
      
        

        
  
    //}
 //else {
   // echo "not result";    
    //}
}

function SearchArchive($queryText)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $searchText=mysqli_real_escape_string($con,$queryText);
    
    //CHECK RESTRICTION
    if ($_SESSION['BAC']==1)
    {
       $SQLstring='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date FROM bacdocumentlist WHERE (bacdocument_id LIKE "'.$searchText.'%" OR bacdocumentdetail like "%'.$searchText.'%") AND bacdocument_id NOT IN (SELECT fk_bacdocumentlist_id FROM bacdocumentlist_tracker WHERE checkin_date is null or receive_date is null ) AND receive_release=0 ORDER BY transdate ASC'; 
    }
    else if ($_SESSION['GROUP']=='POWER ADMIN')
    {
        $SQLstring='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date FROM bacdocumentlist WHERE (bacdocument_id LIKE "'.$searchText.'%" OR bacdocumentdetail like "%'.$searchText.'%") AND bacdocument_id NOT IN (SELECT fk_bacdocumentlist_id FROM bacdocumentlist_tracker WHERE checkin_date is null or receive_date is null) AND receive_release=0 ORDER BY transdate ASC'; 
    }
    else
    {
        $SQLstring='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date FROM bacdocumentlist WHERE (bacdocument_id LIKE "'.$searchText.'%" OR bacdocumentdetail like "%'.$searchText.'%") AND (fk_officename_bacdocumentlist = "'.$_SESSION['OFFICE'].'") AND (bacdocument_id NOT IN (SELECT fk_bacdocumentlist_id FROM bacdocumentlist_tracker WHERE checkin_date is null or receive_date is null )) AND receive_release=0 ORDER BY transdate ASC';
    }
    
//    echo $SQLstring;
//    die();
    
    $result=mysqli_query($con, $SQLstring);
    
            
    echo"<tr class='usercolortest'><th class='sizeBARCODE2'>BARCODE</th><th class='sizeDETAIL'>DETAIL</th><th class='sizeCOST'>COST</th><th>DATE</th></tr>";
    $rowcolor="blue";
    while ($rows=mysqli_fetch_array($result))
    {
//        if (filterSearch($rows['bacdocument_id']))
//        {
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
//        }
        
    }
    
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


function renderTransDetail($detailId)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    $sql="SELECT sortorder,activity,receive_date,receive_by,checkin_date FROM bacdocumentlist_tracker WHERE bacdocumentlist_tracker_id = $detailId ";
    
//    echo $sql;
//    die();
    $result=mysqli_query($con, $sql);
    $row=mysqli_fetch_array($result);
    echo "<table width='100%'>";
    echo "<tr><td width='13%'>Step No.: </td><td><strong>".$row['sortorder']."</strong></td>";
    echo "<td width='13%'>Activity: </td><td><strong>".$row['activity']."</strong></td></tr>";
//    echo "<tr><td width='13%'>Checked In: </td><td><strong>".date("F j, Y, g:i a",strtotime($row['receive_date']))."</strong></td>";
    echo "<tr><td width='13%'>Checked In: </td><td><strong>".date("F j, Y, g:i a",strtotime($row['checkin_date']))."</strong></td>";
    echo "<td width='13%'>By: </td><td><strong>".$row['receive_by']."</strong></td></tr>";
    echo "</table>";
    
    
    $sql="SELECT transdate,noted_by,remark FROM bacdocumentlist_trackerdetail WHERE fk_bacdocumentlist_tracker_id = $detailId ORDER BY Transdate ASC";
    $result=mysqli_query($con, $sql);
    echo '<table id="historydata" class="table scroll">';
    echo '<tr class="bgcolor">';
        echo '<th style="width:2%;">NO</th>';
        echo '<th style="width:25%;">NOTE</th>';
        echo '<th style="width:15%;">TRANSDATE</th>';
        echo '<th style="width:15%;">BY</th>';
    echo '</tr>';
   $color='gray';
   $counter=1;
    while ($row=mysqli_fetch_array($result))
    {
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
        //echo "<tr>td>";
        echo $counter;
        echo "</td><td>";
        echo $row['remark'];
        echo "</td><td>";
        echo date("F j, Y, g:i a",strtotime($row['transdate']));
        echo "</td><td>";
        echo $row['noted_by'];
        echo "</td></tr>";
        
        $counter++;
    }
    echo "</table>";
}

///////////////////////
//NEW BAC DOCUMENT
///////////////////////
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
            pr_date,fk_bacdocument_template) VALUES ("'.$docid.'","'.mysqli_real_escape_string($con, str_replace(array("'",'"'), '' , $docdetail)).'",'.$prcost.',"'.$_SESSION['OFFICE'].'","'.$_SESSION['security_name'].'",STR_TO_DATE("'.$validDate.'","%m/%d/%Y"),"'.$template_id.'")';

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

///////////////////////
//EDIT BAC DOCUMENT
///////////////////////
function newEDIT($primKey,$docid,$docdetail,$prcost,$docDate)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $pKey=mysqli_real_escape_string($con,$primKey);
    mysqli_autocommit($con,FALSE);
    $flag=true;
    $docdetail=mysqli_real_escape_string($con, str_replace(array("'",'"'), '' , $docdetail));
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


//////////////////////////////////////////////////////////
//DELETE BAC DOCUMENT/////////////////////////////
//////////////////////////////////////////////////////////
function NewDelete($docid)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $docid=mysqli_real_escape_string($con,$docid);
    mysqli_autocommit($con,FALSE);
    $flag=true;
    
    if (!isPowerAccount($_SESSION['GROUP']))
    {
	echo "Only Power Accounts can delete Document. <br>";
	echo "Delete Failed.";
	die();
    }
    elseif (!checkTransaction($docid)) 
    {
	echo "There is a pending transaction. <br>";
	echo "Delete Failed.";
	die();
    }
    
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

//////////////////////////////////////////////
//CHECK IF ACCOUNT IS POWERUSER OR POWERADMIN
//RETURN TRUE IF POWERACCOUNT
//////////////////////////////////////////////
function isPowerAccount($userGroup)
{
    if (($_SESSION['GROUP']=='POWER USER') OR ($_SESSION['GROUP']=='POWER ADMIN'))
    {
	return true;
    }
    return false;
}

//////////////////////////////////////////////
//CHECK IF DOCUMENT HAS NO CURRENT TRANSACTION
//RETURN TRUE IF NO TRANSACTION
//////////////////////////////////////////////
function checkTransaction($document_id)
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    $sql="SELECT COUNT(*) as noOfRow FROM bacdocumentlist WHERE bacdocument_id  in (SELECT fk_bacdocumentlist_id FROM bacdocumentlist_tracker WHERE receive_date IS NULL AND checkin_date IS NULL) AND  bacdocument_id = '".$document_id."' ";
    
    $result=  mysqli_query($con, $sql);
    $recSet=  mysqli_fetch_array($result);
   
    if ($recSet['noOfRow']==0)
    {
	return true;
    }
    return false;
}