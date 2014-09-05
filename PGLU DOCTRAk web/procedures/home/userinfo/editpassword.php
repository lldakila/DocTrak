<?php
session_start();
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
session_start();
 	echo $_SESSION['Title']. "" .$_SESSION['Version'];
?>
</title>
<script src="../../../js/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../../css/home.css" />
<link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">

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

</script>
</head>

<body>
<div class="header">

	<div class="header1">
    
    	<div class="headerline">
    
    	<div class="headerbanner">
        
        		<img src="../../../images/home/doctraklogo2.png" width="125" height="120" alt="PGLU" title="PGLU" align="left" /><h2>
				<?php
						session_start();
						echo $_SESSION['Title']. "<span style='font-size:12px;'>&nbsp;" .$_SESSION['Version'];
						echo "</span>";
				?>
				
				</h2><p>Management Information System</p>
        
        </div>

        <div class="menugroup">
        
        <div id="menu">
 
            <ul class="menu">
        <li><a href="../../../home.php" class="parent"><span>HOME</span></a></li>
        <li><a href="#" class="parent"><span>DOCUMENT</span></a>
        	<ul>
                <li><a href="../document/newdoc.php"><span>NEW DOCUMENT</span></a></li>
                            <li><a href="../document/receiveddoc.php"><span>RECEIVED DOCUMENT</span></a></li>
                            <li><a href="../document/releasedoc.php"><span>RELEASE DOCUMENT</span></a></li>
                            <li><a href="../document/forreleasedoc.php"><span>FOR RELEASE</span></a></li>
                            <li><a href="../document/documenttracker.php"><span>DOCUMENT TRACKER</span></a></li>
                            <li><a href="../document/documentprocessing.php"><span>PROCESSING</span></a></li>
            </ul>
        </li>
        <li><a href="#"><span>REPORT</span></a>
        	<ul style="width:265px;">
                <li><a href="../report/dochistory.php"><span>DOCUMENT HISTORY</span></a></li>
				<li><a href="../report/doconprocess.php"><span>DOCUMENT ON PROCESS</span></a></li>
                <li><a href="../report/doconprocesspersignatory.php"><span>DOCUMENT ON PROCESS PER SIGNATORY</span></a></li>
                <li><a href="../report/docpersignatory.php"><span>DOCUMENTS PER SIGNATORY</span></a></li>
            </ul>
        </li>
	            <?php
		            if($_SESSION['GROUP']=='POWER ADMIN')
		            {

			            echo '<li><a href="#"><span>MAINTENANCE</span></a>
                <ul>
                        <li><a href="../maintenance/documenttype.php"><span>DOCUMENT TYPE</span></a></li>
                        <li><a href="../maintenance/office.php"><span>OFFICES</span></a></li>
                        <li><a href="../maintenance/flowtemplate.php"><span>FLOW TEMPLATE</span></a></li>
                        <li><a href="#" class="parent"><span>SECURITY</span></a>
                            <ul>
                                <li><a href="../maintenance/users.php"><span>USERS</span></a></li>
                                <li><a href="../maintenance/group.php"><span>GROUP</span></a></li>
                            </ul>
                        </li>
                </ul>
                </li>';
		            }

	            ?>

	            <li><a href="userinfo.php"><span>USER INFO</span></a></li>
        <li><a href="../../../about.php"><span>ABOUT</span></a></li>
        <li><a href="../logout.php"><span>LOGOUT</span></a></li>

        </ul>
        </div>
		
       
        <div class="admin">
         <?php
          session_start();
	         require_once("../../connection.php");
	         global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
	         $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
	         $query="SELECT MAIL_ID FROM MAIL WHERE FK_SECURITY_USERNAME_OWNER = '".$_SESSION['usr']."' AND MAILSTATUS=0";
	         $result=mysqli_query($con,$query);
	         while ($row = mysqli_fetch_array($result))
	         {

		         echo '<a href="inbox.php"><img src="../../../images/home/icon/testmail.gif" width="30" height="20" align="left" /></a>&nbsp';

	         }
           echo "Hi, ".$_SESSION['security_name']." of ".$_SESSION['OFFICE']."";


        ?>
        </div>
					 
            
            
        </div>
        
        </div>
    
    </div>

</div>

<div class="content">

	<div class="content1">
    
    	<div class="content2">
        
        	<div id="post">
            
            			<div id="post01">
                        <h2>USER INFO - EDIT PASSWORD</h2>
                        
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
                                                <ol>
                                                        <li><a href="inbox.php"><span>INBOX</span></a></li>
                                                        <li><a href="sentitems.php"><span>SENT ITEMS</span></a></li>
                                                        <li><a href="newmessage.php"><span>NEW MESSAGE</span></a></li>
                                                </ol>
                                        </div>
                                        
                              </div>
                              <div class="grouptable">
                              			<form method="post" action="editpassword/process.php" onsubmit="return validate();" enctype="multipart/form-data">
                                    	<div id="table">
                              				<table>
                                            	<tr>	
                                                    <td>CURRENT PASSWORD:</td>
                                                    <td><input id="currentpass" type="password" name="currentpass" /></td>
                                                </tr>
                                                <tr><td><br /><br /></td>
                                                                                                </tr>
                                                <tr>	
                                                    <td>NEW PASSWORD:</td>
                                                    <td><input id="newpass" type="password" name="newpass" /></td>
                                                </tr>
                                                
                                                <tr>	
                                                    <td>VERIFY PASSWORD:</td>
                                                    <td><input id="verifypass" type="password" name="verifypass" /></td>
                                                </tr>
                                                <tr>
                                                	<td></td>
                                                	<td style="float:right;"><input type="submit" value="Update" /></td>
                                                </tr>
                                            </table>
                                         </div>
                                         </form>
                                         
                                         <?php
				                              session_start();

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

<div class="footer">

	<div class="footer1">
    
    			<div id="footer2">
            <p>
			<?php
				session_start();
				echo $_SESSION['Copyright']. "&nbsp;<img src=../../../images/home/icon/copyleft-icon.png width='14' height='14' />&nbsp;" .$_SESSION['Year']. "&nbsp;" .$_SESSION['Developer'];
				echo "&nbsp|";
			?>
			
			<a href="#">Contact Us</a> | Designed by: <a href="#">MIS</a> | <a href="#">Scroll Top</a></p>
        </div>
    
    </div>
	
</div>

</body>
</html>
