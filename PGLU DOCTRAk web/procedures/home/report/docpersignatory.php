<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
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
        session_start();
        echo $_SESSION['Title']. "" .$_SESSION['Version'];
        ?>
    </title>
    <script src="../../../js/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../../css/home.css" />
<link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">
    <script language="JavaScript" type="text/javascript">


	    $(document).ready(function() {
		    $("#search_document").click(function (e) {
			    e.preventDefault();
			    var myData = 'search_string='+ $("#search_string").val(); //build a post data structure
			    jQuery.ajax({
				    type: "POST",
				    url:"persignatory/search.php",
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
				    url:"persignatory/filter.php",
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
<div class="header">

    <div class="header1">

        <div class="headerline">

            <div class="headerbanner">

                <img src="../../../images/home/doctraklogo2.png" width="125" height="120" alt="PGLU" title="PGLU" align="left" /><h2>
                    <?php
                    session_start();
                    echo $_SESSION['Title']. "<span style='font-size:12px;'>&nbsp;" .$_SESSION['Version'];
                    echo "</span>";
                    ?>

                </h2><p>Management Information System</p>

            </div>

            <div id="menu">




                <ul class="menu">
        <li><a href="../../../home.php" class="parent"><span>HOME</span></a></li>
        <li><a href="#" class="parent"><span>DOCUMENT</span></a>
        	<ul>
                <li><a href="../document/newdoc.php"><span>NEW DOCUMENT</span></a></li>
                            <li><a href="../document/receiveddoc.php"><span>RECEIVED DOCUMENT</span></a></li>
                            <li><a href="../document/releasedoc.php"><span>RELEASE DOCUMENT</span></a></li>
                            <li><a href="../document/forreleasedoc.php"><span>FOR RELEASE</span></a></li>
                            <li><a href="../document/documenttracker.php"><span>DOCUMENT TRACKER</span></a></li>
                            <li><a href="../document/documentprocessing.php"><span>PROCESSING</span></a></li>
            </ul>
        </li>
        <li><a href="#"><span>REPORT</span></a>
        	<ul style="width:265px;">
                <li><a href="dochistory.php"><span>DOCUMENT HISTORY</span></a></li>
				<li><a href="doconprocess.php"><span>DOCUMENT ON PROCESS</span></a></li>
                <li><a href="doconprocesspersignatory.php"><span>DOCUMENT ON PROCESS PER SIGNATORY</span></a></li>
                <li><a href="docpersignatory.php"><span>DOCUMENTS PER SIGNATORY</span></a></li>
            </ul>
        </li>
	            <?php
		            if($_SESSION['GROUP']=='POWER ADMIN')
		            {

			            echo '<li><a href="#"><span>MAINTENANCE</span></a>
                <ul>
                        <li><a href="../maintenance/documenttype.php"><span>DOCUMENT TYPE</span></a></li>
                        <li><a href="../maintenance/office.php"><span>OFFICES</span></a></li>
                        <li><a href="../maintenance/flowtemplate.php"><span>FLOW TEMPLATE</span></a></li>
                        <li><a href="#" class="parent"><span>SECURITY</span></a>
                            <ul>
                                <li><a href="../maintenance/users.php"><span>USERS</span></a></li>
                                <li><a href="../maintenance/group.php"><span>GROUP</span></a></li>
                            </ul>
                        </li>
                </ul>
                </li>';
		            }
	            ?>

	            <li><a href="../userinfo/userinfo.php"><span>USER INFO</span></a></li>
        <li><a href="../../../about.php"><span>ABOUT</span></a></li>
        <li><a href="../logout.php"><span>LOGOUT</span></a></li>

        </ul>


                <div class="admin">
                    <?php
                    session_start();
                    echo "Hi, ".$_SESSION['security_name']." of ".$_SESSION['OFFICE']."";


                    ?>
                </div>


            </div>

        </div>

    </div>

</div>


<div class="content">

    <div class="content1">

        <div class="content2">

            <div id="post">

                <div id="post01">
                    <h2>DOCUMENTS PER SIGNATORY</h2>


                    	<div id="headform">
                        		
                                				<div id="headtable">
                                        		<table>
                                                	<tr>
                                                    	<td>DATE FROM:</td>
                                                        <td><input id="datefrom" name="datefrom" type="date" value="<?php echo date('Y-m-d'); ?>"/></td>
                                                        <td>DATE TO:</td>
                                                        <td><input id="dateto" name="dateto" type="date" value="<?php echo date('Y-m-d'); ?>"/></td>
                                                        <td><button id="filter" name="filter" >Filter </button>
                                                    </tr>
                                                </table>
                                                </div>
                                                
                                                <form name="persignatory">
                                                <div id="headsearch">
		        								<input id="search_string" type="text" name="search_string" class="tftextinput" placeholder="search..." />
                    							<button id="search_document" class="tfbutton">Search </button>
												</div>
                                                </form>
                                                <div class="tfclear"></div>
                                        
                               
                        </div>
                        <div id="codetable">
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
                session_start();
                echo $_SESSION['Copyright']. "&nbsp;<img src=../../../images/home/icon/copyleft-icon.png width='14' height='14' />&nbsp;" .$_SESSION['Year']. "&nbsp;" .$_SESSION['Developer'];
                echo "&nbsp|";
                ?>

                <a href="#">Contact Us</a> | Designed by: <a href="#">MIS</a> | <a href="#">Scroll Top</a></p>
        </div>

    </div>

</div>

</body>
</html>