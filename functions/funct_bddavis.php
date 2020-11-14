<?php

/*Fichier fonction table avis
table avis:
	id: int
	idautor: int
	commentary: text 750
	answer: text 500
	
*/

function insert_com($com, $idcompte){
	$sql = "INSERT INTO avis (id, idautor, commentary, answer) VALUES (NULL, $idcompte, $com, NULL)";
	mysqli_query($c, $sql);
}

function charge_avis($c){
	//Fonction qui va charger les avis avec les noms associés
	

	$sql = "SELECT compte.nom AS autor, avis.commentary AS com, avis.answer AS answer
			FROM avis
			INNER JOIN compte
			ON avis.idautor = compte.idcompte";
	$result=  mysqli_query($c, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}
	//var_dump($tableau);
	return $tableau;
}


function recupere_id_autor($c){
	//Fonction qui va recuperer l'id de l'auteur du commentaire, via l'adresse mail quand il se sera connecté

	$sql = "SELECT idcompte, FROM compte WHERE mail = :monadressemail";
	$result=  mysqli_query($c, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}
	//var_dump($tableau);
	return $tableau;
}




?>