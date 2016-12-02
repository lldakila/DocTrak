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

<!-- Latest compiled and minified CSS -->
	<link href="css/bootstrap.css" rel="stylesheet"/>
	<link href="css/bootstrap-submenu.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.growl.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" /> -->

	<!-- Optional theme -->
	<!-- edit style css -->
	<link rel="stylesheet" type="text/css" href="css/home.css" />
	<link rel="stylesheet" href="css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

	<link rel="stylesheet" href="font-awesome/4.2.0/css/font-awesome.min.css" />

	<!-- text fonts -->
	<link rel="stylesheet" href="fonts/fonts.googleapis.com.css" />

	<link rel="icon" href="images/home/icon/pglu.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/jquery.growl.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-table.css" />
	<script src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>





<!-- ace settings handler -->
		

</head>

<body>
<!------------------------------------------- header -------------------------------->
    <?php
    $PROJECT_ROOT= '';
    include_once('header.php');
    //require_once("/procedures/connection.php");
    include_once($PROJECT_ROOT.'qvJscript.php');

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
		
		<div class="content">
			<div class="main">
				<div id="post">
					<div class="container">
						<div class="row">

							<div class="col-md-12 postTable">

								<div class="card">
									<ul class="nav nav-tabs" id="nav-tabs" role="tablist">
										<li class="active" role="presentation"><a href="#home" aria-controls="profile" role="tab" data-toggle="tab">Docs</a></li>
										<li role="presentation"><a href="#stats" aria-controls="home" role="tab" data-toggle="tab">Statistics</a></li>

										<li role="presentation"><a href="#info" aria-controls="messages" role="tab" data-toggle="tab">Info</a></li>

									</ul>

										<div class="tab-content">
											<div id="home" class="tab-pane fade in active">

												<!-- div.table-responsive -->

												<!-- div.dataTables_borderWrap -->
												<div id="docList">
													<table id="tableBootstrap"
														data-height="405"
														data-search="true"
														data-pagination="true"
														data-toggle="table"
														class="table table-striped table-bordered table-hover">
														<thead>
															<tr>
																<th data-field="barcode" data-sortable="true">Barcode</th>
																<th data-field="title" data-sortable="true">Title</th>
																<th data-field="type" data-sortable="true">Type</th>
																<th data-field="office" data-sortable="true">Originating Office</th>
																<th data-field="transdate" data-sortable="true"  data-width="20%"> Date </th>
																<th data-field="officeloc" data-sortable="true">Document Location</th>
																<th data-field="received" data-sortable="true">Date Received</th>
																<th data-field="forrelease" data-sortable="true">ForRelease Date</th>
																<th data-field="release" data-sortable="true">Date Released</th>
																<th data-field="status" data-sortable="true">Status</th>
																<th data-field="remark" data-sortable="true">Remark</th>
															</tr>
														</thead>
													</table>
													
													<div class="SHOWinput">
														<div class='row'>
															<div class="col-md-7 col-xs-7">
																	<label style="float: left; padding-top: 7px; margin-right:10px;">Filter:</label>
																	<div class="alignRIGHT">
																	  <select id="type" name="type" class="form-control" onchange="refreshList($('#chkRecord').is(':checked'))">
																	  <option value='All'>All Documents</option>
																	  <option value='Pending'>Pending Documents</option>
																	  <option value='Approved'>Approved Documents</option>

																	  </select>
																	</div>
															</div>

															<div class="col-md-5 col-xs-5">

																<div style="text-align:right;">
																	<label class="checkbox-inline">
																	  <input id="chkRecord" type="checkbox" checked> <font style='font-size:10px;'>Show last 100 records</font>
																	</label>
																<!--	<label class="checkbox-inline">
																	   <p>*Click document to view full details.</p> 
																	</label> -->
																</div>

															</div>

														</div>
													</div>
												</div>

											</div>
		<!------------------------------------------- STATS  -------------------------------->
											<div id="stats" class="tab-pane fade">

											 </div>

		<!------------------------------------------- STATS  -------------------------------->
											<div id="info" class="tab-pane fade">
												<p>Whats New (v2.00)</p>
												<ul>
													<li>Mobile Friendly Site</li>
													<li>Improved Gui</li>
													<li>Improved System Manual</li>
													<li>More Reports</li>
													<li>Faster Home Page Loading</li>
													<li>and much more..</li>
												</ul>
												<br>
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
													<li>Possible inclusion of BAC and Communication Modules</
												</ul>
											</div>
										</div>
								</div>

								<div class="tfclear"></div>
				
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
</div>
<!------------------------------------------- end content -------------------------------->

<!------------------------------------ footer ------------------------------------->
	<?php
    $PROJECT_ROOT= '';
    include_once('footer.php');
    //require_once("/procedures/connection.php");
    include_once($PROJECT_ROOT.'qvJscript.php');
   
  ?>
<!------------------------------------ end footer ------------------------------------->
   <!-- Modal -->
       <?php
       include('modal.php');
       ?>
<!-- End Modal -->

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		
		<!-- page specific plugin scripts -->
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="js/dataTables.tableTools.min.js"></script>
		<script src="js/dataTables.colVis.min.js"></script>
		
		<!-- ace scripts -->
		<script src="js/ace-elements.min.js"></script>
		<script src="js/ace.min.js"></script>
		
		<script src="js/jquery.growl.js"></script>
		<script src="js/bootstrap-table.js"></script>
		<script src="js/ace-extra.min.js"></script>


<script src="js/bootstrap-select.js"></script>


<script type="text/javascript">
    //AUTOFUNCTION ON LOAD
    function refreshList(retrieveAlldata)
    {
    	//alert(retrieveAlldata);
//    	alert($('#chkRecord').is(':checked'));
        //alert(document.getElementById("type").value);
       // alert($('#chkRecord').val());
        var myData = document.getElementById("type").value;
       jQuery.ajax({
                type: "POST",
                url:"renderHome.php",
                dataType:"json", // Data type, HTML, json etc.
                data:{action:myData,retrieveAll:retrieveAlldata},
                beforeSend: function() {
                           // $("#docList").html("<div id='loading'><img src='images/home/ajax-loader.gif' align='middle' /></div>");
                          $('#tableBootstrap').bootstrapTable("showLoading");
                    },
//                ajaxError: function() {
//                            $("#docList").html("<div id='loading'><img src='images/home/ajax-loader.gif' /></div>");
//                    },
                success:function(response){
                            //$("#docList").html(response);
                            $('#tableBootstrap').bootstrapTable("hideLoading");
                            
                             $('#tableBootstrap').bootstrapTable("load",response);

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
       
            var table = document.getElementById('tableBootstrap');
             alert (table);

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


		$('#feedbackDiv').feedBackBox();
		
		refreshList(true);
		
		$('#chkRecord').click(function() {
			 
        if ($("#chkRecord").prop('checked'))
        {
        	refreshList(true);
        
        }
        else
        	{
        		refreshList(false);
        	
        	}
    });
		
		$('.selectpicker').selectpicker();
		
});


$('#tableBootstrap').on('click-row.bs.table', function (e, row, $element) {
 //    console.log(row);
    retrieveDocument(row['barcode']);
    $('#myModal').modal('show');
});

           


</script>


</body>
</html>
