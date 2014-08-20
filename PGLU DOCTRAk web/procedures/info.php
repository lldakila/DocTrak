<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
    header('Location:../index.php');
}
?>


<?php
	$_SESSION['Title']="PGLU DOCTAK";
	$_SESSION['Version']="v0.5dev";
	$_SESSION['Developer']="TJ and Jerome";
	$_SESSION['Copyright']="Copyleft";
	$_SESSION['Year']="2014-2015";
	$_SESSION['EncryptionKey']="!@)(#$*&%^";
    $_SESSION['Timezone']="Asia/Manila";


?>