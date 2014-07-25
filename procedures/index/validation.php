<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../index.php');
}
?>

<?php
   require_once("../connection.php");
   $query=select_info_multiple_key("select * from security_user where Security_UserName='".addslashes($_POST['username'])."' AND Security_Password='".addslashes(md5($_POST['password']))."'");
   if($query){
      session_start();
      $u=$_POST['username'];
      $p=md5($_POST['password']);
      $secname=$query[0]['Security_Name'];
      $_SESSION['usr'] =$u;
      $_SESSION['pswd'] =$p;
      $_SESSION['Security_Name']=$secname;
       header("Location:../../home.php");
   }
   else{
     session_start();
    $_SESSION['login'] ='invalid';
     header('Location:../../index.php');

   }
?>