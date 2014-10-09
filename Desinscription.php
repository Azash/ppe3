<?php 
	session_start();
	//Pour se connecter à la base de données
	include('connexionbdd.php');
	include('FctPhp.php');
?>

<?php  /* SE DESINSCRIRE*/

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
		
		$Connexion = mysql_query("SELECT id FROM users WHERE email='$email' AND mdp='$mdp'");
		$select = mysql_fetch_array($Connexion, MYSQL_ASSOC);
		
		
		if(count($select) > 0)
		{			
			mysql_query("DELETE FROM users WHERE id = '{$_SESSION['id']}'");
			header('location:Deconnexion.php'); //(=connexion réussie)
		}
		else 

			$message= "Email ou mot de passe incorrect";
		}
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
				<div id="ctl00_pageContenu_pnCarte">
					<h1>&nbsp;Désinscription</h1>
						<form method = "post" action ="Desinscription.php">
							<p class="align_image">
								<label for="ctl00_pageContenu_email" id="ctl00_pageContenu_mailLabel">Mail</label>
								<input name="email" id="ctl00_pageContenu_email" type="text" autofocus>
							</p>
							<p class="align_image">
								<label for="ctl00_pageContenu_pass" id="ctl00_pageContenu_passLabel">Mot de passe</label>
								<input name="mdp" id="ctl00_pageContenu_pass" type="password">
							</p>
							<p class="align_image">
								<input type="submit" name="submit" value="Se désinscrire du site" />
							</p>
						</form>
						
						<p style="margin-top: 6px" align="center"><a href="/mdp/mdp.aspx" onclick="window.open(this.href,"Oubli_Mot_de_Passe","height=250,width=300,scrollbars=no,toolbar=no,menubar=no,resizeable=yes,status=no""); return false;">
						Oubli du mot de passe ?</a>
						</p>
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
