<?php
//INCLURE CONNEXIN 
mysql_select_db($db) or die("base introuvable");

?>

<html> 
<br><form action="" method="get"> <input type="text" size="100" name="s"> <input type="submit" value="OK" name="search"> </form> 

<?php 
if(isset($_POST['search'])){
	$Mt = $_POST['s'];
	echo '<META HTTP-EQUIV="Refresh" CONTENT="2"; URL=recherche?s='.$Mt.'">';
}

$Mot= $_GET['s'];
if (($Mot == "")||($Mot == "%")) {
	echo '<h2>Veuillez saisir un mot clé.</h2>';
}

else { $query = "SELECT distinct count(mot) FROM recherche WHERE mot LIKE \"%Mot%\" ";
//}/////////////////////////?????????

$result = mysql_query($query);

$row = mysql_fetch_row($result);

$Nombre = $row[0];

if ($Nombre == "0") { echo "<h2><font color=red>Aucun résultat ne correspond à votre recherche <i>$Mot<i>.</font></h2>

<p>

";

}

else {$query = "SELECT * FROM recherche WHERE not LIKE \"%$Mot%\" ";}///////////////?????

$result = mysql_query($query);

$row = mysql_fetch_row($result);

$Nombre = $row[0];

if ($Nombre == "0") {echo " <h2><font color=red> Aucun résultat ne correspond à votre recherche <i>$Mot</i>.</font></h2>

<p>

";

}

else { $query = "SELECT * FROM recherche WHERE mot LIKE \"%Mot%\" ";

$result = mysql_query($query);

echo '<small>'.$Nombre.'r&eacute;sultat.</small><br><br>

<p>';       

} while($row = mysql_fetch_row($result)) {echo ' <p><h2 style="display: inline;">'.$row[1].'</h2><small><font color = "green"> ('.$row[2].')</font></small></p><br>';

}


mysql_close();

?>

</body>

</html>