<?php
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
		
		if(count($select) > 0)
		{
			session_regenerate_id(true);
			
			$message = "Bienvenue " . $email;
			$_SESSION['email'] = $select['email'];
			//$_SESSION['rank'] = $select['niveauDroit'];
			$_SESSION['id'] = $select['id'];
			//echo $_SESSION['id'];
			header('location:index.php'); //(=connexion réussie)
		}
		else 

			$message= "email ou mot de passe incorrect";	
		}
	}
?>

<?php
	mysql_query("set names 'utf8'");
	
	if(isset($_POST['submit']))
	{
		$nom = htmlspecialchars($_POST["nom"]);
		$prenom = htmlspecialchars($_POST["prenom"]);
		//$birth = htmlspecialchars($_POST["birth"]);
		$jourNaissance = intval($_POST['jourNaissance']);
		$moisNaissance = intval($_POST['moisNaissance']);
		$anneeNaissance = intval($_POST['anneeNaissance']);
		$mdp = htmlspecialchars($_POST["mdp"]);
		$re_mdp = htmlspecialchars(trim($_POST['re_mdp']));
		$sexe = htmlspecialchars($_POST["sexe"]);
		$email = htmlspecialchars($_POST["email"]);


		if($nom && $prenom && $mdp && $re_mdp && $sexe && $email)
		{
			if(strlen($nom)>=2)
			{
				if(strlen($prenom)>=2)
				{
					if($mdp == $re_mdp)
					{
						$mdp = SHA1($mdp);   //cryptage du mdp
							
						//include_once 'includes/connexionbdd.inc.php';
						//$query = mysql_query("INSERT INTO users VALUES('', '$nom', '$prenom', '" . $anneeNaissance . "-" . $moisNaissance . "-" . $jourNaissance . "-1', $sexe', '$email', '$mdp')");
						$date = $anneeNaissance . "-" . $moisNaissance . "-" . $jourNaissance; 
						$sql = "INSERT INTO users (id, nom, prenom, birth, mdp, sexe, email) VALUES('null', '$nom', '$prenom', '$date', '$mdp', '$sexe', '$email')";
						echo $sql;
						$res = mysql_query($sql);
						if(!$res) echo mysql_error();
						//mysql_query("INSERT INTO users VALUES('', '$nom', '$prenom', '" . $anneeNaissance . "-" . $moisNaissance . "-" . $jourNaissance . "', $sexe', '$email', '$mdp')");
						die('Formulaire bien rempli! Vous allez maintenant reçevoir un mail avec un mot de passe de confirmation. Vous pourrez ensuite choisir votre propre mot de passe pour vous connecter.<a href="Connexion.php">Continuer mon inscription</a>');
							
					}else echo "Les mots de passe ne sont pas identiques";
				}else echo "Veuillez rentrer un prenom de + de 2 caractères";
			}else echo "Veuillez rentrer un nom de + de 2 caractères";
		}else echo "Veuillez saisir tous les champs!";
	}
?>

