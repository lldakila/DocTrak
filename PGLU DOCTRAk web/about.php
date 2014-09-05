<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:index.php');
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
<link rel="stylesheet" media="screen" type="text/css" href="css/home.css" />
<link rel="icon" href="images/home/icon/pglu.ico" type="image/x-icon">
</head>

<body>
<div class="header">

	<div class="header1">
    
    	<div class="headerline">
    
    	<div class="headerbanner">
        
        		<img src="images/home/doctraklogo2.png" width="125" height="120" alt="PGLU" title="PGLU" align="left" /><h2>
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
        <li><a href="home.php" class="parent"><span>HOME</span></a></li>
        <li><a href="#" class="parent"><span>DOCUMENT</span></a>
        	<ul>
                <li><a href="procedures/home/document/newdoc.php"><span>NEW DOCUMENT</span></a></li>
                            <li><a href="procedures/home/document/receiveddoc.php"><span>RECEIVED DOCUMENT</span></a></li>
                            <li><a href="procedures/home/document/releasedoc.php"><span>RELEASE DOCUMENT</span></a></li>
                            <li><a href="procedures/home/document/forreleasedoc.php"><span>FOR RELEASE</span></a></li>
                            <li><a href="procedures/home/document/documenttracker.php"><span>DOCUMENT TRACKER</span></a></li>
                            <li><a href="procedures/home/document/documentprocessing.php"><span>PROCESSING</span></a></li>
            </ul>
        </li>
        <li><a href="#"><span>REPORT</span></a>
        	<ul style="width:265px;">
                <li><a href="procedures/home/report/dochistory.php"><span>DOCUMENT HISTORY</span></a></li>
				<li><a href="procedures/home/report/doconprocess.php"><span>DOCUMENT ON PROCESS</span></a></li>
                <li><a href="procedures/home/report/doconprocesspersignatory.php"><span>DOCUMENT ON PROCESS PER SIGNATORY</span></a></li>
                <li><a href="procedures/home/report/docpersignatory.php"><span>DOCUMENTS PER SIGNATORY</span></a></li>
            </ul>
        </li>

    <?php
        if($_SESSION['GROUP']=='POWER ADMIN')
            {

                echo '<li><a href="#"><span>MAINTENANCE</span></a>
                <ul>
                        <li><a href="procedures/home/maintenance/documenttype.php"><span>DOCUMENT TYPE</span></a></li>
                        <li><a href="procedures/home/maintenance/office.php"><span>OFFICES</span></a></li>
                        <li><a href="procedures/home/maintenance/flowtemplate.php"><span>FLOW TEMPLATE</span></a></li>
                        <li><a href="#" class="parent"><span>SECURITY</span></a>
                            <ul>
                                <li><a href="procedures/home/maintenance/users.php"><span>USERS</span></a></li>
                                <li><a href="procedures/home/maintenance/group.php"><span>GROUP</span></a></li>
                            </ul>
                        </li>
                </ul>
                </li>';
            }
    ?>

        <li><a href="procedures/home/userinfo/userinfo.php"><span>USER INFO</span></a></li>
        <li><a href="about.php"><span>ABOUT</span></a></li>
        <li><a href="procedures/home/logout.php"><span>LOGOUT</span></a></li>
    
    </ul>
    </div>
		
       
        <div class="admin">
        
        		<?php
          session_start();
	         require_once("procedures/connection.php");
	         global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
	         $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
	         $query="SELECT MAIL_ID FROM MAIL WHERE FK_SECURITY_USERNAME_OWNER = '".$_SESSION['usr']."' AND MAILSTATUS=0";
	         $result=mysqli_query($con,$query);
	         while ($row = mysqli_fetch_array($result))
	         {

		         echo '<a href="procedures/home/userinfo/inbox.php"><img src="images/home/icon/testmail.gif" width="30" height="20" align="left" /></a>&nbsp';

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
                        <h2>ABOUT</h2>
                        
                        		
    						<div id="pic">
                					
                        			<div id="flashContent">
			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="930" height="260" id="dtlogo" align="middle">
				<param name="movie" value="dtlogo.swf" />
				<param name="quality" value="high" />
				<param name="bgcolor" value="#ffffff" />
				<param name="play" value="true" />
				<param name="loop" value="true" />
				<param name="wmode" value="window" />
				<param name="scale" value="showall" />
				<param name="menu" value="true" />
				<param name="devicefont" value="false" />
				<param name="salign" value="" />
				<param name="allowScriptAccess" value="sameDomain" />
				<!--[if !IE]>-->
				<object type="application/x-shockwave-flash" data="dtlogo.swf" width="930" height="260">
					<param name="movie" value="dtlogo.swf" />
					<param name="quality" value="high" />
					<param name="bgcolor" value="#ffffff" />
					<param name="play" value="true" />
					<param name="loop" value="true" />
					<param name="wmode" value="window" />
					<param name="scale" value="showall" />
					<param name="menu" value="true" />
					<param name="devicefont" value="false" />
					<param name="salign" value="" />
					<param name="allowScriptAccess" value="sameDomain" />
				
				</object>
				<!--<![endif]-->
			</object>
		</div>
                                    	
                			</div>
                            <div id="title">
                             
                             <p>&copy; 2014-2015 Designed by: <a href="https://www.facebook.com/wufei0?fref=ts&ref=br_tf">Terry John Apigo</a> and <a href="https://www.facebook.com/aga.muhlach.547?fref=ts">Champ Jerome F. Marzan</p>
                            </div>
                            
                            
							
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
				echo $_SESSION['Copyright']. "&nbsp;<img src=images/home/icon/copyleft-icon.png width='14' height='14' />&nbsp;" .$_SESSION['Year']. "&nbsp;" .$_SESSION['Developer'];
				echo "&nbsp|";
			?>
			
			<a href="#">Contact Us</a> | Designed by: <a href="#">MIS</a> | <a href="#">Scroll Top</a></p>
        </div>
    
    </div>
	
</div>

</body>
</html>
