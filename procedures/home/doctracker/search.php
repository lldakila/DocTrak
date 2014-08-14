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
    $query=select_info_multiple_key("select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name from documentlist join security_user on documentlist.fk_security_username = security_user.security_username WHERE document_id LIKE '%".$_POST['search_string']."%' OR document_title LIKE '%".$_POST['search_string']."%' OR security_name LIKE '%".$_POST['search_string']."%' ORDER BY DOCUMENT_ID");
    //echo $_POST['search_string'];
    echo "<table>";
    echo "<tr class='bgcolor'>";
    echo "<th>Barcode</th>";
    echo "<th>Title</th>";
    echo "<th>Owner</th>";
    echo "<th>Date</th>";
    echo "</tr>";
    echo "</table>";
    $rowcolor="blue";


    foreach($query as $var) {

    if ($rowcolor=="blue")
    {
        echo '<tr id="'.$var["document_id"].'" class="usercolor" onClick="clickRetrieve(\''.$var["document_id"].'\')">';
        // echo '<tr id="id" onclick="function(\'string\',\'string\')">';
        $rowcolor="notblue";
    }
    else
    {
        echo '<tr id="'.$var["document_id"].'" class="usercolor1" onClick="clickRetrieve(\''.$var["document_id"].'\')">';
        // echo "<tr  id='".$var["SECURITY_NAME"]."' bgcolor='#2CC1F7'> <td>";
        $rowcolor="blue";
    }



    echo "<td style='width:80px;'>";
    echo $var["document_id"];
    echo "</td><td>";
    echo $var["document_title"];
    echo "</td><td>";
    echo $var["security_name"];
    echo "</td><td>";
    echo $var["transdate"];
    echo "</td>";
    echo "</tr>";

    }

?>

