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
    $query=select_info_multiple_key("select DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,DOCUMENT_FILE,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,fk_security_username from DOCUMENT WHERE DOCUMENT_TITLE LIKE '%".$_POST['search_string']."%' OR DOCUMENT_ID LIKE '%".$_POST['search_string']."%' ORDER BY DOCUMENT_ID");
	echo $_POST['search_string'];
    echo "<table>";
	echo "<tr class='bgcolor'>";
   	echo "<th>Title</th>";
	echo "<th>Description</th>";
	echo "</tr>";
	echo "</table>";
$rowcolor="blue";
 foreach($query as $var) {

     if ($rowcolor=="blue")
     {
         echo '<tr id="'.$var["DOCUMENT_ID"].'" class="usercolor" onClick="clickSearch(\''.$var["DOCUMENT_ID"].'\',\''.$var["DOCUMENT_TITLE"].'\',\''.$var["DOCUMENT_DESCRIPTION"].'\',\''.$var["DOCUMENT_FILE"].'\',\''.$var["FK_TEMPLATE_ID"].'\',\''.$var["FK_DOCUMENTTYPE_ID"].'\',\''.$var["fk_security_username"].'\')">';
        // echo '<tr id="id" onclick="function(\'string\',\'string\')">';
         $rowcolor="notblue";
     }
     else
     {
         echo '<tr id="'.$var["DOCUMENT_ID"].'" class="usercolor1" onClick="clickSearch(\''.$var["DOCUMENT_ID"].'\',\''.$var["DOCUMENT_TITLE"].'\',\''.$var["DOCUMENT_DESCRIPTION"].'\',\''.$var["DOCUMENT_FILE"].'\',\''.$var["FK_TEMPLATE_ID"].'\',\''.$var["FK_DOCUMENTTYPE_ID"].'\',\''.$var["fk_security_username"].'\')">';
        // echo "<tr  id='".$var["SECURITY_NAME"]."' bgcolor='#2CC1F7'> <td>";
         $rowcolor="blue";
     }
     // print "<tr class=\"d".($i & 1)."\">";
   //  echo "<a onClick=clickSearch(".$var["SECURITY_USERNAME"].")>".$var["SECURITY_USERNAME"]."</a>";
    
	
	
	echo "<td style='width:80px;'>";
	 echo $var["DOCUMENT_ID"];
	 echo "</td><td>";
     echo $var["DOCUMENT_TITLE"];
     echo "</td>";
     echo"</tr>";




  //   echo"
  //   <tr>
  //     <td><input type='image' value='".$var["SECURITY_USERNAME"]."' onclick='searchuser(this.value);' /></td>
  //     <td>".$var["SECURITY_NAME"]."</td>
  //   </tr>
  //   ";

        }
//echo "<tr> <td>";
//echo "asdasd";
    //   echo "</tr> </td>";


?>