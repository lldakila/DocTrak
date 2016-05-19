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
    if($_SESSION['GROUP']=='ADMIN' or $_SESSION['GROUP']=='POWER ADMIN')
    {
       $query="select DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,DOCUMENT_FILE,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,fk_security_username,transdate,scrap from documentlist join security_user on documentlist.fk_security_username = security_user.security_username  WHERE (DOCUMENT_TITLE LIKE '%".$_POST['search_string']."%' OR DOCUMENT_ID LIKE '%".$_POST['search_string']."%') AND scrap=0  ORDER BY transdate desc";  
    }
    else
    {
        $query="select DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,DOCUMENT_FILE,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,fk_security_username,transdate,scrap from documentlist join security_user on documentlist.fk_security_username = security_user.security_username  WHERE (DOCUMENT_TITLE LIKE '%".$_POST['search_string']."%' OR DOCUMENT_ID LIKE '%".$_POST['search_string']."%') and (fk_office_name_documentlist ='".$_SESSION['OFFICE']."' AND scrap=0 )ORDER BY transdate desc"; 
    }
   
		$result=mysqli_query($con,$query)or die(mysqli_error($con));
		$resultArray=array();
		 while ($row = mysqli_fetch_assoc($result))
		 {
		 	array_push($resultArray, array("barcode"=>$row["DOCUMENT_ID"],"title"=>$row["DOCUMENT_TITLE"],"date"=>$row["transdate"],"description"=>$row["DOCUMENT_DESCRIPTION"],"template"=>$row["FK_TEMPLATE_ID"]
		 							,"type"=>$row["FK_DOCUMENTTYPE_ID"],"scrap"=>$row["scrap"]));
		 	
		 }
		echo json_encode($resultArray);

//if ($query) {

//$rowcolor="blue";
//    echo "<tr class='usercolortest'>
//    <th class='sizeBARCODE'>BARCODE</th>
//    <th class='sizeTITLE'>TITLE</th>
//    <th>DATE</th>
//    </tr>";

// foreach($query as $var) {

//     if ($rowcolor=="blue")
//     {
//        // echo '<tr id="'.$var["DOCUMENT_ID"].'" class="usercolor" onClick="clickSearch(\''.$var["DOCUMENT_ID"].'\',\''.$var["DOCUMENT_TITLE"].'\',\''.$var["DOCUMENT_DESCRIPTION"].'\',\''.$var["DOCUMENT_FILE"].'\',\''.$var["FK_TEMPLATE_ID"].'\',\''.$var["FK_DOCUMENTTYPE_ID"].'\',\''.$var["scrap"].'\')">';
//        // echo '<tr id="id" onclick="function(\'string\',\'string\')">';
//         echo '<tr id="'.$var["DOCUMENT_ID"].'" class="usercolor" onClick="clickSearch(\''.$var["DOCUMENT_ID"].'\',\''.$var["DOCUMENT_TITLE"].'\',\''.$var["DOCUMENT_DESCRIPTION"].'\',\''.$var["FK_TEMPLATE_ID"].'\',\''.$var["FK_DOCUMENTTYPE_ID"].'\',\''.$var["scrap"].'\')">';
//         $rowcolor="notblue";
//     }
//     else
//     {
//         echo '<tr id="'.$var["DOCUMENT_ID"].'" class="usercolor1" onClick="clickSearch(\''.$var["DOCUMENT_ID"].'\',\''.$var["DOCUMENT_TITLE"].'\',\''.$var["DOCUMENT_DESCRIPTION"].'\',\''.$var["FK_TEMPLATE_ID"].'\',\''.$var["FK_DOCUMENTTYPE_ID"].'\',\''.$var["scrap"].'\')">';
//        // echo "<tr  id='".$var["SECURITY_NAME"]."' bgcolor='#2CC1F7'> <td>";
//         $rowcolor="blue";
//     }
     // print "<tr class=\"d".($i & 1)."\">";
   //  echo "<a onClick=clickSearch(".$var["SECURITY_USERNAME"].")>".$var["SECURITY_USERNAME"]."</a>";
    
	
//	
//	echo "<td>";
//	 echo $var["DOCUMENT_ID"];
//	 echo "</td><td>";
//     echo $var["DOCUMENT_TITLE"];
//     echo "</td><td>";
//     echo $var["transdate"];
//
//     echo "</td>";
//     echo"</tr>";

// }



  //   echo"
  //   <tr>
  //     <td><input type='image' value='".$var["SECURITY_USERNAME"]."' onclick='searchuser(this.value);' /></td>
  //     <td>".$var["SECURITY_NAME"]."</td>
  //   </tr>
  //   ";

//        }
//else{
//    echo "<span style='font:11px trebuchet ms;'>Nothing found.</span>";
//}
//echo "<tr> <td>";
//echo "asdasd";
    //   echo "</tr> </td>";


?>