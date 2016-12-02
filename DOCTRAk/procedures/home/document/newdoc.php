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

<!--
<link href="../../../css/bootstrap.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="../../../css/home.css" />
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap-select.css" />
<link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">
<script src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
<script src="../../../js/jquery.colorbox-min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script src="../../../js/bootstrap-select.js"></script>


<link href="../../../css/bootstrap.min.css" rel="stylesheet" />
<link href="../../../css/bootstrap-submenu.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-2.2.2.min.js" defer></script>
  <script src="../../../js/bootstrap-submenu.min.js" defer></script>
  -->
</head>

<body>
<!------------------------------------------- header -------------------------------->
    <?php
	    $PROJECT_ROOT= '../../../';
	    include_once($PROJECT_ROOT.'qvJscript.php');
	    include_once('../../../header.php');
		?>
<!------------------------------------------- end header -------------------------------->	

<!------------------------------------ content ------------------------------------->
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

	<div class="content">
    
    	<div class="main">
        
        	<div id="post">
        		
        		<div class="container">
					<div class="row">
						<div class="post">

							<div id="post100" class="col-xs-12 col-md-8">
								<h2>NEW DOCUMENT</h2>
								<hr class="hrMargin" style="margin-bottom:10px;">
									<form name="process" method="post" action="new/process.php" onsubmit="return validate();" enctype="multipart/form-data">

										<div class="table1 form-horizontal">
															
												<div class="form-group">
													<label class="col-sm-2 control-label">BarCode:</label>
													<div class="col-sm-10">
															<input id="primarykey" name="primarykey" type="hidden" />
														<input type="text" class="form-control" id="barcodeinput" name="barcode" placeholder="BarCode">
													</div>
												</div>
												  
												<div class="form-group">
													<label class="col-sm-2 control-label">Title:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="title" name="title" placeholder="Title">
													</div>
												</div>
													
												<div class="form-group">
													<label class="col-sm-2 control-label">Description:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="description" name="description" placeholder="Description">
													</div>
												</div>
													
												<div class="form-group">
													<label class="col-sm-2 control-label">Type:</label>
													<div class="col-sm-10">
															<select id="type" name="type" class="form-control">
																	<?php
																		   require_once("../../connection.php");
																
																		   $query=select_info_multiple_key("select DOCUMENTTYPE_ID from document_type");
																
																		   foreach($query as $var) {
																			  echo "<option>".$var['DOCUMENTTYPE_ID']."</option>";
																		   }
																																																			
																	?>
															</select>
														
													</div>
												</div>									
													
												<div class="form-group">
													<label class="col-sm-2 control-label">Template:</label>
													<div class="col-sm-10">
															
														<?php
														
															echo '<select id="template" name="template" class="form-control selectpicker" onchange="templateView()" data-live-search="true" style="width:100%;">';
													   //require_once("../../connection.php");
													  
															 $query1=select_info_multiple_key("select TEMPLATE_ID, template_name,fk_office_name,template_description from document_template order by template_name asc");
															foreach($query1 as $var)
															{
															echo "<option style='width:100%;' data-subtext='".$var['template_description']."' value='".$var['TEMPLATE_ID']."' selected='selected'>".$var['template_name']."</option>";
															}
															echo "</select>";

															echo "<p style='font-size:11px'><a class='viewTemplateLinks' target='_blank' id ='viewTemplateLink' style='color:#00556F;'  href='".$PROJECT_ROOT."'/procedures/home/document/common/viewtemplate.php?template_id=".$var['TEMPLATE_ID']."'>View Template</a></p>";
															
														?>
															
														
													</div>
												</div>
													
												<div class="form-group">
													<label class="col-sm-2 control-label">PDF File:</label>
													<div class="col-sm-10">
														<input id="file" name="pdffile" type="file" class="filestyle" accept=".pdf">
													</div>
												</div>

												<?php
					
													echo "<div id='message' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>";
													if($_SESSION['operation']=='save')
													{
			
														echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Saved Successfully</div>";
			
													}  elseif($_SESSION['operation']=='delete')
													
													{
														echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Deleted Successfully</div>";
													}
														elseif($_SESSION['operation']=='update')
													{
			
														   echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Updated Successfully</div>";
													}
														elseif($_SESSION['operation']=='error')
													{
			
														   echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Something went wrong. Operation not Successful.<br>";
														   echo $_SESSION['message'];
														   echo "</div>";
													}
														elseif($_SESSION['operation']=='scrap')
													{
			
														   echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Scrapped successfully.</div>";
													}
														elseif($_SESSION['operation']=='complete')
													{
			
														   echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Document is completed. Delete failed.</div>";
													}

													   $_SESSION['operation']='clear';
													   $_SESSION['message']='';
					
														echo "</div>";
													?>
		
											<!--- BUTTONS ACTIVITY START --->
		
											<div class="input1">
										
												<?php
																			//if($_SESSION['GROUP']=='POWER USER' or $_SESSION['GROUP']=='POWER ADMIN')
					
												if($_SESSION['GROUP']=='POWER ADMIN')
															{
																$value="document.getElementById('document_hidden').value='delete';";
																echo '<input  type="submit" value="Delete"  onClick="'.$value.'" class="btn btn-danger" id="btn"/>';
															}
												if ($_SESSION['GROUP']!='ADMIN') 
													{
														$value="document.getElementById('document_hidden').value='scrap';";
														echo '<input  type="submit" value="Scrap"  onClick="'.$value.'" class="btn btn-primary" id="btn"/>';
													}
												?>
												 <input id="document_hidden" name="document_hidden" type="hidden" value=""/>
												 <input type="submit" value="Save" onClick="document.getElementById('document_hidden').value='save';" class="btn btn-primary" id="btn"/>
												 <input type="button" value="New" onClick="javascript:cleartext();" class="btn btn-primary" id="btn"/>
	 

											</div>
											<!--- BUTTONS ACTIVITY END--->

										</div>

									</form>
				

							</div>

							<div id="postright0" class="col-xs-6 col-md-4">
								
								<form id="tfnewsearch" method="post">
									<div class="input-group">
									  <input id="search_string" name="search_string" type="text" class="form-control" placeholder="search...">
									  <span class="input-group-btn">
										<button id="search_document" class="btn btn-default btn-search" type="button">Search</button>
									  </span>
									</div><!-- /input-group -->
								</form>
													<!--AUTOSUGGEST SEARCH START-->
								<!--<div id="display"></div>-->
								<!--AUTOSUGGEST SEARCH END-->
									<hr class="hrMargin">
								<!-------- search table ----->
								
								<div class="postright">
															
																
									<table id="responds"
										data-height="430"
										data-toggle="table"
										class="display table table-bordered"
										data-striped="true"
									>
										<thead>
											<tr>
												<th class="col-md-2"  data-field="barcode" data-sortable="true">Barcode</th>
												<th  class="col-md-8" data-field="title" data-sortable="true">Title</th>
												<th class="col-md-2"  data-field="date" data-sortable="true">Date</th>
												<th  data-visible="false" data-field="description" data-sortable="true">description</th>
												<th data-visible="false" data-field="template" data-sortable="true">template</th>
												<th data-visible="false" data-field="type" data-sortable="true">type</th>
												<th data-visible="false" data-field="scrap" data-sortable="true">scrap</th>
											</tr>
										</thead>
									</table>
														
														
														
								</div>		
																	
								<!------ end search table ----->
								
							</div>

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
       <?php
       include('../../../modal.php');
       ?>
