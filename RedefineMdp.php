<!DOCTYPE HTML>
<?php 
	//Pour se connecter à la base de données
	include('connexionbdd.php');
	include('FctPhp.php');
?>

<?php
	mysql_query("set names 'utf8'");
	
	if(isset($_POST['submit'])) {
	$mdp = htmlspecialchars($_POST["mdp"]);
	$re_mdp = htmlspecialchars(trim($_POST['re_mdp']));
	$getId = $_GET["id"];
	$getPass = $_GET['pass'];
	
	$sql = "SELECT id, pass FROM users WHERE id='".$getId."'";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	$data = mysql_fetch_assoc($req);
	
	if ($getPass == $data['pass'] && $getId == $data["id"]) 
		{	
		if($mdp && $re_mdp)
			{
				if($mdp == $re_mdp)
				{
					$mdp = SHA1($mdp);   //cryptage du mdp
					$pass = '';
					//include_once 'includes/connexionbdd.inc.php';
					//$query = mysql_query("INSERT INTO users VALUES('', '$nom', '$prenom', '" . $anneeNaissance . "-" . $moisNaissance . "-" . $jourNaissance . "-1', $sexe', '$email', '$mdp')");
					
					for ($i = 1; $i <= 8; $i++) {
						$pass .= chr(rand(65, 90)); //33 = premier caractere imprimable de la table ascii, 125 = dernier qui nous interesse...
					}
					
					$sqlUpdate = "UPDATE users SET pass = '".$pass."', mdp = '".$mdp."' WHERE email='".$email."'";
					$resUpdate = mysql_query($sqlUpdate) or die('Erreur SQL !<br>'.$sqlUpdate.'<br>'.mysql_error());
					
					if(!$resUpdate) echo mysql_error();
					
					echo "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />Votre mot de passe a bien été modifié, vous pouvez désormais vous reconnecter avec votre nouveau mot de passe.";
					header('Refresh: 4;url=index.php');
					
					//mysql_query("INSERT INTO users VALUES('', '$nom', '$prenom', '" . $anneeNaissance . "-" . $moisNaissance . "-" . $jourNaissance . "', $sexe', '$email', '$mdp')");
					//die('Formulaire bien rempli! Vous allez maintenant reçevoir un mail avec un mot de passe de confirmation. Vous pourrez ensuite choisir votre propre mot de passe pour vous connecter.<a href="index.php">Continuer mon inscription</a>');
				}else echo "Les mots de passe ne sont pas identiques";
			}else echo "Veuillez saisir tous les champs !";
		}
	}
?>
<meta charset="utf-8">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
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
					<h2>&nbsp;Désinscription</h2>
						<form method = "post" action ="RedefineMdp.php">
							<p align="center">
								Veuillez saisir votre nouveau mot de passe.
							</p><br />
							<table align="center">
								<tr>
									<td><label>&nbsp;Votre mot de passe : </label></td>
									<td><input type="password" name="mdp"></td>
								</tr>

								<tr>
									<td><label>&nbsp;Répetez votre mot de passe : </label></td>
									<td><input type="password" name="re_mdp"></td>
								</tr>
							</table>
							<br />
							<div align="center"><input type="submit" name="submit" value="Changer mon mot de passe" /></div>
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