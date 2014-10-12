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
	
	if ($getPass == $data['pass']) {
		$sqlValide = "UPDATE users SET valide = 'valide' WHERE id = '".$data['id']."'";
		$reqValide = mysql_query($sqlValide) or die('Erreur SQL !<br>'.$sqlValide.'<br>'.mysql_error());
		echo "Email Validé. Vous pouvez vous connecter.";
		header('Refresh: 6;url=index.php');
	}
	else {
		echo "Erreur veuillez cliquez sur le lien que vous avez reçu par email.";
		echo $data['pass'].'<br />';
		echo $data['id'];
	}
?>