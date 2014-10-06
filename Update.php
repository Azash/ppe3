<!-- MARCHE PASSSSSS!!!!!!!  (6mn vid nicwalle changer pseudo)-->

<meta charset="utf-8" />
<html>
<head>

<title>Changez vos informations</title>
</head>

<body>


<form method="post">
<p>Votre nouveau mail</p>
<input type="text" name="email">
<br/><br/>
<input type="submit" name="submitemail" value ="changer">


</body>

</form>

<?php

session_start();


if(isset($_POST['submitemail'])) // lors de la validation du bouton submit
{
	//$email = mysql_real_escape_string(htmlspecialchars(trim($_POST[email])));
	$email = htmlspecialchars(trim($_POST[email])); // création de la variable email
	
	// mysql_real_escape_string : empecher les injections sql
	//htmlspecialchars : empecher les utili à coder en html dan les zones de type texte
	//trim : permet d'enlever ts les espaces de début et de fin
	
	if (empty($email)) // si vide
	{
		echo "veuillez compléter ce champs";
	}
	else 
	{
		@$connexion = mysql_connect("localhost","root","");
		@mysql_select_db("sos_partenaire");

		mysql_query(" UPDATE users SET email ='$email' WHERE email = '{$_SESSION['email']}'")or die(mysql_error());
	}
	header("location : Deconnexion.php");
}	

?>







<!-- <form method="post"> -->
<!-- <p>Votre nouveau nom</p> -->
<!-- <input type="text" name="nom"> -->
<!-- <br/><br/> -->
<!-- <input type="submit" name="submitnom" value ="changer"> -->


<!-- </body> -->

<!-- </form> -->


<?php 
// if(isset($_POST['submitnom'])) // lors de la validation du bouton submit
// {
// 	$nom = htmlspecialchars(trim($_POST[nom])); // création de la variable email

	
// 	if (empty($nom)) // si vide
// 	{
// 		echo "veuillez compléter ce champs";
// 	}
// 	else 
// 	{
// 		@$connexion = mysql_connect("localhost","root","");
// 		@mysql_select_db("sos_partenaire");

// 		mysql_query(" UPDATE users SET nom ='$nom' WHERE email = '{$_SESSION['nom']}'")or die(mysql_error());
// 	}
		
// }	
// ?>