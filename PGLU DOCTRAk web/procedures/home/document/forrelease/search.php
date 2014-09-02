<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../../index.php');
}

    require_once("../../../connection.php");

    $query=select_info_multiple_key("select DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,DOCUMENT_FILENAME,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,fk_security_username,transdate from DOCUMENTLIST join SECURITY_USER on DOCUMENTLIST.fk_security_username = SECURITY_USER.security_username  WHERE (DOCUMENT_TITLE LIKE '%".$_POST['search_string']."%' OR DOCUMENT_ID LIKE '%".$_POST['search_string']."%')  ORDER BY transdate desc");

    

     if ($query) {

     $rowcolor="blue";
	 								echo "<tr class='usercolortest'>
                                	<th>Barcode</th>
                                    <th>Title</th>
                                	<th>Date</th>
                                	</tr>";
	 
     include_once("../common/SearchFilter.php");

     foreach($query as $var) {
         if (SortOrder($var["DOCUMENT_ID"],'forrelease')) {

         if ($rowcolor=="blue")
         {
             echo '<tr id="'.$var["DOCUMENT_ID"].'" class="usercolor" onClick="clickSearch(\''.$var["DOCUMENT_ID"].'\',\''.$var["DOCUMENT_TITLE"].'\',\''.$var["FK_DOCUMENTTYPE_ID"].'\',\''.$var["FK_TEMPLATE_ID"].'\',\''.$var["DOCUMENT_FILENAME"].'\')">';
             $rowcolor="notblue";
         }
         else
         {
             echo '<tr id="'.$var["DOCUMENT_ID"].'" class="usercolor1" onClick="clickSearch(\''.$var["DOCUMENT_ID"].'\',\''.$var["DOCUMENT_TITLE"].'\',\''.$var["FK_DOCUMENTTYPE_ID"].'\',\''.$var["FK_TEMPLATE_ID"].'\',\''.$var["DOCUMENT_FILENAME"].'\')">';
             $rowcolor="blue";
         }


	echo "<td style='width:80px;'>";
	 echo $var["DOCUMENT_ID"];
     // echo $_SESSION['keytracker'];
	 echo "</td><td>";
     echo $var["DOCUMENT_TITLE"];
     echo "</td><td>";
     echo $var["transdate"];

     echo "</td>";
     echo"</tr>";

         }

        }
  }
    else {
        echo "<span style='font:11px trebuchet ms;'>Nothing found.</span>";

    }

?>