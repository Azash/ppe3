<?php 
	session_start();
	//Pour se connecter à la base de données
	include('connexionbdd.php');
	include('FctPhp.php');
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
				<div class="boitegrise_785">
					<h2>&nbsp;Trouvez des partenaires de sport près de chez vous</h2>
		<!-- ZONE POUR HICHEM !!!!!!!
						
						
						
		FIN ZONE POUR HICHEM -->
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