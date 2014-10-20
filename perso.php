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
			if (isset($_GET['idAct'])) {
				$sqlAct = "DELETE FROM listactivities WHERE listId=".$_GET['idAct'];
				echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>".$sqlAct;
				mysql_query($sqlAct);
			}
			else if (isset($_POST['modif_activite_valid'])) {
				$sqlAct = "INSERT INTO listactivities VALUES(\"\" ,".$id.", ".$_POST['nomActivite'].", \"".$_POST['nomLvl']."\")";
				//echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>'.$sqlAct;
				mysql_query($sqlAct);
			}
			else if (isset($_POST["modif_perso_valid"])) { //RELATIF AUX INFORMATIONS PERSONNELLES
				if (checkDataUser($_POST)) {
					$birth = $_POST['anneeNaissance']."-".$_POST['moisNaissance']."-".$_POST['jourNaissance'];
					mysql_query("UPDATE users SET nom='".$_POST['nom']."', prenom='".$_POST['prenom']."', birth='".$birth."', 
					sexe='".$_POST['sexe']."', email='".$_POST['email']."', ville='".$_POST['ville']."', numDep='".$_POST['numDep']."', 
					tel='".$_POST['tel']."', description='".$_POST['description']."', afficheEmail='".$_POST['afficheEmail']."', AfficheTel='".$_POST['AfficheTel']."' WHERE id=".$id)or die(mysql_error());
				}
			}
			else if (isset($_POST["modif_dispo_valid"])) { //RELATIF AUX INFORMATIONS DE DISPONIBILITES
				$testId = mysql_query("SELECT idUser FROM dispo WHERE idUser='".$id."'") or die('Erreur SQL !<br>'.$testId.'<br>'.mysql_error());
				$testId = mysql_fetch_array($testId);
				if (empty($testId))
					$sqlDispo = "INSERT INTO dispo VALUES(".$id.", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)"; // L1 = '0', L2 = '0', L3 = '0', Ma1 = '0', Ma2 = '0', Ma3 = '0', Me1 = '0', Me2 = '0', Me3 = '0', J1 = '0', J2 = '0', J3 = '0', V1 = '0', V2 = '0', V3 = '0', S1 = '0', S2 = '0', S3 = '0', D1 = '0', D2 = '0', D3 = '0' WHERE idUser = '".$id."'";
				else
					$sqlDispo = "UPDATE dispo SET L1 = '0', L2 = '0', L3 = '0', Ma1 = '0', Ma2 = '0', Ma3 = '0', Me1 = '0', Me2 = '0', Me3 = '0', J1 = '0', J2 = '0', J3 = '0', V1 = '0', V2 = '0', V3 = '0', S1 = '0', S2 = '0', S3 = '0', D1 = '0', D2 = '0', D3 = '0' WHERE idUser = '".$id."'";
				mysql_query($sqlDispo) or die('Erreur SQL !<br>'.$sqlDispo.'<br>'.mysql_error());
				$sqlDispo = "";
				foreach($_POST['dispo'] as $valeur)
				{
					if ($sqlDispo == "")
						$sqlDispo = $valeur."='1'";
					else
						$sqlDispo = $sqlDispo.", ".$valeur."='1'";
				}
				mysql_query("UPDATE dispo SET ".$sqlDispo." WHERE idUser = '".$id."'") or die('Erreur SQL !<br>'.$sqlDispo.'<br>'.mysql_error());
			}
			if (isset($_POST['modif']))
				$modif = true;
		} 
		$req = "SELECT listId, idActivities, lvl FROM listactivities WHERE idUser=".$id;
		$resAct = mysql_query($req) or die('Erreur SQL !<br>'.$req.'<br>'.mysql_error());
		
		$req = "SELECT nom, prenom, birth, mdp, sexe, email, avatar, ville, numDep, tel, description, afficheEmail, AfficheTel FROM users WHERE id=".$id;
		$resultat = mysql_query($req) or die('Erreur SQL !<br>'.$req.'<br>'.mysql_error());
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
		$numDep = $ligne['numDep'];
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
//---------------------------------------------------------------------------------------------------------//
//------------------------------------------ INFOS PERSIONNELLES ------------------------------------------//
//---------------------------------------------------------------------------------------------------------//
				if ($id == $UserCurrentId && isset($_POST['modif_perso'])) {
					echo '<div class="boitegrise_466 sans_marge_gauche">
						<h2>&nbsp;Informations personnelles</h2>
						<form method="POST" action="perso.php">
						&nbsp;Nom : <input type="text" name="nom" value="'.$nom.'" /><br>
						&nbsp;Prénom : <input type="text" name="prenom" value="'.$prenom.'" /><br>
						&nbsp;Date d\'anniversaire : '; ShowListBoxBirth($jour, $mois, $annee); echo '<br>
						&nbsp;Sexe : <input type="radio" name="sexe" value="Homme" '; if ($sexe == "Homme") echo "checked"; echo ' /> Homme <input type="radio" name="sexe" value="Femme" '; if ($sexe == "Femme") echo "checked"; echo ' /> Femme<br>
						&nbsp;Téléphone : <input type="text" name="tel" value="'.$tel.'" /><br>
						&nbsp;Email : <input type="text" name="email" value="'.$email.'" /><br>

						&nbsp;Ville : <input type="text" name="ville" value="'.$ville.'" /><br>
						&nbsp;Code postal : <input type="text" name="numDep" value="'.$numDep.'" /><br>

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
					if ($numDep == 0)
						$numDep = "";
					echo '<div class="boitegrise_466 sans_marge_gauche">
						<h2>&nbsp;Informations personnelles</h2>

						&nbsp;Nom : '.$nom.'<br>
						&nbsp;Prénom : '.$prenom.'<br>
						&nbsp;Date d\'anniversaire : '.$birth.'<br>
						&nbsp;Sexe : '.$sexe.'<br>';
						if ($afficheEmail == 1) echo '&nbsp;Téléphone : '.$tel.'<br>';
						if ($AfficheTel == 1) echo '&nbsp;Email : '.$email.'<br>';

						echo '&nbsp;Ville : '.$ville.'<br>
						&nbsp;Numéro département : '.$numDep.'<br /><br />
						<table border="0" style="width: 98%;" align="center">
							<tbody>
								<tr>
									<td>Description personnelle : <br />'.$description.'</td>
								</tr>
							</tbody>
						</table><br />';
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
//--------------------------------------------------------------------------------------------------------//
//------------------------------------------ BLOCK DE CONNEXION ------------------------------------------//
//--------------------------------------------------------------------------------------------------------//				
				getConnexion();
//--------------------------------------------------------------------------------------------------------//				
//------------------------------------------  BLOCK ACTIVITES   ------------------------------------------//
//--------------------------------------------------------------------------------------------------------//				
				if ($id == $UserCurrentId && (isset($_POST['modif_activite']) or isset($_POST['modif_activite_valid']) or isset($_GET['idAct']))) {
					echo '<div class="boitegrise_466 sans_marge_gauche">
						<h2>&nbsp;Activitées</h2>
						<br><form method="POST" action="perso.php" >';
						$activites = mysql_fetch_assoc($resAct);
						while ($activites) {
							$res = mysql_fetch_assoc(mysql_query("SELECT activitie FROM activities WHERE actId=".$activites['idActivities']));
							echo "&nbsp;".$res['activitie']." : ".$activites['lvl']." <a href=\"perso.php?idAct=".$activites['listId']."\">Supprimer</a><br>";
							//echo $activites['listId'];
							$activites = mysql_fetch_array($resAct);
						}
	
						$sqlAct = "SELECT actId, activitie FROM activities ORDER BY activitie";
						$reqAct = mysql_query($sqlAct);
						$ligneAct = mysql_fetch_assoc($reqAct);
						echo '<br>&nbsp;<select name="nomActivite">';
						while($ligneAct){
							echo '<option value="'.$ligneAct["actId"].'">'.$ligneAct["activitie"].'</option>';
							$ligneAct = mysql_fetch_assoc($reqAct);
						}	
						echo '</select>';
						echo '&nbsp;<select name="nomLvl">';
							echo '<option value="Débutant">Débutant</option>';
							echo '<option value="Moyen">Moyen</option>';
							echo '<option value="Professionnel">Professionnel</option>';
							echo '<option value="Compétition">Compétition</option>';
						echo '</select>';
						echo '&nbsp;<input type="submit" name="modif_activite_valid" value="Ajouter" />';
						echo '<br><br>
						<input type="submit" value="Annuler" class="modif_compte_valid"/>
						</form>
						<div class="finboite"></div>
						</div>';
				}
				else {
					
					echo '<div class="boitegrise_466 sans_marge_gauche">
						<h2>&nbsp;Activitées</h2>
						<br>';
						$activites = mysql_fetch_assoc($resAct);
						while ($activites) {
							$res = mysql_fetch_assoc(mysql_query("SELECT activitie FROM activities WHERE actId=".$activites['idActivities']));
							echo "&nbsp;".$res['activitie']." : ".$activites['lvl']."<br>";
							$activites = mysql_fetch_array($resAct);
						}
						
						if ($id == $UserCurrentId)
						echo '<br>
						<form method="POST" action="perso.php" >
							<input type="submit" name="modif_activite" value="Modifier mes activitées" class="modif_compte"/>
						</form>';
						echo '
						<div class="finboite"></div>
						</div>';
				}
//-----------------------------------------------------------------------------------------------------------//
//------------------------------------------ BLOCK DISPONIBILITEES ------------------------------------------//				
//-----------------------------------------------------------------------------------------------------------//
				if ($id == $UserCurrentId && isset($_POST['modif_dispo'])) {
					echo '<div class="boitegrise_466 sans_marge_gauche">
						<h2>&nbsp;Dispo</h2>
						<br>
						<form method="POST" action="perso.php" >
							<table border="0" style="width: 98%;" align="center">
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
										<input type="checkbox" name="dispo[]" value="L1" ';if ($dataDispo2['L1'] == "1") echo 'checked'; echo'>
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="Ma1" ';if ($dataDispo2['Ma1'] == "1") echo 'checked'; echo'>
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="Me1" ';if ($dataDispo2['Me1'] == "1") echo 'checked'; echo'>
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="J1" ';if ($dataDispo2['J1'] == "1") echo 'checked'; echo'>
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="V1" ';if ($dataDispo2['V1'] == "1") echo 'checked'; echo'>
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="S1" ';if ($dataDispo2['S1'] == "1") echo 'checked'; echo'>
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="D1" ';if ($dataDispo2['D1'] == "1") echo 'checked'; echo'>
									</td>
								</tr>
								<tr>
									<td style="text-align:right">
										Après-midi :
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="L2" ';if ($dataDispo2['L2'] == "1") echo 'checked'; echo'>
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="Ma2" ';if ($dataDispo2['Ma2'] == "1") echo 'checked'; echo'>
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="Me2" ';if ($dataDispo2['Me2'] == "1") echo 'checked'; echo'>
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="J2" ';if ($dataDispo2['J2'] == "1") echo 'checked'; echo'>
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="V2" ';if ($dataDispo2['V2'] == "1") echo 'checked'; echo'>
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="S2" ';if ($dataDispo2['S2'] == "1") echo 'checked'; echo'>
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="D2" ';if ($dataDispo2['D2'] == "1") echo 'checked'; echo'>
									</td>
								</tr>
								<tr>
									<td style="text-align:right">
										Soir :
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="L3" ';if ($dataDispo2['L3'] == "1") echo 'checked'; echo'>
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="Ma3" ';if ($dataDispo2['Ma3'] == "1") echo 'checked'; echo'>
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="Me3" ';if ($dataDispo2['Me3'] == "1") echo 'checked'; echo'>
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="J3" ';if ($dataDispo2['J3'] == "1") echo 'checked'; echo'>
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="V3" ';if ($dataDispo2['V3'] == "1") echo 'checked'; echo'>
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="S3" ';if ($dataDispo2['S3'] == "1") echo 'checked'; echo'>
									</td>
									<td style="text-align:center">
										<input type="checkbox" name="dispo[]" value="D3" ';if ($dataDispo2['D3'] == "1") echo 'checked'; echo'>
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
						<table border="1" style="width: 98%;" align="center">
							<tbody>
								<tr>
									<td bgcolor="FF651B" style="text-align:center">
										&nbsp;
									</td>
									<td bgcolor="FF651B" style="text-align:center">
										Lun
									</td>
									<td bgcolor="FF651B" style="text-align:center">
										Mar
									</td>
									<td bgcolor="FF651B" style="text-align:center">
										Mer
									</td>
									<td bgcolor="FF651B" style="text-align:center">
										Jeudi
									</td>
									<td bgcolor="FF651B" style="text-align:center">
										Ven
									</td>
									<td bgcolor="FF651B" style="text-align:center">
										Sam
									</td>
									<td bgcolor="FF651B" style="text-align:center">
										Dim
									</td>
								</tr>
								<tr>
									<td bgcolor="FF651B" style="text-align:right">
										Matin :&nbsp;
									</td>
									<td bgcolor="';if ($dataDispo2['L1'] == "1") echo '#3ADF00'; else echo'#DF0101'; echo'" style="text-align:center">
									</td>
									<td bgcolor="';if ($dataDispo2['Ma1'] == "1") echo '#3ADF00'; else echo'#DF0101'; echo'" style="text-align:center">
									</td>
									<td bgcolor="';if ($dataDispo2['Me1'] == "1") echo '#3ADF00'; else echo'#DF0101'; echo'" style="text-align:center">
									</td>
									<td bgcolor="';if ($dataDispo2['J1'] == "1") echo '#3ADF00'; else echo'#DF0101'; echo'" style="text-align:center">
									</td>
									<td bgcolor="';if ($dataDispo2['V1'] == "1") echo '#3ADF00'; else echo'#DF0101'; echo'" style="text-align:center">
									</td>
									<td bgcolor="';if ($dataDispo2['S1'] == "1") echo '#3ADF00'; else echo'#DF0101'; echo'" style="text-align:center">
									</td>
									<td bgcolor="';if ($dataDispo2['D1'] == "1") echo '#3ADF00'; else echo'#DF0101'; echo'" style="text-align:center">
									</td>
								</tr>
								<tr>
									<td bgcolor="FF651B" style="text-align:right">
										Après-midi :&nbsp;
									</td>
									<td bgcolor="';if ($dataDispo2['L2'] == "1") echo '#3ADF00'; else echo'#DF0101'; echo'" style="text-align:center">
									</td>
									<td bgcolor="';if ($dataDispo2['Ma2'] == "1") echo '#3ADF00'; else echo'#DF0101'; echo'" style="text-align:center">
									</td>
									<td bgcolor="';if ($dataDispo2['Me2'] == "1") echo '#3ADF00'; else echo'#DF0101'; echo'" style="text-align:center">
									</td>
									<td bgcolor="';if ($dataDispo2['J2'] == "1") echo '#3ADF00'; else echo'#DF0101'; echo'" style="text-align:center">
									</td>
									<td bgcolor="';if ($dataDispo2['V2'] == "1") echo '#3ADF00'; else echo'#DF0101'; echo'" style="text-align:center">
									</td>
									<td bgcolor="';if ($dataDispo2['S2'] == "1") echo '#3ADF00'; else echo'#DF0101'; echo'" style="text-align:center">
									</td>
									<td bgcolor="';if ($dataDispo2['D2'] == "1") echo '#3ADF00'; else echo'#DF0101'; echo'" style="text-align:center">
									</td>
								</tr>
								<tr>
									<td bgcolor="FF651B" style="text-align:right">
										Soir :&nbsp;
									</td>
									<td bgcolor="';if ($dataDispo2['L3'] == "1") echo '#3ADF00'; else echo'#DF0101'; echo'" style="text-align:center">
									</td>
									<td bgcolor="';if ($dataDispo2['Ma3'] == "1") echo '#3ADF00'; else echo'#DF0101'; echo'" style="text-align:center">
									</td>
									<td bgcolor="';if ($dataDispo2['Me3'] == "1") echo '#3ADF00'; else echo'#DF0101'; echo'" style="text-align:center">
									</td>
									<td bgcolor="';if ($dataDispo2['J3'] == "1") echo '#3ADF00'; else echo'#DF0101'; echo'" style="text-align:center">
									</td>
									<td bgcolor="';if ($dataDispo2['V3'] == "1") echo '#3ADF00'; else echo'#DF0101'; echo'" style="text-align:center">
									</td>
									<td bgcolor="';if ($dataDispo2['S3'] == "1") echo '#3ADF00'; else echo'#DF0101'; echo'" style="text-align:center">
									</td>
									<td bgcolor="';if ($dataDispo2['D3'] == "1") echo '#3ADF00'; else echo'#DF0101'; echo'" style="text-align:center">
									</td>
								</tr>
							</tbody>
						</table>
						<br />';
						if ($id == $UserCurrentId)
						echo '
						<form method="POST" action="perso.php" >
							<input type="submit" name="modif_dispo" value="Modifier mes disponibilités" class="modif_compte"/>
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