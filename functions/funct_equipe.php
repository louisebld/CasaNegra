<?php
/*Fichier fonction table equipe
table equipe:
	idsalarie: int
	name: varchar(20)
	fname: varchar(20)
	age: int
	metier: varchar(50)
	description: text
	tel: varchar(10)
*/


function print_equipe($equipe){
	//Print toute l'equipe contenue dans la base de donnée
	echo '<div class="equipe">';
	foreach ($equipe as $key => $value) {
		echo '<div class="membre_equipe">';
		echo "<h2>" . $value["name"];
		echo " " . $value["fname"] . "</h2>";
		echo "<p>" . $value["age"] . "ans, " . $value["metier"] . "</p>" ;
		echo "numéro de téléphone: " . $value["tel"];
		echo "<p>" . $value["descrip"] . "</p>";

		echo "</div>";
	}
	echo "</div>"; 
}






?>