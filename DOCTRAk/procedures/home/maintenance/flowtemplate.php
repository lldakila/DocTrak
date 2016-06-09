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
		                      <h2>FLOW TEMPLATE</h2>
													<hr class="hrMargin" style="margin-bottom:10px;">
		
		                              <form name="flowtemplate" method="post" action="flowtemplate/process.php" onsubmit="return validate();">
		
															    					<div class="table1 form-horizontal">
															    						
															    						<div class="form-group">
																							    <label class="col-sm-2 control-label">Template:</label>
																							    <div class="col-sm-10">
																							    		<input id="primarykey" name="primarykey" type="hidden" />
															                        <input id="template_name" name="template_name" type="text" class="form-control" /> 
																							    </div>
																						  </div>
																						  
																						  <div class="form-group">
																							    <label class="col-sm-2 control-label">Description:</label>
																							    <div class="col-sm-10">
																							    		<input id="description_name" name="template_description" type="text" class="form-control" />
																							    </div>
																						  </div>
																						  
																						 
																						</div>
																						
																						<div class="form-inline">
																					
																								<div class="form-group">
																									
																							    <label class="col-sm-2 control-label" style="margin-left:33px;" for="exampleInputEmail2">Office:</label>
																							    
																							  </div>
																							  <div class="form-group">
																							  		
																							  		<div class="FlowTemWidth">
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
																                    </div>
																							  </div>      
																							  
																							  <!--<button type="submit" value="+" onClick="javascript:addoffice();" class="btn btn-primary"><font class="glyphicon glyphicon-plus"></font></button>
																							  <input type="button" value="+" onClick="javascript:addoffice();" class="btn btn-primary" />-->
																							  <button type="submit" value="+" onClick="javascript:addoffice();" class="btn btn-primary">+</button>
																					  </div>
																						  
																						<div class="form-inline" style="margin-top:10px;">
																			
																								<div class="form-group" id="FTremoveWidth">
																									
																							    <label style="margin-left:122px;" for="exampleInputEmail2"></label>
																							    	
																								    <input type="hidden" name="OfficeArray" id="OfficeArray">
														                            <select id="officeselect" size="10" width="15" name="officeselection" >
														
														                            </select>
																							        
																							  </div>
																							  <button id="deleteselected" type="submit" value="-" onclick="removeoffice(officeselection);" class="btn btn-danger">-</button>
																							  <!--<input type="button" id="deleteselected" value="-" onclick="removeoffice(officeselection);" class="btn btn-danger" />-->
																					  </div>
																						  
																		    			   
															                            <?php
															                            
															                            if($_SESSION['operation']=='save'){
															
															                                echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Saved Successfully </div>";
															
															                            }  elseif($_SESSION['operation']=='delete'){
															
															                                echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Deleted Successfully </div>";
															                            }
															                            elseif($_SESSION['operation']=='error'){
															
															                                echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Something went wrong. Operation not Successful. </div>";
															                            }
															                            elseif($_SESSION['operation']=='update'){
															
															                                echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Update Successful. </div>";
															                            }
															
															                            $_SESSION['operation']='clear';
															
															                            ?>
															                            
																	                <div class="form-group">
																									    <label class="col-sm-2 control-label"></label>
																									    <div class="col-sm-10">
																									    		 <label>
																															<input type="checkbox" id="publicCheckbox" name="publicCheckbox" > Public Document
																														</label>
																									    </div>
																								  </div>     
															                        <!--- BUTTONS ACTIVITY START --->
																											
																												
																												
																	                        <div class="input1">
																		                         <input id="template_mode" name="template_mode" type="hidden" value="0"/>
																		                         <input type="submit" value="Delete"  onClick="document.getElementById('template_mode').value='delete';" class="btn btn-danger" />
																		                         
																		                         
																		                         <input type="submit" value="Save" onClick="document.getElementById('template_mode').value='save';" class="btn btn-primary" />
																		                         <input type="button" value="New" onClick="javascript:cleartext();" class="btn btn-primary" />
																	                        </div>
															                           
															                        
																											<!--- BUTTONS ACTIVITY END--->
																						
																	</form>
																                        
		                  </div>
		                        	<div id="postright0" class="col-xs-6 col-md-4">
		                            
		                            		
		                                    	<form id="tfnewsearch" method="post">
		                                            
		                                                <div class="input-group">
		                                                    <input id="search_string" type="text" name="search_string" class="form-control" placeholder="search..." />
		                                                    <span class="input-group-btn">
		                                                    	<button id="search_flowtemplate" class="btn btn-default">Search </button>
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
																								<th class="col-md-2"  data-field="template_name" data-sortable="true">Template</th>
																								<th  class="col-md-8" data-field="description_name" data-sortable="true">Description</th>
																								
																				    </tr>
																				  </thead>
							                                    <!--<tr class='usercolortest'>
																											<th class="sizeTEMPLATE">TEMPLATE</th>
							                                        <th class="sizeDESCR">DESCRIPTION</th>
							                                    </tr>	-->
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
/*<![CDATA[*/
function addoffice() {

    var myForm = document.flowtemplate;
    var mySel = myForm.officeselection;
    var myOption;
    var hiddenContent;

    myOption=document.createElement("Option");
    myOption.text=document.getElementById("officelist").value;
    myOption.value=document.getElementById("officelist").value;
   // mySel.add(myOption);
    mySel.appendChild(myOption);
        if (document.flowtemplate.OfficeArray.value!="") {
            hiddenContent=document.flowtemplate.OfficeArray.value + "|";
        }
    else {
            hiddenContent="";
        }

        document.flowtemplate.OfficeArray.value=hiddenContent  +  document.getElementById("officelist").value;


   // alert (document.flowtemplate.OfficeArray.value);



}

