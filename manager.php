<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include_once 'includes/functions_game.php';
include_once 'includes/registergame.inc.php';
if(!isset($_SESSION)) 
{ 
   sec_session_start();
} 
?>

<!DOCTYPE HTML>
<html>

	<?php include_once 'includes/layout/HeadBarPlayManage.php'; ?>

	<body>
		<div id="page-wrapper">

			<!-- Navigation Bar -->
			<?php include_once 'includes/layout/NavigBar.php'; ?>

			<!-- Login Bar -->
			<?php include_once 'includes/layout/LoginDiv.php'; ?>

			<?php
				if (!empty($success)) {
					echo $success;
				}
			?>


			<?php if ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Manager' ) : ?>
            

			<!-- Main -->
				<section class="wrapper style1" min-width="800px" width="30%" max-width="1000px">
					<div class="container">
							<div class="box post2">
								<article>
									<header>
										<h2>Games management</h2>
									</header>

												  <?php
									if (!empty($error_msg)) {
										echo $error_msg;
									}
									if (!empty($success_msg)) {
										echo $success_msg;
									}
									?>

									<div class="box post3">
										<table>
											<tr>
												<th>
													<b>ID</b><br/>
												</th>
												<th>
													<b>Date</b><br/>
												</th>
												<th>
													<b>Description</b><br/>
												</th>
												<th>
													<b>Players in</b><br/>
												</th>
												<th>
													<b>Players out</b><br/>
												</th>
												<th>
													<b>Enabled</b><br/>
												</th>
												<th>
													<b>Show game</b><br/>
												</th>
												<th>
													<b>Delete game</b><br/>
												</th>
											</tr>
											<?php
												createTableGame($mysqli);
											?>
										</table>
									</div>

								</article>
							</div>
					</div>
				</section>



				<section class="wrapper style1" min-width="800px" width="30%" max-width="1000px">
					<div class="container">
						<div class="box post">
							<article>
								<header><h2>Create a new game</h2></header>
										<form method="post" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>">
											<input type="hidden" name="registergame" value="registergame"/>
												<table>
													<tr>
														<td><label for="etsim_game" class="formlabel">Description</label></td>
														<td><input id="name_etsim_game" name="name_etsim_game" type="text" class="forminput" /></td>
													</tr>
													<tr>
														<td><label for="etsim_game" class="formlabel">Password for joining the game</label></td>
														<td><input id="password_etsim_game" name="password_etsim_game" type="password" /></td>
													</tr>
													<tr>
														<td><label for="etsim_game" class="formlabel">Max. number of players</label></td>
														<td><input id="maxplayer_etsim_game" name="maxplayer_etsim_game" type="text" class="forminput" /></td>
													</tr>
												</table>
											<input type="submit" name="commitNewGame" value="Create the game">
										</form>
								</article>
							</div>
						</div>
				</section>


				<section class="wrapper style1" min-width="800px" width="30%" max-width="1000px">
					<div class="container">
							<div class="box post2">
								<article>
									<header>
										<h2>Plant portfolio management</h2>
									</header>
									<?php
													if (!empty($error_msg)) {
														echo $error_msg;
													}
													if (!empty($success_msg)) {
														echo $success_msg;
													}
									?>
									<div class="box post3">
										<table>
											<tr>
												<th>
													<b>ID</b><br/>
												</th>
												<th>
													<b>NAME</b><br/>
												</th>
												<th>
													<b>POWER UNIT</b><br/>
												</th>
												<th>
													<b>COST MW</b><br/>
												</th>
												<th>
													<b>OM MW</b><br/>
												</th>
												<th>
													<b>RDT</b><br/>
												</th>
												<th>
													<b>CONSTRUCTION</b><br/>
												</th>
												<th>
													<b>OPERATION</b><br/>
												</th>
											</tr>
											<?php
												createTablePlant($mysqli);
											?>
										</table>
									</div>

									<div class="box post2">
										<table>
											<tr>
												<td>
													<form method="post" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>">
														<input type="hidden" name="newplant" value="newplant"/>
														<div class="row 50%">
															<div class="6u 12u(mobilep)">
																<ul class="actions">
																	<li><input id="new_plant" type="submit" class="button alt" value="New plant" /></li>
																</ul>
															</div>
														</div>
													</form>
												</td>
											</tr>
										</table>
									</div>
								</article>
							</div>
					</div>
				</section>


				<section class="wrapper style1" min-width="800px" width="30%" max-width="1000px">
					<div class="container">
							<div class="box post2">
								<article>
									<header>
										<h2>Plant types management</h2>
									</header>
									<?php
													if (!empty($error_msg)) {
														echo $error_msg;
													}
													if (!empty($success_msg)) {
														echo $success_msg;
													}
									?>
									<div class="box post3">
										<table>
											<tr>
												<th>
													<b>ID</b><br/>
												</th>
												<th>
													<b>NAME</b><br/>
												</th>
												<th>
													<b>DESCRIPTION</b><br/>
												</th>
												<th>
													<b>MIN VARIABLE COSTS</b><br/>
												</th>
												<th>
													<b>MAX VARIABLE COSTS</b><br/>
												</th>
											</tr>
											<?php
												createTableTypePlant($mysqli);
											?>
										</table>
									</div>

									<div class="box post4">
										<table>
											<tr>
												<td>
													<form method="post" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>">
														<input type="hidden" name="newtypeplant" value="newtypeplant"/>
														<div class="row 50%">
															<div class="6u 12u(mobilep)">
																<ul class="actions">
																	<li><input id="new_type_plant" type="submit" class="button alt" value="New type" /></li>
																</ul>
															</div>
														</div>
													</form>
												</td>
											</tr>
										</table>
									</div>
								</article>
							</div>
					</div>
				</section>


			<?php else : ?>


				<section class="wrapper style1" min-width="800px" width="30%" max-width="1000px">
					<div class="container">
						<header class="major">
							<div class="box post2">
								<article>
									<header>
										<h2>You are not authorized to view this page</h2>
									</header>
								</article>
							</div>
						</header>
					</div>
				</section>


			<?php endif; ?>


			<!-- Copyright -->
				<?php include_once 'includes/layout/CopyrightBar.php'; ?>
		</div>

	</body>
</html>
