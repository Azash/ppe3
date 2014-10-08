<?php 
if (isset($_GET["deco"]) && $_GET["deco"] == true) {
	session_start();
	$_SESSION["isOk"] = false;
	$_SESSION["isAdmin"] = false;
	$_SESSION["isForm"] = false;
		session_destroy();
		
		header("Location: index.php");
	}
else
	session_start();
?>
<!DOCTYPE HTML>
<!-- A COPIER -->

<?php
	//fonction mail, use swift ???
	
	include "connexion.php";
	
	if (!isset($_SESSION["isOk"]))
		$_SESSION["isOk"] = false;
	$pseudo = "";
	$pwd = "";
	$errorForm = 0;
	if (isset($_POST["pseudo"])) $pseudo = $_POST["pseudo"];
	if (isset($_POST["pwd"])) $pwd = $_POST["pwd"];
	if ($pseudo!= "")
	{
		if ($pwd != "") {
			$sql = "SELECT pseudo, type, Id FROM inscriptions WHERE pwd=SHA('".$pwd."')";
			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
			$data = mysql_fetch_assoc($req);
			if ($data["type"] == "admin") {
				$_SESSION["isAdmin"] = true;
			}else{
				$_SESSION["isAdmin"] = false;
			}
			if ($data["type"] == "formateur") {
				$_SESSION["isForm"] = true;
			}else{
				$_SESSION["isForm"] = false;
			}
			if($data['pseudo'] == $pseudo) {
				$_SESSION["isOk"] = true;
				$_SESSION["userId"] = $data["Id"];
				echo "LOGGED !";
				header("location:monCompte.php");
			}
			else {
				//echo "NOT LOGGED !";
				$_SESSION["isOk"] = false;
				$errorForm = 3;
				}
		}
		else {
			//echo "NOT LOGGED !";
			$errorForm = 2;
			}
	}
	else
		$errorForm = 1;
	
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
															<center><h2>Se Connecter</h2></center></br >
														</header>
													<!-- Intro -->
														<div class="center">
															<!-- A COPIER -->
															<form action='log.php' align='center' method='post' name='Log'>
																<table class='flat-table flat-table-3'>
																	<tr><td>Pseudo</td><td><input type='text' name='pseudo' value='<?php echo $pseudo; ?>' /></td></tr>
																	<tr><td>Mot de Passe</td><td><input type='password' name='pwd' value='<?php echo $pwd; ?>' /></td></tr>
																</table>
																<?php
																	switch ($errorForm)
																	{
																		case 1: echo "<div class='warning'>/!\ Le champ Pseudo est vide ou invalide /!\</div>"; break;
																		case 2: echo "<div class='warning'>/!\ Le champ Mot de passe est vide ou invalide /!\</div>"; break;
																		case 3: echo "<div class='warning'>/!\ Le Mot de passe et/ou Pseudo erroné(s) /!\</div>"; break;
																	}
																?>
																	</br ><input type='submit' class='send' value='Envoyer' /></br >
															</form>
															<div class="link">
																<a href="inscription.php">S'inscrire</a>&nbsp;&nbsp;&nbsp;
																
																<!--<script>var FckPseudo = document.Log.pseudo.value
																FckPseudo = "log.php?forgot=true&pseudo="+FckPseudo ;
																alert(FckPseudo);</script>-->
																<a  href="ForgotPwd.php">Mot de passe oublié</a>
															</div>
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

