

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css" charset="utf-8">
    <title>Mon Espace Membre</title>
  </head>
  <body>
   
	<?php 

	include("recupdonnee.php"); 

	include('FctPhp.php');

	 getHeader(); 
	 getConnexion();



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
	  
	  echo " <label for='tel'> Modifier/Ajourter un Numero de Telephone: <input type='tel' name='tel' /> </label>  <br/>";

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
	  
	  echo "Ville: ".$da['ville']." (".$da['codePostal'].")<br/>";
      echo"Modifier mon adresse //  Ville:  <input type='text' name='modifville' /> CP:  <input type='text' name='modifcp' /> <br/><br/>";

      echo "Vos Disponibilités pour une rencontre sportive <br/><br/>";
      


      echo"<label for='ctl00_pageContenu_postal' id='ctl00_pageContenu_Label1'>Sport: </label>
						<select name='Activité' id='ctl00_pageContenu_ddl_loisir'>";
							
								$req = "SELECT activitie FROM activities ORDER BY activitie";
								$resultat = mysql_query($req);
								$da = mysql_fetch_assoc($resultat);
								while($ligne){
									echo "<option value=/".$da['activitie'].">".$da['activitie']."</option>";
									$da = mysql_fetch_assoc($resultat);
								}	
							
						echo"</select>
						<label for='ctl00_pageContenu_postal' id='ctl00_pageContenu_postalLbl'>Département : </label>
						<select name='ctl00$pageContenu$postal' id='ctl00_pageContenu_postal'>";
							
								$req = sprintf("SELECT dep FROM departements");
								$resultat = mysql_query($req);
								$da = mysql_fetch_assoc($resultat);
								while($ligne){
									echo '<option value="'.$da["dep"].'">'.$da["dep"].'</option>';
									$da = mysql_fetch_assoc($resultat);
								}	
							
						echo"</select>";

     

	  echo "<input type='submit' name='submit' value='Modifier mes Informations'>";

	  
							
								
	  


  

      getFooter();
	  ?>
	
  </body>
</html>

	
	
	
	
	

	
	
	
	
	
	
	
	
	

	




 