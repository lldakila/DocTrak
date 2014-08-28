<?php
    session_start();
    if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd']))
    {
        $_SESSION['in'] ="start";
        header('Location:../../../../index.php');
    }


    include_once("SearchFilter.php");

    if (isset($_POST['receive']))
        {
            SortOrder($_POST['receive'],'receive');
          //  echo  $_SESSION['keytracker'];
        }

    elseif (isset($_POST['forreceive']))
        {
            SortOrder($_POST['forreceive'],'forrelease');
            echo  $_SESSION['keytracker'];

        }

    elseif (isset($_POST['release']))
    {
        SortOrder($_POST['release'],'release');
        echo  $_SESSION['keytracker'];

    }



   //



?>