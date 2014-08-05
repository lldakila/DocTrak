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
       if ($_POST['primarykey'] == "") {
        $query=insert_update_delete("INSERT INTO DOCUMENT_TEMPLATE(TEMPLATE_ID,TEMPLATE_DESCRIPTION) VALUES ('".$_POST['template_name']."','".$_POST['template_description']."')");
        $_SESSION['operation']="save";

        $counterX=1;
        $pieces = explode("|",$_POST['OfficeArray']);


       foreach($pieces as $OfficeList) {
           $query="INSERT INTO TEMPLATE_LIST(FK_TEMPLATE_ID,FK_OFFICE_NAME,SORT) VALUES ('".$_POST['template_name']."','$OfficeList',$counterX)";
           echo $query;
           echo "<br>";
           print_r($pieces);
           ECHO $OfficeList;
           ECHO $_POST['template_name'];
           ECHO $counterX;
           $query=insert_update_delete("INSERT INTO TEMPLATE_LIST(FK_TEMPLATE_ID,FK_OFFICE_NAME,SORT) VALUES ('".$_POST['template_name']."','$OfficeList',$counterX)");
            $counterX++;
       }
   }
       else {
               $con=mysqli_connect("localhost","root","passw0rd","doctrak");
               if (mysqli_connect_error()) {
                   echo "Failed to connect to MySQL: " . mysqli_connect_error();
                 }
               mysqli_autocommit($con,FALSE);
               $flag=true;
               $query="DELETE FROM TEMPLATE_LIST WHERE FK_TEMPLATE_ID = '".$_POST['primarykey']."'";
               $RESULT=mysqli_query($con,$query);
               if (!$RESULT) {
                       $flag=false;
                       echo mysqli_error($con);
                       echo "<br>";
               }

           $counterX=1;
           $pieces = explode("|",$_POST['OfficeArray']);


           foreach($pieces as $OfficeList) {
               $query="INSERT INTO TEMPLATE_LIST(FK_TEMPLATE_ID,FK_OFFICE_NAME,SORT) VALUES ('".$_POST['template_name']."','$OfficeList',$counterX)";
               $counterX++;
               $RESULT=mysqli_query($con,$query);

               if (!$RESULT) {
                   $flag=false;
                   echo mysqli_error($con);
                   echo "<br>";
               }
           }

           $query="UPDATE DOCUMENT_TEMPLATE SET TEMPLATE_ID='".$_POST['template_name']."',TEMPLATE_DESCRIPTION='".$_POST['template_description']."' WHERE TEMPLATE_ID = '".$_POST['primarykey']."' ";
           $RESULT=mysqli_query($con,$query);
           if (!$RESULT) {
               $flag=false;
               echo mysqli_error($con);
               echo "<br>";
           }

           if ($flag) {
               mysqli_commit($con);
               $_SESSION['operation']="update";
           }
           else {
               mysqli_rollback($con);
               $_SESSION['operation']="error";
           }
            mysqli_close($con);
       }
   }

   elseif ($_POST['template_mode']=="delete") {
          $query=insert_update_delete("DELETE FROM DOCUMENT_TEMPLATE WHERE TEMPLATE_ID ='".$_POST['template_name']."' ");
          $_SESSION['operation']="delete";
         //  $_SESSION['message']="Delete Successfully";
   }
    header('Location:../../../flowtemplate.php');


 ?>