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
<link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon" />


    
    
    
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
                    <h2>DOCUMENT TRACKER</h2>
                    

                 <div id="retrievetable" >
                     <div id="ajaxhistory">
						


                     </div>


                 </div>




                </div>

                <div id="postright">
                
                	<div id="tfheader">
                    	<form id="tfnewsearch" method="post" class="form-inline">
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
                        		
 									
                                    
                                    
                                	
                                    <table id="responds" >
                                	<tr class='usercolortest'>
					    <th class="sizeBARCODE2">BARCODE</th>
					    <th class="sizeTITLE2">TITLE</th>
					    <th class="sizeOWNER2">OWNER</th>
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
			
			<a href="#">Scroll Top</a></p>
        </div>

    </div>

</div>

<!-- Modal -->
       <?php
       include('../../../modal.php');
       ?>
<!-- End Modal -->   
<script src="../../../js/jquery-1.10.2.min.js"></script>
<script src="../../../js/bootstrap.min.js"></script>
<script language="JavaScript" type="text/javascript">


   

    function retrieveDocumentTracker(documentID){
        var myData = 'documentTracker='+documentID; //build a post data structure
        jQuery.ajax({
            type: "POST",
            url:"common/retrievedata.php",
            dataType:"text", // Data type, HTML, json etc.
            data:myData,
            beforeSend: function() {
		        $("#ajaxhistory").html("<div id='loading'><img src='../../../images/home/ajax-loader.gif' /></div>");
	        },
            ajaxError: function() {
		        $("#ajaxhistory").html("<div id='loading'><img src='../../../images/home/ajax-loader.gif' /></div>");
	        },
            success:function(response){
                        $("#ajaxhistory").html(response);
                
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    }

$(document).ready(function() {
        $("#search_document").click(function (e) {

            e.preventDefault();
            var myData = 'search_string='+ $("#search_string").val(); //build a post data structure
            jQuery.ajax({
                type: "POST",
                url:"tracker/search.php",
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

    });


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
            var searchtype = 'docTracker';
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


</script>

</body>
</html>