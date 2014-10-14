<?php 
	include ('connexionbdd.php');
	
	$getId = $_GET["id"];
	$getPass = $_GET['pass'];
	
	//variable du mot pour dire que l'email a été validé dans la base
	$valide = 'valide';
	
	//echo 'id='.$getId.'<br />';
	//echo 'pass='.$getPass.'<br />';
	
	$sql = "SELECT id, pass FROM users WHERE id='".$getId."'";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	$data = mysql_fetch_assoc($req);
		
	//echo 'id='.$data['id'].'&pass='.$data['pass'];

	if (isset($_get['id'])) {
		if ($getPass == $data['pass']) {
			$sqlValide = "UPDATE users SET valide = 'valide' WHERE id = '".$data['id']."'";
			$reqValide = mysql_query($sqlValide) or die('Erreur SQL !<br>'.$sqlValide.'<br>'.mysql_error());
			$sqlPass = "UPDATE users SET pass = null WHERE id = '".$data['id']."'";
			$reqPass = mysql_query($sqlPass) or die('Erreur SQL !<br>'.$sqlPass.'<br>'.mysql_error());
						
			echo "Email Validé. Vous pouvez vous connecter.";
			header('Refresh: 4;url=index.php');
		}else {
			echo "Erreur ce lien n'est pas valide. Si vous rencontrez des problèmes, veuillez nous contacter par email.";
			header('Refresh: 4;url=index.php');
			}
	}else {
		echo "Erreur ce lien n'est pas valide. Si vous rencontrez des problèmes, veuillez nous contacter par email.";
		header('Refresh: 4;url=index.php');
		}
?>