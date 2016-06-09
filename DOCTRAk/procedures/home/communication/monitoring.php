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
<link rel="stylesheet" type="text/css" href="../../../css/jquery.growl.css" />
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap-table.css" />
<script src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="../../../js/jquery.growl.js"></script>


<script src="../../../js/bootstrap-table.js"></script>

<script src="../../../js/bootstrap-select.js"></script>

<link href="../../../css/bootstrap-submenu.min.css" rel="stylesheet" />
</head>

<body>
<!------------------------------------------- header -------------------------------->	
<?php
    $PROJECT_ROOT= '../../../';
    include_once($PROJECT_ROOT.'qvJscript.php');
    include_once('../../../header.php');
?>
<!------------------------------------------- end header -------------------------------->	

<!------------------------------------------- content -------------------------------->	    
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

	<div class="main">

      <div id="post">
      	
      	<div class="container">
						<div class="row">
								<div class="post">

            			<div id="post100" class="col-xs-12 col-md-8">
                      <h2>LETTER MONITORING</h2>
                      <hr class="hrMargin" style="margin-bottom:10px;">

                              
																	
											    					<div class="table1 form-horizontal">
											    							
											    							<div class="form-group">
																				    <label class="col-sm-2 control-label">Title:</label>
																				    <div class="col-sm-10">
																				    		
																				      	<input id="Title_monitoring" name="header_monitoring" type="text" class="form-control" readonly="readonly"/>
																				    </div>
																			  </div>
																			  
																			  <div class="form-group">
																				    <label class="col-sm-2 control-label">Note:</label>
																				    <div class="col-sm-10">
																				    		<input id="note_monitoring" name="note_monitoring" type="text" class="form-control" readonly="readonly"/>
																				    </div>
																			  </div>
																			  
																			  <div class="form-group">
																				    <label class="col-sm-2 control-label">Type:</label>
																				    <div class="col-sm-10">
																				    		<input id="doctype" name="type" type="text" class="form-control" readonly="readonly"/>
																				    </div>
																			  </div>
																			  
																			  <div class="form-group">
																				    <label class="col-sm-2 control-label">Owner:</label>
																				    <div class="col-sm-10">
																				    		<input id="Owner" name="Owner" type="text" class="form-control" readonly="readonly"/>
																				    </div>
																			  </div>
																			  
																			  <div class="form-group">
																				    <label class="col-sm-2 control-label">Attachment:</label>
																				    <div class="col-sm-10">
																				    		<span id="fileAttachment"> </span>
																				    </div>
																			  </div>
																			  
																			  <div class="form-group">
																				    <label class="col-sm-2 control-label">Status:</label>
																				    <div class="col-sm-10">
																				    		<span id="officeList"> </span>
																				    </div>
																			  </div>
											    						
											                           <!--- BUTTONS ACTIVITY END--->
											              </div>

						   								
                  </div>
                        
                        	<div id="postright0" class="col-xs-6 col-md-4">
                            
                            		
                                    	<form id="tfnewsearch" method="post">
                                            
                                                <div class="input-group">
                                                    <input id="search_string" type="text" name="search_string" class="form-control" placeholder="search..." />
                                                    <span class="input-group-btn">
                                                    	<button id="search_letter" class="btn btn-default">Search </button>
                                                  	</span>
                                                </div>
                                            
                                      </form>	
                                        
                                 				<hr class="hrMargin">
                                    
                               <div class="postright">     
			                            
			                        	
			                                    
			                                <table id="responds"
			                                	data-height="430"
																	      data-toggle="table"
																	      class="display table table-bordered"
																	      data-striped="true"
			                                >
			                                	<thead>
																			    <tr>
																			    		<th   data-field="commailId" data-sortable="true" data-visible="false">commailId</th>
																							<th class="col-md-2"  data-field="title" data-sortable="true">Title</th>
																							<th  class="col-md-4" data-field="type" data-sortable="true">Type</th>
																							<th  class="col-md-3" data-field="owner" data-sortable="true">Owner</th>
																							<th class="col-md-3"  data-field="date" data-sortable="true">Date</th>
																							
																			    </tr>
																			  </thead>
			                                    
			                                </table>
			                            
			                         </div>
                         	</div>


                        <div class="tfclear"></div>
                </div>
						</div>
        </div>    
      </div>
    
  </div>

