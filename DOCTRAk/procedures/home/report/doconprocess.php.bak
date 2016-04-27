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

<link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">


    
    
    
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
		 

		</ul>
	    </div>
</div>

    <div class="content1">

        <div class="content2">

            <div id="post">

                <div id="post01">
                	 <h2></h2>
                    <div id="headform">

										
							<div class="checkHistory">
																
										
										
										
												<div class="panel panel-info">
												  <div class="panel-heading">FILTER</div>
												  <div class="panel-body">
												  
														<div style="margin-top:10px;">
															
															
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
																	echo '<label >Office</label>';
															  echo '<div class="form-group">';
															  
																echo '<select id="offices" class="form-control selectpicker" style="width:605px;" data-live-search="true"  title="Choose one of the following...">';
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

<script src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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






	   








    </script>
</body>
</html>