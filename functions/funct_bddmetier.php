<?php

// pour récupérer l'id du métier à partir de son nom

function recuperemetier($met) {
	global $c;

	var_dump($met);
	$met='Tapissier';
	// marche plus ...
// on selectionne le métier que l'on veut à partir de son nom
	// Je fais une recherche dans la base à partir du métier
	// $test = ".$metier.";
	$metier = mysqli_query($c, "SELECT id FROM metier WHERE metier = '$met'");
	$resultat = mysqli_fetch_assoc($metier);
	var_dump($resultat);
	$id=$resultat['id'];
	return $id;


}
