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
						                    <h2>BAC Archive</h2>
						          					<hr class="hrMargin" style="margin-bottom:10px;">          
						          
						                    <div id="BacHistory">
						                        <!--AJAX DATA INSERTED HERE-->
						                    </div>
						                    
						                </div>
						                
						                <div id="postright0" class="col-xs-6 col-md-4">
						
						                    
						                        <form id="tfnewsearch" method="post">
						                            
						                                <div class="input-group">
						                                    <input id="search_string" type="text" name="search_string" class="form-control" placeholder="search..." />
						                                    <span class="input-group-btn">
						                                    	<button id="search_document" class="btn btn-default">Search </button>
						                                  	</span>
						                                </div>
						                            
						                        </form>
						
						                        <!--AUTOSUGGEST SEARCH START-->
						                        <!-- <div id="display"></div>-->
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
																								<th  class="col-md-4" data-field="detail" data-sortable="true">Detail</th>
																								<th  class="col-md-3" data-field="cost" data-sortable="true">Cost</th>
																								<th class="col-md-3"  data-field="date" data-sortable="true">Date</th>
							
																				    </tr>
																				  </thead>
								                            
								                        </table>
								                    
								                  </div>
						                </div>
						                <div class="tfclear">
						                <!-- USED FOR FLOATING -->
						                </div>
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

<!--<link href="../../../css/bootstrap.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="../../../css/home.css" />
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap-select.css" />
<link rel="stylesheet" type="text/css" href="../../../css/jquery.growl.css" />

<script src="../../../js/bootstrap-select.js"></script>
<script src="../../../js/jquery.growl.js"></script>-->

<script type="text/javascript">

$(document).ready(function() 
{
    $("#search_document").click(function (e) {
    e.preventDefault();
    var search_Text=document.getElementById('search_string').value;
    var module_name = 'SearchArchive';
    jQuery.ajax({
            type: "POST",
            url:"search.php",
            dataType:"json", // Data type, HTML, json etc.
            data:{module:module_name,searchText:search_Text},
            beforeSend: function() 
            {
                $("#responds").bootstrapTable("showLoading");
            },
            success:function(response)
            {
                $("#responds").bootstrapTable("hideLoading");
			       		$('#responds').bootstrapTable("load",response);
            },
            error:function (xhr, ajaxOptions, thrownError)
            {
                $.growl.error({ message: thrownError });
            }
            });
	});
    
    
    $('#feedbackDiv').feedBackBox();
    
});

function clickSearch(doc_Id,docDetail,docCost,docDate)
{
     
    var module_name="historyCheckin";
    var document_id=doc_Id;
    jQuery.ajax({
            type: "POST",
            url:"search.php",
            dataType:"text", // Data type, HTML, json etc.
            data:{module:module_name,docId:document_id},
            beforeSend: function() 
            {
                $("#BacHistory").html("<div id='loading' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
            },
            success:function(response)
            {
                $("#BacHistory").html(response);
            },
            error:function (xhr, ajaxOptions, thrownError)
            {
                $.growl.error({ message: thrownError });
            }
        });
            
 }
 
$('#responds').on('click-row.bs.table', function (e, row, $element) {

clickSearch(row['barcode']);
});

</script>
</body>
</html>