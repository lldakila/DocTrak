<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../index.php');
}
date_default_timezone_set($_SESSION['Timezone']);
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
<link rel="stylesheet" href="../../../css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

<link rel="stylesheet" href="../../../font-awesome/4.2.0/css/font-awesome.min.css" />

<!-- text fonts -->
	<link rel="stylesheet" href="../../../fonts/fonts.googleapis.com.css" />

<link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="../../../css/jquery.growl.css" />
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap-table.css" />
<script src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="../../../js/jquery.growl.js"></script>


<script src="../../../js/bootstrap-table.js"></script>



<link href="../../../css/bootstrap-submenu.min.css" rel="stylesheet" />


</head>

<body>
<!------------------------------------------- header -------------------------------->
 <?php
    $PROJECT_ROOT= '../../../';
    include_once('../../../header.php');
    include_once($PROJECT_ROOT.'qvJscript.php');
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

	<div class="main">
    
    	<div class="container">
    		<div class="row">
        
				<div id="post">
            
					<div id="post100" class="colsize">
						<h2 style="padding-top:20px;">INBOX</h2>
						<hr class="hrMargin" style="margin-bottom:10px;">
                        
                        	<div class="col-xs-6 col-sm-3">
                            
								<div id="nav">
									<h4>PROFILE</h4>
										<ol>
											<li><a href="userinfo.php"><span>PROFILE INFO</span></a></li>
											<!--<li><a href="editprofile.php"><span>EDIT PROFILE</span></a></li>-->
											<li><a href="editpassword.php"><span>EDIT PASSWORD</span></a></li>
										</ol>
								</div>
								
								<div id="nav">
									<h4>MESSAGE</h4>
										<ol>
											<li><a href="inbox.php"><span>INBOX</span></a></li>
<!--                                                        <li><a href="sentitems.php"><span>SENT ITEMS</span></a></li>
											<li><a href="newmessage.php"><span>NEW MESSAGE</span></a></li>-->
										</ol>
								</div>
                                        
							</div>
							
							<div id="mailcontent" class="col-xs-12 col-sm-6 col-md-9">
                              			
								<div id="inboxtable">
									<table id="MailData"
																
										data-height="445"
										data-checkbox-header = "false"
										data-pagination="true"
										data-toggle="table"
										class="display table table-bordered"
									>
										<thead>
											<tr>
												<!--<th data-checkbox="true"	data-formatter="stateFormatter" data-field="state"></th> -->
												<th data-field="id" data-visible="false" >id</th>
												<th data-field="Sender" data-sortable="true">Sender</th>
												<th data-field="Document" data-sortable="true">Document</th>
												<th data-field="Title" data-sortable="true">Title</th>
												<th data-field="Message" data-sortable="true">Message</th>
												<th data-field="Date" data-sortable="true">Date</th>
																			  
											</tr>
										</thead>
											

										<?php

											require_once("../../connection.php");
											global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
											$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
											$query="SELECT MAIL_ID,MAILCONTENT, FK_TABLE, MAILTITLE, MAILDATE,MAILSTATUS,SECURITY_NAME FROM mail JOIN security_user ON
													mail.FK_SECURITY_USERNAME_SENDER = security_user.SECURITY_USERNAME WHERE FK_SECURITY_USERNAME_OWNER
													= '".$_SESSION['usr']."'  ORDER BY MAILDATE DESC";
													
				//                            echo $query;
				//                            die();
											$RESULT=mysqli_query($con,$query) or die(mysqli_error($con));
										   // echo "<input id='mailid' type='text'/>";
											$date_prev='2011/07/18';
											$date_prev= 'Feb 19, 1985';
							//			    $recSet=  mysqli_fetch_row($RESULT);
							//			    $date_prev=$recSet['4'];
			
											while ($row = mysqli_fetch_array($RESULT))
											{
													
													$date = date_create($row['MAILDATE']);
													$date_to_compare=date_format($date,'M d, Y');
												
									//				if (print_r($date_prev,true) != $date_to_compare)
									//				{  
									//				    echo "<tr><td style='height:1px; padding:1px 1px;'></td><td style='height:1px; padding:1px 1px;'></td><td style='height:1px; padding:1px 1px;'></td><td style='height:1px; padding:1px 1px;'></td><td style='height:1px; padding:1px 1px;'></td></tr>";
									//				}
									//				
													
										  //  if ($row['MAILSTATUS']==0)
													//{
													if ($row['MAILSTATUS']==0)
													{
									//				  echo "<tr class ='info'><td>".$row['MAILSTATUS']."</td>";
													  echo "<tr class ='info'>";
													}
													else
													{
									//					echo "<tr><td>".$row['MAILSTATUS']."</td>";
														echo "<tr>";
													}
														echo "<td>".$row['MAIL_ID']."</td>";
														
												//	}

												//	else
												//	{
													//    echo "<tr  ><td>".$row['MAILSTATUS']."</td>";
														
													//}

													echo    "<td>".$row['SECURITY_NAME']."</td>
														<td>".$row['FK_TABLE']."</td>
														<td>".$row['MAILTITLE']."</td>
														<td><font><div class='y6'>".substr($row['MAILCONTENT'],0,60)."</font></div></td>

														<td>".date_format($date,'M d, Y-H:i')."</td>
														</tr>";

													$date_prev=date_format($date,'M d, Y');
										   }

										?>


									</table>
								</div> 
                                         
							</div>
							<div class="tfclear"></div>	
	
					</div>

				</div>
			</div>
		</div>
    
	</div>

