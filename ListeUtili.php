<meta charset="UTF-8">

<!DOCTYPE html>
<html>
<head>

<title>Liste Utilisateurs</title>

<style>
td {
	background-color: #CEF6F5;
	align: center;
}

th {
	background-color: #04B486;
	text-align: center;
}

hr {
	width: 50%;
	color: gray;
	size: 1;
}

.icone {
	width: 20px;
	height: 20px;
}

table {
	margin: auto;
	text-align: center;
	cellpadding : 10px;
}

#principal {
	text-align: center;
}

</style>
</head>

<body>
	<div id="principal">
		<h1>liste des utilisateurs</h1>
		<hr>
				
		<table width=800>
			<tr>
				<th>ID</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Date de naissance</th>
				<th>Sexe</th>
				<th>Email</th>
				<th>Niveau droit</th>
				
				
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			
			<?php
				
			$requete = "SELECT id, nom, prenom, birth, sexe, email, niveau FROM users";
			$resultat = mysql_query($requete, $connexion);
			
				while($ligne = mysql_fetch_array($resultat))
				{
					echo "<tr>";
					echo "<td>".$ligne["id"]."</td>";
					echo "<td>".$ligne["nom"]."</td>";
					echo "<td>".$ligne["prenom"]."</td>";
					echo "<td>".$ligne["birth"]."</td>";
					echo "<td>".$ligne["sexe"]."</td>";
					echo "<td>".$ligne["email"]."</td>";
					echo "<td>".$ligne["niveau"]."</td>";
									
					echo "<td><a href='ModificationUtili.php?id=".$ligne["idUtilisateur"]."'><img class='icone' src='images/modif.png'/></a></td>";
					echo "<td><a href='desinscrire.php?id=".$ligne["idUtilisateur"]."&amp;supprimer'><img class='icone' src='images/sup.png'/></a></td>";
					echo "</tr>";
				}
			?>
		</table>
		<br/>
		 
		<a href="FormAjoutUtili.php"><input type="submit" value="Ajouter un utilisateur" /></a>
		<br/>
		<br/>
			
	</div>
	
	</div>
</body>
</html>