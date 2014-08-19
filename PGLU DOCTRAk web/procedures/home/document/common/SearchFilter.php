<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
    $_SESSION['in'] ="start";
    header('Location:../../../../index.php');
}
?>


<?php



    session_start();






    function SortOrder($document_id) {
        global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
        require_once("../../../connection.php");
       /* $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
        $query="SELECT FK_DOCUMENTLIST_ID FROM DOCUMENTLIST_TRACKER WHERE FK_DOCUMENTLIST_ID = '".$document_id."'";
        $result=mysqli_query($con,$query);

        while ($row=mysqli_fetch_array($result)) {


        }*/

        $query=select_info_multiple_key("SELECT DOCUMENTLIST_TRACKER_ID, FK_DOCUMENTLIST_ID,SORTORDER FROM DOCUMENTLIST_TRACKER WHERE FK_DOCUMENTLIST_ID = '".$document_id."' ORDER BY SORTORDER ASC");



        foreach ($query as $rows) {
            if ($rows['SORTORDER']==1){
                return $rows['DOCUMENTLIST_TRACKER_ID'];

            }
            else {
                if ($rows[''])

            }

        }





    }



?>