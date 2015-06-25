<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
    $_SESSION['in'] ="start";
    header('Location:../../../../index.php');
}

    require_once("../../../connection.php");
   
    $query=select_info_multiple_key("select OFFICE_NAME,OFFICE_DESCRIPTION from office WHERE OFFICE_NAME LIKE '%".$_POST['search_string']."%' OR OFFICE_DESCRIPTION LIKE '%".$_POST['search_string']."%' ORDER BY OFFICE_NAME");
	
	 
if ($query) {
	
$rowcolor="blue";
									echo "<tr class='usercolortest'>
                                	<th>Office</th>
                                    <th>Description</th>
                                	</tr>";

foreach($query as $var) {
        if ($rowcolor=="blue") {
            echo '<tr id="search_blue" class="usercolor" onClick="clickSearch(\''.$var["OFFICE_NAME"].'\',\''.$var["OFFICE_DESCRIPTION"].'\')">';
            echo "<td style='width:80px;'>";
            $rowcolor="notblue";
        }
    else
    {
        echo '<tr id="search_notblue" class="usercolor1" onClick="clickSearch(\''.$var["OFFICE_NAME"].'\',\''.$var["OFFICE_DESCRIPTION"].'\')">';

        echo "<td style='width:150px;'>";
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

}

	else {
	echo "<span style='font:11px trebuchet ms;'>Nothing found.</span>";
	}
?>