<div id="header">
			<div class="container">	
					<div class="row">
						<div class="col-xs-6 col-md-4 image">
							<a href="<?php echo $PROJECT_ROOT."index.php"; ?>"> <img <?php
                                $printme="src=".$PROJECT_ROOT."images/home/doctraklogo2.png";
                                echo $printme;
                                ?>
                                        width="80" height="70" alt="PGLU" title="DocTrak" align="left" />
								<h3>
									<?php

                        echo $_SESSION['HeaderTitle']. "<span style='font-size:12px;'>&nbsp; " .$_SESSION['Version'];
                        echo "</span>";
        				?>
								</h3><p>Provincial Government of La Union</p>
							</a>
						</div>

					  
						<div class="col-xs-6 col-md-8">
							<!-- <div class="navbarA">
								<ul class="nav nav-pills">
								  <li><a href="#">Home</a></li>
								  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Document<b class="caret"></b></a>
									<ul class="dropdown-menu">
									  <li><a href="#">New Document</a></li>
									</ul>
								  </li>
								  <li><a href="#">BAC</a></li>
								  <li><a href="#">Communication</a></li>
								  <li><a href="#">Report</a></li>
								  <li><a href="#">Maintenanace</a></li>
								  <li><a href="#">Help</a></li>
								</ul>
							</div> -->
							
							<nav class="navbar navbar-static-top marginBottom-0" id="navbar-inverse1" role="navigation">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								  
								</div>
								
								<div class="collapse navbar-collapse" id="navbar-collapse-1">
									<ul class="nav navbar-nav">
										
										<li><a href="<?php echo $PROJECT_ROOT."home.php"; ?>">Home</a></li>
										<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Document <b class="caret"></b></a>
											<ul class="dropdown-menu">
												<li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/newdoc.php'; ?>">Document</a></li>
												<li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/receiveddoc.php'; ?>">Receive Document</a></li>
												<li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/releasedoc.php'; ?>">Release Document</a></li>
												<li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/forreleasedoc.php'; ?>">For Release</a></li>
												<li class="divider"></li>
												<li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/documenttracker.php'; ?>">Document Tracker</a></li>
												<li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/documentprocessing.php'; ?>">Processing</a></li>
												<li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/documenttrail.php'; ?>">Document Trail</a></li>
												<li class="divider"></li>
												<li><a href="<?php echo $PROJECT_ROOT.'procedures/home/document/rollback.php'; ?>">Rollback</a></li>
											</ul>
										</li>
										
										<?php
                                
											echo '
											<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
												BAC<b class="caret"></b></span>
												</a>
												<ul class="dropdown-menu">';
												echo '<li><a href='.$PROJECT_ROOT.'procedures/home/bac/new.php>New</a></li>';
												if ($_SESSION['BAC']==1 OR $_SESSION['GROUP']=='POWER ADMIN')
												{
												echo '
													<li><a href='.$PROJECT_ROOT.'procedures/home/bac/receive.php>Receive Doc</a></li>
													<li><a href='.$PROJECT_ROOT.'procedures/home/bac/release.php>Release Doc</a></li>
																							<li><a href='.$PROJECT_ROOT.'procedures/home/bac/checkin.php>Check In</a></li>
													<li class="divider"></li>';
												}
												//<li><a href='.$PROJECT_ROOT.'procedures/home/bac/backlog.php><span>Backlog</span></a></li>
												echo '
													<li><a href='.$PROJECT_ROOT.'procedures/home/bac/monitor.php>Monitoring</a></li>
													<li><a href='.$PROJECT_ROOT.'procedures/home/bac/archive.php>Archive</a></li>
												';
												echo '</ul></li>';
                                
                                
										?>
										
										
										<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Communication <b class="caret"></b></a>
											<ul class="dropdown-menu">
												<li><a href="<?php echo $PROJECT_ROOT."procedures/home/communication/letter.php"; ?>">Letter</a></li>
												<li><a href="<?php echo $PROJECT_ROOT."procedures/home/communication/monitoring.php"; ?>">Letter Monitoring</a></li>
											</ul>
										</li>
										<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Report <b class="caret"></b></a>
											<ul class="dropdown-menu navbar-right" role="menu">
												<li class="dropdown-submenu" id="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Document Tracking</span></a>
													<ul class="dropdown-menu down-bgcolor">
														<li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/doccons.php"; ?>"><span>Document Consolidation</span></a></li>
														<li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/doconprocess.php"; ?>"><span>Office Document Flow</span></a></li>
														<li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/docsummary.php"; ?>"><span>Consolidated Accomplishment</span></a></li>
													</ul>
												</li>
												<li class="dropdown-submenu" id="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>BAC</span></a>
													<ul class="dropdown-menu down-bgcolor">
														<li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/history.php"; ?>"><span>History</span></a></li>
														<li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/consolidoc.php"; ?>"><span>Consolidated Document</span></a></li>
													</ul>
												</li>
											</ul>
											<!--<ul class="dropdown-menu">
												<li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/dochistory.php"; ?>">Document History</a></li>
												<li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/doconprocess.php"; ?>">Document on Process</a></li>
												<li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/doconprocesspersignatory.php"; ?>">Document on Process per Signatory</a></li>
												<li><a href="<?php echo $PROJECT_ROOT."procedures/home/report/docpersignatory.php"; ?>">Documents per Signatory</a></li>
											</ul>-->
										</li>
										
										<?php
                                
                         if($_SESSION['GROUP']=='POWER ADMIN')
                                {
                                echo '<li class="dropdown">';
                                echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Maintenance <b class="caret"></b></a>
                                <ul class="dropdown-menu navbar-right" id="ulheader">';
                                        
                                        echo '<li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/flowtemplate.php">Flow Template</a></li>
                                             <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/documenttype.php">Document Type</a></li>
                                              <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/office.php">Office</a></li>
                                             
                                        <li class="divider"></li>
                                        <li class="dropdown dropdown-submenu" id="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Security</a>
                                            <ul class="dropdown-menu down-bgcolor">
                                                <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/users.php">Users</a></li>
                                                <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/group.php">Group</a></li>
                                                <li><a href="'.$PROJECT_ROOT.'procedures/home/maintenance/audittrail.php">Audit Trail</a></li>
                                            </ul>
                                        </li>';
                                        echo ' </ul></li>';
                                    }
                    ?>
										
										
										<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Help <b class="caret"></b></a>
											<ul class="dropdown-menu navbar-right" id="ulheader">
												<li class="dropdown dropdown-submenu" id="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Manual</a>
                                                    <ul class="dropdown-menu down-bgcolor">
                                                    	<li><a target='_blank' href="https://onedrive.live.com/redir?resid=30BD84299085B6FB!21917&authkey=!AE_FMAlza931EV0&ithint=file%2cpdf" ><span>Document Manual</span></a></li>
                                                    	<li><a target='_blank' href="https://onedrive.live.com/redir?resid=30BD84299085B6FB!21824&authkey=!APqDiAq2vDQLtd8&ithint=file%2cpdf" ><span>Financial Document Templates</span></a></li>
                                                    	<li><a target='_blank' href="https://onedrive.live.com/redir?resid=30BD84299085B6FB!23158&authkey=!ABWzr-1RCwyLAtY&ithint=file%2cpdf" ><span>Consolidated Process Flow Templates</span></a></li>	
                                                    </ul>
												</li>
												<li><a href="<?php echo $PROJECT_ROOT."about.php"; ?>">About</a></li>
											</ul>
										</li>
									</ul>
								</div><!-- /.navbar-collapse -->
							</nav>
							
							<div class="tclear"></div>
							
						</div>
						
						
					  
					</div>
			</div>
		</div>