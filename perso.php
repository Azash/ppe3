<?php 
	//Pour se connecter à la base de données
	include("FctPhp.php");
	include("connexionbdd.php");
	session_start();
	
	if (!isset($_SESSION['id'])) {
		//header('location:index.php');
	}
	else {
		$UserCurrentId = $_SESSION['id'];
		if (!isset($_GET['id']))
			$id = $_SESSION['id'];
		else
			$id = $_GET['id'];
		$req = "select nom, prenom, birth, mdp, sexe, email, avatar, ville, codePostal, tel, description, afficheEmail, afficheTel from users where id=".$id;
		$resultat = mysql_query($req) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		$ligne = mysql_fetch_assoc($resultat);
		$nom = $ligne['nom'];
		$prenom = $ligne['prenom'];
		$birth = $ligne['birth'];
		$mdp = $ligne['mdp'];
		$sexe = $ligne['sexe'];
		$email = $ligne['email'];
		$avatar = $ligne['avatar'];
		$ville = $ligne['ville'];
		$codePostal = $ligne['codePostal'];
		$tel = $ligne['tel'];
		$description = $ligne['description'];
		$afficheEmail = $ligne['afficheEmail'];
		$afficheTel = $ligne['afficheTel'];
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
					&nbsp;Nom : <?php echo $nom; ?><br>
					&nbsp;Prénom : <?php echo $prenom; ?><br>
					&nbsp;Date d'anniversaire : <?php echo $birth; ?><br>
					&nbsp;Sexe : <?php echo $sexe; ?><br>
					&nbsp;Téléphone : <?php echo $tel; ?><br>
					&nbsp;Email : <?php echo $email; ?><br>

					&nbsp;Ville : <?php echo $ville; ?><br>
					&nbsp;Code postal : <?php echo $codePostal; ?><br>

					&nbsp;Description personnelle : <?php echo $description; ?>
					<div class="finboite"></div>
				</div>
				<div class="boitegrise_626">
					<h2>&nbsp;Activitées</h2>
					<div class="finboite"></div>
				</div>
				<?php
				if ($id == $UserCurrentId) {
					echo '<form type="POST" action="perso.php" >
					<input type="submit" name="ModAccount" value="Modifier les paramètres du compte" class="modif_compte"/>
					</form>';
					}
				?>
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