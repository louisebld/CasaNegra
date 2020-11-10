<?php
/*Fichier fonction table equipe
table equipe:
	idsalarie
	name
	fname
	age
	metier
	description
	tel

*/

function charge_equipe($c){
	//Fonction recupere le tableau de la bdd Equipe de salarie + caractéristique

	//requete
	$sql="SELECT * FROM equipe";
	$result=  mysqli_query($c, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}
	//var_dump($tableau);
	return $tableau;
}

function print_equipe($equipe){
	//Print toute l'equipe contenue dans la base de donnée
	echo '<div class="equipe">';
	foreach ($equipe as $key => $value) {
		echo '<div class="membre">';
		echo "<h2>" . $value["name"] . "</h2>";
		echo "<p>" . $value["age"] . ", " . $value["metier"] . "</p>" ;
		echo "numéro de téléphone: " . $value["tel"];
		echo "<p>" . $value["description"] . "</p>";

		echo "</div>";
	}
}


?>