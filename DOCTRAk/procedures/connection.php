<?php
//session_start();
//if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
//    header('Location:../../index.php');
//}
//
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//SESSION
$session_life = time() -  $_SESSION['timeout']; 
if($session_life > $_SESSION['expiretime']) {

   session_destroy(); 
   header("Location: ".$PROJECT_ROOT.'index.php');
   //header("Location: ".$_SERVER['PHP_SELF']);

}
 $_SESSION['timeout']=time();
 ///
 

$DB_HOST = 'docutracking';
$DB_USER = 'doctrak';
$DB_PASS = 'p@ssw0rd';
$BD_TABLE = 't-doctrak';


function insert_update_delete($query)
 {
 global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
$con=mysqli_connect($DB_HOST, $DB_USER,$DB_PASS,$BD_TABLE);
//mysqli_select_db($BD_TABLE) or die( "Unable to select database");

   mysqli_query($con,$query)or die( "Unable to execute query");


mysqli_close($con);
  }



function select_info_multiple_key($query)
{
global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
$con=mysqli_connect($DB_HOST, $DB_USER,$DB_PASS,$BD_TABLE);
//mysqli_select_db($BD_TABLE) or die( "Unable to select database");

if($res=mysqli_query($con,$query))
    {
		if(mysqli_num_rows($res))
        {
		    $retvalue = array();
          $ctr = 0;
			while($r=mysqli_fetch_array($res,MYSQL_BOTH))
            {
      $a_keys = array_keys($r);
	 $retvalue[$ctr] = array();


    for($x = 0; $x<count($a_keys); $x++)
                    {
                     $retvalue[$ctr][$a_keys[$x]]=html_entity_decode(stripslashes($r[$a_keys[$x]]),ENT_QUOTES);
                    }
              $ctr = $ctr+1;
			}
			return $retvalue;
		}
		else
        {
		return null;
		}
	}
else
    {

	return null;
	}

mysqli_close($con);
}
?>
