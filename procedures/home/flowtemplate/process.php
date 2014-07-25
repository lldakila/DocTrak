<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../index.php');
}
//include db configuration file
//include_once("sql_statements.php");

//if(isset($_POST["office"]) && strlen($_POST["office"])>0)
//{	//check $_POST["content_txt"] is not empty
    
	//sanitize post value, PHP filter FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH Strip tags, encode special characters.
	$contentToSave1 = filter_var($_POST["office"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);


		 //Record was successfully inserted, respond result back to index page
	//	  $my_id = $mysqli->insert_id; //Get ID of last inserted row from MySQL
     
    //      $_SESSION['number_counter']++;
   //       if ($_SESSION['number_counter'] % 2 ==0) {
  //           echo "<tr style='background-color:#0ca3d2;'> <td colspan=2 class='close'> ".$_SESSION['number_counter'].     " </td><td style='width:300px;'> ".$contentToSave1."</td></tr> ";
   //       }
  //        ELSE {
  //             echo "<tr style='background-color:#3fd1ff;'> <td colspan=2> ".$_SESSION['number_counter']." </td><td style='width:300px;'> ".$contentToSave1."</td></tr> ";
  //        }

     //           if ($_SESSION['number_counter'] % 2 ==0) {
    //        echo "<li id= ".$contentToSave1."> ";
    //        echo '<div class="del_wrapper"><a href="#" type="image" class="del_button" onClick= id="del-'.$row["id"].'">';
     //       echo '<img src="images/home/icon/icon_del.gif" border="0" />';
      //      echo '</a></div>';
      //      echo " ".$contentToSave1." </li>";
   //       }
      //    ELSE {
               echo "<li name= ".$contentToSave1.">";
               echo '<div class="del_wrapper"> <a href="#" type="image" class="del_button">';
          echo '<img src="images/home/icon/icon_del.gif" border="0" />';
          echo "</a> </div>";
                echo " ".$contentToSave1." </li>";
     //     }



		//  $mysqli->close(); //close db connection

//}
//else
//{
	//Output error
//	header('HTTP/1.1 500 Error occurred, Could not process request!');
 //   exit();
//}
?>