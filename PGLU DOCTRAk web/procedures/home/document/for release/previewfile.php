<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
    $_SESSION['in'] ="start";
    header('Location:../../../../index.php');
}
?>


<?php

session_start();

$path = "c:/wamp/www/docs/";
//$decryptPath=decryptText($_GET['download_file'],$_SESSION['EncryptionKey']);
//
//$xx="M6K%EF%BF%BD-O~%EF%BF%BD%EF%BF%BD%EF%BF%BD!,%EF%BF%BD%EF%BF%BDx";
echo  "encrypt text: ".encryptText("MIS-140814-10");
//encryptText($xx,$_SESSION['EncryptionKey']);
echo "<br>";
//$bb=encryptText($xx,$_SESSION['EncryptionKey']);
echo  "orig text: ".decryptText(encryptText("MIS-140814-10"));
echo "<br>";

/*$xx=$_GET['download_file'];*/
//echo $_GET['download_file']."<br>";
//echo $path.decryptText($xx,$_SESSION['EncryptionKey'])."<br>";*/
$_GET['download_file']=decryptText(encryptText($_GET['download_file'],$_SESSION['EncryptionKey']),$_SESSION['EncryptionKey']).".pdf";
//echo "this one: ".$_GET['download_file'];
//$fullPath = $path.decryptText(encryptText($xx,$_SESSION['EncryptionKey']),$_SESSION['EncryptionKey']).".pdf";
$fullPath = $path.$_GET['download_file'];

if ($fd = fopen ($fullPath, "r")) {
    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);
    switch ($ext) {
        case "pdf":
            header("Content-type: application/pdf"); // add here more headers for diff. extensions
            header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a download
            break;
        default;
            header("Content-type: application/octet-stream");
            header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
    }
    header("Content-length: $fsize");
    header("Cache-control: private"); //use this to open files directly
    while(!feof($fd)) {
        $buffer = fread($fd, 2048);
        echo $buffer;
    }
}
fclose ($fd);
exit;

?>