
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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

 	echo $_SESSION['Title']. "" .$_SESSION['Version'];
?>
</title>
<link href="css/bootstrap.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link rel="icon" href="images/home/icon/pglu.ico" type="image/x-icon">
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>

<body>

        <?php
    $PROJECT_ROOT= '';
    include_once('header.php');
    include_once($PROJECT_ROOT.'qvJscript.php');
    //require_once("/procedures/connection.php");
    ?>
    
    

<div class="content">

<div id="leftmenu">
<nav class="social">
          <ul>
              <li><a href="javascript:newDocument()">New Document<i><img src="images/home/icon/newdoc1.gif" width="28px" height="30px" /></i></a></li>
              <li><a href="javascript:receiveDocument()">Receive Document<i><img src="images/home/icon/receivedoc1.gif" width="28px" height="30px" /></i></a></li>
              <li><a href="javascript:releaseDocument()">Release Document<i><img src="images/home/icon/releasedoc.gif" width="28px" height="30px" /></i></a></li>
              <li><a href="javascript:forpickupDocument()">For Pickup<i><img src="images/home/icon/forpickup.gif" width="28px" height="30px" /></i></a></li>
              <li><a href="javascript:bacDocument()">BAC<i><img src="images/home/icon/forpickup.gif" width="28px" height="30px" /></i></a></li>

          </ul>
      </nav>
</div>

	<div class="content1">
    
    	<div class="content2">
        
        	<div id="post">
            
            			<div id="post01">
                        <h2>ABOUT</h2>
                        
                        		
    						<div id="pic">
                					
                        			<div id="flashContent">
			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="930" height="260" id="dtlogo" align="middle">
				<param name="movie" value="images/home/flash/dtlogo.swf" />
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
				<object type="application/x-shockwave-flash" data="images/home/flash/dtlogo.swf" width="930" height="260">
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
                             
                             <p>&copy; 2014-2015 Designed by: <a href="https://www.facebook.com/wufei0?fref=ts&ref=br_tf">Terry</a> and <a href="https://www.facebook.com/aga.muhlach.547?fref=ts">Jerome F. Marzan</p>
                            </div>
                            
                            
							
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
				
				echo $_SESSION['Copyright']. "&nbsp;<img src=images/home/icon/copyleft-icon.png width='14' height='14' />&nbsp;" .$_SESSION['Year']. "&nbsp;" .$_SESSION['Developer'];
				echo "&nbsp|";
			?>
			
			<a href="#">Contact Us</a> | Designed by: <a href="#">MIS</a> | <a href="#">Scroll Top</a></p>
        </div>
    
    </div>
	
</div>
    <!-- Modal -->
       <?php
       include('modal.php');
       ?>
<!-- End Modal -->
</body>
</html>
