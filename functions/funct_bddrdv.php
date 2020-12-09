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
	
		
		$sql = "INSERT INTO rdv(idmembre, idclient, daterdv, heurerdv) VALUES ('$idmembre', '$idclient', '$date', '$heure')";

		mysqli_query($c, $sql);


}

function charge_rdv($idclient){
	//fonction qui recupere les rdv selon les id des clients
	

	global $c;

	$sql = "SELECT idrdv, idmembre, idclient, daterdv, heurerdv FROM rdv WHERE idclient = '$idclient'";
	$result=  mysqli_query($c, $sql);

	//on met dans un tableau pour le moment 
	$tab = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tab[] = $row;
	}
	return $tab;
}

//pour afficher tous les rdv (pour la partie admin)
function charge_rdv_admin(){

	global $c;

	$sql = "SELECT idrdv, idmembre, idclient, daterdv, heurerdv FROM rdv ";
	$result=  mysqli_query($c, $sql);

	//on met dans un tableau pour le moment 
	$tab = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tab[] = $row;
	}
	return $tab;

}


function recupmembre($membre){
	global $c;
	$membres =  mysqli_query($c, "SELECT name FROM equipe ");
	$tableau = [];
	while ($row=mysqli_fetch_assoc($membres)) {
		$tableau[] = $row;
	}
	return $tableau;

}

function recupmembreid($nom){
	global $c;
	$idmembre = mysqli_query($c, "SELECT id FROM equipe WHERE name = '$nom'");
	$res = mysqli_fetch_assoc($idmembre);
	return $res['id'];
}

function recupmemebrenom($id){
	global $c;
	$nommembre = mysqli_query($c, "SELECT name FROM equipe WHERE id = '$id'");
	$res = mysqli_fetch_assoc($nommembre);
	return $res['name'];
}


function suppr_rdv($idrdv){
	global $c;
	mysqli_query($c, "DELETE FROM rdv WHERE idrdv =  $idrdv");
}


function charge_listerdv($c) {

	$req = "SELECT idclient, rdv.idmembre, daterdv, heurerdv
	FROM rdv
	INNER JOIN equipe ON rdv.idmembre = equipe.id";

	$result=  mysqli_query($c, $req);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}
	//var_dump($tableau);
	return $tableau;
}


		?>

