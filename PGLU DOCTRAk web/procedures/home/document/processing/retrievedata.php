<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
        $_SESSION['in'] ="start";
        header('Location:../../../../index.php');
}

    require_once("../../../connection.php");
    require_once("../common/encrypt.php");
  
    $query=select_info_multiple_key("select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name, sortorder,office_name,received_by,received_date,received_comment,released_by,released_date,released_comment,fk_office_name,document_filename, forrelease_val,forrelease_date,fk_office_name_documentlist,document_mime from documentlist join documentlist_tracker on documentlist.document_id = documentlist_tracker.fk_documentlist_id join security_user on documentlist.fk_security_username = security_user.security_username where document_id = '".$_POST['documentTracker']."' ");

    echo "<div id='details'>";
    echo "<table>";
	echo "<tr><td>";
    echo "Barcode:"; echo"&nbsp;<b>".$query[0]['document_id'].'</b>';
 	echo "</td><td>"; 
	echo "Title:"; echo"&nbsp;<b>".$query[0]['document_title'].'</b>';
	echo "</td><td>";
    echo "Template:"; echo"&nbsp;<b>".$query[0]['fk_template_id'].'</b>';
	echo "</td><td>";
    echo "Type:"; echo"&nbsp;<b>".$query[0]['fk_documenttype_id'].'</b>';
	echo "</td></tr><tr><td>";
    echo "Input Date:"; echo"&nbsp;<b>".$query[0]['transdate'].'</b>';
	echo "</td><td>";
    echo "Owner:"; echo"&nbsp;<b>".$query[0]['security_name'].'</b>';
	echo "</td><td>";
    echo "Office:"; echo"&nbsp;<b>".$query[0]['fk_office_name'].'</b>';
    echo "</td><td>";
    echo "Attachment:"; //echo"&nbsp;<b>".$query[0]['document_filename'].'</b>'; document_filename
    if ($query[0]['document_mime']!=""){
        $encrypted=urlencode(base64_encode(encryptText($query[0]['document_id'])));
        //echo "<a href='/procedures/home/document/tracker/previewfile.php?download_file=".$query[0]['document_filename']."' >Download</a>";
       // $xx=base64_encode(encryptText($query[0]['document_filename']));
         echo "<a target='_blank' href='/procedures/home/document/common/previewfile.php?download_file=".$encrypted."'>Download</a>";
       // echo $query[0]['document_filename']."<br>";
       // echo base64_encode(encryptText($query[0]['document_filename']));

    }
    else {
        echo "<a href='#'> No Attachment</a>";
    }


	echo "</table>";
    echo "</td></tr>";
    echo "</div>";

    echo "<table id='historydata'>";
    echo "<tr class='bgcolor'>";
    echo "<th>No</th>";
    echo "<th>Office</th>";
    echo "<th>Received By</th>";
    echo "<th>Received Date</th>";
    echo "<th>Received Comment</th>";
    echo "<th>For Release</th>";
    echo "<th>For Release Date</th>";


    echo "<th>Released By</th>";
    echo "<th>Released Date</th>";
    echo "<th>Released Comment</th>";
    echo "</tr>";
    $rowcolor="blue";
  //  echo "</table>";
    if ($query) {
		//echo "<table id='historydata'>";
    foreach($query as $var) {

        if ($rowcolor=="blue")
        {
            echo '<tr id="'.$var["sortorder"].'" class="usercolor">';
            // echo '<tr id="id" onclick="function(\'string\',\'string\')">';
            $rowcolor="notblue";
        }
        else
        {
            echo '<tr id="'.$var["sortorder"].'" class="usercolor1">';
            // echo "<tr  id='".$var["SECURITY_NAME"]."' bgcolor='#2CC1F7'> <td>";
            $rowcolor="blue";
        }
    echo "<td>" .$var['sortorder']. "</td>";
        echo "<td>" .$var['office_name']. "</td>";
        echo "<td>" .$var['received_by']. "</td>";
        echo "<td>" .$var['received_date']. "</td>";
        echo "<td>" .$var['received_comment']. "</td>";

        if ($var['forrelease_val']==1) {
            echo "<td> ready </td>";
        }
        else {
            echo "<td></td>";
        }

        echo "<td>" .$var['forrelease_date']. "</td>";


        echo "<td>" .$var['released_by']. "</td>";
        echo "<td>" .$var['released_date']. "</td>";
        echo "<td>" .$var['released_comment']. "</td>";
    echo "</tr>";
    }
	 echo "</table>";
	}



?>


