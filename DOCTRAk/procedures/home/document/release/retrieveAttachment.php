<?php
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
        $_SESSION['in'] ="start";
        header('Location:../../../../index.php');
}
?>


<?php

	require_once("../../../connection.php");
    require_once("../common/encrypt.php");
	
	$query=select_info_multiple_key("SELECT document_mime,document_id FROM documentlist WHERE document_id = '" .$_POST['attachment']. "' ");
	
    if ($query[0]['document_id']!=""){
        $encrypted=urlencode(base64_encode(encryptText($query[0]['document_id'])));
             //echo "<a href='/procedures/home/document/tracker/previewfile.php?download_file=".$query[0]['document_filename']."' >Download</a>";
             // $xx=base64_encode(encryptText($query[0]['document_filename']));
        echo "<a target='_blank' href='/procedures/home/document/common/previewfile.php?download_file=".$encrypted."'>Download</a>";
    }
    else 
    {
        echo "<a href='#'> No Attachment</a>";
    }


?>