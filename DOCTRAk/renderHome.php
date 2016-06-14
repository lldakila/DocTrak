<?php
//session_start();
//if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
//    header('Location:../../index.php');
//}
//

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
date_default_timezone_set($_SESSION['Timezone']);
    if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd']))
    {
        $_SESSION['in'] ="start";
        header('Location:index.php');
    }
    
     
    
    switch ($_POST['action'])
    {
        case 'All':
            renderForm('All');
            break;
        
        case 'Pending':
            renderForm('Pending');
            break;
        
        case 'Approved':
            renderForm('Approved');
            break;
	
	case 'Processing':
            renderForm('Processing');
            break;
        
    }
    


function renderForm($action)
{
    
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    require_once('procedures/connection.php');
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);  
    global $dateReceived;
    global $dateReleased;
    global $dateForrelease;
    global $docStatus;
    global $docRemarks;
    global $docLocation;
    
//    echo ' <table id="HOMEdata" class="table table-bordered">
//            <tr>
//                <th>DOC ID</th>
//                <th>TITLE</th>
//                <th>TYPE</th>
//                <th>ORIGINATING OFFICE</th> 
//                
//                <th>DATE RECEIVE</th>
//                <th>FOR RELEASE DATE</th>
//                <th>DATE RELEASE</th>
//                <th>STATUS</th>
//                <th>REMARKS</th>
//          </tr> 
//            ';
				if ($_POST['retrieveAll']=='true')
				{
					$limitOn="limit 100";
				}
				else
				{
					$limitOn="";
				}
		

         if ($_SESSION['GROUP']=='ADMIN' OR $_SESSION['GROUP']=='POWER ADMIN')
            {
                $SQLquery="select document_id,document_title,fk_documenttype_id,priority,fk_office_name_documentlist,
                office_name,received_date,forrelease_date,received_comment,released_comment,transdate from documentlist join security_user 
                on documentlist.fk_security_username = security_user.security_username join document_type
                on documentlist.fk_documenttype_id = document_type.documenttype_id  join documentlist_tracker
                on documentlist.document_id=documentlist_tracker.fk_documentlist_id WHERE scrap=0 and complete=0 group by document_id order by transdate desc ".$limitOn;
            }
        else
            {
                $SQLquery="select document_id,document_title,fk_documenttype_id,priority,fk_office_name_documentlist,
                office_name,received_date,forrelease_date,received_comment,released_comment,transdate from documentlist join security_user 
                on documentlist.fk_security_username = security_user.security_username join document_type
                on documentlist.fk_documenttype_id = document_type.documenttype_id  join documentlist_tracker
                on documentlist.document_id=documentlist_tracker.fk_documentlist_id WHERE scrap=0 and complete=0 
                and fk_office_name_documentlist = '".$_SESSION['OFFICE']."' group by document_id order by transdate desc ".$limitOn;
            }
	  
                $result=mysqli_query($con,$SQLquery)or die(mysqli_error($con));
//                $rowcolor='';
                $resultArray=array();
                
                while ($row = mysqli_fetch_assoc($result))
                    {
                        if (SummaryFilter($row['document_id'],$action))
                            {
                            	   
                            	   
                            	   $date = date_create($row['transdate']);
                            	   
                            	  
                								array_push($resultArray, array("barcode"=>$row['document_id'],"title"=>$row['document_title'],"type"=>$row['fk_documenttype_id'],"office"=>$row['fk_office_name_documentlist'],"transdate"=>date_format($date,'m-d-Y'),"officeloc"=>$docLocation,"received"=>$dateReceived,"forrelease"=>$dateForrelease,"release"=>$dateReleased,"status"=>$docStatus,"remark"=>$docRemarks));
            
         
//                                if ($rowcolor=="blue")
//                                    {
//                                        echo '<tr class="bgcolor1" onClick="addRowHandlers();"><td>';
//                                        $rowcolor="notblue";
//                                    }
//                                    else
//                                    {
//                                        echo '<tr class="bgcolor2" onClick="addRowHandlers();"><td>';
//                                        $rowcolor="blue";
//                                    }

//                                       echo $row['document_id'];
//                                       echo "</td><td>";
//                                       echo $row['document_title'];
//                                       echo "</td><td>";
//                                       echo $row['fk_documenttype_id'];
//                                       echo "</td><td>";
//                                       echo $row['fk_office_name_documentlist'];
//                                       echo "</td><td>";
//                                       echo $docLocation;
//                                       echo "</td><td>";
//                                       echo $dateReceived;
//                                       echo "</td><td>";
//                                        echo $dateForrelease;
//                                       echo "</td><td>";
//                                       echo $dateReleased;
//                                       echo "</td><td>";
//                                       echo $docStatus;
//                                       echo "</td><td>";
//                                       echo $docRemarks;
//                                       echo "</td></tr>";
                                       
                                       
                                       
                                       

                         }
                    }
//            break;
//    }
//			echo '</table>';
			echo json_encode($resultArray);
}


