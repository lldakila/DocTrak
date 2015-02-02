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
    <link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">
    <script src="../../../js/jquery-1.10.2.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>



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
                        <h2>Messages</h2>
                        
                             <form name="process" method="post" action="messages/process.php" onsubmit="return validate();">

                                <div class="table1">
    				<table border="0">
                                    <tr>
                                    <td>Message:</td>

                        <td class="textinput1">
                            <input id="id" name="primarykey" type="hidden" />
                            <input id="message" name="message" type="text" class="form-control" /> </td>
                    </tr>
                    <tr>
                    	<td>Module:</td>
                        <td class="textinput1">
                            <select >
                            <input id="module" name="description" type="text" class="form-control" /> </td>
                    </tr>



                  </table>

                    <?php
           
           if($_SESSION['operation']=='save'){

                echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Saved Successfully </div>";

            }  elseif($_SESSION['operation']=='delete'){

                     echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Deleted Successfully </div>";
                }
           elseif($_SESSION['operation']=='update'){

               echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Updated Successfully </div>";
           }

               $_SESSION['operation']='clear';






?>

                  		 <!--- BUTTONS ACTIVITY START --->

                        <div class="input1">
                         <input id="group_mode" name="group_mode" type="hidden" value="0"/>
                         <input type="button" value="New" onClick="javascript:cleartext();" class="btn btn-primary" />
                         <input  type="submit" value="Delete"  onClick="document.getElementById('group_mode').value='delete';" class="btn btn-primary" />
                         <input type="submit" value="Save" onClick="document.getElementById('group_mode').value='save';" class="btn btn-primary" />
                         </div>
                           <!--- BUTTONS ACTIVITY END--->

                  </div>

						   </form>
    
							
                        </div>
                        
                        
                        
                           <div id="postright">
                           
                           	<div id="tfheader">
                            	<form id="tfnewsearch" method="POST" class="form-inline">
                                    <div class="form-group">
                                        <div class="input-group">
                                                <input id="search_string" type="text" name="search_string" class="form-control" placeholder="search..." />
                                                <button id="search_group" class="btn btn-default">Search </button>
                                        </div>
                                    </div>
								</form>	
                                <h2></h2>
                            </div>
                            <div class="tfclear"></div>
                            
                            <div class="scroll">
                        	                                    
                                <table id="responds">
                                	<tr class='usercolortest'>
                                	<th>Group</th>
                                    <th>Description</th>
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
/*<![CDATA[*/



function cleartext() {
  document.getElementById("group").value="";
  document.getElementById("description").value="";
    document.getElementById("primarykey").value="";
}
function clickSearch(group,description) {
document.getElementById("group").value=group;
  document.getElementById("description").value=description;
    document.getElementById("primarykey").value=group;
}



$(document).ready(function() {
    $("#search_group").click(function (e) {
        
    e.preventDefault();
    var myData = 'search_string='+ $("#search_string").val(); //build a post data structure
    jQuery.ajax({
            type: "POST",
            url:"group/search.php",
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

function validate() {


    if (document.getElementById("group_mode").value == "delete") {
        if (document.getElementById("primarykey").value != "") {
        if (confirm("Are you sure you want to delete?") == true) {
            return true;
        }
        else {

            return false;
        }
    }
        alert("Nothing to delete.");
        return false;
    }

    if (document.process.group.value == "") {
        alert("Fill up necessary inputs.");
        return false;
    }
    else if (document.process.description.value =="") {
        alert("Fill up necessary inputs.");
        return false
    }
    else {
        return true;
    }




};


document.addEventListener("mousemove", function() {
    myFunction(event);
});

function myFunction(e) {
	$("#fade").fadeTo(3000,0.0);

}
    /*]]>*/
</script>
</body>
</html>