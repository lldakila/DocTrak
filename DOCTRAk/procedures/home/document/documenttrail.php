    <?php
    if (session_status() == PHP_SESSION_NONE) 
    {
        session_start();
    }
    if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd']))
    {
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
<link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">
<script src="../../../js/jquery-1.10.2.min.js"></script>
<script src="../../../js/bootstrap.min.js"></script>

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
                        <h2>DOCUMENT TRAIL</h2>
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
                                    <button id="search_trail" class="btn btn-default" >Search </button>
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
                                    <th>Barcode</th>
                                    <th>Title</th>
                                    <th>Owner</th>
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

    <script language="JavaScript" type="text/javascript">


$(document).ready(function() {
    
    $("#search_trail").click(function (e) {
    e.preventDefault();

    jQuery.ajax({
            type: "POST",
            url:"trail/search.php",
            dataType:"text", // Data type, HTML, json etc.
            data:{search_string:$("#search_string").val()},
            beforeSend: function() 
            {
                $("#responds").html("<div id='loading' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
            },
            ajaxError: function() 
            {
                $("#responds").html("<div id='loading' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
            },
            success:function(response)
            {
                $("#responds").html(response);
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
            });
	});

    });
    
   

    function retrieveDocument(documentID)
    {
        var myData = 'documentTrail='+documentID; //build a post data structure
        jQuery.ajax({
            type: "POST",
            url:"trail/retrieve.php",
            dataType:"text", // Data type, HTML, json etc.
            data:myData,
            beforeSend: function() 
                {
		        $("#ajaxhistory").html("<div id='loading'><img src='../../../images/home/ajax-loader.gif' /></div>");
                         
	        },
            ajaxError: function() 
                {
		        $("#ajaxhistory").html("<div id='loading'><img src='../../../images/home/ajax-loader.gif' /></div>");
		        
	        },
            success:function(response)
                {
                        $("#ajaxhistory").html(response);
                        
                },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
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
            var searchtype = 'docTrail';
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
