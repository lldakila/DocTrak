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
     require_once("../common/encrypt.php");
     $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);

    $query="select DOCUMENT_ID, DOCUMENT_TITLE, DOCUMENT_DESCRIPTION, DOCUMENT_FILENAME, FK_TEMPLATE_ID, FK_DOCUMENTTYPE_ID, fk_security_username, transdate,template_name from documentlist join security_user on documentlist.fk_security_username = security_user.security_username  join document_template on documentlist.fk_template_id = document_template.template_id WHERE (DOCUMENT_TITLE LIKE '%".$_POST['search_string']."%' OR DOCUMENT_ID LIKE '%".$_POST['search_string']."%')AND scrap=0  ORDER BY transdate desc";

    $result=mysqli_query($con,$query)or die(mysqli_error($con));
		$resultArray=array();
		 while ($var = mysqli_fetch_assoc($result))
		 {

//     if ($query) {
//
//     $rowcolor="blue";
//    echo "<tr class='usercolortest'>
//	<th class='sizeBARCODE'>BARCODE</th>
//	<th class='sizeTITLE'>TITLE</th>
//	<th>DATE</th>
//    </tr>";
//	 
//     
//
//     foreach($query as $var) {
         if (SortOrder($var["DOCUMENT_ID"],'forrelease')) 
        {
//            $encrypt_trackerid=base64_encode(encryptText($_SESSION['keytracker']));
//            $encrypt_documentid=base64_encode(encryptText($var["DOCUMENT_ID"]));
//            $document_id=$var["DOCUMENT_ID"];
//            $document_title=$var["DOCUMENT_TITLE"];
//            $document_type=$var["FK_DOCUMENTTYPE_ID"];
//            $template=$var["FK_TEMPLATE_ID"];
//            
//         if ($rowcolor=="blue")
//         {
//             echo '<tr id="'.$encrypt_documentid.'" class="usercolor" onClick="clickSearch(\''.$var["DOCUMENT_ID"].'\',\''.$var["DOCUMENT_TITLE"].'\',\''.$var["FK_DOCUMENTTYPE_ID"].'\',\''.$var["template_name"].'\',\''.$encrypt_trackerid.'\',\''.$encrypt_documentid.'\')">';
//             $rowcolor="notblue";
//         }
//         else
//         {
//             echo '<tr id="'.$encrypt_documentid.'" class="usercolor1" onClick="clickSearch(\''.$var["DOCUMENT_ID"].'\',\''.$var["DOCUMENT_TITLE"].'\',\''.$var["FK_DOCUMENTTYPE_ID"].'\',\''.$var["template_name"].'\',\''.$encrypt_trackerid.'\',\''.$encrypt_documentid.'\')">';
//             $rowcolor="blue";
//         }
//
//
//	echo "<td>";
//	 echo $var["DOCUMENT_ID"];
//     // echo $_SESSION['keytracker'];
//	 echo "</td><td>";
//     echo $var["DOCUMENT_TITLE"];
//     echo "</td><td>";
//     echo $var["transdate"];
//
//     echo "</td>";
//     echo"</tr>";
array_push($resultArray, array("barcode"=>$var["DOCUMENT_ID"],"title"=>$var["DOCUMENT_TITLE"],"date"=>$var["transdate"],"description"=>$var["DOCUMENT_DESCRIPTION"],"template"=>$var["template_name"]
		 							,"type"=>$var["FK_DOCUMENTTYPE_ID"]));
         }

//        }
//  }
//    else {
//        echo "<span style='font:11px trebuchet ms;'>Nothing found.</span>";
//
//    }
  }
  echo json_encode($resultArray);

?>