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
    <link rel="stylesheet" type="text/css" href="../../../css/jquery.growl.css" />
    <link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">
    <script src="../../../js/jquery-1.10.2.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/bootstrap-select.js"></script>
    <script src="../../../js/jquery.growl.js"></script>




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
		      /* echo '<li class="bottomraduis"><a href="#"><span>BAC</span></a>
		      <ul>
			 <li><a href="javascript:bacDocument()"><span>New</span></a></li>
			 <li><a href="#"><span>Check In</span></a></li>
		 <li><a href="#"><span>Backlog</span></a></li>
		      </ul>
		   </li>'; */
		   }
		   ?>

		</ul>
	    </div>
</div>

	<div class="content1">
    
    	<div class="content2">
        
        	<div id="post">

            			<div id="post10">
                        <h2>LETTER MONITORING</h2>





                              <form name="flowtemplate" method="post" action="flowtemplate/process.php" onsubmit="return validate();">

    					<div class="table1">
    				<table>
                  	<tr>
                    	<td>Title:</td>

                        <td class="textinput">
                            <input id="primarykey" name="primarykey" type="hidden"  />
                            <input id="header_monitoring" name="header_monitoring" type="text" class="form-control" readonly="readonly"/> </td>
                    </tr>
                    <tr>
                    	<td>Note:</td>

                        <td class="textinput"><input id="note_monitoring" name="note_monitoring" type="text" class="form-control" readonly="readonly"/> </td>
                    </tr>
                    <tr>
                    	<td>Type:</td>

                        <td class="textinput"><input id="type" name="type" type="text" class="form-control" readonly="readonly"/> </td>
                    </tr>
                    <tr>
                    	<td>Owner:</td>

                        <td class="textinput"><input id="Owner" name="Owner" type="text" class="form-control" readonly="readonly"/> </td>
                    </tr>
                    <tr>
                          	<td>Attachment: </td>
				<td><span id="fileAttachment"> </span> </td>
                    </tr>
                    <tr>
                        <td>Status:</td>
                        <td>
			    <span id="officeList">
				
				
			    </span>
                        </td>
                    </tr>

                  </table>


                           <!--- BUTTONS ACTIVITY END--->
                           </div>

						   </form>
                        </div>
                        
                        	<div id="postright">
                            
                            		<div id="tfheader">
                                    	<form id="tfnewsearch" method="post" class="form-inline">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input id="search_string" type="text" name="search_string" class="form-control" placeholder="search..." />
                                                    <button id="search_letter" class="btn btn-default">Search </button>
                                                </div>
                                            </div>
                                        </form>	
                                        <h2></h2>	
                                    </div>
                                    <div class="tfclear"></div>
                                    
                            <div class="scroll">
                        	
                                    
                                <table id="responds">
                                    <tr class='usercolortest'>
                                	<th style="width:120px;">TITLE</th>
                                        <th style="width:150px;">TYPE</th>
					<th style="width:150px;">OWNER</th>
					<th>DATE</th>
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
			
			<a href="#">Scroll Top</a></p>
        </div>
    
    </div>
	
</div>

<!-- Modal -->
       <?php
       include('../../../modal.php');
       ?>
<!-- End Modal -->
    
    <script language="JavaScript" type="text/javascript">


function clickSearch(id,title,note,owner,doc_type) 
{
    document.getElementById("primarykey").value=id;
    document.getElementById("header_monitoring").value=title;
    document.getElementById("note_monitoring").value=note;
    //document.getElementById("owner_name").value=note;
    //alert(doc_type);
    retrieveType(doc_type);
    retrieveSender(owner);
    retrieveAttachment(id);
    retrieveOffice(id);
    //$('#fileAttachment').html('');
}

function retrieveType(type_id) 
    {
        var typeid = type_id; //build a post data structure
        var module='getType';
	jQuery.ajax({
            type: "POST",
            url:"crud.php",
            dataType:"text", // Data type, HTML, json etc.
            data:{module:module,typeid:typeid},
	    beforeSend: function() {
		document.getElementById('type').value="updating......";
	    },
            success:function(response){
		document.getElementById('type').value=response;
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    }
    
function retrieveSender(senderId)
    {
	var senderId = senderId; //build a post data structure
        var module='getSender';
	jQuery.ajax({
            type: "POST",
            url:"crud.php",
            dataType:"text", // Data type, HTML, json etc.
            data:{module:module,senderId:senderId},
	    beforeSend: function() {
		//$("#owner_name").value("updating......");
		document.getElementById('Owner').value="updating......";
	    },
            success:function(response){
		document.getElementById('Owner').value=response;
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    }
    
function retrieveAttachment(mailid)
{
    var mailid = mailid; 
    var module='getFile';
    
    jQuery.ajax({
            type: "POST",
            url:"crud.php",
            dataType:"text", 
            data:{module:module,mailid:mailid},
	   beforeSend: function() {
		$('#fileAttachment').html("updating......");
	    },
            success:function(response){
		$('#fileAttachment').html(response);
            },
           
            error:function (xhr, ajaxOptions, thrownError){
//                alert(thrownError);
            }
        });
}

function retrieveOffice(id)
{
     //var officeid = id; 
    var module='getOffices';
   
    jQuery.ajax({
            type: "POST",
            url:"crud.php",
            dataType:"text", 
            data:{module:module,officeid:id},
	   beforeSend: function() {
		$('#officeList').html("updating......");
	    },
            success:function(response){
		$('#officeList').html(response);
            },
           
            error:function (xhr, ajaxOptions, thrownError){
//                alert(thrownError);
            }
        });
}
    
$(document).ready(function() {
    $("#search_letter").click(function (e) {
    e.preventDefault();
    var searchText = $("#search_string").val(); //build a post data structure
    var module = "SearchLetter";
    jQuery.ajax({
	type: "POST",
	url:"crud.php",
	dataType:"text", // Data type, HTML, json etc.
	data:{module:module,searchText:searchText},
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


});

</script>
</body>
</html>
