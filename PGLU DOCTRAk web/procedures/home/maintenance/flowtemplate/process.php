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
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();

    }

    mysqli_autocommit($con,FALSE);
    $flag=true;



   if ($_POST['template_mode']=="save") {
       if ($_POST['primarykey'] == "") {
        $query="INSERT INTO DOCUMENT_TEMPLATE(TEMPLATE_ID,TEMPLATE_DESCRIPTION) VALUES ('".$_POST['template_name']."','".$_POST['template_description']."')";

           $RESULT=mysqli_query($con,$query);
        if (!$RESULT) {
               $flag=false;
               echo mysqli_error($con);
               echo "<br>";
        }


        $counterX=1;
        $pieces = explode("|",$_POST['OfficeArray']);

         //  mysqli_commit($con);
       foreach($pieces as $OfficeList) {
           $query="INSERT INTO TEMPLATE_LIST(FK_TEMPLATE_ID,FK_OFFICE_NAME,SORT) VALUES ('".$_POST['template_name']."','$OfficeList',$counterX)";
           echo $query;
           $RESULT=mysqli_query($con,$query);
           if (!$RESULT) {
               $flag=false;
               echo mysqli_error($con);
               echo "<br>";
           }
           //echo $query;
          // echo "<br>";
          // print_r($pieces);
          // ECHO $OfficeList;
           //ECHO $_POST['template_name'];
           //ECHO $counterX;
           //$query=insert_update_delete("INSERT INTO TEMPLATE_LIST(FK_TEMPLATE_ID,FK_OFFICE_NAME,SORT) VALUES ('".$_POST['template_name']."','$OfficeList',$counterX)");
            $counterX++;
       }
           $_SESSION['operation']="save";
   }

       else {



               $query="DELETE FROM TEMPLATE_LIST WHERE FK_TEMPLATE_ID = '".$_POST['primarykey']."'";
               $RESULT=mysqli_query($con,$query);
               if (!$RESULT) {
                       $flag=false;
                       echo mysqli_error($con);
                       echo "<br>";
               }

           $counterX=1;
           $pieces = explode("|",$_POST['OfficeArray']);

           $query="UPDATE DOCUMENT_TEMPLATE SET TEMPLATE_ID='".$_POST['template_name']."',TEMPLATE_DESCRIPTION='".$_POST['template_description']."' WHERE TEMPLATE_ID = '".$_POST['primarykey']."' ";
           $RESULT=mysqli_query($con,$query);
           if (!$RESULT) {
               $flag=false;
               echo mysqli_error($con);
               echo "<br>";
           }

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

           $_SESSION['operation']="update";


       }
   }

   elseif ($_POST['template_mode']=="delete") {
          $query="DELETE FROM DOCUMENT_TEMPLATE WHERE TEMPLATE_ID ='".$_POST['template_name']."' ";
       $RESULT=mysqli_query($con,$query);
       if (!$RESULT) {
           $flag=false;
           echo mysqli_error($con);
           echo "<br>";
       }
          $_SESSION['operation']="delete";
         //  $_SESSION['message']="Delete Successfully";
   }



    if ($flag) {
        mysqli_commit($con);

    }
    else {
        mysqli_rollback($con);
        $_SESSION['operation']="error";
    }
    mysqli_close($con);
    header('Location:../../../../flowtemplate.php');


 ?>