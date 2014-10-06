<?php 
	//Pour se connecter à la base de données
	include "connexion.php";
	include "header.php";
?>
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
		<div id='conteneur'>
<!--CONTENU-->		
			<div id="contenu_annexe">
				<div id="ctl00_pageContenu_pnCarte">
					<div class="photo_pres">
						<h1>Trouvez des partenaires de sport près de chez vous</h1>
						<label for="ctl00_pageContenu_postal" id="ctl00_pageContenu_Label1">Sport: </label>
						<select name="Activité" id="ctl00_pageContenu_ddl_loisir">
							<?php
								$req = sprintf("SELECT activitie FROM activities ORDER BY activitie");
								$resultat = mysql_query($req);
								$ligne = mysql_fetch_assoc($resultat);
								while($ligne){
									echo '<option value="'.$ligne["activitie"].'">'.$ligne["activitie"].'</option>';
									$ligne = mysql_fetch_assoc($resultat);
								}	
							?>
						</select>
						<label for="ctl00_pageContenu_postal" id="ctl00_pageContenu_postalLbl">Département : </label>
						<select name="ctl00$pageContenu$postal" id="ctl00_pageContenu_postal">
							<?php
								$req = sprintf("SELECT dep FROM departements");
								$resultat = mysql_query($req);
								$ligne = mysql_fetch_assoc($resultat);
								while($ligne){
									echo '<option value="'.$ligne["dep"].'">'.$ligne["dep"].'</option>';
									$ligne = mysql_fetch_assoc($resultat);
								}	
							?>
						</select>
						<!-- <label for="ctl00_pageContenu_postal" id="ctl00_pageContenu_postalLbl">Code Postal: </label>
						<input name="ctl00$pageContenu$postal" maxlength="5" id="ctl00_pageContenu_postal" style="width:50px;" type="text"> -->
						<input name="ctl00$pageContenu$btnTrouver" value="Trouver" id="ctl00_pageContenu_btnTrouver" type="submit">
						<a href="#">Tout afficher</a>
					</div>
				</div>
<!--Zone Pour Estelle-->
				<div id="ctl00_pageContenu_connexion">
					<div id="login" class="boitegrise_305">
						<h2>&nbsp;Connectez-vous</h2>
						<p>
							<label for="ctl00_pageContenu_email" id="ctl00_pageContenu_mailLabel">Mail</label>
							<input name="ctl00$pageContenu$email" id="ctl00_pageContenu_email" type="text">
						</p>
						<p>
							<label for="ctl00_pageContenu_pass" id="ctl00_pageContenu_passLabel">Mot de passe</label>
							<input name="ctl00$pageContenu$pass" id="ctl00_pageContenu_pass" type="password">
						</p>
						<p class="align_image">
							Se connecter
						</p>
						<p style="margin-top: 6px" align="center"><a href="/mdp/mdp.aspx" onclick="window.open(this.href,'Oubli_Mot_de_Passe','height=250,width=300,scrollbars=no,toolbar=no,menubar=no,resizeable=yes,status=no'); return false;">
						Oubli du mot de passe ?</a></p>
						<div class="finboite"></div>
					</div>
				</div>
<!--Fin de Zone Estelle-->
				<!--
				CORRESPOND A UNE BOITE SMALL
				<div class="boitegrise_305">
					<h2></h2>
					<div class="finboite"></div>
				</div>
				CORRESPON A LA BOITE MEDIUM
				<div class="boitegrise_466 sans_marge_gauche">
					<h2></h2>
					<div class="finboite"></div>
				</div>
				-->
				<div class="spacer"></div>
			</div>
<!--FIN CONTENU-->				
		</div>
	</body>
</html>