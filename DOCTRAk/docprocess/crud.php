<?php
	
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
	  $_SESSION['in'] ="start";
	 header('Location:../index.php');
	}
	
	require_once('../procedures/connection.php');
	
	switch($_POST['module'])
	{
		case "renderDocProcessList":
			renderDocProcessList();
			break;
		
		case "renderProcessListInfo":
			renderProcessListInfo();
		break;
		
		case "updateDocProcess":
			updateDocProcess();
			break;
		
	}
	
	
	
	
	function renderDocProcessList()
	{
		global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    $sql="select distinct document_id,document_title,fk_office_name_documentlist from documentlist join documentlist_tracker on documentlist.document_id = documentlist_tracker.fk_documentlist_id 
		 where docprocess='others' ";
		
		$query=mysqli_query($con,$sql)or die(mysqli_error($con));
		$resultArray=array();
		while ($resultSet=mysqli_fetch_array($query))
		{
			array_push($resultArray, array("barcode"=>$resultSet['document_id'],"title"=>$resultSet['document_title'], "office"=>$resultSet['fk_office_name_documentlist']));
		}
			echo json_encode($resultArray);
	}
	
	
	function renderProcessListInfo()
	{
		global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    $sql="select document_id, document_title, fk_office_name_documentlist, template_name from documentlist join document_template on documentlist.fk_template_id = document_template.template_id where document_id ='".$_POST['docID']."' ";
    
    $query=mysqli_query($con,$sql)or die(mysqli_error($con));
    $resultSet=mysqli_fetch_array($query);
		echo '<div class="row list-group-item list-group-item-success">
		
			
			
			<div class="col-xs-4">
				Barcode:&nbsp;<b style="color:#00556F;">'.$resultSet['document_id'].'</b>
			</div>
			
			<div class="col-xs-8">
				Title:&nbsp;<b style="color:#00556F;">'.$resultSet['document_title'].'</b>
			</div>
			
	
		
		
			<div class="col-xs-4">
				Office:&nbsp;<b style="color:#00556F;">'.$resultSet['fk_office_name_documentlist'].'</b>
			</div>
			
			<div class="col-xs-8">
				Template:&nbsp;<b style="color:#00556F;">'.$resultSet['template_name'].'</b>
			</div>
			</div>
		
		';
		
		$sql="select docprocess from template_list group by docprocess order by docprocess asc";
		$resultSetDocprocess=mysqli_query($con,$sql)or die(mysqli_error($con));
		//$resultSetDocprocess=mysqli_fetch_array($query,MYSQLI_ASSOC);
		
		$sql="SELECT documentlist_tracker_id,sortorder,docprocess,`office`.`office_description` as officename FROM `t-doctrak`.documentlist_tracker join office on documentlist_tracker.office_name = office.office_name where fk_documentlist_id = '".$resultSet['document_id']."' order by sortorder asc";
		$resultSet=mysqli_fetch_array($query);
		
			echo '<div class="row list-group-item list-group-item-success">';
		 	$query=mysqli_query($con,$sql)or die(mysqli_error($con));
//		 	print_r($resultSetDocprocess,"docprocess"=>'others');
//		 	die();
		// 	array_push($resultSetDocprocess,array('docprocess'=>'others'));
			while ($resultSet=mysqli_fetch_array($query))
			{
				
			 	echo '<div class="col-xs-1">'.$resultSet['sortorder'].'</div>';
			 	echo '<div class="col-xs-7">'.$resultSet['officename'].'</div>';
			 	echo '<div class="col-xs-4">
			 			<select name="'.$resultSet['documentlist_tracker_id'].'" class="form-control"  onchange=sendData($(this).attr("name"),$(this).val()) ">';
			 			echo "<option value='others' selected='selected'>others</option>";
			 	foreach( $resultSetDocprocess as $processList)
			 	{
			 		//echo $processList['docprocess'];
//			 		if ($resultSet['docprocess']=='others')
//			 		{
//			 			echo "<option value='".$processList['docprocess']."' >xxxx</option>";
//			 		}
			 		if ($resultSet['docprocess']==$processList['docprocess'])
			 		{
			 			echo "<option value='".$processList['docprocess']."' selected='selected'>".$processList['docprocess']."</option>";
			 		}
			 		else
			 		{
			 			echo "<option value='".$processList['docprocess']."' >".$processList['docprocess']."</option>";
			 		}
			 	}
			 	
			 	echo '</select></div>';
			}
			
			echo '</div>';
}




function updateDocProcess()
{
	global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
  	
  	  
    $sql="update documentlist_tracker set docprocess = ? where documentlist_tracker_id = ?";
    $stmt=mysqli_prepare($con,$sql);
    $bind=mysqli_stmt_bind_param($stmt,"si",$_POST['processvalue'],$_POST['trackerid']);
    if ($exec=mysqli_stmt_execute($stmt))
    {
    	echo "success";
    }
    else
    {
    	echo mysqli_stmt_error($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
	
}

?>