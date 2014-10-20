<?php  /* CONNEXION */

	include('connexionbdd.php');
	session_start();
	$message = '';

	if(isset($_POST['submit']))
	{
		$email = htmlspecialchars(trim($_POST['email']));
		$mdp = htmlspecialchars(trim($_POST['mdp']));
	
		if(empty($email))
		{
			echo "Veuillez saisir votre email<br/>";
		}
		else if(empty($mdp))
		{
			echo "Veuillez saisir votre mot de passe";
		}
		else{

			$mdp = sha1($mdp);
			//echo $email;
			$Connexion = mysql_query("SELECT email, id FROM users WHERE email='$email' AND mdp='$mdp'");
			$select = mysql_fetch_array($Connexion, MYSQL_ASSOC);
			
			//Pour verifier si l'email a ete valide
			$sqlValide = "SELECT valide FROM users Where email='".$email."'";
			$reqValide = mysql_query($sqlValide) or die('Erreur SQL !<br>'.$sqlValide.'<br>'.mysql_error());
			$dataValide = mysql_fetch_assoc($reqValide);
			$valide = $dataValide['valide'];
		
		if(count($select) > 0)
		{
			if ($valide == 'valide') {
				session_regenerate_id(true);
				
				$sqlPrenom = "SELECT prenom FROM users WHERE email='".$email."'";
				$reqPrenom = mysql_query($sqlPrenom) or die('Erreur SQL !<br>'.$sqlPrenom.'<br>'.mysql_error());
				$data = mysql_fetch_assoc($req);
				$prenom = $data['prenom'];
				
				$pass = '';
					for ($i = 1; $i <= 8; $i++) {
									$pass .= chr(rand(65, 90)); //33 = premier caractere imprimable de la table ascii, 125 = dernier qui nous interesse...
								}
								
				$sqlPass = "UPDATE users SET pass = '".$pass."' WHERE email='".$email."'";
				$reqPass = mysql_query($sqlPass) or die('Erreur SQL !<br>'.$sqlPass.'<br>'.mysql_error());
					
				$message = "Bienvenue " . $prenom;
				$_SESSION['email'] = $select['email'];
				//$_SESSION['rank'] = $select['niveauDroit'];
				$_SESSION['id'] = $select['id'];
				//echo $_SESSION['id'];
				header('location:espacemembre.php'); //(=connexion rÃ©ussie)
			}else {
				echo "Vous n'avez pas validé votre adresse email.";
				header('Refresh: 4;url=index.php');
			}
		}else
			$message= "email ou mot de passe incorrect";	
		}
	}
?>