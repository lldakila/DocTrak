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

		$datefrom=date_format($datefrom, 'Y-m-d');	
		$dateto=date_format($dateto, 'Y-m-d');

//	if ($_SESSION['GROUP']=='ADMIN' OR $_SESSION['GROUP']=='POWER ADMIN')
//	{
//		
		$received="select count(*) as noOfReceivedDocs from documentlist_tracker where received_val=1 and  received_by='".$_SESSION['security_name']."' and received_date between '".$datefrom."' and '".$dateto."' ";
		$released="select count(*) as noOfReceivedDocs from documentlist_tracker where released_val=1 and released_by='".$_SESSION['security_name']."' and released_date between '".$datefrom."' and '".$dateto."'";
		$created="select count(*) as noOfCreatedDocs from documentlist join security_user on documentlist.fk_security_username =  security_user.security_username where  security_name='".$_SESSION['security_name']."' and scrap =0 and transdate between '".$datefrom."' and '".$dateto."' ";
		$scraped="select count(*) as noOfScrappedDocs from documentlist join security_user on documentlist.fk_security_username =  security_user.security_username  where  scrap=1 and security_name='".$_SESSION['security_name']."' and transdate between '".$datefrom."' and '".$dateto."' ";
		
		$result=mysqli_query($con,$received);
		$resultSetreceived=mysqli_fetch_array($result);
		$result=mysqli_query($con,$released);
		$resultSetreleased=mysqli_fetch_array($result);
		$result=mysqli_query($con,$created);
		$resultSetcreated=mysqli_fetch_array($result);
		$result=mysqli_query($con,$scraped);
		$resultSetscraped=mysqli_fetch_array($result);
		
		
		echo '
		<div class="col-md-4">
                        										
                        						
		<div class="panel panel-success"> <div class="panel-heading">User - Summary</div>
		<p >
			Received Documents - '.$resultSetreceived['noOfReceivedDocs'].'<br>
			Released Documents - '.$resultSetreceived['noOfReceivedDocs'].'<br>
			Created Documents - '.$resultSetcreated['noOfCreatedDocs'].'<br>
			Scrapped Documents - '.$resultSetscraped['noOfScrappedDocs'].'<br>
		
		</p></div></div>';
		
		//////////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////
		
		
		if ($_POST['vofficeFilter']!=null)
		{
				///////////////////////////////////
				//THIS IS ADMIN ACOOUNT//////////	
				///////////////////////////////////
				$DocprocessReceived="select docprocess,count(docprocess) as NoOfOccurance from documentlist_tracker where received_val=1 and received_by IN (select security_name from security_user where fk_office_name = '".$_POST['vofficeFilter']."' ) and received_date between '".$datefrom."' and '".$dateto."' group by docprocess";
				$DocprocessReleased="select docprocess,count(docprocess) as NoOfOccurance from documentlist_tracker where released_val=1 and released_by IN (select security_name from security_user where fk_office_name = '".$_POST['vofficeFilter']."' ) and released_date between '".$datefrom."' and '".$dateto."' group by docprocess";
		}
		else
		{
				///////////////////////////////////
				//THIS IS USER ACOOUNT//////////	
				///////////////////////////////////
				$DocprocessReceived="select docprocess,count(docprocess) as NoOfOccurance from documentlist_tracker where received_val=1 and received_by='".$_SESSION['security_name']."' and received_date between '".$datefrom."' and '".$dateto."' group by docprocess";
				$DocprocessReleased="select docprocess,count(docprocess) as NoOfOccurance from documentlist_tracker where released_val=1 and released_by='".$_SESSION['security_name']."' and released_date between '".$datefrom."' and '".$dateto."' group by docprocess";
		}
//		echo $DocprocessReceived;
//		die();
		
		
		$resultSetreleased=mysqli_fetch_array($result);
		
		
		echo '
		<div class="col-md-4">
		<div class="panel panel-success"> <div class="panel-heading">';
		if (($_SESSION['GROUP']=='POWER ADMIN')or ($_SESSION['GROUP']=='ADMIN'))
				{
					echo 'Office - '.$_POST['vofficeFilter'].'</div>
					<p>';
				}
		else
			{
					echo 'Documents Processed</div>
					<p>';
			}
		echo '<b>Received Document</b>';
		echo '<table class="table table-bordered table-condensed table-hover"><th>Document</th><th>Count</th>';
		$result=mysqli_query($con,$DocprocessReceived);	
		while ($resultSetreceived=mysqli_fetch_array($result))
		{
			echo '<tr><td>';
			echo $resultSetreceived['docprocess'];
			echo '</td><td>';
			echo $resultSetreceived['NoOfOccurance'];	
			echo '</td></tr>';
		}
		echo '</table>';
		
		echo '<b>Released Document</b>';
		echo '<table class="table table-bordered table-condensed table-hover"><th>Document</th><th>Count</th>';
		$result=mysqli_query($con,$DocprocessReleased);
		while ($resultSetreleased=mysqli_fetch_array($result))
		{
			echo '<tr><td>';
			echo $resultSetreleased['docprocess'];
			echo '</td><td>';
			echo $resultSetreleased['NoOfOccurance'];	
			echo '</td></tr>';
		}
		echo '</table>';
		//echo $DocprocessReceived;
		echo '</p></div></div>';
		
		
		//////////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////
		$Officereceived="select count(*) as noOfReceivedDocs from documentlist_tracker where received_val=1 and  received_by in (select security_name from security_user where fk_office_name = '".$_SESSION['OFFICE']."') and received_date between '".$datefrom."' and '".$dateto."' ";
		$Officereleased="select count(*) as noOfReceivedDocs from documentlist_tracker  where released_val=1 and released_by in (select security_name from security_user where fk_office_name = '".$_SESSION['OFFICE']."')  and released_date between '".$datefrom."' and '".$dateto."'";
		$Officecreated="select count(*) as noOfCreatedDocs from documentlist join security_user on documentlist.fk_security_username =  security_user.security_username  where    security_user.fk_office_name='".$_SESSION['OFFICE']."' and scrap =0 and transdate between '".$datefrom."' and '".$dateto."' ";
		$Officescraped="select count(*) as noOfScrappedDocs from documentlist join security_user on documentlist.fk_security_username =  security_user.security_username  where  security_user.fk_office_name='".$_SESSION['OFFICE']."' and scrap=1 and  transdate between '".$datefrom."' and '".$dateto."' ";
		
		
		
		$result=mysqli_query($con,$Officereceived);
		$OfficeResultSetreceived=mysqli_fetch_array($result);
		$result=mysqli_query($con,$Officereleased);
		$OfficeResultSetreleased=mysqli_fetch_array($result);
		$result=mysqli_query($con,$Officecreated);
		$OfficeResultSetcreated=mysqli_fetch_array($result);
		$result=mysqli_query($con,$Officescraped);
		$OfficeResultSetscraped=mysqli_fetch_array($result);
		
		
		echo '
		<div class="col-md-4">
		<div class="panel panel-success"> <div class="panel-heading">Office</div>
		<p >
			
			Received Documents - '.$OfficeResultSetreceived['noOfReceivedDocs'].'<br>
			Released Documents - '.$OfficeResultSetreleased['noOfReceivedDocs'].'<br>
			Created Documents - '.$OfficeResultSetcreated['noOfCreatedDocs'].'<br>
			Scrapped Documents - '.$OfficeResultSetscraped['noOfScrappedDocs'].'<br>
		
		
		</p></div></div>';


?>

