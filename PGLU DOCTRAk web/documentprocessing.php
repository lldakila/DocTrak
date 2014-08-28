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
    <title>
        <?php
        session_start();
        echo $_SESSION['Title']. "" .$_SESSION['Version'];
        ?>
    </title>
    <script src="js/jquery-1.10.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/home.css" />
    <link rel="icon" href="images/home/icon/pglu.ico" type="image/x-icon">
    <script language="JavaScript" type="text/javascript">


        function clickRetrieve(document_barcode) {

            retrieveDocumentTracker(document_barcode);

        }

        function retrieveDocumentTracker(documentID){
            var myData = 'documentTracker='+documentID; //build a post data structure
            jQuery.ajax({
                type: "POST",
                url:"procedures/home/document/processing/retrievedata.php",
                dataType:"text", // Data type, HTML, json etc.
                data:myData,
                success:function(response){

                    $("#ajaxhistory").html(response);
                },
                error:function (xhr, ajaxOptions, thrownError){
                    alert(thrownError);
                }
            });
        }

        $(document).ready(function() {
            $("#search_document").click(function (e) {

                e.preventDefault();
                var myData = 'search_string='+ $("#search_string").val(); //build a post data structure
                jQuery.ajax({
                    type: "POST",
                    url:"procedures/home/document/processing/search.php",
                    dataType:"text", // Data type, HTML, json etc.
                    data:myData,
                    success:function(response){
                        $("#responds").html(response);
                      //  alert (response);

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

                <img src="images/home/doctraklogo2.png" width="125" height="120" alt="PGLU" title="PGLU" align="left" /><h2>
                    <?php
                    session_start();
                    echo $_SESSION['Title']. "<span style='font-size:12px;'>&nbsp;" .$_SESSION['Version'];
                    echo "</span>";
                    ?>

                </h2><p>Management Information System</p>

            </div>

            <div id="menu">




                <ul class="menu">
                    <li><a href="index.php" class="parent"><span>HOME</span></a></li>
                    <li><a href="#" class="parent"><span>DOCUMENT</span></a>
                        <ul>
                            <li><a href="newdoc.php"><span>NEW DOCUMENT</span></a></li>
                            <li><a href="receiveddoc.php"><span>RECEIVED DOCUMENT</span></a></li>
                            <li><a href="releasedoc.php"><span>RELEASE DOCUMENT</span></a></li>
                            <li><a href="forreleasedoc.php"><span>FOR RELEASE</span></a></li>
                            <li><a href="documenttracker.php"><span>DOCUMENT TRACKER</span></a></li>
                            <li><a href="documentprocessing.php"><span>PROCESSING</span></a></li>
                        </ul>
                    </li>
                    <li><a href="#"><span>REPORT</span></a>
                        <ul style="width:265px;">
                            <li><a href="dochistory.php"><span>DOCUMENT HISTORY</span></a></li>
                            <li><a href="dochistory.php"><span>DOCUMENT ON PROCESS</span></a></li>
                            <li><a href="dochistory.php"><span>DOCUMENT ON PROCESS PER SIGNATORY</span></a></li>
                            <li><a href="dochistory.php"><span>DOCUMENTS PER SIGNATORY</span></a></li>
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

                <div id="post10">
                    <h2>PROCESSING</h2>


                    <div id="retrievetable">
                        <div id="ajaxhistory">



                        </div>


                    </div>




                </div>

                <div id="postright">

                    <div id="tfheader">
                        <form id="tfnewsearch" method="POST">
                            <input id="search_string" type="text" name="search_string" class="tftextinput" placeholder="search..." />
                            <button id="search_document" class="tfbutton">Search </button>
                        </form>
                        <h2></h2>
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

<div class="footer">

    <div class="footer1">

        <div id="footer2">
            <p>
                <?php
                session_start();
                echo $_SESSION['Copyright']. "&nbsp;<img src=images/home/icon/copyleft-icon.png width='14' height='14' />&nbsp;" .$_SESSION['Year']. "&nbsp;" .$_SESSION['Developer'];
                echo "&nbsp|";
                ?>

                <a href="#">Contact Us</a> | Designed by: <a href="#">MIS</a> | <a href="#">Scroll Top</a></p>
        </div>

    </div>

</div>

</body>
</html>