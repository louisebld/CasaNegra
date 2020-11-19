<?php

/*Fichier fonction table equipe
table equipe:
	id: int
	name: varchar(20)
	fname: varchar(20)
	age: int
	id_metier: int
	description: text
	tel: varchar(10)
*/

/*Fichier fonction table metier associé a equipe en qlq sorte
table metier:
	id: int
	metier: varchar(50)
*/

function charge_equipe($c){
	//Focntion qui va prendre dex bases de données en arguments, et va rendre le metier de chaque personne, selon l'id des tables
	

	$sql = "SELECT e.id, e.name AS name, m.metier AS metier, e.fname AS fname, e.age AS age, e.description AS descrip, tel
			FROM equipe AS e
			INNER JOIN metier AS m
			ON e.id_metier = m.id";
	$result=  mysqli_query($c, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}
	//var_dump($tableau);
	return $tableau;

}


// fonction base de donnée métier pour récupérer les métiers

function recupmetier ($c) {
	$metiers = mysqli_query($c, "SELECT metier FROM metier");
	$tableau = [];
	while ($row=mysqli_fetch_assoc($metiers)) {
		$tableau[] = $row;
	}
	return $tableau;
	}



function suppr_equipe($id) {
	global $c;
	mysqli_query($c, "DELETE FROM equipe WHERE id = $id");
}





?>