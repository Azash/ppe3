<?php
	function getHeader() {
			echo '<div id="entete">
				<div id="menu_entete">
				
					<a href="index.php" id="ctl00_menu_Entete_menu_mycleec">SOS</a>
					<a href="/partenaires/" id="ctl00_menu_Entete_menu_partenaires">Partenaires</a>
					<a href="perso.php" id="ctl00_menu_Entete_menu_membres">Perso</a>
					<a href="activites.php" id="ctl00_menu_Entete_menu_activites">Activités</a>
					<div class="spacer"></div>
				</div>
			</div>';
		}
		
	function getFooter() {
		echo '<div id="pied">
				<a href="/site-tour.aspx">Aide</a> |
				<a href="/nos-partenaires/">Nos Partenaires</a> |
				<a href="/infos/presse.aspx">Presse</a> |
				<a href="/infos/conditionsdutilisation.aspx">Conditions d\'utilisation</a> |
				<a href="/infos/contact.aspx">Contact</a>
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
							</p>
							<p class="align_image">
								<a href="Desinscription.php">Se désinscrire</a>
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
						echo '<div class="finboite"></div>
					</div>';
	}
	
?>