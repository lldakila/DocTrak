<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
    $_SESSION['in'] ="start";
    header('Location:../../../../index.php');
}










    function SortOrder($document_id,$source) {
        //global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
        require_once("../../../connection.php");
        $_SESSION['keytracker']='';
       /* $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
        $query="SELECT FK_DOCUMENTLIST_ID FROM DOCUMENTLIST_TRACKER WHERE FK_DOCUMENTLIST_ID = '".$document_id."'";
        $result=mysqli_query($con,$query);

        while ($row=mysqli_fetch_array($result)) {


        }*/

        $query=select_info_multiple_key("SELECT OFFICE_NAME, DOCUMENTLIST_TRACKER_ID, FK_DOCUMENTLIST_ID,SORTORDER,RELEASED_VAL FROM DOCUMENTLIST_TRACKER WHERE FK_DOCUMENTLIST_ID = '".$document_id."' ORDER BY SORTORDER ASC");


        $counterX=0;


        switch ($source){

            case 'receive':

                    foreach ($query as $rows) {

                    if ($rows['OFFICE_NAME']==$_SESSION['security_group']){

                        if ($rows['SORTORDER']==1)
                        {
                                if ($rows['RECEIVED_VAL']!=1)
                                {
                                    $_SESSION['keytracker']=$rows['DOCUMENTLIST_TRACKER_ID'];
                                    return true;
                                }

                        }
                        else
                        {

                            if ($query[$counterX-1]['RELEASED_VAL']==1 AND $query[$counterX]['RECEIVED_VAL']!=1)
                            {
                                $_SESSION['keytracker']=$rows['DOCUMENTLIST_TRACKER_ID'];
                                return true;
                            }

                        }



                    }
                        $counterX=$counterX+1;
                    }
                    return false;
                    break;

                }


    }



?>