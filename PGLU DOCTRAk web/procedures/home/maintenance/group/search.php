<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../../index.php');
}

    require_once("../../../connection.php");
  
    $query=select_info_multiple_key("select SECURITY_GROUPNAME,SECURITY_NAME from security_group WHERE SECURITY_GROUPNAME LIKE '%".$_POST['search_string']."%' OR SECURITY_NAME LIKE '%".$_POST['search_string']."%' ORDER BY SECURITY_NAME");
 


 if ($query) {
	 
$rowcolor="blue";
									echo "<tr class='usercolortest'>
                                	<th>Group</th>
                                    <th>Description</th>
                                	</tr>";

foreach($query as $var) {
    if ($rowcolor == "blue") {
      echo '<tr id="search_blue" class="usercolor" onClick="clickSearch(\''.$var["SECURITY_GROUPNAME"].'\',\''.$var["SECURITY_NAME"].'\')">';

        $rowcolor="notblue";
    }
    else
    {
      echo '<tr id="search_notblue" class="usercolor1" onClick="clickSearch(\''.$var["SECURITY_GROUPNAME"].'\',\''.$var["SECURITY_NAME"].'\')">';
        
        $rowcolor="blue";
    }
            echo "<td style='width:80px;'>";
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
  
 }
 else {
	 
	 echo "<span style='font:11px trebuchet ms;'>Nothing found.</span>";
	 
	 }
    

?>