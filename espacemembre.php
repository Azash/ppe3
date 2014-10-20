<?php if(isset($_POST['submit']))
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
	  
	  echo "Ville: ".$da['ville']." (".$da['codePostal'].")<br/>";
      echo"Modifier mon adresse //  Ville:  <input type='text' name='modifville' /> CP:  <input type='text' name='modifcp' /> <br/><br/>";

      
     

	  echo "<input type='submit' name='submit' value='Modifier mes Informations'>";
	  
	  
						
		
		

	  
							
								
	  


  

      getFooter();
	  ?>
	
  </body>
</html>