<?php

function print_avis($avis){
	//Print toute l'avis contenue dans la base de donnée
	echo '<div class="avis">';
	foreach ($avis as $key => $value) {
		echo '<div class="box_avis">';
		
			echo "<p>" . $value["autor"] . "</p>";
			echo '<div class="com">' . "<p>" . $value["com"] . "</p>" . "</div>";
			echo '<div class="answer">' . "<p>" . $value["answer"] . "</p>" . "</div>";

		echo "</div>";
	}
	echo "</div>"; 
}

function print_form_avis(){
	//Fonction qui permet d'afficher le formulaire qui ajoute un avis
	//Obligation d'etre connecté, sinon redirection
	?>

	<form method="post" action="actions/actions_avis.php">

		<p><label for="ajout"> Commentaire </label>
			<input type = "text" name ="com" id="ajout" value="<?php if (isset($_SESSION['com'])) 
																echo $_SESSION['com']; ?>"></p>



		<p><input type="submit" name="avis" id="avis" value="Enregistrer"/></p>
	</form>

		<?php	 
	}




?>