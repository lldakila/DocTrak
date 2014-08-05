<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../index.php');
}
?>



<?php
   require_once("../../connection.php");
   session_start();
   if ($_POST['type_mode']=="save") {
        if ($_POST['publicradio'] == "Yes") {
                          $query=insert_update_delete("INSERT INTO DOCUMENT_TYPE(DOCUMENTTYPE_ID,DESCRIPTION,PRIORITY,PUBLIC) VALUES ('".$_POST['document_name']."','".$_POST['description']."','".$_POST['priority']."','1')");
        }
        else {
             $query=insert_update_delete("INSERT INTO DOCUMENT_TYPE(DOCUMENTTYPE_ID,DESCRIPTION,PRIORITY,PUBLIC) VALUES ('".$_POST['document_name']."','".$_POST['description']."','".$_POST['priority']."','0')");
        }



        $_SESSION['operation']="save";
        $_SESSION['message']="Save Successfully";








   }

   elseif ($_POST['type_mode']=="delete") {
          $query=insert_update_delete("DELETE FROM DOCUMENT_TYPE WHERE DOCUMENTTYPE_ID ='".($_POST['document_name'])."' ");
          $_SESSION['operation']="delete";
           $_SESSION['message']="Delete Successfully";
   }
    header('Location:../../../documenttype.php');

 ?>