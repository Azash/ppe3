<?php 
	session_start();
	//Pour se connecter à la base de données
	include('connexionbdd.php');
	include('Connexion.php');
	include('fctPhp.php');
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
				<div id="ctl00_pageContenu_pnCarte">
					<div class="photo_pres">
						<h1>Bonne navigation!</h1>
						<?php
							if(isset($_SESSION['email']))  //indique que quelqu'un s'est bien connecté. pour éviter que n'importe qui puisse se connecter
							{
							echo "<p>Bonjour, vous êtes connecté avec votre compte</p> ".$_SESSION['email'];


							//echo "Bonjour ".$_SESSION['email'];



						?>
							<a href="./deconnexion.php" >Me déconnecter</a><br/>
							<a href="./Update.php" >Changer mes informations</a><br/>
							<a href="./Desinscription.php" >Me désinscrire</a><br/>
								
						<?php 

							//si quelqu'un vient changer l'url manuellement sans se connecter, il est automatiquement renvoyé vers la page Connexion.php
							}else{
							header('Location:Connexion.php'); 
							}


						?>
					</div>
				</div>
<!--Zone Pour Estelle-->
				<div id="ctl00_pageContenu_connexion">
					<div id="login" class="boitegrise_305">
						<h2>&nbsp;Connectez-vous</h2>
						<form method = "post" action ="Connexion.php">
							<p>
								<label for="ctl00_pageContenu_email" id="ctl00_pageContenu_mailLabel">Mail</label>
								<input name="email" id="ctl00_pageContenu_email" type="text">
							</p>
							<p>
								<label for="ctl00_pageContenu_pass" id="ctl00_pageContenu_passLabel">Mot de passe</label>
								<input name="mdp" id="ctl00_pageContenu_pass" type="password">
							</p>
							<p class="align_image">
								<input type="submit" name="submit" value="Se connecter" />
							</p>
						</form>
						<p style="margin-top: 6px" align="center"><a href="/mdp/mdp.aspx" onclick="window.open(this.href,'Oubli_Mot_de_Passe','height=250,width=300,scrollbars=no,toolbar=no,menubar=no,resizeable=yes,status=no'); return false;">
						Oubli du mot de passe ?</a></br><a href="FormInscription.php">Pas encore membre?</a></p>
						
						<div class="finboite"></div>
					</div>
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