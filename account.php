<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include_once 'includes/modifypwd.php';
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
			
			<!-- Main -->
			<?php if ($_SESSION['role'] == 'Player' || $_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Manager') : ?>

				<section class="wrapper style1" min-width="800px" width="30%" max-width="800px">
					<div class="container">
						<div class="box post2">
							<article>
								<header><h2>Account information</h2></header>
									
									<ul>
										<li>Logged in as <?php echo htmlentities($_SESSION['username']); ?></li>
										<li>Role: <?php echo htmlentities($_SESSION['role']) ; ?></li>
										<li>Institution: <?php echo htmlentities($_SESSION['institution']) ; ?></li>
										<li><a href="includes/logout.php">Logout</a></li>
									</ul>

							</article>
						</div>
					</div>
				</section>


				<section class="wrapper style1 min-width="800px" width="30%" max-width="800px">
					<div class="container">
						<div class="box post2">
							<article>
								<header><h2>Change your password</h2></header>

									<?php
									if (!empty($error_msg)) {
										echo $error_msg;
									}
									?>

									<form method="post" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>">
										<input type="hidden" name="changepwdform" value="changepwdform"/>
										<div class="row 50%">
											<div class="6u 12u(mobilep)">
												<input type="password" name="pwd" id="pwd" placeholder="New password" />
											</div>
											<div class="6u 12u(mobilep)">
												<input type="password" name="cpwd" id="cpwd" placeholder="Confirm new password" />
											</div>
										</div>
										<div class="row 50%">
											<div class="12u">
												<ul class="actions">
													<li><input type="submit" class="button alt" value="Change password" /></li>
												</ul>
											</div>
										</div>
									</form>
							</article>
						</div>
					</div>
				</section>


			<?php else : ?>


				<section class="wrapper style1" min-width="800px" width="30%" max-width="1000px">
					<div class="container">

							<div class="box post2">
								<article>
									<header>
										<h2>Access denied. Please login.</h2>
									</header>
								</article>
							</div>
					</div>
				</section>


			<?php endif; ?>
		

			<!-- Copyright -->
			<?php include_once 'includes/layout/CopyrightBar.php'; ?>
		</div>

	</body>
</html>
