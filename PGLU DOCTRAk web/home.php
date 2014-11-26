<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:index.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php

 	echo $_SESSION['Title']. "" .$_SESSION['Version'];
?>
</title>
<link rel="stylesheet" href="css/jquery-ui.min.css">
 <script src="js/jquery-ui.min.js"></script>
<script src="js/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link rel="icon" href="images/home/icon/pglu.ico" type="image/x-icon">


   
</head>

<body>

    <?php
    $PROJECT_ROOT= '';
    include_once('header.php');
    require_once("/procedures/connection.php");
    ?>

<div class="content">

	<div class="content1">
    
    	<div class="content2">
        
        	<div id="post">
                    
                    <div  id="post11" >
                        <?php 
                        if ($_SESSION['GROUP']=='ADMIN' OR $_SESSION['GROUP']=='POWER ADMIN')
                        {
                            echo"<p>Pending Documents </p>"; 
                            $query="select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name,priority from documentlist join security_user on documentlist.fk_security_username = security_user.security_username
join document_type on documentlist.fk_documenttype_id = document_type.documenttype_id WHERE scrap=0 and complete=0   order by transdate desc ";
                        }
                        else
                        {
                           echo"<p>Pending ".$_SESSION['OFFICE']. " Documents</p>";
                           $query="select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name,priority from documentlist join security_user on documentlist.fk_security_username = security_user.security_username
join document_type on documentlist.fk_documenttype_id = document_type.documenttype_id WHERE scrap=0 and complete=0 and fk_office_name_documentlist = '".$_SESSION['OFFICE']."'  order by transdate desc ";
                        }
                            
                        ?>
                        
                       
                        <div class="scroll">
                            
                            <table style="width: 600px;">
                                
                                <tr class="usercolortest">
                                <th>Barcode</th>
                                <th>Title</th>
                                <th>User</th>
                                <th>Date</th>
                                
                            </tr>
                            
                            <?php
                            
                            $result=mysqli_query($con,$query)or die(mysqli_error($con));
	         while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	         {
                        if (strtoupper($row['priority'])=='HIGH') 
                        {
                            echo "<tr class='hoverhigh clickableRow' ><td >";
                        }
                        elseif (strtoupper($row['priority'])=='MEDIUM')
                        {
                            echo "<tr class='hovermed clickableRow' ><td >";
                        }
                        elseif (strtoupper($row['priority'])=='LOW')
                        {
                            echo "<tr class='hoverlow clickableRow' ><td >";
                        }
                        
                        
                        echo $row['document_id'];
                        
                        echo "</td><td>";
                        echo $row['document_title'];
                        echo "</td><td>";
                        echo $row['security_name'];
                        echo "</td><td>";
                        echo $row['transdate'];
                        echo "</td><tr>";
	         }
                
                            ?>
                            
                                
                                    
                                <td></td>
                            </tr>
                        </table>
                        
                        
                        </div>
                            
                         
                    </div>
                    
                    <div  id="post11" >
                        <?php 
//                        if ($_SESSION['GROUP']=='ADMIN' OR $_SESSION['GROUP']=='POWER ADMIN')
//                        {
//                            echo"<p>Pending Documents </p>"; 
//                        }
//                        else
//                        {
                           echo"<p>Pending Documents at ".$_SESSION['OFFICE']. "</p>";  
//                        }
                        
                        ?>
                        <div class="scroll">
                        
                        <table style="width: 600px;">
                            <tr class="usercolortest">
                                <th>Barcode</th>
                                <th>Title</th>
                                <th>Owner</th>
                                <th>Office</th>
                                <th>Date Received</th>
                                <th>Date Encoded</th>
                            </tr>
                            <?php
                            
            
            $SQLquery="select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name,priority,fk_office_name_documentlist from documentlist join security_user on documentlist.fk_security_username = security_user.security_username join document_type on documentlist.fk_documenttype_id = document_type.documenttype_id WHERE scrap=0 and complete=0 order by transdate desc";
//            $query1=select_info_multiple_key("select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name,priority from documentlist join security_user on documentlist.fk_security_username = security_user.security_username join document_type on documentlist.fk_documenttype_id = document_type.documenttype_id WHERE scrap=0 and complete=0");
            $result=mysqli_query($con,$SQLquery)or die(mysqli_error($con));
            
