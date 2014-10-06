<html>
<meta charset="UTF-8">
	<?php
	include_once 'connexionbdd.php';
	mysql_query("set names 'utf8'");
	
	if(isset($_POST['submit']))
	{
		$nom = htmlspecialchars($_POST["nom"]);
		$prenom = htmlspecialchars($_POST["prenom"]);
		//$birth = htmlspecialchars($_POST["birth"]);
		$jourNaissance = intval($_POST['jourNaissance']);
		$moisNaissance = intval($_POST['moisNaissance']);
		$anneeNaissance = intval($_POST['anneeNaissance']);
		$mdp = htmlspecialchars($_POST["mdp"]);
		$re_mdp = htmlspecialchars(trim($_POST['re_mdp']));
		$sexe = htmlspecialchars($_POST["sexe"]);
		$email = htmlspecialchars($_POST["email"]);


		if($nom && $prenom && $mdp && $re_mdp && $sexe && $email)
		{
			if(strlen($nom)>=2)
			{
				if(strlen($prenom)>=2)
				{
					if($mdp == $re_mdp)
					{
						$mdp = SHA1($mdp);   //cryptage du mdp
							
						//include_once 'includes/connexionbdd.inc.php';
						//$query = mysql_query("INSERT INTO users VALUES('', '$nom', '$prenom', '" . $anneeNaissance . "-" . $moisNaissance . "-" . $jourNaissance . "-1', $sexe', '$email', '$mdp')");
						$date = $anneeNaissance . "-" . $moisNaissance . "-" . $jourNaissance; 
						$sql = "INSERT INTO users (id, nom, prenom, birth, mdp, sexe, email) VALUES('null', '$nom', '$prenom', '$date', '$mdp', '$sexe', '$email')";
						echo $sql;
						$res = mysql_query($sql);
						if(!$res) echo mysql_error();
						//mysql_query("INSERT INTO users VALUES('', '$nom', '$prenom', '" . $anneeNaissance . "-" . $moisNaissance . "-" . $jourNaissance . "', $sexe', '$email', '$mdp')");
						die('Formulaire bien rempli! Vous allez maintenant reçevoir un mail avec un mot de passe de confirmation. Vous pourrez ensuite choisir votre propre mot de passe pour vous connecter.<a href="Connexion.php">Continuer mon inscription</a>');
							
					}else echo "Les mots de passe ne sont pas identiques";
				}else echo "Veuillez rentrer un prenom de + de 2 caractères";
			}else echo "Veuillez rentrer un nom de + de 2 caractères";
		}else echo "Veuillez saisir tous les champs!";
	}
	?>

	<title>Inscription</title>
	
	<body>
	<h1>Inscription</h1>

	<form method="post" action="FormInscription.php">

		<br />


		<label>Votre nom <br />
		<input type="text" name="nom"></label>
		<br />

		<label>Votre prénom <br />
		<input type="text" name="prenom"></label> 
		<br />
		
		
			Date de naissance :
			
			<label>	
			<select name="jourNaissance">
			<?php 
			for ($i = 1; $i <= 31; $i++):
			?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php 
			endfor;
			?>
			</select>
			</label>
			
			
			
			<label>
			<select name="moisNaissance">
			<?php 
			for ($i = 1; $i <= 12; $i++):
			?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php 
			endfor;
			?>
			</select>
			</label>
			
			
			
			
			
			<label>
			<select name="anneeNaissance">
			<?php 
			for ($i = date('Y'); $i >= date('Y')-100; $i--):
			?>
			
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php 
			endfor;
			?>
			</select>
			</label>
			<br/>
			

			
			<br />
		
		<!-- <label>Date de naissance <br />
		<input type="date" name="birth"> </label>
		<br /> -->

		<label>Votre mot de passe<br />
		<input type="password" name="mdp"></label>
		<br />


		<label>Répetez votre mot de passe<br />
		<input type="password" name="re_mdp"></label><br>
		<br> <input type="radio" name="sexe" value="Homme" /> Homme <input type="radio" name="sexe" value="Femme" /> Femme <br />
		<br />

		<label>Votre email<br />
		<input type="email" name="email"> <br /> <input type="submit" name="submit" value="Valider"></label>
		<br />
	</form>

	<a href="Connexion.php">Je possède déja un compte</a>
	

</body>
</html>
