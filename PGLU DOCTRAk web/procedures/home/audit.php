<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:index.php');
}


        require_once("../connection.php");
	function InsertAudit($DML,$User,$SQL_Query,$PROJECT_ROOT)
	{
		$transact_id=GetTransactionId()+1;


		
		
		global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
		$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);

		$query="INSERT INTO AUDIT(TRANSACTION_ID,DML,SQL_STRING,FK_SECURITY_USERNAME) values (.$transact_id.,'.$DML.','.$SQL_Query.','.$User')";
		$result=mysqli_query($con,$query);
		if (!$result)
		{
			return "false";
		}
		else
		{
			return "true";
		}




	}


	function GetTransactionId()
	{
		
		
		$query=select_info_multiple_key("SELECT COUNTER from GENERATOR WHERE GENERATOR_NAME = 'TRANSACTION' ");
		return $query[0]['COUNTER'];
	}



?>
