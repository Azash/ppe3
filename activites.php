<?php 
	//Pour se connecter à la base de données
	include("connexion.php");
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
			<div id="entete">
				<div id="menu_entete">
					<a href="/forum/" id="ctl00_menu_Entete_menu_forum" class="dernier">Forums</a>
					<a href="/conseils/" id="ctl00_menu_Entete_menu_conseils">Conseils</a>
					<a href="/annuaire/" id="ctl00_menu_Entete_menu_annuaire">Annuaire</a>
				
					<a href="/activites/" id="ctl00_menu_Entete_menu_activites">Activités</a>
					<a href="/partenaire/" id="ctl00_menu_Entete_menu_membres">Membres</a>
					<a href="/partenaires/" id="ctl00_menu_Entete_menu_partenaires">Partenaires</a>
					<a href="/avantages.aspx" id="ctl00_menu_Entete_menu_mycleec">Mycleec</a>
					<div class="spacer"></div>
				</div>
			</div>
<!--FIN HEADER-->
<!--CONTENU-->			
			<div id="contenu_annexe">
				<div id="ctl00_pageContenu_bloc_recherche">
					<div id="search" class="boitegrise_626">
						<h2>Trouvez un partenaire</h2>
						<div id="ctl00_pageContenu_bloc_search" class="rechercher_partenaire_form">
							<div id="ct100_pageContenu_ct101">
								<p>
									<label for="ctl00_pageContenu_ddlActivite" id="ctl00_pageContenu_lblddlActivite">Activité : </label>
									<select name="Activité" id="ctl00_pageContenu_ddl_loisir">
										<?php
											$req = sprintf("SELECT activitie FROM activities ORDER BY activitie");
											$resultat = mysql_query($req);
											$ligne = mysql_fetch_assoc($resultat);
											while($ligne){
												echo '<option value="'.$ligne["activitie"].'">'.$ligne["activitie"].'</option>';
												$ligne = mysql_fetch_assoc($resultat);
											}	
										?>
									</select>
								</p>							
							</div>
						</div>
						<p>
							<label for="ctl00_pageContenu_email" id="ctl00_pageContenu_mailLabel">Mail</label>
							<input name="ctl00$pageContenu$email" id="ctl00_pageContenu_email" type="text">
						</p>
						<p>
							<label for="ctl00_pageContenu_pass" id="ctl00_pageContenu_passLabel">Mot de passe</label>
							<input name="ctl00$pageContenu$pass" id="ctl00_pageContenu_pass" type="password">
						</p>
						<p class="align_image">
							Se connecter
						</p>
						<p style="margin-top: 6px" align="center"><a href="/mdp/mdp.aspx" onclick="window.open(this.href,'Oubli_Mot_de_Passe','height=250,width=300,scrollbars=no,toolbar=no,menubar=no,resizeable=yes,status=no'); return false;">
						Oubli du mot de passe ?</a></p>
						<div class="finboite"></div>
					</div>
				</div>
			</div>
<!--FIN CONTENU-->			
<!--FOOTER-->			
			<div id="pied">
				<a href="/site-tour.aspx">Aide</a> |
				<a href="/nos-partenaires/">Nos Partenaires</a> |
				<a href="/infos/presse.aspx">Presse</a> |
				<a href="/infos/conditionsdutilisation.aspx">Conditions d'utilisation</a> |
				<a href="/infos/contact.aspx">Contact</a>
			</div>
<!--FIN FOOTER-->			
		</div>
	</body>
</html>