<?php
    session_start();
    if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
        $_SESSION['in'] ="start";
        header('Location:../../../../index.php');
}
?>


<?php

	require_once("../../../connection.php");
    require_once("../common/encrypt.php");
	session_start();
	$query=select_info_multiple_key("SELECT DOCUMENT_FILENAME FROM DOCUMENTLIST WHERE DOCUMENT_FILENAME = '" .$_POST['attachment']. "' ");
			
			
		 if ($query[0]['DOCUMENT_FILENAME']!=""){
        //echo "<a href='procedures/home/document/for release/previewfile.php?download_file=".$query[0]['DOCUMENT_FILENAME'].".pdf' target='_blank'>Download</a>";
             $encrypted=urlencode(base64_encode(encryptText($query[0]['DOCUMENT_FILENAME'])));
             //echo "<a href='/procedures/home/document/tracker/previewfile.php?download_file=".$query[0]['document_filename']."' >Download</a>";
             // $xx=base64_encode(encryptText($query[0]['document_filename']));
             echo "<a href='/procedures/home/document/common/previewfile.php?download_file=".$encrypted."'>Download</a>";
    }
    else {
        echo "<a href='#'> No Attachment</a>";
    }


?>