</div>
<!------------------------------------ end content ------------------------------------->

<!------------------------------------------- footer -------------------------------->
    <?php
	    $PROJECT_ROOT= '../../../';
	    include_once($PROJECT_ROOT.'qvJscript.php');
	    include_once('../../../footer.php');
		?>
<!------------------------------------------- end footer -------------------------------->

<!-- Modal -->
       <?php
       include('../../../modal.php');
       ?>
<!-- End Modal -->
    
    <script language="JavaScript" type="text/javascript">


//function clickSearch(id,title,note,owner,doc_type) 
//{
//    document.getElementById("primarykey").value=id;
//    document.getElementById("header_monitoring").value=title;
//    document.getElementById("note_monitoring").value=note;
//    //document.getElementById("owner_name").value=note;
//    //alert(doc_type);
//    retrieveType(doc_type);
//    retrieveSender(owner);
//    retrieveAttachment(id);
//    retrieveOffice(id);
//    //$('#fileAttachment').html('');
//}

//function retrieveType(type_id) 
//    {
//        var typeid = type_id; //build a post data structure
//        var module='getType';
//	jQuery.ajax({
//            type: "POST",
//            url:"crud.php",
//            dataType:"text", // Data type, HTML, json etc.
//            data:{module:module,typeid:typeid},
//	    beforeSend: function() {
//		document.getElementById('type').value="updating......";
//	    },
//            success:function(response){
//		document.getElementById('type').value=response;
//            },
//            error:function (xhr, ajaxOptions, thrownError){
//                alert(thrownError);
//            }
//        });
//    }
//    
//function retrieveSender(senderId)
//    {
//	var senderId = senderId; //build a post data structure
//        var module='getSender';
//	jQuery.ajax({
//            type: "POST",
//            url:"crud.php",
//            dataType:"text", // Data type, HTML, json etc.
//            data:{module:module,senderId:senderId},
//	    beforeSend: function() {
//		//$("#owner_name").value("updating......");
//		document.getElementById('Owner').value="updating......";
//	    },
//            success:function(response){
//		document.getElementById('Owner').value=response;
//            },
//            error:function (xhr, ajaxOptions, thrownError){
//                alert(thrownError);
//            }
//        });
//    }
    
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
		$('#fileAttachment').html("<div id='loadingDOC' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
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
		$('#officeList').html("<div id='loadingDOC' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
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
									dataType:"json", // Data type, HTML, json etc.
									data:{module:module,searchText:searchText},
									beforeSend: function() {
									    $("#responds").bootstrapTable("showLoading");
									},
									success:function(response){
									    $("#responds").bootstrapTable("hideLoading");
											$('#responds').bootstrapTable("load",response);
									},
									error:function (xhr, ajaxOptions, thrownError){
										alert(thrownError);
									}
						});
	});

	$('#feedbackDiv').feedBackBox();

});




$('#responds').on('click-row.bs.table', function (e, row, $element)
{
		//document.getElementById("primarykey").value=row['id'];
    document.getElementById("Title_monitoring").value=row['title'];
    document.getElementById("note_monitoring").value=row['note'];
    document.getElementById("Owner").value=value=row['owner'];
    document.getElementById("doctype").value=value=row['type'];
    //alert(doc_type);
//    retrieveType(doc_type);
//    retrieveSender(owner);
    retrieveAttachment(row['commailId']);
    retrieveOffice(row['commailId']);
});

</script>
</body>
</html>
