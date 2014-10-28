<!DOCTYPE HTML>
<?php 
	//Pour se connecter à la base de données
	include('connexionbdd.php');
	include('FctPhp.php');
?>

<?php
	mysql_query("set names 'utf8'");
	$getId = $_GET['id'];
	$getPass = $_GET['pass'];
	
	$sql = "SELECT id, pass FROM users WHERE id='".$getId."'";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	$data = mysql_fetch_assoc($req);
	
	if(isset($_POST['submit'])) {
	$mdp = htmlspecialchars($_POST["mdp"]);
	$re_mdp = htmlspecialchars(trim($_POST['re_mdp']));
	
	
	if ($getPass == $data['pass'] && $getId == $data['id']) 
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
					
					$sqlUpdate = "UPDATE users SET pass = '".$pass."', mdp = '".$mdp."' WHERE id='".$getId."'";
					$resUpdate = mysql_query($sqlUpdate) or die('Erreur SQL !<br>'.$sqlUpdate.'<br>'.mysql_error());
					
					if(!$resUpdate) echo mysql_error();
					
					echo "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />Votre mot de passe a bien été modifié, vous pouvez désormais vous reconnecter avec votre nouveau mot de passe.";
					header('Refresh: 4;url=index.php');
					
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
					<h2>&nbsp;Envoyez votre message !</h2>
						<table style="text-align:center" align="center">								
							<form id='formgui' action='formgui.php' method='post'>
								<tr>
									<td><input placeholder="Nom" type='text' name='name' id="name"/></td>
									<td><input placeholder="Email" type='text' name='email' id='email'/></td>
								</tr>
								<tr>	
									<td><input placeholder="Objet" type='text' name='object' id='object'/></td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td><textarea  placeholder="Saisir votre message" name='message' id='message'></textarea></td>
								</tr>
								<tr>
									<td><input class='send' type='submit' value='Envoyer'></td>
									<td>&nbsp;</td>
								</tr>								
							</form>
						</table>
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