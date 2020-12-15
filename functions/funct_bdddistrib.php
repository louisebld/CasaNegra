<?php
function charge_distrib($c){
	// BUT : charge_distrib : Fonction qui renvoie un tableau de noms de distributeurs


	$sql = "SELECT * FROM distributeurs";
	$result=  mysqli_query($c, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;
}

function insert_distrib($name, $link){
	// BUT : insert_distrib : fonction qui ajoute un commentaire dans la table commentaire
	global $c;

	$sql = "INSERT INTO distributeurs (name, link) VALUES ('$name', '$link')";
	mysqli_query($c, $sql);


}

function supprime_distrib($name) {
	// BUT : fonction pour supprimer un avis d'un distributeurs
	
	// $name : represente l'id du distributeurs a supprimer, permet de l'identifier dans la bdd

	global $c;
	// on supprime
	mysqli_query($c, "DELETE FROM distributeurs WHERE name = '$name'");
}
