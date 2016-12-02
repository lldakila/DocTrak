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
			</ul>
		</div>
	</div>

    <div class="main">
            
		<div id="post">
			<div class="container">
				<div class="row">
					<div class="post">
						<div id="post100" class="colsize">
				                	 
							<div id="headform">
				
														
								<div class="checkHistory">
											
									<div class="panel panel-info">
										<div class="panel-heading">
											FILTER																
										</div>
											<div class="panel-body">
									  
												<div style="/* margin-top:10px; */">
												
												
													<form class="form-inline">
														<div class="form-group">
															<label >Date From:</label>
															<input type="date" class="form-control" id="datefrom" name="datefrom" placeholder="Date From" value="<?php echo date('Y-m-d'); ?>" />
														</div>
														<div class="form-group">
															<label >Date To:</label>
															<input type="date" class="form-control" id="dateto" placeholder="Date To" value="<?php echo date('Y-m-d'); ?>" />
														</div>
														<div class="form-group">
														
														
															<?php
															//require_once("../../../procedures/connection.php");
															if (($_SESSION['GROUP']=='POWER ADMIN')or ($_SESSION['GROUP']=='ADMIN'))
															{
																echo '<label style="padding-right:6px;">Office</label>';
																echo '<div class="form-group">';
														  
																echo '<select id="offices" class="form-control selectpicker" data-live-search="true" showSubtext="true" style="width:100px;" >';
																//<option class="bs-title-option" value="">Choose office.....</option>';
															

																$query1=select_info_multiple_key("select office_name, office_description from office order by office_name asc");
																   foreach($query1 as $var)
																   {
																	  echo "<option data-subtext='".$var['office_description']."' value='".$var['office_name']."' >".$var['office_name']."</option>";
																   }
																   echo '</select>';
																	echo '</div>';
															}
															?>
															<button id="filter" name="filter" class="btn btn-primary">Filter</button>
												
														</div>
													
													</form>
												
												</div>
												<div class="tfclear"></div>
																																			
											</div>
									</div>
									
									
		
									<div id="codetable">
										<div id="historydata" class="row" style="margin-top:10px;">
											
										</div>
									</div>
						  
						  
									
								</div>
										
								
							</div>
				
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


<link rel="stylesheet" type="text/css" href="../../../css/bootstrap-select.css" />
<script src="../../../js/bootstrap-select.js"></script>
    
    <script language="JavaScript" type="text/javascript">

		    $("#filter").click(function (e) {
		    	
			    e.preventDefault();
			    var datefrom=document.getElementById('datefrom').value;
			    var dateto=document.getElementById('dateto').value;
			    var officeFilter=null;
			   
			    if ($("#offices").length > 0)
			    	{
			    		officeFilter=document.getElementById('offices').value;
			    		
 						}
 				
 					
			    jQuery.ajax({
				    type: "POST",
				    url:"onprocess/search.php",
				    dataType:"text", // Data type, HTML, json etc.
				    data:{vdatefrom:datefrom,vdateto:dateto,vofficeFilter:officeFilter},
				    	beforeSend: function() 
				  	{
            	$("#filter").html('wait..');
            },
				    success:function(response){
					    $("#historydata").html(response);
							$("#filter").html('Filter');
				    },
				    error:function (xhr, ajaxOptions, thrownError){
					    alert(thrownError);
				    }
			    });
		    });






				$(document).ready(function() 
				{
    

						$('#feedbackDiv').feedBackBox();

    		});
	   








    </script>
</body>
</html>