</div>
<!------------------------------------------- end content -------------------------------->

<!------------------------------------ footer ------------------------------------->
	<?php
    $PROJECT_ROOT= '../../../';
    include_once('../../../footer.php');
    //require_once("/procedures/connection.php");
    include_once($PROJECT_ROOT.'qvJscript.php');
   
  ?>
<!------------------------------------ end footer ------------------------------------->

<!-- Modal -->
       <?php
       include('../../../modal.php');
       ?>
<!-- End Modal -->

    <script language="JavaScript" type="text/javascript">



	function OpenMail(MailId){
                var module_name='OpenMail';
		var mail_id = MailId; //build a post data structure
		jQuery.ajax({
			type: "POST",
			url:"messaging/readmessage.php",
			dataType:"text", // Data type, HTML, json etc.
			data:{MailId:mail_id,module:module_name},
       beforeSend: function() 
       {
           $("#inboxtable").html("<div id='loading'><img src='../../../images/home/ajax-loader.gif' /></div>");

          },
      ajaxError: function() 
      {
            $("#inboxtable").html("<div id='loading'><img src='../../../images/home/ajax-loader.gif' /></div>");
          },
			success:function(response)
			{

				$("#inboxtable").html(response);
         CheckMail();
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
                        
		});
	}
        
        function CheckMail()
        {
            
        var module_name='CheckMail';
				jQuery.ajax
				({
					type: "POST",
					url:"messaging/readmessage.php",
					dataType:"text", // Data type, HTML, json etc.
					data:{module:module_name},
					success:function(response)
	        {
						$('#mails').html(response);
					},
						error:function (xhr, ajaxOptions, thrownError)
					{
						alert(thrownError);
					}
                        
				});
        }


		$(document).ready(function() {
    

$('#feedbackDiv').feedBackBox();

    });
    
    //////////////////
    //FUNCTION TO CHECK THE CHECKBOX USED BY BOOTSTRAP TABLE
    /////////////////
   function stateFormatter(value, row, index) {
//        if (value == 0) {
//            return {
//                disabled: true
//            };
//        }
        if (value == 1) {
            return {
                disabled: true,
                checked: true
            }
        }
        else
        	{
        		return {
                disabled: true,
                checked: false
            }
        	}
        return value;
    }
    
      $('#MailData').on('click-row.bs.table', function (e, row, $element) 
      {
 //    console.log(row);
    //	alert(row['id']);
    OpenMail(row['id']);
    
   
			});
    
	
</script>
</body>
</html>
