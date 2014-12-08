    <?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])) {
        $_SESSION['in'] = "start";
        header('Location:../../../../index.php');
    }


    require_once("../../../connection.php");
    global $DB_HOST, $DB_USER, $DB_PASS, $BD_TABLE;
    $con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $BD_TABLE);
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die;
    }
    mysqli_autocommit($con,FALSE);
    $flag=true;

    $query="select sortorder,fk_documentlist_id from documentlist_tracker where documentlist_tracker_id = '".$_POST["officeRollback"]."'";

    $Result=  mysqli_query($con, $query);
    while ($row=  mysqli_fetch_array($Result))
    {
        $barcode=$row['fk_documentlist_id'];
        $sortorder=$row['sortorder'];
        break;
    }

    mysqli_free_result($Result);


    $query="select received_val,received_by,received_date,received_comment,released_val,released_by,released_date,released_comment,forrelease_val,forrelease_date,forrelease_comment,sortorder,documentlist_tracker_id from documentlist_tracker where  fk_documentlist_id='$barcode' order by sortorder desc";
  //echo $query;
    $Result=  mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($Result))
    {
        if ( $row['sortorder']>=$sortorder)
        {
            $query = "update documentlist_tracker set received_val=NULL,received_by=NULL,received_date=NULL,received_comment=NULL,released_val=NULL,released_by=NULL,released_date=NULL,released_comment=NULL,forrelease_val=NULL,forrelease_date=NULL,forrelease_comment=NULL where documentlist_tracker_id = '".$row["documentlist_tracker_id"]."' ";
//            echo $query;
//            echo '<br>';
            $result=  mysqli_query($con, $query);
            if (!$result)
            {
                 $flag=false;
                
            }
        }
    
    }
    
    mysqli_free_result($result);
    $query="update documentlist set complete=0 where document_id = '".$barcode."' ";
    $result=  mysqli_query($con, $query);
    if (!$result)
    {
        $flag=false;
                
    }
         //START INSERT INTO DOCUMENTLIST_HISTORY

        include ("../common/history.php");
        if(!InsertHistory($barcode,$_SESSION['OFFICE'],'Document Rollbacked','','Rollbacked by '.$_SESSION['security_name']))
        {
            $flag=false;
        }

        //END INSERT INTO DOCUMENTLIST_HISTORY
       mysqli_free_result($result);
              if ($flag) 
        {
                $_SESSION['operation']="save";
                $_SESSION['message']="Save Successful";
                mysqli_commit($con);
        }
        else 
        {
                mysqli_rollback($con);
                $_SESSION['operation']="error";
                
        }

mysqli_free_result($Result);
    mysqli_close($con);
   
    header('Location:../rollback.php');
