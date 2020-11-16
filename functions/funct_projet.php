<?php

function print_form_add_projet(){
	//Fonction qui permet d'afficher le formulaire qui ajoute un projet
	//Obligation d'etre connecté, sinon redirection
	?>

	<form method="post" action="index.php?page=projet">

		<p><label for="name"> Nom du createur </label>
			<input type = "text" name ="com" id="name"></p>

		<p><label for = "file">Fichier:</label>
			<input type = "file" name="file" id ="file"></p>

		<p><input type="submit" name="projet" id="projet" value="Enregistrer"/></p>
	</form>

		<?php	 
	}