//            if ($query1) 
//                {
//                include_once("/procedures/home/document/common/SearchFilter.php");
//                foreach($query1 as $var) 
//                {
                    
                
                while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	         {
                        if (SeekFilter($row["document_id"],'DocumentsOnOffice')) 
                        {

                            if (strtoupper($row['priority'])=='HIGH') 
                               {
                                   echo "<tr class='hoverhigh'><td>";
                               }
                               elseif (strtoupper($row['priority'])=='MEDIUM')
                               {
                                   echo "<tr class='hovermed'><td>";
                               }
                               elseif (strtoupper($row['priority'])=='LOW')
                               {
                                   echo "<tr class='hoverlow'><td >";
                               }
                               
                               echo $row['document_id'];
                               echo "</td><td>";
                               echo $row['document_title'];
                               echo "</td><td>";
                               echo $row['security_name'];
                               echo "</td><td>";
                               echo $row['fk_office_name_documentlist'];
                               echo "</td><td>";
                               echo $ReceivedDate;
                               echo "</td><td>";
                               echo $row['transdate'];
                               echo "</td><tr>";
                    }
                 }
                
//                }
                //}  
                ?>
                            
                                <td>
                                    
                                </td>
                            </tr>
                        </table>
                        
                        
                        </div>
                         
                    </div>
                    <div  id="post11" >
                        <?php 
                        if ($_SESSION['GROUP']=='ADMIN' OR $_SESSION['GROUP']=='POWER ADMIN')
                        {
                            echo"<p>Receivable Documents </p>"; 
                            $query="select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name,priority from documentlist join security_user on documentlist.fk_security_username = security_user.security_username join document_type on documentlist.fk_documenttype_id = document_type.documenttype_id WHERE scrap=0 and complete=0 order by transdate desc";
                        }
                        else
                        {
                           echo"<p>Receivable Documents of ".$_SESSION['OFFICE']. "</p>";  
                           $query="select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name,priority from documentlist join security_user on documentlist.fk_security_username = security_user.security_username join document_type on documentlist.fk_documenttype_id = document_type.documenttype_id WHERE scrap=0 and complete=0 and fk_office_name_documentlist = '".$_SESSION['OFFICE']."' order by transdate desc";
                        }
                        
                        ?>
                        <div class="scroll">
                        
                        <table style="width: 600px;">
                            <tr class="usercolortest">
                                <th>Title</th>
                                <th>Owner</th>
                                <th>Receive at</th>
                                <th>Date</th>
                                <th>Date</th>
                            </tr>
                            <?php
                            
                            $result=mysqli_query($con,$query)or die(mysqli_error($con));
	         while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	         {
                     
                     if (SeekFilter($row["document_id"],'ReceivableDocument')) 
                        {
                     
                     
                     
                     if (strtoupper($row['priority'])=='HIGH') 
                        {
                            echo "<tr class='hoverhigh'><td >";
                        }
                        elseif (strtoupper($row['priority'])=='MEDIUM')
                        {
                            echo "<tr class='hovermed'><td >";
                        }
                        elseif (strtoupper($row['priority'])=='LOW')
                        {
                            echo "<tr class='hoverlow'><td >";
                        }
		   
                        echo $row['document_title'];
                          echo "</td><td>";
                        echo $row['security_name'];
                           echo "</td><td>";
                        echo $RecieveAt;
                          echo "</td><td>";
                        echo $row['transdate'];
                          echo "</td><td>";
                        echo $row['transdate'];
                        echo "</td><tr>";
                }
                 }
                
                            ?>
                            
                                <td>
                                    
                                </td>
                            </tr>
                        </table>
                        
                        
                        </div>
                         
                    </div>
                    <div  id="post12" >
                        
                        
                        
                        
                        <div id="grpclr">
                            <img src="" id="highclr" align="left" /><p>High Priority</p>
                        </div>
                        
                        <div id="grpclr">
                            <img src="" id="medclr" align="left" /><p> Medium Priority</p>
                        </div>
                        
                        <div id="grpclr">
                            <img src="" id="lowclr" align="left" /><p>Low Priority</p>
                        </div>
                        
                        
                        
                        
                    </div>
                  
                    
                    
                    
                    
            			<div class="tfclear"></div>

            
            </div>
        
        </div>
    
    </div>

</div>

<div class="footer">

	<div class="footer1">
    
    			<div id="footer2">
            <p>
			<?php
				
				echo $_SESSION['Copyright']. "&nbsp;<img src=images/home/icon/copyleft-icon.png width='14' height='14' />&nbsp;" .$_SESSION['Year']. "&nbsp;" .$_SESSION['Developer'];
				echo "&nbsp|";
                                
                                mysqli_free_result($result);
                                mysqli_close($con);
			?>
			
			<a href="#">Contact Us</a> | Designed by: <a href="#">MIS</a> | <a href="#">Scroll Top</a></p>
        </div>
    
    </div>
	
