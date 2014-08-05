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
    $query=select_info_multiple_key("select DOCUMENTTYPE_ID,DESCRIPTION,priority,public from DOCUMENT_TYPE WHERE DESCRIPTION LIKE '%".$_POST['search_string']."%' OR DOCUMENTTYPE_ID LIKE '%".$_POST['search_string']."%' ORDER BY DOCUMENTTYPE_ID");
   //	echo $_POST['search_string'];
    echo "<table>";
	echo "<tr class='bgcolor'>";
   	echo "<th>TYPE</th>";
	echo "<th>DESCRIPTION</th>";
	echo "</tr>";
	echo "</table>";

$rowcolor="blue";
 foreach($query as $var) {

     if ($rowcolor=="blue")
     {
         echo '<tr  class="usercolor" onClick="clickSearch(\''.$var["DOCUMENTTYPE_ID"].'\',\''.$var["DESCRIPTION"].'\',\''.$var["priority"].'\',\''.$var["public"].'\')">';
         $rowcolor="notblue";
     }
     else
     {
         echo '<tr  class="usercolor1" onClick="clickSearch(\''.$var["DOCUMENTTYPE_ID"].'\',\''.$var["DESCRIPTION"].'\',\''.$var["priority"].'\',\''.$var["public"].'\')">';
         $rowcolor="blue";

     }

	
	
	echo "<td style='width:80px;'>";
	 echo $var["DOCUMENTTYPE_ID"];
	 echo "</td><td>";
     echo $var["DESCRIPTION"];
     echo "</td>";
     echo"</tr>";

 }
?>