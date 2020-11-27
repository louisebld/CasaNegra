<?php

/*function ajoutprojet(){

}


function print_formulairenouveauprojet(){
	?>
	<div id="formulaireprojet">
	<form method="posr" action="index.php?page=pageadmin">
		<p>
			<input type="text" placeholder="Nom" name="nom" id="ajout">
		</p>
		<p>
			<input type = "date" placeholder="Date de création" name ="date_creation" id="ajout"></p>

		<p>
			<input type = "text" placeholder="Auteur" name ="autor" id="ajout" ></p>

		<p>
			<textarea id="com" placeholder="Description" name="description" rows="10" cols="35"></textarea>
		</p>


			<p><input type="submit" name="envoieprojet" id="action" value="Ajouter"/></p>
		</form>
	</div>

	<?php
}
*/


?>


<?php
	//Partie refaite


	function affiche_image($nomprojet){
		//Prends en argument un nom d'image, et ressort une balise img avec cette derniere

		return $img = '<img src="./projets/' . $nomprojet . '" alt="projets" class="img_projet"/>';

	}

	function affiche_projet($projets){
		//Affiche les differents projets

		foreach ($projets as $key => $value) {

			echo '<figure class="projet">';

			echo affiche_image($value['nomprojet']);

			echo '<figcaption class="fig_projet">Date de création' . $value['date_creation'] . "</br>";
			echo "Realisation: " . $value['autor'] .'</br>';
			echo $value['description'];

			$avis = charge_avis($value['id']);
			if (!empty($avis)) {
					echo "<h2>Commentaire: </h2></br>";	
			}

			print_avis($avis);

			echo "</figcaption></figure>";

			
/*			echo '<div class="projet">';
			echo affiche_image($value['nomprojet']);
			echo '<div class="desc_projet"><p>Date de création: ' . $value['date_creation'] .'</p>';
			echo '<p>Realisation: ' . $value['autor'] .'</p>';
			echo "<p>" . $value['description'] . "</p></div>";
			echo "</div>";*/
		}
		
	}









?>