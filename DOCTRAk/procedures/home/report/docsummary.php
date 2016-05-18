 


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
                <div id="post100" class="colsize">

                    	<div id="headform">

										
														<div class="checkHistory">		
																	
																			<div class="panel panel-info">
																			  <div class="panel-heading">FILTER</div>
																			  <div class="panel-body">
																			  <div id="headtable">
																						
																						
																						<form class="form-inline">
																						  <div class="form-group">
																							<label for="exampleInputName2">Date From:</label>
																							<input type="date" class="form-control" id="datefrom" name="datefrom" placeholder="Date From" value="<?php echo date('Y-m-d'); ?>" />
																						  </div>
																						  <div class="form-group">
																							<label for="exampleInputEmail2">Date To:</label>
																							<input type="date" class="form-control" id="dateto" placeholder="Date To" value="<?php echo date('Y-m-d'); ?>" />
																						  </div>
																							
																							<div class="form-group">
																							
																								
																								
																								
																							</div>
																						<button id="filter" name="filter" class="btn btn-primary">Filter </button>
																						
																						
																						</form>
																						
																					</div>
																					
																					<div class="tfclear"></div>
																						
																				
																				
																				
																			  </div>
																			</div>
																	
																	
															
														</div>

                        </div>
                      <div id="codetable">
                            <div class="scroll">
                        				<table id="historydata">
                                	<tr>
                                						<th>No</th>
                                            <th>Barcode</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Activity</th>
                                  </tr>


                               </table>
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
<!------------------------------------ end content ------------------------------------->

<!------------------------------------------- footer -------------------------------->
    <?php
	    $PROJECT_ROOT= '../../../';
	    include_once($PROJECT_ROOT.'qvJscript.php');
	    include_once('../../../footer.php');
		?>
<!------------------------------------------- end footer -------------------------------->

<!-- Modal -->
  
<!-- End Modal -->
    
    <script language="JavaScript" type="text/javascript">




/////////////////////////////////////////////////////////
//CHECK FOR VALID DATE ENTERED
////////////////////////////////////////////////////////



	  
    
  


				$(document).ready(function() {
    

$('#feedbackDiv').feedBackBox();

    });



    </script>
     <?php
       include('../../../modal.php');
       ?>
</body>
</html>