<!DOCTYPE HTML>
<!-- A COPIER -->

<?php
	//fonction mail, use swift ???
	session_start();
	include "connexion.php";
	
	if (!isset($_SESSION["isOk"]))
		$_SESSION["isOk"] = false;
	$email = "";
	$error = 0;
	if (isset($_POST["email"])) $email = $_POST["email"];
	if ($email != "") {
		$sql = "SELECT pseudo, email, pwd FROM inscriptions WHERE email='".$email."'";
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		$data = mysql_fetch_assoc($req);
		$pseudo = $_data['pseudo'];
		if($data['email'] == $email) {
			$pwd = "";
			for ($i = 1; $i <= 6; $i++) {
				$pwd .= chr(rand(48, 90)); //33 = premier caractere imprimable de la table ascii, 125 = dernier qui nous interesse...
			}
			//echo $tmpPwd."<br />";
			$req = sprintf("UPDATE inscriptions SET pwd=SHA1(\"%s\"), setPwd=NULL WHERE email=\"%s\";", $pwd, $email);
			mysql_query($req);
			///////////////////////////////////////////////////////////////////////////							
							//Envoi du mail !
								$sujet = 'Sujet de l\'email';
								$message = "Bonjour, ".$pseudo."
								Ceci est votre mot de passe : ".$pwd."
								Merci :)";
								$headers = "From: postmaster@guillaumeboudy.com\n";
								$headers .= "Reply-To: postmaster@guillaumeboudy.com\n";
								$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"";
								if (mail($email,$sujet,$message,$headers))
								{
								echo "L'email a bien été envoyé.";
								}
								else
								{
								echo "Une erreur c'est produite lors de l'envois de l'email.";
								}
							///////////////////////////////////////////////////////////////////////////////////
		}
		else {
			$error = "Email introuvable dans la base donnée.";
			}
	}
	else {
		//echo "NOT LOGGED !";
		$error = "Champs email vide.";
		}
	
	include "header.php";
	
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
															<center><h2>Mot de passe oublié, merci de taper votre adresse mail</h2></center></br >
														</header>
													<!-- Intro -->
														<div class="center">
															<!-- A COPIER -->
															<form action='ForgotPwd.php' align='center' method='post' name='Log'>
																<table class='flat-table flat-table-3'>
																	<tr><td>Email</td><td><input type='text' name='email' value='<?php echo $email; ?>' /></td></tr>
																</table>
																<?php if($error != "") echo "<div class='warning'>/!\ L'adresse mail est introuvable dans la base de donnée /!\</div>"; ?>
																	</br ><input type='submit' class='send' value='Envoyer' /></br >
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

