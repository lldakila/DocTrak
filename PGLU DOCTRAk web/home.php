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
            
            			<div id="post01">
                        <h2>Home</h2>
                        
                        		<div class="imagestext">
                                	<img src="images/home/newdoc.jpg" width="136" height="137" />
    								<div class="lower"><a href = "javascript:void(0)" onclick = "document.getElementById('newdoc').style.display='block';document.getElementById('fade1').style.display='block'">New Document</a></div>
                                </div>
                                <div class="imagestext">
                                	<img src="images/home/receivedoc.jpg" width="136" height="137" />
    								<div class="lower"><a href = "javascript:tj" onclick = "document.getElementById('receivedoc').style.display='block';document.getElementById('fade2').style.display='block'">Received Document</a></div>
                                </div>
                                <div class="imagestext">
                                	<img src="images/home/releasedoc.jpg" width="136" height="137" />
    								<div class="lower"><a href = "javascript:tj" onclick = "document.getElementById('releasedoc').style.display='block';document.getElementById('fade3').style.display='block'">Release Document</a></div>
                                </div>
                                <div class="imagestext">
                                	<img src="images/home/docstats.jpg" width="136" height="137" />
    								<div class="lower"><a href="#">Document Status</a></div>
                                </div>
                                <div class="imagestext">
                                	<img src="images/home/maintenance.jpg" width="136" height="137" />
    								<div class="lower"><a href="#">Maintenance</a></div>
                                </div>
                                <div class="imagestext">
                                	<img src="images/home/about.jpg" width="136" height="137" />
    								<div class="lower"><a href="#">About</a></div>
                                </div>


                                <div id="newdoc" class="white_content"><a href = "javascript:void(0)" onclick = "document.getElementById('newdoc').style.display='none';document.getElementById('fade1').style.display='none'"><img src="images/home/icon/download.jpg" width="30" height="30" /></a>
                                
                                <form name="process" method="post" action="procedures/home/newprocess.php" onsubmit="return validate();" enctype="multipart/form-data">

    					<div class="table1">
    				<table >
                    <tr>
                    	<td>BarCode:</td>

                        <td class="usertext1">
                            <input id="primarykey" name="primarykey" type="hidden" />
                            <input id="barcodeinput" name="barcode" type="text" />
                            <input id="generatebarcode" type="button" value="Generate"/></td>
                    </tr>
                    <tr>
                    	<td>Title:</td>
                        <td class="usertext"><input id="title" name="title" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Description:</td>
                        <td class="usertext"><input id="description" name="description" type="text" /> </td>
                    </tr>

                    <tr>
                    	<td>Type: </td>
                         <td class="select01">
                             <select id="type" name="type">

       <?php
           require_once("procedures/connection.php");

           $query=select_info_multiple_key("select DOCUMENTTYPE_ID from DOCUMENT_TYPE");
           foreach($query as $var) {
              echo "<option>".$var['DOCUMENTTYPE_ID']."</option>";
           }


    ?>
                              </select>
                               </td>

                    </tr>
                    <tr>
                    	<td>Template: </td>
                         <td class="select01">
                             <select id="template" name="template">

       <?php
           require_once("procedures/connection.php");

           $query=select_info_multiple_key("select TEMPLATE_ID from DOCUMENT_TEMPLATE");
           foreach($query as $var) {
              echo "<option>".$var['TEMPLATE_ID']."</option>";
           }


    ?>
                              </select>
                               </td>

                    </tr>
                    <tr>
                    	<td>PDF File: </td>
                         <td><input id="file" name="pdffile" type="file" accept="application/pdf"/> </td>
                    </tr>
                  </table>

                    <?php
          
           if($_SESSION['operation']=='save'){

                echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Saved Successfully </div>";

            }  elseif($_SESSION['operation']=='delete'){

                     echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Deleted Successfully </div>";
                }
           elseif($_SESSION['operation']=='update'){

               echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Updated Successfully </div>";
           }
           elseif($_SESSION['operation']=='error'){

               echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Error query. Save not Successful. </div>";
           }

               $_SESSION['operation']='clear';






