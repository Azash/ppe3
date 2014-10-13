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
include ('connexion.php');


function results($search)
{	//split la variable search en fct des espaces. /s pr reprendre les espaces, /- qui considère les tirets comme des espaces
$search = preg_split('/[\s\-]/',$search);

$count_keywords = count($search);

foreach($search as $key => $searches)
{
	$where .= "users LIKE '%$searches%'";
	if($key != ($count_keywords-1)) // -1 car les tableaux commencent à partir de 1 pr passer au "format tableau"
	{
		$where .=" AND "; // un point pr rajouter apres la variables
	}
}
$query = mysql_query("SELECT * FROM users WHERE $where"); // la variable $where qui contient les conditions :::::::::::::::::::::::::::::::::::::::
// le $searches sera remplacé par le mot clé, si il y en a plusieur, il passera par AND
$rows = mysql_num_rows($query);
if($rows) // n'est pas = à 0
{
	while ($users = mysql_fetch_assoc($query))
	{
		echo"<strong>".$utilisateur['users']."</strong><br/><u>Description : </u><br/>".$users['description']."<br/>sexe : ".$users['sexe']."<br/><br/>";
	}
}else {
	echo "Aucun profil trouvé..";
}


}

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