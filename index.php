<?php 
	session_start();
	//Pour se connecter à la base de données
	include('connexionbdd.php');
	/*include('Connexion.php');*/
	include('FctPhp.php');
	
	$sqlAct = "SELECT activitie FROM activities ORDER BY activitie";
	$reqAct = mysql_query($sqlAct);
	$ligneAct = mysql_fetch_assoc($reqAct);
	
	$sqlDep = "SELECT dep FROM departements";
	$reqDep = mysql_query($sqlDep);
	$ligneDep = mysql_fetch_assoc($reqDep);
?>

<meta charset="utf-8">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<title>Sports&cies</title>
	<link rel="stylesheet" href="style.css" type="text/css" charset="utf-8">
	<!--<script style="" type="text/javascript" src="/global/jquery-1.11.0.min.js"></script>-->
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="Author" content="Sports&cie">
	<meta name="description" content="Sur Sports&cies trouvez des activités près de chez vous, Organisez vos sports et loisirs avec vos amis, Trouvez de nouveaux partenaires.">
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
						<h1>Trouvez des partenaires de sport près de chez vous</h1>
						<form action="afficher.php">
							<table border="0" style="width: 98%;" align="center">
								<tr>
									<td>
										<label for="rechercher" id="Activité">&nbsp;Activité : </label>
										<select name="nomActivite" id="rechercher">
											<option value="vide">&nbsp;</option>
											<?php
												while($ligneAct){
													echo '<option value="'.$ligneAct["activitie"].'">'.$ligneAct["activitie"].'</option>';
													$ligneAct = mysql_fetch_assoc($reqAct);
												}	
											?>
										</select>
									</td>
									<td>
										<label for="rechercher" id="departement">&nbsp;Département : </label>
										<select name="numDepartement" id="rechercher">
											<option value="vide">&nbsp;</option>
											<?php
												while($ligneDep){
													echo '<option value="'.$ligneDep["dep"].'">'.$ligneDep["dep"].'</option>';
													$ligneDep = mysql_fetch_assoc($reqDep);
												}	
											?>
										</select>
									</td>
								</tr>
							</table>
							<br />
							<div style="text-align:center">
								<input name="btnTrouver" value="Trouver" id="idBtnTrouver" type="submit">
								<input name="btnToutAfficher" value="Tout afficher" type="submit">
								<!-- <a href="afficher.php">Tout afficher</a> -->
							</div>
						</form>
						<br />
					</div>
				</div>
<!--Zone Pour Estelle-->
				<div id="ctl00_pageContenu_connexion">
					<?php getConnexion() ?>
					<div id="login" class="boitegrise_305">
					<?php /*
						
						if (isset($_SESSION['id'])) {
							
							$sqlPrenom = "SELECT prenom FROM users WHERE id='".$_SESSION['id']."'";
							$reqPrenom = mysql_query($sqlPrenom) or die('Erreur SQL !<br>'.$sqlPrenom.'<br>'.mysql_error());
							$data = mysql_fetch_assoc($reqPrenom);*/
							
							//echo "ID = ".$_SESSION['id']."\n";
							//echo "Prenom = ".$data['prenom']."\n";
							/*echo '<h2>&nbsp;Bonjour '.$data["prenom"].'</h2>
							<p>
								<center><a href="deconnexion.php">Se déconecter<a></center>
							</p>
							<p>
								<center><a href="#">Mes infos</a></center>
							</p>
							<p class="align_image">
								<a href="Desinscription.php">Se désinscrire</a>
							</p>';
						}
						else {*/
							//echo "ID = ".$_SESSION['id']."\n";
							/*echo '<h2>&nbsp;Connectez-vous</h2><form method = "post" action ="Connexion.php">
							<p>
								<label for="ctl00_pageContenu_email" id="ctl00_pageContenu_mailLabel">Mail</label>
								<input name="email" id="ctl00_pageContenu_email" type="text" autofocus>
							</p>
							<p>
								<label for="ctl00_pageContenu_pass" id="ctl00_pageContenu_passLabel">Mot de passe</label>
								<input name="mdp" id="ctl00_pageContenu_pass" type="password">
							</p>
							<p class="align_image">
								<input type="submit" name="submit" value="Se connecter" />
							</p>
						</form>
						
						<p style="margin-top: 6px" align="center"><a href="ForgotPwd.php" onclick="window.open(this.href,"Oubli_Mot_de_Passe","height=250,width=300,scrollbars=no,toolbar=no,menubar=no,resizeable=yes,status=no"); return false;">
						Oubli du mot de passe ?</a></br><a href="FormInscription.php">Pas encore membre?</a></p>';
						}*/
						?>
						
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
			<div class="spacer"></div>
<!--FIN CONTENU-->			
<!--FOOTER-->			
			<?php getFooter(); ?>
<!--FIN FOOTER-->			
		</div>
	</body>
</html>