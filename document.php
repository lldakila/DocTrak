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
<title>PGLU DOCTRAK</title>
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link rel="icon" href="images/home/icon/pglu.ico" type="image/x-icon">
</head>

<body>
<div class="header">

	<div class="header1">
    
    	<div class="headerline">
    
    	<div class="headerbanner">
        
        		<img src="images/home/pglu.png" alt="PGLU" title="PGLU" align="left" /><h2>PGLU DOCTRAK</h2><p>Management Information System</p>
        
        </div>

        <div id="menu">
        	


            
            <ul class="menu">
        <li><a href="index.php" class="parent"><span>HOME</span></a></li>
        <li><a href="document.php" class="parent"><span>DOCUMENT</span></a>
        	<ul>
                <li><a href="newdoc.php"><span>NEW DOCUMENT</span></a></li>
                <li><a href="receiveddoc.php"><span>RECEIVED DOCUMENT</span></a></li>
                <li><a href="releasedoc.php"><span>RELEASE DOCUMENT</span></a></li>
            </ul>
        </li>
        <li><a href="report.html"><span>REPORT</span></a>
        	<ul>
                <li><a href="dochistory.html"><span>DOCUMENT HISTORY</span></a></li>

            </ul>
        </li>
        <li><a href="maintenance.html"><span>MAINTENANCE</span></a>
        <ul>
                <li><a href = "javascript:tj" onclick = "document.getElementById('offices').style.display='block';document.getElementById('fade').style.display='block'"><span>OFFICES</span></a></li>
                <li><a href="flowtemplate.html"><span>FLOW TEMPLATE</span></a></li>
                <li><a href="security.html" class="parent"><span>SECURITY</span></a>
                    <ul>
                        <li><a href = "javascript:tj" onclick = "document.getElementById('users').style.display='block';document.getElementById('fade').style.display='block'"><span>USERS</span></a></li>
                        <li><a href="group.html"><span>GROUP</span></a></li>
                    </ul>
                </li>
        </ul>
        </li>
        <li><a href="about.html"><span>ABOUT</span></a></li>
        <li><a href="procedures/home/logout.php"><span>LOGOUT</span></a></li>

        <li class="last"><?php
          session_start();
          echo "Hi, ".$_SESSION['Security_Name']."";

        ?>  </li>

    </ul>

         <div id="tfheader">
					<form id="tfnewsearch" method="get" action="http://www.google.com">
		        	<input type="text" class="tftextinput" placeholder="search..." name="q" size="21" maxlength="120"><input type="submit" value="search" class="tfbutton">
					</form>
				<div class="tfclear"></div>
				</div>   
            
            
        </div>
        
        </div>
    
    </div>

</div>

