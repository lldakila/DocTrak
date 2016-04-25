<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../index.php');
}

    //CHECK IF USER IS POWERADMIN AND HE/SHE IS BAC EMPLOYEE
//if ($_SESSION['BAC']!=1)
//	{
//            if ($_SESSION['GROUP']!='POWER ADMIN')
//            {
//                header('Location:../../../index.php');
//            }
//             
//	}
//        else if ($_SESSION['GROUP']!='POWER ADMIN')
//        {
//            
//            if ($_SESSION['BAC']!=1)
//            {
//                header('Location:../../../index.php');
//            }
//        }

date_default_timezone_set($_SESSION['Timezone']);
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

    
    	<div class="content2">
        
                        <div id="post10">
                            <h2>NEW BAC Document</h2>

                            <form method="post">

                            <div class="table1">
                                <table>
                                    <tr>
                                        <td>BarCode No:</td>

                                        <td class="usertext">
                                            <input id="barcodenoKey"  readonly="readonly" type="hidden" class="form-control"/>
                                            <input id="barcodeno" name="barcodeno" type="text" class="form-control"/>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td>Details:</td>
                                        <td class="usertext"><input id="title" name="title" type="text" class="form-control"/> </td>
                                    </tr>
                                    <tr>
                                        <td>Cost:</td>
                                        <td class="usertext"><input id="documentamount" name="documentamount" type="text" class="form-control"/> </td>
                                    </tr>
                                    <tr>
                                        <td>Date:</td>
                                        <td class="usertext"><input id="docDate" name="template" type="text" class="form-control" value="<?php echo date('m/d/Y'); ?>" placeholder="Month/Day/Year"/> </td>
                                    </tr>                         
                                </table>
                               
                  		 
                            
                                 <!--- BUTTONS ACTIVITY START --->

                                        <div class="input1">
					    <?php
						if (($_SESSION['GROUP']=='POWER ADMIN') OR ($_SESSION['GROUP']=='POWER USER'))
						{
						    echo "<button id='bacDelete' type='button'  class='btn btn-danger' onclick='javascript:deleteMe()' >Delete</button>";
						}
						?>
					    
					    <button id="bacScrap" type="button"  class="btn btn-primary" onclick="javascript:scrapMe()" >Scrap</button>
                                            <button id="bacSave" type="button"  class="btn btn-primary"  onclick="return submitSave()">Save</button>
                                            <button type="button"  class="btn btn-primary" onclick="javascript:newMe()">New</button>
                                        </div>
                                <!--- BUTTONS ACTIVITY END--->
                            </div>
                            </form>
                           
                            <!-- activity information --->
                               <div id='fademessage' style="color:#000; text-align:center;font-family: 'Lucida Grande', 'Tahoma', 'Verdana', 'sans-serif';">
                                   
                                   
                                   
                              
                               </div>
                               <!--  activity information   --->
                               
                
                        </div>

                        <div id="postright">
                        
                            <div id="tfheader">
                                <div id="tfnewsearch">
                                <form   id="searchform" class="form-inline" >
                                    <div class="input-group form-group">
                                        <div class="input-group">
                                        <input id="search_string" type="text" name="search_string" class="form-control" placeholder="search..." />
                                        <button id="search_doc" class="btn btn-default" type="submit" >Search </button>
                                        </div>
                                    </div>
                                </form>
                                    </div>
                                
                                
                                
                                
                                 <!--AUTOSUGGEST SEARCH START-->
                                     <div id="display"></div>
                                     <!--AUTOSUGGEST SEARCH END-->
                                
                                <h2></h2>
                            </div>
                            
                            <div class="tfclear"></div>
                            
                            <div class="scroll">
                               
                                <table id="responds">
                                
                                     <tr class='usercolortest'>
					 <th class='sizeBARCODE2'>BARCODE</th>
					 <th class='sizeDETAIL'>DETAIL</th>
					 <th class='sizeCOST'>COST</th>
					 <th>DATE</th>
				     </tr>
				</table>
                            </div>
                            
                         </div>
                        <div class="tfclear"></div>
							
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

<link href="../../../css/bootstrap.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="../../../css/home.css" />
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap-select.css" />
<link rel="stylesheet" type="text/css" href="../../../css/jquery.growl.css" />
<script src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="../../../js/bootstrap-select.js"></script>
<script src="../../../js/jquery.growl.js"></script>
<script language="JavaScript" type="text/javascript">

