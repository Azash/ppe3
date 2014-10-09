<?php

	$sql = "SELECT id, email, prenom FROM users WHERE id='".$_SESSION['id']."'";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	$data = mysql_fetch_assoc($req);
	
	//Envoi du mail !
		$sujet = 'Sujet de l\'email';
		$message = "Bonjour, ".$data['prenom']." 
		Veuillez valider votre adresse mail en cliquant dur ce lien : <a href='validation.php?id=".$data['id']."AND".$pass."
		Merci :)";
		$headers = "From: postmaster@guillaumeboudy.com\n";
		$headers .= "Reply-To: postmaster@guillaumeboudy.com\n";
		$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"";
		if(mail($email,$sujet,$message,$headers))
		{
			echo "L'email a bien été envoyé.";
		}else
		{
			echo "Une erreur c'est produite lors de l'envoi de l'email.";
		}
	
?>