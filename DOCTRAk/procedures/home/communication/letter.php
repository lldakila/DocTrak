<?php
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
	  $_SESSION['in'] ="start";
	 header('Location:../../../index.php');
	}

//	if($_SESSION['GROUP']!='POWER ADMIN')
//	{
//		header('Location:../../../index.php');
//	}


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

<link rel="stylesheet" type="text/css" href="../../../css/jquery.feedback_me.css" />
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap-select.css" />
<link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="../../../css/jquery.growl.css" />
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap-table.css" />
<script src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="../../../js/jquery.growl.js"></script>

<script src="../../../js/jquery.feedback_me.js"></script>
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
        
		<div class="container">
			<div class="row">
    					
				<div id="post">
					<div id="post100" class="colsize">
						<h2 style="padding-top:20px;">LETTER</h2>
						<hr class="hrMargin" style="margin-bottom:10px;">
					
							<form id="data" class="myForm" name="data" method="post"  enctype="multipart/form-data">
				
								<div class="table1 form-horizontal">
									
									<div class="form-group">
										<label class="col-sm-3 control-label">Title:</label>
										<div class="col-sm-9">
												<input id="primarykey" name="primarykey" type="hidden">
											<input id="header_name" name="header_name" type="text" class="form-control" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">Note:</label>
										<div class="col-sm-9">
												<input id="note_name" name="note_name" type="text" class="form-control" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">Type:</label>
										<div class="col-sm-9">
											<select name='mail_type' id='mail_type' class="selectpicker form-control">
												<?php
													//require_once('../../../procedures/connection.php');
													
													$query=select_info_multiple_key("select DOCUMENTTYPE_ID from document_type");
													foreach($query as $var) {
													echo "<option data-subtext='".$var['DOCUMENTTYPE_ID']."'>".$var['DOCUMENTTYPE_ID']."</option>";
													}
												?>
											</select>																	      	
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label">Owner:</label>
										<div class="col-sm-9">
											<input id="owner_name" name="owner_name" type="text" readonly="readonly" class="form-control"  value="<?php echo $_SESSION['security_name'];  ?>"/> 
										</div>
									</div>
									
									<!--<div class="form-group">
										<label class="col-sm-2 control-label">Send to:</label>
										<div class="col-sm-10">
												<select name='officelist' id='officelist' class="form-control selectpicker">
													<?php
														//require_once("../../connection.php");
												
														$_SESSION['number_counter']=0;
														//$query=select_info_multiple_key("select office_name from office ORDER BY OFFICE_NAME");
														$query="select office_name, office_description from office ORDER BY OFFICE_NAME";
																$result=mysqli_query($con,$query)or die(mysqli_error($con));
														foreach($result as $var) {
															echo "<option data-subtext='".$var['office_description']."'>".$var['office_name']."</option>";
														}
													?>
										  </select>
										  <!-- <button id="add_office" type="button">Add Office</button>-->
									<!---<input type="button" value="+" onClick="javascript:addoffice();" class="btn btn-primary" />
										</div>
									</div>-->
							  
								</div>
								
								<div class="form-horizontal">
									<div class="form-group">
										<label class="col-sm-3 control-label">Send to:</label>
										<div class="col-sm-9">
											<div class="input-group">
												<select id="officelist" name="officelist" class="form-control selectpicker" data-live-search="true"> 
												
											   
														<?php
	//																				         <select name='officelist' id='officelist' class="form-control selectpicker SendSize" data-live-search="true">
															//require_once("../../connection.php");
													
															$_SESSION['number_counter']=0;
															//$query=select_info_multiple_key("select office_name from office ORDER BY OFFICE_NAME");
															$query="select office_name, office_description from office where office_name in (select fk_office_name from security_user) ORDER BY OFFICE_NAME ";
																	$result=mysqli_query($con,$query)or die(mysqli_error($con));
	//																					        foreach($result as $var) {
	//																					            echo "<option data-subtext='".$var['office_description']."'>".$var['office_name']."</option>";
	//																					        }
															while ($var=mysqli_fetch_array($result)) {
																  echo "<option selected='true' value = '".$var['office_name']."' data-subtext='".$var['office_description']."'>".$var['office_name']."</option>";
															   }
														?>
												</select>
												<div class="spinbox-buttons input-group-btn">					
													<button type="button" class="btn spinbox-up btn-sm btn-success" id="btn-sm" onClick="javascript:addoffice();">						
														<i class="icon-only  ace-icon ace-icon fa fa-plus bigger-110"></i>					
													</button>
													
												</div>
											</div>
											
										</div>									
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label"></label>
										<div class="col-sm-9">
											<div class="input-group">
												<input type="hidden" name="OfficeArray" id="OfficeArray">
												<select id="officeselection" size="10" width="15" name="officeselection" >
		
												</select>	
												<div class="spinbox-buttons input-group-btn">					
													<button type="button" class="btn spinbox-up btn-sm btn-danger" id="btn-sm" onclick="removeoffice(officeselection);"">						
														<i class="icon-only  ace-icon ace-icon fa fa-minus bigger-110"></i>					
													</button>
													
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="padding-top:0;">File:</label>
										<div class="col-sm-9">
											<input id="filepdf" name="filepdf" type="file" accept=".pdf" />
										</div>
									</div>
									<div class="form-group">
										
										<div class="col-sm-12">
											<input id="template_mode" name="template_mode" type="hidden" value="0"/>                   
											<!-- <button id="letterSave"  type="button"  onclick="return submitSave()" class="btn btn-primary"> Save</button>    -->
											<button id="SaveLetter" class="btn btn-primary pull-right btn-save">Save</button>
										</div>
									</div>
									<div class="tfclear"></div>
								</div>
										  
								
										 
								
			
							   
			
																			<!--
																			
																										<?php
																										
																			// if($_SESSION['operation']=='save'){
																			//
																			// echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Saved Successfully </div>";
																			//
																			//  }  elseif($_SESSION['operation']=='delete'){
																			//
																			// echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Deleted Successfully </div>";
																			// }
																			// elseif($_SESSION['operation']=='error'){
																			//
																			// echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Something went wrong. Operation not Successful. </div>";
																			// }
																			// elseif($_SESSION['operation']=='update'){
																			//
																			// echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Update Successful. </div>";
																			// }
																			//
																			// $_SESSION['operation']='clear';
																			
																			   ?>
																			   - BUTTONS ACTIVITY START -
																			-->
												
				
							</form>
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
/*<![CDATA[*/
function addoffice() {

    var myForm = document.data;
    var mySel = myForm.officeselection;
    var myOption;
    var hiddenContent;

    myOption=document.createElement("Option");
    myOption.text=document.getElementById("officelist").value;
    myOption.value=document.getElementById("officelist").value;
   // mySel.add(myOption);
    mySel.appendChild(myOption);
        if (document.data.OfficeArray.value!="") {
            hiddenContent=document.data.OfficeArray.value + "|";
        }
    else
	{
            hiddenContent="";
        }
        document.data.OfficeArray.value=hiddenContent  +  document.getElementById("officelist").value;

   // alert (document.data.OfficeArray.value);



}

