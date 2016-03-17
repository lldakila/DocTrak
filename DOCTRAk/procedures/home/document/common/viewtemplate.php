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
		echo "<table border='5'><th>Step</th><th>Office Code</th><th>Office Description</th>";
		$result=mysqli_query($con,$sql);
		while($resultRow=mysqli_fetch_array($result))
		{
				echo "
						<tr>
							<td>
								".$resultRow['sort']."
							</td>
							<td>
								".$resultRow['office_name']."
							</td>		
							<td>
								".$resultRow['office_description']."
							</td>				
				
				
				</tr>";
				
				
		};

		echo "</table>";
?>