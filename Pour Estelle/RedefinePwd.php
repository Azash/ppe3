<!DOCTYPE HTML>
<!-- A COPIER -->

<?php
	//fonction mail, use swift ???
	session_start();
	include "connexion.php";
	
	if (!isset($_SESSION["isOk"]))
		$_SESSION["isOk"] = false;
	$error = 0;
	$ConfirmPwd = "";
	$NewPwd = "";
	$id = 0;
	if (isset($_SESSION["userId"])) $id = $_SESSION["userId"];
	if (isset($_POST["ConfirmPwd"])) $ConfirmPwd = $_POST["ConfirmPwd"];
	if (isset($_POST["NewPwd"])) $NewPwd = $_POST["NewPwd"];
	if ($id > 0) {
		//$sql = "SELECT email, pwd FROM inscriptions WHERE id=".$id.";";
		//$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		//$data = mysql_fetch_assoc($req);
		if ($ConfirmPwd != "" && $ConfirmPwd == $NewPwd)
		{	
			$req = sprintf("UPDATE inscriptions SET pwd=SHA(\"%s\"), setPwd=1 WHERE Id=\"%s\";", $NewPwd, $id);
			mysql_query($req);
			header("location:e.php");
		}
		else
			$error = "Mot de passe différent";
	}
	else
		header("location:log.php");
	//echo "-";
	//echo $id;
	//echo "-";
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
															<center><h2>Merci de saisir votre nouveau mot de passe personnel</h2></center></br >
														</header>
													<!-- Intro -->
														<div class="center">
															<!-- A COPIER -->
															<form action='RedefinePwd.php' align='center' method='post' name='Log'>
																<table class='flat-table flat-table-3'>
																	<tr><td>Nouveau mot de passe</td><td><input type='password' name='NewPwd' value='' /></td></tr>
																	<tr><td>Confirmer mot de passe</td><td><input type='password' name='ConfirmPwd' value='' /></td></tr>
																</table>
																<?php if($error != "") echo "<div class='warning'>/!\ Les mots de passes sont différents /!\</div>"; ?>
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

