<meta charset="UTF-8">
<?php 
session_start();
include('includes/common.php');
?>

<?php

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
		
	//connexion à la base de données
	include('includes/connexionbdd.inc.php');

	$mdp = sha1($mdp);
	
	$Connexion = mysql_query("SELECT email, id FROM users WHERE email='$email' AND mdp='$mdp'");
	$select = mysql_fetch_array($Connexion, MYSQL_ASSOC);
	
	if(count($select) > 0)
	{
		session_regenerate_id(true);
		
        $message = "Bienvenue " . $email;
        $_SESSION['email'] = $select['email'];
		//$_SESSION['rank'] = $select['niveauDroit'];
		$_SESSION['id'] = $select['id'];
		
		header('location:ConnexionReussie.php'); //(=connexion réussie dans m2l)
	}
	else 
		$message= "email ou mot de passe incorrect";	
	}
}
?>

<meta charset="utf-8">


<?php echo $message; ?>

<title>Connexion</title>

<h1>Connexion</h1>

<form method = "post" action ="Connexion.php">

<p>Votre email</p>
<input type = "text" name="email" />

<p>Votre mot de passe</p>
<input type="password" name="mdp" /><br> <br>

<input type="submit" name="submit" value="Se connecter" />

</form>
<a href="FormInscription.php">Pas encore membre?</a>

<br>
<br>

<!-- PIED DE PAGE -->
	<div id="piedpage">
		<?php include('includes/piedpage.inc.php');?>
	</div>

</body>