<?php
     session_start(); 
     @$connexion = mysql_connect("localhost","root","") or exit(mysql_error()); //why @?
     @mysql_select_db("sos_partenaire") or exit(mysql_error());
	
     
     mysql_query("DELETE FROM users WHERE email = '{$_SESSION['email']}'");
     
     header("Location:Deconnexion.php")
     //header("Location:ConnexionReussie.php")
?>