<?php 
	session_start();
	//Pour se connecter � la base de donn�es
	include('connexionbdd.php');
	include('FctPhp.php');
?>

	<meta charset="utf-8">
<html xmlns="http://www.w3.org/1999/xhtml">
	<title>Sports&cies</title>
	<link rel="stylesheet" href="style.css" type="text/css" charset="utf-8">
	<!--<script style="" type="text/javascript" src="/global/jquery-1.11.0.min.js"></script>-->
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="Author" content="Sports&cie">
	<meta name="description" content="Sur Sports&cies trouvez des activit�s pr�s de chez vous, Organisez vos sports et loisirs avec vos amis, Trouvez de nouveaux partenaires.">
	<meta name="Keywords" content="Sports&cies, sports et loisirs, sport, loisir, coach, reseau, social, bien, etre, bien-etre, loisirs, sports, communaute, social">

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
						<h1>Exemple</h1>
						<p>
							ExempleExempleExempleExempleExempleExemple<br />
							ExempleExempleExempleExempleExempleExemple<br />
							Exemple<br />
							ExempleExemple <br />
							ExempleExempleExempleExempleExempleExemple<br />
							ExempleExempleExempleExemple
						</p>
					</div>
				</div>
				
	<!--Zone connexion (� virer si pas util)-->
				<div id="ctl00_pageContenu_connexion">
					<div id="login" class="boitegrise_305">
					<?php
						if (isset($_SESSION['id'])) {
							echo '<h2>&nbsp;Vous �tes CONNECTEZ</h2><form method="post" action="Connexion.php">
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
						</form>';
						}
						else {
							echo "ID = ".$_SESSION['id']."\n";
							echo '<h2>&nbsp;Connectez-vous</h2><form method = "post" action ="Connexion.php">
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
						</form>';
						}
						?>
						
						<p style="margin-top: 6px" align="center"><a href="/mdp/mdp.aspx" onclick="window.open(this.href,'Oubli_Mot_de_Passe','height=250,width=300,scrollbars=no,toolbar=no,menubar=no,resizeable=yes,status=no'); return false;">
						Oubli du mot de passe ?</a></br><a href="FormInscription.php">Pas encore membre?</a></p>
						
						<div class="finboite"></div>
					</div>
				</div>
	<!--Fin de Zone connexion-->


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