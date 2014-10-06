<?php

//$serveur="localhost";
//$base="sos_partenaire";
//$utilisateur="root";
//$mot_passe="";

//$db = mysql_connect($serveur,$utilisateur,$mot_passe);

//mysql_select_db($base,$db);

@$connexion = mysql_connect("localhost","root","") or exit(mysql_error());
@mysql_select_db("sos_partenaire") or exit(mysql_error());
?>
