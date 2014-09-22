
<?php

session_start();
include("connexion.php");


/*
$req = mysql_query('SELECT * FROM users WHERE prenom="Guillaume"') or die(mysql_error());
if ( $da["avatar"] != NULL) echo $da["avatar"]." <br />";
echo $da["prenom"];
echo $da["nom"];
*/

try
{
	
	$req = $db->prepare('SELECT * FROM users WHERE mdp = :mdp ');
	$req->execute(
		array('mdp' => $_POST["mdp"])
		);
	$da = $req->fetch();
	
	echo $da['avatar']
	<button id="modifphoto"> Modifier la photo </button> </br>
	
	echo $da['nom'] echo $da['prenom'] </br></br>
	
	
	
	
	
	
	

	

	//echo "prenom: ".$donnees['prenom'].', nom: '.$donnees['nom'];
	$req->closeCursor();
}
catch(Exception $e)
{
	die('Erreur :'.$e->getMessage());
}
}
?>




<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Mon Espace Membre</title>
  </head>
  
  <body>
   <form action='log.php' method='post' name='log'>
   login: <input type='text' name='login' /> <br/>
   
   mdp: <input type='password ' name='mdp' /><br/>
   
   <input type='submit' class="send" value='Envoyer' />

   </form>
  

  </body>
</html>
 