<div class="content">

	<div class="content1">
    
    	<div class="content2">
        
        	<div id="post">
            
            			<div id="post1">
                        <h2>DOCUMENT</h2>
                        
                        		<div class="imagestext">
                                	<img src="images/home/newdoc.jpg" width="136" height="137" />
    								<div class="lower"><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">New Document</a></div>
                                </div>
                                <div class="imagestext">
                                	<img src="images/home/receivedoc.jpg" width="136" height="137" />
    								<div class="lower"><a href = "javascript:tj" onclick = "document.getElementById('tj').style.display='block';document.getElementById('fade').style.display='block'">Received Document</a></div>
                                </div>
                                <div class="imagestext">
                                	<img src="images/home/releasedoc.jpg" width="136" height="137" />
    								<div class="lower"><a href = "javascript:tj" onclick = "document.getElementById('tj1').style.display='block';document.getElementById('fade').style.display='block'">Release Document</a></div>
                                </div>
                                <div class="imagestext">
                                	<img src="images/home/docstats.jpg" width="136" height="137" />
    								<div class="lower"><a href="#">Document Status</a></div>
                                </div>
                                <div class="imagestext">
                                	<img src="images/home/maintenance.jpg" width="136" height="137" />
    								<div class="lower"><a href="#">Maintenance</a></div>
                                </div>
                                <div class="imagestext">
                                	<img src="images/home/about.jpg" width="136" height="137" />
    								<div class="lower"><a href="#">About</a></div>
                                </div>
                                
                                
                                <div id="light" class="white_content"><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><img src="images/home/icon/download.jpg" width="30" height="30" /></a><table border="0">
                  	<tr>
                    	<td>Bar Code No:</td>
                        <td class="textinput"><input type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Title: </td>
                         <td class="textinput"><input type="text" /> </td>
                    </tr>
                          <tr>
                    	<td>Document Type: </td>
                         <td><select> <option>Select Here</option> </select> 
                         Document Flow: 
                         <select> <option>Select Here</option> </select> </td>
                    </tr>
                    
                   
                          <tr>
                    	<td>PDF File: </td>
                         <td><input type="file" /> </td>
                    </tr>
                     <tr>
                    	<td> </td>
                         <td></td>
                         <td> <input type="button" value="Preview"/></td>
                         <td> <input type="button" value="Add"/></td>
                    </tr>
                    
                  </table></div>
    <div id="fade" class="black_overlay"></div>
    
    <div id="tj" class="white_content"><a href = "javascript:tj" onclick = "document.getElementById('tj').style.display='none';document.getElementById('fade').style.display='none'"><img src="images/home/icon/download.jpg" width="30" height="30" /></a><table border="0">
                  	<tr>
                    	<td>Bar Code No:</td>
                        <td><input type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Title: </td>
                         <td><input type="text" /> </td>
                    </tr>
                          <tr>
                    	<td>Document Type: </td>
                         <td><select> <option>Select Here</option> </select> </td>
                    </tr>
                          <tr>
                    	<td>Document Flow: </td>
                         <td><select> <option>Select Here</option> </select> </td>
                    </tr>
                          <tr>
                    	<td>File Name: </td>
                         <td><input type="file" /> </td>
                    </tr>
                     <tr>
                    	<td> </td>
                         <td></td>
                         <td> <input type="button" value="Receive"/></td>
                    </tr>
                    
                  </table></div>
    <div id="fade" class="black_overlay"></div>
    
    <div id="tj1" class="white_content"><a href = "javascript:tj" onclick = "document.getElementById('tj1').style.display='none';document.getElementById('fade').style.display='none'"><img src="images/home/icon/download.jpg" width="30" height="30" /></a><table border="0">
                  	<tr>
                    	<td>Bar Code No:</td>
                        <td><input type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Title: </td>
                         <td><input type="text" /> </td>
                    </tr>
                          <tr>
                    	<td>Document Type: </td>
                         <td><select> <option>Select Here</option> </select> </td>
                    </tr>
                          <tr>
                    	<td>Document Flow: </td>
                         <td><select> <option>Select Here</option> </select> </td>
                    </tr>
                          <tr>
                    	<td>File Name: </td>
                         <td><input type="file" /> </td>
                    </tr>
                     <tr>
                    	<td> </td>
                         <td></td>
                         <td> <input type="button" value="Release"/></td>
                    </tr>
                    
                  </table></div>
    <div id="fade" class="black_overlay"></div>
     <!--- OFFICES POPUP START --->
    <div id="offices" class="white_content"><a href = "javascript:void(0)" onclick = "document.getElementById('offices').style.display='none';document.getElementById('fade').style.display='none'"><img src="images/home/icon/download.jpg" width="30" height="30" /></a>

                    <div class="search1">
                    <div id="tfheader">
                    <form id="tfnewsearch" method="POST" action= "procedures/home/office/save.php">
		        	<input type="text" class="tftextinput" placeholder="search..." name="q" size="21" maxlength="120"><input type="submit" value="search" class="tfbutton">

				<div class="tfclear"></div>
				</div>
                    </div>

                    <div class="table1">
    				<table border="0">
                  	<tr>
                    	<td>Office Name:</td>
                        <td class="textinput"><input name="office_name" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Description:</td>
                        <td class="textinput"><input name="office_description" type="text" /> </td>
                    </tr>


                  </table>
                  		 <!--- OFFICES BUTTONS START --->
                        <div class="input">
                         <input id="office_mode" name="mode" type="hidden" value="0"/>
                         <input type="button" value="New"/>
                         <input type="submit" value="Delete"  onClick="document.getElementById('office_mode').value='delete';"/>
                         <input type="submit" value="Save" onClick="document.getElementById('office_mode').value='save';"/>
                         </div>
                           <!--- OFFICES BUTTONS END--->
                  </div>
                        </form>
                  </div>
    <div id="fade" class="black_overlay"></div>
     <!--- OFFICES POPUP END --->

      <!--- USERS POPUP START --->
    <div id="users" class="white_content"><a href = "javascript:void(0)" onclick = "document.getElementById('users').style.display='none';document.getElementById('fade').style.display='none'"><img src="images/home/icon/download.jpg" width="30" height="30" /></a>

                    <div class="search1">
                    <div id="tfheader">
                    <form id="tfnewsearch" method="POST" action= "procedures/home/office/save.php">
		        	<input type="text" class="tftextinput" placeholder="search..." name="q" size="21" maxlength="120"><input type="submit" value="search" class="tfbutton">

				<div class="tfclear"></div>
				</div>
                    </div>

                    <div class="table1">
    				<table border="0">
                  	<tr>
                    	<td>UserName:</td>
                        <td class="textinput"><input name="office_name" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Description:</td>
                        <td class="textinput"><input name="office_description" type="text" /> </td>
                    </tr>


                  </table>
                  		 <!--- OFFICES BUTTONS START --->
                        <div class="input">
                         <input type="button" value="New"/>
                         <input type="button" value="Delete"/>
                         <input type="button" value="Save"/>
                         </div>
                           <!--- OFFICES BUTTONS END--->
                  </div>
                        </form>
                  </div>
    <div id="fade" class="black_overlay"></div>

                        </div>
  <!--- USERS POPUP END --->
<div class="tfclear"></div>
                        </div>

            
            </div>
        
        </div>
    
    </div>

</div>

<div class="footer">

	<div class="footer1">
    
    			<div id="footer2">
                	<p>Copyright &copy; 2014-2015 Sir TJ and Jerome | <a href="#">Contact Us</a> | Designed by: <a href="#">MIS</a> | <a href="#">Scroll Top</a></p>
                </div>
    
    </div>
	
</div>

</body>
</html>
