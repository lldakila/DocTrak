<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../index.php');
}

	if ($_SESSION['BAC']!=1)
	{
            if ($_SESSION['GROUP']!='POWER ADMIN')
            {
                header('Location:../../../index.php');
            }
             
	}
        else if ($_SESSION['GROUP']!='POWER ADMIN')
        {
            
            if ($_SESSION['BAC']!=1)
            {
                header('Location:../../../index.php');
            }
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

<link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">

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
            
                    <div id="post10">
                        <h2>CHECK IN</h2>
                                    
                                    <div id="BacHistory">
                                        
                                    </div>
    						
                    </div>

                        <div id="postright">
                        
                        	<div id="tfheader">
                            	<form id="tfnewsearch" method="post"  class="form-inline">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input id="search_string" type="text" name="search_string" class="form-control" placeholder="search..." />
                    			<button id="search_document" class="btn btn-default">Search </button>
                                        </div>
                                    </div>
                                    </form>
                                    <!--AUTOSUGGEST SEARCH START-->
                                     <div id="display"></div>
                                     <!--AUTOSUGGEST SEARCH END-->
                                <h2></h2>
                            </div>
                            <div class="tfclear"></div>
                        
                            <div class="scroll">
                        	                                    
                                <table id="responds">
				    <tr class='usercolortest'>
                                	<th class='sizeBARCODE2'>BARCODE</th>
					<th class='sizeDETAIL'>DETAIL</th>
					<th class='sizeCOST'>COST</th>
					<th>DATE</th>
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
<link href="../../../css/bootstrap.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="../../../css/home.css" />
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap-select.css" />
<link rel="stylesheet" type="text/css" href="../../../css/jquery.growl.css" />
<script src="../../../js/jquery-1.10.2.min.js"></script>
<script src="../../../js/bootstrap.min.js"></script>
<script src="../../../js/bootstrap-select.js"></script>
<script src="../../../js/jquery.growl.js"></script>


<script type="text/javascript">
//SEARCH
$(document).ready(function() {
    $("#search_document").click(function (e) {
    e.preventDefault();
    var search_Text=document.getElementById('search_string').value;
    var module_name = 'searchDoc';
    jQuery.ajax({
            type: "POST",
            url:"crud.php",
            dataType:"text", // Data type, HTML, json etc.
            data:{module:module_name,searchText:search_Text},
             beforeSend: function() 
            {
                $("#responds").html("<div id='loading' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
            },
            success:function(response)
            {
                $("#responds").html(response);
            },
            error:function (xhr, ajaxOptions, thrownError)
            {
                $.growl.error({ message: thrownError });
            }
            });
	});
        
 });
 
 
 function clickSearch(doc_Id,docDetail,docCost,docDate)
 {
     
     var module_name="historyCheckin";
     var document_id=doc_Id;
     jQuery.ajax({
            type: "POST",
            url:"crud.php",
            dataType:"text", // Data type, HTML, json etc.
            data:{module:module_name,docId:document_id},
             beforeSend: function() 
            {
                $("#BacHistory").html("<div id='loading'><img src='../../../images/home/ajax-loader.gif' /></div>");
            },
            success:function(response)
            {
                $("#BacHistory").html(response);
            },
            error:function (xhr, ajaxOptions, thrownError)
            {
                $.growl.error({ message: thrownError });
            }
            });
            
 }


//CHECK ME IN
function checkMeIn()
{
    var document_id=document.getElementById('pKey').value;
    var module_name = 'checkIn';

    jQuery.ajax({
            type: "POST",
            url:"crud.php",
            dataType:"text", // Data type, HTML, json etc.
            data:{module:module_name,docId:document_id},
             beforeSend: function() 
            {
                //$("#BacHistory").html("<div id='loading' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
                $("#checkMe").html('checking....');
            },
            success:function(response)
            {
                
                $("#checkMe").html('Check In');
                if (response == 'error')
                {
                   $.growl.error({ message: 'Error' });
                }
                 else
                {
		    $.growl.notice({ message: 'Document Updated' });
		    //$.growl.notice({ message: response });
		    $("#BacHistory").html(response);
                }
              CheckDeadlineIcon();
            },
            error:function (xhr, ajaxOptions, thrownError)
            {
                $.growl.error({ message: thrownError });
            }
            });
	 
        }
        
        function CheckDeadlineIcon()
        {
                var module_name='updateDeadlineIcon';
                var imageloc='<?php echo $PROJECT_ROOT; ?>';
              
                //var module_name = 'documentTracker='+BarcodeId; //build a post data structure
		jQuery.ajax({
			type: "POST",
			url:"crud.php",
			dataType:"text", // Data type, HTML, json etc.
			data:{module:module_name,imgPath:imageloc},
			success:function(response)
                        {
                            $('#deadlineNoti').html(response);
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
                        
		});
        }

</script>
</body>
</html>
