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
<link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">
<script src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


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
                        <h2>RECEIVE DOCUMENT</h2>
													<hr class="hrMargin" style="margin-bottom:10px;">
                        	<form name="process" method="post" action="receive/process.php" onsubmit="return validate();" enctype="multipart/form-data">

    												<div class="table1 form-horizontal">
									    				
									    					<div class="form-group">
																    <label class="col-sm-2 control-label">From:</label>
																    <div class="col-sm-10">
																      	<input type="text" class="form-control" id="userId" placeholder="Scan ID...">
																    </div>
															  </div>
															  
															  <div class="form-group">
																    <label class="col-sm-2 control-label">BarCode No:</label>
																    <div class="col-sm-10">
																    		<input id="primarykey" name="primarykey" type="hidden" />
																      	<input type="hidden" class="form-control" id="barcode" name="barcode" placeholder="Title">
																      	<input id="barcodeno" readonly="readonly" name="barcodeno" type="text" class="form-control"/>
																    </div>
																</div>
																
																<div class="form-group">
																    <label class="col-sm-2 control-label">Title:</label>
																    <div class="col-sm-10">
																      	<input type="text" class="form-control" id="title" readonly="readonly" name="title" placeholder="">
																    </div>
																</div>
																
																<div class="form-group">
																    <label class="col-sm-2 control-label">Document Type:</label>
																    <div class="col-sm-10">
																      	<input type="text" class="form-control" id="documenttype" readonly="readonly" name="documenttype" placeholder="">
																    </div>
																</div>
																
																<div class="form-group">
																    <label class="col-sm-2 control-label">Template:</label>
																    <div class="col-sm-10">
																      	<input type="text" class="form-control" id="template" readonly="readonly" name="template" placeholder="">
																    </div>
																</div>
																
																<div class="form-group">
																    <label class="col-sm-2 control-label">Comment:</label>
																    <div class="col-sm-10">
																    		
																    				<?php                      
									                            require_once("../../connection.php");
									                            global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
									                            $con=mysqli_connect($DB_HOST, $DB_USER,$DB_PASS,$BD_TABLE);
									                            $query="SELECT Message FROM message WHERE Message_Module = 'tracking' ORDER BY Message";
									                            $result=mysqli_query($con,$query);
									                            echo '<select id="comment" class="form-control">';
									                            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
									                            {
									                                echo '<option>';
									                                echo $row['Message'];
									                                echo '</option>';
									                            }
									                            echo '<option value="other">Other</option>';
									                            echo '</select>';
										                        ?>
																      	
																    </div>
																</div>
																
																<div class="form-group">
																    <label class="col-sm-2 control-label"></label>
																    <div class="col-sm-10">
																      	<textarea class="form-control" rows="5" id="commenttext" readonly="readonly" name="commenttext"></textarea>
																    </div>
																</div>
																
																<div class="form-group">
																    <label class="col-sm-2 control-label">Attachment:</label>
																    <div class="col-sm-10">
																      	<span id="attachment"></span>
																    </div>
																</div>

                    					<?php
         
																if($_SESSION['operation']=='save')
																	{
																		echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Received Successfully</div>";
																  }
																    else if ($_SESSION['operation']=='error') 
																  {
																    echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Something went wrong. </div>";
																    echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Something went wrong.</div>";
																  }
																
																     $_SESSION['operation']='clear';

															?>

					                  		<!--- BUTTONS ACTIVITY START --->
					                      <div class="input1">
					                         <input type="submit" value="Receive" class="btn btn-primary"/>
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
	                                        <button id="search_receiveddoc" class="btn btn-default">Search</button>
	                                        </span>
	                                    </div>	
	                              </form>	
    
		                            <!--AUTOSUGGEST SEARCH START-->
		                        			<!--<div id="display"></div>-->
		                        		<!--AUTOSUGGEST SEARCH END-->
		                        		<hr class="hrMargin">
                        
			                         	<div class="postright">  
			                            <div class="scroll">
			                        	                                    
			                                <table id="responds"
			                                	data-height="450"
																	      data-toggle="table"
																	      class="display table table-bordered"
			                                	>
			                                	<tr class='usercolortest'>
																			    <th class="sizeBARCODE">BARCODE</th>
																			    <th class="sizeTITLE">TITLE</th>
																			    <th>DATE</th>
			                                	</tr>
			                                </table>
			
			                            </div>
			                          </div>
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



function clickSearch(barcodeno,title,documenttype,template,tracker_id,document_id) {
    document.process.barcodeno.value=barcodeno;
    document.process.title.value=title;
    document.process.documenttype.value=documenttype;
    document.process.template.value=template;
    document.process.primarykey.value=tracker_id;
    document.process.barcode.value=document_id;
    retrieveAttachment(barcodeno);
    
    //GetKey(barcodeno);


    //alert (pdf);
  //  document.getElementById("group").value=username;
}


//function GetKey(key) {
//    var myData = 'receive='+key;
//    jQuery.ajax({
//        type: "POST",
//        url:"common/redirectSearch.php",
//        dataType:"text", // Data type, HTML, json etc.
//        data:myData,
//        success:function(response){
//
//           // $("#attachment").html(response);
//          //  alert (response);
//        },
//        error:function (xhr, ajaxOptions, thrownError){
//            alert(thrownError);
//        }
//    });
//}


function retrieveAttachment(barcodeID){
        var myData = 'attachment='+barcodeID; //build a post data structure
        jQuery.ajax({
            type: "POST",
            url:"receive/retrieveAttachment.php",
            dataType:"text", // Data type, HTML, json etc.
            data:myData,
            beforeSend: function() {
                    $("#attachment").html("<div id='loadingDOC' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
            },
            ajaxError: function() {
                    $("#attachment").html("<div id='loadingDOC' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
            },
            success:function(response){

                $("#attachment").html(response);
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    }
	
	
function validate() {



    if (document.process.primarykey.value=="")   {
        alert("Cannot receive blank document.");
        return false;
    }


}

$(document).ready(function() {
    $("#search_receiveddoc").click(function (e) {

    e.preventDefault();
    var myData = 'search_string='+ $("#search_string").val(); //build a post data structure
    jQuery.ajax({
			type: "POST",
            url:"receive/search.php",
            dataType:"text", // Data type, HTML, json etc.
			data:myData,
            beforeSend: function() {
                    $("#responds").html("<div id='loading' style='width:300px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
            },
            ajaxError: function() {
                    $("#responds").html("<div id='loading' style='width:300px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
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
    
    $(document).ready(function()
    {
        $("#search_string").keyup(function() 
        {
            var name = $('#search_string').val();
            var searchtype = 'ReceiveDoc';
            if(name=="")
            {
                $("#display").html("");
            }
            else
            {
                $.ajax({
                type: "POST",
                url: "common/autosuggest.php",
                data: {search_string:name ,searchtype:searchtype},
                success: function(html){
                $("#display").html(html).show();
                }
                });
            }
        });
    });


$('#comment').change(function () {
   if (document.getElementById('comment').value=='other')
   {
       $('#commenttext').get(0).removeAttribute("readonly");
     
    document.getElementById('commenttext').value='';
    $('#commenttext').get(0).setAttribute("style", "display:block");
   }
   else
   {
       var e = document.getElementById("comment");
    var strUser = e.options[e.selectedIndex].text;
       $('#commenttext').get(0).setAttribute("readonly", "readonly");
       $('#commenttext').get(0).setAttribute("style", "display:none");
       document.getElementById('commenttext').value=strUser;
       
       
       
   }
}).change();



</script>
</body>
</html>
