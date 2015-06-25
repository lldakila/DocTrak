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
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap-select.css" />
    <link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">
    <script src="../../../js/jquery-1.10.2.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/bootstrap-select.js"></script>




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
              <li><a href="javascript:newDocument()">New Document<i><img src="../../../images/home/icon/newdoc1.gif" width="25px" height="25px" /></i></a></li>
              <li><a href="javascript:receiveDocument()">Receive Document<i><img src="../../../images/home/icon/receivedoc1.gif" width="25px" height="25px" /></i></a></li>
              <li><a href="javascript:releaseDocument()">Release Document<i><img src="../../../images/home/icon/releasedoc.gif" width="25px" height="25px" /></i></a></li>
              <li><a href="javascript:forpickupDocument()">For Pickup<i><img src="../../../images/home/icon/forpickup.gif" width="25px" height="25px" /></i></a></li>
              <li><a href="javascript:bacDocument()">BAC<i><img src="../../../images/home/icon/forpickup.gif" width="25px" height="25px" /></i></a></li>

          </ul>
      </nav>
</div>

	<div class="content1">
    
    	<div class="content2">
        
        	<div id="post">

            			<div id="post10">
                        <h2>FLOW TEMPLATE</h2>





                              <form name="flowtemplate" method="post" action="flowtemplate/process.php" onsubmit="return validate();">

    					<div class="table1">
    				<table>
                  	<tr>
                    	<td>Template:</td>

                        <td class="textinput">
                            <input id="primarykey" name="primarykey" type="hidden" />
                            <input id="template_name" name="template_name" type="text" class="form-control" /> </td>
                    </tr>
                    <tr>
                    	<td>Description:</td>

                        <td class="textinput"><input id="description_name" name="template_description" type="text" class="form-control" /> </td>
                    </tr>
                    <tr>
                    	<td>Office:</td>
                        <td class="select1"><select name='officelist' id='officelist' class="form-control selectpicker">
        <?php
        //require_once("../../connection.php");

        $_SESSION['number_counter']=0;
        //$query=select_info_multiple_key("select office_name from office ORDER BY OFFICE_NAME");
        $query="select office_name, office_description from office ORDER BY OFFICE_NAME";
	$result=mysqli_query($con,$query)or die(mysqli_error($con));
        foreach($result as $var) {
            echo "<option data-subtext='".$var['office_description']."'>".$var['office_name']."</option>";
        }
        ?>
                                </select>
<!--                               <button id="add_office" type="button">Add Office</button>-->
                                <input type="button" value="Add Office" onClick="javascript:addoffice();" class="btn btn-primary" />
                        </td>
                    </tr>


                  </table>








                    <div class="officeselected">

                            <input type="hidden" name="OfficeArray" id="OfficeArray">
                            <select id="officeselect" size="10" width="15" name="officeselection" >

                            </select>

                        <input type="button" id="deleteselected" value="Remove Office" onclick="removeoffice(officeselection);" class="btn btn-primary" />


                    </div><div class="tfclear"></div>
                            <?php
                            
                            if($_SESSION['operation']=='save'){

                                echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Saved Successfully </div>";

                            }  elseif($_SESSION['operation']=='delete'){

                                echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Deleted Successfully </div>";
                            }
                            elseif($_SESSION['operation']=='error'){

                                echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Something went wrong. Operation not Successful. </div>";
                            }
                            elseif($_SESSION['operation']=='update'){

                                echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Update Successful. </div>";
                            }

                            $_SESSION['operation']='clear';

                            ?>
                              <!--- BUTTONS ACTIVITY START --->


                        <div class="input">
                         <input id="template_mode" name="template_mode" type="hidden" value="0"/>
                         <input  type="submit" value="Delete"  onClick="document.getElementById('template_mode').value='delete';" class="btn btn-danger" />
                         
                         
                         <input type="submit" value="Save" onClick="document.getElementById('template_mode').value='save';" class="btn btn-primary" />
                         <input type="button" value="New" onClick="javascript:cleartext();" class="btn btn-primary" />
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
                                                    <button id="search_flowtemplate" class="btn btn-default">Search </button>
                                                </div>
                                            </div>
                                        </form>	
                                        <h2></h2>	
                                    </div>
                                    <div class="tfclear"></div>
                                    
                            <div class="scroll">
                        	
                                    
                                <table id="responds">
                                    <tr class='usercolortest'>
                                	<th>Template</th>
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
    var x;
    var officeArray = [];

    var hiddenContent;
    var hold1;

    officeArray=document.flowtemplate.OfficeArray.value.split("|");
    //document.flowtemplate.OfficeArray.value="";
   // alert (selectbox.options.length);
    for(i=selectbox.options.length-1;i>=0;i--)
    {
        if(selectbox.options[i].selected) {
            selectbox.remove(i);
            officeArray.splice(i,1);
            }



    }
//    document.flowtemplate.OfficeArray.value="";
//    for(x=officeArray.length-1;x>0;x--) {
//        hold1=officeArray[x];
//        if (document.flowtemplate.OfficeArray.value!="") {
//            hiddenContent=document.flowtemplate.OfficeArray.value + "|";
//        }
//        else {
//            hiddenContent="";
//        }
//        document.flowtemplate.OfficeArray.value = hiddenContent  +  hold1;
//    }

}

function officelist() {
    var z;
    var hiddenContent;

    document.flowtemplate.OfficeArray.value="";

    for(z=document.flowtemplate.officeselection.options.length-1;z>=0;z--)
    {
        //alert (document.flowtemplate.officeselection.options[z].value);

        if (document.flowtemplate.OfficeArray.value!="") {
            hiddenContent=document.flowtemplate.OfficeArray.value + "|";
        }
        else {
            hiddenContent="";
        }

        document.flowtemplate.OfficeArray.value=hiddenContent  +  document.flowtemplate.officeselection.options[z].value;


    }


}



function cleartext() {
  document.getElementById("template_name").value="";
  document.getElementById("description_name").value="";
  document.getElementById("primarykey").value="";
  document.getElementById("officeselect").innerHTML="";

}

function clickSearch(template_id,template_name,description_name) {
    document.getElementById("template_name").value=template_name;
    document.getElementById("description_name").value=description_name;
    document.getElementById("primarykey").value=template_id;
    retrieveoffice(template_id);
    retrieveofficearray(template_id);
}

        function retrieveoffice(template_id){
    var myData = 'template_name='+template_id; //build a post data structure
    jQuery.ajax({
			type: "POST",
            url:"flowtemplate/office.php",
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

    function retrieveofficearray(template_id) {
        var myData = 'template_name='+template_id; //build a post data structure
        jQuery.ajax({
            type: "POST",
            url:"flowtemplate/officehidden.php",
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



    if (document.getElementById('template_mode').value=='delete') 
    {
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

//    else if (document.flowtemplate.template_description.value=="")
//    {
//        alert("Fill up necessary inputs.");
//        return false;
//    }


    if (document.flowtemplate.officeselection.length == 0) {
        alert("Fill up necessary inputs.");
        return false;
    }




    officelist();
    //alert (document.flowtemplate.OfficeArray.value);
    //return true;

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
            url:"flowtemplate/search.php",
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





/*]]>*/
</script>
</body>
</html>
