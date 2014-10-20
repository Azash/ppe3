<?php

session_start();
include("connexionbdd.php");
$id= $_SESSION['id'];

$sql =( "SELECT * FROM users WHERE id='$id' ");
			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
			$da = mysql_fetch_assoc($req);

?>