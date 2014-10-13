<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Rechercher un partenaire</title>
<meta charset="utf-8">
<!-- <link rel="stylesheet" href="css.css"> -->

</head>
<body>

<?php 
include ('functions.php');
?>

<form method="post">
<h2>Rechercher : </h2>
<input type="text" name="search" placeholder="Votre mot clé de recherche...">
<input type="submit" name="submit" value="Rechercher">

</form>

<?php 
if(isset($_POST['submit']))
{
	$search = mysql_real_escape_string(htmlspecialchars(trim($_POST['search'])));
	
	if(empty($search))
	{
		echo "<span class='erreur'>Veuillez remplir ce champs</span>";
	}else if (strlen($search) ==1)
	{
		echo"<span class='erreur'>Votre mot clé trop court</span>";
	}else{
		results($search);
	}
}

?>

</body>
</html>