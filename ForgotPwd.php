<!DOCTYPE HTML>

<?php
	//fonction mail, use swift ???
	
	session_start();
	include "connexionbdd.php";
	include "FctPhp.php";
	
	$email = "";
	$error = 0;
	if (isset($_POST["email"])) $email = $_POST["email"];
	if ($email != "") {
		$sql = "SELECT prenom, email, mdp FROM users WHERE email='".$email."'";
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		$data = mysql_fetch_assoc($req);
		$prenom = $data['prenom'];
		if($data['email'] == $email) {
			$mdp = "";
			for ($i = 1; $i <= 6; $i++) {
				$mdp .= chr(rand(48, 90)); //33 = premier caractere imprimable de la table ascii, 125 = dernier qui nous interesse...
			}
			//echo $tmpmdp."<br />";
			$req = sprintf("UPDATE users SET mdp=SHA1(\"%s\") WHERE email=\"%s\";", $mdp, $email);
			mysql_query($req);
			
							// Envoi du mail !
								$sujet = 'Sujet de l\'email';
								$message = "Bonjour, ".$prenom."
								Ceci est votre mot de passe : ".$mdp."
								Merci :)";
								$headers = "From: postmaster@guillaumeboudy.com\n";
								$headers .= "Reply-To: postmaster@guillaumeboudy.com\n";
								$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"";
								if (mail($email,$sujet,$message,$headers))
								{
								echo "L'email a bien été envoyé.";
								}
								else
								{
								echo "Une erreur c'est produite lors de l'envois de l'email.";
								}
							///////////////////////////////////////////////////////////////////////////////////
		}
		else {
			$error = "Email introuvable dans la base donnée.";
			}
	}
	else {
		//echo "NOT LOGGED !";
		$error = "Champs email vide.";
		}
?>
<meta charset="utf-8">
<html xmlns="http://www.w3.org/1999/xhtml">
	<title>SOS partenaires</title>
	<link rel="stylesheet" href="style.css" type="text/css" charset="utf-8">
	<!--<script style="" type="text/javascript" src="/global/jquery-1.11.0.min.js"></script>-->
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="Author" content="SOSpartenaires">
	<meta name="description" content="Sur SOS partenaires trouvez des activités près de chez vous, Organisez vos sports et loisirs avec vos amis, Trouvez de nouveaux partenaires.">
	<meta name="Keywords" content="SOS partenaires, sports et loisirs, sport, loisir, coach, reseau, social, bien, etre, bien-etre, loisirs, sports, communaute, social">

	<!--<link rel="shortcut icon" href="/favicon.ico">-->
	<body>
		<div id="conteneur">
		
<!--HEADER-->		
			<?php getHeader(); ?>
<!--FIN HEADER-->

<!--CONTENU-->		
			<div id="contenu_annexe">
				<div class="boitegrise_626">
					<h2>&nbsp;Mot de passe oublié, merci de taper votre adresse mail</h2></center></br >
						<form action='ForgotPwd.php' align='center' method='post' name='Log'>
							<table align="center">
								<tr><td>Email</td><td><input type='text' name='email' value='<?php echo $email; ?>' /></td></tr>
							</table>
							<?php if($error != "") echo $error;?>
								</br ><input type='submit' class='send' value='Envoyer' /></br >
						</form>
					<div class="finboite"></div>
				</div>
				


	<!-- EXEMPLE DE BOITE POUR LE SITE
				CORRESPOND A UNE BOITE SMALL
				<div class="boitegrise_305">
					<h2>Exemple boite petie</h2>
					<p>
						Exemple
					</p>
					<div class="finboite"></div>
				</div>
				CORRESPON A LA BOITE MEDIUM
				<div class="boitegrise_466 sans_marge_gauche">
					<h2>Exemple boite medium</h2>
					 <p>
						Exemple
					</p>
					<div class="finboite"></div>
				</div>
	FIN EXEMPLE DE BOITE-->
	
	
				<div class="spacer"></div>
			</div>
<!--FIN CONTENU-->
		
<!--FOOTER-->			
			<?php getFooter(); ?>
<!--FIN FOOTER-->
			
		</div>
	</body>
</html>
