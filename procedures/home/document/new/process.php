<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../../index.php');
}
?>



<?php
   require_once("../../../connection.php");
   session_start();
//echo "UPDATE DOCUMENT SET DOCUMENT_ID='".$_POST['barcode']."',DOCUMENT_TITLE='".$_POST['title']."',DOCUMENT_DESCRIPTION='".$_POST['description']."',DOCUMENT_FILE='".$_POST['file']."',FK_TEMPLATE_ID='".$_POST['template']."',FK_DOCUMENTTYPE_ID='".$_POST['type']."' WHERE DOCUMENT_ID = '".$_POST['primarykey']."' ";
echo "INSERT INTO DOCUMENT(DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,DOCUMENT_FILE,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,FK_SECURITY_USERNAME) VALUES ('".$_POST['barcode']."','".$_POST['title']."','".$_POST['description']."','".$_POST['file']."','".$_POST['template']."','".$_POST['type']."','".$_SESSION['security_name']."')";
 if ($_POST['document_hidden']=="save") {
       if ($_POST['primarykey'] == "") {
        $query=insert_update_delete("INSERT INTO DOCUMENT(DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,DOCUMENT_FILE,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,FK_SECURITY_USERNAME) VALUES ('".$_POST['barcode']."','".$_POST['title']."','".$_POST['description']."','".$_POST['file']."','".$_POST['template']."','".$_POST['type']."','".$_SESSION['usr']."')");
        $_SESSION['operation']="save";
        $_SESSION['message']="Save Successful";

       }
       else {
           echo "UPDATE DOCUMENT SET DOCUMENT_ID='".$_POST['barcode']."',DOCUMENT_TITLE='".$_POST['title']."',DOCUMENT_DESCRIPTION='".$_POST['description']."',DOCUMENT_FILE='".$_POST['file']."',FK_TEMPLATE_ID='".$_POST['template']."',FK_DOCUMENTTYPE_ID='".$_POST['type']."' WHERE DOCUMENT_ID = '".$_POST['primarykey']."' ";
           $query=insert_update_delete("UPDATE DOCUMENT SET DOCUMENT_ID='".$_POST['barcode']."',DOCUMENT_TITLE='".$_POST['title']."',DOCUMENT_DESCRIPTION='".$_POST['description']."',DOCUMENT_FILE='".$_POST['file']."',FK_TEMPLATE_ID='".$_POST['template']."',FK_DOCUMENTTYPE_ID='".$_POST['type']."' WHERE DOCUMENT_ID = '".$_POST['primarykey']."' ");

           $_SESSION['operation']="update";
           $_SESSION['message']="Update Successful";
       }
   }

   elseif ($_POST['document_hidden']=="delete") {

          $query=insert_update_delete("DELETE FROM DOCUMENT WHERE DOCUMENT_ID ='".($_POST['barcode'])."' ");
          $_SESSION['operation']="delete";
          $_SESSION['message']="Delete Successful";
   }
   header('Location:../../../../newdoc.php');

 ?>