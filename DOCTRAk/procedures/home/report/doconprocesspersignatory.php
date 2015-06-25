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
    <link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon" />
    <script src="../../../js/jquery-1.10.2.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    
    <script language="JavaScript" type="text/javascript">


	    $(document).ready(function() {
		    $("#search_document").click(function (e) {
			    e.preventDefault();
			    var myData = 'search_string='+ $("#search_string").val(); //build a post data structure
			    jQuery.ajax({
				    type: "POST",
				    url:"onprocesspersignatory/search.php",
				    dataType:"text", // Data type, HTML, json etc.
				    data:myData,
				    success:function(response){
					    $("#historydata").html(response);

				    },
				    error:function (xhr, ajaxOptions, thrownError){
					    alert(thrownError);
				    }
			    });
		    });



		    $("#filter").click(function (e) {
			    e.preventDefault();
			    //var myData = 'datefrom='+ $("#datefrom").val(); //build a post data structure
			    //var myData2 = 'dateto='+ $("#dateto").val();
			    var datefrom=document.getElementById('datefrom').value;
			    var dateto=document.getElementById('dateto').value;
			    jQuery.ajax({
				    type: "POST",
				    url:"onprocesspersignatory/filter.php",
				    dataType:"text", // Data type, HTML, json etc.
				    data:'datefrom='+datefrom+'&dateto='+dateto,
				    success:function(response){
					    $("#historydata").html(response);


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

                <div id="post01">
                    <h2>DOCUMENT ON PROCESS PER SIGNATORY</h2>


                    	<div id="headform">
                        		
                                				<div id="headtable">
                                        		<table>
                                                	<tr>
                                                    	<td>DATE FROM:</td>
                                                        <td><input id="datefrom" class="form-control" name="datefrom" type="date" value="<?php echo date('Y-m-d'); ?>"/></td>
                                                        <td>DATE TO:</td>
                                                        <td><input id="dateto" class="form-control" name="dateto" type="date" value="<?php echo date('Y-m-d'); ?>"/></td>
                                                        <td><button id="filter" name="filter" class="btn btn-primary">Filter </button></td>
                                                    </tr>
                                                </table>
                                                </div>
                                                
                                                <form name="onprocesspersignatory" class="form-inline">
                                                    <div id="headsearch">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input id="search_string" type="text" name="search_string" class="form-control" placeholder="search..." />
                                                                <button id="search_document" class="btn btn-default">Search </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="tfclear"></div>
                                                                                        
                                
                        </div>
                        <div id="codetable">
                            <div class="scroll">
                                <table id="historydata">
                                	<tr>
                                    	<th>BARCODE</th>
                                        <th>TITLE</th>
                                        <th>OFFICE</th>
                                        <th>OWNER</th>
                                        <th>DATE</th>
                                        <th>TYPE</th>
                                    </tr>


			                        <?php
				                        require_once("../../connection.php");
				                        if ($_SESSION['GROUP']=='ADMIN' OR $_SESSION['GROUP']=='POWER ADMIN')
				                        {
					                        $query=select_info_multiple_key("select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name,fk_office_name from documentlist join security_user on documentlist.fk_security_username = security_user.security_username ORDER BY transdate desc");
				                        }
				                        else
				                        {
					                        $query=select_info_multiple_key("select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name,fk_office_name from documentlist join security_user on documentlist.fk_security_username = security_user.security_username WHERE fk_office_name ='".$_SESSION['OFFICE']."' ORDER BY transdate desc");
				                        }
                                                        
                                                        $rowcolor="notblue";


										if ($query)
										{


					                        foreach($query as $var)
					                        {
						                        if ($rowcolor=="blue")
						                        {
							                        echo "<tr class='usercolor'>";
							                        $rowcolor="notblue";
						                        }
						                        else
						                        {
							                        echo "<tr class='usercolor1'>";
							                        $rowcolor="blue";
						                        }

						                        echo "<td>".$var['document_id']."</td>";
						                        echo "<td>".$var['document_title']."</td>";
						                        echo "<td>".$var['fk_office_name']."</td>";
						                        echo "<td>".$var['security_name']."</td>";
						                        echo "<td>".$var['transdate']."</td>";
						                        echo "<td>".$var['fk_template_id']."</td>";

						                        echo "</tr>";
					                        }
										}



			                        ?>

                                </table>
                            </div>
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

</body>
</html>