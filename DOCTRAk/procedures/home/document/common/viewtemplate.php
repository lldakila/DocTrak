<?php
    if (session_status() == PHP_SESSION_NONE) 
    {
    		session_start();
		}
		
    if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd']))
    {
        $_SESSION['in'] ="start";
        header('Location:../../../../index.php');
		}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php

 	echo $_SESSION['Title']. "" .$_SESSION['Version'];
?>
</title>

<link href="../../../../css/bootstrap.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="../../../../css/home.css" />
<link rel="stylesheet" type="text/css" href="../../../../css/bootstrap-select.css" />
<link rel="icon" href="../../../../images/home/icon/pglu.ico" type="image/x-icon">
<script src="../../../../js/jquery-1.10.2.min.js"></script>
<script src="../../../../js/jquery.colorbox-min.js"></script>

<script src="../../../../js/bootstrap.min.js"></script>
<script src="../../../../js/bootstrap-select.js"></script>
</head>

<body>




<?php
		
		require_once("../../../connection.php");
		global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
		$sql="SELECT * FROM document_template join template_list on document_template.template_id = template_list.fk_template_id
join office on template_list.fk_office_name=office.office_name WHERE template_id = '".$_GET['template_id']."' ";
	
		$result=mysqli_query($con,$sql);
		$resultRow=mysqli_fetch_array($result);
		
		echo "Template Name : ". $resultRow['template_name'];
		echo "<br>";
		echo "Description : ". $resultRow['template_description'];
		echo "<br>";
		echo "<br>";
		echo "<div><table class='table  table-hover table-condensed table-bordered' border='5'><th>Step</th><th>Process</th><th>Office Description</th>";
		$result=mysqli_query($con,$sql);
		while($resultRow=mysqli_fetch_array($result))
		{
				echo "
						<tr>
							<td>
								".$resultRow['sort']."
							</td>
							<td>
								".$resultRow['docprocess']."
							</td>		
							<td>
								".$resultRow['office_description']."
							</td>				
				
				
				</tr>";
				
				
		};

		echo "</table><div>";
?>



</body>
</html>