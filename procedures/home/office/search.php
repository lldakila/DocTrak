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
    $query=select_info_multiple_key("select OFFICE_NAME,OFFICE_DESCRIPTION from OFFICE WHERE OFFICE_NAME LIKE '%".$_POST['search_string']."%' OR OFFICE_DESCRIPTION LIKE '%".$_POST['search_string']."%' ORDER BY OFFICE_NAME");
    echo $_POST['search_string'];
    echo "<tr>";
    echo "<td>Office</td>";
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
        echo $var['OFFICE_NAME'];
        ECHO "</td><td>";

        echo $var['OFFICE_DESCRIPTION'];
        echo "</td>";
        echo"</tr>";

        // echo "test";
}
?>