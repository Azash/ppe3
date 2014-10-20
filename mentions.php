<?php 
	session_start();
	//Pour se connecter � la base de donn�es
	include('connexionbdd.php');
	include('FctPhp.php');
?>

	<meta charset="utf-8">
<html xmlns="http://www.w3.org/1999/xhtml">
	<title>SOS partenaires</title>
	<link rel="stylesheet" href="style.css" type="text/css" charset="utf-8">
	<!--<script style="" type="text/javascript" src="/global/jquery-1.11.0.min.js"></script>-->
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="Author" content="SOSpartenaires">
	<meta name="description" content="Sur SOS partenaires trouvez des activit�s pr�s de chez vous, Organisez vos sports et loisirs avec vos amis, Trouvez de nouveaux partenaires.">
	<meta name="Keywords" content="SOS partenaires, sports et loisirs, sport, loisir, coach, reseau, social, bien, etre, bien-etre, loisirs, sports, communaute, social">

	<!--<link rel="shortcut icon" href="/favicon.ico">-->
	<body>
		<div id="conteneur">
		
<!--HEADER-->		
			<?php getHeader(); ?>
<!--FIN HEADER-->

<!--CONTENU-->		
			<div id="contenu_annexe">
				<div class="boitegrise_785">
					
		
						<article class="box is-post">
														<header>
															<h2 style="text-align: center;">MENTIONS LEGALES ET CONDITIONS D'UTILISATION DE L'APPLICATION WEB</h2>
															<span class="byline"></span>
														</header>
														
														<table width= "98%" style="text-algin: center" align= "center">
														<tr>
														<td>
														
														<article style="font-size: 14px">
															<h1 style="font-size: 22px">MENTIONS LEGALES</h1>
															<h3 class="byline" style="font-size: 20px">1. Editeur</h3><br />
                                                            
															Maison des Ligues de Lorraine<br />
															13 rue Jean Moulin - BP 70001<br />
															54510 TOMBLAINE<br />
															Téléone actuel	. : 03.83.18.87.02<br />
															Fax : 03.83.18.87.03<br />

															<h3 class="byline" style="font-size: 20px">2. Directeur de publication</h3><br />

															Au sens de l'article 93-2 de la loi n&deg 82-652 du 29 juillet 1982<br />
															Monsieur Frederic Guez, Directeur de la Maison des Ligues de Lorraine<br />

															<h3 class="byline" style="font-size: 20px">3. Prestataire d'hebergement</h3><br />

															Actuellement, neuf box<br /><br />

															<h1 style="font-size: 22px">CONDITIONS D'UTILISATION DE L'APPLICATION WEB</h1>
															
															<h3 class="byline" style="font-size: 20px">1. Traitement des donn&eacutees &agrave caract&egravere personnel</h3><br />

															<h1 style="font-size: 18px">D&eacutelib&eacuteration de la CNIL n&deg 2010-229 du 10 juin 2010</h1><br />

															Dans cette délibération, la haute instance formule les observations suivantes :  Les traitements de données à caractère personnel mis en oeuvre par des organismes à but non lucratif pour la réalisation des seules finalité définies à l'article 2 et pour les seules données visées à l'article 3 comportant des données sur des personnes physiques constituent des traitements courants ne paraissant pas susceptibles de porter atteinte à la vie privée des personnes dans le cadre de leur utilisation régulière.
															
															<br /><br />L'article 2 de la délibération stipule que tous les traitements doivent avoir pour seules finalités : l'enregistrement et la mise à jour des informations individuelles nécessaires à la gestion administrative des membres et donateurs, en particulier la gestion des cotisations, conformément aux dispositions statutaires qui régissent les intéressés ; d'établir, pour répondre à des besoins de gestion, des états statistiques ou des listes de membres ou de contacts, notamment en vue d'adresser bulletins, convocations, journaux ; d'établir des annuaires de membres, y compris lorsque ces annuaires sont mis à la disposition du public sur le réseau internet ; d'effectuer par tout moyen de communication des opérations relatives à des actions de prospection auprès des membres, donateurs et prospects.
															
															<br /><br />L' article 3 énonce les données traitées pour la réalisation des finalités décrites à l'article 2 : l'identité : nom, prénoms, sexe, date de naissance, adresse, numéros de téléphone (fixe et mobile) et de télécopie, adresse de courrier électronique les informations relatives à la gestion administrative de l'organisme : état des cotisations, position vis-à-vis de l'association, informations strictement liées à l'objet statutaire de l'organisme, identité bancaire pour la gestion des dons données de connexion (date, heure, adresse internet protocole de l'ordinateur du visiteur, page consultée) à des seules fins statistiques d'estimation de la fréquentation du site.
															
															<br /><br />Le même article précise également les données qui ne peuvent pas bénéficier de l'exonération de déclaration à la CNIL : les données qui font apparaître, directement ou indirectement, les origines raciales ou ethniques, les opinions politiques, philosophiques ou religieuses ou l'appartenance syndicale des personnes, ou qui sont relatives à la santé ou à la vie sexuelle de celles-ci (art. 8 de la loi du 6 janvier 1978 modifiée) ; les données concernant les infractions, condamnations ou mesures de sûreté (art. 9 de la loi du 6 janvier 1978 modifiée) ; les données relatives aux difficultés sociales et économiques des personnes ; le numéro d'inscription au répertoire d'identification des personnes (numéro INSEE ou numéro de sécurité sociale).

															<h3 class="byline" style="font-size: 20px">2. Prestataire de conception graphique</h3><br />

															La conception et les développements graphiques et ergonomiques ainsi que le développement des modèles de pages ont été réalisés par HTML5 UP.

															<h3 class="byline" style="font-size: 20px">3. Liens hypertextes (responsabilit&eacute)</h3><br />

															M2lSports propose de nombreux liens vers déautres sites, essentiellement des sites officiels (institutions, organismes publics, etc.). Nous indiquons systématiquement vers quel site nous vous proposons d'aller. Cependant, ces pages web dont les adresses sont régulièrement vérifiées ne font pas partie du portail : elles néengagent donc pas la responsabilité de la rédaction du site.

															<h3 class="byline" style="font-size: 20px">4. Droit de reproduction</h3><br />
															
															La reproduction ou réutilisation des contenus des pages de m2l.fr est autorisée sous réserve de mentionner la date et la source. La copie du logo doit avoir obtenu l'autorisation du directeur de la publication. La création de liens est possible dans les conditions fixées ci-après.
															
															<h3 class="byline" style="font-size: 20px">5. Etablir un lien</h3><br />
															
															Tout site public ou privé est autorisé à établir, sans autorisation préalable, un lien vers les informations diffusées sur lorrainesport.fr. En revanche, les pages du portail ne doivent pas être imbriquées à l'intérieur des pages d'un autre site.
															
															<br /><br />La Maison des ligues s'engage à faire ses meilleurs efforts pour protéger les données à caractère personnel, afin notamment d'empécher qu'elles ne soient deformées, endommagées ou communiquées à des tiers non autorisés conformément à l'article 29 de la loi du 6 janvier 1978.<br /><br />
															
															<a href="mentionslegales.pdf">Voir le format PDF</a>
													</td>
													</tr>
													</table>
													
													
													</article>
						
						
		
					<div class="finboite"></div>
				</div>
					
				

	
				<div class="spacer"></div>
			</div>
<!--FIN CONTENU-->
		
<!--FOOTER-->			
			<?php getFooter(); ?>
<!--FIN FOOTER-->
			
		</div>
	</body>
</html>