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
					$birth = $_POST['anneeNaissance']."-".$_POST['moisNaissance']."-".$_POST['jourNaissance'];
					mysql_query("UPDATE users SET nom='".$_POST['nom']."', prenom='".$_POST['prenom']."', birth='".$birth."', 
					sexe='".$_POST['sexe']."', email='".$_POST['email']."', ville='".$_POST['ville']."', codePostal='".$_POST['codePostal']."', 
					tel='".$_POST['tel']."', description='".$_POST['description']."', afficheEmail='".$_POST['afficheEmail']."', AfficheTel='".$_POST['AfficheTel']."' WHERE id=".$id)or die(mysql_error());
			}
			if (isset($_POST['modif']))
				$modif = true;
		} 
		if ($id == $UserCurrentId) {
			if (isset($_POST["modif_dispo_valid"])) {
				//if (checkDataUser($_POST))
					foreach($_POST['dispo'] as $valeur)
					{
						$sqlDispo = "UPDATE dispo SET ".$valeur ."='1' WHERE idUser = '".$id."'";
						mysql_query($sqlDispo) or die('Erreur SQL !<br>'.$sqlDispo.'<br>'.mysql_error());
					}
			}
			if (isset($_POST['modif']))
				$modif = true;
		} 
		$req = "SELECT nom, prenom, birth, mdp, sexe, email, avatar, ville, codePostal, tel, description, afficheEmail, AfficheTel FROM users WHERE id=".$id;
		$resultat = mysql_query($req) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		$ligne = mysql_fetch_assoc($resultat);
		$nom = $ligne['nom'];
		$prenom = $ligne['prenom'];
		$birth = $ligne['birth'];
		$birthEx = explode("-", $birth);
		$jour = $birthEx[2];
		$mois = $birthEx[1];
		$annee = $birthEx[0];
		$mdp = $ligne['mdp'];
		$sexe = $ligne['sexe'];
		$email = $ligne['email'];
		$avatar = $ligne['avatar'];
		$ville = $ligne['ville'];
		$codePostal = $ligne['codePostal'];
		$tel = $ligne['tel'];
		$description = $ligne['description'];
		$afficheEmail = $ligne['afficheEmail'];
		$AfficheTel = $ligne['AfficheTel'];
		
		$sqlDispo2 = "SELECT * FROM dispo WHERE idUser='".$id."'";
		$reqDispo2 = mysql_query($sqlDispo2) or die('Erreur SQL !<br>'.$sqlDispo2.'<br>'.mysql_error());
		$dataDispo2 = mysql_fetch_assoc($reqDispo2);
		
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
						<form method="POST" action="dispo.php">
						&nbsp;Nom : <input type="text" name="nom" value="'.$nom.'" /><br>
						&nbsp;Prénom : <input type="text" name="prenom" value="'.$prenom.'" /><br>
						&nbsp;Date d\'anniversaire : '; ShowListBoxBirth($jour, $mois, $annee); echo '<br>
						&nbsp;Sexe : <input type="radio" name="sexe" value="Homme" '; if ($sexe == "Homme") echo "checked"; echo ' /> Homme <input type="radio" name="sexe" value="Femme" '; if ($sexe == "Femme") echo "checked"; echo ' /> Femme<br>
						&nbsp;Téléphone : <input type="text" name="tel" value="'.$tel.'" /><br>
						&nbsp;Email : <input type="text" name="email" value="'.$email.'" /><br>

						&nbsp;Ville : <input type="text" name="ville" value="'.$ville.'" /><br>
						&nbsp;Code postal : <input type="text" name="codePostal" value="'.$codePostal.'" /><br>

						&nbsp;Description personnelle : <br><textarea name="description" value="'.$description.'" class="modif_compte">'.$description.'</textarea><br><br>
						
						&nbsp;Afficher mon email : <input type="radio" name="afficheEmail" value="1" '; if ($afficheEmail == "1") echo "checked"; echo ' /> Oui <input type="radio" name="afficheEmail" value="0" '; if ($afficheEmail == "0") echo "checked"; echo ' /> Non<br>
						&nbsp;Afficher mon numéro : <input type="radio" name="AfficheTel" value="1" '; if ($AfficheTel == "1") echo "checked"; echo ' /> Oui <input type="radio" name="AfficheTel" value="0" '; if ($AfficheTel == "0") echo "checked"; echo ' /> Non<br>
						<br>
						<input type="submit" name="modif_perso_valid" value="Valider" class="modif_compte_valid"/>
						<input type="submit" value="Annuler" class="modif_compte_valid"/>
						</form>
						<div class="finboite"></div>
						</div>';
				}
				else {
					if ($codePostal == 0)
						$codePostal = "";
					echo '<div class="boitegrise_466 sans_marge_gauche">
						<h2>&nbsp;Informations personnelles</h2>

						&nbsp;Nom : '.$nom.'<br>
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
						<form method="POST" action="dispo.php" >
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
						<form method="POST" action="dispo.php" >
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
						<form method="POST" action="dispo.php" >
							<input type="submit" name="modif_activite" value="Modifier mes activitées" class="modif_compte"/>
						</form>
						<div class="finboite"></div>
						</div>';
				}
				
				if ($id == $UserCurrentId && isset($_POST['modif_dispo'])) {
					echo '<div class="boitegrise_466 sans_marge_gauche">
						<h2>&nbsp;Dispo</h2>
						<br>
						<form method="POST" action="dispo.php" >
							<table border="0" style="width: 90%;" align="center">
							<tbody>
								<tr>
									<td style="text-align:center">
										&nbsp;
									</td>
									<td style="text-align:center">
										Lun
									</td>
									<td style="text-align:center">
										Mar
									</td>
									<td style="text-align:center">
										Mer
									</td>
									<td style="text-align:center">
										Jeudi
									</td>
									<td style="text-align:center">
										Ven
									</td>
									<td style="text-align:center">
										Sam
									</td>
									<td style="text-align:center">
										Dim
									</td>
								</tr>
								<tr>
									<td style="text-align:right">
										Matin :
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="L1">
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="Ma1">
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="Me1">
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="J1">
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="V1">
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="S1">
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="D1">
									</td>
								</tr>
								<tr>
									<td style="text-align:right">
										Après-midi :
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="L2">
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="Ma2">
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="Me2">
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="J2">
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="V2">
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="S2">
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="D2">
									</td>
								</tr>
								<tr>
									<td style="text-align:right">
										Soir :
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="L3">
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="Ma3">
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="Me3">
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="J3">
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="V3">
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="S3">
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="D3">
									</td>
								</tr>
							</tbody>
						</table>
						<br />
						<input type="submit" name="modif_dispo_valid" value="Valider" class="modif_compte_valid"/>
						<input type="submit" value="Annuler" class="modif_compte_valid"/>
						</form>
						<div class="finboite"></div>
						</div>';
				}
				else {
					echo '<div class="boitegrise_466 sans_marge_gauche">
						<h2>&nbsp;Dispo</h2>
						<br>
						<table border="0" style="width: 90%;" align="center">
							<tbody>
								<tr>
									<td style="text-align:center">
										&nbsp;
									</td>
									<td style="text-align:center">
										Lun
									</td>
									<td style="text-align:center">
										Mar
									</td>
									<td style="text-align:center">
										Mer
									</td>
									<td style="text-align:center">
										Jeudi
									</td>
									<td style="text-align:center">
										Ven
									</td>
									<td style="text-align:center">
										Sam
									</td>
									<td style="text-align:center">
										Dim
									</td>
								</tr>
								<tr>
									<td style="text-align:right">
										Matin :
									</td>
									<td style="text-align:center">';
										if ($dataDispo2['L1'] == "1") echo 'X
									</td>
									<td style="text-align:center">';
										if ($dataDispo2['Ma1'] == "1") echo 'X
									</td>
									<td style="text-align:center">';
										if ($dataDispo2['Me1'] == "1") echo 'X
									</td>
									<td style="text-align:center">';
										if ($dataDispo2['J1'] == "1") echo 'X
									</td>
									<td style="text-align:center">';
										if ($dataDispo2['V1'] == "1") echo 'X
									</td>
									<td style="text-align:center">';
										if ($dataDispo2['S1'] == "1") echo 'X
									</td>
									<td style="text-align:center">';
										if ($dataDispo2['D1'] == "1") echo 'X
									</td>
								</tr>
								<tr>
									<td style="text-align:right">
										Après-midi :
									</td>
									<td style="text-align:center">';
										if ($dataDispo2['L2'] == "1") echo 'X
									</td>
									<td style="text-align:center">';
										if ($dataDispo2['Ma2'] == "1") echo 'X
									</td>
									<td style="text-align:center">';
										if ($dataDispo2['Me2'] == "1") echo 'X
									</td>
									<td style="text-align:center">';
										if ($dataDispo2['J2'] == "1") echo 'X
									</td>
									<td style="text-align:center">';
										if ($dataDispo2['V2'] == "1") echo 'X
									</td>
									<td style="text-align:center">';
										if ($dataDispo2['S2'] == "1") echo 'X
									</td>
									<td style="text-align:center">';
										if ($dataDispo2['D2'] == "1") echo 'X
									</td>
								</tr>
								<tr>
									<td style="text-align:right">
										Soir :
									</td>
									<td style="text-align:center">';
										if ($dataDispo2['L3'] == "1") echo 'X
									</td>
									<td style="text-align:center">';
										if ($dataDispo2['Ma3'] == "1") echo 'X
									</td>
									<td style="text-align:center">';
										if ($dataDispo2['Me3'] == "1") echo 'X
									</td>
									<td style="text-align:center">';
										if ($dataDispo2['J3'] == "1") echo 'X
									</td>
									<td style="text-align:center">';
										if ($dataDispo2['V3'] == "1") echo 'X
									</td>
									<td style="text-align:center">';
										if ($dataDispo2['S3'] == "1") echo 'X
									</td>
									<td style="text-align:center">';
										if ($dataDispo2['D3'] == "1") echo 'X
									</td>
								</tr>
							</tbody>
						</table>
						<br />
						<form method="POST" action="dispo.php" >
							<input type="submit" name="modif_dispo" value="Modifier mes disponibilités" class="modif_compte"/>
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