<?php
   if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
        $_SESSION['in'] ="start";
        header('Location:../../../../index.php');
    }


    require_once("../../../connection.php");
		include_once("../common/SearchFilter.php");
		$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);

		$query="select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name from documentlist join security_user on documentlist.fk_security_username = security_user.security_username WHERE (document_id LIKE '%".$_POST['search_string']."%' OR document_title LIKE '%".$_POST['search_string']."%' OR security_name LIKE '%".$_POST['search_string']."%') AND scrap=0 AND complete=0    ORDER BY transdate desc";

		$result=mysqli_query($con,$query)or die(mysqli_error($con));
		$resultArray=array();
		 while ($var = mysqli_fetch_assoc($result))
		 {
    
    //echo "select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name from documentlist join security_user on documentlist.fk_security_username = security_user.security_username WHERE document_id LIKE '%".$_POST['search_string']."%' OR document_title LIKE '%".$_POST['search_string']."%' OR security_name LIKE '%".$_POST['search_string']."%'    ORDER BY transdate desc";
//if ($query){
//	
//    $rowcolor="blue";
//    echo "<tr class='usercolortest'>
//	<th class='sizeBARCODE2'>BARCODE</th>
//	<th class='sizeTITLE2'>TITLE</th>
//	<th class='sizeOWNER2'>OWNER</th>
//	<th>DATE</th>
//    </tr>";
//
//    
//$rowcolor="blue";
//    foreach($query as $var) {
        if (SortOrder($var["document_id"],'processing')) 
        {
       //     echo 111111;
//    if ($rowcolor=="blue")
//    {
//        echo '<tr id="'.$var["document_id"].'" class="usercolor" onClick="clickRetrieve(\''.$var["document_id"].'\')">';
//        // echo '<tr id="id" onclick="function(\'string\',\'string\')">';
//        $rowcolor="notblue";
//    }
//    else
//    {
//        echo '<tr id="'.$var["document_id"].'" class="usercolor1" onClick="clickRetrieve(\''.$var["document_id"].'\')">';
//        // echo "<tr  id='".$var["SECURITY_NAME"]."' bgcolor='#2CC1F7'> <td>";
//        $rowcolor="blue";
//    }
//
//
//
//    echo "<td>";
//    echo $var["document_id"];
//    echo "</td><td>";
//    echo $var["document_title"];
//    echo "</td><td>";
//    echo $var["security_name"];
//    echo "</td><td>";
//    echo $var["transdate"];
//    echo "</td>";
//    echo "</tr>";
array_push($resultArray, array("barcode"=>$var["document_id"],"title"=>$var["document_title"],"owner"=>$var["security_name"],"date"=>$var["transdate"]));
    	}
//} }
//else{
//    echo "<span style='font:11px trebuchet ms;'>Nothing found.</span>";
//}
			}
			echo json_encode($resultArray);
?>

