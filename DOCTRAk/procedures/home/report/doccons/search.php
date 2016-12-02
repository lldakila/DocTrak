<?php
    session_start();
    if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
        $_SESSION['in'] ="start";
        header('Location:../../../../index.php');
    }

		date_default_timezone_set($_SESSION['Timezone']);
    require_once("../../../connection.php");
		$con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);

	$datefrom = date_create($_POST['vdatefrom']);

	
	$dateto = date_create($_POST['vdateto']);
	date_add($dateto, date_interval_create_from_date_string('1 days'));
	//date_sub($dateto, date_interval_create_from_date_string('1 days'));
	
	

	
//	echo "	<tr>
//						<th>No</th>
//            <th>BARCODE</th>
//            <th>TITLE</th>
//            <th>OFFICE</th>
//            <th>OWNER</th>
//            <th>DATE</th>
//           
//            </tr>";

		$datefrom=date_format($datefrom, 'Y-m-d');	
		$dateto=date_format($dateto, 'Y-m-d');	
		$received_b="and received_val is  null";
		$released_b="and released_val is  null";
		$approved_b="and forrelease_val is  null";
		$filterDoctrackList="";
		$mydoc_b="";
		$noneCheckedProcess="";

		
		if ($_POST['vreceived']=='true')
		{
			$received_b="and received_val = 1";	
		}
		if ($_POST['vreleased']=='true')
		{
			$released_b="and released_val = 1";	
		}
		if ($_POST['vapproved']=='true')
		{
			$approved_b="and forrelease_val = 1";	
		}
		if ($_POST['vmydoc']=='true')
		{
			$mydoc_b="and documentlist.fk_office_name_documentlist = '".$_SESSION['OFFICE']."'";
		}

		
		if (($_POST['vreceived']=='true')AND($_POST['vapproved']=='false')AND($_POST['vreleased']=='false'))
		{
			$received_b=$received_b." and received_date between '".$datefrom."' and '".$dateto."' ";	
			
		}
		elseif (($_POST['vapproved']=='true')AND($_POST['vreleased']=='false'))
		{
			$approved_b=$approved_b." and forrelease_date between '".$datefrom."' and '".$dateto."' ";
		}
		elseif ($_POST['vreleased']=='true')		
		{
			$released_b=$released_b." and released_date between '".$datefrom."' and '".$dateto."' ";
		}
		else	//none checked as process
		{
			$noneCheckedProcess=" and documentlist.transdate between '".$datefrom."' and '".$dateto."' ";
			
		}

	if ($_SESSION['GROUP']=='ADMIN' OR $_SESSION['GROUP']=='POWER ADMIN')
	{
										//		$query=select_info_multiple_key("select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name,fk_office_name from documentlist join security_user on documentlist.fk_security_username = security_user.security_username where fk_security_username like '%".$_POST['search_string']."%' or  document_id like '%".$_POST['search_string']."%'  or  document_title like '%".$_POST['search_string']."%'
										//		 or  fk_documenttype_id like '%".$_POST['search_string']."%' ORDER BY transdate desc");
											
											
											if (($_POST['vreceived']=='true') OR ($_POST['vreleased']=='true') OR ($_POST['vapproved']=='true'))
												{
													$filterDoctrackList= "and documentlist.document_id in (
										
																						select fk_documentlist_id from documentlist_tracker 
																						where office_name like '%' ".$received_b."  
																						 ".$released_b ."  ".$approved_b ."
																						) ";
														$filterDoctrackListUser=$filterDoctrackList;				
																		
												
												}												
												else
												{
													$filterDoctrackListUser= "and documentlist.document_id in (
										
																						select fk_documentlist_id from documentlist_tracker 
																						where (office_name like '%' 
																						)  and (received_val = 1 or released_val = 1 or forrelease_val = 1 ))";
												}
											
											
											if ($_POST['vreceived']=='true') 
											{
													$sql="select document_id,document_title,office.office_description,security_user.security_name,documentlist.transdate from documentlist join security_user on documentlist.fk_security_username = security_user.security_username
													join office on documentlist.fk_office_name_documentlist = office.office_name
													where documentlist.scrap<>1  
													 ".$mydoc_b."  ".$filterDoctrackList."
													 order by documentlist.transdate desc
													";
											}
											else
											{
													$sql="select document_id,document_title,office.office_description,security_user.security_name,documentlist.transdate from documentlist join security_user on documentlist.fk_security_username = security_user.security_username
													join office on documentlist.fk_office_name_documentlist = office.office_name
													where documentlist.scrap<>1  and documentlist.transdate between '".$datefrom."' and '".$dateto."'
													 ".$mydoc_b."  ".$filterDoctrackList."
													 order by documentlist.transdate desc
													";
											}
												

											
											
											
											
	}
	else
	{
		
											if (($_POST['vreceived']=='true') OR ($_POST['vreleased']=='true') OR ($_POST['vapproved']=='true'))
											{
												$filterDoctrackList= "and documentlist.document_id in (
									
																					select fk_documentlist_id from documentlist_tracker 
																					where office_name = '".$_SESSION['OFFICE']."' ".$received_b."  
																					 ".$released_b ."  ".$approved_b ."
																					) ";
													$filterDoctrackListUser=$filterDoctrackList;								
											
											}												
											else
											{
												$filterDoctrackListUser= "and documentlist.document_id in (
									
																					select fk_documentlist_id from documentlist_tracker 
																					where (office_name = '".$_SESSION['OFFICE']."' 
																					)  and (received_val = 1 or released_val = 1 or forrelease_val = 1 ))";
											}
											
											
											$sql="select document_id, document_title, office.office_description, security_user.security_name, documentlist.transdate from documentlist join security_user on documentlist.fk_security_username = security_user.security_username
									join office on documentlist.fk_office_name_documentlist = office.office_name
									where documentlist.scrap<>1  ".$noneCheckedProcess."
									 ".$mydoc_b."  ".$filterDoctrackListUser."
									  order by documentlist.transdate desc
									";
	}
