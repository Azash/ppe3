<?php
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
		
		$Connexion = mysql_query("SELECT email, id FROM users WHERE email='$email' AND mdp='$mdp'");
		$select = mysql_fetch_array($Connexion, MYSQL_ASSOC);
		
		if(count($select) > 0)
		{
			session_regenerate_id(true);
			
			$_SESSION['email'] = $select['email'];
			$_SESSION['id'] = $select['id'];
			header('location:desinscription.php'); //(=connexion réussie)
		}
		else 

			$message= "Email ou mot de passe incorrect";
		}
	}
	 
     $del = mysql_query("DELETE FROM users WHERE email = '{$_SESSION['email']}'");
     
     header("Location:Deconnexion.php")
?>
