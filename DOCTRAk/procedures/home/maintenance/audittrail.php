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
     
        echo $_SESSION['Title']. "" .$_SESSION['Version'];
        ?>
    </title>
    <link href="../../../css/bootstrap.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../../../css/home.css" />
    <link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon" />
    <script src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
</head>

<body>
<?php
    $PROJECT_ROOT= '../../../';
    include_once($PROJECT_ROOT.'qvJscript.php');
    include_once('../../../header.php');
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
                    <h2>AUDIT TRAIL</h2>


                    	<div id="headform">

                                				<div id="headtable">
                                        		<table>
                                                	
                                                </table>
                                                </div>


		                    <form name="history" class="form-inline">
                                        <div id="headsearch">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input id="search_string" type="text" name="search_string" class="form-control" placeholder="search..." />
                                                    <button id="search_document" class="btn btn-default">Search </button>
                                                </div>
                                            </div>
                                        </div>
		                    </form>
		                        
		                        
                                <div class="tfclear"></div>

                        </div>
                        <div id="codetable">
                        		<table id="historydata">
                                	<tr>
                                    	<th>USER</th>
                                        <th>ACTION</th>
                                        <th>TYPE</th>
                                        <th>DATE</th>
                                        <th>IP</th>
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
                mysqli_close($con);
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
    
    <script language="JavaScript" type="text/javascript">


	    $(document).ready(function() {
		    $("#search_document").click(function (e) {
			    e.preventDefault();
			    var myData = 'search_string='+ $("#search_string").val(); //build a post data structure
			    jQuery.ajax({
				    type: "POST",
				    url:"history/search.php",
				    dataType:"text", // Data type, HTML, json etc.
				    data:myData,
				    success:function(response){
					    $("#historydata").html(response);

				    },
				    error:function (xhr, ajaxOptions, thrownError){
					    alert(thrownError);
				    }
			    });
		    });



		    $("#filter").click(function (e) {
			    e.preventDefault();
			    //var myData = 'datefrom='+ $("#datefrom").val(); //build a post data structure
			    //var myData2 = 'dateto='+ $("#dateto").val();
			    var datefrom=document.getElementById('datefrom').value;
			    var dateto=document.getElementById('dateto').value;
			    //var dateString = today.format("dd-m-yy");
			    //var newdateto = new Date();

				//add a day to the date
			    //newdateto.setDate(newdateto.getDate() + 1);
			    //alert(newdateto.format("Y-m-d\\TH:i:sP"));
			   //dateto=newdateto.format("dd-m-yy");
			    jQuery.ajax({
				    type: "POST",
				    url:"history/filter.php",
				    dataType:"text", // Data type, HTML, json etc.
				    data:'datefrom='+datefrom+'&dateto='+dateto,
				    success:function(response){
					    $("#historydata").html(response);
						//alert(response)

				    },
				    error:function (xhr, ajaxOptions, thrownError){
					    alert(thrownError);
				    }
			    });
		    });



$('#feedbackDiv').feedBackBox();


	    });








    </script>

</body>
</html>