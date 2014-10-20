<?php 

include("FctPhp.php");

if(isset($_POST['submit']))
	{
		include("recupdonnee.php");
		
		
		$cp = intval($da['numDep']);
		$email = htmlspecialchars($da["email"]);
		$affichemail = $da["affichEmail"];
		$tel = htmlspecialchars($da["tel"]);
		$affichetel = $da["AfficheTel"];
		$ville = htmlspecialchars($da['ville']);
		$description = htmlspecialchars($da['description']);
		
	
		
		
		
						
		if (isset($_POST['modifdescription']) && trim($_POST['modifdescription']) != "") 
		        $description = htmlspecialchars($_POST["modifdescription"]);
		
			if (isset($_POST['modiftel']) && trim($_POST['modiftel']) != "")
			    $tel = htmlspecialchars($_POST["modiftel"]);
			
				    
			if (isset($_POST['modifemail']) && trim($_POST['modifemail']!= "" && filter_var($_POST['modifemail']), FILTER_VALIDATE_EMAIL) && mysql_num_rows($sql) == 0) ;
			    $email = htmlspecialchars($_POST["modifemail"]);
			
			
			
			if (isset($_POST['modifville']) && trim($_POST['modifville']) != "")
			    $ville = htmlspecialchars($_POST["modifville"]);
			
			if (isset($_POST['modifcp']) && trim($_POST['modifcp']) != "")
			    $cp = intval($_POST['modifcp']);
				
				$sql = sprintf("UPDATE users SET des=(\"%s\"),tel=(\"%s), atel=(\"%s\"), mail=(\"%s\"),amail=(\"%s\"), ville=(\"%s\"), cp=(\"%s\")  WHERE id=\"%s\";", $description, $tel, $affichetel, $email, $affichemail, $ville, $cp, $id);
			mysql_query($sql);
			
			header("location:espacemembre.php");
		
		
		
		}
		
		
		
		
							
							
						
?>








	<meta charset="utf-8">
