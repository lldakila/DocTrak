<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:index.php');
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/jquery-1.10.2.min.js"></script>
<title>PGLU DOCTRAK</title>
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link rel="icon" href="images/home/icon/pglu.ico" type="image/x-icon">

<script language="JavaScript" type="text/javascript">

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
            url:"procedures/home/type/search.php",
            dataType:"text", // Data type, HTML, json etc.
			data:myData,
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
<div class="header">

	<div class="header1">
    
    	<div class="headerline">
    
    	<div class="headerbanner">
        
        		<img src="images/home/doctraklogo2.png" width="125" height="120" alt="PGLU" title="PGLU" align="left" /><h2>PGLU DOCTRAK</h2><p>Management Information System</p>
        
        </div>

        <div id="menu">
        	


            
            <ul class="menu">
        <li><a href="index.php" class="parent"><span>HOME</span></a></li>
        <li><a href="#" class="parent"><span>DOCUMENT</span></a>
        	<ul>
                <li><a href="newdoc.php"><span>NEW DOCUMENT</span></a></li>
                <li><a href="receiveddoc.php"><span>RECEIVED DOCUMENT</span></a></li>
                <li><a href="releasedoc.php"><span>RELEASE DOCUMENT</span></a></li>
            </ul>
        </li>
        <li><a href="#"><span>REPORT</span></a>
        	<ul>
                <li><a href="dochistory.php"><span>DOCUMENT HISTORY</span></a></li>

            </ul>
        </li>
        <li><a href="#"><span>MAINTENANCE</span></a>
        <ul>
                <li><a href="documenttype.php"><span>DOCUMENT TYPE</span></a></li>
                <li><a href="office.php"><span>OFFICES</span></a></li>
                <li><a href="flowtemplate.php"><span>FLOW TEMPLATE</span></a></li>
                <li><a href="#" class="parent"><span>SECURITY</span></a>
                    <ul>
                        <li><a href="users.php"><span>USERS</span></a></li>
                        <li><a href="group.php"><span>GROUP</span></a></li>
                    </ul>
                </li>
        </ul>
        </li>
        <li><a href="about.php"><span>ABOUT</span></a></li>
        <li><a href="procedures/home/logout.php"><span>LOGOUT</span></a></li>

        <li class="last"><?php
          session_start();
          echo "Hi, ".$_SESSION['security_name']."";

        ?>  </li>

    </ul>

         <div id="tfheader">
                    <form id="tfnewsearch" method="POST">
		        	<input id="search_string" type="text" name="search_string" class="tftextinput" placeholder="search..." />

                    <button id="search_type" class="tfbutton">Search </button>
					</form>
				<div class="tfclear"></div>
				</div>   

            
        </div>

        </div>
    
    </div>

</div>

<div class="content">

	<div class="content1">
    
    	<div class="content2">
        
        	<div id="post">
            
            			<div id="post10">
                        <h2>DOCUMENT TYPE</h2>
                               <form name="documenttype" method="POST" action="procedures/home/type/process.php"  onsubmit="return validate();">

    					<div class="table1">
    				<table border="0">
                  	<tr>
                    	<td>Document Name:</td>
                        <td class="textinput">
                                                <input id="primarykey" name="primarykey" type="hidden" />
                                                <input id="document_name" name="document_name" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Description:</td>
                        <td class="textinput"><input id="description" name="description" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Priority: </td>
                         <td class="select01">
                             <select id="priority" name="priority">
                              <option>High</option>
                              <option>Medium</option>
                              <option>Low</option>
                              </select>
                              Public:
                        <input id="publicyes" name="publicradio" type="radio" value="Yes"/>Yes &nbsp;
                        <input id="publicno" name="publicradio" type="radio" value="No"/>No
                               </td>

                    </tr>



                  </table>

                    <?php
            session_start();
           if($_SESSION['operation']=='save'){

                echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Saved Successfully </div>";

            }  elseif($_SESSION['operation']=='delete'){

                     echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Deleted Successfully </div>";
                }
                 elseif($_SESSION['operation']=='update'){

                     echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Updated Successfully </div>";
                }

               $_SESSION['operation']='clear';


?>

                  		 <!--- BUTTONS ACTIVITY START --->



                            <div class="input">
                                <input id="type_mode" name="type_mode" type="hidden" />
                                <input type="button" value="New" onClick="javascript:cleartext();"/>
                                <input  type="submit" value="Delete" onclick="document.getElementById('type_mode').value='delete';" />
                                <input type="submit" value="Save" onclick="document.getElementById('type_mode').value='save';"/>
                            </div>


                           <!--- BUTTONS ACTIVITY END--->

                  </div>

						   </form>

							
                        </div>

                        <div id="postright">
                            <div class="scroll">
                                <table id="responds">


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
                	<p>Copyright &copy; 2014-2015 TJ and Jerome | <a href="#">Contact Us</a> | Designed by: <a href="#">MIS</a> | <a href="#">Scroll Top</a></p>
                </div>
    
    </div>
	
</div>

</body>
</html>
