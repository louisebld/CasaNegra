<?php

/*Fichier fonction table avis
table avis:
	id: int
	idautor: int
	commentary: text 750
	answer: text 500
	
*/

function insert_com($com, $name, $idprojet){
	//fonction qui ajoute un commentaire dans la table commentaire
	global $c;
	var_dump($com);
	var_dump($name);
	var_dump($idprojet);
	
	$sql = "INSERT INTO avis (idprojet, name, commentary) VALUES ($idprojet, '$name', '$com')";
	mysqli_query($c, $sql);


}

function charge_avis($idprojet){
	//Fonction qui renvoie un tableau de commentaire avec une reponse (si existe) and un auteur sur un projet precis
	//--------------------Il y a un pb dans le where en dessous-----------------

	global $c;
	$sql = "SELECT idprojet, name, commentary FROM avis WHERE idprojet = $idprojet";
	$result=  mysqli_query($c, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}
	//var_dump($tableau);
	return $tableau;
}


function return_pseudo($idcompte){
	//fonction qui renvoie un peusdo, via l'id du membre connecté

	global $c;
	$sql = "SELECT name FROM compte WHERE idcompte='$idcompte'";
	$result=  mysqli_query($c, $sql);
	$res = mysqli_fetch_assoc($result);
	return $res['name'];
}

?>