//SEARCH FUNCTION
$('#searchform').submit(function () {
 //   submitAction();
 SearchDoc(document.getElementById('search_string').value);
 return false;
});

 
//    //CHECK IF AMOUNT INPUTED IS NUMBERIC
  $("#documentamount").on("keypress keyup blur",function (event) {
           //this.value = this.value.replace(/[^0-9\.]/g,'');
    $(this).val($(this).val().replace(/[^0-9\.]/g,''));
           if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
               event.preventDefault();
           }
       });
    
    //CHECK INPUT IF VALID
    function submitSave()
    {
        //alert (isValidDate(document.getElementById('docdate').value));
        
        if (document.getElementById('barcodeno').value == '')
        {
            //alert('Supply all necessary inputs.');
            $.growl.error({ message: 'Supply all necessary inputs.' });
            
        }
        else if (document.getElementById('documentamount').value == '')
        {
            //alert('Supply all necessary inputs.');
            $.growl.error({ message: 'Supply all necessary inputs.' });
            
        }
//        else if (!isValidDate(document.getElementById('docdate').value))
//        {
//            alert('Check date.');
//            
//        }
        else
        {
            SaveDoc('newSAVE');
        }
        return false;
    
        
    }
 
    
    function SaveDoc(module)
    {
        switch (module)
        {
            case 'newSAVE':
                var module_name=module;
                
                var key=document.getElementById('barcodenoKey').value;
                var doc_id=document.getElementById('barcodeno').value;
                var title=document.getElementById('title').value;
                var doc_amount=document.getElementById('documentamount').value;
                var doc_date=document.getElementById('docDate').value;
                if (document.getElementById('barcodenoKey').value=="")
                {
                    module_name="newSAVE";
                }
                else
                {
                    module_name="newEDIT";
                    
                }
                break;
        }
        jQuery.ajax({
            type: "POST",
            url:"search.php",
            dataType:'text',
            data:{module:module_name,pkey:key,docId:doc_id,docDesc:title,docuAmount:doc_amount,docuDate:doc_date},
             beforeSend: function()
            {
                //$.growl.warning({ message: 'Saving....' });
                $("#bacSave").html('Saving....');
            },
            success:function(response)
            {
                if (response=='Document saved.')
                {
                     $.growl.notice({ message: response });
                }
                else if (response=='Document Updated.')
                {
                     document.getElementById('barcodenoKey').value=document.getElementById('barcodeno').value;
                     $.growl.notice({ message: response });
                }
                else
                {
                    $.growl.error({ message: response });
                    //$('#fademessage').html(response);
                }
                $("#bacSave").html('Save');
            },
            error:function (xhr, ajaxOptions, thrownError){
                 $.growl.error({ message: thrownError });
                 $("#bacSave").html('Save');
               
            }
        });
        
        return false;
    }
    
      
      function SearchDoc(search_text)
      {
        var myData = 'search_string='+ $("#search_string").val(); //build a post data structure
        var module_name="SearchNew";
        jQuery.ajax({
            type: "POST",
            url:"search.php",
            dataType:"text",
            data:{module:module_name,searchText:search_text},
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
      
      }
      
      function clickSearch(docId,docDetail,docCost,docDate)
      {
          var document_id=docId;
          var document_detail=docDetail;
          var document_cost=docCost;
          var document_date=docDate;
        document.getElementById('barcodeno').value=document_id;
        document.getElementById('barcodenoKey').value=document_id;
        document.getElementById('title').value=document_detail;
        document.getElementById('documentamount').value=document_cost;
        document.getElementById('docDate').value=document_date;
          
      }

function addslashes( str ) {
    return (str + '').replace(/[\\"']/g, '\\$&').replace(/\u0000/g, '\\0');
}
//CHECK IF DATE ENTERED IS VALID
//function isValidDate(dateString)
//{
//    // First check for the pattern
//    if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
//        return false;
//
//    // Parse the date parts to integers
//    var parts = dateString.split("/");
//    var day = parseInt(parts[1], 10);
//    var month = parseInt(parts[0], 10);
//    var year = parseInt(parts[2], 10);
//
//    // Check the ranges of month and year
//    if(year < 1000 || year > 3000 || month == 0 || month > 12)
//        return false;
//
//    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];
//
//    // Adjust for leap years
//    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
//        monthLength[1] = 29;
//
//    // Check the range of the day
//    return day > 0 && day <= monthLength[month - 1];
//};

function newMe()
{
    document.getElementById('barcodeno').value="";
    document.getElementById('barcodenoKey').value="";
    document.getElementById('title').value="";
    document.getElementById('documentamount').value="";
    document.getElementById('docDate').value="";
}

//DELETE DOCUMENT RECORD
function deleteMe()
{
    if (document.getElementById('barcodenoKey').value=="")
    {
        return;
    }
    if (confirm("Are you sure you want to delete document?") == false) 
    {
        return;
    }
  
  var module_name="newDELETE";
  var doc_id=document.getElementById('barcodenoKey').value
   jQuery.ajax({
            type: "POST",
            url:"search.php",
            dataType:'text',
            data:{module:module_name,docId:doc_id},
             beforeSend: function()
            {
                 $("#bacDelete").html('Deleting....');
            },
            success:function(response)
            {
							if (response=='Document deleted.')
					                {
					                     $.growl.notice({ message: response });
							     newMe();
                }
                else
                {
                    $.growl.error({ message: response });
                }
                 
                 $("#bacDelete").html('Delete');
            },
            error:function (xhr, ajaxOptions, thrownError){
                 $.growl.error({ message: thrownError });
                $("#bacDelete").html('Delete');
            }
        });
   
}

////////////////////////////////////
//SCRAP DOCUMENT RECORD
////////////////////////////////////
function scrapMe()
{
    
}
 
 //ENTER TRIGGERS
 
 document.getElementById('barcodeno').onkeydown = function(event) {
    if (event.keyCode == 13) {
        submitSave();
    }
}
 document.getElementById('title').onkeydown = function(event) {
    if (event.keyCode == 13) {
        submitSave();
    }
}
document.getElementById('documentamount').onkeydown = function(event) {
    if (event.keyCode == 13) {
        submitSave();
    }
}
document.getElementById('docDate').onkeydown = function(event) {
    if (event.keyCode == 13) {
        submitSave();
    }
}

 
 
</script>
</body>
</html>
