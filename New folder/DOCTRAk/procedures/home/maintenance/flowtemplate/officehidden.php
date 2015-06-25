<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
    $_SESSION['in'] ="start";
    header('Location:../../../../index.php');
}
?>


<?php
require_once("../../../connection.php");

$string1="";
$query=select_info_multiple_key("select  fk_office_name from template_list where fk_template_id = '".$_POST['template_id']."' order by sort asc");
if ($query){
    foreach($query as $var) {

        $stringholder = $var['fk_office_name']."|";
        $string1 = "$string1" . "$stringholder";
    }
    echo substr($string1,0,-1);
    //echo $string1;
}


//echo $stringholder;


?>