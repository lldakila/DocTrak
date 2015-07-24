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
<script src="../../../js/jquery-1.10.2.min.js"></script>
<script src="../../../js/bootstrap.min.js"></script> 

</head>

<body>
 <?php
    $PROJECT_ROOT= '../../../';
    include_once('../../../header.php');
    ?>

<div class="content">

<div id="leftmenu">
<nav class="social">
          <ul>
              <li><a href="javascript:newDocument()">New<i><img src="../../../images/home/icon/newdoc1.gif" width="25px" height="25px" /></i></a></li>
              <li><a href="javascript:receiveDocument()">Receive<i><img src="../../../images/home/icon/receivedoc1.gif" width="25px" height="25px" /></i></a></li>
              <li><a href="javascript:releaseDocument()">Release<i><img src="../../../images/home/icon/releasedoc.gif" width="25px" height="25px" /></i></a></li>
              <li><a href="javascript:forpickupDocument()">For Pickup<i><img src="../../../images/home/icon/forpickup.gif" width="25px" height="25px" /></i></a></li>
              <?php
                 if ($_SESSION['BAC']==1 OR $_SESSION['GROUP']=='POWER ADMIN')
                {
              echo '<li><a href="javascript:bacDocument()">BAC<i><img src="../../../images/home/icon/forpickup.gif" width="25px" height="25px" /></i></a></li>';
                }
              ?>

          </ul>
      </nav>
</div>

	<div class="content1">
    
    	<div class="content2">
        
        	<div id="post">
            
            			<div id="post01">
                        <h2>USER INFO - EDIT PROFILE</h2>
                        
                        	<div class="groupnav">
                            
                                        <div id="nav">
                                                <h4>PROFILE</h4>
                                                <ol>
                                                        <li><a href="editprofile.php"><span>EDIT PROFILE</span></a></li>
                                                        <li><a href="editpassword.php"><span>EDIT PASSWORD</span></a></li>
                                                </ol>
                                        </div>
                                        
                                        <div id="nav">
                                                <h4>MESSAGE</h4>
                                                <ol style="height: 345px;">
                                                        <li><a href="inbox.php"><span>INBOX</span></a></li>
                                                        <li><a href="sentitems.php"><span>SENT ITEMS</span></a></li>
                                                        <li><a href="newmessage.php"><span>NEW MESSAGE</span></a></li>
                                                </ol>
                                        </div>
                                        
                              </div>
                              <div class="grouptable1">
                              			<form method="post" action="editprofile/process.php" onsubmit="return validate();" enctype="multipart/form-data">
                                    	<div id="table1">
                              				<table>
                                            	<tr>	
                                                    <td>USERNAME:</td>
                                                    <td><input id="username" class="form-control" type="text" name="username" value="<?php echo $_SESSION['usr']; ?>"/></td>
                                                </tr>
                                                <tr>	
                                                    <td>FULL NAME:</td>
                                                    <td><input id="fullname" class="form-control" type="text" name="fullname" value="<?php echo $_SESSION['security_name']; ?>"/></td>
                                                </tr>
												<tr>
                                                	<td></td>
                                                	<td style="float:right;"><input type="submit" class="btn btn-primary" value="Update" onclick="javascript:validate();" /></td>
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

		                              elseif($_SESSION['operation']=='error'){

			                              echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Something went wrong. Operation not Successful.</div>";
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



<div class="footer">

	<div class="footerbg">
    
    			<div id="footer2">
            <p>
			<?php
			
				echo $_SESSION['Copyright']. "&nbsp;<img src=../../../images/home/icon/copyleft-icon.png width='14' height='14' />&nbsp;" .$_SESSION['Year']. "&nbsp;" .$_SESSION['Developer'];
				echo "&nbsp|";
			?>
			
			<a href="#">Contact Us</a> | Designed by: <a href="#">MIS</a> | <a href="#">Scroll Top</a></p>
        </div>
    
    </div>
	
</div>

<!-- Modal -->
       <?php
       include('../../../modal.php');
       ?>
<!-- End Modal -->
    
    <script language="JavaScript" type="text/javascript">

	function validate()
	{
		//alert ('Please provide necessary inputs.');

		if ((document.getElementById('username').value=='') || (document.getElementById('fullname').value==''))
		{
			alert ('Please provide necessary inputs.');
			return false;
		}

	}

	document.addEventListener("mousemove", function() {
		myFunction(event);
	});

	function myFunction(e) {
		$("#fade").fadeTo(3000,0.0);

	}


</script>
</body>
</html>
