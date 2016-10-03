<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include_once 'includes/functions_game.php';
sec_session_start();
?>

<!DOCTYPE HTML>
<html>

	<?php
	include_once 'includes/layout/HeadBarAdminUsers.php'; ?>

	<body>
		<div id="page-wrapper">

			<!-- Navigation Bar -->
			<?php include_once 'includes/layout/NavigBar.php'; ?>

			<!-- Login Bar -->
			<?php include_once 'includes/layout/LoginDiv.php'; ?>


			<?php if ($_SESSION['role'] == 'Admin') : ?>


				<!-- <section class="wrapper style1 min-width="800px" width="30%" max-width="1000px">
					<div class="container">
						<div class="box post2">
							<article>
								<header><h2>List of users</h2></header>

									<table>
										<tr><th><b style="color:white">ID</b></th>
											<th><b style="color:white" >Username</b></th>
											<th><b style="color:white">Email</b></th>
											<th><b style="color:white">Role</b></th>
											<th><b style="color:white">Enabled</b></th>
											<th><b style="color:white">Institution</b></th></tr>
-->
									<!-- <?php
										$sql_query_admin = 'SELECT 	id_etsim_members
																	,username_etsim_members
																	,email_etsim_members
																	,role_etsim_members
																	,enable_etsim_members
																	,group_etsim_members
															FROM etsim_members;';
										$result = $mysqli->query($sql_query_admin);
										if ($result->num_rows > 0) {
											while($row = $result->fetch_assoc()) {
												echo "<tr><td>" . $row["id_etsim_members"]. "</td><td>" . $row["username_etsim_members"]. "</td><td>" . $row["email_etsim_members"]. "</td><td>" . $row["role_etsim_members"] . "</td><td>" . $row["enable_etsim_members"] . "</td><td>" . $row["group_etsim_members"]."</td></tr>";
											}
										} else {
											echo "0 results";
										}
									?> -->
<!--
									</table>
							</article>
						</div>
					</div>
				</section> -
-->

				<section class="wrapper style1 min-width="800px" width="30%" max-width="1000px">
					<div class="container">
						<div class="box post2">
							<article>
								<header><h2>List of games</h2></header>

									<table>
										<tr><th><b style="color:white">ID</b></th>
										<th><b style="color:white">Date</b></th>
										<th><b style="color:white">Description</b></th>
										<th><b style="color:white">Status</b></th>
										<th><b style="color:white">Max. players</b></th></tr>

									<?php
										$sql_query_admin = 'SELECT 	id_etsim_game
																	,date_etsim_game
																	,description_etsim_game
																	,status_etsim_game
																	,maxplayer_etsim_game
															FROM etsim_game;';
										$result = $mysqli->query($sql_query_admin);
										if ($result->num_rows > 0) {
											while($row = $result->fetch_assoc()) {
												echo "<tr><td>" . $row["id_etsim_game"]. "</td><td>" . $row["date_etsim_game"]. "</td><td>" . $row["description_etsim_game"]. "</td><td>" . $row["status_etsim_game"] . "</td><td>" . $row["maxplayer_etsim_game"]."</td></tr>";
											}
										} else {
											echo "0 results";
										}
									?>

									</table>
							</article>
						</div>
					</div>
				</section>


				<!-- <section class="wrapper style1 min-width="800px" width="30%" max-width="1000px">
					<div class="container">
						<div class="box post2">
							<article>
								<header><h2>List of plants</h2></header>

									To be implemented.

							</article>
						</div>
					</div>
				</section> -->


				<section class="wrapper style1 min-width="800px" width="30%" max-width="1000px">
					<div class="container">
							<div class="box post2">
								<article>
									<header>
										<h2>List of users</h2>
									</header>
									<table>
										<tr><th><b style="color:white">ID</b></th>
											<th><b style="color:white" >Username</b></th>
											<th><b style="color:white">Email</b></th>
											<th><b style="color:white">Institution</b></th>
											<th><b style="color:white">Role</b></th>
											<th><b style="color:white">Enabled?</b></th>
											<th><b style="color:white">Delete?</b></th></tr>
										<?php
											$sql_query_admin = 'SELECT 	id_etsim_members
																		,username_etsim_members
																		,email_etsim_members
																		,role_etsim_members
																		,enable_etsim_members
																		,group_etsim_members
																FROM etsim_members;';
											createTable($mysqli, $sql_query_admin);
										?>
									</table>
								</article>
							</div>
					</div>
				</section>


			<?php else : ?>
				<section class="wrapper style1 min-width="800px" width="30%" max-width="1000px">
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
