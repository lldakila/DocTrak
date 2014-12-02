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
<script src="../../../js/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../../css/home.css" />
<link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">
<script language="JavaScript" type="text/javascript">


function clickSearch(barcodeno,title,documenttype,template,pdf) {
   // document.getElementById('primarykey').value=barcode;
    document.process.barcodeno.value=barcodeno;
    document.process.title.value=title;
    document.process.documenttype.value=documenttype;
    document.process.template.value=template;
    //document.process.file.value=a;
    document.process.primarykey.value=barcodeno;
	retrieveAttachment(barcodeno);
    GetKey(barcodeno);

}

function GetKey(key) {
    var myData = 'forreceive='+key;
    jQuery.ajax({
        type: "POST",
        url:"common/redirectSearch.php",
        dataType:"text", // Data type, HTML, json etc.
        data:myData,
        
        success:function(response){

            // $("#attachment").html(response);
            //  alert (response);
        },
        error:function (xhr, ajaxOptions, thrownError){
            alert(thrownError);
        }
    });
}


function retrieveAttachment(barcodeID){
        var myData = 'attachment='+barcodeID; //build a post data structure
        jQuery.ajax({
            type: "POST",
            url:"forrelease/retrieveAttachment.php",
            dataType:"text", // Data type, HTML, json etc.
            data:myData,
            beforeSend: function() {
                    $("#attachment").html("<div style='margin:95px 0 0 100px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
            },
            ajaxError: function() {
                    $("#attachment").html("<div style='margin:95px 0 0 100px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
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


    if (document.process.barcodeno.value=="") {
        alert("Cannot release blank document.");
        return false;
    }

}

$(document).ready(function() {
    $("#search_forrelease").click(function (e) {

    e.preventDefault();
    var myData = 'search_string='+ $("#search_string").val(); //build a post data structure
    jQuery.ajax({
            type: "POST",
            url:"forrelease/search.php",
            dataType:"text", // Data type, HTML, json etc.
            data:myData,
            beforeSend: function() {
                $("#responds").html("<div style='margin:95px 0 0 100px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
            },
            ajaxError: function() {
                $("#responds").html("<div style='margin:95px 0 0 100px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
            },
            success:function(response){
                    $("#responds").html(response);

            },
            error:function (xhr, ajaxOptions, thrownError){
                    alert(thrownError);
            }
            });
	});



    });

</script>
</head>

<body>
<?php
    $PROJECT_ROOT= '../../../';
    include_once('../../../header.php');
?>

<div class="content">

	<div class="content1">
    
    	<div class="content2">
        
        	<div id="post">
            
            			<div id="post10">
                        <h2>FOR RELEASE</h2>

                            <form name="process" method="post" action="forrelease/process.php" onsubmit="return validate();" enctype="multipart/form-data">

    					<div class="table1">
    				<table >
                    <tr>
                    	<td>BarCode No:</td>

                        <td class="usertext">
                            <input id="primarykey" name="primarykey" type="hidden" />
                            <input id="barcodeno" readonly="readonly" name="barcodeno" type="text" />
                            </td>
                    </tr>
                    <tr>
                    	<td>Title:</td>
                        <td class="usertext"><input id="title" readonly="readonly" name="title" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Document Type:</td>
                        <td class="usertext"><input id="documenttype" readonly="readonly" name="documenttype" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Template:</td>
                        <td class="usertext"><input id="template" readonly="readonly" name="template" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Comment:</td>
                        <td class="usertext"><textarea rows="5" id="comment" name="comment" type="text"></textarea> </td>
                    </tr>
                    <tr>
                    	<td>Attachment: </td>
                         <td id="attachment">
                         
                         
                         </td>
                    </tr>
                  </table>

                            <?php

                            if($_SESSION['operation']=='save'){

                                echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Released Successfully </div>";

                            }
                            elseif ($_SESSION['operation']=='error') {
                                echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Something went wrong. </div>";
                            }

                            $_SESSION['operation']='clear';

                            ?>

                  		 <!--- BUTTONS ACTIVITY START --->

                        <div class="input2">
                         <input id="forrelease_hidden" name="forrelease_hidden" type="hidden" value="0"/>
                         <input type="submit" value="For Release" onClick="document.getElementById('forrelease_hidden').value='forrelease';"/>
                         </div>
                           <!--- BUTTONS ACTIVITY END--->

                  </div>

						   </form>




                        </div>

                        <div id="postright">
                        
                        	<div id="tfheader">
                            	<form id="tfnewsearch" method="POST">
		        				<input id="search_string" type="text" name="search_string" class="tftextinput" placeholder="search..." />
                    			<button id="search_forrelease" class="tfbutton">Search </button>
								</form>	
                                <h2></h2>							
                            </div>
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

</div>

<div class="footer">

	<div class="footer1">
    
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

</body>
</html>
