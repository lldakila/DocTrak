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
    $query="select SECURITY_GROUPNAME,SECURITY_NAME from security_group WHERE SECURITY_GROUPNAME LIKE '%".$_POST['search_string']."%' OR SECURITY_NAME LIKE '%".$_POST['search_string']."%' ORDER BY SECURITY_NAME";
 	
	 	$result=mysqli_query($con,$query)or die(mysqli_error($con));
			$resultArray=array();
			 while ($var = mysqli_fetch_assoc($result))
			 	{
			 			array_push($resultArray, array("group"=>$var["SECURITY_GROUPNAME"],"description"=>$var["SECURITY_NAME"]));
		
//
// if ($query) {
//	 
//$rowcolor="blue";
//	echo "<tr class='usercolortest'>
//	    <th class='sizeGROUP'>GROUP</th>
//	    <th>DESCRIPTION</th>
//	</tr>";
//
//foreach($query as $var) {
//    if ($rowcolor == "blue") {
//      echo '<tr id="search_blue" class="usercolor" onClick="clickSearch(\''.$var["SECURITY_GROUPNAME"].'\',\''.$var["SECURITY_NAME"].'\')">';
//
//        $rowcolor="notblue";
//    }
//    else
//    {
//      echo '<tr id="search_notblue" class="usercolor1" onClick="clickSearch(\''.$var["SECURITY_GROUPNAME"].'\',\''.$var["SECURITY_NAME"].'\')">';
//        
//        $rowcolor="blue";
//    }
//            echo "<td style='width:150px;'>";
//         // print "<tr class=\"d".($i & 1)."\">";
//             echo $var['SECURITY_GROUPNAME'];
//             ECHO "</td><td>";
//            
//            echo $var['SECURITY_NAME'];
//            echo "</td>";
//             echo"</tr>";
        // echo "test";
//        }
//echo "<tr> <td>";
//echo "asdasd";
    //   echo "</tr> </td>"; 
  
// }
// else {
//	 
//	 echo "<span style='font:11px trebuchet ms;'>Nothing found.</span>";
//	 
//	 }

}
			echo json_encode($resultArray);
    

?>