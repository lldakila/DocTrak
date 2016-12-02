<?php
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
		$_SESSION['in'] ="start";
		header('Location:../../../index.php');
	}

	if($_SESSION['GROUP']!='POWER ADMIN')
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
            
						<div id="post100" class="col-xs-12 col-md-8">
							<h2>OFFICES</h2>
							<hr class="hrMargin" style="margin-bottom:10px;">
					
								<form name="process" method="post" action="office/process.php" onsubmit="return validate();">
	
									<div class="table1 form-horizontal">
										
										<div class="form-group">
											<label class="col-sm-2 control-label">Office Name:</label>
											<div class="col-sm-10">
												<input id="primarykey" name="primarykey" type="hidden" />
												<input id="office_name" name="office_name" type="text" class="form-control" /> 
											</div>
										</div>
										  
										<div class="form-group">
											<label class="col-sm-2 control-label">Description:</label>
											<div class="col-sm-10">
												<input id="office_description" name="office_description" type="text" class="form-control" /> 
											</div>
										</div>
										  
											<?php
				  
											   if($_SESSION['operation']=='save'){
									
													echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Saved Successfully </div>";
									
												}  elseif($_SESSION['operation']=='delete'){
									
														 echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Deleted Successfully </div>";
													}
													
														elseif($_SESSION['operation']=='update'){
									
												   echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Updated Successfully </div>";
											   }
									
												   $_SESSION['operation']='clear';
												
												
											?>
		
										<!--- BUTTONS ACTIVITY START --->												
										<div class="input1">
											<input id="office_mode" name="office_mode" type="hidden" value="0"/>
											<input  type="submit" value="Delete"  onClick="document.getElementById('office_mode').value='delete';" class="btn btn-danger" id="btn" />
											<input type="submit" value="Save" onClick="document.getElementById('office_mode').value='save';" class="btn btn-primary" id="btn" />
											<input type="button" value="New" onClick="javascript:cleartext();" class="btn btn-primary" id="btn" />
										</div>
										<!--- BUTTONS ACTIVITY END--->
			
									</div>
	
								</form>
						</div>
                        
                        <div id="postright0" class="col-xs-6 col-md-4">       
							<form id="tfnewsearch" method="post">
								
								<div class="input-group">
									<input id="search_string" type="text" name="search_string" class="form-control" placeholder="search..." />
									<span class="input-group-btn">
										<button id="search_office" class="btn btn-default btn-search">Search </button>
									</span>
								</div>
								
							</form>
							
							<hr class="hrMargin">
							
							<div class="postright">   
											  
								<table id="responds"
										data-height="430"
										data-toggle="table"
										class="display table table-bordered"
										data-striped="true"
								>
									<thead>
										<tr>
											<th class="col-md-2"  data-field="officename" data-sortable="true">Office</th>
											<th  class="col-md-8" data-field="officedescription" data-sortable="true">Description</th>																					
										</tr>
									</thead>
																
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
<!------------------------------------ end content ------------------------------------->

<!------------------------------------------- footer -------------------------------->
    <?php
	    $PROJECT_ROOT= '../../../';
	    include_once($PROJECT_ROOT.'qvJscript.php');
	    include_once('../../../footer.php');
		?>
<!------------------------------------------- end footer -------------------------------->

<!-- Modal -->
       <?php
       include('../../../modal.php');
       ?>
<!-- End Modal -->
    
<script language="JavaScript" type="text/javascript">


function cleartext() {
  document.getElementById("office_name").value="";
  document.getElementById("office_description").value="";
    document.getElementById("primarykey").value="";
}
//function clickSearch(officename,officedescription) {
//document.getElementById("office_name").value=officename;
//  document.getElementById("office_description").value=officedescription;
//    document.getElementById("primarykey").value=officename;
//}
function validate() {


    if (document.getElementById("office_mode").value == "delete") {
        if (document.getElementById("primarykey").value != "") {
        if (confirm("Are you sure you want to delete?") == true) {
            return true;
        }
        else {

            return false;
        }
    }
        alert("Nothing to delete.");
        return false;
    }

    if (document.process.office_name.value == "") {
        alert("Fill up necessary inputs.");
        return false;
    }
    else if (document.process.office_description.value =="") {
        alert("Fill up necessary inputs.");
        return false
    }
    else {
        return true;
    }




};

$(document).ready(function() {
    $("#search_office").click(function (e) {

        e.preventDefault();
        var myData = 'search_string='+ $("#search_string").val(); //build a post data structure
        jQuery.ajax({
            type: "POST",
            url:"office/search.php",
            dataType:"json", // Data type, HTML, json etc.
            data:myData,
            beforeSend: function() {
                    $("#responds").bootstrapTable("showLoading");
            },
//            ajaxError: function() {
//                    $("#responds").html("<div id='loading' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
//            },
            success:function(response){
                $("#responds").bootstrapTable("hideLoading");
						  	$('#responds').bootstrapTable("load",response);

            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    });


	$('#feedbackDiv').feedBackBox();
	
});

document.addEventListener("mousemove", function() {
    myFunction(event);
});

function myFunction(e) {
	$("#fade").fadeTo(3000,0.0);

}

$('#responds').on('click-row.bs.table', function (e, row, $element) {
		document.getElementById("office_name").value=row['officename'];
  	document.getElementById("office_description").value=row['officedescription'];
    document.getElementById("primarykey").value=row['officename'];
});


</script>
    
</body>
</html>
