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
                        <h2>USER INFO</h2>
                        
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
                              <div class="grouptable">
                              			<form action="" name="">
                                    	<div id="table">
                              				<table>

	                                                <?php

                                                                    include_once('../../connection.php');
                                                                    $query=select_info_multiple_key('SELECT SECURITY_USERNAME, SECURITY_NAME, FK_SECURITY_GROUPNAME,FK_OFFICE_NAME FROM security_user WHERE SECURITY_USERNAME = "'.$_SESSION['usr'].'" ');
                                                                    echo "
	                                                <tr>
	                                                    <td>USERNAME:</td>

	                                                    <td><font style='font-weight:bold; font-size:12px;'><input id='username' readonly='readonly' type='text' name='username' class='form-control' value ='".$query[0]['SECURITY_USERNAME']."'/></font></td>
	                                                </tr>
	                                                <tr>
	                                                    <td>FULL NAME:</td>
	                                                    <td><font style='font-weight:bold; font-size:12px;'><input id='fullname' readonly='readonly' type='text' name='fullname' class='form-control' value ='".$query[0]['SECURITY_NAME']."'/></font></td>
	                                                </tr>
	                                                <tr>
	                                                    <td>OFFICE:</td>
	                                                    <td><font style='font-weight:bold; font-size:12px;'><input id='office' readonly='readonly' type='text' name='office' class='form-control' value ='".$query[0]['FK_OFFICE_NAME']."'/></font></td>
	                                                </tr>
	                                                <tr>
	                                                    <td>GROUP:</td>
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
			
			<a href="#">Contact Us</a> | Designed by: <a href="#">MIS</a> | <a href="#">Scroll Top</a></p>
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
