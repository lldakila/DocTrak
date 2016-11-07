<?php
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
	  $_SESSION['in'] ="start";
	 header('Location:../../../index.php');
	}

?>

<!DOCTYPE>
<html>
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
							<h2>HISTORY</h2>
							<hr class="hrMargin" style="margin-bottom:10px;">
						
						</div>
							
	                    <div id="postright0" class="col-xs-6 col-md-4">
						
							<form id="condocsearch" method="post">
								
								<div class="input-group">
									<input id="#" type="text" name="search_string" class="form-control" placeholder="search..." />
									<span class="input-group-btn">
										<button id="search_condoc" class="btn btn-default" >Search </button>
									</span>
								</div>
									
								<hr class="hrMargin" style="margin-top:8px;">
								
							</form>
							
	                        <div class="tfclear"></div>
		                    
							<div class="postright">
							   
								<table id="#"
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

	$(document).ready(function() {
    
		$('#feedbackDiv').feedBackBox();
   
	});

    </script>
    
    
</body>
</html>