?>

                  		 <!--- BUTTONS ACTIVITY START --->

                        <div class="input1">
                         <input id="document_hidden" name="document_hidden" type="hidden" value=""/>
                         <input type="button" value="New" onClick="javascript:cleartext();"/>
                         <input  type="submit" value="Delete"  onClick="document.getElementById('document_hidden').value='delete';"/>
                         <input type="submit" value="Save" onClick="document.getElementById('document_hidden').value='save';"/>
                         </div>
                           <!--- BUTTONS ACTIVITY END--->

                  </div>

						   </form>
                           </div>
    <div id="fade1" class="black_overlay" onclick = "document.getElementById('newdoc').style.display='none';document.getElementById('fade1').style.display='none'"></div>

    <div id="receivedoc" class="white_content"><a href = "javascript:void(0)" onclick = "document.getElementById('receivedoc').style.display='none';document.getElementById('fade2').style.display='none'"><img src="images/home/icon/download.jpg" width="30" height="30" /></a>
    					
                        <form name="process" method="post" action="procedures/home/document/receive/process.php" onsubmit="return validate();" enctype="multipart/form-data">

    					<div class="table1">
    				<table >
                    <tr>
                    	<td>BarCode No:</td>

                        <td class="usertext">
                            <input id="primarykey" name="primarykey" type="hidden" />
                            <input id="barcodeno" readonly="readonly" name="barcodeno" type="text" />
                            </td>
                    </tr>
                    <tr>
                    	<td>Title:</td>
                        <td class="usertext"><input id="title" readonly="readonly" name="title" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Document Type:</td>
                        <td class="usertext"><input id="documenttype" readonly="readonly" name="documenttype" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Template:</td>
                        <td class="usertext"><input id="template" readonly="readonly" name="template" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Comment:</td>
                        <td class="usertext"><textarea rows="5" id="comment" name="comment" type="text"></textarea> </td>
                    </tr>
                    <tr>
                    	<td>Attachment: </td>
                         <td id="attachment">
                         
                         
                         </td>
                    </tr>
                  </table>

                    <?php
            
           if($_SESSION['operation']=='save'){

                echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Saved Successfully </div>";

            }  elseif($_SESSION['operation']=='delete'){

                     echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Deleted Successfully </div>";
                }
           elseif($_SESSION['operation']=='update'){

               echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Updated Successfully </div>";
           }

               $_SESSION['operation']='clear';






?>

                  		 <!--- BUTTONS ACTIVITY START --->

                        <div class="input2">
                         <input id="receiveddoc_hidden" name="document_hidden" type="hidden" value="0"/>
                         <input type="submit" value="Receive" onClick="document.getElementById('receiveddoc_hidden').value='receive';"/>
                         </div>
                           <!--- BUTTONS ACTIVITY END--->

                  </div>

						   </form>
                           </div>
    <div id="fade2" class="black_overlay" onclick = "document.getElementById('receivedoc').style.display='none';document.getElementById('fade2').style.display='none'"></div>

    <div id="releasedoc" class="white_content"><a href = "javascript:void(0)" onclick = "document.getElementById('releasedoc').style.display='none';document.getElementById('fade3').style.display='none'"><img src="images/home/icon/download.jpg" width="30" height="30" /></a>
    						
                            <form name="process" method="post" action="procedures/home/document/release/process.php" onsubmit="return validate();" enctype="multipart/form-data">

    					<div class="table1">
    				<table >
                    <tr>
                    	<td>BarCode No:</td>

                        <td class="usertext">
                            <input id="primarykey" name="primarykey" type="hidden" />
                            <input id="barcodeno" readonly="readonly" name="barcodeno" type="text" />
                            </td>
                    </tr>
                    <tr>
                    	<td>Title:</td>
                        <td class="usertext"><input id="title" readonly="readonly" name="title" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Document Type:</td>
                        <td class="usertext"><input id="documenttype" readonly="readonly" name="documenttype" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Template:</td>
                        <td class="usertext"><input id="template" readonly="readonly" name="template" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Comment:</td>
                        <td class="usertext"><textarea rows="5" id="comment" name="comment" type="text"></textarea> </td>
                    </tr>
                    <tr>
                    	<td>Attachment: </td>
                         <td id="attachment">
                         
                         
                         </td>
                    </tr>
                  </table>

                    <?php
         
           if($_SESSION['operation']=='save'){

                echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Saved Successfully </div>";

            }  elseif($_SESSION['operation']=='delete'){

                     echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Deleted Successfully </div>";
                }
           elseif($_SESSION['operation']=='update'){

               echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Updated Successfully </div>";
           }

               $_SESSION['operation']='clear';






?>

                  		 <!--- BUTTONS ACTIVITY START --->

                        <div class="input2">
                         <input id="releasedoc_hidden" name="document_hidden" type="hidden" value="0"/>
                         <input type="submit" value="Release" onClick="document.getElementById('releasedoc_hidden').value='release';"/>
                         </div>
                           <!--- BUTTONS ACTIVITY END--->

                  </div>

						   </form>
                           </div>
    <div id="fade3" class="black_overlay" onclick = "document.getElementById('releasedoc').style.display='none';document.getElementById('fade3').style.display='none'"></div>
     

                        </div><div class="tfclear"></div>

            
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
			?>
			
			<a href="#">Contact Us</a> | Designed by: <a href="#">MIS</a> | <a href="#">Scroll Top</a></p>
        </div>
    
    </div>
	
</div>

</body>
</html>
