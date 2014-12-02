<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
        $_SESSION['in'] ="start";
        header('Location:../../../../index.php');
}


	require_once("../../../connection.php");
    require_once("../common/encrypt.php");

	$query=select_info_multiple_key("SELECT DOCUMENT_FILENAME,document_mime,document_id FROM documentlist WHERE document_id = '" .$_POST['attachment']. "' ");
		
		
		 
                if ($query[0]['document_mime']!=""){
             $encrypted=urlencode(base64_encode(encryptText($query[0]['document_id'])));
             echo "<a target='_blank' href='/procedures/home/document/common/previewfile.php?download_file=".$encrypted."'>Download</a>";
    }
    else {
        echo "<a href='#'> No Attachment</a>";

    }


?>