</div>
            <?php
            function SeekFilter($docid,$filterDefinition)                    
            {
                
                global $RecieveAt;
                global $ReceivedDate;
                $ReceivedDate='';
                
                
                $sqlquery=select_info_multiple_key("SELECT FORRELEASE_VAL,RELEASED_VAL,RECEIVED_VAL,OFFICE_NAME, DOCUMENTLIST_TRACKER_ID, FK_DOCUMENTLIST_ID,SORTORDER,RECEIVED_DATE FROM documentlist_tracker WHERE FK_DOCUMENTLIST_ID = '".$docid."' ORDER BY SORTORDER ASC");
                if (!$sqlquery)
                {
                    return false;
                   
                }
                
                
                    switch($filterDefinition)
                
                    {   
                        case 'DocumentsOnOffice':
                            foreach($sqlquery as $rows)
                            {
                                if ($rows['OFFICE_NAME']==$_SESSION['OFFICE'])
                                {
                                    if ($rows['RELEASED_VAL']!=1 && $rows['RECEIVED_VAL']==1 )
                                    {
                                        //$_SESSION['keytracker']=$rows['DOCUMENTLIST_TRACKER_ID'];
                                        $ReceivedDate=$rows['RECEIVED_DATE'];
                                        return true;
                                    }

                                } 
                            }
                            return false;
                            
                        case 'ReceivableDocument':
                             foreach($sqlquery as $rows)
                            {
                                if ($rows['FORRELEASE_VAL']==1 and $rows['RELEASED_VAL']!=1)
                                {
                                    $RecieveAt=$rows['OFFICE_NAME'];
                                   // $RecieveAt="adasdasd";
                                        return true;
                                }
                            }
                            return false;

                    }
                    
                    
                    
                }
                return false;
                
                
           
//            
//            function GetReveivableOffice($DocumentList_id)
//            {
//                require_once("/procedures/connection.php");
//                $sqlquery=select_info_multiple_key("SELECT FORRELEASE_VAL,RELEASED_VAL,RECEIVED_VAL,OFFICE_NAME, DOCUMENTLIST_TRACKER_ID, FK_DOCUMENTLIST_ID,SORTORDER FROM documentlist_tracker WHERE FK_DOCUMENTLIST_ID = '".$docid."' ORDER BY SORTORDER ASC");
//                if (!$sqlquery)
//                {
//                    return false;
//                   
//                }
//                
//            }
            ?>
    
    
    <script language="JavaScript" type="text/javascript">
jQuery(document).ready(function($) {
      $(".clickableRow").click(function() {
            window.document.location = $(this).attr("href");
      });
});

function cleartext() {
  document.getElementById("barcodeinput").value="";
  document.getElementById("title").value="";
  document.getElementById("description").value="";
  document.getElementById("type").value="";
  document.getElementById("template").value="";
  document.getElementById("file").value="";
  document.getElementById("primarykey").value="";

}
function clickSearch(barcode,title,description,file,template,type,a) {
   // document.getElementById('primarykey').value=barcode;
    document.process.barcode.value=barcode;
    document.process.title.value=title;
    document.process.description.value=description;
    document.process.type.value=type;
    document.process.template.value=template;
    //document.process.file.value=a;
    document.process.primarykey.value=barcode;

    //alert (type);
  //  document.getElementById("group").value=username;
}

function validate() {

    if (document.getElementById('document_hidden').value=='delete') {
        if (document.getElementById('primarykey').value != ""){
        if (confirm("Are you sure you want to delete?") == true) {
            return true;
        }
        else {
            return false;
        }

        }
        else {
            alert("Nothing to delete.");
            return false;
        }


    }



    if (document.process.barcode.value=="")   {
        alert("Fill up necessary inputs.");
        return false;
    }
    else if (document.process.title.value=="") {

            alert("Fill up necessary inputs.");
            return false;
        }
    else if (document.process.type.value=="") {
        alert("Select Document type.");
        return false;
    }
    else if (document.process.template.value=="") {
        alert("Select Template.");
        return false;
    }





}

$(document).ready(function() {
	
	$("#generatebarcode").click(function (e) {

        e.preventDefault();
      //  var myData = 'randbarcode='+ $("#generatebarcode").val(); //build a post data structure
        jQuery.ajax({
            type: "POST",
            url:"procedures/home/document/new/barcode.php",
            dataType:"text", // Data type, HTML, json etc.
           // data:myData,
            success:function(response){
                //$("#barcodeinput").html(response);

                document.getElementById("barcodeinput").value=response;
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    });


    });
    
    

</script>
</body>
</html>
