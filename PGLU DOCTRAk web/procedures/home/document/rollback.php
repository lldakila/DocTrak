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
    <script src="../../../js/jquery-1.10.2.min.js"></script>
    <link href="../../../css/bootstrap.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../../../css/home.css" />
    <link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">

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
            <form name="process" method="post" action="rollback/process.php"  onsubmit="return validate();" enctype="multipart/form-data">
                    <div id="post10">
                        <h2>ROLLBACK DOCUMENT</h2>
                       
                            <div id="ajaxhistory">
                            </div>
                            <div id="officelist">
                            </div>
                        
                        
                       
                            <?php
                         
                            if($_SESSION['operation']=='save')
                            {
                                echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Rollbacked Successfully</div>";     
                            }
                            elseif ($_SESSION['operation']=='error') 
                            {
                                echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Something went wrong.</div>";     
                            }

                            $_SESSION['operation']='clear';
                            ?>
                        
                        </div>
            </form>
                        <div id="postright">
                        
                            <div id="tfheader">
                            	<form id="tfnewsearch" method="POST" class="form-inline" >
                                    <div class="form-group">
                                        <div class="input-group">
                                    <input id="search_string" type="text" name="search_string" class="form-control" placeholder="search..." />
                                    <button id="search_rollback" class="btn btn-default" >Search </button>
                                    </div>
                                    <div class="checkbox">
    
      <p style="font-size: 13px;">Include Completed Document:</p><input type="checkbox" id="searchCheck" name="searchCheck" />
      
      
  
                                    </div></div>
                                    
                                </form>	
                               
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

    <script language="JavaScript" type="text/javascript">


$(document).ready(function() {
    
    $("#search_rollback").click(function (e) {
    var searchCheckbox=document.getElementById('searchCheck').checked;
   
    e.preventDefault();

    jQuery.ajax({
            type: "POST",
            url:"rollback/search.php",
            dataType:"text", // Data type, HTML, json etc.
            data:{search_string:$("#search_string").val(),searchCheck:searchCheckbox},
            beforeSend: function() 
            {
                $("#responds").html("<div style='margin:95px 0 0 100px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
            },
            ajaxError: function() 
            {
                $("#responds").html("<div style='margin:95px 0 0 100px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
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
    
   

    function retrieveDocumentTracker(documentID)
    {
        var myData = 'documentTracker='+documentID; //build a post data structure
        jQuery.ajax({
            type: "POST",
            url:"common/retrievedata.php",
            dataType:"text", // Data type, HTML, json etc.
            data:myData,
            beforeSend: function() {
		        $("#ajaxhistory").html("<div style='margin:115px 0 0 320px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
                         $("#officelist").html("<div style='margin:115px 0 0 320px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
	        },
            ajaxError: function() {
		        $("#ajaxhistory").html("<div style='margin:115px 0 0 320px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
		        $("#officelist").html("<div style='margin:115px 0 0 320px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
	        },
            success:function(response){
                        $("#ajaxhistory").html(response);
                        createList(documentID);
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    }
    
    function createList(documentID)
    {
        var myData = 'barcodeNo='+documentID; //build a post data structure
        jQuery.ajax({
            type: "POST",
            url:"rollback/createList.php",
            dataType:"text", // Data type, HTML, json etc.
            data:myData,
            beforeSend: function() {
		        $("#officelist").html("<div style='margin:115px 0 0 320px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
	        },
            ajaxError: function() {
		        $("#officelist").html("<div style='margin:115px 0 0 320px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
	        },
            success:function(response){
                        $("#officelist").html(response);
                
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    }
    
    document.addEventListener("mousemove", function() {
        myFunction(event);
    });

    function myFunction(e) {
            $("#fade").fadeTo(3000,0.0);

}
    
    function validate()
    {
     if (confirm("Are you sure you want to rollback? This action is irreversible.") == true) 
     {  
         return true;
     }
    }
    
    </script>
    
    
    </body>
    </html>