function removeoffice(selectbox) {

    var i;
    var x;
    var officeArray = [];

    var hiddenContent;
    var hold1;

    officeArray=document.flowtemplate.OfficeArray.value.split("|");
    //document.flowtemplate.OfficeArray.value="";
   // alert (selectbox.options.length);
    for(i=selectbox.options.length-1;i>=0;i--)
    {
        if(selectbox.options[i].selected) {
            selectbox.remove(i);
            officeArray.splice(i,1);
            }



    }
//    document.flowtemplate.OfficeArray.value="";
//    for(x=officeArray.length-1;x>0;x--) {
//        hold1=officeArray[x];
//        if (document.flowtemplate.OfficeArray.value!="") {
//            hiddenContent=document.flowtemplate.OfficeArray.value + "|";
//        }
//        else {
//            hiddenContent="";
//        }
//        document.flowtemplate.OfficeArray.value = hiddenContent  +  hold1;
//    }

}

function officelist() {
    var z;
    var hiddenContent;

    document.flowtemplate.OfficeArray.value="";

    for(z=document.flowtemplate.officeselection.options.length-1;z>=0;z--)
    {
        //alert (document.flowtemplate.officeselection.options[z].value);

        if (document.flowtemplate.OfficeArray.value!="") {
            hiddenContent=document.flowtemplate.OfficeArray.value + "|";
        }
        else {
            hiddenContent="";
        }

        document.flowtemplate.OfficeArray.value=hiddenContent  +  document.flowtemplate.officeselection.options[z].value;


    }


}



function cleartext() {
  document.getElementById("template_name").value="";
  document.getElementById("description_name").value="";
  document.getElementById("primarykey").value="";
  document.getElementById("officeselect").innerHTML="";

}

//function clickSearch(template_id,template_name,description_name,publicTemplate) {
//    document.getElementById("template_name").value=template_name;
//    document.getElementById("description_name").value=description_name;
//    document.getElementById("primarykey").value=template_id;
//    if (publicTemplate==1)
//    {
//    	document.getElementById("publicCheckbox").checked=true;
//    }
//    else
//    {
//    	document.getElementById("publicCheckbox").checked=false;
//    }
//    	
//    retrieveoffice(template_id);
//    retrieveofficearray(template_id);
//}

        function retrieveoffice(template_id){
    var myData = 'template_name='+template_id; //build a post data structure
    jQuery.ajax({
			type: "POST",
            url:"flowtemplate/office.php",
            dataType:"text", // Data type, HTML, json etc.
			data:myData,
              
			success:function(response){

				$("#officeselect").html(response);
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
			});
	}

    function retrieveofficearray(template_id) {
        var myData = 'template_id='+template_id; //build a post data structure
        jQuery.ajax({
            type: "POST",
            url:"flowtemplate/officehidden.php",
            dataType:"text", // Data type, HTML, json etc.
            data:myData,
            
            success:function(response){
               // $("#OfficeArray").html(response);
                document.getElementById('OfficeArray').value=response;
                //alert(response);
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    }





function validate() {



    if (document.getElementById('template_mode').value=='delete') 
    {
        if (document.getElementById('primarykey').value!="") {
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



    if (document.flowtemplate.template_name.value=="")   {
        alert("Fill up necessary inputs.");
        return false;
    }

//    else if (document.flowtemplate.template_description.value=="")
//    {
//        alert("Fill up necessary inputs.");
//        return false;
//    }


    if (document.flowtemplate.officeselection.length == 0) {
        alert("Fill up necessary inputs.");
        return false;
    }


    officelist();
    //alert (document.flowtemplate.OfficeArray.value);
    //return true;

}

$(document).ready(function() {
	//##### send add record Ajax request to response.php #########

  //  $('.del_wrapper').click(function() {
   //     alert();
        //   var id = $(this).parent().get(0).id;
   //     $(this).parent().remove();
   // });

////	$("#add_office").click(function (e) {
//	//		e.preventDefault();
//	//	  // alert("gdg");
//            var myData = 'office='+ $("#Office").val(); //build a post data structure
//			jQuery.ajax({
//			type: "POST", // HTTP method POST or GET
//			url:"procedures/home/flowtemplate/process.php", //Where to make Ajax calls
//			dataType:"text", // Data type, HTML, json etc.
//			data:myData,
//			    success:function(response){
//				$("#responds01").append(response);
//
//			    },
//			error:function (xhr, ajaxOptions, thrownError){
//				alert(thrownError);
//			}
//			});
//	});

    $("#search_flowtemplate").click(function (e) {

    e.preventDefault();
    var myData = 'search_string='+ $("#search_string").val(); //build a post data structure
    jQuery.ajax({
			type: "POST",
            url:"flowtemplate/search.php",
            dataType:"json", // Data type, HTML, json etc.
			data:myData,
            beforeSend: function() {
                    $("#responds").bootstrapTable("showLoading");
            },
//                        ajaxError: function() {
//                                $("#responds").html("<div id='loading' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
//                        },
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
	
		document.getElementById("template_name").value=row['template_name'];
    document.getElementById("description_name").value=row['description_name'];
    document.getElementById("primarykey").value=row['template_id'];
    
    if (row['publicTemplate']==1)
    {
    	document.getElementById("publicCheckbox").checked=true;
    }
    else
    {
    	document.getElementById("publicCheckbox").checked=false;
    }
    
    retrieveoffice(template_id);
    retrieveofficearray(template_id);
});



/*]]>*/
</script>
</body>
</html>
