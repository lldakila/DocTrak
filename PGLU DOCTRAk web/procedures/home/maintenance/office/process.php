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
   if ($_POST['office_mode']=="save") {
	if ($_POST['primarykey']=="") {
        $query=insert_update_delete("INSERT INTO OFFICE(OFFICE_NAME,OFFICE_DESCRIPTION) VALUES ('".$_POST['office_name']."','".$_POST['office_description']."')");
        $_SESSION['operation']="save";
       //  $_SESSION['message']="Save Successfully";
   }
   
   else {
	   
	   $query=insert_update_delete("UPDATE OFFICE SET OFFICE_NAME='".$_POST['office_name']."',OFFICE_DESCRIPTION='".$_POST['office_description']."' WHERE OFFICE_NAME='".$_POST['primarykey']."'");
	   
	   $_SESSION['operation']="update";
   }
   }


   elseif ($_POST['office_mode']=="delete") {
	   
          $query=insert_update_delete("DELETE FROM OFFICE WHERE OFFICE_NAME ='".$_POST['primarykey']."' ");
          $_SESSION['operation']="delete";
         //  $_SESSION['message']="Delete Successfully";
   }
    header('Location:../../../../office.php');

 ?>