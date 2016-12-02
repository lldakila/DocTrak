


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
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="../../../css/home.css" />
<link rel="stylesheet" href="../../../css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

<link rel="stylesheet" href="../../../font-awesome/4.2.0/css/font-awesome.min.css" />

<!-- text fonts -->
	<link rel="stylesheet" href="../../../fonts/fonts.googleapis.com.css" />

<link rel="stylesheet" type="text/css" href="../../../css/bootstrap-select.css" />
<link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="../../../css/jquery.growl.css" />
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap-table.css" />
<script src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="../../../js/jquery.growl.js"></script>


<script src="../../../js/bootstrap-table.js"></script>

<script src="../../../js/bootstrap-select.js"></script>

<link href="../../../css/bootstrap-submenu.min.css" rel="stylesheet" />    

<script type="text/javascript" src="../../../js/blockUI.js"></script>
</head>

<body>
<!------------------------------------------- header -------------------------------->
<?php
    $PROJECT_ROOT= '../../../';
    include_once($PROJECT_ROOT.'qvJscript.php');
    include_once('../../../header.php');
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

       <div id="post">
       		<div class="container">
    				<div class="row">
						<div class="post">
							<div id="post100" class="colsize">

								<div id="headform">
					
									<div class="checkHistory">				
										<div class="panel panel-info">
										  <div class="panel-heading">FILTER</div>
											<div class="panel-body">
										  
												<div id="headtable">
													
													<form class="form-inline">
													  <div class="form-group">
														<label for="exampleInputName2">Date From:</label>
														<input type="date" class="form-control" id="datefrom" name="datefrom" placeholder="Date From" value="<?php echo date('Y-m-d'); ?>" />
													  </div>
													  <div class="form-group">
														<label for="exampleInputEmail2">Date To:</label>
														<input type="date" class="form-control" id="dateto" placeholder="Date To" value="<?php echo date('Y-m-d'); ?>" />
													  </div>
														
														<div class="form-group">
														
															<div style="float:left; padding-right:15px;">
																<label class="checkbox-inline">
																<input type="checkbox" id="received" value="option1" class="checkbox" style="margin-top:4px;"> Received
																</label>
																<label class="checkbox-inline">
																  <input type="checkbox" id="released" value="option1"> Released
																</label>
																<label class="checkbox-inline">
																  <input type="checkbox" id="approved" value="option1"> Approved
																</label>
																<label class="checkbox-inline">
																  <input type="checkbox" id="mydoc" value="option1"> My Doc
																</label>
												
															</div>
															
															
														</div>
														<button id="filter" name="filter" class="btn btn-primary btn-filter">Filter</button>
													
													</form>
													
												</div>
												<div class="tfclear"></div>
											
											
											</div>
										</div>	
									</div>
<form id='send' method="post" target='_blank' action='pdf/doccons.php'>
<!-- <input type='text' name='data' id='data' > -->

<textarea name='data' id='data'  style="display:none;">
</textarea>

</form>
								</div>
										<!-- data-search="true" -->
								<div  class="containers">
									<table id="historydata"										   
									data-height="320"
								
									
									data-toggle="table"
									class="display table table-bordered"
									>
									
										<thead>
											<tr>
												<th data-field="no" data-sortable="true">No</th>
														<th data-field="barcode" data-sortable="true">Barcode</th>
											  <th data-field="title" data-sortable="true">Title</th>
											  <th data-field="office" data-sortable="true">Office</th>
											  <th data-field="owner" data-sortable="true">Owner</th>
											  <th data-field="date" data-sortable="true">Date</th>
											 <!-- <th data-field="type" data-sortable="true">Type</th> -->
											  
										  </tr>
										</thead>															

								   </table>
								</div>
								
								<button id="DocConprint" name="print" class="btn btn-primary pull-right" style="margin-top:5px;"><span class="glyphicon glyphicon-print"></span> Print</button>
								
								<div class="tfclear"></div>
							</div>
							
							
						</div>
					</div>
			</div>     
       </div>
    </div>


</div>
<!------------------------------------ end content ------------------------------------->

<!------------------------------------------- footer -------------------------------->
    <?php
	    $PROJECT_ROOT= '../../../';
	    include_once($PROJECT_ROOT.'qvJscript.php');
	    include_once('../../../footer.php');
		?>
<!------------------------------------------- end footer -------------------------------->

<!-- Modal -->
  
