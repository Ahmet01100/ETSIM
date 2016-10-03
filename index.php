<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
?>

<!DOCTYPE HTML>
<html>
	
	<?php
	include_once 'includes/layout/HeadBar.php'; ?>
	
	<body>
		<div id="page-wrapper">
			
			<!-- Navigation Bar -->
			<?php include_once 'includes/layout/NavigBar.php'; ?>

			<!-- Login Bar -->
			<?php include_once 'includes/layout/LoginDiv.php'; ?>

			
				<section class="wrapper style1" min-width="800px" width="30%" max-width="800px">
					<div class="container">
						<div class="box post2">
							<article>
								<header><h2>What is ETSIM?</h2></header>
									
								<p>ETSIM (electricity trading simulator) is an online serious game that mimics the operation of a pool electricity market. It enables several groups of players, typically students, to compete and try to simultaneously sell the energy generated by their portfolio of power plants. The game was designed as part of the labs for an energy economics course at the <a href="http://www.utbm.fr">University of Technology of Belfort-Montbéliard</a> in France.</p>

								<p><a href="about.php">More on using ETSIM for your own course.</a></p>
								
							</article>
						</div>
					</div>
				</section>

			
				<section class="wrapper style1" min-width="800px" width="30%" max-width="800px">
					<div class="container">
						<div class="box post2">
							<article>
								<header><h2>How to play</h2></header>
									
								<ul>
									<li><a href="register.php">Register</a> to create an account, and log in.</li>
									<li><a href="play.php">Join</a> an open game.</li>
									<li>Each group is randomly assigned a set of thermal power plants, with the corresponding variable and fixed costs.</li>
									<li>Each group submits bids (price and volume) to sell the power generated by its plants.</li>
									<li>The market price and volume are computed using a simple market clearing algorithm.</li>
									<li>Bids below the market price are accepted, others are rejected. </li>
									<li>The profit or loss of each group is then computed.</li>
									<li>The demand curve is assumed to be a constant value for each period of the game.</li>
									<li>A game lasts 10 rounds.</li>
								</ul>

								
							</article>
						</div>
					</div>
				</section>
			
			
			<!-- Copyright -->
				<?php include_once 'includes/layout/CopyrightBar.php'; ?>
		</div>
	</body>
</html>