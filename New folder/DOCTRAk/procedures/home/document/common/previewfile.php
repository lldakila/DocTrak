<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
    $_SESSION['in'] ="start";
    header('Location:../../../../index.php');
}


require_once("encrypt.php");

$id=decryptText(base64_decode($_GET['download_file']));

require_once("../../../connection.php");
global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);


$query="select document_file,document_mime from documentlist where document_id = '".$id."'";
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
    echo $row['document_file'];
     
  
 }



//
//
//echo "die";
//        die;
//echo "<br>";
////echo $fullpath;
//
//    $file = $path;
//echo $file;
//if (file_exists($file))
//    {
//    header('Content-Description: File Transfer');
//    header('Content-Type: application/octet-stream');
//    header('Content-Disposition: attachment; filename='.basename($file));
//    header('Expires: 0');
//    header('Cache-Control: must-revalidate');
//    header('Pragma: public');
//    header('Content-Length: ' . filesize($file));
//    ob_clean();
//    flush();
//    readfile($file);
//    exit;
//    }
//
//
//
//
//
//
//
//














//echo $fullpath;
//echo "<br>";
//echo pathinfo($path .decryptText(base64_decode($_GET['download_file'])));
//
//if (file_exists  ($path)) {
//$fsize = filesize($fullpath);
//$path_parts = pathinfo($fullpath);
////echo decryptText(base64_decode($_GET['download_file']));
////echo  $path.basename(decryptText(base64_decode($_GET['download_file'])));
////echo "<br>";
////echo $file;
//$ext = strtolower($path_parts["extension"]);
//echo "valid req";
//die;
//switch ($ext) {
//    case "pdf":
//    header("Content-type: application/pdf"); // add here more headers for diff.     extensions
//    header("Content-Disposition: attachment; filename=\"".$fullpath."\"");     // use 'attachment' to force a download
//    break;
//    default;
//    header("Content-type: application/octet-stream");
//    header("Content-Disposition: filename=\"".$fullpath."\"");
//}
//header("Content-length: $fsize");
//header("Cache-control: private"); //use this to open files directly
//readfile($file);
//exit;
//} else {
//        die("Invalid request");
//}
////
////header('Content-Description: File Transfer');
////header('Content-type: application/pdf');
////header("Content-Type: application/force-download");// some browsers need this
////header("Content-Disposition: attachment; filename=\"$file\"");
////header('Expires: 0');
////header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
////header('Pragma: public');
////header('Content-Length: ' . filesize($file));
////ob_clean();
////flush();
////readfile($file);
////echo $file;
////exit;




