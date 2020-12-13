<?php

function print_formulaire_contact() {
	//Affiche le formulaire pour ajouter envoyer un message de contact
	?>
	<div class="formulairecontact">
	<form method="post" action="index.php?page=contact"
	onsubmit='javascript: return remplicontact();'>
<!-- On appelle la fonction javascript pour vérifier si le formulaire est rempli -->
<!-- On affiche une valeur dans le formulaire si il y a des erreurs c-à-d on garde les données -->
		<p>
			<input type = "text" placeholder="Votre téléphone" name ="tel" id="telephone" value="<?php if (isset($_SESSION['telmessage']['tel'])) 
				echo $_SESSION['telmessage']['tel']; ?>"></p>

			<p>
	<p>
			<textarea id="message" placeholder="Votre message.." name="message"
			rows="10" cols="35"><?php if (isset($_SESSION['telmessage']['message'])) 
												echo $_SESSION['telmessage']['message']; ?></textarea>
		</p>

		<p><input type="submit" name="contact" id="action" value="Envoyer"/></p>
				</form>
</div>
				<?php	 
			}


function print_contact_notok($contact){
	//Affiche tous les contacts qui ne sont pas traités
	// contact contient tous les messages de contact non traité de la base de donnée
	echo '<div class="contactadmin">';
	echo "<table id='tableaucontact'>";
	echo "<tr id='firstrange'>";
	echo "<td> Date </td>";
	echo "<td> Utilisateur </td>";
	echo "<td> Téléphone </td>";
	echo "<td> Message </td>";
	echo "<td></td>";
	echo "</tr>";
	// on parcourt chaque message
	foreach ($contact as $key => $value) {
		// on récupère l'id du compte pour afficher le nom de la personne
		$sesdonnees = recupedonnees ($value['idcompte']);
		echo "<tr>";

		// on change la date

		echo "<td>" . changedate($value['ladate']) . "</td>";
		echo "<td>" . $sesdonnees['prénom'] . " " . $sesdonnees['nom'] . "</td>";
		echo "<td>" . $value['tel'] . "</td>";
		echo "<td>" . $value['message'] . "</td>";
		//if ($value['etat']='atraiter') {
		echo "<td>";
		//echo $value['etat'];
		// formulaire pour traiter un message
		echo "<form method='post' action='index.php?page=pageadmin'>";
		echo  "<input id='idcontactsuppr' name='idcontactsuppr' type='hidden' value= ". $value['idcontact'] . ">" ;
		echo "<input type='submit' name='atraiter' id='action' value='Traiter'/> </form>";
		echo "</td>";
		//}
		echo "</tr>";
	}
	echo "</table>";
	echo "</div>";
}

function print_contact_ok($contact){
	//Affiche tous les contacts qui sont traités
	echo '<div class="contactadmin">';
	echo "<table id='tableaucontact'>";
	echo "<tr id='firstrange'>";
	echo "<td> Date </td>";
	echo "<td> Utilisateur </td>";
	echo "<td> Téléphone </td>";
	echo "<td> Message </td>";
	echo "<td></td>";
	echo "</tr>";
	// on parcourt chaque message de contact
	foreach ($contact as $key => $value) {
		// on récupère les données du compte pour afficher son nom et son prénom
		$sesdonnees = recupedonnees ($value['idcompte']);
		echo "<tr>";
		echo "<td>" . changedate($value['ladate']) . "</td>";
		echo "<td>" . $sesdonnees['prénom'] . " " . $sesdonnees['nom'] . "</td>";
		echo "<td>" . $value['tel'] . "</td>";
		echo "<td>" . $value['message'] . "</td>";
		// formulaire pour supprimer
		// champ caché : hidden
		echo "<td>";
		echo "<form method='post' action='index.php?page=pageadmin'>";
		echo  "<input id='idcontactsuppr' name='idcontactsuppr' type='hidden' value= ". $value['idcontact'] . ">" ;
		echo "<input type='submit' name='asuppr' id='action' value='Supprimer'/> </form>";
		echo "</td>";


		echo "</tr>";
	}
	echo "</table>";
	echo "</div>";
}




?>