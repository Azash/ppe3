<?php
	include ('connexionbdd.php');
	$email = $_GET['email'];
	
	$sql = "SELECT id, prenom, email, pass FROM users WHERE email='".$email."'";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());;
	$data = mysql_fetch_assoc($req);
			
			//Envoi du mail !
				$sujet = 'Sujet de l\'email';
				$message = "Bonjour, ".$data['prenom']." 
				Veuillez valider votre adresse email en cliquant sur ce lien : http://www.m2lsports.guillaumeboudy.com/ppe3/validation.php?id=".$data['id']."&pass=".$data['pass']."
				Merci :)";
				$headers = "From: postmaster@guillaumeboudy.com\n";
				$headers .= "Reply-To: postmaster@guillaumeboudy.com\n";
				$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"";
				if(mail($email,$sujet,$message,$headers))
				{
					echo "L'email a bien été envoyé.";
				}else
				{
					echo $pass;
					echo $email;
					echo $sujet;
					echo $message;
					echo $headers;
					echo "Une erreur c'est produite lors de l'envoi de l'email.";
				}
?>