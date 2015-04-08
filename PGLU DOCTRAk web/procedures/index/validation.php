<?php
session_start();
//if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
//  $_SESSION['in'] ="start";
// header('Location:../../index.php');
// //   echo $_SESSION['usr'];
//}
 $_SESSION['timeout']=time();
   require_once("../connection.php");
   $query=select_info_multiple_key("select security_name,security_username,fk_office_name,fk_security_groupname from security_user where security_username='".addslashes($_POST['username'])."' AND security_password='".addslashes(md5($_POST['password']))."'");
   if($query){
      //SESSION EXPIRE
      
        $_SESSION['expiretime']=1000;
       //
      $u=$_POST['username'];
      $p=$_POST['password'];
      $secname=$query[0]['security_name'];
      $office=$query[0]['fk_office_name'];
      $group=$query[0]['fk_security_groupname'];
      $_SESSION['usr'] =$u;
      $_SESSION['pswd'] =md5($p);
      $_SESSION['security_name']=$secname;
      $_SESSION['OFFICE']=$office;
      $_SESSION['GROUP']=$group;
	
	  require_once("../info.php");
          
          $PROJECT_ROOT= '/';
	  require_once("../audit.php");
	  //echo InsertAudit("LOGIN",$_SESSION['security_name'],"sqlquery");
	   
      header("Location:../../home.php");
      // echo $secname;

   }
   else{
	   echo 3;
   
    $_SESSION['login'] ='invalid';
     header('Location:../../index.php');
   // echo $_SESSION['login'];
   }
?>