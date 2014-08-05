<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:index.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/jquery-1.10.2.min.js"></script>

<title>PGLU DOCTRAK</title>
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link rel="icon" href="images/home/icon/pglu.ico" type="image/x-icon">
<script language="JavaScript" type="text/javascript">
/*<![CDATA[*/
function addoffice() {

    var myForm = document.flowtemplate;
    var mySel = myForm.officeselection;
    var myOption;
    var hiddenContent;

    myOption=document.createElement("Option");
    myOption.text=document.getElementById("officelist").value;
    myOption.value=document.getElementById("officelist").value;
   // mySel.add(myOption);
    mySel.appendChild(myOption);
        if (document.flowtemplate.OfficeArray.value!="") {
            hiddenContent=document.flowtemplate.OfficeArray.value + "|";
        }
    else {
            hiddenContent="";
        }

        document.flowtemplate.OfficeArray.value=hiddenContent  +  document.getElementById("officelist").value;


   // alert (document.flowtemplate.OfficeArray.value);



}

function removeoffice(selectbox) {

    var i;
    for(i=selectbox.options.length-1;i>=0;i--)
    {
        if(selectbox.options[i].selected) {
            selectbox.remove(i);
            }
    }

}



function cleartext() {
  document.getElementById("template_name").value="";
  document.getElementById("template_description").value="";
  document.getElementById("primarykey").value="";
}

function clickSearch(template_name,description_name) {
    document.getElementById("template_name").value=template_name;
    document.getElementById("description_name").value=description_name;
    document.getElementById("primarykey").value=template_name;
    retrieveoffice(template_name);
    retrieveofficearray(template_name);
}

    function retrieveoffice(template_name){
    var myData = 'template_name='+template_name; //build a post data structure
    jQuery.ajax({
			type: "POST",
            url:"procedures/home/flowtemplate/office.php",
            dataType:"text", // Data type, HTML, json etc.
			data:myData,
			success:function(response){

				$("#officeselect").html(response);
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
			});
	}

    function retrieveofficearray(template_name) {
        var myData = 'template_name='+template_name; //build a post data structure
        jQuery.ajax({
            type: "POST",
            url:"procedures/home/flowtemplate/officehidden.php",
            dataType:"text", // Data type, HTML, json etc.
            data:myData,
            success:function(response){
               // $("#OfficeArray").html(response);
                document.getElementById('OfficeArray').value=response;
                //alert(response);
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    }





function validate() {



    if (document.getElementById('template_mode').value=='delete') {
        if (document.getElementById('primarykey').value!="") {
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



    if (document.flowtemplate.template_name.value=="")   {
        alert("Fill up necessary inputs.");
        return false;
    }

    else if (document.flowtemplate.template_description.value==""){
        alert("Fill up necessary inputs.");
        return false;
    }


    if (document.flowtemplate.officeselection.length == 0) {
        alert("Fill up necessary inputs.");
        return false;
    }






}

$(document).ready(function() {
	//##### send add record Ajax request to response.php #########

  //  $('.del_wrapper').click(function() {
   //     alert();
        //   var id = $(this).parent().get(0).id;
   //     $(this).parent().remove();
   // });

////	$("#add_office").click(function (e) {
//	//		e.preventDefault();
//	//	  // alert("gdg");
//            var myData = 'office='+ $("#Office").val(); //build a post data structure
//			jQuery.ajax({
//			type: "POST", // HTTP method POST or GET
//			url:"procedures/home/flowtemplate/process.php", //Where to make Ajax calls
//			dataType:"text", // Data type, HTML, json etc.
//			data:myData,
//			    success:function(response){
//				$("#responds01").append(response);
//
//			    },
//			error:function (xhr, ajaxOptions, thrownError){
//				alert(thrownError);
//			}
//			});
//	});

    $("#search_flowtemplate").click(function (e) {

    e.preventDefault();
    var myData = 'search_string='+ $("#search_string").val(); //build a post data structure
    jQuery.ajax({
			type: "POST",
            url:"procedures/home/flowtemplate/search.php",
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






/*]]>*/
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


            <li class="last">
                <?php
                session_start();
                echo "Hi, ".$_SESSION['security_name']."";

                ?>
            </li>
            </ul>

         <div id="tfheader">
					<form id="tfnewsearch" method="POST" >
		        	<input id="search_string" type="text" name="search_string" class="tftextinput" placeholder="search..." />
                    <button id="search_flowtemplate" class="tfbutton">Search </button>
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

            			<div id="post1">
                        <h2>FLOW TEMPLATE</h2>





                              <form name="flowtemplate" method="post" action="procedures/home/flowtemplate/process.php" onsubmit="return validate();">

    					<div class="table1">
    				<table>
                  	<tr>
                    	<td>Template:</td>

                        <td class="textinput">
                            <input id="primarykey" name="primarykey" type="hidden" />
                            <input id="template_name" name="template_name" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Description:</td>

                        <td class="textinput"><input id="description_name" name="template_description" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Office:</td>
                        <td class="select01"><select name='officelist' id='officelist'>
        <?php
        require_once("procedures/connection.php");
        session_start();
        $_SESSION['number_counter']=0;
        $query=select_info_multiple_key("select OFFICE_NAME from OFFICE ORDER BY OFFICE_NAME");
        foreach($query as $var) {
            echo "<option>".$var['OFFICE_NAME']."</option>";
        }
        ?>
                                </select>
<!--                               <button id="add_office" type="button">Add Office</button>-->
                                <input type="button" value="Add Office" onClick="javascript:addoffice();"/>
                        </td>
                    </tr>


                  </table>








                    <div class="officeselected">

                            <input type="text" name="OfficeArray" id="OfficeArray">
                            <select id="officeselect" size="10" width="15" name="officeselection" multiple>

                            </select>

                        <input type="button" id="deleteselected" value="Remove Office" onclick="removeoffice(officeselection);"/>


                    </div><div class="tfclear"></div>
                            <?php
                            session_start();
                            if($_SESSION['operation']=='save'){

                                echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Saved Successfully </div>";

                            }  elseif($_SESSION['operation']=='delete'){

                                echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Deleted Successfully </div>";
                            }
                            elseif($_SESSION['operation']=='error'){

                                echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Error querry. Save not Successful. </div>";
                            }

                            $_SESSION['operation']='clear';

                            ?>
                              <!--- BUTTONS ACTIVITY START --->


                        <div class="input">
                         <input id="template_mode" name="template_mode" type="hidden" value="0"/>
                         <input type="button" value="New" onClick="javascript:cleartext();"/>
                         <input  type="submit" value="Delete"  onClick="document.getElementById('template_mode').value='delete';"/>
                         <input type="submit" value="Save" onClick="document.getElementById('template_mode').value='save';"/>
                         </div>
                           <!--- BUTTONS ACTIVITY END--->
                           </div>

						   </form>
                        </div>
                        
                        	<div id="postright01">
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