//	echo $sql;
//	die(); 
//    echo $sql;<div style="text-align: center"><div style="text-align: center"></div></div>
//    die();
    //echo "select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name from documentlist join security_user on documentlist.fk_security_username = security_user.security_username WHERE document_id LIKE '%".$_POST['search_string']."%' OR document_title LIKE '%".$_POST['search_string']."%' OR security_name LIKE '%".$_POST['search_string']."%'    ORDER BY transdate desc";
	$result=mysqli_query($con,$sql);
//	echo $sql;
//	die();
//$rowcolor="blue";
$counterA=1;
$resultArray=array();
	while ($resultSet=mysqli_fetch_array($result))
	{
			
//	    if ($rowcolor=="blue")
//	    {
//	        echo '<tr id="'.$resultSet["document_id"].'" class="usercolor" onClick="addRowHandlers();">';
//	        // echo '<tr id="id" onclick="function(\'string\',\'string\')">';
//	        $rowcolor="notblue";
//	    }
//	    else
//	    {
//	        echo '<tr id="'.$resultSet["document_id"].'" class="usercolor1" onClick="addRowHandlers();">';
//	        // echo "<tr  id='".$var["SECURITY_NAME"]."' bgcolor='#2CC1F7'> <td>";
//	        $rowcolor="blue";
//	    }
//				echo "<td>".$counterA."</td>";
//	    	echo "<td>".$resultSet['document_id']."</td>";
//		    echo "<td>".$resultSet['document_title']."</td>";
//		    echo "<td>".$resultSet['office_description']."</td>";
//		    echo "<td>".$resultSet['security_name']."</td>";
//		    echo "<td>".$resultSet['transdate']."</td>";
//		    
//		    echo "</tr>";
		    
//		    $counterA++;
		    
		    array_push($resultArray, array("no"=>"<span class='no'>".$counterA."</span>","barcode"=>"<span class='barcode'>".$resultSet['document_id']."</span>","title"=>"<span class='title'>".$resultSet['document_title']."</span>","office"=>"<span class='office'>".$resultSet['office_description']."</span>","owner"=>"<span class='owner'>".$resultSet['security_name']."</span>","date"=>"<span class='date'>".date_format(date_create($resultSet['transdate']), 'F d, Y')."</span>"));
		    
		    $counterA++;
		    
		    
	 /*   echo "<td style='width:80px;'>";
	    echo $var["document_id"];
	    echo "</td><td>";
	    echo $var["document_title"];
	    echo "</td><td>";
	    echo $var["security_name"];
	    echo "</td><td>";
	    echo $var["transdate"];
	    echo "</td>";*/


}
	echo json_encode($resultArray);
		
	die();

	function SearchFilter($document_id)
	{
		global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    $sql="select ";
    
    
    
    
    	
	}




?>

