<?php
 /*
* Created by : bryan.maisano@gmail.com
* date * 02-01-2016
*/ ?>


	<div id="title">
		ETSIM
	</div>

	<!-- Nav -->
	<nav id="nav">
		<ul>
			<li <?php if ($_SERVER["PHP_SELF"] == '/index.php') { echo "class=\"current\""; } ?> ><a href="index.php">HOME</a></li>

			<?php if ($_SESSION['role'] == 'Player' || $_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Manager') : ?>
				<li <?php if (($_SERVER["PHP_SELF"] == '/play.php')) { echo " class=\"current\"";} ?> >
					<a href="play.php">PLAY</a>
				</li>
			<?php endif; ?>

			<?php if ($_SESSION['role'] == 'Manager' || $_SESSION['role'] == 'Admin') : ?>
				<li <?php if (($_SERVER["PHP_SELF"] == '/manager.php')) { echo " class=\"current\""; } ?>>
					<a href="manager.php">MANAGER PANEL</a>
				</li>
			<?php endif; ?>			
			
			<?php if ($_SESSION['role'] == 'Admin') : ?>
				<li <?php if (($_SERVER["PHP_SELF"] == '/admin.php')) { echo " class=\"current\""; } ?>>
					<a href="admin.php">ADMINISTRATION</a>
				</li>
			<?php endif; ?>

			<?php if ($_SESSION['role'] == 'Player' || $_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Manager') : ?>
				<li <?php if (($_SERVER["PHP_SELF"] == '/account.php')) { echo " class=\"current\"";} ?> >
					<a href="account.php">ACCOUNT</a>
				</li>
			<?php endif; ?>


			<li>
				<a href="about.php">ABOUT</a>
			</li>
		</ul>
	</nav>

