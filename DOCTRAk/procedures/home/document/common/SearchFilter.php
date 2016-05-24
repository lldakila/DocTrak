<?php
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd']))
    {
        $_SESSION['in'] ="start";
        header('Location:../../../../index.php');
    }


    function SortOrder($document_id,$source) {
        global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
        //require_once("../../../connection.php");
       //$_SESSION['keytracker']='';
			$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
	    $query="SELECT FORRELEASE_VAL,RELEASED_VAL,RECEIVED_VAL,OFFICE_NAME, DOCUMENTLIST_TRACKER_ID, FK_DOCUMENTLIST_ID,SORTORDER FROM documentlist_tracker WHERE FK_DOCUMENTLIST_ID = '".$document_id."' ORDER BY SORTORDER ASC";
       $result=mysqli_query($con,$query);     
        $counterX=0;

        switch ($source)

        {

            case 'receive':

										while ($rows=mysqli_fetch_array($result,MYSQLI_BOTH))
                     {

                    if ($rows['OFFICE_NAME']==$_SESSION['OFFICE']){

                        if ($rows['SORTORDER']==1)
                        {
                                if ($rows['RECEIVED_VAL']!=1)
                                {
                                    $_SESSION['keytracker']=$rows['DOCUMENTLIST_TRACKER_ID'];
                                    return true;
                                }

                        }
                        else
                        {

                            if ($releasedvalPrevValue==1 AND $rows['RECEIVED_VAL']!=1)
                            {
                                $_SESSION['keytracker']=$rows['DOCUMENTLIST_TRACKER_ID'];
                                //$_SESSION['keytracker']=$rows['RECEIVED_VAL'];
                                return true;
                            }

                        }
													
																			
                    }
                    		$releasedvalPrevValue=$rows['RELEASED_VAL'];		
                        $counterX=$counterX+1;
                    }
                  
                    return false;
              


            case 'release':

                while ($rows=mysqli_fetch_array($result,MYSQLI_BOTH))
								{
                    if ($rows['OFFICE_NAME']==$_SESSION['OFFICE'])
                        {
                                     
                            if (($rows['RELEASED_VAL']!=1) AND ($rows['RECEIVED_VAL']==1))
                            {
                                $_SESSION['keytracker']=$rows['DOCUMENTLIST_TRACKER_ID'];
                                return true;
                            }

                        } 
										
                    }
                return false;
                

            case 'forrelease':

                while ($rows=mysqli_fetch_array($result,MYSQLI_BOTH))
								{

                    if ($rows['OFFICE_NAME']==$_SESSION['OFFICE'])
                        {

                        if ($rows['SORTORDER']==1)
                        {
                            if ($rows['FORRELEASE_VAL']!=1 AND $rows['RELEASED_VAL']!=1 AND $rows['RECEIVED_VAL']==1)
                            {
                                $_SESSION['keytracker']=$rows['DOCUMENTLIST_TRACKER_ID'];
                                return true;
                            }

                        }
                        else
                        {

                            if ($rows['RECEIVED_VAL']==1 AND $rows['FORRELEASE_VAL']!=1 AND $rows['RELEASED_VAL']!=1)
                            {
                                $_SESSION['keytracker']=$rows['DOCUMENTLIST_TRACKER_ID'];
                                //$_SESSION['keytracker']=$rows['RECEIVED_VAL'];
                                return true;
                            }

                        }


                    }
                    $counterX=$counterX+1;
                }
                return false;
                break;


            case 'processing':

               while ($rows=mysqli_fetch_array($result,MYSQLI_BOTH))
								{
	                if ($_SESSION['GROUP']=='ADMIN' OR $_SESSION['GROUP']=='POWER ADMIN')
	                {
			                if ($rows['RECEIVED_VAL']==1 AND $rows['RELEASED_VAL']!=1)
			                {
				                $_SESSION['keytracker']=$rows['DOCUMENTLIST_TRACKER_ID'];
				                return true;
			                }

	                }

	                else
	                {
		                if ($rows['OFFICE_NAME']==$_SESSION['OFFICE'])
		                {
			                if ($rows['RECEIVED_VAL']==1 AND $rows['RELEASED_VAL']!=1)
			                {
				                $_SESSION['keytracker']=$rows['DOCUMENTLIST_TRACKER_ID'];
				                return true;
			                }

		                }
	                }
                   }
                return false;
               
                
                
            case 'DocumentsOnOffice':
               while ($rows=mysqli_fetch_array($result,MYSQLI_BOTH))
								{
//                    if ($_SESSION['GROUP']=='ADMIN' OR $_SESSION['GROUP']=='POWER ADMIN')
//                    {
//                        if ($rows['RELEASED_VAL']!=1 AND $rows['RECEIVED_VAL']==1)
//                            {
//                                $_SESSION['keytracker']=$rows['DOCUMENTLIST_TRACKER_ID'];
//                                return true;
//                            }
//                    }
//                    else
//                    {
                        if ($rows['OFFICE_NAME']==$_SESSION['OFFICE'])
                        {
                            if ($rows['RELEASED_VAL']!=1 AND $rows['RECEIVED_VAL']==1)
                            {
                                $_SESSION['keytracker']=$rows['DOCUMENTLIST_TRACKER_ID'];
                                return true;
                            }
                        
                        } 
//                    }
                        
                   
                }
                
                return false;
              
            

       // }
            case 'rollback':
                
               while ($rows=mysqli_fetch_array($result,MYSQLI_BOTH))
								{
                    if ( $_SESSION['GROUP']=='POWER ADMIN')
                    {
                        if ($rows['RECEIVED_VAL']==1 AND $rows['RELEASED_VAL']==1)
                        {
                            return true;
                        }
                    }
                    else
                    {
                       // if ($rows['OFFICE_NAME']==$_SESSION['OFFICE'])
                        //{
                    
                       
                            if ($rows['RECEIVED_VAL']==1 AND $rows['RELEASED_VAL']==1)
                            {
                                return true;
                            }

                       // }
                    }
                }
                    
                
            return false;
            





    }
    }



?>