function removeoffice(selectbox) {

    var i;
    var x;
    var officeArray = [];

    var hiddenContent;
    var hold1;

    officeArray=document.data.OfficeArray.value.split("|");
    //document.data.OfficeArray.value="";
   // alert (selectbox.options.length);
    for(i=selectbox.options.length-1;i>=0;i--)
    {
        if(selectbox.options[i].selected) {
            selectbox.remove(i);
            officeArray.splice(i,1);
            }



    }
//    document.data.OfficeArray.value="";
//    for(x=officeArray.length-1;x>0;x--) {
//        hold1=officeArray[x];
//        if (document.data.OfficeArray.value!="") {
//            hiddenContent=document.data.OfficeArray.value + "|";
//        }
//        else {
//            hiddenContent="";
//        }
//        document.data.OfficeArray.value = hiddenContent  +  hold1;
//    }

}

function officelist() {
    var z;
    var hiddenContent;

    document.data.OfficeArray.value="";

    for(z=document.data.officeselection.options.length-1;z>=0;z--)
    {
        //alert (document.data.officeselection.options[z].value);

        if (document.data.OfficeArray.value!="") {
            hiddenContent=document.data.OfficeArray.value + "|";
        }
        else {
            hiddenContent="";
        }

        document.data.OfficeArray.value=hiddenContent  +  document.data.officeselection.options[z].value;


    }


}



