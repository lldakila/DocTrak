<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:index.php');
}
date_default_timezone_set($_SESSION['Timezone']);

if (!isset($_POST['module_name']))
{
    die();
}
else
{
    $formModule=$_POST['module_name'];
}
    require_once('procedures/connection.php');
   
    
    
switch($formModule)
{
    case 'renderNewDoc':
        renderForm($formModule);
        break;
    case 'renderReceiveDoc':
        renderForm($formModule);
        break;
    case 'renderReleaseDoc':
        renderForm($formModule);
        break;
    case 'renderForpickupDoc':
        renderForm($formModule);
        break;
    case 'renderBacDoc':
        renderForm($formModule);
        break;
    case 'RenderBacMonitor':
        renderBacMonitor($_POST['document_id']);
        break;
    case 'saveBacMonitor':
        saveBacMonitor($_POST['tracker_id']);
        break;

        
}


function renderForm($formName)
{
    switch($formName)
    {
    //NEW DOCUMENT
        case 'renderNewDoc':
             global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
            $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
            //echo "<form name='newDoc' onsubmit='newDocu(\"New\")'>";
            echo "
                    <div>
                        <label style='float:left; margin-right:33px; padding-top:7px; padding-bottom:10px;'>Barcode</label>
                        <div class='fixinput' style='width:42%;'><input id='DocId' onkeyup='if(event.keyCode == 13){submitAction(\"newDocu\")};' type='text' placeholder='Scan Barcode...' class='form-control'></div>
                        <div class='tclear'></div>
                        
                        <label style='float:left; margin-right:59px; padding-top:7px; padding-bottom:10px;'>Title</label>
                        <div class='fixinput' style='width:83.9%;'><input id='DocTitle' onkeyup='if(event.keyCode == 13){submitAction(\"newDocu\")};' type='text' class='form-control'></div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:10px; padding-top:7px; padding-bottom:10px;'>Description</label>
                        <div class='fixinput' style='width:83.9%;'><input id='DocDesc' onkeyup='if(event.keyCode == 13){submitAction(\"newDocu\")};' type='text' class='form-control'></div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:56px; padding-top:7px; padding-bottom:10px;'>Type</label>
                        <div class='fixinput' style='width:31.3%;'>
                          <select id='DocType' name='type' class='form-control' >     ";

                            $query="select DOCUMENTTYPE_ID from document_type";
                                
//                                     $query=select_info_multiple_key("select DOCUMENTTYPE_ID from document_type");
                                     $result= mysqli_query($con,$query)or die(mysqli_error($con));
                                     while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                                     {
                                        echo "<option value = '".$row['DOCUMENTTYPE_ID']."'>".$row['DOCUMENTTYPE_ID']."</option>";
                                     }

															global $PROJECT_ROOT;
                              echo "
                          </select>
                          
                        </div>
                        
                        <label style='float:left; margin:0 10px 0 5px; padding-top:7px; padding-bottom:10px;'>Template:</label>
                        <div class='fixinput' style='width:37.9%;'>
                          <select id='DocuTemplate' name='type' class='form-control' onchange='templateViewer()'>     ";

														echo "<option style='display:none' selected='selected' value = '' ></option>";
                                    $query="select TEMPLATE_ID, template_name from document_template ORDER BY template_name ASC";

//                                     $query=select_info_multiple_key("select DOCUMENTTYPE_ID from document_type");
                                     $result= mysqli_query($con,$query)or die(mysqli_error($con));
                                     while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                                     {
                                        echo "<option  value = ".$row['TEMPLATE_ID'].">".$row['template_name']."</option>";
                                        $templateId=$row['TEMPLATE_ID'];
                                     }
														$url=$PROJECT_ROOT."procedures/home/document/common/viewtemplate.php?template_id=".$templateId;
                             echo "
                          </select>
                          <a class='viewTemplateLinkss' target='_blank' id ='viewDocTemplateLink' style='color:#000;'  href=''>View Template</a>
                        </div>
                        <div class='tclear' ></div>

                        <div class='buttonright'>
                            <input type='button' value='Save' class='btn btn-primary' onclick='submitAction(\"newDocu\")'>
                        </div>
                        <div class='tclear'></div>
                        
                    </div>
                    
                     
                    
                ";
                   
                
               
                    mysqli_close($con);
            break;
    //RECEIVE DOCUMENT
            case 'renderReceiveDoc':
               global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
                  $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
                  echo "
                    <div>
                        <label style='float:left; margin-right:35px; padding-top:7px; padding-bottom:10px;'>Barcode</label>
                        <div class='fixinput' style='width:42%;'>

                        <input id='DocId' type='text' class='form-control' onblur='retriveDocInfo(\"searchReceiveDocument\")' placeholder='Scan Barcode...'>

                        </div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:56px; padding-top:7px; padding-bottom:10px;'>From</label>
                        <div class='fixinput' style='width:42%;'>

                        <input id='UserId' type='text' class='form-control' placeholder='Scan ID...'>

                        </div>
                        <div class='tclear'></div>";

                    echo "
                        <div class='tclear'></div>
                        <div class='textDetail'><strong>Details</strong></div>
                        <div id='docDetail' class='well well-sm wellbottom'>

                                                <div class='row'>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Title:</strong>
                                                    </div>
                                                </div>

                                                <div class='row'>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Type:</strong>
                                                    </div>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Template:</strong>
                                                    </div>
                                                </div>

                                                <div class='row'>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Office:</strong>
                                                    </div>
                                                </div>
                        </div>
                        <div class='tclear'></div>

                        <div class='buttonright'>
                            <input type='submit' value='Receive' class='btn btn-primary' onclick='submitAction(\"receiveDocu\")'>
                        </div>
                        <div class='tclear'></div>


                    </div>
                    

                ";
                     mysqli_close($con);
            break;
    //RELEASE DOCUMENT
            case 'renderReleaseDoc':
                  global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
                  $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
                  echo "
                    
                   <div>
                        <label style='float:left; margin-right:35px; padding-top:7px; padding-bottom:10px;'>Barcode</label>
                        <div class='fixinput' style='width:42%;'>

                            <input id='DocId' type='text' class='form-control' onblur='retriveDocInfo(\"searchReleaseDocument\")' placeholder='Scan Barcode...'>

                        </div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:74px; padding-top:7px; padding-bottom:10px;'>To</label>
                        <div class='fixinput' style='width:42%;'>

                            <input id='UserId' type='text' class='form-control' placeholder='Scan ID...'>

                        </div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:40px; padding-top:7px; padding-bottom:10px;'>Remark</label>
                        <div class='fixinput' style='width:42%;'>

                                <select id='DocComment' name='type' class='form-control'>     ";


                                    $query="SELECT Message FROM message WHERE Message_Module = 'tracking' ORDER BY Message";

//                                     $query=select_info_multiple_key("select DOCUMENTTYPE_ID from document_type");
                                     $result= mysqli_query($con,$query)or die(mysqli_error($con));
                                     while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                                     {
                                        echo "<option value='".$row['Message']."'>".$row['Message']."</option>";
                                     }

                                   echo "
                                </select>

                        </div>
                        <div class='tclear'></div>
                        <div class='textDetail'><strong>Details</strong></div>
                        <div id='docDetail' class='well well-sm wellbottom'>

                                                <div class='row'>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Title:</strong>
                                                    </div>
                                                </div>

                                                <div class='row'>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Type:</strong>
                                                    </div>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Template:</strong>
                                                    </div>
                                                </div>

                                                <div class='row'>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Office:</strong>
                                                    </div>
                                                </div>
                        </div>
                        <div class='tclear'></div>

                        <div class='buttonright'>
                          <input type='submit' value='Release' class='btn btn-primary' onclick='submitAction(\"releaseDocu\")'>
                        </div>
                        <div class='tclear'></div>


                    </div>
                    

                ";
                     mysqli_close($con);
            break;

            case 'renderForpickupDoc':
                  global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
                  $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
                  echo "
                    
                    <div>
                        <label style='float:left; margin-right:35px; padding-top:7px; padding-bottom:10px;'>Barcode</label>
                        <div class='fixinput' style='width:42%;'>

                              <input id='DocId' type='text' class='form-control' onblur='retriveDocInfo(\"searchForReleaseDocument\")' placeholder='Scan Barcode...'>

                        </div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:40px; padding-top:7px; padding-bottom:10px;'>Remark</label>
                        <div class='fixinput' style='width:42%;'>

                                 <select id='DocComment' name='type' class='form-control'>     ";


                                    $query="SELECT Message FROM message WHERE Message_Module = 'tracking' ORDER BY Message";

//                                     $query=select_info_multiple_key("select DOCUMENTTYPE_ID from document_type");
                                     $result= mysqli_query($con,$query)or die(mysqli_error($con));
                                     while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                                     {
                                        echo "<option value='".$row['Message']."'>".$row['Message']."</option>";
                                     }

                                   echo "
                                </select>

                        </div>
                        <div class='tclear'></div>

                        <div class='textDetail'><strong>Details</strong></div>
                        <div id='docDetail' class='well well-sm wellbottom'>

                                                <div class='row'>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Title:</strong>
                                                    </div>
                                                </div>

                                                <div class='row'>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Type:</strong>
                                                    </div>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Template:</strong>
                                                    </div>
                                                </div>

                                                <div class='row'>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Office:</strong>
                                                    </div>
                                                </div>
                        </div>
                        <div class='tclear'></div>

                        <div class='buttonright'>
                           <input type='submit' value='Update' class='btn btn-primary' onclick='submitAction(\"ForreleaseDocu\")'>
                        </div>
                        <div class='tclear'></div>


                    </div>
                    

                ";
                    mysqli_close($con);
            break;

            case 'renderBacDoc':
                  echo "
                   
                    <div>
                        <label style='float:left; margin-right:5px; padding-top:7px; padding-bottom:10px;'>Barcode No.:</label>
                        <div class='fixinput' style='width:32%;'><input type='text' readonly='readonly' class='form-control'></div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:59px; padding-top:7px; padding-bottom:10px;'>Title:</label>
                        <div class='fixinput' style='width:83%;'><input type='text' class='form-control'></div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:10px; padding-top:7px; padding-bottom:10px;'>Description:</label>
                        <div class='fixinput' style='width:83%;'><input type='text' class='form-control'></div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:56px; padding-top:7px; padding-bottom:10px;'>Type:</label>
                        <div class='fixinput'><select id='type' name='type' class='form-control'><option>Financial Document</option><option>Office Document</option><option>Personal Document</option><select></div>

                        <label style='float:left; margin:0 10px 0 5px; padding-top:7px; padding-bottom:10px;'>Template:</label>
                        <div class='fixinput' style='width:37%;'><select id='type' name='type' class='form-control'><option>Financial Document</option><option>Office Document</option><option>Personal Document</option><select></div>
                        <div class='tclear'></div>

                        <div class='buttonright'>
                            <input type='submit' value='Save' class='btn btn-primary'>
                        </div>
                        <div class='tclear'></div>


                    </div>
                   
                ";
            break;
    }
    
}
//////////////////////////
//BAC MONITORING MODAL START
//////////////////////////


