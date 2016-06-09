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
<link rel="stylesheet" type="text/css" href="../../../css/jquery.growl.css" />
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap-table.css" />
<script src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="../../../js/jquery.growl.js"></script>


<script src="../../../js/bootstrap-table.js"></script>



<link href="../../../css/bootstrap-submenu.min.css" rel="stylesheet" />
</head>

<body>
<!------------------------------------------- header -------------------------------->
 <?php
    $PROJECT_ROOT= '../../../';
    include_once('../../../header.php');
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

	<div class="main">
    
    	<div class="container">
        <div class="row">
        	<div id="post">
            
            			<div id="post100" class="colsize">
                        <h2 style="padding-top:20px;">USER INFO</h2>
                        <hr class="hrMargin" style="margin-bottom:10px;">
                        
                        	<div class="col-xs-6 col-sm-3">
                            
                                        <div id="nav">
                                                <h4>PROFILE</h4>
                                                <ol>
                                                        <li><a href="userinfo.php"><span>PROFILE INFO</span></a></li>
							<!--<li><a href="editprofile.php"><span>EDIT PROFILE</span></a></li>-->
                                                        <li><a href="editpassword.php"><span>EDIT PASSWORD</span></a></li>
                                                </ol>
                                        </div>
                                        
                                        <div id="nav">
                                                <h4>MESSAGE</h4>
                                                <ol style="height: 345px;">
                                                        <li><a href="inbox.php"><span>INBOX</span></a></li>
<!--                                                        <li><a href="sentitems.php"><span>SENT ITEMS</span></a></li>
                                                        <li><a href="newmessage.php"><span>NEW MESSAGE</span></a></li>-->
                                                </ol>
                                        </div>
                                        
                          </div>
                              <div class="col-xs-12 col-sm-6 col-md-8">
                              			<form action="" name="" class="form-horizontal">
                              				
	                              				
                              				
                                    	<div id="table">
                              				

	                                                <?php

                                                                    include_once('../../connection.php');
                                                                    $query=select_info_multiple_key('SELECT SECURITY_USERNAME, SECURITY_NAME, FK_SECURITY_GROUPNAME,FK_OFFICE_NAME FROM security_user WHERE SECURITY_USERNAME = "'.$_SESSION['usr'].'" ');
                                                                    echo "
	                                                
	                                                <div class='form-group'>
																								    <label for='inputEmail3' class='col-sm-2 control-label'>Username:</label>
																								    <div class='col-sm-10'>
																								      <font style='font-weight:bold; font-size:12px;'><input type='text' name='username' id='username' class='form-control' readonly='readonly' value ='".$query[0]['SECURITY_USERNAME']."'/></font>
																								    </div>
																								  </div>
																								  
																								  <div class='form-group'>
																								    <label for='inputEmail3' class='col-sm-2 control-label'>Full Name:</label>
																								    <div class='col-sm-10'>
																								      <font style='font-weight:bold; font-size:12px;'><input type='text' name='fullname' id='fullname' class='form-control' readonly='readonly' value ='".$query[0]['SECURITY_NAME']."'/></font>
																								    </div>
																								  </div>
	                                                
	                                                <div class='form-group'>
																								    <label for='inputEmail3' class='col-sm-2 control-label'>Office:</label>
																								    <div class='col-sm-10'>
																								      <font style='font-weight:bold; font-size:12px;'><input type='text' name='office' id='office' class='form-control' readonly='readonly' value ='".$query[0]['FK_OFFICE_NAME']."'/></font>
																								    </div>
																								  </div>
	                                                
	                                                <div class='form-group'>
																								    <label for='inputEmail3' class='col-sm-2 control-label'>Group:</label>
																								    <div class='col-sm-10'>
																								      <font style='font-weight:bold; font-size:12px;'><input type='text' name='group' id='group' class='form-control' readonly='readonly' value ='".$query[0]['FK_SECURITY_GROUPNAME']."'/></font>
																								    </div>
																								  </div>
	                                                
	                                                ";

												?>

												

                                            
                                         </div>
                                                                                 
                                         </form>
                                         
                                         
                              </div>
                              <div class="tfclear"></div>	
    
    
							
                        </div>
                        <div class="tfclear"></div>

            
          </div>
        </div>
      </div>
    
  </div>

</div>
<!------------------------------------------- end content -------------------------------->

<!------------------------------------ footer ------------------------------------->
	<?php
    $PROJECT_ROOT= '../../../';
    include_once('../../../footer.php');
    //require_once("/procedures/connection.php");
    include_once($PROJECT_ROOT.'qvJscript.php');
   
  ?>
<!------------------------------------ end footer ------------------------------------->

<!-- Modal -->
       <?php
       include('../../../modal.php');
       ?>
<!-- End Modal -->
<script>
	
	$(document).ready(function() {
    

$('#feedbackDiv').feedBackBox();

    });
	
	
	</script>
</body>
</html>
