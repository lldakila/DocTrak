<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
    $_SESSION['in'] ="start";
    header('Location:../../../../index.php');
}

require_once("encrypt.php");
$path = "c:/wamp/www/docs/";
//$decryptPath=decryptText($_GET['download_file'],$_SESSION['EncryptionKey']);
//
//$xx="M6K%EF%BF%BD-O~%EF%BF%BD%EF%BF%BD%EF%BF%BD!,%EF%BF%BD%EF%BF%BDx";
/*echo $_GET['download_file'];
echo "<br>";
echo  "encrypt text: ".encryptText("MIS-140814-10");
$z=encryptText("MIS-140814-10");
//encryptText($xx,$_SESSION['EncryptionKey']);
echo "<br>";
//$bb=encryptText($xx,$_SESSION['EncryptionKey']);
echo  "orig text: ".decryptText(base64_decode($_GET['download_file']));
echo "<br>";*/

/*$xx=$_GET['download_file'];*/
//echo $_GET['download_file']."<br>";
//echo $path.decryptText($xx,$_SESSION['EncryptionKey'])."<br>";*/
//$_GET['download_file']=decryptText(base64_decode($_GET['download_file']));
//echo "this one: ".$_GET['download_file'];
//$fullPath = $path.decryptText(encryptText($xx,$_SESSION['EncryptionKey']),$_SESSION['EncryptionKey']).".pdf";
/*echo urldecode($_GET["download_file"]);
echo "<br>";
echo "TTZL9y1PfpNGh1KZRTMwn2z2blIb3uvX+n+jrSmnPyY=";
echo "<br>";
echo decryptText(base64_decode("TTZL9y1PfpNGh1KZRTMwn2z2blIb3uvX+n+jrSmnPyY="));*/
$fullPath = $path.urldecode(decryptText(base64_decode($_GET['download_file'])));
/*echo $fullPath;
if ($fd = fopen ($fullPath, "r")) {
    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
  //  $ext = strtolower($path_parts["extension"]);
  //  switch ($ext) {
    //    case "pdf":
            header("Content-type: application/pdf"); // add here more headers for diff. extensions
           // header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a download
     //       break;
    //    default;
    //       header("Content-type: application/octet-stream");
     //      header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
  //  }
  //  header("Content-length: $fsize");
  //  header("Cache-control: private"); //use this to open files directly
    output_file($fullPath, ''.$_GET['filename'].'', 'text/plain');
    while(!feof($fd)) {
        $buffer = fread($fd, 2048);
        echo $buffer;
    }
}
fclose ($fd);*/
$file = $path.urldecode(decryptText(base64_decode($_GET['download_file'])));
header('Content-Description: File Transfer');
header('Content-type: application/pdf');
header("Content-Type: application/force-download");// some browsers need this
header("Content-Disposition: attachment; filename=\"$file\"");
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . filesize($file));
ob_clean();
flush();
readfile($file);
exit;




?>