//RENDER FORM
function renderBacMonitor($document_id)
{
    //CHECK IF BAC OR POWER USERS
    if ($_SESSION['BAC']!=1)
    {
        if ($_SESSION['GROUP']!='POWER ADMIN')
        {
            session_destroy();
            die();
        }

    }
    else if ($_SESSION['GROUP']!='POWER ADMIN')
    {

        if ($_SESSION['BAC']!=1)
        {
            session_destroy();
            die();
        }
    }
    
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    $sqlString='SELECT bacdocumentlist_tracker_id,bacdocument_id,bacdocumentdetail,prcost,fk_officename_bacdocumentlist,pr_date, activity, expire_days,checkin_date FROM  bacdocument_monitoring JOIN bacdocumentlist_tracker ON bacdocument_monitoring.fk_bacdocumentlist_tracker_id = bacdocumentlist_tracker.bacdocumentlist_tracker_id JOIN bacdocumentlist ON bacdocumentlist_tracker.fk_bacdocumentlist_id = bacdocumentlist.bacdocument_id where bacdocument_id = "'.$document_id.'" ';
//    echo $sqlString;
//    die();
    $result=  mysqli_query($con, $sqlString);
    $resultSet=  mysqli_fetch_array($result);
    
    $next_date= date("Y-m-d", strtotime($resultSet["checkin_date"]. ' + '.$resultSet["expire_days"].' days'));
//    $date = strtotime("+".$resultSet["expire_days"]." days", strtotime($resultSet["checkin_date"]));
    $first_date = new DateTime($next_date);
    $second_date = new DateTime(date("Y-m-d"));
    
     
//    date_add($resultSet["checkin_date"], date_interval_create_from_date_string($resultSet["expire_days"].' days'));
//        $expirationDay=date_format($expirationDay, 'Y-m-d');
        
    $difference = $first_date->diff($second_date);

    //echo format_interval($difference);

    
    echo "
        <div>
            <table border='0' style='width:100%;'>
                <tr>
                    <td style='width:85px;'>Barcode No.:</td>
                    <td><strong>".$resultSet["bacdocument_id"]."</strong></td>
                    <td>Detail:</td>
                    <td><strong>".$resultSet["bacdocumentdetail"]."</strong></td>
                </tr>
                <tr>
                    <td>Cost:</td>
                    <td><strong>".number_format($resultSet["prcost"], 2, '.', ',')."</strong></td>
                    <td>Date:</td>
                    <td><strong>".date("F j, Y",strtotime($resultSet["pr_date"]))."</strong></td>
                    <td>Office:</td>
                    <td><strong>".$resultSet["fk_officename_bacdocumentlist"]."</strong></td>
                </tr>
            </table>
        </div>
        <div>
            <hr>

            <table border='0' style='width:100%;'>
                <tr>
                    <td style='width:14%;'>Current Activity:</td>
                    <td style='width:86%;'><strong style='font-size:10px;'><input type='text' readonly='readonly' class='form-control' value='".$resultSet["activity"]."'></strong></td>
                </tr>
            </table>
            <table border='0'>
                <tr>
                   <strong><input id='tracker_id' type='hidden' value='".$resultSet["bacdocumentlist_tracker_id"]."'></strong>
                    <td style='width:14%;'>Check-in Date:</td>
                    <td style='width:30%;'><strong><input type='text' readonly='readonly' class='form-control' value='".date("F j, Y",strtotime($resultSet["checkin_date"]))."'></strong></td>
                    <td style='width:8%;'>Alloted Day/s:</td>
                    <td style='width:15%;'><strong><input type='text' readonly='readonly' class='form-control' value='".$resultSet["expire_days"]." day(s)'></strong></td>
                    <td style='width:8%;'>Day/s Over:</td>
                    <td style='width:25%;'><strong><input type='text' readonly='readonly' class='form-control' value='".format_interval($difference)."'></strong></td>
                </tr>
             </table>

             <p class='text' style='float:left; margin-right:41px; margin-left:8px; padding-top:7px; padding-bottom:10px;'>Reason:</p>
             <div class='fixinput' style='width:84.5%; padding-top:8px; margin-bottom:10px;'>
                <textarea id='remarkText' class='form-control' name='comment'></textarea>
             </div>
             <div class='buttonright'>
                <button id='btnUpdateBacklog' type='button' class='btn btn-primary' onclick='javascript:bacMonitorSave()'>Save</button>
             </div>
             <div class='tclear'></div>
        </div>

        ";
    
}

