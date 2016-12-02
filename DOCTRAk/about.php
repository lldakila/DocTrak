
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
<link rel="stylesheet" href="css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

<link rel="stylesheet" href="font-awesome/4.2.0/css/font-awesome.min.css" />

<!-- text fonts -->
	<link rel="stylesheet" href="fonts/fonts.googleapis.com.css" />

<link rel="icon" href="images/home/icon/pglu.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="css/jquery.growl.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-table.css" />
<script src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="js/jquery.growl.js"></script>


<script src="js/bootstrap-table.js"></script>



<link href="css/bootstrap-submenu.min.css" rel="stylesheet" />

</head>

<body>
<!------------------------------------------- header -------------------------------->
        <?php
    $PROJECT_ROOT= '';
    include_once('header.php');
    include_once($PROJECT_ROOT.'qvJscript.php');
    //require_once("/procedures/connection.php");
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
					     /*  echo '<li class="bottomraduis"><a href="#"><span>BAC</span></a>
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
                    <h2 style="padding-top:20px;">ABOUT</h2>
							    		<hr class="hrMargin" style="margin-bottom:10px;">
                        
                        		
						    						<div id="pic">
						                					
													    <div id="image">
																<img src="images/home/doctraklogo.jpg" width="250" height="250" align="left"/>
																<h1>Document Tracking</h1>
																<p>Provincial Government of La Union</p>
													    </div>
						<!--                        			<div id="flashContent">
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
										[if !IE]>
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
										<![endif]
									</object>
								</div>-->
						                                    	
						                </div>
<!--                            <div id="title">
                             
                             <p>&copy; 2014-2015 Designed by: <a href="https://www.facebook.com/wufei0?fref=ts&ref=br_tf">Terry</a> and <a href="https://www.facebook.com/aga.muhlach.547?fref=ts">Jerome F. Marzan</a></p>
                            </div>-->
                            
                            
							
                  </div>
                       

            
          </div>
        </div>
        
      </div>
    
  </div>

</div>

<!------------------------------------------- end content -------------------------------->

<!------------------------------------ footer ------------------------------------->
	<?php
    $PROJECT_ROOT= '';
    include_once('footer.php');
    //require_once("/procedures/connection.php");
    include_once($PROJECT_ROOT.'qvJscript.php');
   
  ?>
<!------------------------------------ end footer ------------------------------------->

    <!-- Modal -->
       <?php
       include('modal.php');
       ?>
<!-- End Modal -->
<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css" />
<script src="js/bootstrap-select.js"></script>
</body>
</html>
