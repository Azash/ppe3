<?php 
	//Pour se connecter à la base de données
	include("FctPhp.php");
	include("connexionbdd.php");
	session_start();
	
	if (!isset($_SESSION['id'])) {
		//header('location:index.php');
	}
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
		<div id="conteneur">
<!--HEADER-->		
	<?php getHeader(); ?>
<!--FIN HEADER-->
<!--CONTENU-->			
			<div id="contenu_annexe">
			<div><!--avatar-->
			</div>
<div class="boitegrise_626">
<h2>&nbsp;Informations personnelles</h2>
&nbsp;Ville<br>
&nbsp;Code postale<br>
&nbsp;Numéro de téléphone<br>
&nbsp;Description personnel
<div class="finboite"></div>
</div>
<div class="boitegrise_626">
<h2>&nbsp;Informations activitées</h2>
&nbsp;Sport<br>
&nbsp;Niveau sportif<br>
&nbsp;Le jour de la semaine<br>
&nbsp;Plage horaires
<div class="finboite"></div>
</div>
<div  class="boitegrise_626"><!--Configuration-->
<h2>&nbsp;Paramètre du compte</h2>
&nbsp;Mot de passe<br>
&nbsp;Le choix de faire apparaitre ou non les informations personnelles (email et numéro de téléphone) dans les résultats de recherche.
<div class="finboite"></div>
</div>
<!--Fin de Zone Estelle-->
				
				<!--CORRESPOND A UNE BOITE SMALL
				<div class="boitegrise_305">
					<h2></h2>
					<div class="finboite"></div>
				</div>-->
				<!--CORRESPON A LA BOITE MEDIUM
				<div class="boitegrise_466 sans_marge_gauche">
					<h2></h2>
					<div class="finboite"></div>
				</div>
				-->
				<div class="spacer"></div>
			</div>
<!--FIN CONTENU-->			
<!--FOOTER-->			
			<?php getFooter(); ?>
<!--FIN FOOTER-->			
		</div>
	</body>
</html>