<?php
if (session_status() == PHP_SESSION_NONE) 
{
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd']))
{
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
			            		<form name="process" method="post" action="rollback/process.php"  onsubmit="return validate();" enctype="multipart/form-data">
			                    	<div id="post100" class="col-xs-12 col-md-8">			                    		
			                        <h2>ROLLBACK DOCUMENT</h2>
			                        	<hr class="hrMargin" style="margin-bottom:10px;">
			                       
			                            <div id="ajaxhistory">
			                            	
			                            </div>
			                        
					                        <div id="officelist">
					                            <div class="actionButton">
					                                
					                            </div>
					                        </div>
			                        
			                        
			
			                            <?php
			                         
			                            if($_SESSION['operation']=='save')
			                            {
			                                echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Rollbacked Successfully</div>";     
			                            }
			                            elseif ($_SESSION['operation']=='error') 
			                            {
			                                echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Something went wrong.</div>";     
			                            }
			
			                            $_SESSION['operation']='clear';
			                            ?>
			                        
			                       </div>
			            		</form>
			            		
	                    <div id="postright0" class="col-xs-6 col-md-4">
	                    
	                        
	                        		<form id="tfnewsearch" method="post">
	                                
	                                    <div class="input-group">
			                                	<input id="search_string" type="text" name="search_string" class="form-control" placeholder="search..." />
			                                	<span class="input-group-btn">
			                                		<button id="search_rollback" class="btn btn-default" >Search </button>
			                                	</span>
			                                </div>
			                                
			                                <hr class="hrMargin" style="margin-top:8px;">
	                                
	                                    <div class="checkbox" id="checkbox">
	                                        <label><input type="checkbox" id="searchCheck" name="searchCheck"><p style="font-size:10px; color:#000;">Include Completed Document:</p></label>
	                                    </div>
	                                
	                                
	                            </form>
	                            <div class="tfclear"></div>
		                        		<!--AUTOSUGGEST SEARCH START-->
		                            <!--<div id="display"></div>-->
		                            <!--AUTOSUGGEST SEARCH END-->
		                            
	                        			<div class="postright">
					                       
					                    	                                    
					                            <table id="responds"
					                            	data-height="400"
																	      data-toggle="table"
																	      class="display table table-bordered"
																	      data-striped="true"
					                            >
					                            	<thead>
																			    <tr>
																							<th class="col-md-2"  data-field="barcode" data-sortable="true">Barcode</th>
																							<th  class="col-md-4" data-field="title" data-sortable="true">Title</th>
																							<th  class="col-md-3" data-field="owner" data-sortable="true">Owner</th>
																							<th class="col-md-3"  data-field="date" data-sortable="true">Date</th>
																							<th  data-visible="false" data-field="description" data-sortable="true">description</th>
																							<th data-visible="false" data-field="template" data-sortable="true">template</th>
																							<th data-visible="false" data-field="type" data-sortable="true">type</th>
																							
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
<!------------------------------------------- end content -------------------------------->

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

$('#responds').on('click-row.bs.table', function (e, row, $element) {

		retrieveDocumentTracker(row['barcode']);
	

});

$(document).ready(function() {
    
    $("#search_rollback").click(function (e) {
    var searchCheckbox=document.getElementById('searchCheck').checked;
   
    e.preventDefault();

    jQuery.ajax({
            type: "POST",
            url:"rollback/search.php",
            dataType:"json", // Data type, HTML, json etc.
            data:{search_string:$("#search_string").val(),searchCheck:searchCheckbox},
            beforeSend: function() 
            {
                $("#responds").bootstrapTable("showLoading");
            },
//            ajaxError: function() 
//            {
//                 $("#responds").html("<div id='loading' style='width:300px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
//            },
            success:function(response)
            {
                $("#responds").bootstrapTable("hideLoading");
                $('#responds').bootstrapTable("load",response);
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
                $('#responds').bootstrapTable("hideLoading");
            }
            });
	});
	
	
	$('#feedbackDiv').feedBackBox();

    });
    
   

    function retrieveDocumentTracker(documentID)
    {
        var myData = 'documentTracker='+documentID; //build a post data structure
        jQuery.ajax({
            type: "POST",
            url:"common/retrievedata.php",
            dataType:"text", // Data type, HTML, json etc.
            data:myData,
            beforeSend: function() {
		        $("#ajaxhistory").html("<div id='loading'><img src='../../../images/home/ajax-loader.gif' /></div>");
                        $("#officelist").html("<div id='loading'><img src='../../../images/home/ajax-loader.gif' /></div>");
	        },
            ajaxError: function() {
		         $("#ajaxhistory").html("<div id='loading'><img src='../../../images/home/ajax-loader.gif' /></div>");
		        $("#officelist").html("<div id='loading'><img src='../../../images/home/ajax-loader.gif' /></div>");
	        },
            success:function(response){
                        $("#ajaxhistory").html(response);
                        createList(documentID);
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    }
    
    function createList(documentID)
    {
        var myData = 'barcodeNo='+documentID; //build a post data structure
        jQuery.ajax({
            type: "POST",
            url:"rollback/createList.php",
            dataType:"text", // Data type, HTML, json etc.
            data:myData,
            beforeSend: function() {
		        $("#officelist").html("<div id='loading'><img src='../../../images/home/ajax-loader.gif' /></div>");
	        },
            ajaxError: function() {
		        $("#officelist").html("<div id='loading'><img src='../../../images/home/ajax-loader.gif' /></div>");
	        },
            success:function(response){
                        $("#officelist").html(response);
                
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    }
    
    document.addEventListener("mousemove", function() {
        myFunction(event);
    });

    function myFunction(e) {
            $("#fade").fadeTo(3000,0.0);

}
    
    function validate()
    {
     if (confirm("Are you sure you want to rollback? This action is irreversible.") == true) 
     {  
         return true;
     }
     return false;
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
            var searchtype = 'Rollback';
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
