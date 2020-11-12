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
	id: intdsdsdssd
	metier: varchar(50)
*/

function charge_equipe($c){
	//Focntion qui va prendre dex bases de données en arguments, et va rendre le metier de chaque personne, selon l'id des tables
	

	$sql = "SELECT e.name AS name, m.metier AS metier, e.fname AS fname, e.age AS age, e.description AS descrip, tel
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
?>