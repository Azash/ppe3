<?php 
	//Pour se connecter ?a base de donn?
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
					///////Reprendre i?!!!!
			}
			if (isset($_POST['modif']))
				$modif = true;
		}
		if (isset($_GET['nomActivite'])) {
			$activite = $_GET['nomActivite'];
			$departement = $_GET['numDepartement'];
		}
		else {
			$activite = 'vide';
			$departement = 'vide';
		}
		//$nom = $_GET['nom'];
		//$prenom = $_GET['prenom'];
		//$ville = $_GET['ville'];
		//$lvl = $_GET['lvl'];
		
	//CONDITIONS POUR LA RECHERCHE 
		if ($activite == 'vide' && $departement == 'vide') {
			$sqlAct = '';
			$sqlDep = '';
			}
		else if ($departement == 'vide') {
			$sqlAct = 'activities.activitie = "'.$activite.'" AND';
			$sqlDep = '';
		}
		else if ($activite == 'vide') {
			$sqlAct = '';
			$sqlDep = 'users.numDep = "'.$departement.'" AND';
		}else {
			$sqlAct = 'activities.activitie = "'.$activite.'" AND';
			$sqlDep = 'users.numDep = "'.$departement.'" AND';
		}
	//REQUETE POUR LA RECHERCHE	
		$sql = "SELECT users.id, users.nom, users.prenom, users.ville, users.numDep, activities.activitie, listactivities.lvl, activities.id, listactivities.idUser, listactivities.idActivities FROM users, activities, listactivities WHERE ".$sqlDep." ".$sqlAct." listactivities.idActivities = activities.id AND listactivities.idUser = users.id";
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		
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
					<h2>&nbsp;Trouvez des partenaires de sport près de chez vous</h2>
						<table border="0" style="width: 98%;" align="center">
							<thead>
								<tr style="font-weight : bold">
									<td>Nom</td>
									<td>Prenom</td>
									<td>Ville</td>
									<td>Activité</td>
									<td>Niveau</td>
									<td>Département</td>
								</tr>
							</thead>
							<?php 
								while ($ligne = mysql_fetch_array($req)) {
								// on affiche les résultats
								echo '<tr align="center">
										<td>'.$ligne['nom'].'</td>';
								echo '	<td>'.$ligne['prenom'].'</td>';
								echo '	<td>'.$ligne['ville'].'</td>';
								echo '	<td>'.$ligne['activitie'].'</td>';
								echo '	<td>'.$ligne['lvl'].'</td>';
								echo '	<td>'.$ligne['numDep'].'</td>
									<tr>';
								}
							?>
						</table>
					<div class="finboite"></div>
					</div>
					<?php getConnexion(); ?>
					<div class="boitegrise_466 sans_marge_gauche">
						<h2>&nbsp;Trouvez des partenaires de sport près de chez vous</h2>
							<p> <?php echo $sql ?> <p>
						<div class="finboite"></div>
					</div>
					<div class="spacer"></div>
				
<!--FIN CONTENU-->			
<!--FOOTER-->			
			<?php getFooter(); ?>
<!--FIN FOOTER-->			
		</div>
	</body>
</html>