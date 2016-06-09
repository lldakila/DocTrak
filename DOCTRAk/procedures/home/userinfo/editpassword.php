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
                      <h2 style="padding-top:20px;">USER INFO - EDIT PASSWORD</h2>
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
                              			<form method="post" action="editpassword/process.php" onsubmit="return validate();" enctype="multipart/form-data">
                                    	<div id="table">
                              				<table>
                                            	<tr>	
                                                    <td>Current Password:</td>
                                                    <td><input id="currentpass" class="form-control" type="password" name="currentpass" /></td>
                                                </tr>
                                                <tr><td><br /><br /></td>
                                                                                                </tr>
                                                <tr>	
                                                    <td>New Password:</td>
                                                    <td><input id="newpass" class="form-control" type="password" name="newpass" /></td>
                                                </tr>
                                                
                                                <tr>	
                                                    <td>Verify Password:</td>
                                                    <td><input id="verifypass" class="form-control" type="password" name="verifypass" /></td>
                                                </tr>
                                                <tr>
                                                	<td></td>
                                                	<td style="float:right;"><input class="btn btn-primary" type="submit" value="Update" /></td>
                                                </tr>
                                            </table>
                                         </div>
                                         </form>
                                         
        <?php


                             echo "<div id='message' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>";

                             if($_SESSION['operation']=='save')
                             {

                                     echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Updated Successfully</div>";


                             }

                             elseif($_SESSION['operation']=='error')
                             {

                                     echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Something went wrong. Operation not Successful.</div>";
                             }

                                                         elseif($_SESSION['operation']=='passwordValidation')
                                                         {

                                     echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Old password verification error.</div>";
                             }


                             $_SESSION['operation']='clear';

                             echo "</div>";


     ?>
                                         
                                         
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

    <script language="JavaScript" type="text/javascript">


//function validate() {

	//if (document.getElementById('newpass').value != document.getElementById('verifypass').value)  {
		
		//alert ('Password doesnt match.');
		//return false;
		
		//}


//}

function validate()
	{
		//alert ('Please provide necessary inputs.');

		if ((document.getElementById('currentpass').value=='') || (document.getElementById('newpass').value=='') || (document.getElementById('verifypass').value==''))
		{
			alert ('Please provide necessary inputs.');
			return false;
		}
		
		if (document.getElementById('newpass').value != document.getElementById('verifypass').value)
		{
			alert ('Password dont match');
			return false;
		}
		
		return true;

	}
	
	
	

	
	
	
	
	
	
	

document.addEventListener("mousemove", function() {
		myFunction(event);
	});

	function myFunction(e) {
		$("#fade").fadeTo(3000,0.0);

	}


			$(document).ready(function() {
    

$('#feedbackDiv').feedBackBox();

    });
    
    
</script>
</body>
</html>
