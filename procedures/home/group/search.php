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
    $query=select_info_multiple_key("select SECURITY_GROUPNAME,SECURITY_NAME from SECURITY_GROUP WHERE SECURITY_GROUPNAME LIKE '%".$_POST['search_string']."%' OR SECURITY_NAME LIKE '%".$_POST['search_string']."%' ORDER BY SECURITY_NAME");
	echo $_POST['search_string'];
    echo "<tr>";
   	echo "<td>Group</td>";
	echo "<td>Description</td>";
	echo "</tr>";
$rowcolor="blue";
foreach($query as $var) {
    if ($rowcolor=="blue") {
        echo "<tr id='search_blue'> <td>";
        $rowcolor="notblue";
    }
    else
    {
        echo "<tr id='search_notblue'> <td>";
        $rowcolor="blue";
    }
         // print "<tr class=\"d".($i & 1)."\">";
             echo $var['SECURITY_GROUPNAME'];
             ECHO "</td><td>";
            
            echo $var['SECURITY_NAME'];
            echo "</td>";
             echo"</tr>";
        // echo "test";
        }
//echo "<tr> <td>";
//echo "asdasd";
    //   echo "</tr> </td>"; 
  
    
    

?>