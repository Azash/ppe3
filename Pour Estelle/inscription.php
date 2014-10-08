<!DOCTYPE HTML>
<!-- A COPIER -->

<?php
	//fonction mail, use swift ???
	
	include("connexion.php");
	
	session_start();
	//if (!isset($_SESSION["isOk"]))
	//	$_SESSION["isOk"] = false;
	$prenom = "";
	$nom = "";
	$pseudo = "";
	$email = "";
	$mday = "";
	$mmonth = "";
	$myear = "";
	$tel = "";
	$errorForm = 0;
	
	
	
	if (isset($_POST["prenom"])) $prenom = $_POST["prenom"];
	if (isset($_POST["nom"])) $nom = $_POST["nom"];
	if (isset($_POST["pseudo"])) $pseudo = $_POST["pseudo"];
	if (isset($_POST["email"])) $email = $_POST["email"];
	if (isset($_POST["birth"])) $mday = substr($_POST["birth"], 0, 2);
	if (isset($_POST["birth"])) $mmonth = substr($_POST["birth"], 3, 2);
	if (isset($_POST["birth"])) $myear = substr($_POST["birth"], 6, 4);
	
	$sqlEmail = "SELECT email FROM inscriptions WHERE email='".$email."'";
	$reqEmail = mysql_query($sqlEmail) or die('Erreur SQL !<br>'.$sqlEmail.'<br>'.mysql_error());
	$sqlPseudo = "SELECT pseudo FROM inscriptions WHERE pseudo='".$pseudo."'";
	$reqPseudo = mysql_query($sqlPseudo) or die('Erreur SQL !<br>'.$sqlPseudo.'<br>'.mysql_error());
	
 
	if (isset($_POST["tel"])) $tel = $_POST["tel"];
		if (isset($prenom) && trim($prenom) != "")
		{
			if (trim($nom) != "")
			{
				if (trim($pseudo) != "" && mysql_num_rows($reqPseudo) == 0)
				{
					if (filter_var($email, FILTER_VALIDATE_EMAIL) && mysql_num_rows($reqEmail) == 0)
					{
						echo $email2;
						echo $email;
						if (is_numeric($mday) && is_numeric($mmonth) && is_numeric($myear) && checkdate(intval($mmonth), intval($mday), intval($myear)))
						{
							if (is_numeric($tel) && strlen($tel) == 10) {
								$tmpPwd = "";
								for ($i = 1; $i <= 6; $i++) {
									$tmpPwd .= chr(rand(48, 90)); //33 = premier caractere imprimable de la table ascii, 125 = dernier qui nous interesse...
								}
								//echo $tmpPwd."<br />";
								$req = sprintf("INSERT INTO inscriptions (prenom, nom, pseudo, email, birth, tel, dateInscri, type, pwd) VALUES (\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"0\",SHA(\"%s\")) ", 
										$prenom, $nom, $pseudo, $email, $mmonth."/".$mday."/".$myear, $tel, date("d/m/y"), $tmpPwd);
								//echo $req;
								mysql_query($req);
							
							///////////////////////////////////////////////////////////////////////////							
							//Envoi du mail !
								$sujet = 'Sujet de l\'email';
								$message = "Bonjour, ".$pseudo." 
								Ceci est votre mot de passe : ".$tmpPwd."
								Merci :)";
								$headers = "From: postmaster@guillaumeboudy.com\n";
								$headers .= "Reply-To: postmaster@guillaumeboudy.com\n";
								$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"";
								if(mail($email,$sujet,$message,$headers))
								{
								echo "L'email a bien été envoyé.";
								echo "resultat req : ".$resEmail." blabla";
								}
								else
								{
								echo "Une erreur c'est produite lors de l'envoi de l'email.";
								}
							///////////////////////////////////////////////////////////////////////////////////
								//$_SESSION["isOk"] = true;
								}
							else
								$errorForm = 6;
						}
						else
							$errorForm = 5;
					}
					else
						$errorForm = 4;
				}
				else
					$errorForm = 3;
			}
			else
				$errorForm = 2;
			}
		//else
		//header("location:log.php?errorForm=1");
	//header("location:log.php");
	include "header.php"
?>
<!-- A COPIER -->
<html>
	<head>
		<title>M2Lsports</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel='icon' type='image/png' href='images/favicon.png'>
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,900,300italic" rel="stylesheet" />
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
	</head>
	<body class="homepage">

		<!-- Header Wrapper -->
			<div id="header-wrapper">
				<div class="container">
					<div class="row">
						<div class="12u">
						
							<!-- Header -->
							<?php getHeader(); ?>
						</div>
					</div>
				</div>
			</div>
		
		<!-- VOTRE PUTAIN DE CODE -->
			<div id="main-wrapper">
				<div class="container">
					<div class="row">
						<div class="12u">
							<section>
								<div>
									<div class="row">
										<div class="12u skel-cell-important">
											<!-- Content -->
												<article class="box is-post">
													<!-- Titre -->
													<header>
														<center><h2>S'inscrire</h2></center></br >
													</header>
												<!-- Intro -->
													<div class="center">
												<!-- A COPIER -->
														<form action='inscription.php' method='post' name='NewLog'>
															<table class='flat-table flat-table-3'>
																<tr><td>Prénom : </td><td><input type='text' name='prenom' value='<?php echo $prenom; ?>' /></td></tr>
																<tr><td>Nom : </td><td><input type='text' name='nom' value='<?php echo $nom; ?>' /></td></tr>
																<tr><td>Pseudo : </td><td><input type='text' name='pseudo' value='<?php echo $pseudo; ?>' /></td></tr>
																<tr><td>Email : </td><td><input type='text' name='email' value='<?php echo $email; ?>' /></td></tr>
																<tr><td>Date de naissance : </td><td><input type='text' name='birth' value='<?php if ($mday != "") echo $mday."/".$mmonth."/".$myear; ?>' /></td></tr>
																<tr><td>Téléphone : </td><td><input type='text' name='tel' value='<?php echo $tel; ?>' /></td></tr>
															</table></br >
															<?php
																switch ($errorForm)
																{
																	case 1: echo "<div class='warning'>/!\ Le champ Prénom est vide ou invalide /!\</div>"; break;
																	case 2: echo "<div class='warning'>/!\ Le champ Nom est vide ou invalide /!\</div>"; break;
																	case 3: echo "<div class='warning'>/!\ Le champ Pseudo est vide, invalide ou déjà utilisé/!\</div>"; break;
																	case 4: echo "<div class='warning'>/!\ Le champ Email est vide, invalide ou déjà utilisé/!\</div>"; break;
																	case 5: echo "<div class='warning'>/!\ Le champ Date de naissance est vide ou invalide /!\</div><br />"; break;
																	case 6: echo "<div class='warning'>/!\ Le champ Téléphone est vide ou invalide /!\</div>"; break;
																}
															?>
															<input type='submit' class="send" value='Envoyer' />
														</form>
														
												<!-- A COPIER -->
													</div>
												</article>
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
				</div>
			</div>
			<?php getFooter(); ?>
	</body>
</html>