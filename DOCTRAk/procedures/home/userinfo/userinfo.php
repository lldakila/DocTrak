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
<script src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>

<body>
 <?php
    $PROJECT_ROOT= '../../../';
    include_once('../../../header.php');
    include_once($PROJECT_ROOT.'qvJscript.php');
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

	<div class="content1">
    
    	<div class="content2">
        
        	<div id="post">
            
            			<div id="post01">
                        <h2>USER INFO</h2>
                        
                        	<div class="groupnav">
                            
                                        <div id="nav">
                                                <h4>PROFILE</h4>
                                                <ol>
                                                        <li><a href="userinfo.php"><span>PROFILE INFO</span></a></li>
							<li><a href="editprofile.php"><span>EDIT PROFILE</span></a></li>
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
                              <div class="grouptable">
                              			<form action="" name="">
                                    	<div id="table">
                              				<table>

	                                                <?php

                                                                    include_once('../../connection.php');
                                                                    $query=select_info_multiple_key('SELECT SECURITY_USERNAME, SECURITY_NAME, FK_SECURITY_GROUPNAME,FK_OFFICE_NAME FROM security_user WHERE SECURITY_USERNAME = "'.$_SESSION['usr'].'" ');
                                                                    echo "
	                                                <tr>
	                                                    <td>Username:</td>

	                                                    <td><font style='font-weight:bold; font-size:12px;'><input id='username' readonly='readonly' type='text' name='username' class='form-control' value ='".$query[0]['SECURITY_USERNAME']."'/></font></td>
	                                                </tr>
	                                                <tr>
	                                                    <td>Full Name:</td>
	                                                    <td><font style='font-weight:bold; font-size:12px;'><input id='fullname' readonly='readonly' type='text' name='fullname' class='form-control' value ='".$query[0]['SECURITY_NAME']."'/></font></td>
	                                                </tr>
	                                                <tr>
	                                                    <td>Office:</td>
	                                                    <td><font style='font-weight:bold; font-size:12px;'><input id='office' readonly='readonly' type='text' name='office' class='form-control' value ='".$query[0]['FK_OFFICE_NAME']."'/></font></td>
	                                                </tr>
	                                                <tr>
	                                                    <td>Group:</td>
	                                                    <td><font style='font-weight:bold; font-size:12px;'><input id='group' readonly='readonly' type='text' name='group' class='form-control' value='".$query[0]['FK_SECURITY_GROUPNAME']."'/></font></td>
	                                                </tr>";

												?>

												

                                            </table>
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

</body>
</html>
