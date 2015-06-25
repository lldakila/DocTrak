<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../index.php');
}

    //CHECK IF USER IS POWERADMIN AND HE/SHE IS BAC EMPLOYEE
	if ($_SESSION['BAC']!=1 OR $_SESSION['GROUP']!='POWER ADMIN')
	{
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
<link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon" />


</head>

<body>
<?php
    $PROJECT_ROOT= '../../../';
    include_once($PROJECT_ROOT.'qvJscript.php');
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
            
                        <div id="post10">
                            <h2>CANCEL</h2>

                            <form name="process" method="post" action="receive/process.php" onsubmit="return validate();" enctype="multipart/form-data">

                            <div class="table1">
                                <table>
                                    <tr>
                                        <td>BarCode No:</td>

                                        <td class="usertext">
                                            <input id="primarykey" name="primarykey" type="hidden" />
                                            <input id="barcode" name="barcode" type="hidden" />
                                            <input id="barcodeno" readonly="readonly" name="barcodeno" type="text" class="form-control"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td>Details:</td>
                                        <td class="usertext"><input id="title" readonly="readonly" name="title" type="text" class="form-control"/> </td>
                                    </tr>
                                    <tr>
                                        <td>Cost:</td>
                                        <td class="usertext"><input id="documenttype" readonly="readonly" name="documenttype" type="text" class="form-control"/> </td>
                                    </tr>
                                    <tr>
                                        <td>Date:</td>
                                        <td class="usertext"><input id="template" readonly="readonly" name="template" type="date" class="form-control"/> </td>
                                    </tr>                         
                                </table>

                  		 <!--- BUTTONS ACTIVITY START --->

                                        <div class="input2">

                                         <input type="submit" value="Receive" class="btn btn-primary"/>
                                         </div>
                                <!--- BUTTONS ACTIVITY END--->

                            </div>

                            </form>

                        </div>

                        <div id="postright">
                        
                        	<div id="tfheader">
                            	<form id="tfnewsearch" method="post" class="form-inline">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <input id="search_string" type="text" name="search_string" class="form-control" placeholder="search..." />
                                        <button id="search_receiveddoc" class="btn btn-default">Search </button>
                                    </div></div>	
                                        </form>	
                                    
                               	  <h2></h2>
                            </div>
                            
                            <!--AUTOSUGGEST SEARCH START-->
                            <div id="display"></div>
                            <!--AUTOSUGGEST SEARCH END-->
                            <div class="tfclear"></div>
                                                    
                            <div class="scroll">
                        	                                    
                                <table id="responds">
                                	<tr class='usercolortest'>
                                	<th>Barcode</th>
                                    <th>Title</th>
                                	<th>Date</th>
                                	</tr>
                                </table>

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


<script src="../../../js/jquery-1.10.2.min.js"></script>
<script src="../../../js/bootstrap.min.js"></script>
</body>
</html>
