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
<div class="menubg">
        
            	<div class="menugroup">
                    
                            <ul class="nav navbar-nav">
                                <li><a href="<?php echo $PROJECT_ROOT."home.php"; ?>">Home</a></li>
                                <li role="presentation" class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                        Document <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/newdoc.php'; ?>">New Document</a></li>
                                        <li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/receiveddoc.php'; ?>"><span>Receive Document</span></a></li>
                                        <li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/releasedoc.php'; ?>"><span>Release Document</span></a></li>
                                        <li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/forreleasedoc.php'; ?>"><span>For Release</span></a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/rollback.php'; ?>"><span>Rollback</span></a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/documenttracker.php'; ?>"><span>Document Tracker</span></a></li>
                                        <li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/documentprocessing.php'; ?>"><span>Processing</span></a></li>
                                        <li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/documenttrail.php'; ?>"><span>Document Trail</span></a></li>
                                    </ul>
                                </li>
                                <li role="presentation" class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                        Report <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/dochistory.php"; ?>"><span>Document History</span></a></li>
                                        <li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/doconprocess.php"; ?>"><span>Document on Process</span></a></li>
                                        <li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/doconprocesspersignatory.php"; ?>"><span>Document on Process per Signatory</span></a></li>
                                        <li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/docpersignatory.php"; ?>"><span>Documents per Signatory</span></a></li>
                                    </ul>
                                    
                                </li>
                                <?php
                                if($_SESSION['GROUP']=='POWER ADMIN')
                                {
                                        echo '<li role="presentation" class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                        Maintenance <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                                <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/documenttype.php"><span>Document Type</span></a></li>
                                                <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/office.php"><span>Office</span></a></li>
                                                <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/flowtemplate.php"><span>Flow Template</span></a></li>
                                                <li class="divider"></li>
                                                <li class="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Security</span></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/users.php"><span>Users</span></a></li>
                                                        <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/group.php"><span>Group</span></a></li>
                                                        <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/audittrail.php"><span>Audit Trail</span></a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>';
                                }
                                        ?>
                                
                                <li>
                                    <a href="<?php echo $PROJECT_ROOT."about.php"; ?>"><span>About</span></a>
                                </li>
                 
                              </ul>
                    
		
        
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
                 
                 
           echo "Hi, <a href=".$PROJECT_ROOT."procedures/home/userinfo/userinfo.php>".$_SESSION['security_name']."</a> of ".$_SESSION['OFFICE']."";
           echo "<div class='logout'>";
           echo "<a href=".$PROJECT_ROOT."procedures/home/logout.php>Logout</a>";
           echo '</div>';
           mysqli_free_result($result);
           ?>
           
        </div>
            
        </div>
        </div>

	<div class="header1">
    	
                <div class="headerline">
                <div class="row">
                <div class="col-xs-4 col-md-4">
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
                </div>
         <div class="col-xs-8 col-md-8">
			  
        </div>
    </div>
        
        </div>
    
    </div>

</div>
