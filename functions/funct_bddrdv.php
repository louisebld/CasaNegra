<?php

/*Fichier fonction table rdv 
table rdv:
	idrdv : int
	idclient : int
	idmembre : int
	daterdv: DATE
	heurerdv : TIME

	*/

  	function insert_rdv($heure, $date, $idclient, $idmembre){
		//fonction qui ajoute un rdv dans la table rdv
		global $c;
		var_dump($heure);	
		var_dump($date);
		var_dump($idclient);
		var_dump($idmembre);
		
		$sql = "INSERT INTO rdv(idmembre, idclient, daterdv, heurerdv) VALUES ('$idmembre', '$idclient', '$date', '$heure')";

		mysqli_query($c, $sql);


}

function charge_rdv($idrdv){
	//Fonction qui renvoie calendrier avec les rdv
	//pour le moment juste un tableau
	

	global $c;

	$sql = "SELECT `idrdv`, `idmembre`, `idclient`, `daterdv`, `heurerdv` FROM `rdv` WHERE idrdv = $idrdv";
	$result=  mysqli_query($c, $sql);

	//on met dans un tableau pour le moment 
	$tab = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tab[] = $row;
	}
	return $tab;
}

		?>