<!-- End Modal -->

    <script language="JavaScript" type="text/javascript">



function cleartext() {
  document.getElementById("barcodeinput").value="";
  document.getElementById("title").value="";
  document.getElementById("description").value="";
  document.getElementById("type").value="";
  document.getElementById("template").value="";
  document.getElementById("file").value="";
  document.getElementById("primarykey").value="";

}
//function clickSearch(barcode,title,description,template,type,scrap) {
//   // document.getElementById('primarykey').value=barcode;
//	if (scrap!=1)
//	{
//		document.process.barcode.value=barcode;
//		document.process.title.value=title;
//		document.process.description.value=description;
//		document.process.type.value=type;
//		document.process.template.value=template;
//		//document.process.file.value=a;
//		document.process.primarykey.value=barcode;
//	}
//	else if (scrap==1)
//	{
//		alert("Document is scrapped.");
//		cleartext();
//	}



    //alert (type);
  //  document.getElementById("group").value=username;
//}

function validate() {
	//alert (document.getElementById('document_hidden').value);
	//alert (document.getElementById("document_hidden").value);
    if (document.getElementById('document_hidden').value=='delete') {
        if (document.getElementById('primarykey').value != ""){
        if (confirm("Are you sure you want to delete?") == true) {
            return true;
        }
        else {
            return false;
        }

        }
        else {
            alert("Nothing to delete.");
            return false;
        }


    }

	if (document.getElementById('document_hidden').value=='scrap') {
		if (document.getElementById('primarykey').value != ""){
			if (confirm("Are you sure you want to scrap document?") == true) {
				return true;
			}
			else {
				return false;
			}

		}
		else {
			alert("Nothing to scrap.");
			return false;
		}


	}



    if (document.process.barcode.value=="")   {
        alert("Fill up necessary inputs.");
        return false;
    }
    else if (document.process.title.value=="") {

            alert("Fill up necessary inputs.");
            return false;
        }
    else if (document.process.type.value=="") {
        alert("Select Document type.");
        return false;
    }
    else if (document.process.template.value=="") {
        alert("Select Template.");
        return false;
    }





}