function SummaryFilter($docid,$module)
      {
        global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
        $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
        global $dateReceived;
        global $dateReleased;
        global $dateForrelease;
        global $docStatus;
        global $docRemarks;
        global $docLocation;

        
        switch ($module)
        {
          
            case 'All':
              
//                    $SQLquery='SELECT received_date,released_date,forrelease_date,office_name,
//                            released_comment,forrelease_comment,received_comment
//                            FROM documentlist_tracker WHERE fk_documentlist_id = "'.$docid.'"  AND
//                            RECEIVED_DATE IS NOT null ORDER BY sortorder DESC LIMIT 1';

              	
                    $SQLquery='SELECT received_date,released_date,forrelease_date,office_name,
                            released_comment,forrelease_comment,received_comment
                            FROM documentlist_tracker WHERE fk_documentlist_id = "'.$docid.'"   
                            
                            ORDER BY sortorder DESC LIMIT 1';
              
//       echo $SQLquery;
//       die();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
                $result=mysqli_query($con,$SQLquery)or die(mysqli_error($con));
                while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                {
                    $dateReceived=$row['received_date'];
                    $dateReleased=$row['released_date'];
                    $dateForrelease=$row['forrelease_date'];
                    $docLocation=$row['office_name'];
                    
                    if ((($row['forrelease_date']!= NULL) OR ($row['released_date']!=NULL) OR ($row['received_date']!=NULL)))
                    {
                    	 
		                    if (($row['released_date'] != NULL)AND($row['received_date']!= NULL ))
		                    {
		                        $docStatus='Released';
		                        $docRemarks=$row['released_comment'];
		                        return true;
		                    }
		                    elseif (($row['forrelease_date']!= NULL) AND ($row['released_date']==NULL)) 
		                    {
		                        $docStatus='For Pickup';
		                        $docRemarks=$row['forrelease_comment'];
		                        return true;
		                    }
		                    elseif (($row['received_date']!= NULL) AND ($row['released_date']== NULL))
		                    {
		                        $docStatus='For Signature';
		                        $docRemarks=$row['received_comment'];
		                        return true;
		                    }
                   
                		}
                		
                		elseif ((($row['forrelease_date']== NULL) AND ($row['released_date']==NULL) AND ($row['received_date']==NULL)))
                		{
                	 			$docStatus='For Processing';
		             	      $docRemarks='';
		                    return true;
                		}
                }
                break;
                
            case 'Pending':
                $SQLquery='SELECT received_date,released_date,forrelease_date,office_name,
                            released_comment,forrelease_comment,received_comment
                            FROM documentlist_tracker WHERE fk_documentlist_id = "'.$docid.'"  AND
                            received_date IS NOT null AND  released_date IS  NULL
                            AND forrelease_date IS  NULL
                            ORDER BY sortorder DESC LIMIT 1';
                
                $result=mysqli_query($con,$SQLquery)or die(mysqli_error($con));
                while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                {
                    $dateReceived=$row['received_date'];
                    $dateReleased=$row['released_date'];
                    $dateForrelease=$row['forrelease_date'];
                    $docLocation=$row['office_name'];
                    
//                    if ($row['released_date']<>'')
//                    {
//                        $docStatus='Released';
//                        $docRemarks=$row['released_comment'];
//                        return true;
//                    }
//                    elseif (($row['forrelease_date']<>'') AND ($row['released_date']=='')) 
//                    {
//                        $docStatus='For Pickup';
//                        $docRemarks=$row['forrelease_comment'];
//                        return true;
//                    }
//                    else
//                    {
                        $docStatus='On Process';
                        $docRemarks=$row['received_comment'];
                        return true;
//                    }
//                   
                }
                break;
            
            case 'Approved':
                $SQLquery='SELECT received_date,released_date,forrelease_date,office_name,
                            released_comment,forrelease_comment,received_comment
                            FROM documentlist_tracker WHERE fk_documentlist_id = "'.$docid.'"  AND
                            received_date IS NOT null AND  released_date IS NULL
                            AND forrelease_date IS NOT NULL
                            ORDER BY sortorder DESC LIMIT 1';
                
                $result=mysqli_query($con,$SQLquery)or die(mysqli_error($con));
                while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                {
                    $dateReceived=$row['received_date'];
                    $dateReleased=$row['released_date'];
                    $dateForrelease=$row['forrelease_date'];
                    $docLocation=$row['office_name'];
                    
//                    if ($row['released_date']<>'')
//                    {
//                        $docStatus='Released';
//                        $docRemarks=$row['released_comment'];
//                        return true;
//                    }
//                    elseif (($row['forrelease_date']<>'') AND ($row['released_date']=='')) 
//                    {
                        $docStatus='For Pickup';
                        $docRemarks=$row['forrelease_comment'];
                        return true;
//                    }
//                    else
//                    {
//                        $docStatus='On Process';
//                        $docRemarks=$row['received_comment'];
//                        return true;
//                    }
//                   
                }
                break;
		
		case 'Processing':
                $SQLquery='SELECT received_date,released_date,forrelease_date,office_name,
                            released_comment,forrelease_comment,received_comment
                            FROM documentlist_tracker JOIN documentlist on documentlist_tracker.fk_documentlist_id
			    = documentlist.document_id 
			    
			    WHERE fk_documentlist_id = "'.$docid.'"  AND
                            received_date IS NOT null AND  released_date IS NULL
                            ORDER BY sortorder DESC LIMIT 1';
//                echo $SQLquery;
//		die();
                $result=mysqli_query($con,$SQLquery)or die(mysqli_error($con));
                while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                {
                    $dateReceived=$row['received_date'];
                    $dateReleased=$row['released_date'];
                    $dateForrelease=$row['forrelease_date'];
                    $docLocation=$row['office_name'];
                    
//                    if ($row['released_date']<>'')
//                    {
//                        $docStatus='Released';
//                        $docRemarks=$row['released_comment'];
//                        return true;
//                    }
//                    elseif (($row['forrelease_date']<>'') AND ($row['released_date']=='')) 
//                    {
                        $docStatus='For Pickup';
                        $docRemarks=$row['forrelease_comment'];
                        return true;
//                    }
//                    else
//                    {
//                        $docStatus='On Process';
//                        $docRemarks=$row['received_comment'];
//                        return true;
//                    }
//                   
                }
                break;
        }
      }