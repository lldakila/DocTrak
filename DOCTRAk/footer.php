<footer>
		<div class="footer">
				<div class="footerbg">
						<div class="container">
								<div class="row">
											<div class="col-xs-6">
												<div class="footer_1">
													<p>
															<?php
												
																echo $_SESSION['Copyright']. "&nbsp;<img src=".$PROJECT_ROOT."images/home/icon/copyleft-icon.png width='14' height='14' />&nbsp;" .$_SESSION['Year']. "&nbsp;" .$_SESSION['Developer'];
																echo "&nbsp|";
												
												
															?>
												
															<a href="http://launion.gov.ph/news.php">PGLU</a> | Designed by: <a href="https://www.facebook.com/wufei0?fref=ts">MIS</a> | <a href="#">Scroll Top</a>
													</p>
												</div>
											</div>
											<div class="col-xs-6">
													<div id="logo">
                             <img <?php
                                $printme="src=".$PROJECT_ROOT."images/home/logo/misdlogo.png";
                                echo $printme;
                                ?> width="35" height="30" alt="MISD" title="MISD" align="left" />
                             <img <?php
                                $printme="src=".$PROJECT_ROOT."images/home/logo/pglu-logo.png";
                                echo $printme;
                                ?> width="35" height="30" alt="PGLU" title="PGLU" align="left" />
                         	</div>
											</div>
								</div>
						</div>
				</div>
		</div>
</footer>