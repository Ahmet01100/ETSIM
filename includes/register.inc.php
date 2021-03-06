<?php
/*
* Created by : bryan.maisano@gmail.com
* All primary function
* date * 10-10-2015
*/
include_once 'db_connect.php';
 
$error_msg = "";


if (isset($_POST['registration_form']) && $_POST['registration_form'] == 'registration_form') {
	if ( (isset($_POST['username']) && !empty($_POST['username'])) && (isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['password']) && !empty($_POST['password'])) && (isset($_POST['confirmpwd']) && !empty($_POST['confirmpwd'])) && (isset($_POST['institution']) && !empty($_POST['institution']))) {
		// Nettoyez et validez les données transmises au script
		$username = $_POST['username'];
		$email = $_POST['email'];
		$institution = $_POST['institution'];
		$player = "Player";
		$enable = "0";
	 
		$password = $_POST['password'];
		$cpassword = $_POST['confirmpwd'];
		//$password = $_POST['password'];
		if ((strlen($password) > 128) && (strlen($cpassword) > 128)) {
			// Le mot de passe hashé ne doit pas dépasser les 128 caractères
			// Si ce n’est aps le cas, quelque chose de vraiment bizarre s’est produit
			$error_msg .= '<p class="error">Invalid password.</p>';
		}
	 
		// La forme du nom d’utilisateur et du mot de passe a été vérifiée côté client
		// Cela devrait suffire, car personne ne tire avantage
		// à briser ce genre de règles.
		//
		
		if ($_POST['password'] != $_POST['confirmpwd']) {
				$error_msg .= '<p class="error">Your password and confirmation must match.</p>';
		} else {
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error_msg .= "Invalid email format"; 
			} else {
				$prep_stmt = "SELECT id_etsim_members FROM etsim_members WHERE email_etsim_members = ? OR username_etsim_members = ? LIMIT 1";
				if(!($stmt = $mysqli->prepare($prep_stmt))) {
					echo "Request processing failed: (" . $mysqli->errno . ") " . $mysqli->error;
				}
				if ($stmt) {
					$stmt->bind_param('ss',$email, $username);
					$stmt->execute();
					$stmt->store_result();
					
					if ($stmt->num_rows == 1) {
						// Il y a déjà un utilisateur avec ce nom-là
						$error_msg .= '<p class="error">A user with the same username already exists in the database.</p>';
					}
				} else {
					$error_msg .= '<p class="error">Error accessing the database.</p>';
				}
				// CE QUE VOUS DEVEZ FAIRE: 
				// Nous devons aussi penser à la situation où l’utilisateur n’a pas
				// le droit de s’enregistrer, en vérifiant quel type d’utilisateur essaye de
				// s’enregistrer.
			 
				if (empty($error_msg)) {
					// Crée un salt au hasard
					$random_salt = base64_encode(openssl_random_pseudo_bytes(16, $secure));
					
					// echo "hash : ".$random_salt."<br>";
					// Crée le mot de passe en se servant du salt généré ci-dessus 
					# Crée un IV aléatoire à utiliser avec l'encodage CBC
					$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
					$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
					
					# Crée un texte cipher compatible avec AES (Rijndael block size = 128)
					# pour conserver le texte confidentiel.
					# Uniquement applicable pour les entrées encodées qui ne se terminent jamais
					# pas la valeur 00h (en raison de la suppression par défaut des zéros finaux)
					$ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $random_salt,
												 $password, MCRYPT_MODE_CBC, $iv);

					# On ajoute le IV au début du texte chiffré pour le rendre disponible pour le déchiffrement
					$ciphertext = $iv . $ciphertext;
					
					# Encode le texte chiffré résultant pour qu'il puisse être représenté par une chaîne de caractères
					$cryptpassword = base64_encode($ciphertext);

					// echo  $cryptpassword . "\n";
					// echo "password arrivée ".$cryptpassword . "\n";
			 
					// Enregistre le nouvel utilisateur dans la base de données
					if ($insert_stmt = $mysqli->prepare("INSERT INTO etsim_members (username_etsim_members, email_etsim_members, password_etsim_members, salt_etsim_members, role_etsim_members, enable_etsim_members, group_etsim_members) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
						// echo "password_départ : ".$password."<br>";
						$insert_stmt->bind_param('sssssss',$username, $email, $cryptpassword, $random_salt, $player, $enable, $institution);
						$message = "	Dear $username, your ETSIM account was created. Your account must now be validated by an administrator. You will receive another email when this is done.";
						$header = "From: ahmet.imre@utbm.fr";
						$subject = "ETSIM registration";
						mail($email,$subject,$message,$header);
						$mail_admin = "robin.roche@utbm.fr";
						$message_admin = "A new user registered: $username - Please activate.";
						$subject_admin = "New ETSIM user: $username";
						$header_admin = "From: robin.roche@utbm.fr";
						mail($mail_admin,$subject_admin,$message_admin,$header_admin);
						
						
						// Exécute la déclaration.
						if (! $insert_stmt->execute()) {
							header('error.php?err=Registration failure: INSERT');
						}
						$mysqli->close();
						$insert_stmt->close();
						$success_msg .= '<p class="error">Your account has been created!</p>';
					}
				} else {
					// echo "Echec de la préparation : (" . $mysqli->errno . ") " . $mysqli->error;
				}
			}
		}
	}
}

?>
