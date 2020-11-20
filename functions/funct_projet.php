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

		return $img = '<img src="./projets/' . $nomprojet . '" alt="projets" width="300"/>';

	}

	function affiche_projet($projets){
		//Affiche les differents projets
		echo '<div class="projets">';
		foreach ($projets as $key => $value) {
			echo '<div class="box_projet">';
			echo affiche_image($value['nomprojet']);
			echo '<p>Date de création: ' . $value['date_creation'] .'</p>';
			echo '<p>Realisation: ' . $value['autor'] .'</p>';
			echo "<p>" . $value['description'] . "</p>";
			echo "</div>";
		}
		echo "</div>"; 
	}











?>