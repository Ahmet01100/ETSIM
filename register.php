<?php
include_once 'includes/functions.php';
include_once 'includes/register.inc.php';
sec_session_start();
?>

<!DOCTYPE HTML>
<html>
	
	<?php include_once 'includes/layout/HeadBar.php'; ?>
	
	<body>
		<div id="page-wrapper">
			
			<!-- Navigation Bar -->
			<?php include_once 'includes/layout/NavigBar.php'; ?>
			
	
				<!-- Main -->
				<section class="wrapper style1" min-width="800px" width="30%" max-width="1000px">
					<div class="container">
						<div class="row 200%">
							<div class="8u 12u(narrower)">
								<div id="content">
									<!-- Content -->
										<article>
											<header>
												<h2>Registration form</h2>
												<?php
													if (!empty($error_msg)) {
														echo $error_msg;
													}
													if (!empty($success_msg)) {
														echo $success_msg;
													}
												?>
											</header>
											
											<ul>
												<li>Usernames may only contain digits, upper and lower case letters and underscores</li>
												<li>Emails must have a valid email format</li>
												<li>Passwords must be at least 6 characters long</li>
												<li>Your password and confirmation must match</li>
												<li>Passwords must contain:
													<ul>
														<li>At least one upper case letter (A..Z)</li>
														<li>At least one lower case letter (a..z)</li>
														<li>At least one number (0..9)</li>
													</ul>
												</li>
											</ul>
											
											<form   action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
													method="post">
												<input type="hidden" name="registration_form" value="registration_form"/>
												Username: <input type='text' 
													name='username' 
													id='username'
													x-moz-errormessage="Your name is required!"
													required="required"
													autofocus="autofocus"
													value="<?php 
														if (isset($_POST['username'])) 
															echo htmlentities(trim($_POST['username'])); 
														?>"/><br>
												Email: <input 	type="text" 
																name="email" 
																id="email" 
																placeholder="example@domain.com"
																x-moz-errormessage="A valid email address is required!"
																required="required"
																autofocus="autofocus"
																value="<?php 
																if (isset($_POST['email'])) 
																	echo htmlentities(trim($_POST['email'])); 
																?>"/><br>
												Institution: <input 	type="text" 
																name="institution" 
																id="institution" 
																placeholder="UTBM, CSU, etc."
																x-moz-errormessage="An institution () is required!"
																required="required"
																autofocus="autofocus"
																value="<?php 
																if (isset($_POST['institution'])) 
																	echo htmlentities(trim($_POST['institution'])); 
																?>"/><br>
												Password: <input 	type="password"
																	name="password" 
																	id="password"
																	x-moz-errormessage="A password is required!"
																	required="required"
																	autofocus="autofocus"
																	value="<?php 
																	if (isset($_POST['password'])) 
																		echo htmlentities(trim($_POST['password'])); 
																	?>"/><br>
												Confirm password: <input 	type="password" 
																			name="confirmpwd" 
																			id="confirmpwd"
																			x-moz-errormessage="Passwords must match!"
																			required="required"
																			autofocus="autofocus"
																			value="<?php 
																			if (isset($_POST['confirmpwd'])) 
																				echo htmlentities(trim($_POST['confirmpwd'])); 
																			?>"/><br>
												<input type="submit" name="register" id="register" value="Register" /> 
											</form>
											
											
											<div id="divlogin">Return to the <a href="index.php">login page</a>.</div>
										</article>
								</div>
							</div>
						</div>
					</div>
				</section>


			<!-- Copyright -->
				<?php include_once 'includes/layout/CopyrightBar.php'; ?>
		</div>
	</body>
</html>