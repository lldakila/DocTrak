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
    
require_once("../../../connection.php");
global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);

if (mysqli_connect_error()) 
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die;
}

$query="select documentlist_tracker_id, fk_documentlist_id, office_name,received_val,released_val,sortorder from documentlist_tracker where fk_documentlist_id= '".$_POST['barcodeNo']."' order by sortorder asc";

$result=  mysqli_query($con, $query);
echo 'Office:';
echo '<select id="officeRollback" name="officeRollback">';
while ($row=  mysqli_fetch_array($result))
{
    if (($row['received_val']==1) and ($row['released_val']==1))
    {
        echo "<option value=".$row['documentlist_tracker_id'].">".$row['sortorder'].". ".$row['office_name']."</option>";
    }
}
echo '</select>';
echo '<input type=submit value="Rollback" class="btn btn-primary" id="btn" />';
mysqli_free_result($result);
mysqli_close($con);