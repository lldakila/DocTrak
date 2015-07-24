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
    case 'Search':
        SearchDoc($_POST['searchText']);
        break;
    
    case 'historyCheckin':
        historyCheckin($_POST['docId']);
        break;
    
    case 'SearchArchive':
        SearchArchive($_POST['searchText']);
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
       $SQLstring='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date FROM bacdocumentlist WHERE bacdocument_id LIKE "'.$searchText.'%" OR bacdocumentdetail like "%'.$searchText.'%" ORDER BY transdate ASC'; 
    }
    else if ($_SESSION['GROUP']=='POWER ADMIN')
    {
        $SQLstring='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date FROM bacdocumentlist WHERE bacdocument_id LIKE "'.$searchText.'%" OR bacdocumentdetail like "%'.$searchText.'%" ORDER BY transdate ASC';
    }
    else
    {
        $SQLstring='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date FROM bacdocumentlist WHERE (bacdocument_id LIKE "'.$searchText.'%" OR bacdocumentdetail like "%'.$searchText.'%") AND (fk_officename_bacdocumentlist = "'.$_SESSION['OFFICE'].'") ORDER BY transdate ASC';
    }
    
    
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

function historyCheckin($searchText)
{
    
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $docId=mysqli_real_escape_string($con,$searchText);
    
   // $sqlString='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date,`bacdocumentlist`.`transdate`,sortorder,receive_date,expire_date,activity,receive_by, office_description FROM bacdocumentlist JOIN bacdocumentlist_tracker ON bacdocumentlist.bacdocument_id = bacdocumentlist_tracker.fk_bacdocumentlist_id JOIN office on bacdocumentlist.fk_officename_bacdocumentlist = office.office_name WHERE   bacdocument_id = "'.$docId.'" ';
 
    if ($_SESSION['BAC']==1)
    {
       $sqlString='SELECT checkin_date,bacdocument_id,bacdocumentdetail,prcost,pr_date,`bacdocumentlist`.`transdate` as transdate,sortorder,receive_date,expire_days,activity,receive_by, fk_officename_bacdocumentlist FROM bacdocumentlist JOIN bacdocumentlist_tracker ON bacdocumentlist.bacdocument_id = bacdocumentlist_tracker.fk_bacdocumentlist_id  WHERE   bacdocument_id = "'.$docId.'"  ORDER BY sortorder asc';
    }
    else if ($_SESSION['GROUP']=='POWER ADMIN')
    {
        $sqlString='SELECT checkin_date,bacdocument_id,bacdocumentdetail,prcost,pr_date,`bacdocumentlist`.`transdate` as transdate,sortorder,receive_date,expire_days,activity,receive_by, fk_officename_bacdocumentlist FROM bacdocumentlist JOIN bacdocumentlist_tracker ON bacdocumentlist.bacdocument_id = bacdocumentlist_tracker.fk_bacdocumentlist_id  WHERE   bacdocument_id = "'.$docId.'"  ORDER BY sortorder asc';
    }
    else
    {
        $sqlString='SELECT checkin_date,bacdocument_id,bacdocumentdetail,prcost,pr_date,`bacdocumentlist`.`transdate` as transdate,sortorder,receive_date,expire_days,activity,receive_by, fk_officename_bacdocumentlist FROM bacdocumentlist JOIN bacdocumentlist_tracker ON bacdocumentlist.bacdocument_id = bacdocumentlist_tracker.fk_bacdocumentlist_id  WHERE   (bacdocument_id = "'.$docId.'") AND (fk_officename_bacdocumentlist = "'.$_SESSION['OFFICE'].'") ORDER BY sortorder asc';
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
                    echo 'Entry Date:&nbsp;<b>'.$recSet['transdate'].'</b>';
                    echo '</td>';
                echo '</tr>';
                echo '</table>';
                echo '</div>';
                
                echo '<div id="monitorScroll">';
                echo '<table id="historydata" class="table scroll">';
                echo '<tr class="bgcolor">';
                    echo '<th style="width:5%;">Step</th>';
                    echo '<th style="width:35%;">Activity</th>';
                    echo '<th style="width:15%;">Checked-In</th>';
                    echo '<th style="width:15%;">Checked-Out</th>';
                    echo '<th style="width:30%;">Responsible</th>';
                echo '</tr>';
//               
                
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
               echo "</td><tr>";
                
                
                
         
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
       $SQLstring='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date FROM bacdocumentlist WHERE (bacdocument_id LIKE "'.$searchText.'%" OR bacdocumentdetail like "%'.$searchText.'%") AND bacdocument_id NOT IN (SELECT fk_bacdocumentlist_id FROM bacdocumentlist_tracker WHERE  receive_date IS NULL GROUP BY fk_bacdocumentlist_id ) ORDER BY transdate ASC'; 
    }
    else if ($_SESSION['GROUP']=='POWER ADMIN')
    {
        $SQLstring='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date FROM bacdocumentlist WHERE (bacdocument_id LIKE "'.$searchText.'%" OR bacdocumentdetail like "%'.$searchText.'%") AND bacdocument_id NOT IN (SELECT fk_bacdocumentlist_id FROM bacdocumentlist_tracker WHERE  receive_date IS NULL GROUP BY fk_bacdocumentlist_id ) ORDER BY transdate ASC';
    }
    else
    {
        $SQLstring='SELECT bacdocument_id,bacdocumentdetail,prcost,pr_date FROM bacdocumentlist WHERE (bacdocument_id LIKE "'.$searchText.'%" OR bacdocumentdetail like "%'.$searchText.'%") AND (fk_officename_bacdocumentlist = "'.$_SESSION['OFFICE'].'") ORDER BY transdate ASC';
    }
    
//    echo $SQLstring;
//    die();
    
    $result=mysqli_query($con, $SQLstring);
    
            
    echo"<tr class='usercolortest'><th>Barcode</th><th>Detail</th><th>Cost</th><th>Date</th></tr>";
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