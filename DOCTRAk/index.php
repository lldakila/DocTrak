

<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// $_SESSION['timeout']=time();
if(isset($_SESSION['usr']) || isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:home.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PGLU DOCTRAK</title>
<link rel="icon" href="images/home/pglu.png" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="css/index.css" />
</head>

<body>




<div class="container">
  <div class="login">
      <?php  
      require_once('procedures/info.php');
      
      echo '<h1>';
      echo $_SESSION['Title']." ".$_SESSION['Version'];
      echo '</h1>';
      
      
      ?>
    
    <form method="post" action="procedures/index/validation.php">
      <p>
      <input type="text" name="username" value="" id="icon"  placeholder="Username"></p>
      <p><input type="password" name="password" value="" id="iconkey" placeholder="Password"></p>
      
      <p class="submit"><input type="submit" name="commit" value="Login"></p>
    </form>
  </div>

  <div class="login-help">
    
    <?php
 
        if (isset($_SESSION['login']))
        {
           if($_SESSION['login']=='invalid'){

                echo"<div style='color:#fff; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Invalid Username / Password </div>";
            }else if($_SESSION['in']=='start'){
                echo"<div style='color:red; font-family: Times New Roman'>**SIGN IN TO CONTINUE**</div>";

                }   }
         $_SESSION['login']='clear';
         $_SESSION['in']='clear';
	


?>
  </div>
</div>






</body>
</html>
