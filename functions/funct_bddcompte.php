<?php


function insert_compte($nom, $prénom, $mail, $motdepasse) {
	//Insère un nouveau compte dans la bdd
					global $c;
					mysqli_query($c, "INSERT INTO compte(nom, prénom, mail, motdepasse) values ('$nom', '$prénom', '$mail', '$motdepasse')");

				}



function charge_compte_mailmotdepasse($c){
	//Fonction recupere le tableau des adresses mail

	//requete
	$sql="SELECT mail, motdepasse FROM compte";
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