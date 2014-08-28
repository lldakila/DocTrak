<?php
    session_start();
    if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd']))
    {
        $_SESSION['in'] ="start";
        header('Location:../../../../index.php');
    }


    function SortOrder($document_id,$source) {
        global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
        require_once("../../../connection.php");
       //$_SESSION['keytracker']='';

        $query=select_info_multiple_key("SELECT FORRELEASE_VAL,RELEASED_VAL,RECEIVED_VAL,OFFICE_NAME, DOCUMENTLIST_TRACKER_ID, FK_DOCUMENTLIST_ID,SORTORDER FROM DOCUMENTLIST_TRACKER WHERE FK_DOCUMENTLIST_ID = '".$document_id."' ORDER BY SORTORDER ASC");

        $counterX=0;

        switch ($source)

        {

            case 'receive':

                    foreach ($query as $rows) {

                    if ($rows['OFFICE_NAME']==$_SESSION['OFFICE']){

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

                            if ($query[$counterX-1]['RELEASED_VAL']==1 AND $rows['RECEIVED_VAL']!=1)
                            {
                                $_SESSION['keytracker']=$rows['DOCUMENTLIST_TRACKER_ID'];
                                //$_SESSION['keytracker']=$rows['RECEIVED_VAL'];
                                return true;
                            }

                        }


                    }
                        $counterX=$counterX+1;
                    }
                    return false;
                    break;


            case 'release':

                foreach ($query as $rows) {

                    if ($rows['OFFICE_NAME']==$_SESSION['OFFICE'])
                        {

                        if ($rows['SORTORDER']==1)
                        {
                            if ($rows['RELEASED_VAL']!=1 AND $rows['RECEIVED_VAL'])
                            {
                                $_SESSION['keytracker']=$rows['DOCUMENTLIST_TRACKER_ID'];
                                return true;
                            }

                        }
                        else
                        {

                            if ($rows['RECEIVED_VAL']==1 AND $rows['RELEASED_VAL']!=1)
                            {
                                $_SESSION['keytracker']=$rows['DOCUMENTLIST_TRACKER_ID'];
                                //$_SESSION['keytracker']=$rows['RECEIVED_VAL'];
                                return true;
                            }

                        }


                    }
                    $counterX=$counterX+1;
                }
                return false;
                break;

            case 'forrelease':

                foreach ($query as $rows) {

                    if ($rows['OFFICE_NAME']==$_SESSION['OFFICE']){

                        if ($rows['SORTORDER']==1)
                        {
                            if ($rows['FORRELEASE_VAL']!=1 AND $rows['RELEASED_VAL']!=1)
                            {
                                $_SESSION['keytracker']=$rows['DOCUMENTLIST_TRACKER_ID'];
                                return true;
                            }

                        }
                        else
                        {

                            if ($rows['RECEIVED_VAL']==1 AND $rows['FORRELEASE_VAL']!=1 AND $rows['RELEASED_VAL']!=1)
                            {
                                $_SESSION['keytracker']=$rows['DOCUMENTLIST_TRACKER_ID'];
                                //$_SESSION['keytracker']=$rows['RECEIVED_VAL'];
                                return true;
                            }

                        }


                    }
                    $counterX=$counterX+1;
                }
                return false;
                break;


            case 'processing':

                foreach ($query as $rows) {
                    if ($rows['OFFICE_NAME']==$_SESSION['OFFICE'])
                    {
                          if ($rows['RECEIVED_VAL']==1 AND $rows['RELEASED_VAL']!=1)
                           {
                                $_SESSION['keytracker']=$rows['DOCUMENTLIST_TRACKER_ID'];
                                return true;
                           }

                }}
                return false;
                break;

       // }







    }
    }



?>