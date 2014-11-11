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
<script src="js/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link rel="icon" href="images/home/icon/pglu.ico" type="image/x-icon">

<script language="JavaScript" type="text/javascript">

function createBarcode() {

}


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

</head>

<body>
<div class="header">

	<div class="header1">
    
    	<div class="headerline">
    
    	<div class="headerbanner">
        
        		<a href="index.php"><img src="images/home/doctraklogo2.png" width="125" height="120" alt="PGLU" title="PGLU" align="left" /><h2>
				<?php
						
						echo $_SESSION['Title']. "<span style='font-size:12px;'>&nbsp;" .$_SESSION['Version'];
						echo "</span>";
				?>
				
				</h2><p>Management Information System</p></a>
        
        </div>

		<div class="menugroup">

        <div id="menu">

            <ul class="menu">
        <li><a href="home.php" class="parent"><span>HOME</span></a></li>
        <li><a href="#" class="parent"><span>DOCUMENT</span></a>
        	<ul>
                <li><a href="procedures/home/document/newdoc.php"><span>NEW DOCUMENT</span></a></li>
                            <li><a href="procedures/home/document/receiveddoc.php"><span>RECEIVED DOCUMENT</span></a></li>
                            <li><a href="procedures/home/document/releasedoc.php"><span>RELEASE DOCUMENT</span></a></li>
                            <li><a href="procedures/home/document/forreleasedoc.php"><span>FOR RELEASE</span></a></li>
                            <li><a href="procedures/home/document/documenttracker.php"><span>DOCUMENT TRACKER</span></a></li>
                            <li><a href="procedures/home/document/documentprocessing.php"><span>PROCESSING</span></a></li>
            </ul>
        </li>
        <li><a href="#"><span>REPORT</span></a>
        	<ul style="width:265px;">
                <li><a href="procedures/home/report/dochistory.php"><span>DOCUMENT HISTORY</span></a></li>
		<li><a href="procedures/home/report/doconprocess.php"><span>DOCUMENT ON PROCESS</span></a></li>
                <li><a href="procedures/home/report/doconprocesspersignatory.php"><span>DOCUMENT ON PROCESS PER SIGNATORY</span></a></li>
                <li><a href="procedures/home/report/docpersignatory.php"><span>DOCUMENTS PER SIGNATORY</span></a></li>
            </ul>
        </li>

    <?php
        if($_SESSION['GROUP']=='POWER ADMIN')
            {

                echo '<li><a href="#"><span>MAINTENANCE</span></a>
                <ul>
                        <li><a href="procedures/home/maintenance/documenttype.php"><span>DOCUMENT TYPE</span></a></li>
                        <li><a href="procedures/home/maintenance/office.php"><span>OFFICES</span></a></li>
                        <li><a href="procedures/home/maintenance/flowtemplate.php"><span>FLOW TEMPLATE</span></a></li>
                        <li><a href="#" class="parent"><span>SECURITY</span></a>
                            <ul>
                                <li><a href="procedures/home/maintenance/users.php"><span>USERS</span></a></li>
                                <li><a href="procedures/home/maintenance/group.php"><span>GROUP</span></a></li>
								<li><a href="procedures/home/maintenance/audittrail.php"><span>AUDIT TRAIL</span></a></li>
                            </ul>
                        </li>
                </ul>
                </li>';
            }
    ?>

        <li><a href="procedures/home/userinfo/userinfo.php"><span>USER INFO</span></a></li>
        <li><a href="about.php"><span>ABOUT</span></a></li>
        <li><a href="procedures/home/logout.php"><span>LOGOUT</span></a></li>
    
    </ul>
    </div>
		
        
        <div class="admin">
        	
        			<?php
        
	         require_once("procedures/connection.php");
	         global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
	         $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
	         $query="SELECT mail_id FROM mail WHERE FK_SECURITY_USERNAME_OWNER = '".$_SESSION['usr']."' AND MAILSTATUS=0";
	         $result=mysqli_query($con,$query)or die(mysqli_error($con));
	         while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	         {

		         echo '<a href="procedures/home/userinfo/inbox.php"><img src="images/home/icon/testmail.gif" width="30" height="20" align="left" /></a>&nbsp';

	         }
           echo "Hi, ".$_SESSION['security_name']." of ".$_SESSION['OFFICE']."";


        ?>
        </div>
            
         </div>   
        
        
        </div>
    
    </div>

</div>

<div class="content">

	<div class="content1">
    
    	<div class="content2">
        
        	<div id="post">
                    
                    <div  id="post11" >
                        <?php echo"<p>Pending ".$_SESSION['OFFICE']. " Documents</p>" ?>
                        <div class="scroll">
                        
                            <table>
                            <tr class="usercolortest">
                                <th>Barcode</th>
                                <th>Title</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Date</th>
                                <th>Date</th>
                                
                            </tr>
                            <?php
                            $query="select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name,priority from documentlist join security_user on documentlist.fk_security_username = security_user.security_username
join document_type on documentlist.fk_documenttype_id = document_type.documenttype_id WHERE scrap=0 and complete=0 order by transdate desc ";
                            $result=mysqli_query($con,$query)or die(mysqli_error($con));
	         while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
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
                            echo"<p>Pending Documents </p>"; 
                        }
                        else
                        {
                           echo"<p>Pending Documents at ".$_SESSION['OFFICE']. "</p>";  
                        }
                        
                        ?>
                        <div class="scroll">
                        
                        <table>
                            <tr class="usercolortest">
                                <th>Title</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Date</th>
                                <th>Date</th>
                            </tr>
                            <?php
                            $query="select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name,priority from documentlist join security_user on documentlist.fk_security_username = security_user.security_username join document_type on documentlist.fk_documenttype_id = document_type.documenttype_id WHERE scrap=0 and complete=0";
                            $result=mysqli_query($con,$query)or die(mysqli_error($con));
	         while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
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
                        echo $row['transdate'];
                          echo "</td><td>";
                        echo $row['transdate'];
                          echo "</td><td>";
                        echo $row['transdate'];
                        echo "</td><tr>";
	         }
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
                            echo"<p>Pending Documents </p>"; 
                        }
                        else
                        {
                           echo"<p>Pending Documents at ".$_SESSION['OFFICE']. "</p>";  
                        }
                        
                        ?>
                        <div class="scroll">
                        
                        <table>
                            <tr class="usercolortest">
                                <th>Title</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Date</th>
                                <th>Date</th>
                            </tr>
                            <?php
                            $query="select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name,priority from documentlist join security_user on documentlist.fk_security_username = security_user.security_username join document_type on documentlist.fk_documenttype_id = document_type.documenttype_id WHERE scrap=0 and complete=0";
                            $result=mysqli_query($con,$query)or die(mysqli_error($con));
	         while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
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
                        echo $row['transdate'];
                          echo "</td><td>";
                        echo $row['transdate'];
                          echo "</td><td>";
                        echo $row['transdate'];
                        echo "</td><tr>";
	         }
                            ?>
                            
                                <td>
                                    
                                </td>
                            </tr>
                        </table>
                        
                        
                        </div>
                         
                    </div>
                    <div  id="post12" >
                        <h2>Legend</h2>
                        <p><div class="highclr"></div><span>High Priority</span></p>
                        <p><div class="highclr"></div><span>High Priority</span></p>
                        
                        
                        
                        
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
                                mysqli_close($con);
			?>
			
			<a href="#">Contact Us</a> | Designed by: <a href="#">MIS</a> | <a href="#">Scroll Top</a></p>
        </div>
    
    </div>
	
</div>

</body>
</html>
