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
        <nav class="social">
            <ul>
                <li><a href="javascript:newDocument()">New<i><img src="../../../images/home/icon/newdoc1.gif" width="25px" height="25px" /></i></a></li>
                <li><a href="javascript:receiveDocument()">Receive<i><img src="../../../images/home/icon/receivedoc1.gif" width="25px" height="25px" /></i></a></li>
                <li><a href="javascript:releaseDocument()">Release<i><img src="../../../images/home/icon/releasedoc.gif" width="25px" height="25px" /></i></a></li>
                <li><a href="javascript:forpickupDocument()">For Pickup<i><img src="../../../images/home/icon/forpickup.gif" width="25px" height="25px" /></i></a></li>
                <?php
                if ($_SESSION['BAC']==1 OR $_SESSION['GROUP']=='POWER ADMIN')
                {
                    echo '<li class="quickNavMargin"><a href="javascript:bacDocument()">BAC<i><img src="../../../images/home/icon/forpickup.gif" width="25px" height="25px" /></i></a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
    
    <div class="content1">
    	<div class="content2">
            <div id="post">
                <div id="post10">
                    <h2>Monitor</h2>
                    <div id="BacHistory">
                        <!--AJAX DATA INSERTED HERE-->
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
                    <div class="tfclear">

                    </div>

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
                <div class="tfclear">
                <!-- USED FOR FLOATING -->
                </div>
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
			
            <a href="#">Contact Us</a> | Designed by: <a href="#">MIS</a> | <a href="#">Scroll Top</a>
            </p>
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

$(document).ready(function() 
{
    $("#search_document").click(function (e) {
    e.preventDefault();
    var search_Text=document.getElementById('search_string').value;
    var module_name = 'Search';
    jQuery.ajax({
            type: "POST",
            url:"search.php",
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
            url:"search.php",
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

</script>
</body>
</html>