$(document).ready(function() {
    $("#search_document").click(function (e) {

    e.preventDefault();
    var myData = 'search_string='+ $("#search_string").val(); //build a post data structure
    jQuery.ajax({
            type: "POST",
            url:"new/search.php",
            dataType:"json", // Data type, HTML, json etc.
			data:myData,
       beforeSend: function() {

       $('#responds').bootstrapTable("showLoading");
      },
                        
			success:function(response){
							$('#responds').bootstrapTable("hideLoading");
			       	$('#responds').bootstrapTable("load",response);

			},
			error:function (xhr, ajaxOptions, thrownError){
				$.growl.error({ message: thrownError });
			}
			});
			});
//			
//			 $("#search_string").keyup(function() 
//        {
//            var name = $('#search_string').val();
//            var searchtype = 'newDoc';
//            if(name=="")
//            {
//                $("#display").html("");
//            }
//            else
//            {
//                $.ajax({
//                type: "POST",
//                url: "common/autosuggest.php",
//                data: {search_string:name ,searchtype:searchtype},
//                success: function(html){
//                $("#display").html(html).show();
//               
//                }
//                });
//            }
//        });

   
})
$('#feedbackDiv').feedBackBox();

//    $("#generatebarcode").click(function (e) {
//
//        e.preventDefault();
//      //  var myData = 'randbarcode='+ $("#generatebarcode").val(); //build a post data structure
//        jQuery.ajax({
//            type: "POST",
//            url:"new/barcode.php",
//            dataType:"text", // Data type, HTML, json etc.
//           // data:myData,
//            beforeSend: function() {
//                $("#barcodeinput").html("<div id='loading' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
//            },
//            ajaxError: function() {
//                $("#barcodeinput").html("<div id='loading' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
//            },
//            success:function(response){
//                //$("#barcodeinput").html(response);
//                document.getElementById("barcodeinput").value=response;
//            },
//            error:function (xhr, ajaxOptions, thrownError){
//                alert(thrownError);
//            }
//        });
//    });










//    });
	
document.addEventListener("mousemove", function() {
    myFunction(event);
});

function myFunction(e) {
	$("#fade").fadeTo(3000,0.0);

}

// Autosuggest search//

    function fill(Value)
    {
        $('#search_string').val(Value);
        $('#display').hide();
    }
    
   
    
    
    
    
    function templateView()
    {
    		var e = document.getElementById("template");
				var strUser = e.options[e.selectedIndex].value;	
				//alert(strUser);
				   var link = document.getElementById("viewTemplateLink");
   	link.setAttribute("href", "common/viewtemplate.php?template_id="+strUser);
    }
    
  $('#responds').on('click-row.bs.table', function (e, row, $element) {
 //    console.log(row);
   // alert(row['description']);
    
    if (row['scrap']!=1)
	{
		document.process.barcode.value=row['barcode'];
		document.process.title.value=row['title'];
		document.process.description.value=row['description'];
		document.process.type.value=row['type'];
		//document.process.template.value=row['template'];
		//document.process.file.value=a;
		$('#template').selectpicker('val',row['template']);
		$('#template').selectpicker('refresh');
		document.process.primarykey.value=row['scrap'];
	}
	else if (row['scrap']==1)
	{
		alert("Document is scrapped.");
		cleartext();
	}
   
});

	

</script>

</body>
</html>
