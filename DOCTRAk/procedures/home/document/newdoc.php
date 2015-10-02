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
<link href="../../../css/bootstrap.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="../../../css/home.css" />
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap-select.css" />
<link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">
<script src="../../../js/jquery-1.10.2.min.js"></script>
<script src="../../../js/bootstrap.min.js"></script>
<script src="../../../js/bootstrap-select.js"></script>
</head>

<body>
<?php

    $PROJECT_ROOT= '../../../';
    include_once($PROJECT_ROOT.'qvJscript.php');
    include_once('../../../header.php');
?>

<div class="content">

<div id="leftmenu">
		<div id='cssmenu'>
		<ul>
		   <li class="bottomline topraduis"><a href='#'><span>DOC</span></a>
		      <ul>
			 <li><a href='javascript:newDocument()'><span>New</span></a></li>
			 <li><a href='javascript:receiveDocument()'><span>Receive</span></a></li>
		 <li><a href='javascript:releaseDocument()'><span>Release</span></a></li>
		 <li><a href='javascript:forpickupDocument()'><span>For Release</span></a></li>
		      </ul>
		   </li>
		   <?php
		   if ($_SESSION['BAC']==1 OR $_SESSION['GROUP']=='POWER ADMIN')
		   {
		      echo '<li class="bottomraduis"><a href="#"><span>BAC</span></a>
		      <ul>
			 <li><a href="javascript:bacDocument()"><span>New</span></a></li>
			 <li><a href="#"><span>Check In</span></a></li>
		 <li><a href="#"><span>Backlog</span></a></li>
		      </ul>
		   </li>';
		   }
		   ?>

		</ul>
	    </div>
</div>

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
                            <input id="barcodeinput" name="barcode" type="text" class="form-control" />
                            <input id="generatebarcode" type="button" value="Generate" class="btn btn-primary"/></td>
                    </tr>
                    <tr>
                    	<td>Title:</td>
                        <td class="usertext"><input id="title" name="title" type="text" class="form-control" /> </td>
                    </tr>
                    <tr>
                    	<td>Description:</td>
                        <td class="usertext"><input id="description" name="description" type="text" class="form-control" /> </td>
                    </tr>

                    <tr>

                    	<td>Type: </td>
                         <td class="select01">
                             <select id="type" name="type" class="form-control">

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
                             <select id="template" name="template" class="form-control selectpicker" style="width:475px;">

       <?php
           //require_once("../../connection.php");
          
                 $query1=select_info_multiple_key("select TEMPLATE_ID, template_name,fk_office_name,template_description from document_template ");
           foreach($query1 as $var)
           {
              echo "<option data-subtext='".$var['template_description']."' value='".$var['TEMPLATE_ID']."'>".$var['template_name']."</option>";
           }


    ?>
                              </select>
                               </td>

                    </tr>
                    <tr>
                    	<td>PDF File: </td>
                         <td><input id="file" name="pdffile" type="file" accept=".pdf" /> </td>
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

               echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Something went wrong. Operation not Successful.<br>";
               echo $_SESSION['message'];
               echo "</div>";
           }
           elseif($_SESSION['operation']=='scrap'){

	           echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Scrapped successfully.</div>";
           }
           elseif($_SESSION['operation']=='complete'){

	           echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Document is completed. Delete failed.</div>";
           }



               $_SESSION['operation']='clear';
               $_SESSION['message']='';

        echo "</div>";




?>

                  		 <!--- BUTTONS ACTIVITY START --->

                        <div class="input1">
                            
                             <?php
	                 

                            if($_SESSION['GROUP']=='POWER USER' or $_SESSION['GROUP']=='POWER ADMIN')
	                    {
		                    $value="document.getElementById('document_hidden').value='delete';";
		                    echo '<input  type="submit" value="Delete"  onClick="'.$value.'" class="btn btn-danger" />';
	                    }
                            if ($_SESSION['GROUP']!='ADMIN') 
                            {
                                    $value="document.getElementById('document_hidden').value='scrap';";
                                    echo '<input  type="submit" value="Scrap"  onClick="'.$value.'" class="btn btn-primary"/>';
                            }
					?>
                         <input id="document_hidden" name="document_hidden" type="hidden" value=""/>
                         <input type="submit" value="Save" onClick="document.getElementById('document_hidden').value='save';" class="btn btn-primary"/>
                         <input type="button" value="New" onClick="javascript:cleartext();" class="btn btn-primary"/>
	                     
                   
                         </div>
                           <!--- BUTTONS ACTIVITY END--->

                  </div>

						   </form>

    
    
							
                        </div>

                        <div id="postright">
                        
                        	<div id="tfheader">
                            	<form id="tfnewsearch" method="post"  class="form-inline">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input id="search_string" type="text" name="search_string" class="form-control" placeholder="search..." />
                    			<button id="search_document" class="btn btn-default">Search </button>
                                        </div>
                                    </div>
                                    </form>
                                    <!--AUTOSUGGEST SEARCH START-->
                                     <div id="display"></div>
                                     <!--AUTOSUGGEST SEARCH END-->
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

	<div class="footerbg">
    
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

<!-- Modal -->
       <?php
       include('../../../modal.php');
       ?>
<!-- End Modal -->

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
function clickSearch(barcode,title,description,template,type,scrap) {
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
                         beforeSend: function() {
		        $("#responds").html("<div id='loading' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
                        },
                        ajaxError: function() {
                                $("#responds").html("<div id='loading' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
                        },
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
            beforeSend: function() {
                $("#barcodeinput").html("<div id='loading' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
            },
            ajaxError: function() {
                $("#barcodeinput").html("<div id='loading' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
            },
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

// Autosuggest search//

    function fill(Value)
    {
        $('#search_string').val(Value);
        $('#display').hide();
    }
    
    $(document).ready(function()
    {
        $("#search_string").keyup(function() 
        {
            var name = $('#search_string').val();
            var searchtype = 'newDoc';
            if(name=="")
            {
                $("#display").html("");
            }
            else
            {
                $.ajax({
                type: "POST",
                url: "common/autosuggest.php",
                data: {search_string:name ,searchtype:searchtype},
                success: function(html){
                $("#display").html(html).show();
               
                }
                });
            }
        });
    });

</script>
</body>
</html>
