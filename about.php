<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

if(!isset($_SESSION)) 
{ 
   sec_session_start();
} 
?>

<!DOCTYPE HTML>
<html>
	
	<?php 
	include_once 'includes/layout/HeadBar.php'; ?>

	<body>
		<div id="page-wrapper">

			<!-- Navigation Bar -->
			<?php 
			include_once 'includes/layout/NavigBar.php'; ?>

			<!-- Main -->

				<section class="wrapper style1" min-width="800px" width="30%" max-width="800px">
					<div class="container">
						<div class="box post2">
							<article>
								<header><h2>Developers</h2></header>

								<p>ETSIM was developed at the <a href="http://www.utbm.fr">University of Technology of Belfort-Montbéliard</a> in France. Its concept is based on an offline version of the game created by Dr. Robin Roche. The online implementation was done by several students from the Energy and Computer Science departments in 2014 and 2015.</p>

								The developers, under the supervision of Dr. Robin Roche, were:
									<ul>
										<li>Bryan Maisano (v2)</li> 
										<li>Baptiste Mouterde (v2)</li> 
										<li>Arthur Delbaere-Crespo (v1)</li> 
										<li>Rafaël Frost (v1)</li> 
									</ul>

							</article>
						</div>
					</div>
				</section>

			
				<section class="wrapper style1" min-width="800px" width="30%" max-width="800px">
					<div class="container">
						<div class="box post2">
							<article>
								<header><h2>Using ETSIM for your own course</h2></header>
									
								<p>ETSIM is currently hosted by Dr. Robin Roche and is free to use for everyone. The source code is currently not made available. Anyone can register, but all new registrations must be validated by an administrator. We are proud that you want to use ETSIM, but let us know that you are doing so using the form below! This will help us map the institutions that use ETSIM throughout the world.</p>

							</article>
						</div>
					</div>
				</section>
			

				<section class="wrapper style1" min-width="800px" width="30%" max-width="800px">
					<div class="container">
						<div class="box post2">
							<article>
								<header><h2>Contact form</h2></header>

									<p>For any inquiry or suggestion, feel free to contact the ETSIM developers/administrator.</p>

									<form method="post" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>">
										<input type="hidden" name="contactform" value="contactform"/>
										<div class="row 50%">
											<div class="6u 12u(mobilep)">
												<input type="text" name="name" id="name" placeholder="Name" />
											</div>
											<div class="6u 12u(mobilep)">
												<input type="email" name="email" id="email" placeholder="Email" />
											</div>
										</div>
										<div class="row 50%">
											<div class="12u">
												<textarea name="message" id="message" placeholder="Message" rows="5"></textarea>
											</div>
										</div>
										<div class="row 50%">
											<div class="12u">
												<ul class="actions">
													<li><input type="submit" class="button alt" value="Send" /></li>
												</ul>
											</div>
										</div>
									</form>
							</article>
						</div>
					</div>
				</section>


		<!-- Copyright -->
			<?php include_once 'includes/layout/CopyrightBar.php'; ?>
		</div>

	</body>
</html>
