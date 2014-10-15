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
		
		$activite = $_GET['nomActivité'];
		$departement = $_GET['numDepartement'];
		
		
		/*$sqlActivities = "SELECT id FROM listactivities WHERE activitie = '"$activite"'";
		$reqActivities = mysql_query($sqlActivities) or die('Erreur SQL !<br>'.$sqlActivities.'<br>'.mysql_error());
		$dataActivities = mysql_fetch_assoc($reqActivities);
		$idActivities = $dataActivities['id'];
		
		$sqlListActivities = "SELECT idUser, lvl FROM listactivities WHERE idActivities = '"$idActivities"'";
		$reqListActivities = mysql_query($sqlListActivities) or die('Erreur SQL !<br>'.$sqlListActivities.'<br>'.mysql_error());
		$dataListActivities = mysql_fetch_assoc($reqListActivities);
		$idUser = $dataListActivities['idUser'];
		$lvl = $dataListActivities['lvl'];*/
		
		//$sqlUser = "SELECT users.id, users.nom, users.prenom, users.ville, users.numDep, activities.activitie, listactivities.lvl FROM users, activities, listactivities WHERE users.id = 'SELECT listactivities.idUser FROM listactivities WHERE listactivities.idActivities = 'SELECT activities.id FROM activities WHERE activities.activitie = '".$activite."'' AND users.numDep = '".$departement."'";
		$sqlUser = "SELECT 
		$reqUser = mysql_query($sqlUser) or die('Erreur SQL !<br>'.$sqlUser.'<br>'.mysql_error());
		$dataUser = mysql_fetch_assoc($reqUser);
		
		
		
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
					<h2>&nbsp;Trouvez des partenaires de sport prés de chez vous</h2>
						<table border="0" style="width: 98%;" align="center">
							<?php
							<tr>
								<td>
									
								</td>
								<td>
									
								</td>
								<td>
									
								</td>
							</tr>
							?>
						</table>
					<div class="finboite"></div>
					</div>
					<?php getConnexion(); ?>
					<div class="boitegrise_466 sans_marge_gauche">
						<h2>&nbsp;Trouvez des partenaires de sport près de chez vous</h2>
							<p> Blablabla <p>
						<div class="finboite"></div>
					</div>
				
<!--FIN CONTENU-->			
<!--FOOTER-->			
			<?php getFooter(); ?>
<!--FIN FOOTER-->			
		</div>
	</body>
</html>