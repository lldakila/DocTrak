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
        case 'renderNewDoc':
             global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
            $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
            echo "
                    <form  action='#' name='#' method='post' onsubmit='#'>
                    <div>
                        <label style='float:left; margin-right:44px; padding-top:7px; padding-bottom:10px;'>Doc ID</label>
                        <div class='fixinput' style='width:32%;'><input type='text' placeholder='Scan Barcode...' class='form-control'></div>
                        <div class='tclear'></div>
                        
                        <label style='float:left; margin-right:59px; padding-top:7px; padding-bottom:10px;'>Title</label>
                        <div class='fixinput' style='width:83.9%;'><input type='text' class='form-control'></div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:10px; padding-top:7px; padding-bottom:10px;'>Description</label>
                        <div class='fixinput' style='width:83.9%;'><input type='text' class='form-control'></div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:56px; padding-top:7px; padding-bottom:10px;'>Type</label>
                        <div class='fixinput'>
                          <select id='type' name='type' class='form-control'>     ";

                            $query="select DOCUMENTTYPE_ID from document_type";
                                
//                                     $query=select_info_multiple_key("select DOCUMENTTYPE_ID from document_type");
                                     $result= mysqli_query($con,$query)or die(mysqli_error($con));
                                     while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                                     {
                                        echo "<option>".$row['DOCUMENTTYPE_ID']."</option>";
                                     }


                              echo "
                          </select>
                        </div>
                        
                        <label style='float:left; margin:0 10px 0 5px; padding-top:7px; padding-bottom:10px;'>Template:</label>
                        <div class='fixinput' style='width:37.9%;'>
                          <select id='type' name='type' class='form-control'>     ";


                                    $query="select TEMPLATE_ID, template_name from document_template ";

//                                     $query=select_info_multiple_key("select DOCUMENTTYPE_ID from document_type");
                                     $result= mysqli_query($con,$query)or die(mysqli_error($con));
                                     while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                                     {
                                        echo "<option>".$row['template_name']."</option>";
                                     }

                             echo "
                          </select>
                        </div>
                        <div class='tclear'></div>

                        <div class='buttonright'>
                            <input type='submit' value='Save' class='btn btn-primary'>
                        </div>
                        <div class='tclear'></div>
                        
                        
                    </div>
                    </form>

            
            
            
                ";
                             mysqli_close($con);
            break;

            case 'renderReceiveDoc':
                  echo "
                    <form  action='#' name='#' method='post' onsubmit='#'>
                    <div>
                        <label style='float:left; margin-right:46px; padding-top:7px; padding-bottom:10px;'>Doc ID</label>
                        <div class='fixinput' style='width:35%;'>

                              <input type='text' class='form-control' placeholder='Scan Barcode...'>

                        </div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:56px; padding-top:7px; padding-bottom:10px;'>From</label>
                        <div class='fixinput' style='width:35%;'>

                                  <input type='text' class='form-control' placeholder='Scan ID...'>

                        </div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:40px; padding-top:7px; padding-bottom:10px;'>Remark</label>
                        <div class='fixinput' style='width:83.9%;'><input type='text' class='form-control'></div>
                        <div class='tclear'></div>

                        <div class='textDetail'><strong>Details</strong></div>
                        <div class='well well-sm wellbottom'>

                                                <div class='row'>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Title:</strong><p>Laoag Travel Order</p>
                                                    </div>
                                                </div>

                                                <div class='row'>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Type:</strong><p>Memorandum Letter</p>
                                                    </div>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Template:</strong><p>Payroll</p>
                                                    </div>
                                                </div>

                                                <div class='row'>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Office:</strong><p>PITO</p>
                                                    </div>
                                                </div>
                        </div>
                        <div class='tclear'></div>

                        <div class='buttonright'>
                            <input type='submit' value='Receive' class='btn btn-primary'>
                        </div>
                        <div class='tclear'></div>


                    </div>
                    </form>




                ";
            break;

            case 'renderReleaseDoc':
                  echo "
                    <form  action='#' name='#' method='post' onsubmit='#'>
                    <div>
                        <label style='float:left; margin-right:46px; padding-top:7px; padding-bottom:10px;'>Doc ID</label>
                        <div class='fixinput' style='width:35%;'>

                              <input type='text' class='form-control' placeholder='Scan Barcode...'>

                        </div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:73px; padding-top:7px; padding-bottom:10px;'>To</label>
                        <div class='fixinput' style='width:35%;'>

                                  <input type='text' class='form-control' placeholder='Scan ID...'>

                        </div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:40px; padding-top:7px; padding-bottom:10px;'>Remark</label>
                        <div class='fixinput' style='width:83.9%;'><input type='text' class='form-control'></div>
                        <div class='tclear'></div>

                        <div class='textDetail'><strong>Details</strong></div>
                        <div class='well well-sm wellbottom'>

                                                <div class='row'>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Title:</strong><p>Laoag Travel Order</p>
                                                    </div>
                                                </div>

                                                <div class='row'>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Type:</strong><p>Memorandum Letter</p>
                                                    </div>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Template:</strong><p>Payroll</p>
                                                    </div>
                                                </div>

                                                <div class='row'>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Office:</strong><p>PITO</p>
                                                    </div>
                                                </div>
                        </div>
                        <div class='tclear'></div>

                        <div class='buttonright'>
                            <input type='submit' value='Release' class='btn btn-primary'>
                        </div>
                        <div class='tclear'></div>


                    </div>
                    </form>




                ";
            break;

            case 'renderForpickupDoc':
                  echo "
                    <form  action='#' name='#' method='post' onsubmit='#'>
                    <div>
                        <label style='float:left; margin-right:46px; padding-top:7px; padding-bottom:10px;'>Doc ID</label>
                        <div class='fixinput' style='width:35%;'>

                              <input type='text' class='form-control' placeholder='Scan Barcode...'>

                        </div>
                        <div class='tclear'></div>

                        <label style='float:left; margin-right:40px; padding-top:7px; padding-bottom:10px;'>Remark</label>
                        <div class='fixinput' style='width:83.9%;'><input type='text' class='form-control'></div>
                        <div class='tclear'></div>

                        <div class='textDetail'><strong>Details</strong></div>
                        <div class='well well-sm wellbottom'>

                                                <div class='row'>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Title:</strong><p>Laoag Travel Order</p>
                                                    </div>
                                                </div>

                                                <div class='row'>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Type:</strong><p>Memorandum Letter</p>
                                                    </div>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Template:</strong><p>Payroll</p>
                                                    </div>
                                                </div>

                                                <div class='row'>
                                                    <div class='col-md-6 col-bottom'>
                                                        <strong>Office:</strong><p>PITO</p>
                                                    </div>
                                                </div>
                        </div>
                        <div class='tclear'></div>

                        <div class='buttonright'>
                            <input type='submit' value='Save' class='btn btn-primary'>
                        </div>
                        <div class='tclear'></div>


                    </div>
                    </form>




                ";
            break;

            case 'renderBacDoc':
                  echo "
                    <form  action='#' name='#' method='post' onsubmit='#'>
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
                    </form>




                ";
            break;
    }
    
}

?>