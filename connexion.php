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