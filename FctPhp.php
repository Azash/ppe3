<?php
	function getHeader() {
			echo '<div id="entete">
				<div id="menu_entete">
				
					<a href="index.php" id="ctl00_menu_Entete_menu_mycleec">Sports&Cie</a>
					<a href="perso.php" id="ctl00_menu_Entete_menu_membres">Espace Perso</a>
					<a href="afficher.php" id="ctl00_menu_Entete_menu_activites">Activités</a>
					<a href="rechercher.php" id="ctl00_menu_Entete_menu_activites">Rechercher</a>
					<div class="spacer"></div>
				</div>
			</div>';
		}
		
	function getFooter() {
		echo '<div id="pied">
				<a href="http://www.m2lsports.guillaumeboudy.com">M2L Sports</a> |
				<a href="mentions.php">Mentions Légales</a> |
				<a href="contact.php">Contact</a>
			</div>';
	}
	
	function getConnexion() {
		echo '<div id="login" class="boitegrise_305">';
					
						
						
						if (isset($_SESSION["id"])) {
							$sqlPrenom = "SELECT prenom FROM users WHERE id='".$_SESSION['id']."'";
							$reqPrenom = mysql_query($sqlPrenom) or die('Erreur SQL !<br>'.$sqlPrenom.'<br>'.mysql_error());
							$data = mysql_fetch_assoc($reqPrenom);
							//echo "ID = ".$_SESSION[\'id\']."\n";
							//echo "Prenom = ".$data[\'prenom\']."\n";
							echo '<h2>&nbsp;Bonjour '.$data["prenom"].'</h2>
							<p>
								<center><a href="deconnexion.php">Se déconnecter<a></center>
							</p>
							<p>
								<center><a href="perso.php">Mes infos</a></center>
							</p>';
						}
						else {
							//echo "ID = ".$_SESSION['id']."n";
							echo '<h2>&nbsp;Connectez-vous</h2><form method = "post" action ="connexion.php">
							<p>
								<label for="ctl00_pageContenu_email" id="ctl00_pageContenu_mailLabel">Mail</label>
								<input name="email" id="ctl00_pageContenu_email" type="text" autofocus>
							</p>
							<p>
								<label for="ctl00_pageContenu_pass" id="ctl00_pageContenu_passLabel">Mot de passe</label>
								<input name="mdp" id="ctl00_pageContenu_pass" type="password">
							</p>
							<p class="align_image">
								<input type="submit" name="submit" value="Se connecter" />
							</p>
							</form>
						
							<p style="margin-top: 6px" align="center"><a href="ForgotMdp.php" onclick="window.open(this.href,"Oubli_Mot_de_Passe","height=250,width=300,scrollbars=no,toolbar=no,menubar=no,resizeable=yes,status=no"); return false;">
							Oubli du mot de passe ?</a></br><a href="FormInscription.php">Pas encore membre?</a></p>';
						}
						echo '<div class="finboite"></div></div>';
	}
	
	function checkDataUser($VarForm) {
		if ((empty($VarForm['nom']) or empty($VarForm['prenom']) or empty($VarForm['email']) or empty($VarForm['numDep']))
		or (!filter_var($VarForm['email'], FILTER_VALIDATE_EMAIL) or strlen($VarForm['numDep']) != 2))
			return false;
		return true;
	}
	
	function ShowListBoxBirth($jour, $mois, $annee) {
		if (!isset($jour))
			$jour = 1;
		if (!isset($mois))
			$mois = 1;
		if (!isset($annee))
			$annee = date('Y');
		echo '<select name="jourNaissance">';
		for ($i = 1; $i <= 31; $i++) {
			echo '<option value="'.$i.'" '; 
			if ($i == $jour)
				echo 'selected '; 
			echo '>'.$i.'</option>';
		}
		echo '</select>';
		echo '<select name="moisNaissance">';
		for ($i = 1; $i <= 12; $i++) {
			echo '<option value="'.$i.'" '; 
			if ($i == $mois)
				echo 'selected '; 
			echo '>'.$i.'</option>';
		}
		echo '</select>';
		echo '<select name="anneeNaissance">';
		for ($i = date('Y'); $i >= date('Y')-100; $i--) {
			echo '<option value="'.$i.'" '; 
			if ($i == $annee)
				echo 'selected '; 
			echo '>'.$i.'</option>';
		}
		echo '</select>';
	}
?>