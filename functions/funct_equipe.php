<?php


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


function print_equipeadmin($equipe){
// fonction qui affiche les membres de l'équipe
// on ajoute un champ vide qui contient l'id pour pouvoir le supprimer
echo '<div class="equipeadmin">';
	foreach ($equipe as $key => $value) {
		echo '<div class="membre_equipeadmin">';
		echo "<p>" . $value["name"];
		echo " " . $value["fname"];

		echo "<form method='post' action='index.php?page=pageadmin'>";
		echo  "<input id='idasuppr' name='idasuppr' type='hidden' value= ". $value['id'] . ">" ;
		echo "<input type='submit' name='asupprimer' id='action' value='Supprimer'/> </form>" . "</p>";

		echo "</div>";
	}
	echo "</div>"; 
}



?>