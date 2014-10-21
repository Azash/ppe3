<?php 
	//Pour se connecter � la base de donn�es
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
					///////Reprendre ici !!!!
			}
			if (isset($_POST['modif']))
				$modif = true;
		} 
				
		$sqlAct = "SELECT activitie FROM activities ORDER BY activitie";
		$reqAct = mysql_query($sqlAct);
		$ligneAct = mysql_fetch_assoc($reqAct);
		
		$sqlDep = "SELECT dep FROM departements";
		$reqDep = mysql_query($sqlDep);
		$ligneDep = mysql_fetch_assoc($reqDep);
		
	}
?>
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
				<div class="boitegrise_466 sans_marge_gauche">
					<h2>&nbsp;Trouvez des partenaires de sport prés de chez vous</h2>
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
						<div class="finboite"></div>
						<div class="spacer"></div>
					</div>
					<?php getConnexion(); ?>
					
		<!-- /////////// LA DEUXIEME PARTIE DE LA RECHERCHE : RECHERCHE PRECISE ///////////////////
		
					<div class="boitegrise_466 sans_marge_gauche">
						<h2>&nbsp;Trouvez des partenaires de sport près de chez vous</h2>
						<form action="afficher.php">
							<table border="0" style="width: 98%;" align="center">
								<tr>
									<td>
										<label for="rechercher" id="Activité">&nbsp;Activité : </label>
										<select name="nomActivite" id="rechercher">
											<option value="vide">&nbsp;</option>
											
										</select>
									</td>
									<td>
										<label for="rechercher" id="departement">&nbsp;Département : </label>
										<select name="numDepartement" id="rechercher">
											<option value="vide">&nbsp;</option>
											
										</select>
									</td>
								</tr>
								<tr>
									<td>
										<label for="rechercher" id="nom">&nbsp;Nom : </label>
										<input type="text" name="nom">
									</td>
									<td>
										<label for="rechercher" id="prenom">&nbsp;Prénom : </label>
										<input type="text" name="prenom">
									</td>
								</tr>
								<tr>
									<td>
										<label for="rechercher" id="ville">&nbsp;Ville : </label>
										<input type="text" name="ville">
									</td>
									<td>
										&nbsp;
									</td>
								</tr>
							</table>
							<br />
							<div style="text-align:center">
								<input name="btnTrouver" value="Trouver" id="idBtnTrouver" type="submit"><br />
								<a href="afficher.php">Tout afficher</a>
							</div>
						</form>
						<div class="finboite"></div>
						<div class="spacer"></div>
					</div>
					<div class="spacer"></div>
				
		FIN DE LA DEUXIEME PARTIE DE LA RECHERCHE-->
		
<!--FIN CONTENU-->			
<!--FOOTER-->
			<div class="spacer"></div>
			<?php getFooter(); ?>
<!--FIN FOOTER-->			
		</div>
	</body>
</html>