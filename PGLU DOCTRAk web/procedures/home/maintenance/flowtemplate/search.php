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
    $query=select_info_multiple_key("select  distinct TEMPLATE_ID,TEMPLATE_DESCRIPTION from DOCUMENT_TEMPLATE join TEMPLATE_LIST on DOCUMENT_TEMPLATE.TEMPLATE_ID = TEMPLATE_LIST.FK_TEMPLATE_ID join OFFICE on TEMPLATE_LIST.FK_OFFICE_NAME = OFFICE.OFFICE_NAME where TEMPLATE_ID LIKE '%".$_POST['search_string']."%' OR TEMPLATE_DESCRIPTION LIKE '%".$_POST['search_string']."%' ORDER BY TEMPLATE_ID");
   


if ($query){

$rowcolor="blue";
foreach($query as $var) {
    if ($rowcolor == "blue") {
         echo '<tr id="'.$var["TEMPLATE_ID"].'" class="usercolor" onClick="clickSearch(\''.$var["TEMPLATE_ID"].'\',\''.$var["TEMPLATE_DESCRIPTION"].'\')">';
        $rowcolor="notblue";
    }
    else
    {
       echo '<tr id="'.$var["TEMPLATE_ID"].'" class="usercolor1" onClick="clickSearch(\''.$var["TEMPLATE_ID"].'\',\''.$var["TEMPLATE_DESCRIPTION"].'\')">';
        $rowcolor="blue";
    }
            echo "<td style='width:80px;'>";
         // print "<tr class=\"d".($i & 1)."\">";
             echo $var['TEMPLATE_ID'];
             ECHO "</td><td>";

            echo $var['TEMPLATE_DESCRIPTION'];
            echo "</td>";
             echo"</tr>";
        // echo "test";
        }

//echo "<tr> <td>";
//echo "asdasd";
    //   echo "</tr> </td>";
        }
        else{
          echo "<span style='font:11px trebuchet ms;'>Nothing found.</span>";
        }



?>