<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
 header('Location:../index.php');
}
?>
<?php
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = 'passw0rd';
$BD_TABLE = 'doctrak';


function insert_update_delete($query)
 {
 global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
mysql_connect($DB_HOST, $DB_USER,$DB_PASS);
mysql_select_db($BD_TABLE) or die( "Unable to select database");

   mysql_query($query)or die( "Unable to execute query");


mysql_close();
  }



function select_info_multiple_key($query)
{
global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
mysql_connect($DB_HOST, $DB_USER,$DB_PASS);
mysql_select_db($BD_TABLE) or die( "Unable to select database");

if($res=mysql_query($query))
    {
		if(mysql_num_rows($res))
        {
		    $retvalue = array();
          $ctr = 0;
			while($r=mysql_fetch_array($res,MYSQL_BOTH))
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

mysql_close();
}
?>
