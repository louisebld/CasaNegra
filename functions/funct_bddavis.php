<?php

/*Fichier fonction table avis
table avis:
	id: int
	idautor: int
	name : varchar 50 
	commentary: text 750
	answer: text 500
	
*/

function insert_com($com, $name, $idprojet){
	// BUT : insert_com : fonction qui ajoute un commentaire dans la table commentaire
	global $c;

	$sql = "INSERT INTO avis (idprojet, name, commentary) VALUES ($idprojet, '$name', '$com')";
	mysqli_query($c, $sql);


}

function charge_avis($idprojet){
	// BUT : charge_avis : Fonction qui renvoie un tableau de commentaire avec une reponse (si existe) and un auteur sur un projet precis

	// $idprojet : integer, representant l'id du projet pour le commentaire

	global $c;
	$sql = "SELECT idprojet, name, commentary FROM avis WHERE idprojet = $idprojet";
	$result=  mysqli_query($c, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;
}


function return_pseudo($idcompte){
	// BUT : return_pseudo : fonction qui renvoie un peusdo, via l'id du membre connecté

	// $idcompte : integer, representant l'id du projet pour le commentaire

	global $c;
	$sql = "SELECT name FROM compte WHERE idcompte='$idcompte'";
	$result=  mysqli_query($c, $sql);
	$res = mysqli_fetch_assoc($result);
	return $res['name'];
}

?>