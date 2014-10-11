<?php 
	//Pour se connecter à la base de données
	include("FctPhp.php");
	include("connexionbdd.php");
	session_start();
	
	if (!isset($_SESSION['id'])) {
		header('location:index.php');
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
		if ($id == $UserCurrentId && isset($_POST['modif']))
			$modif = true;
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
				
				<?php
				if ($id == $UserCurrentId && isset($_POST['modif_perso'])) {
					echo '<div class="boitegrise_466 sans_marge_gauche">
						<h2>&nbsp;Informations personnelles</h2>
						<form method="POST" action="perso.php">
						&nbsp;Nom : <input type="text" value="'.$nom.'" /><br>
						&nbsp;Prénom : <input type="text" value="'.$prenom.'" /><br>
						&nbsp;Date d\'anniversaire : '.$birth.'" /><br>
						&nbsp;Sexe : '.$sexe.'<br>
						&nbsp;Téléphone : <input type="text" value="'.$tel.'" /><br>
						&nbsp;Email : <input type="text" value="'.$email.'" /><br>

						&nbsp;Ville : <input type="text" value="'.$ville.'" /><br>
						&nbsp;Code postal : <input type="text" value="'.$codePostal.'" /><br>

						&nbsp;Description personnelle : <br><textarea value="'.$description.'" class="modif_compte"></textarea><br><br>
						<input type="submit" name="modif_perso_valid" value="Valider" class="modif_compte_valid"/>
						<input type="submit" value="Annuler" class="modif_compte_valid"/>
						</form>
						<div class="finboite"></div>
						</div>';
				}
				else {
					echo '<div class="boitegrise_466 sans_marge_gauche">
						<h2>&nbsp;Informations personnelles</h2>
						
						&nbsp;Nom :'.$nom.'<br>
						&nbsp;Prénom : '.$prenom.'<br>
						&nbsp;Date d\'anniversaire : '.$birth.'<br>
						&nbsp;Sexe : '.$sexe.'<br>
						&nbsp;Téléphone : '.$tel.'<br>
						&nbsp;Email : '.$email.'<br>

						&nbsp;Ville : '.$ville.'<br>
						&nbsp;Code postal : '.$codePostal.'<br>

						&nbsp;Description personnelle : '.$description.'<br><br>
						<form method="POST" action="perso.php" >
							<input type="submit" name="modif_perso" value="Modifier mes informations personnelles" class="modif_compte"/>
						</form>
						
						<div class="finboite"></div>
						</div>';
				}
				
				getConnexion();
				if ($id == $UserCurrentId && isset($_POST['modif_activite'])) {
					echo '<div class="boitegrise_466 sans_marge_gauche">
						<h2>&nbsp;Activitées</h2>
						<br>
						<form method="POST" action="perso.php" >
						<input type="submit" name="modif_activite_valid" value="Valider" class="modif_compte_valid"/>
						<input type="submit" value="Annuler" class="modif_compte_valid"/>
						</form>
						<div class="finboite"></div>
						</div>';
				}
				else {
					echo '<div class="boitegrise_466 sans_marge_gauche">
						<h2>&nbsp;Activitées</h2>
						<br>
						<form method="POST" action="perso.php" >
							<input type="submit" name="modif_activite" value="Modifier mes activitées" class="modif_compte"/>
						</form>
						<div class="finboite"></div>
						</div>';
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
			</div><div class="spacer"></div>
<!--FIN CONTENU-->			
<!--FOOTER-->			
			<?php getFooter(); ?>
<!--FIN FOOTER-->			
		</div>
	</body>
</html>