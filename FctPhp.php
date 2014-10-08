<?php
	function getHeader() {
			echo '<div id="entete">
				<div id="menu_entete">
					<a href="/forum/" id="ctl00_menu_Entete_menu_forum" class="dernier">Forums</a>
					<a href="/conseils/" id="ctl00_menu_Entete_menu_conseils">Conseils</a>
					<a href="/annuaire/" id="ctl00_menu_Entete_menu_annuaire">Annuaire</a>
				
					<a href="activites.php" id="ctl00_menu_Entete_menu_activites">Activités</a>
					<a href="perso.php" id="ctl00_menu_Entete_menu_membres">Perso</a>
					<a href="/partenaires/" id="ctl00_menu_Entete_menu_partenaires">Partenaires</a>
					<a href="index.php" id="ctl00_menu_Entete_menu_mycleec">SOS</a>
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
?>