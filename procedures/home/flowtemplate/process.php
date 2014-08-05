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

   if ($_POST['template_mode']=="save") {
        $query=insert_update_delete("INSERT INTO DOCUMENT_TEMPLATE(TEMPLATE_ID,TEMPLATE_DESCRIPTION) VALUES ('".$_POST['template_name']."','".$_POST['template_description']."')");
        $_SESSION['operation']="save";

        $counterX=1;
       $pieces = explode("|",$_POST['OfficeArray']);

       foreach($pieces as $OfficeList) {
           print_r($pieces);
           ECHO $OfficeList;
           ECHO $_POST['template_name'];
           ECHO $counterX;
           $query=insert_update_delete("INSERT INTO TEMPLATE_LIST(FK_TEMPLATE_ID,FK_OFFICE_NAME,SORT) VALUES ('".$_POST['template_name']."','.$OfficeList.','.$counterX.')");
            $counterX++;
       }
   }

   elseif ($_POST['template_mode']=="delete") {
          $query=insert_update_delete("DELETE FROM DOCUMENT_TEMPLATE WHERE TEMPLATE_ID ='".$_POST['template_name']."' ");
          $_SESSION['operation']="delete";
         //  $_SESSION['message']="Delete Successfully";
   }
    header('Location:../../../flowtemplate.php');


 ?>