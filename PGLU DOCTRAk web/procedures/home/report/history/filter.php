<?php
	session_start();
	if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
		$_SESSION['in'] ="start";
		header('Location:../../../../index.php');
	}



	require_once("../../../connection.php");
	echo "	<tr>
            <th>BARCODE</th>
            <th>TITLE</th>
            <th>OFFICE</th>
            <th>OWNER</th>
            <th>DATE</th>
            <th>TYPE</th>
            </tr>";

	if ($_SESSION['GROUP']=='ADMIN' OR $_SESSION['GROUP']=='POWER ADMIN')
	{
		$query=select_info_multiple_key("select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name,fk_office_name from documentlist join security_user on documentlist.fk_security_username = security_user.security_username where  transdate between '".$_POST['datefrom']."' and '".$_POST['dateto']."' ORDER BY transdate desc");
	}
	else
	{
		$query=select_info_multiple_key("select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name,fk_office_name from documentlist join security_user on documentlist.fk_security_username = security_user.security_username WHERE (transdate between '".$_POST['datefrom']."' and '".$_POST['dateto']."') and fk_office_name ='".$_SESSION['OFFICE']."' ORDER BY transdate desc");
	}

	if ($query)
	{

		foreach($query as $var)
		{

			if ($rowcolor=="blue")
			{
				echo '<tr id="'.$var["document_id"].'" class="usercolor" onClick="clickRetrieve(\''.$var["document_id"].'\')">';
				// echo '<tr id="id" onclick="function(\'string\',\'string\')">';
				$rowcolor="notblue";
			}
			else
			{
				echo '<tr id="'.$var["document_id"].'" class="usercolor1" onClick="clickRetrieve(\''.$var["document_id"].'\')">';
				// echo "<tr  id='".$var["SECURITY_NAME"]."' bgcolor='#2CC1F7'> <td>";
				$rowcolor="blue";
			}




			echo "<td>".$var['document_id']."</td>";
			echo "<td>".$var['document_title']."</td>";
			echo "<td>".$var['fk_office_name']."</td>";
			echo "<td>".$var['security_name']."</td>";
			echo "<td>".$var['transdate']."</td>";
			echo "<td>".$var['fk_template_id']."</td>";
			echo "</tr>";

		}
	}

	echo "select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name,fk_office_name from documentlist join security_user on documentlist.fk_security_username = security_user.security_username where  transdate between '".$_POST['datefrom']."' and '".$_POST['dateto']."' ORDER BY transdate desc";
	/*	else
		{
			echo "<span style='font:11px trebuchet ms;'>Nothing found.</span>";
		}*/
?>