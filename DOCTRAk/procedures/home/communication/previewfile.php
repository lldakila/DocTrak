<?php

if (session_status() == PHP_SESSION_NONE) 
{
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../../index.php');
}



require_once('../document/common/encrypt.php');

$id=decryptText(base64_decode($_GET['download_file']));
echo $id;
die();
require_once('../../../procedures/connection.php');
global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);

$query="select mail_file from commail where commail_id = '".$id."'";
//echo $query;
$RESULT=mysqli_query($con,$query);
 while ($row = mysqli_fetch_array($RESULT))
 {
     
//     echo $row['document_mime'];
//     die;
     //header('Content-type: "'.$row['document_mime'].'');
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false);
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="downloaded.pdf"');
    header("Content-Transfer-Encoding: binary");
     //header('Content-Disposition: attachment; filename="downloaded.pdf"');
    ob_clean();
    flush();
    echo $row['mail_file'];
     
  
 }