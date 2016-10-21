<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../../index.php');
}

    require_once("../../../connection.php");
		$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    $query="select SECURITY_USERNAME,SECURITY_NAME,fk_Security_GroupName,fk_Office_Name from security_user WHERE SECURITY_NAME LIKE '%".$_POST['search_string']."%' OR SECURITY_USERNAME LIKE '%".$_POST['search_string']."%'  or fk_Office_Name like '%".$_POST['search_string']."%'  ORDER BY SECURITY_USERNAME";
    
    $result=mysqli_query($con,$query)or die(mysqli_error($con));
		$resultArray=array();
		 while ($var = mysqli_fetch_assoc($result))
		 	{
		 			array_push($resultArray, array("username"=>$var["SECURITY_USERNAME"],"name"=>$var["SECURITY_NAME"],"group"=>$var["fk_Security_GroupName"],"office"=>$var["fk_Office_Name"]));
		 	

//if ($query) {
//
//$rowcolor="blue";
//	echo "<tr class='usercolortest'>
//	    <th class='sizeUSERname'>USERNAME</th>
//	    <th>NAME</th>
//        </tr>";

// foreach($query as $var) {
//
//     if ($rowcolor=="blue")
//     {
//         echo '<tr id="'.$var["SECURITY_USERNAME"].'" class="usercolor" onClick="clickSearch(\''.$var["SECURITY_USERNAME"].'\',\''.$var["SECURITY_NAME"].'\',\''.$var["fk_Security_GroupName"].'\',\''.$var["fk_Office_Name"].'\')">';
//        // echo '<tr id="id" onclick="function(\'string\',\'string\')">';
//         $rowcolor="notblue";
//     }
//     else
//     {
//         echo '<tr id="'.$var["SECURITY_USERNAME"].'" class="usercolor1" onClick="clickSearch(\''.$var["SECURITY_USERNAME"].'\',\''.$var["SECURITY_NAME"].'\',\''.$var["fk_Security_GroupName"].'\',\''.$var["fk_Office_Name"].'\')">';
//        // echo "<tr  id='".$var["SECURITY_NAME"]."' bgcolor='#2CC1F7'> <td>";
//         $rowcolor="blue";
//     }
     // print "<tr class=\"d".($i & 1)."\">";
   //  echo "<a onClick=clickSearch(".$var["SECURITY_USERNAME"].")>".$var["SECURITY_USERNAME"]."</a>";
    
	
	
//	echo "<td style='width:150px;'>";
//	 echo $var["SECURITY_USERNAME"];
//	 echo "</td><td>";
//     echo $var["SECURITY_NAME"];
//     echo "</td>";
//     echo"</tr>";




  //   echo"
  //   <tr>
  //     <td><input type='image' value='".$var["SECURITY_USERNAME"]."' onclick='searchuser(this.value);' /></td>
  //     <td>".$var["SECURITY_NAME"]."</td>
  //   </tr>
  //   ";

//        }
////echo "<tr> <td>";
////echo "asdasd";
//    //   echo "</tr> </td>"; 
//}
//		else {
//			echo "<span style='font:11px trebuchet ms;'>Nothing found.</span>";
//		}
			}
			echo json_encode($resultArray);
?>