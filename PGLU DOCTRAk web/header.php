<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:index.php');
}

?>


    
<div class="header">

	<div class="header1">
    
    	<div class="headerline">
    
    	<div class="headerbanner">
        
        		<a href="<?php echo $PROJECT_ROOT."index.php"; ?>"><img <?php 
                        $printme="src=".$PROJECT_ROOT."images/home/doctraklogo2.png"; 
                        echo $printme;
                        ?> 
                                width="125" height="120" alt="PGLU" title="PGLU" align="left" /><h2>
				<?php
						
						echo $_SESSION['Title']. "<span style='font-size:12px;'>&nbsp;" .$_SESSION['Version'];
						echo "</span>";
				?>
				
				</h2><p>Management Information Systems</p></a>
        
        </div>

		<div class="menugroup">

        <div id="menu">

            <ul class="menu">
        <li><a href="<?php echo $PROJECT_ROOT."home.php"; ?>" class="parent"><span>HOME</span></a></li>
        <li><a href="#" class="parent"><span>DOCUMENT</span></a>
        	<ul>
                <li><a href="<?php echo $PROJECT_ROOT."procedures/home/document/newdoc.php"; ?>"><span>NEW DOCUMENT</span></a></li>
                <li><a href="<?php echo $PROJECT_ROOT."procedures/home/document/receiveddoc.php"; ?>"><span>RECEIVED DOCUMENT</span></a></li>
                <li><a href="<?php echo $PROJECT_ROOT."procedures/home/document/releasedoc.php"; ?>"><span>RELEASE DOCUMENT</span></a></li>
                <li><a href="<?php echo $PROJECT_ROOT."procedures/home/document/forreleasedoc.php"; ?>"><span>FOR RELEASE</span></a></li>
                <li><span><hr></span></li>
                <li><a href="<?php echo $PROJECT_ROOT."procedures/home/document/rollback.php"; ?>"><span>ROLLBACK</span></a></li>
                <li><span><hr></span></li>
                <li><a href="<?php echo $PROJECT_ROOT."procedures/home/document/documenttracker.php"; ?>"><span>DOCUMENT TRACKER</span></a></li>
                <li><a href="<?php echo $PROJECT_ROOT."procedures/home/document/documentprocessing.php"; ?>"><span>PROCESSING</span></a></li>
                <li><a href="<?php echo $PROJECT_ROOT."procedures/home/document/documenttrail.php"; ?>"><span>DOCUMENT TRAIL</span></a></li>
               
               
            </ul>
        </li>
        <li><a href="#"><span>REPORT</span></a>
        	<ul style="width:265px;">
                <li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/dochistory.php"; ?>"><span>DOCUMENT HISTORY</span></a></li>
		<li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/doconprocess.php"; ?>"><span>DOCUMENT ON PROCESS</span></a></li>
                <li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/doconprocesspersignatory.php"; ?>"><span>DOCUMENT ON PROCESS PER SIGNATORY</span></a></li>
                <li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/docpersignatory.php"; ?>"><span>DOCUMENTS PER SIGNATORY</span></a></li>
            </ul>
        </li>

    <?php
        if($_SESSION['GROUP']=='POWER ADMIN')
            {

                echo '<li><a href="#"><span>MAINTENANCE</span></a>
                <ul>
                        <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/documenttype.php"><span>DOCUMENT TYPE</span></a></li>
                        <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/office.php"><span>OFFICES</span></a></li>
                        <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/flowtemplate.php"><span>FLOW TEMPLATE</span></a></li>
                        <li><a href="#" class="parent"><span>SECURITY</span></a>
               <ul>
                                <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/users.php"><span>USERS</span></a></li>
                                <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/group.php"><span>GROUP</span></a></li>
                                <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/audittrail.php"><span>AUDIT TRAIL</span></a></li>
                            </ul>
                        </li>
                </ul>
                </li>';
            }
    ?>

        <li><a href="<?php echo $PROJECT_ROOT."procedures/home/userinfo/userinfo.php"; ?>"><span>USER INFO</span></a></li>
        <li><a href="<?php echo $PROJECT_ROOT."about.php"; ?>"><span>ABOUT</span></a></li>
        <li><a href="<?php echo $PROJECT_ROOT."procedures/home/logout.php"; ?>"><span>LOGOUT</span></a></li>
    
    </ul>
    </div>
		
        
        <div class="admin">
        	
        			<?php
        
	         require_once("procedures/connection.php");
	         global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
                 
	         $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
	         $query="SELECT mail_id FROM mail WHERE FK_SECURITY_USERNAME_OWNER = '".$_SESSION['usr']."' AND MAILSTATUS=0";
	         $result=mysqli_query($con,$query)or die(mysqli_error($con));
	         while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	         {

		         echo '<a href="'.$PROJECT_ROOT.'/procedures/home/userinfo/inbox.php"><img src="'.$PROJECT_ROOT.'images/home/icon/testmail.gif" width="30" height="20" align="left" /></a>&nbsp';
                         break;
	         }
           echo "Hi, ".$_SESSION['security_name']." of ".$_SESSION['OFFICE']."";

           mysqli_free_result($result);
           ?>
        </div>
            
         </div>   
        
        
        </div>
    
    </div>

</div>
