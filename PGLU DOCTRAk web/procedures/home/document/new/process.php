<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../../index.php');
}




require_once("../../../connection.php");

date_default_timezone_set($_SESSION['Timezone']);


 if ($_POST['document_hidden']=="save") 
     {
        
        global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
        $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
        if (mysqli_connect_error()) 
        {
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
           die;
        }
        mysqli_autocommit($con,FALSE);
        $flag=true;
        
        if ($_POST['primarykey'] == "") 
        {


           // CHECK IF INPUTFILE IS EMPTY START
            if (empty($_FILES['pdffile']['name']))
            {
               
                $query="INSERT INTO documentlist(DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,FK_SECURITY_USERNAME,TRANSDATE,FK_OFFICE_NAME_DOCUMENTLIST) VALUES ('".$_POST['barcode']."','".$_POST['title']."','".$_POST['description']."','".$_POST['template']."','".$_POST['type']."','".$_SESSION['usr']."','".date("Y-m-d H:i:s")."','".$_SESSION['OFFICE']."')";   
              

            }
            else 
            {

                $docData=addslashes(file_get_contents($_FILES['pdffile']['tmp_name']));
                $docInfo= finfo_open(FILEINFO_MIME_TYPE);
                $docProp=finfo_file($docInfo,$_FILES['pdffile']['tmp_name']);
          
                if (filesize($_FILES['pdffile']['tmp_name']) > $_SESSION['MaxUploadSize'])
                {
                    $flag=false;
                    $_SESSION['message']="Maximum allowed document size is ".$_SESSION['MaxUploadSize']." bytes.";
                }
               
                if ($docProp == "application/pdf")
                {
                    $query="INSERT INTO documentlist(DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,DOCUMENT_FILE,DOCUMENT_MIME,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,FK_SECURITY_USERNAME,TRANSDATE,FK_OFFICE_NAME_DOCUMENTLIST) VALUES ('".$_POST['barcode']."','".$_POST['title']."','".$_POST['description']."','{$docData}','".$docProp."','".$_POST['template']."','".$_POST['type']."','".$_SESSION['usr']."','".date("Y-m-d H:i:s")."','".$_SESSION['OFFICE']."')";
                }
                else
                {
                    $flag=false;
                    $_SESSION['message']="Not supported attachment.";
                }
               
               
               
               
            } 
           // CHECK IF INPUT FILE IS EMPTY END

            $RESULT=mysqli_query($con,$query);
            if (!$RESULT) 
            {
                $flag=false;
                echo mysqli_error($con);
                echo "<br>";
            }
            $query="SELECT  fk_office_name,SORT FROM template_list WHERE fk_template_id= '".$_POST['template']."' order by sort asc";
            $RESULT=mysqli_query($con,$query);

            while ($row = mysqli_fetch_array($RESULT)) 
            {
                $query="INSERT INTO documentlist_tracker(OFFICE_NAME,SORTORDER,fk_documentlist_id) VALUES ('".$row['fk_office_name']."','".$row['SORT']."','".$_POST['barcode']."')";
                $outcome=mysqli_query($con,$query);

                if (!$outcome) 
                {
                   $flag=false;
                   echo mysqli_error($con);
                   echo "<br>";
               }
            }

            //$_FILES['pdffile']['name']=$UploadFilename;
                
               

            //echo "commit";
               //UPLOAD PDF FILE END


            //START INSERT INTO DOCUMENTLIST_HISTORY
            
            include ("../common/history.php");
            if(!InsertHistory($_POST['barcode'],$_SESSION['OFFICE'],'Document Created','','Created by '.$_SESSION['security_name']))
            {
                $flag=false;
            }
           
            //END INSERT INTO DOCUMENTLIST_HISTORY

        }
        else //UPDATE DOCUMENT
        {
           
           
            $query="Select FK_TEMPLATE_ID from documentlist where document_id = '".$_POST['primarykey']."' ";
            $result=  mysqli_query($con,$query);
            while ($row=  mysqli_fetch_array($result))
            {
                if ($row['FK_TEMPLATE_ID']!=$_POST['template'])
                {
                    $flag=false;
                    $_SESSION['message']="Template cannot be changed once saved.";
                }

            }
            
            if (empty($_FILES['pdffile']['name']))
            {
                $query="UPDATE documentlist SET DOCUMENT_ID='".$_POST['barcode']."',DOCUMENT_TITLE='".$_POST['title']."',DOCUMENT_DESCRIPTION='".$_POST['description']."',FK_DOCUMENTTYPE_ID='".$_POST['type']."' WHERE DOCUMENT_ID = '".$_POST['primarykey']."' ";
            }
            else
            {
                $docData=addslashes(file_get_contents($_FILES['pdffile']['tmp_name']));
                $docInfo= finfo_open(FILEINFO_MIME_TYPE);
                $docProp=finfo_file($docInfo,$_FILES['pdffile']['tmp_name']);
          
                if (filesize($_FILES['pdffile']['tmp_name']) > $_SESSION['MaxUploadSize'])
                {
                    $flag=false;
                    $_SESSION['message']="Maximum allowed document size is ".$_SESSION['MaxUploadSize']." bytes.";
                }
               
                if ($docProp == "application/pdf")
                {
                    $query="UPDATE documentlist SET DOCUMENT_ID='".$_POST['barcode']."',DOCUMENT_TITLE='".$_POST['title']."',DOCUMENT_DESCRIPTION='".$_POST['description']."',FK_DOCUMENTTYPE_ID='".$_POST['type']."',DOCUMENT_FILE='{$docData}',DOCUMENT_MIME='".$docProp."' WHERE DOCUMENT_ID = '".$_POST['primarykey']."' ";
                    //$query="INSERT INTO documentlist(DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,DOCUMENT_FILE,DOCUMENT_MIME,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,FK_SECURITY_USERNAME,TRANSDATE,FK_OFFICE_NAME_DOCUMENTLIST) VALUES ('".$_POST['barcode']."','".$_POST['title']."','".$_POST['description']."','{$docData}','".$docProp."','".$_POST['template']."','".$_POST['type']."','".$_SESSION['usr']."','".date("Y-m-d H:i:s")."','".$_SESSION['OFFICE']."')";
                }
                else
                {
                    $flag=false;
                    $_SESSION['message']="Not supported attachment.";
                }
                
                $RESULT=mysqli_query($con,$query);
                $_SESSION['message']=mysqli_error($con);
                if (!$RESULT) 
                {
                    $flag=false;
                    echo mysqli_error($con);
                    
                }
            }
            
                
            
            
            
           $outcome=mysqli_query($con,$query);
           if (!$outcome) 
            {
                $flag=false;
            }
            
            
           
           
          // $_SESSION['operation']="update";
           //$_SESSION['message']="Update Successful";
           
        }
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
                echo "rollback";
            }
        mysqli_free_result($RESULT);
        mysqli_close($con);
    }

   elseif ($_POST['document_hidden']=="delete") {

          $query=select_info_multiple_key("select * from documentlist where document_id='".($_POST['barcode'])."' and complete=1");
          if ($query)
          {
              $_SESSION['operation']="complete";
          }
          else
          {
              $query=insert_update_delete("DELETE FROM documentlist WHERE DOCUMENT_ID ='".($_POST['barcode'])."' ");
               $_SESSION['operation']="delete";
               $_SESSION['message']="Delete Successful";
          }
          

         
   }

elseif ($_POST['document_hidden']=="scrap")
	{
		$query=insert_update_delete("UPDATE documentlist SET SCRAP=1 WHERE DOCUMENT_ID ='".($_POST['barcode'])."'");
		//$query=insert_update_delete("DELETE FROM DOCUMENTLIST WHERE DOCUMENT_ID ='".($_POST['barcode'])."' ");
		echo "UPDATE documentlist SET SCRAP=1 WHERE DOCUMENT_ID ='".($_POST['barcode'])."'";
		$_SESSION['operation']="scrap";
		$_SESSION['message']="Scrapped Successful";
	}

   header('Location:../newdoc.php');

 ?>

