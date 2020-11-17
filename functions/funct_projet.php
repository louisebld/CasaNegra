<?php

function ajoutprojet(){

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















?>