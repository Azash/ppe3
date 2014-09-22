<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8" />
<title>Connexion Réussie</title>


<body>

<?php

session_start();

if(isset($_SESSION['email']))  //indique que quelqu'un s'est bien connecté. pour éviter que n'importe qui puisse se connecter
{
echo "Bonjour, vous êtes connecté avec votre compte ".$_SESSION['email'];


//echo "Bonjour ".$_SESSION['email'];



?>
	<h3>Bonne navigation!</h3>
	<a href="./deconnexion.php" >Me déconnecter</a><br/>
	<a href="./Update.php" >Changer mes informations</a><br/>
	<a href="./Desinscription.php" >Me désinscrire</a><br/>
	
<?php 

//si quelqu'un vient changer l'url manuellement sans se connecter, il est automatiquement renvoyé vers la page Connexion.php
}else{
header('Location:Connexion.php'); 
}


?>

</body>
</html>