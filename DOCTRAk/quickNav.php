<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:index.php');
}


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
                        <label style='float:left; margin-right:44px; padding-top:7px; padding-bottom:10px;'>Doc ID</label>
                        <div class='fixinput' style='width:32%;'><input id='DocId' onkeyup='if(event.keyCode == 13){submitAction(\"newDocu\")};' type='text' placeholder='Scan Barcode...' class='form-control'></div>
                        <div class='tclear'></div>
                        
                        <label style='float:left; margin-right:59px; padding-top:7px; padding-bottom:10px;'>Title</label>
                        <div class='fixinput' style='width:83.9%;'><input id='DocTitle' onkeyup='if(event.keyCode == 13){submitAction(\"newDocu\")};' type='text' class='form-control'></div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:10px; padding-top:7px; padding-bottom:10px;'>Description</label>
                        <div class='fixinput' style='width:83.9%;'><input id='DocDesc' onkeyup='if(event.keyCode == 13){submitAction(\"newDocu\")};' type='text' class='form-control'></div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:56px; padding-top:7px; padding-bottom:10px;'>Type</label>
                        <div class='fixinput'>
                          <select id='DocType' name='type' class='form-control' >     ";

                            $query="select DOCUMENTTYPE_ID from document_type";
                                
//                                     $query=select_info_multiple_key("select DOCUMENTTYPE_ID from document_type");
                                     $result= mysqli_query($con,$query)or die(mysqli_error($con));
                                     while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                                     {
                                        echo "<option value = '".$row['DOCUMENTTYPE_ID']."'>".$row['DOCUMENTTYPE_ID']."</option>";
                                     }


                              echo "
                          </select>
                          
                        </div>
                        
                        <label style='float:left; margin:0 10px 0 5px; padding-top:7px; padding-bottom:10px;'>Template:</label>
                        <div class='fixinput' style='width:37.9%;'>
                          <select id='DocTemplate' name='type' class='form-control'>     ";


                                    $query="select TEMPLATE_ID, template_name from document_template ";

//                                     $query=select_info_multiple_key("select DOCUMENTTYPE_ID from document_type");
                                     $result= mysqli_query($con,$query)or die(mysqli_error($con));
                                     while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                                     {
                                        echo "<option value = ".$row['TEMPLATE_ID'].">".$row['template_name']."</option>";
                                     }

                             echo "
                          </select>
                        </div>
                        <div class='tclear'></div>

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
                        <label style='float:left; margin-right:46px; padding-top:7px; padding-bottom:10px;'>Doc ID</label>
                        <div class='fixinput' style='width:35%;'>

                        <input id='DocId' type='text' class='form-control' onblur='retriveDocInfo(\"searchReceiveDocument\")' placeholder='Scan Barcode...'>

                        </div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:56px; padding-top:7px; padding-bottom:10px;'>From</label>
                        <div class='fixinput' style='width:35%;'>

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
                        <label style='float:left; margin-right:46px; padding-top:7px; padding-bottom:10px;'>Doc ID</label>
                        <div class='fixinput' style='width:35%;'>

                            <input id='DocId' type='text' class='form-control' onblur='retriveDocInfo(\"searchReleaseDocument\")' placeholder='Scan Barcode...'>

                        </div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:74px; padding-top:7px; padding-bottom:10px;'>To</label>
                        <div class='fixinput' style='width:35%;'>

                            <input id='UserId' type='text' class='form-control' placeholder='Scan ID...'>

                        </div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:40px; padding-top:7px; padding-bottom:10px;'>Remark</label>
                        <div class='fixinput' style='width:55%;'>

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
                        <label style='float:left; margin-right:46px; padding-top:7px; padding-bottom:10px;'>Doc ID</label>
                        <div class='fixinput' style='width:35%;'>

                              <input id='DocId' type='text' class='form-control' onblur='retriveDocInfo(\"searchForReleaseDocument\")' placeholder='Scan Barcode...'>

                        </div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:40px; padding-top:7px; padding-bottom:10px;'>Remark</label>
                        <div class='fixinput' style='width:83.9%;'>

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


