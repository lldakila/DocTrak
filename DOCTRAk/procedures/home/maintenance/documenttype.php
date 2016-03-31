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
<script src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


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
                        <h2>DOCUMENT TYPE</h2>


                         <form name="documenttype" method="post" action="type/process.php"  onsubmit="return validate();">

    					<div class="table1">
    				<table border="0">
                  	<tr>
                    	<td>Document Name:</td>
                        <td class="textinput">
                                                <input id="primarykey" name="primarykey" type="hidden" />
                                                <input id="document_name" name="document_name" type="text" class="form-control" /> </td>
                    </tr>
                    <tr>
                    	<td>Description:</td>
                        <td class="textinput"><input id="description" name="description" type="text" class="form-control" /> </td>
                    </tr>
                    <tr>
                    	<td>Priority: </td>
                         <td class="select01">
                             <select id="priority" name="priority" class="form-control">
                              <option>High</option>
                              <option>Medium</option>
                              <option>Low</option>
                              </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Public:</td>
                        <td><input id="publicyes" name="publicradio" type="radio" value="Yes"/>Yes &nbsp;
                        <input id="publicno" name="publicradio" type="radio" value="No" checked="checked"/>No
                        </td>
                        
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
                                <input id="type_mode" name="type_mode" type="hidden" />
                                <input  type="submit" value="Delete" onclick="document.getElementById('type_mode').value='delete';" class="btn btn-danger" />
                                
                                <input type="submit" value="Save" onclick="document.getElementById('type_mode').value='save';" class="btn btn-primary" />
                                <input type="button" value="New" onclick="javascript:cleartext();" class="btn btn-primary" />
                                
                            </div>
                           <!--- BUTTONS ACTIVITY END--->

                  </div>

						   </form>
                        </div>
                        
                        <div id="postright">
                        
                        		<div id="tfheader">
                                
                                <form id="tfnewsearch" method="post" class="form-inline">
                                    <div class="form-group">
                                        <div class="input-group">
		        				<input id="search_string" type="text" name="search_string" class="form-control" placeholder="search..." />
                                                        <button id="search_type" class="btn btn-default">Search </button>
                                        </div>
                                    </div>
								</form>	
               					<h2></h2>
                                </div>
                                <div class="tfclear"></div>
                                
                            <div class="scroll">
                                
                                    
                                <table id="responds">
				    <tr class='usercolortest'>
					<th class="sizeDOCNAME">DOCUMENT NAME</th>
					<th class="sizeDESCR">DESCRIPTION</th>
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

    <script language="JavaScript" type="text/javascript">
/*<![CDATA[*/

/*]]>*/

function cleartext() {
  document.getElementById("document_name").value="";
  document.getElementById("description").value="";
    document.getElementById("primarykey").value="";
    if(docpublic==1){
         document.getElementById("publicyes").checked=true;
         document.getElementById("publicno").checked=false;
   }
   else{
        document.getElementById("publicyes").checked=false;
         document.getElementById("publicno").checked=true;
   }
}

function validate() {



    if (document.getElementById('type_mode').value=='delete') {
          if (document.getElementById("primarykey").value != "") {
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

    if (document.documenttype.document_name.value=="")   {
        alert("Fill up necessary inputs.");
        return false;
    }
    else if (document.documenttype.description.value=="") {

            alert("Fill up necessary inputs.");
            return false;
        }

    else if (document.documenttype.name.value==""){
        alert("Fill up necessary inputs.");
        return false;
    }

    else if (document.documenttype.priority.value==""){
      alert("Fill up necessary inputs.");
        return false;
    }

if (document.getElementById('publicyes').checked) {
            return true;
           }
else if (document.getElementById('publicno').checked) {
  return true;

  }
else {
     alert("Fill up necessary inputs.");
               return false;
}







}

function clickSearch(id,description,priority,docpublic) {

  document.getElementById("document_name").value=id;
  document.getElementById("description").value=description;
  document.getElementById("priority").value=priority;
  document.getElementById("primarykey").value=id;
   if(docpublic==1){
         document.getElementById("publicyes").checked=true;
         document.getElementById("publicno").checked=false;
   }
   else{
        document.getElementById("publicyes").checked=false;
         document.getElementById("publicno").checked=true;
   }

   // alert(docpublic  );

}


$(document).ready(function() {

    $("#search_type").click(function (e) {

    e.preventDefault();
    var myData = 'search_string='+ $("#search_string").val(); //build a post data structure
    jQuery.ajax({
            type: "POST",
            url:"type/search.php",
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
