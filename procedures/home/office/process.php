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
   if ($_POST['office_mode']=="save") {
        $query=insert_update_delete("INSERT INTO OFFICE(OFFICE_NAME,OFFICE_DESCRIPTION) VALUES ('".$_POST['office_name']."','".$_POST['office_description']."')");
        $_SESSION['operation']="save";
       //  $_SESSION['message']="Save Successfully";
   }

   elseif ($_POST['office_mode']=="delete") {
          $query=insert_update_delete("DELETE FROM OFFICE WHERE OFFICE_NAME ='".$_POST['office_name']."' ");
          $_SESSION['operation']="delete";
         //  $_SESSION['message']="Delete Successfully";
   }
    header('Location:../../../office.php');

 ?>