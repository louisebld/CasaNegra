<?php


function insert_contact($id, $tel, $message, $date){
	//fonction qui ajoute un message de contact dans la base de donnée
	global $c;
// variable globale de base de donnée
	$sql = "INSERT INTO contact(idcompte, tel, message, ladate) VALUES ($id, '$tel', '$message', '$date')";
// on insère : requête d'insertion

	mysqli_query($c, $sql);
}


function charge_contactnotok($c){
	//Fonction recupere le tableau des messages de contacts qui ne sont pas traités
	//requete
	$sql="SELECT idcontact, idcompte, tel, message, ladate FROM contact WHERE etat = 'atraiter' ";
	// on éxécute
	$result=  mysqli_query($c, $sql);

	//on met dans un tableau
	$tableau = [];
	// on parcourt l'intégralité
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}
	//var_dump($tableau);
	return $tableau;
	// on retourne le résultat
}


function charge_contactok($c){
	//Fonction recupere le tableau des messages de contacts qui sont traités
	//requete
	$sql="SELECT idcontact, idcompte, tel, message, ladate FROM contact WHERE etat = 'ok' ";
	// on éxécute
	$result=  mysqli_query($c, $sql);

	//on met dans un tableau
	$tableau = [];
	// on parcourt l'intégralité

	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}
	//var_dump($tableau);
	return $tableau;
	// on retourne le résultat

}



function changestatusok($id) {
// fonction qui change le statut d'un message : pour le traiter
	global $c;
// variable globale base de donnée
// on sélectionne
	$sql="UPDATE contact SET etat = 'ok' WHERE idcontact= $id";
	mysqli_query($c, $sql);

}

function supprime_contact($id) {
// Fonction qui supprime un message de contact
// variable globale base de donnée
	global $c;
// on selectionne
	$sql="DELETE FROM contact WHERE idcontact = $id";
	mysqli_query($c, $sql);

}