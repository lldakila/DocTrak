<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../index.php');
 //   echo $_SESSION['usr'];
}
?>

<?php
   require_once("../connection.php");
   $query=select_info_multiple_key("select * from security_user where security_username='".addslashes($_POST['username'])."' AND security_password='".addslashes(md5($_POST['password']))."'");
   if($query){
      session_start();
      $u=$_POST['username'];
      $p=md5($_POST['password']);
      $secname=$query[0]['security_name'];
      $_SESSION['usr'] =$u;
      $_SESSION['pswd'] =$p;
      $_SESSION['security_name']=$secname;

       header("Location:../../home.php");
      // echo $secname;

   }
   else{
     session_start();
    $_SESSION['login'] ='invalid';
     header('Location:../../index.php');
   // echo $_SESSION['login'];
   }
?>