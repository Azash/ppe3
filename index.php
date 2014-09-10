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
		<div id="entete">
			<a href="/"><img src="/images/graphisme/logo_baseline_bl.gif" alt="Cleec. Vos sports. Vos Loisirs. Votre réseau." height="42" width="407"></a>
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
		<div id="contenu_annexe">
			<div id="ctl00_pageContenu_pnCarte" onkeypress="javascript:return WebForm_FireDefaultButton(event, 'ctl00_pageContenu_btnTrouver')">
				<div class="photo_pres">
					<h1>Trouvez des partenaires de sport près de chez vous</h1>
					<label for="ctl00_pageContenu_postal" id="ctl00_pageContenu_Label1">Sport: </label>
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
					<label for="ctl00_pageContenu_postal" id="ctl00_pageContenu_postalLbl">Code Postal: </label>
					<input name="ctl00$pageContenu$postal" maxlength="5" id="ctl00_pageContenu_postal" style="width:50px;" type="text">
					<input name="ctl00$pageContenu$btnTrouver" value="Trouver" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$pageContenu$btnTrouver&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="ctl00_pageContenu_btnTrouver" type="submit">
					<span id="ctl00_pageContenu_RegularExpressionValidator2" style="color:Red;visibility:hidden;">* Code Postal invalide</span>
					<a href="avantages.aspx">Découvrez les avantages de cleec</a>
				</div>
			</div>
			<div id="ctl00_pageContenu_connexion" onkeypress="javascript:return WebForm_FireDefaultButton(event, 'ctl00_pageContenu_Button1')">
				<div id="login" class="boitegrise_305">
					<h2><img src="/images/icones/connectionG.gif" alt="" class="boiteico" height="22" width="22">Connectez-vous</h2>
					<p>
						<label for="ctl00_pageContenu_email" id="ctl00_pageContenu_mailLabel">Mail</label>
						<input name="ctl00$pageContenu$email" id="ctl00_pageContenu_email" type="text">
					</p>
					<p>
						<label for="ctl00_pageContenu_pass" id="ctl00_pageContenu_passLabel">Mot de passe</label>
						<input name="ctl00$pageContenu$pass" id="ctl00_pageContenu_pass" type="password">
						<input name="ctl00$pageContenu$Button1" id="ctl00_pageContenu_Button1" src="/images/graphisme/ico_go20.gif" alt="ok" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$pageContenu$Button1&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" style="height:20px;width:20px;border-width:0px;" align="middle" type="image">
					</p>
					<p>
						<label for="ctl00_pageContenu_CheckBox_souvenir">Me mémoriser</label><input id="ctl00_pageContenu_CheckBox_souvenir" name="ctl00$pageContenu$CheckBox_souvenir" type="checkbox">
					</p>
					
					<p><span id="ctl00_pageContenu_Con_rep" class="red_center"></span></p>
					
					<p class="align_image">
						<a href="https://www.facebook.com/dialog/oauth/?display=popup&amp;client_id=256465031200961&amp;redirect_uri=http://www.cleec.com/inscription/authentification/fbcallback.aspx&amp;scope=email,user_birthday,user_location,publish_actions" id="ctl00_pageContenu_btnFacebook" class="authenticate">
							<img src="../images/social/facebook.png" alt="Connexion via Facebook Connect" title="Connexion via Facebook Connect" height="24" width="24">
						</a>
						<a href="https://accounts.google.com/o/oauth2/auth?client_id=641963203588-822o2qsenbnmgn4e281vbep7gppa0030.apps.googleusercontent.com&amp;response_type=code&amp;scope=openid%20email%20profile&amp;redirect_uri=http://www.cleec.com/inscription/authentification/gpluscallback.aspx" id="ctl00_pageContenu_btnGPlus" class="authenticate gplus">
							<img src="../images/social/google-plus.png" alt="Connexion via Google Plus" title="Connexion via Google Plus" height="24" width="24">
						</a>
						<a id="ctl00_pageContenu_btnOrange" href="javascript:__doPostBack('ctl00$pageContenu$btnOrange','')">
							<img src="../images/social/orange_logo.png" alt="Client Orange, identifiez-vous ici" title="Client Orange, identifiez-vous ici" height="24" width="24">
						</a>
					</p>

					<p style="margin-top: 6px" align="center"><a href="/mdp/mdp.aspx" onclick="window.open(this.href,'Oubli_Mot_de_Passe','height=250,width=300,scrollbars=no,toolbar=no,menubar=no,resizeable=yes,status=no'); return false;">
					Oubli du mot de passe ?</a></p>
					<div class="finboite"></div>
				</div>
			</div>
			<div class="boitegrise_305">
				<h2><img src="/images/icones/envieG.gif" alt="" class="boiteico" height="22" width="22">Pourquoi s'inscrire ?</h2>
				<p>
				Dynamisez <b>gratuitement</b> vos activités sportives :<br><br>
				&gt; Trouvez des partenaires près de chez vous<br>
				&gt; Trouvez des clubs, des coachs et des magasins<br>
				&gt; Trouvez et organisez vos sorties sportives
				</p><br>
				<p>
				<a class="centrer" href="/inscription/"><img src="/images/graphisme/boutonInscription.gif" alt="Inscription" height="39" width="163"></a></p>
				<div class="finboite"></div>
			</div>
		<div class="boitegrise_466 sans_marge_gauche">
	    <h2><img src="/images/icones/actualite.gif" alt="" class="boiteico" height="22" width="22">En ce moment sur Cleec</h2>
	    
		<div class="fluxitem">
			<div class="photo" style="background-image: url(/fichiers_users/Homme.gif);"><img src="/images/graphisme/arrondi_50x60.png" alt="Photo du sportif" height="60" width="50"></div>
			
			<p class="description">
				<a href="/membres/profil.aspx?choix=69174">pierre</a> a posté un nouveau message sur le <a href="/forum/golf/43286/un-ou-une-partenaire-de-golf-seine-et-marne_1.aspx">forum Golf</a>
				 
			</p>
			<p class="dateheure">
				Ajourd'hui, 13:31
			</p>
			<div class="spacer"></div>
		</div>

		<div class="fluxitem">
			<div class="photo" style="background-image: url(/fichiers_users/Femme.gif);"><img src="/images/graphisme/arrondi_50x60.png" alt="Photo du sportif" height="60" width="50"></div>
			
			<p class="description">
				<a href="/membres/profil.aspx?choix=69464">cristina de sousa</a> a rejoint cleec
				 
			</p>
			<p class="dateheure">
				Ajourd'hui, 13:26
			</p>
			<div class="spacer"></div>
		</div>

		<div class="fluxitem">
			<div class="photo" style="background-image: url(/fichiers_users/Homme.gif);"><img src="/images/graphisme/arrondi_50x60.png" alt="Photo du sportif" height="60" width="50"></div>
			
			<p class="description">
				<a href="/membres/profil.aspx?choix=69165">Gilles Fourestier</a> a posté un nouveau message sur le <a href="/forum/football/43285/cherche-gardien-de-but-foot-loisir_1.aspx">forum Football</a>
				 
			</p>
			<p class="dateheure">
				Ajourd'hui, 13:02
			</p>
			<div class="spacer"></div>
		</div>

		<div class="fluxitem">
			<div class="photo" style="background-image: url(/fichiers_users/Femme.gif);"><img src="/images/graphisme/arrondi_50x60.png" alt="Photo du sportif" height="60" width="50"></div>
			
			<p class="description">
				<a href="/membres/profil.aspx?choix=69463">Marlène  Gomis</a> a rejoint cleec
				 
			</p>
			<p class="dateheure">
				Ajourd'hui, 13:01
			</p>
			<div class="spacer"></div>
		</div>

		<div class="fluxitem">
			<div class="photo" style="background-image: url(/fichiers_users/Femme.gif);"><img src="/images/graphisme/arrondi_50x60.png" alt="Photo du sportif" height="60" width="50"></div>
			
			<p class="description">
				<a href="/membres/profil.aspx?choix=69462">christine kanga</a> a rejoint cleec
				 
			</p>
			<p class="dateheure">
				Ajourd'hui, 12:57
			</p>
			<div class="spacer"></div>
		</div>

