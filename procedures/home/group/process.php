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
   if ($_POST['group_mode']=="save") {
        $query=insert_update_delete("INSERT INTO SECURITY_GROUP(SECURITY_GROUPNAME,SECURITY_NAME) VALUES ('".$_POST['group']."','".$_POST['description']."')");
        $_SESSION['operation']="save";
       //  $_SESSION['message']="Save Successfully";
   }

   elseif ($_POST['group_mode']=="delete") {
          $query=insert_update_delete("DELETE FROM SECURITY_GROUP WHERE SECURITY_GROUPNAME ='".$_POST['group']."' ");
          $_SESSION['operation']="delete";
         //  $_SESSION['message']="Delete Successfully";
   }
    header('Location:../../../group.php');

 ?>