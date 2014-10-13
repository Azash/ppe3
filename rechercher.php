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
		if (!isset($_GET['id'])) {
			$id = $_SESSION['id'];
		}
		else {
			$id = $_GET['id'];
		}
		if ($id == $UserCurrentId) {
			if (isset($_POST["modif_perso_valid"])) {
				//if (checkDataUser($_POST))
					///////Reprendre içi !!!!
			}
			if (isset($_POST['modif']))
				$modif = true;
		} 
				
		$req = "SELECT activitie FROM activities ORDER BY activitie";
		$resultat = mysql_query($req);
		$ligne = mysql_fetch_assoc($resultat);
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
				if ($id == $UserCurrentId && isset($_POST['modif_recherche'])) {
					echo '<label for="ctl00_pageContenu_postal" id="ctl00_pageContenu_Label1">Sport: </label>
						<select name="Activité" id="ctl00_pageContenu_ddl_loisir">';
							<?php
								$req = "SELECT activitie FROM activities ORDER BY activitie";
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
						<a href="#">Tout afficher</a>';
				}
				else {
					if ($codePostal == 0)
						$codePostal = "";
					echo '<div class="boitegrise_466 sans_marge_gauche">
						<h2>&nbsp;Informations personnelles</h2>

						&nbsp;Nom :'.$nom.'<br>
						&nbsp;Prénom : '.$prenom.'<br>
						&nbsp;Date d\'anniversaire : '.$birth.'<br>
						&nbsp;Sexe : '.$sexe.'<br>';
						if ($afficheEmail == 1) echo '&nbsp;Téléphone : '.$tel.'<br>';
						if ($AfficheTel == 1) echo '&nbsp;Email : '.$email.'<br>';

						echo '&nbsp;Ville : '.$ville.'<br>
						&nbsp;Code postal : '.$codePostal.'<br>

						&nbsp;Description personnelle : '.$description.'<br><br>';
						if ($id == $UserCurrentId) {
							echo '&nbsp;Afficher mon email : '; if ($afficheEmail == 0) echo "Non"; else echo "Oui"; echo '<br>
							&nbsp;Afficher mon numéro : '; if ($AfficheTel == 0) echo "Non"; else echo "Oui"; echo '<br><br>';
						}
						if ($id == $UserCurrentId)
						echo '
						<form method="POST" action="perso.php" >
							<input type="submit" name="modif_perso" value="Modifier mes informations personnelles" class="modif_compte"/>
						</form>';
						echo '
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
						<br>';
						if ($id == $UserCurrentId)
						echo '
						<form method="POST" action="perso.php" >
							<input type="submit" name="modif_activite" value="Modifier mes activitées" class="modif_compte"/>
						</form>';
						echo '
						<div class="finboite"></div>
						</div>';
				}
				?>
				<div class="spacer"></div>
			</div><div class="spacer"></div>
<!--FIN CONTENU-->			
<!--FOOTER-->			
			<?php getFooter(); ?>
<!--FIN FOOTER-->			
		</div>
	</body>
</html>