function cleartext() {
  document.getElementById("template_name").value="";
  document.getElementById("description_name").value="";
  document.getElementById("primarykey").value="";
  document.getElementById("officeselection").innerHTML="";

}

function clickSearch(id,title,note,owner,doc_type) 
{
    document.getElementById("primarykey").value=id;
    document.getElementById("header_name").value=title;
    document.getElementById("note_name").value=note;
    //document.getElementById("owner_name").value=note;
    //alert(doc_type);
    retrieveType(doc_type);
    retrieveSender(owner);
//    retrieveoffice(template_id);
//    retrieveofficearray(template_id);
}

    function retrieveoffice(template_id){
    var myData = 'template_name='+template_id; //build a post data structure
    jQuery.ajax({
	type: "POST",
	url:"flowtemplate/office.php",
	dataType:"text", // Data type, HTML, js
	//n etc.
	data:myData,

	success:function(response){

		$("#officeselection").html(response);
	},
	error:function (xhr, ajaxOptions, thrownError){
		alert(thrownError);
	}
	});
	}

    function retrieveType(type_id) 
    {
        var typeid = type_id; //build a post data structure
        var module='getType';
	jQuery.ajax({
            type: "POST",
            url:"crud.php",
            dataType:"text", // Data type, HTML, json etc.
            data:{module:module,typeid:typeid},
	    beforeSend: function() {
		$("#mail_type").html("<option data-subtext='updating......'></option>");
		$('.selectpicker').selectpicker('refresh');
	    },
            success:function(response){
		$("#mail_type").html(response);
		$('.selectpicker').selectpicker('refresh');
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    }

    function retrieveSender(senderId)
    {
	var senderId = senderId; //build a post data structure
        var module='getSender';
	jQuery.ajax({
            type: "POST",
            url:"crud.php",
            dataType:"text", // Data type, HTML, json etc.
            data:{module:module,senderId:senderId},
	    beforeSend: function() {
		//$("#owner_name").value("updating......");
		document.getElementById('owner_name').value="updating......";
	    },
            success:function(response){
		document.getElementById('owner_name').value=response;
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    }


function validate(module) {

officelist();

//    if (document.getElementById('template_mode').value=='delete') 
//    {
//        if (document.
//        getElementById('primarykey').value!="") {
//        if (confirm("Are you sure you want to delete?") == true) {
//            return true;
//        }
//        else {
//            return false;
//        }
//        }
//        else {
//            alert("Nothing to delete.");
//            return false;
//        }
//    }

///SAVE
    if (module=='save')
    {
	if (document.data.header_name.value=="")   
	{
	    return false;
	}
	if (document.data.officeselection.length == 0) 
	{
	    return false;
	}
	if (document.data.filepdf.value=='')
	{
	    return false;
	}
    }
    
}

$(document).ready(function() {

    $("#search_letter").click(function (e) {

    e.preventDefault();
    var searchText = $("#search_string").val(); //build a post data structure
    var module = "SearchLetter";
//    formData.append("search_string",$("#search_string").val[0]);
//    formData.append("module","SearchLetter");
    
    jQuery.ajax({
	    type: "POST",
            url:"crud.php",
            dataType:"text", // Data type, HTML, json etc.
	    data:{module:module,searchText:searchText},
	    beforeSend: function() {
		    $("#responds").html("<div id='loading' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
	    },
	    ajaxError: function() {
		    $("#responds").html("<div id='loading' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
	    },
	    success:function(response){
		    $("#responds").html(response);
		    

	    },
	    error:function (xhr, ajaxOptions, thrownError){
		    alert(thrownError);
	    }
	    });
	});


$('#feedbackDiv').feedBackBox();

});



//document.addEventListener("mousemove", function() {
//    myFunction(event);
//});
//
//function myFunction(e) {
//	$("#fade").fadeTo(3000,0.0);
//
//}





/*]]>*/

//SAVE EVENT
$("form#data").submit(function(){


    if (validate('save')==false)
    {
	//alert("Fill up necessary inputs.");
	$.growl.error({ message: "Fill up necessary inputs." });
	return false;
    }
    //return false;
//    else
//    {
//	saveLetter('saveMe');
//    }


    var formData = new FormData($(this)[0]);
    formData.append("module","saveMe");
    $.ajax({
        url: "crud.php",
        type: 'POST',
        data: formData,
        async: false,
	 beforeSend: function()
	{
	    $("#SaveLetter").html('Saving....');
	},
	
        success: function (data) 
	{
            if (data == "")
		    {
						$.growl.notice({ message: 'Saved Successfully' });
						clearMe();
		    }
	    else
	    {
						$.growl.error({ message: data });
	    }
	    			$("#SaveLetter").html('Save');
        },
        cache: false,
        contentType: false,
        processData: false
    });

    return false;
});



function clearMe()
{
    document.getElementById('header_name').value='';
    document.getElementById('note_name').value='';
    // document.getElementById('mail_type').value;
    document.getElementById('OfficeArray').value='';
    document.getElementById('filepdf').value=''; 
}




function submitSave()
{
    if (validate('save')==false)
    {
	alert("Fill up necessary inputs.");
	//return false;
    }
    else
    {
	saveLetter('saveMe');
    }
    
    
    
}

function saveLetter(moduleName)
{
    switch (moduleName)
    {
	
            case 'saveMe':
                
                
		var title=document.getElementById('header_name').value;
		var note=document.getElementById('note_name').value;
		var doctype = document.getElementById('mail_type').value;
		var officelist = document.getElementById('OfficeArray').value;
		var filepdf =  document.getElementById('filepdf');
		data = new FormData($("filepdf")[0]);
		var files=filepdf.file;
		//alert(officelist);
		
		if (document.getElementById('primarykey').value=='')
		{
		    var module_name="saveMe";
		}
		else
		{
		    var module_name="editMe";
		}
		
    }
    
    jQuery.ajax({
            type: "POST",
            url:"crud.php",
            dataType:'text',
	    mimeType: "multipart/form-data",
            data:{module:module_name,title:title,note:note,doctype:doctype,officelist:officelist,filepdf:files},
             beforeSend: function()
            {
                //$.growl.warning({ message: 'Saving....' });
                $("#letterSave").html('Saving....');
            },
            success:function(response)
            {
		alert (response);
//                if (response=='Document saved.')
//                {
//                     $.growl.notice({ message: response });
//                }
//                else if (response=='Document Updated.')
//                {
//                     document.getElementById('barcodenoKey').value=document.getElementById('barcodeno').value;
//                     $.growl.notice({ message: response });
//                }
//                else
//                {
//                    $.growl.error({ message: response });
//                    //$('#fademessage').html(response);
//                }
		    $("#letterSave").html('Save');
            },
            error:function (xhr, ajaxOptions, thrownError){
//                 $.growl.error({ message: thrownError });
                    $("#letterSave").html('Save');
//               
            }
        });
    
    
    
}



</script>
</body>
</html>