//FUNCTION TO GET DATE DIFFERENCE
function format_interval(DateInterval $interval) {
    $result = "";
    if ($interval->y) { $result .= $interval->format("%y years "); }
    if ($interval->m) { $result .= $interval->format("%m months "); }
    if ($interval->d) { $result .= $interval->format("%d day(s) "); }
    if ($interval->h) { $result .= $interval->format("%h hours "); }
    if ($interval->i) { $result .= $interval->format("%i minutes "); }
    if ($interval->s) { $result .= $interval->format("%s seconds "); }

    return $result;
}


//BUTTON SAVE FUNCTION

function saveBacMonitor($tracker_id)
{
    //CHECK IF BAC OR POWER USERS
    if ($_SESSION['BAC']!=1)
    {
        if ($_SESSION['GROUP']!='POWER ADMIN')
        {
            session_destroy();
            die();
        }

    }
    else if ($_SESSION['GROUP']!='POWER ADMIN')
    {

        if ($_SESSION['BAC']!=1)
        {
            session_destroy();
            die();
        }
    }
    
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    mysqli_autocommit($con,FALSE);
    $flag=true;
//    $sqlString='SELECT bacdocument_id,bacdocumentdetail,prcost,fk_officename_bacdocumentlist,pr_date FROM bacdocumentlist where bacdocument_id = "'.$document_id.'" ';
    
    $sqlString='INSERT INTO bacdocumentlist_trackerdetail(fk_bacdocumentlist_tracker_id,noted_by,remark) VALUES ('.$tracker_id.',"'.$_SESSION['security_name'].'","'.$_POST['remarkText'].'")';
//    echo $sqlString;
//    die();
    $result=mysqli_query($con, $sqlString);
    if (!$result)
    {
       $flag=false;
    }
    
    $sqlString='DELETE FROM bacdocument_monitoring WHERE fk_bacdocumentlist_tracker_id='.$tracker_id;
    $result1=mysqli_query($con, $sqlString);
    if (!$result1)
    {
       $flag=false;
    }
    
    if($flag)
    {
        mysqli_commit($con);
        echo 'Document status updated.';
    }
    else
    {
        mysqli_rollback($con);
        echo 'Error on updating status.';
    }
    
}


