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
    $query=select_info_multiple_key("select SECURITY_USERNAME,SECURITY_NAME,fkSecurity_GroupName from SECURITY_USER WHERE SECURITY_NAME LIKE '%".$_POST['search_string']."%' OR SECURITY_USERNAME LIKE '%".$_POST['search_string']."%' ORDER BY SECURITY_USERNAME");
	echo $_POST['search_string'];
    echo "<tr>";
   	echo "<td>Username</td>";
	echo "<td>Name</td>";
	echo "</tr>";
$rowcolor="blue";
 foreach($query as $var) {

     if ($rowcolor=="blue")
     {
         echo '<tr id="'.$var["SECURITY_USERNAME"].'" bgcolor="#ACE6FB" onClick="clickSearch(\''.$var["SECURITY_USERNAME"].'\',\''.$var["SECURITY_NAME"].'\',\''.$var["fkSecurity_GroupName"].'\')"> <td>';
        // echo '<tr id="id" onclick="function(\'string\',\'string\')">';
         $rowcolor="notblue";
     }
     else
     {
         echo '<tr id="'.$var["SECURITY_USERNAME"].'" bgcolor="#2CC1F7" onClick="clickSearch(\''.$var["SECURITY_USERNAME"].'\')"> <td>';
        // echo "<tr  id='".$var["SECURITY_NAME"]."' bgcolor='#2CC1F7'> <td>";
         $rowcolor="blue";
     }
     // print "<tr class=\"d".($i & 1)."\">";
   //  echo "<a onClick=clickSearch(".$var["SECURITY_USERNAME"].")>".$var["SECURITY_USERNAME"]."</a>";
     echo $var["SECURITY_USERNAME"];
     echo "</td><td>";

     echo $var["SECURITY_NAME"];
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