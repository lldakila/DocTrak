<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../../index.php');
}

    require_once("../../../connection.php");

    $query=select_info_multiple_key("select DOCUMENTTYPE_ID,DESCRIPTION,priority,public from document_type WHERE DESCRIPTION LIKE '%".$_POST['search_string']."%' OR DOCUMENTTYPE_ID LIKE '%".$_POST['search_string']."%' ORDER BY DOCUMENTTYPE_ID");
   


if ($query) {
	
$rowcolor="blue";
	echo "<tr class='usercolortest'>
	    <th class='sizeDOCNAME'>DOCUMENT NAME</th>
	    <th class='sizeDESCR'>DESCRIPTION</th>
        </tr>";

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

	
	
	echo "<td style='width:150px;'>";
	 echo $var["DOCUMENTTYPE_ID"];
	 echo "</td><td>";
     echo $var["DESCRIPTION"];
     echo "</td>";
     echo"</tr>";

 }
 
}

	else {
		echo "<span style='font:11px trebuchet ms;'>Nothing found.</span>";
	}
?>