<!DOCTYPE HTML>

<?php
	include "connexionbdd.php";
	include "FctPhp.php";
	
	$email = "";
	$error = "";
	if (isset($_POST["email"])) $email = $_POST["email"];
		if ($email != "") {
			$sql = "SELECT id, prenom, email FROM users WHERE email='".$email."'";
			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
			$data = mysql_fetch_assoc($req);
			$prenom = $data['prenom'];
			$id = $data['id'];
			
			if($data['email'] == $email) {
				$pass = '';
				for ($i = 1; $i <= 8; $i++) {
								$pass .= chr(rand(65, 90)); //33 = premier caractere imprimable de la table ascii, 125 = dernier qui nous interesse...
							}
							
				$sqlPass = "UPDATE users SET pass = '".$pass."' WHERE email='".$email."'";
				$reqPass = mysql_query($sqlPass) or die('Erreur SQL !<br>'.$sqlPass.'<br>'.mysql_error());
				
								// Envoi du mail !
									$sujet = 'Sujet de l\'email';
									$message = "Bonjour, ".$prenom."
									Pour redéfinir votre mot de passe veuillez cliquer sur ce lien : http://www.m2lsports.guillaumeboudy.com/ppe3/RedefineMdp.php?id=".$data['id']."&pass=".$pass."
									Merci :)";
									$headers = "From: postmaster@guillaumeboudy.com\n";
									$headers .= "Reply-To: postmaster@guillaumeboudy.com\n";
									$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"";
									if (mail($email,$sujet,$message,$headers)) {
										echo "L'email a bien été envoyé.";
									}
									else {
										echo "Une erreur c'est produite lors de l'envois de l'email.";
									}
								///////////////////////////////////////////////////////////////////////////////////
			} else {
				$error = "Email introuvable dans la base donnée.";
			}
	}
?>
<meta charset="utf-8">
<html xmlns="http://www.w3.org/1999/xhtml">
	<title>Sports&cies</title>
	<link rel="stylesheet" href="style.css" type="text/css" charset="utf-8">
	<!--<script style="" type="text/javascript" src="/global/jquery-1.11.0.min.js"></script>-->
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="Author" content="Sports&cie">
	<meta name="description" content="Sur Sports&cies trouvez des activités près de chez vous, Organisez vos sports et loisirs avec vos amis, Trouvez de nouveaux partenaires.">
	<meta name="Keywords" content="Sports&cies, sports et loisirs, sport, loisir, coach, reseau, social, bien, etre, bien-etre, loisirs, sports, communaute, social">

	<!--<link rel="shortcut icon" href="/favicon.ico">-->
	<body>
		<div id="conteneur">
		
<!--HEADER-->		
			<?php getHeader(); ?>
<!--FIN HEADER-->

<!--CONTENU-->		
			<div id="contenu_annexe">
				<div class="boitegrise_626">
					<h2>&nbsp;Mot de passe oublié</h2>
					<p align="center">
						Vous avez oublié votre mot de passe. Merci d'inscrire votre adresse mail
					</p>
					<br />
					<form action='ForgotMdp.php' align='center' method='post' name='Log'>
						<table align="center">
							<tr><td>Email</td><td><input type='email' name='email' value='<?php echo $email; ?>' /></td></tr>
						</table>
						<span style="color:red"><?php if($error != "") echo $error;?></span>
							</br ><input type='submit' class='send' value='Envoyer' /></br >
					</form>
					<div class="finboite"></div>
				</div>
				<div class="spacer"></div>
			</div>
<!--FIN CONTENU-->
		
<!--FOOTER-->			
			<?php getFooter(); ?>
<!--FIN FOOTER-->
			
		</div>
	</body>
</html>
