<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
//    header('Location:../index.php');
//}

	$_SESSION['Title']="DocTrak";
  $_SESSION['HeaderTitle']="Document Tracker";
	$_SESSION['Version']=" v1.10";
	$_SESSION['Developer']="MISD";
	$_SESSION['Copyright']="Copyleft";
	$_SESSION['Year']="2014-2016";
	$_SESSION['EncryptionKey']="!@)(#$*&%^";
  $_SESSION['Timezone']="Asia/Manila";
	$_SESSION['AutoMessage1']="The document with the following details are ready for release.";
	$_SESSION['AutoMessage2']="This is a system generated message. Do not reply.";
  $_SESSION['operation']="";
  $_SESSION['MaxUploadSize']=15728640;
        //$_SESSION['expiretime']=10000;
	$_SESSION['expiretime']=14400;
?>