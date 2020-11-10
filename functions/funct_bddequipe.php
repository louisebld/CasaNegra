<?php

function print_equipe($equipe){
	//Print toute l'equipe contenue dans la base de donnée
	echo '<div class="equipe">';
	foreach ($equipe as $key => $value) {
		echo '<div class="membre_equipe">';
		echo "<h2>" . $value["name"];
		echo $value["fname"] . "</h2>";
		echo "<p>" . $value["age"] . ", " . $value["metier"] . "</p>" ;
		echo "numéro de téléphone: " . $value["tel"];
		echo "<p>" . $value["description"] . "</p>";

		echo "</div>";
	}
	echo "</div>"; 
}




?>