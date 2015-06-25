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
              echo '<li><a href="javascript:bacDocument()">BAC<i><img src="../../../images/home/icon/forpickup.gif" width="25px" height="25px" /></i></a></li>';
                }
              ?>

          </ul>
      </nav>
</div>

	<div class="content1">
    
    	<div class="content2">
        
        	<div id="post">
            
            
            			<div id="post10">
                        <h2>OFFICES</h2>


                         <form name="process" method="post" action="office/process.php" onsubmit="return validate();">

    					<div class="table1">
    				<table border="0">
                  	<tr>
                    	<td>Office Name:</td>

                        <td class="textinput">
                        <input id="primarykey" name="primarykey" type="hidden" />
                        <input id="office_name" name="office_name" type="text" class="form-control" /> </td>
                    </tr>
                    <tr>
                    	<td>Description:</td>
                        <td class="textinput"><input id="office_description" name="office_description" type="text" class="form-control" /> </td>
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

                        <div class="input">
                         <input id="office_mode" name="office_mode" type="hidden" value="0"/>
                         <input  type="submit" value="Delete"  onClick="document.getElementById('office_mode').value='delete';" class="btn btn-danger" />
                         <input type="submit" value="Save" onClick="document.getElementById('office_mode').value='save';" class="btn btn-primary" />
                         <input type="button" value="New" onClick="javascript:cleartext();" class="btn btn-primary" />
                         </div>
                           <!--- BUTTONS ACTIVITY END--->

                  </div>

						   </form>
                        </div>
                        
                        <div id="postright">
                        
                        		<div id="tfheader">
                                
                                <form id="tfnewsearch" method="post"class="form-inline">
                                    <div class="form-group">
                                        <div class="input-group">
                    				<input id="search_string" type="text" name="search_string" class="form-control" placeholder="search..." />
                                                <button id="search_office" class="btn btn-default">Search </button>
                                        </div>
                                    </div>
                				</form>
               					<h2></h2>
                                </div>
                                
                                <div class="tfclear"></div>
                                
                            <div class="scroll">
                                
								                                   
                                <table id="responds">
                                	<tr class='usercolortest'>
                                	<th>Office</th>
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


function cleartext() {
  document.getElementById("office_name").value="";
  document.getElementById("office_description").value="";
    document.getElementById("primarykey").value="";
}
function clickSearch(officename,officedescription) {
document.getElementById("office_name").value=officename;
  document.getElementById("office_description").value=officedescription;
    document.getElementById("primarykey").value=officename;
}
function validate() {


    if (document.getElementById("office_mode").value == "delete") {
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

    if (document.process.office_name.value == "") {
        alert("Fill up necessary inputs.");
        return false;
    }
    else if (document.process.office_description.value =="") {
        alert("Fill up necessary inputs.");
        return false
    }
    else {
        return true;
    }




};

$(document).ready(function() {
    $("#search_office").click(function (e) {

        e.preventDefault();
        var myData = 'search_string='+ $("#search_string").val(); //build a post data structure
        jQuery.ajax({
            type: "POST",
            url:"office/search.php",
            dataType:"text", // Data type, HTML, json etc.
            data:myData,
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

});

document.addEventListener("mousemove", function() {
    myFunction(event);
});

function myFunction(e) {
	$("#fade").fadeTo(3000,0.0);

}


</script>
    
</body>
</html>
