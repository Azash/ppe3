<?php 
	//Pour se connecter à la base de données
	include('connexionbdd.php');
	include('FctPhp.php');
?>

<?php  /* INSCRIPTION */

	mysql_query("set names 'utf8'");
	
	if(isset($_POST['submit']))
	{
		$nom = htmlspecialchars($_POST["nom"]);
		$prenom = htmlspecialchars($_POST["prenom"]);
		//$birth = htmlspecialchars($_POST["birth"]);
		$jourNaissance = intval($_POST['jourNaissance']);
		$moisNaissance = intval($_POST['moisNaissance']);
		$anneeNaissance = intval($_POST['anneeNaissance']);
		$numDep = intval($_POST['numDep']);
		$mdp = htmlspecialchars($_POST["mdp"]);
		$re_mdp = htmlspecialchars(trim($_POST['re_mdp']));
		$sexe = htmlspecialchars($_POST["sexe"]);
		$email = htmlspecialchars($_POST["email"]);
		$pass = "";
		$id = "";
		
		$sqlEmail = "SELECT email, id, prenom FROM users WHERE email='".$email."'";
		$reqEmail = mysql_query($sqlEmail) or die('Erreur SQL !<br>'.$sqlEmail.'<br>'.mysql_error());
		
		if($nom && $prenom && $mdp && $re_mdp && $sexe && $email)
		{
			if(strlen($nom)>=2)
			{
				if(strlen($prenom)>=2)
				{
					if($mdp == $re_mdp)
					{
						if (filter_var($email, FILTER_VALIDATE_EMAIL) && mysql_num_rows($reqEmail) == 0)
						{	
							$mdp = SHA1($mdp);   //cryptage du mdp
								
							//include_once 'includes/connexionbdd.inc.php';
							//$query = mysql_query("INSERT INTO users VALUES('', '$nom', '$prenom', '" . $anneeNaissance . "-" . $moisNaissance . "-" . $jourNaissance . "-1', $sexe', '$email', '$mdp')");
							$date = $anneeNaissance . "-" . $moisNaissance . "-" . $jourNaissance;
							
							for ($i = 1; $i <= 8; $i++) {
								$pass .= chr(rand(65, 90)); //33 = premier caractere imprimable de la table ascii, 125 = dernier qui nous interesse...
							}
							
							$sqlInsert = "INSERT INTO users (id, nom, prenom, birth, mdp, sexe, email, numDep, pass) VALUES('null', '$nom', '$prenom', '$date', '$mdp', '$sexe', '$email', '$numDep', '$pass')";
							//echo $sql;
							$resInsert = mysql_query($sqlInsert);
							
							if(!$resInsert) echo mysql_error();
							header('location:EnvoieMail.php?email='.$email.'');
							//mysql_query("INSERT INTO users VALUES('', '$nom', '$prenom', '" . $anneeNaissance . "-" . $moisNaissance . "-" . $jourNaissance . "', $sexe', '$email', '$mdp')");
							//die('Formulaire bien rempli! Vous allez maintenant reçevoir un mail avec un mot de passe de confirmation. Vous pourrez ensuite choisir votre propre mot de passe pour vous connecter.<a href="index.php">Continuer mon inscription</a>');
						}else echo "L'adresse email entrée est déjà utilisé, veuillez entrer une autre adresse email";
					}else echo "Les mots de passe ne sont pas identiques";
				}else echo "Veuillez rentrer un prenom de + de 2 caractères";
			}else echo "Veuillez rentrer un nom de + de 2 caractères";
		}else echo "Veuillez saisir tous les champs!";
	}
?>

<meta charset="utf-8">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<title>SOS partenaires</title>
	<link rel="stylesheet" href="style.css" type="text/css" charset="utf-8">
	<!--<script style="" type="text/javascript" src="/global/jquery-1.11.0.min.js"></script>-->
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="Author" content="SOSpartenaires">
	<meta name="description" content="Sur SOS partenaires trouvez des activités près de chez vous, Organisez vos sports et loisirs avec vos amis, Trouvez de nouveaux partenaires.">
	<meta name="Keywords" content="SOS partenaires, sports et loisirs, sport, loisir, coach, reseau, social, bien, etre, bien-etre, loisirs, sports, communaute, social">

	<!--<link rel="shortcut icon" href="/favicon.ico">-->
	<body>
		<div id="conteneur">
<!--HEADER-->		
			<?php getHeader(); ?>
<!--FIN HEADER-->
<!--CONTENU-->			
			<div id="contenu_annexe">
				<div class="boitegrise_626">
					<h2>&nbsp;Inscription</h2>
						<form method="post" action="FormInscription.php" style="text-align:center">
						<p align="center">Veuillez saisir toutes les informations</p>
						<br />

						<table>
							<tr>
								<td style="text-align: right"><label>&nbsp;Votre nom : </label></td>
								<td><input type="text" name="nom"></td>
							</tr>
							<tr>
								<td style="text-align: right"><label>&nbsp;Votre prénom : </label></td>
								<td><input type="text" name="prenom"></td>
							</tr>
							
							<tr>
								<td style="text-align: right"><label>&nbsp;Date de naissance : </label></td>	
								<td>
									<select name="jourNaissance">
									<?php 
									for ($i = 1; $i <= 31; $i++):
									?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
									<?php 
									endfor;
									?>
									</select>
									<select name="moisNaissance">
									<?php 
									for ($i = 1; $i <= 12; $i++):
									?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
									<?php 
									endfor;
									?>
									</select>
									<select name="anneeNaissance">
									<?php 
									for ($i = date('Y'); $i >= date('Y')-100; $i--):
									?>
									
									<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
									<?php 
									endfor;
									?>
									</select>
								</td>
							</tr>
							
							<tr>
								<td style="text-align: right"><label>&nbsp;Département : </label></td>	
								<td>
									<select name="numDep">
									<?php 
									for ($i = 1; $i <= 94; $i++):
									?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
									<?php 
									endfor;
									?>
									</select>

							<tr>
								<td style="text-align: right"><label>&nbsp;Votre mot de passe : </label></td>
								<td><input type="password" name="mdp"></td>
							</tr>

							<tr>
								<td style="text-align: right"><label>&nbsp;Répetez votre mot de passe : </label></td>
								<td><input type="password" name="re_mdp"></td>
							</tr>
							
							<tr>
								<td></td>
								<td><input type="radio" name="sexe" value="Homme" checked/> Homme <input type="radio" name="sexe" value="Femme" /> Femme</td>
							</tr>

							<tr>
								<td style="text-align: right"><label>&nbsp;Votre email : </label></td>
								<td><input type="email" name="email"></td>
							</tr>	
							
							<tr>
								<td></td>
								<td><center><input type="submit" name="submit" value="Valider"></center></td>
							</tr>
						</table>
					</form>
					<br />
					<center><a href="index.php">Je possède déja un compte</a></center>
					<div class="finboite"></div>
				</div>
				<div class="spacer"></div>
			</div>
<!--FIN CONTENU-->			
<!--FOOTER-->			
			<?php getFooter(); ?>
<!--FIN FOOTER-->			
		</div>
	</body>
</html>


