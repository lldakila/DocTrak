<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:index.php');
}
?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
<?php

 	echo $_SESSION['Title']. "" .$_SESSION['Version'];
//<script src="js/bootstrap.min.js"></script>
	
?>
</title>

<link href="css/bootstrap.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="css/home.css" />

<link rel="icon" href="images/home/icon/pglu.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="css/jquery.growl.css" />
<script src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


<script src="js/jquery.growl.js"></script>


<link href="css/bootstrap-submenu.min.css" rel="stylesheet" />


</head>

<body>

    <?php
    $PROJECT_ROOT= '';
    include_once('header.php');
    //require_once("/procedures/connection.php");
    include_once($PROJECT_ROOT.'qvJscript.php');
   
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
		
		<div id="rightmenu">
		
		    
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

                    <div id="postHOME">



<div class="card">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="active" role="presentation"><a href="#home" aria-controls="profile" role="tab" data-toggle="tab">Docs</a></li>
                                        <li role="presentation"><a href="#stats" aria-controls="home" role="tab" data-toggle="tab">Statistics</a></li>
                                        
                                        <li role="presentation"><a href="#info" aria-controls="messages" role="tab" data-toggle="tab">Info</a></li>
                                        
                                    </ul>

																				<div class="tab-content">
																				  <div id="home" class="tab-pane fade in active">
																						<div id="codetable">
																								<div id='docList' class="scrollHOME">
																								
																								</div>
																				
																								<div class="SHOWinput">
																										<label style="float: left; padding-top: 7px; margin-right:10px;">Filter:</label>
																										<div class="alignRIGHT">
																										  <select id="type" name="type" class="form-control" onchange="refreshList()">
																										  <option value='All'>All Documents</option>
																										  <option value='Pending'>Pending Documents</option>
																										  <option value='Approved'>Approved Documents</option>
																										<?php // <option value='Processing'>On Process Documents</option> ?>
																										  </select>
																										</div>
																										<p>*Double click document to view full details.</p>
																								</div>
																						</div>
																				  </div>
																				  <div id="stats" class="tab-pane fade">
																				<h3></h3>
																				<p>
																					
																					
																					</p>
																				  </div>
																				  <div id="info" class="tab-pane fade">
																				
																				<p>Whats New (v1.17)</p>
																					<ul>
																						<li>Improved Searching and Loading Speed</li>
																						<li>Incorporating Template Flow on document creation</li>
																						<li>New Home Page</li>
																						<li>Addition of Reports on Document Transactions</li>
																						<li>Feedback Module</li>
																						<li>and much more..</li>
																					</ul> 
																					<br>
																					<p>Upcoming Release</p>
																					<ul>
																						<li>Mobile Friendly Site</li>													
																						<li>Improved Gui</li>
																						<li>Improved System Manual</li>
																						<li>More Reports</li>
																						<li>Possible inclusion of BAC and Communication Modules</li>
																						<li>and much more</li>
																					</ul>
																				  </div>
																				</div>
																				</div>

                    </div>
            	 <div class="tfclear"></div>


            </div>

        </div>

    </div>

</div>

   <!-- Modal -->
       <?php
       include('modal.php');
       ?>
<!-- End Modal -->


<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css" />
<script src="js/bootstrap-select.js"></script>


    <script type="text/javascript">
    //AUTOFUNCTION ON LOAD
    function refreshList()
    {
        //alert(document.getElementById("type").value);
        var myData = 'action='+ document.getElementById("type").value;
       jQuery.ajax({
                type: "POST",
                url:"renderHome.php",
                dataType:"text", // Data type, HTML, json etc.
                data:myData,
                beforeSend: function() {
                            $("#docList").html("<div id='loading'><img src='images/home/ajax-loader.gif' align='middle' /></div>");
                    },
                ajaxError: function() {
                            $("#docList").html("<div id='loading'><img src='images/home/ajax-loader.gif' /></div>");
                    },
                success:function(response){
                            $("#docList").html(response);
                            

                },
                error:function (xhr, ajaxOptions, thrownError){
                    alert(thrownError);
                }
            });
             $(window).load(function(){
            //$('#myModal').modal('show');
        }); 
    }

    //FUNCTION THAT REFRESH THE LIST OF DOCUMENTS WHEN CHANGED ON COMBOBOX 
    function addRowHandlers()
    {
       
            var table = document.getElementById('HOMEdata');
             //alert (table);

        var rows = table.getElementsByTagName("tr");
        for (i = 0; i < rows.length; i++) {
            var currentRow = table.rows[i];
            var createClickHandler =
                function(row)
                {
                    return function() {
                                            var cell = row.getElementsByTagName("td")[0];
                                            var id = cell.innerHTML;


                                           retrieveDocument(id);
                                           $('#myModal').modal('show');
                                     };
                };

            currentRow.onclick = createClickHandler(currentRow);
        }
    }
    
    //FUNCTION THAT RETRIEVES THE DOCUMENT FROM addRowHandlers() AND OPENS MODAL FORM
    function retrieveDocument(BarcodeId)
    {
            var myData = 'documentTracker='+BarcodeId; //build a post data structure
            jQuery.ajax({
                type: "POST",
                url:"procedures/home/document/common/retrievedata.php",
                dataType:"text", // Data type, HTML, json etc.
                data:myData,
                beforeSend: function() {
                    $("#responds").html("<div id='loadingModal'><img src='images/home/ajax-loader.gif' /></div>");
                    },
                ajaxError: function() {
                    $("#responds").html("<div id='loadingModal'><img src='images/home/ajax-loader.gif' /></div>");
                    },
                success:function(response){
                    $("#responds").html(response);
                

                },
                error:function (xhr, ajaxOptions, thrownError){
                    alert(thrownError);
                }
            });
             $(window).load(function(){
            //$('#myModal').modal('show');
        });

        }

   
$(document).ready(function(){
refreshList();

$('#feedbackDiv').feedBackBox();





});

</script>
</body>
</html>
