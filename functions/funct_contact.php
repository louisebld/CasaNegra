<?php

function print_formulaire_contact() {
	//Affiche le formulaire pour ajouter un nouveau membre

	?>
	<div id="formulairecontact">
	<form method="post" action="index.php?page=contact"
	onsubmit='javascript: return remplicontact();'>

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
	//Print toute l'avis contenue dans la base de donnée
	echo '<div class="contactadmin">';
	echo "<table id='tableaucontact'>";
	echo "<tr id='firstrange'>";
	echo "<td> Date </td>";
	echo "<td> Utilisateur </td>";
	echo "<td> Téléphone </td>";
	echo "<td> Message </td>";
	echo "<td></td>";
	echo "</tr>";
	foreach ($contact as $key => $value) {
		$sesdonnees = recupedonnees ($value['idcompte']);
		echo "<tr>";
		echo "<td>" . $value['ladate'] . "</td>";
		echo "<td>" . $sesdonnees['prénom'] . " " . $sesdonnees['nom'] . "</td>";
		echo "<td>" . $value['tel'] . "</td>";
		echo "<td>" . $value['message'] . "</td>";
		//if ($value['etat']='atraiter') {
		echo "<td>";
		//echo $value['etat'];
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
	//Print toute l'avis contenue dans la base de donnée
	echo '<div class="contactadmin">';
	echo "<table id='tableaucontact'>";
	echo "<tr id='firstrange'>";
	echo "<td> Date </td>";
	echo "<td> Utilisateur </td>";
	echo "<td> Téléphone </td>";
	echo "<td> Message </td>";
	echo "<td></td>";
	echo "</tr>";
	foreach ($contact as $key => $value) {
		$sesdonnees = recupedonnees ($value['idcompte']);
		echo "<tr>";
		echo "<td>" . $value['ladate'] . "</td>";
		echo "<td>" . $sesdonnees['prénom'] . " " . $sesdonnees['nom'] . "</td>";
		echo "<td>" . $value['tel'] . "</td>";
		echo "<td>" . $value['message'] . "</td>";

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