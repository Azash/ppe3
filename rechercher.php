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
				
		$reqAct = "SELECT activitie FROM activities ORDER BY activitie";
		$resAct = mysql_query($reqAct);
		$ligneAct = mysql_fetch_assoc($resAct);
		
		$req = sprintf("SELECT dep FROM departements");
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
				<div class="boitegrise_466 sans_marge_gauche">
					<h2>Trouvez des partenaires de sport près de chez vous</h2>
						<label for="ctl00_pageContenu_postal" id="ctl00_pageContenu_Label1">&nbsp;Sport: </label>
						<select name="Activité" id="ctl00_pageContenu_ddl_loisir">
							<?php
								while($ligneAct){
									echo '<option value="'.$ligneAct["activitie"].'">'.$ligneAct["activitie"].'</option>';
									$ligneAct = mysql_fetch_assoc($resAct);
								}	
							?>
						</select>
						<label for="ctl00_pageContenu_postal" id="ctl00_pageContenu_postalLbl">&nbsp;Département : </label>
						<select name="ctl00$pageContenu$postal" id="ctl00_pageContenu_postal">
							<?php
								while($ligne){
									echo '<option value="'.$ligne["dep"].'">'.$ligne["dep"].'</option>';
									$ligne = mysql_fetch_assoc($resultat);
								}	
							?>
						</select>
						<!-- <label for="ctl00_pageContenu_postal" id="ctl00_pageContenu_postalLbl">Code Postal: </label>
						<input name="ctl00$pageContenu$postal" maxlength="5" id="ctl00_pageContenu_postal" style="width:50px;" type="text"> -->
						<input name="ctl00$pageContenu$btnTrouver" value="Trouver" id="ctl00_pageContenu_btnTrouver" type="submit">
						&nbsp;<a href="#">Tout afficher</a>
					<div class="finboite"></div>
					</div>
					<?php getConnexion(); ?>
					<div class="boitegrise_466 sans_marge_gauche">
						<h2>Trouvez des partenaires de sport près de chez vous</h2>
						<label for="ctl00_pageContenu_postal" id="ctl00_pageContenu_Label1">&nbsp;Sport: </label>
						<select name="Activité" id="ctl00_pageContenu_ddl_loisir">
							<?php
								while($ligneAct){
									echo '<option value="'.$ligneAct["activitie"].'">'.$ligneAct["activitie"].'</option>';
									$ligneAct = mysql_fetch_assoc($resAct);
								}	
							?>
						</select>
						<label for="ctl00_pageContenu_postal" id="ctl00_pageContenu_postalLbl">&nbsp;Département : </label>
						<select name="ctl00$pageContenu$postal" id="ctl00_pageContenu_postal">
							<?php
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
						<div class="finboite"></div>
					</div>
				
<!--FIN CONTENU-->			
<!--FOOTER-->			
			<?php getFooter(); ?>
<!--FIN FOOTER-->			
		</div>
	</body>
</html>