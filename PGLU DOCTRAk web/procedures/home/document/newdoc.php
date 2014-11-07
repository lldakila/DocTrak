<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../index.php');
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
<script src="../../../js/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../../css/home.css" />
<link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">
<script language="JavaScript" type="text/javascript">



function cleartext() {
  document.getElementById("barcodeinput").value="";
  document.getElementById("title").value="";
  document.getElementById("description").value="";
  document.getElementById("type").value="";
  document.getElementById("template").value="";
  document.getElementById("file").value="";
  document.getElementById("primarykey").value="";

}
function clickSearch(barcode,title,description,file,template,type,a,scrap) {
   // document.getElementById('primarykey').value=barcode;
	if (scrap!=1)
	{
		document.process.barcode.value=barcode;
		document.process.title.value=title;
		document.process.description.value=description;
		document.process.type.value=type;
		document.process.template.value=template;
		//document.process.file.value=a;
		document.process.primarykey.value=barcode;
	}
	else if (scrap==1)
	{
		alert("Document is scrapped.");
		cleartext();
	}



    //alert (type);
  //  document.getElementById("group").value=username;
}

function validate() {
	//alert (document.getElementById('document_hidden').value);
	//alert (document.getElementById("document_hidden").value);
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

	if (document.getElementById('document_hidden').value=='scrap') {
		if (document.getElementById('primarykey').value != ""){
			if (confirm("Are you sure you want to scrap document?") == true) {
				return true;
			}
			else {
				return false;
			}

		}
		else {
			alert("Nothing to scrap.");
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
    $("#search_document").click(function (e) {

    e.preventDefault();
    var myData = 'search_string='+ $("#search_string").val(); //build a post data structure
    jQuery.ajax({
			type: "POST",
            url:"new/search.php",
            dataType:"text", // Data type, HTML, json etc.
			data:myData,
			success:function(response){
				$("#responds").html(response);

			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
			});
	});



    $("#generatebarcode").click(function (e) {

        e.preventDefault();
      //  var myData = 'randbarcode='+ $("#generatebarcode").val(); //build a post data structure
        jQuery.ajax({
            type: "POST",
            url:"new/barcode.php",
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
	
document.addEventListener("mousemove", function() {
    myFunction(event);
});

function myFunction(e) {
	$("#fade").fadeTo(3000,0.0);

}

</script>
</head>

<body>
<div class="header">

	<div class="header1">
    
    	<div class="headerline">
    
    	<div class="headerbanner">
        
        		<img src="../../../images/home/doctraklogo2.png" width="125" height="120" alt="PGLU" title="PGLU" align="left" /><h2>
				<?php
						
						echo $_SESSION['Title']. "<span style='font-size:12px;'>&nbsp;" .$_SESSION['Version'];
						echo "</span>";
				?>
				
				</h2><p>Management Information System</p>
        
        </div>

        <div class="menugroup">
        
        <div id="menu">

            <ul class="menu">
        <li><a href="../../../home.php" class="parent"><span>HOME</span></a></li>
        <li><a href="#" class="parent"><span>DOCUMENT</span></a>
        	<ul>
                <li><a href="newdoc.php"><span>NEW DOCUMENT</span></a></li>
                            <li><a href="receiveddoc.php"><span>RECEIVED DOCUMENT</span></a></li>
                            <li><a href="releasedoc.php"><span>RELEASE DOCUMENT</span></a></li>
                            <li><a href="forreleasedoc.php"><span>FOR RELEASE</span></a></li>
                            <li><a href="documenttracker.php"><span>DOCUMENT TRACKER</span></a></li>
                            <li><a href="documentprocessing.php"><span>PROCESSING</span></a></li>
            </ul>
        </li>
        <li><a href="#"><span>REPORT</span></a>
        	<ul style="width:265px;">
                <li><a href="../report/dochistory.php"><span>DOCUMENT HISTORY</span></a></li>
				<li><a href="../report/doconprocess.php"><span>DOCUMENT ON PROCESS</span></a></li>
                <li><a href="../report/doconprocesspersignatory.php"><span>DOCUMENT ON PROCESS PER SIGNATORY</span></a></li>
                <li><a href="../report/docpersignatory.php"><span>DOCUMENTS PER SIGNATORY</span></a></li>
            </ul>
        </li>
	            <?php
		            if($_SESSION['GROUP']=='POWER ADMIN')
		            {

			            echo '<li><a href="#"><span>MAINTENANCE</span></a>
                <ul>
                        <li><a href="../maintenance/documenttype.php"><span>DOCUMENT TYPE</span></a></li>
                        <li><a href="../maintenance/office.php"><span>OFFICES</span></a></li>
                        <li><a href="../maintenance/flowtemplate.php"><span>FLOW TEMPLATE</span></a></li>
                        <li><a href="#" class="parent"><span>SECURITY</span></a>
                            <ul>
                                <li><a href="../maintenance/users.php"><span>USERS</span></a></li>
                                <li><a href="../maintenance/group.php"><span>GROUP</span></a></li>
								<li><a href="../maintenance/audittrail.php"><span>AUDIT TRAIL</span></a></li>
                            </ul>
                        </li>
                </ul>
                </li>';
		            }
	            ?>

	            <li><a href="../userinfo/userinfo.php"><span>USER INFO</span></a></li>
        <li><a href="../../../about.php"><span>ABOUT</span></a></li>
        <li><a href="../logout.php"><span>LOGOUT</span></a></li>

        </ul>
        </div>
		
        
        <div class="admin">
        
        			<?php
          
	         require_once("../../connection.php");
	         global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
	         $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
	         $query="SELECT MAIL_ID FROM mail WHERE FK_SECURITY_USERNAME_OWNER = '".$_SESSION['usr']."' AND MAILSTATUS=0";
	         $result=mysqli_query($con,$query) or die(mysqli_error($con));
	         while ($row = mysqli_fetch_array($result))
	         {

		         echo '<a href="../userinfo/inbox.php"><img src="../../../images/home/icon/testmail.gif" width="30" height="20" align="left" /></a>&nbsp';
break;
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
            
            			<div id="post10">
                        <h2>NEW DOCUMENT</h2>

                            <form name="process" method="post" action="new/process.php" onsubmit="return validate();" enctype="multipart/form-data">

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
           require_once("../../connection.php");

           $query=select_info_multiple_key("select DOCUMENTTYPE_ID from document_type");
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
           require_once("../../connection.php");

           $query=select_info_multiple_key("select TEMPLATE_ID from document_template");
           foreach($query as $var)
           {
              echo "<option>".$var['TEMPLATE_ID']."</option>";
           }


    ?>
                              </select>
                               </td>

                    </tr>
                    <tr>
                    	<td>PDF File: </td>
                         <td><input id="file" name="pdffile" type="file" accept="application/pdf" /> </td>
                    </tr>
                  </table>

                    <?php
            
                    echo "<div id='message' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>";
           if($_SESSION['operation']=='save'){

                echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Saved Successfully</div>";

            }  elseif($_SESSION['operation']=='delete'){

                     echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Deleted Successfully</div>";
                }
           elseif($_SESSION['operation']=='update'){

               echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Updated Successfully</div>";
           }
           elseif($_SESSION['operation']=='error'){

               echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Something went wrong. Operation not Successful.</div>";
           }
           elseif($_SESSION['operation']=='scrap'){

	           echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Scrapped successfully.</div>";
           }



               $_SESSION['operation']='clear';

        echo "</div>";




?>

                  		 <!--- BUTTONS ACTIVITY START --->

                        <div class="input1">
                         <input id="document_hidden" name="document_hidden" type="hidden" value=""/>
                         <input type="button" value="New" onClick="javascript:cleartext();"/>
	                     <input type="submit" value="Save" onClick="document.getElementById('document_hidden').value='save';"/>
                    <?php
	                    if($_SESSION['GROUP']=='ADMIN' or $_SESSION['GROUP']=='POWER ADMIN')
	                    {
		                    $value="document.getElementById('document_hidden').value='delete';";
		                    echo '<input  type="submit" value="Delete"  onClick="'.$value.'"/>';
	                    }






						if ($_SESSION['GROUP']!='ADMIN')
						{
							$value="document.getElementById('document_hidden').value='scrap';";
		                    echo '<input  type="submit" value="Scrap"  onClick="'.$value.'"/>';
						}

					?>
                         </div>
                           <!--- BUTTONS ACTIVITY END--->

                  </div>

						   </form>

    
    
							
                        </div>

                        <div id="postright">
                        
                        	<div id="tfheader">
                            	<form id="tfnewsearch" method="POST" action="new/search.php">
		        				<input id="search_string" type="text" name="search_string" class="tftextinput" placeholder="search..." />
                    			<button id="search_document" class="tfbutton">Search </button>
								</form>	
                                <h2></h2>						
                            </div>
                            <div class="tfclear"></div>
                        
                            <div class="scroll">
                        	                                    
                                <table id="responds">
                                	<tr class='usercolortest'>
                                	<th>Barcode</th>
                                    <th>Title</th>
                                	<th>Date</th>
                                	</tr>
                                </table>
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
				
				echo $_SESSION['Copyright']. "&nbsp;<img src=../../../images/home/icon/copyleft-icon.png width='14' height='14' />&nbsp;" .$_SESSION['Year']. "&nbsp;" .$_SESSION['Developer'];
				echo "&nbsp|";
			?>
			
			<a href="#">Contact Us</a> | Designed by: <a href="#">MIS</a> | <a href="#">Scroll Top</a></p>
        </div>
    
    </div>
	
</div>

</body>
</html>
