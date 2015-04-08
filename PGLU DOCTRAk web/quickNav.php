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

switch($formModule)
{
    case 'renderNewDoc':
        renderForm($formModule);
        break;
}


function renderForm($formModule)
{
    switch($formModule)
    {
        case 'renderNewDoc':
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