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
<link rel="stylesheet" href="../../../css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

<link rel="stylesheet" href="../../../font-awesome/4.2.0/css/font-awesome.min.css" />

<!-- text fonts -->
	<link rel="stylesheet" href="../../../fonts/fonts.googleapis.com.css" />

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

<!--
<link href="../../../css/bootstrap.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="../../../css/home.css" />
<link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon" />


    
<link href="../../../css/bootstrap.min.css" rel="stylesheet" />
<link href="../../../css/bootstrap-submenu.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-2.2.2.min.js" defer></script>
<script src="../../../js/bootstrap-submenu.min.js" defer></script>    
-->
</head>

<body>
<!------------------------------------------- header -------------------------------->
    <?php
	    $PROJECT_ROOT= '../../../';
	    include_once($PROJECT_ROOT.'qvJscript.php');
	    include_once('../../../header.php');
		?>
<!------------------------------------------- end header -------------------------------->

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

    <div class="content">

        <div class="main">

            <div id="post">
            	
				<div class="container">
					<div class="row">
						<div class="post">
							<div id="post100" class="col-xs-12 col-md-8">
								<h2>DOCUMENT TRACKER</h2>
								<hr class="hrMargin" style="margin-bottom:10px;">
									<div id="retrievetable" >
										<div id="ajaxhistory">
																
																
										</div>
									</div>
				
							</div>

							<div id="postright0" class="col-xs-6 col-md-4">
							
								
									<form id="tfnewsearch" method="post">
										
										<div class="input-group">
											<input id="search_string" type="text" name="search_string" class="form-control" placeholder="search..." />
											<span class="input-group-btn">
												<button id="search_document" class="btn btn-default btn-search">Search </button>
											</span>
										</div>
										
									</form>
									<!--AUTOSUGGEST SEARCH START-->
									<!--<div id="display"></div>-->
									<!--AUTOSUGGEST SEARCH END-->        
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
													<th class="col-md-2"  data-field="barcode" data-sortable="true">Barcode</th>
													<th  class="col-md-4" data-field="title" data-sortable="true">Title</th>
													<th  class="col-md-3" data-field="owner" data-sortable="true">Owner</th>
													<th class="col-md-3"  data-field="date" data-sortable="true">Date</th>
													<th  data-visible="false" data-field="description" data-sortable="true">description</th>
													<th data-visible="false" data-field="template" data-sortable="true">template</th>
													<th data-visible="false" data-field="type" data-sortable="true">type</th>														
												</tr>
											</thead>
										
												<!--<tr class='usercolortest'>
																	<th class="sizeBARCODE2">BARCODE</th>
																	<th class="sizeTITLE2">TITLE</th>
																	<th class="sizeOWNER2">OWNER</th>
																	<th>DATE</th>
												</tr>-->
										</table>
	  
									</div>
									  <!------ end search table ----->
							</div>

							<div class="tfclear"></div>

            			</div>
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
<!--<script src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
<script language="JavaScript" type="text/javascript">

$('#responds').on('click-row.bs.table', function (e, row, $element) {

		retrieveDocumentTracker(row['barcode']);
	

});
   

    function retrieveDocumentTracker(documentID){
        var myData = 'documentTracker='+documentID; //build a post data structure
        jQuery.ajax({
            type: "POST",
            url:"common/retrievedata.php",
            dataType:"text", // Data type, HTML, json etc.
            data:myData,
            beforeSend: function() {
		        $("#ajaxhistory").html("<div id='loading'><img src='../../../images/home/ajax-loader.gif' /></div>");
	        },
            ajaxError: function() {
		        $("#ajaxhistory").html("<div id='loading'><img src='../../../images/home/ajax-loader.gif' /></div>");

	        },
            success:function(response){
                        $("#ajaxhistory").html(response);
                        $("#ajaxhistory").append("<button id='DocConprint' name='print' class='btn btn-primary pull-right' style='margin-top:5px;'><span class='glyphicon glyphicon-print'></span> Print</button>");
                		
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    }

$(document).ready(function() {
        $("#search_document").click(function (e) {

            e.preventDefault();
            var myData = 'search_string='+ $("#search_string").val(); //build a post data structure
            jQuery.ajax({
                type: "POST",
                url:"tracker/search.php",
                dataType:"json", // Data type, HTML, json etc.
                data:myData,
                beforeSend: function() {
		        $("#responds").bootstrapTable("showLoading");
	        },
        
                success:function(response){
                    $("#responds").bootstrapTable("hideLoading");
                  $('#responds').bootstrapTable("load",response);

                },
                error:function (xhr, ajaxOptions, thrownError){
                    alert(thrownError);
                    $('#responds').bootstrapTable("hideLoading");
                }
            });
        });


			  $("#search_string").keyup(function() 
        {
            var name = $('#search_string').val();
            var searchtype = 'docTracker';
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

			$('#feedbackDiv').feedBackBox();


    });


// Autosuggest search//

    function fill(Value)
    {
        $('#search_string').val(Value);
        $('#display').hide();
    }
    
  


</script>

</body>
</html>