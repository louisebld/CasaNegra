<?php

// pour récupérer l'id du métier à partir de son nom

function recuperemetier($met) {
// variable globale base de donnée
	global $c;

	// Je fais une recherche dans la base à partir du métier
	$metier = mysqli_query($c, "SELECT id FROM metier WHERE metier = '$met'");
	// on selectionne le métier que l'on veut à partir de son nom

	$resultat = mysqli_fetch_assoc($metier);
	// on retourne l'id
	$id=$resultat['id'];
	return $id;


}