<!-- End Modal -->

    <script language="JavaScript" type="text/javascript">




		    $("#filter").click(function (e) {
			    e.preventDefault();

			    var datefrom=document.getElementById('datefrom').value;
			    var dateto=document.getElementById('dateto').value;
					
					
					var received=document.getElementById("received").checked;
					var released=document.getElementById("released").checked;
					var approved=document.getElementById("approved").checked;
					var mydoc=document.getElementById("mydoc").checked;
				
				

			    jQuery.ajax({
				    type: "POST",
				    url:"doccons/search.php",
				    dataType:"json", // Data type, HTML, json etc.
				  	data:{vdatefrom:datefrom,vdateto:dateto,vreceived:received,vreleased:released,vapproved:approved,vmydoc:mydoc},
				  	beforeSend: function() 
				  	{
				  		$.blockUI();
//            	$("#filter").html('wait..');
//            	$("#historydata").html("<div id='loading' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
            	 $('#historydata').bootstrapTable("showLoading");
            },
				    success:function(response)
				    {
							$('#historydata').bootstrapTable("hideLoading");
							$('#historydata').bootstrapTable("load",response);
							$.unblockUI();
				    },
				    error:function (xhr, ajaxOptions, thrownError){
					    alert(thrownError);
					     $.unblockUI();
				    }
			    });
			   
		    });

/////////////////////////////////////////////////////////
//CHECK FOR VALID DATE ENTERED
////////////////////////////////////////////////////////

	function checkDate(date)
	{
		//var text = '2/30/2011';
		var comp = date.split('/');
		var m = parseInt(comp[0], 10);
		var d = parseInt(comp[1], 10);
		var y = parseInt(comp[2], 10);
		var date = new Date(y,m-1,d);
		if (date.getFullYear() == y && date.getMonth() + 1 == m && date.getDate() == d)
		 	{
		  	return true;
			} 
		else 
			{
		  	return false;
			}
	}


	  
// function addRowHandlers()
//     {
       
//             var table = document.getElementById('historydata');
//              //alert (table);

//         var rows = table.getElementsByTagName("tr");
//         for (i = 0; i < rows.length; i++) {
//             var currentRow = table.rows[i];
//             var createClickHandler =
//                 function(row)
//                 {
//                     return function() {
//                                             var cell = row.getElementsByTagName("td")[1];
//                                             var id = cell.innerHTML;

																			
//                                            retrieveDocument(id);
//                                            $('#myModal').modal('show');
//                                      };
//                 };

//             currentRow.onclick = createClickHandler(currentRow);
//         }
//     }
    
    //FUNCTION THAT RETRIEVES THE DOCUMENT FROM addRowHandlers() AND OPENS MODAL FORM
    function retrieveDocument(BarcodeId)
    {
            var myData = 'documentTracker='+BarcodeId; //build a post data structure
            jQuery.ajax({
                type: "POST",
                url:"../../../procedures/home/document/common/retrievedata.php",
                dataType:"text", // Data type, HTML, json etc.
                data:myData,
                beforeSend: function() {
                    $("#responds").html("<div id='loadingModal'><img src='images/home/ajax-loader.gif' /></div>");
                    },
                ajaxError: function() {
                    $("#responds").html("<div id='loadingModal'><img src='images/home/ajax-loader.gif' /></div>");
                    },
                success:function(response){
                    $("#responds").html(response);
                

                },
                error:function (xhr, ajaxOptions, thrownError){
                    alert(thrownError);
                }
            });
             $(window).load(function(){
            //$('#myModal').modal('show');
        });

        }

$('#released').change(function() {
   if($(this).is(":checked")) {
      document.getElementById("received").checked=true;
   }
   //'unchecked' event code
});
$('#received').change(function() {
   if($(this).is(":checked")) {
      
   }
   else
   	{
   		document.getElementById("released").checked=false;
   		document.getElementById("approved").checked=false;
   		}
   //'unchecked' event code
});

$('#approved').change(function() {
   if($(this).is(":checked")) {
      document.getElementById("received").checked=true;
   }
   //'unchecked' event code
});


				$(document).ready(function() {
    

$('#feedbackDiv').feedBackBox();

$('#historydata').on('click-row.bs.table', function (e, row, $element) {
     retrieveDocument(row['barcode']);
     $('#myModal').modal('show');
   
});

    });


//PRINTABLE FORMAT

$('#DocConprint').click(function (event){

 var data = '{';
var rowData;
$.blockUI();
$("#DocConprint").html('please wait...');


if ($($('#historydata tbody tr')[0]).hasClass('no-records-found')) {
		// data = data.substring(0,data.length-1);
	}
	else
	{
		 data += '"data": [';
		$('#historydata tbody tr').each(function(i, o)
		{
			data += '{';
			$('span', $(o)).each(function(i, o) 
			{
				// rowData=o.innerHTML;
				// rowData.replace('/"' , '/'');
				// data += '"'+o.className+'":"'+o.innerHTML+'",';
				data += '"'+o.className+'":'+JSON.stringify(o.innerHTML)+',';
				
			});
// console.log(data);
			data = data.substring(0,data.length-1);
			data += '},';
		});

		data = data.substring(0,data.length-1);
		 data += ']';
	}






  data += '}';

  //data = JSON.parse(data);
 // data = JSON.stringify(data);

	
// console.log(JSON.parse(data));
 // data = JSON.stringify(data);

	
	$('#data').val(data);
	$('#send').submit();

$('#DocConprint').html("<span class='glyphicon glyphicon-print'></span> Print");
$.unblockUI();
});






    </script>
     <?php
       include('../../../modal.php');
       ?>
</body>
</html>