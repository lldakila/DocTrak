<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])) {
    $_SESSION['in'] = "start";
    header('Location:../../../../index.php');
}


require_once("../../../connection.php");
global $DB_HOST, $DB_USER, $DB_PASS, $BD_TABLE;
$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $BD_TABLE);
if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die;
}

$query="select fk_documentlist_id from documentlist_tracker where documentlist_tracker_id = '".$_POST["officeRollback"]."'";

$Result=  mysqli_query($con, $query);
while ($row=  mysqli_fetch_array($Result))
{
    $barcode=$row['fk_documentlist_id'];
    break;
}

mysqli_free_result($Result);


$query="select received_val,received_by,received_date,received_comment,released_val,released_by,released_date,released_comment,forrelease_val,forrelease_date,forrelease_comment from documentlist_tracker where  fk_documentlist_id='$barcode' order by sortorder desc";

$Result=  mysqli_query($con, $query);


echo $query;
die;


$query = "update documentlist_tracker set received_val=NULL,received_by=NULL,received_date=NULL,received_comment=NULL,released_val=NULL,released_by=NULL,released_date=NULL,released_comment=NULL,forrelease_val=NULL,forrelease_date=NULL,forrelease_comment=NULL where documentlist_tracker_id = '".$_POST["officeRollback"]."' ";

