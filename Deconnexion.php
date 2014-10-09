<?php
     session_start(); 
    
	// On écrase le tableau de session
	$_SESSION = NULL; //

	// On détruit la session
	session_destroy();	 

	//header('Location: ./');
	header('Location: index.php');
	?>