<!--Generation flux : 08/09/2014 13:42:15-->
	    <div class="finboite"></div>
	</div>


    
    <div class="boitegrise_305">
        <h2><img src="/images/icones/actualite.gif" alt="" class="boiteico" height="22" width="22">Actualités Cleec</h2>
        <div id="ctl00_pageContenu_aff_actus"><p><span style="width:80px; float:left; text-align:right;">3 Sept. - </span><span style="Display:block; margin-left:82px"><a href="/actus/yoga-paris-14-sepetmbre.aspx">Cours de Yoga à Paris le 14 septembre : Inscrivez-vous vite !</a></span></p><br><p><span style="width:80px; float:left; text-align:right;">3 Sept. - </span><span style="Display:block; margin-left:82px"><a href="/actus/cours-yoga-cleec.aspx">Cours de Yoga sur Cleec</a></span></p><br><p><span style="width:80px; float:left; text-align:right;">13 Mai - </span><span style="Display:block; margin-left:82px"><a href="/actus/Concours-FFN.aspx">Assistez aux championnats d'Europe de Natation à Berlin !</a></span></p><br></div>
        <div class="finboite"></div>
	</div>

	
	<div class="boitegrise_305">
		<h2><img src="/images/icones/activiteG.gif" alt="" class="boiteico" height="22" width="22">Pratiquez de nouveaux sports</h2>
		<p class="tags">
		<a style="font-size:1.6em" href="/partenaire/football.aspx">Football</a>
		<a style="font-size:1.2em" href="/partenaire/squash.aspx">Squash</a>
		<a style="font-size:1.7em" href="/partenaire/stretching.aspx">Stretching</a>
		<a style="font-size:1.2em" href="/partenaire/yoga.aspx">Yoga</a>
		<a style="font-size:0.8em" href="/partenaire/golf.aspx">Golf</a>
		<a style="font-size:1.1em" href="/partenaire/rugby.aspx">Rugby</a>
		<a style="font-size:1.6em" href="/partenaire/footing-running.aspx">Running</a>
		<a style="font-size:0.9em" href="/partenaire/natation.aspx">Natation</a>
		<a style="font-size:1em" href="/partenaire/tennis-de-table.aspx">Tennis de table</a>
		<a style="font-size:2em" href="/partenaire/tennis.aspx">Tennis</a>
		<a style="font-size:1.3em" href="/partenaire/cyclisme-sur-route.aspx">Vélo</a>
		<a style="font-size:0.9em" href="/partenaire/danse-de-salon.aspx">Danse</a>
		<a style="font-size:2em" href="/partenaire/fitness.aspx">Fitness</a> 
		<a style="font-size:0.8em" href="/partenaire/athletisme.aspx">Athlétisme</a>
		<a style="font-size:0.8em" href="/partenaire/randonnee-marche.aspx">Randonnée</a>
		<a style="font-size:1.4em" href="/partenaire/velo-tout-terrain-vtt.aspx">VTT</a>
		<a style="font-size:1.2em" href="/partenaire/badminton.aspx">Badminton</a>
		<a style="font-size:1.7em" href="/partenaire/ski.aspx">Ski</a>
		<a style="font-size:1.3em" href="/partenaire/roller.aspx">Roller</a>
		<a style="font-size:0.8em" href="/partenaire/poker.aspx">Poker</a>
		<a style="font-size:2em" href="/partenaire/escalade.aspx">Escalade</a>
		<a style="font-size:1.2em" href="/partenaire/equitation-carmargue.aspx">Equitation</a>
		<a style="font-size:0.8em" href="/partenaire/volley-ball.aspx">Volley-ball</a>
		<a style="font-size:1.7em" href="/partenaire/voile.aspx">Voile</a>
		<a style="font-size:1.5em" href="/partenaire/basket-ball.aspx">Basket-ball</a>
		<a style="font-size:1.2em" href="/partenaire/triathlon.aspx"><strong>Triathlon</strong></a>
		<a style="font-size:1.3em" href="/partenaire/handball.aspx">Handball</a>
		<a style="font-size:0.8em" href="/partenaire/judo.aspx">Judo</a>
		</p>
		<p style="text-align: center; margin-top: 10px"><a href="/activites/">Retrouvez plus de 200 activités sportives !</a></p>
		<div class="finboite"></div>
	</div>
	
	
	<div class="boitepress_bas">
	    <a href="/infos/presse.aspx"><img src="/images/presse/presse_accueil_bas/presse_itele.gif" alt="i_Télé"></a>
	    <a href="/infos/presse.aspx"><img src="/images/presse/presse_accueil_bas/presse_elle.gif" alt="ELLE"></a>
	    <a href="/infos/presse.aspx"><img src="/images/presse/presse_accueil_bas/presse_direct8.gif" alt="Direct 8"></a>
	    <a href="/infos/presse.aspx"><img src="/images/presse/presse_accueil_bas/presse_bfm2.gif" alt="BFM"></a>
	    <a href="/infos/presse.aspx"><img src="/images/presse/presse_accueil_bas/presse_leparisien.gif" alt="Le Parisien"></a>	    
	    <a href="/infos/presse.aspx"><img src="/images/presse/presse_accueil_bas/presse_metro.gif" alt="Metro"></a>
	    <a href="/infos/presse.aspx"><img src="/images/presse/presse_accueil_bas/LesInrocks.gif" alt="Les Inrockuptibles"></a>
	    <a href="/infos/presse.aspx"><img src="/images/presse/presse_accueil_bas/presse_cosmo.gif" alt="Cosmopolitains"></a>
	</div>
	

			<div class="spacer"></div>
		</div> 

		
		<div id="pied">
			
			<a href="/site-tour.aspx">Aide</a> |
			<a href="/nos-partenaires/">Nos Partenaires</a> |
			<a href="/infos/presse.aspx">Presse</a> |
			<a href="/infos/conditionsdutilisation.aspx">Conditions d'utilisation</a> |
			<a href="/infos/contact.aspx">Contact</a>
		</div>

        <div id="sport_responsable">
		    <a href="/sport-responsable.aspx" title="Sport Responsable GENERALI"><img src="/images/sport-responsable/sport_responsable_66x100.gif" alt="Sport Responsable GENERALI" height="100" width="66"></a>
	    </div>
		
		
    <div style="font-size: 0.6em;margin-top: 8px;"><p>Faire du sport à : <a href="/sport/paris.aspx">Paris</a>, <a href="/sport/lyon.aspx">Lyon</a>, <a href="/sport/marseille.aspx">Marseille</a>, <a href="/sport/toulouse.aspx">Toulouse</a>, <a href="/sport/lille.aspx">Lille</a>, <a href="/sport/nantes.aspx">Nantes</a>, <a href="/sport/bordeaux.aspx">Bordeaux</a>, <a href="/sport/nice.aspx">Nice</a>, <a href="/sport/montpellier.aspx">Montpellier</a>, <a href="/sport/rennes.aspx">Rennes</a>, <a href="/sport/grenoble.aspx">Grenoble</a>, <a href="/sport/strasbourg.aspx">Strasbourg</a>, <a href="/sport/rouen.aspx">Rouen</a>, <a href="/sport/pau.aspx">Pau</a></p></div>
	</div>
</body></html>