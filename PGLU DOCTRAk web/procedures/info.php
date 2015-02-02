<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
    header('Location:../index.php');
}

	$_SESSION['Title']="PGLU DOCTRAK";
	$_SESSION['Version']="v0.5dev";
	$_SESSION['Developer']="TJ and Jerome";
	$_SESSION['Copyright']="Copyleft";
	$_SESSION['Year']="2014-2015";
	$_SESSION['EncryptionKey']="!@)(#$*&%^";
        $_SESSION['Timezone']="Asia/Manila";
	$_SESSION['AutoMessage1']="The document with the following details are ready for release.";
	$_SESSION['AutoMessage2']="This is a system generated message. Do not reply.";
        $_SESSION['operation']="";
        $_SESSION['MaxUploadSize']=15728640;
?>