<html xmlns="http://www.w3.org/1999/xhtml">
	<title>Espace Membre</title>
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
				<div id="ctl00_pageContenu_pnCarte">
					<div class="photo_pres">
						<h1>Mes Infos Perso</h1>
						<?php 

	include("recupdonnee.php"); 

	include('FctPhp.php');

	 


	echo"<form>";
	
	echo ' '.$da["nom"].'  '.$da["prenom"].'<br/>';


	if($da['avatar']!= NULL) 
	{ 
	  echo $da['avatar'];  
	} 
	else if ($da['sexe'] == 'Homme')
       {    
       	echo "<img src='images/pp_homme.png' alt='profil homme' /> <br/><br/> "; 
       }
	

	else 
       {
       		echo "<img src='images/profil_femme_120' alt='Profil femme' /> <br/><br/>";
	   }
	 
	 echo "Date de Naissance: ".$da['birth']."<br/><br/>";


    if($da['description']!= NULL)
	
	    echo "A propos de Moi. <br/>"
	.$da['description']."<br/>";

	    echo "Modifier/Ajourter une description  <input type='textarea' name='modifdescription' /> <br/><br/>";
		
    	
	 // affiche le tel permet de rentrer un nouveau tel, changer le statut d'affichage
	if($da['tel']!= NULL  ) 
	 echo "Téléphone: ".$da['tel']."<br/>";
	  
	  echo " <label for='tel'> Modifier/Ajourter un Numero de Telephone: <input type='tel' name='modiftel' /> </label>  <br/>";

	  if($da['AfficheTel'] == 1)
	  	   echo "Actuellement vous permettez aux autres utilisateurs visitant votre profil de voir votre numéro de téléphone, 
	          <br/> Voulez-vous le masquer?
	          <input type='radio' name='affichetel' value='NULL'  /> <br/><br/>" ;
	  else
	  	   echo "Actuellement vous ne permettez pas aux autres utilisateurs visitant votre profil de voir votre numéro de téléphone, 
	          <br/> Voulez-vous l'afficher? 
	          <input type='radio' name='affichetel' value='1'  /> <br/><br/>" ;
	  

	  if($da['email']!= NULL  ) 
	 echo "@dresse E-mail: ".$da['email']."<br/>";
	  
	  echo " Modifier/Ajourter une adresse email: <input type='email' name='email' /> <br/>";

	  if($da['afficheEmail'] == 1)
	  	   echo "Actuellement vous permettez aux autres utilisateurs visitant votre profil de voir votre adresse email, 
	          <br/> Voulez-vous la masquer?
	          <input type='radio' name='affichemail' value='NULL'  /> <br/><br/>" ;
	  else
	  	   echo "Actuellement vous ne permettez pas aux autres utilisateurs visitant votre profil de voir votre adresse email, 
	          <br/> Voulez-vous l'afficher? 
	          <input type='radio' name='affichemail' value='1'  /> <br/><br/>" ;
	  
	  echo "Ville: ".$da['ville']." (".$da['numDep'].")<br/>";
      echo"Modifier mon adresse //  Ville:  <input type='text' name='modifville' /> CP:  <input type='text' name='modifcp' /> <br/><br/>";

      
     

	  echo "<input type='submit' name='submit' value='Modifier mes Informations'>";
	  
	  
					?>
					</div>
				</div>
				
	<!--Zone connexion (à virer si pas util)-->
				<div id="ctl00_pageContenu_connexion">
					<div id="login" class="boitegrise_305">
					<?php
						if (isset($_SESSION['id'])) {
							echo '<h2>&nbsp;Vous ètes CONNECTEZ</h2><form method="post" action="Connexion.php">
							<p>
								<label for="ctl00_pageContenu_email" id="ctl00_pageContenu_mailLabel">Mail</label>
								<input name="email" id="ctl00_pageContenu_email" type="text">
							</p>
							<p>
								<label for="ctl00_pageContenu_pass" id="ctl00_pageContenu_passLabel">Mot de passe</label>
								<input name="mdp" id="ctl00_pageContenu_pass" type="password">
							</p>
							<p class="align_image">
								<input type="submit" name="submit" value="Se connecter" />
							</p>
						</form>';
						}
						else {
							echo "ID = ".$_SESSION['id']."\n";
							echo '<h2>&nbsp;Connectez-vous</h2><form method = "post" action ="Connexion.php">
							<p>
								<label for="ctl00_pageContenu_email" id="ctl00_pageContenu_mailLabel">Mail</label>
								<input name="email" id="ctl00_pageContenu_email" type="text">
							</p>
							<p>
								<label for="ctl00_pageContenu_pass" id="ctl00_pageContenu_passLabel">Mot de passe</label>
								<input name="mdp" id="ctl00_pageContenu_pass" type="password">
							</p>
							<p class="align_image">
								<input type="submit" name="submit" value="Se connecter" />
							</p>
						</form>';
						}
						?>
						
						<p style="margin-top: 6px" align="center"><a href="/mdp/mdp.aspx" onclick="window.open(this.href,'Oubli_Mot_de_Passe','height=250,width=300,scrollbars=no,toolbar=no,menubar=no,resizeable=yes,status=no'); return false;">
						Oubli du mot de passe ?</a></br><a href="FormInscription.php">Pas encore membre?</a></p>
						
						<div class="finboite"></div>
					</div>
				</div>
	<!--Fin de Zone connexion-->


	<!-- EXEMPLE DE BOITE POUR LE SITE
				CORRESPOND A UNE BOITE SMALL
				<div class="boitegrise_305">
					<h2>Exemple boite petie</h2>
					<p>
						Exemple
					</p>
					<div class="finboite"></div>
				</div>
				CORRESPON A LA BOITE MEDIUM
				<div class="boitegrise_466 sans_marge_gauche">
					<h2>Exemple boite medium</h2>
					 <p>
						Exemple
					</p>
					<div class="finboite"></div>
				</div>
	FIN EXEMPLE DE BOITE-->
	
	
				<div class="spacer"></div>
			</div>
<!--FIN CONTENU-->
		
<!--FOOTER-->			
			<?php getFooter(); ?>
<!--FIN FOOTER-->
			
		</div>
	</body>
</html>