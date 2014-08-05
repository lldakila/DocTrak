<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../index.php');
}
?>




<?php
    require_once("../../connection.php");
    $query=select_info_multiple_key("select  fk_office_name from TEMPLATE_LIST where fk_template_id = '".$_POST['template_name']."' order by sort asc");
    if ($query){
    foreach($query as $var) {
         echo "<option>".$var['fk_office_name']."</option>";
        }
        }




?>