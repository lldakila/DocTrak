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
   if ($_POST['security_user']=="save") {
        $query=insert_update_delete("INSERT INTO SECURITY_USER(SECURITY_USERNAME,SECURITY_NAME,FKSECURITY_GROUPNAME,SECURITY_PASSWORD) VALUES ('".$_POST['username']."','".$_POST['name']."','".$_POST['group']."','".md5($_POST['password'])."')");
        $_SESSION['operation']="save";
         $_SESSION['message']="Save Successfully";
   }

   elseif ($_POST['security_user']=="delete") {
          $query=insert_update_delete("DELETE FROM SECURITY_USER WHERE SECURITY_USERNAME ='".($_POST['username'])."' ");
          $_SESSION['operation']="delete";
           $_SESSION['message']="Delete Successfully";
   }
    header('Location:../../../users.php');

 ?>