//UPDATE BAC NOTIFICATION ICON
//function updateStatusIcon()
//{
//    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
//    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
//    
//    $query='SELECT COUNT(*) as numOfRow FROM bacdocument_monitoring';
//    
//    $result=mysqli_query($con,$query)or die(mysqli_error($con));
//
//    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
//    {
//
//        if ($row['numOfRow']<>0)
//        {
//            echo '<img  src="../../../images/home/icon/exclamation.gif" width="30" height="20" align="left" />'.$row['numOfRow'];
//            break;
//        }
//        else
//        {
//            break; 
//        }
//    }
//    
//    
//}

//CHECK FOR BAC DOCUMENTS THAT ARE PASSED THE DEADLINE SET BY BAC
 //$printme="src=".$PROJECT_ROOT."images/home/logo/misdlogo.png";
 

//function checkDocumentDeadline()
//{
//    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
//    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
//    $sqlString="select  bacdocumentlist_tracker_id, fk_bacdocumentlist_id,sortorder,receive_date,expire_days,checkin_date from bacdocumentlist_tracker 
//                WHERE checkin_date IS NOT NULL AND receive_date IS NULL ORDER BY fk_bacdocumentlist_id, sortorder ASC";
//    mysqli_autocommit($con, false);
//    $flag=true;
//    
//    $result=  mysqli_query($con, $sqlString);
//    $dateNow=date('Y-m-d');
//    while ($rows=  mysqli_fetch_array($result))
//    {
////        $expirationDay = date_create('now');
//////        date_add($expirationDay, date_interval_create_from_date_string($rows2['max_day'].' days'));
//////        $dateAdded=date_format($expirationDay, 'Y-m-d');
//////        
////        $date = date_create('2000-01-01');
////date_add($date, date_interval_create_from_date_string('10 days'));
////echo date_format($date, 'Y-m-d');
//
//        $deadlineDay=$rows['expire_days']+1;
//        $expirationDay = date_create($rows['checkin_date']);
//        date_add($expirationDay, date_interval_create_from_date_string($deadlineDay.' days'));
//        $expirationDay=date_format($expirationDay, 'Y-m-d');
//        
////        echo $rows['bacdocumentlist_tracker_id'].' -  '.$expirationDay .'   -   '.$dateNow ;
////        echo '<br>';
////     echo date_create($expirationDay.' 00:00:00');
////     die;
//        if (checkDuplicate($rows['bacdocumentlist_tracker_id'])==false)
//        {
//            if (strtotime($expirationDay)<=strtotime($dateNow))
//            {
//                $sqlString='INSERT INTO bacdocument_monitoring set fk_bacdocumentlist_tracker_id = "'.$rows["bacdocumentlist_tracker_id"].'" ';
//                $myQuery=  mysqli_query($con, $sqlString);
//                if (!$myQuery)
//                {
//                    printf("Errormessage: %s\n", mysqli_error($con));
//                    echo '<br>';
//                    $flag=false;
//                }
//            }
//        }
////        
////        $days_added='+'.$rows['expire_days'].' days';
////        echo date('Y-m-d', strtotime($days_added));
//    }
////    die();
////    
//       if($flag)
//    {
//        //mysqli_rollback($con);
//        mysqli_commit($con);
//        return true;
//
//    }
//    else
//    {
//        mysqli_rollback($con);
//        return false;
//    }
//}
//
////
////CHECK IF DOCUMENT TRACKER ALREADY EXIST IN MONITORING TABLE
////
//function checkDuplicate($documentlist_tracker_id)
//{
//    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE; 
//    $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
//    
//    $sqlQuery='SELECT COUNT(bacdocument_monitoring_id) as rowCount FROM bacdocument_monitoring WHERE fk_bacdocumentlist_tracker_id = "'.$documentlist_tracker_id.'" ';
//    $result=mysqli_query($con,$sqlQuery);
//    $row=  mysqli_fetch_array($result);
//    if ($row['rowCount']==0)
//    {
//        return false;
//    }
//    else
//    {
//        return true;
//    }
//}

//////////////////////////
//BAC MONITORING MODAL END
//////////////////////////