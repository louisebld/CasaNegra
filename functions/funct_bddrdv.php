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

// fonction qui permet de recuperer un embre de l'equipe
function recupmembre($membre){
	global $c;
	$membres =  mysqli_query($c, "SELECT fname, name FROM equipe ");
	$tableau = [];
	while ($row=mysqli_fetch_assoc($membres)) {
		$tableau[] = $row;
	}
	return $tableau;

}
// fonction qui permet de recuperer l'id d'un membre de l'equipe a partie de son nom
function recupmembreid($nom){
	global $c;
	$idmembre = mysqli_query($c, "SELECT id FROM equipe WHERE fname = '$nom'");
	$res = mysqli_fetch_assoc($idmembre);
	return $res['id'];
}

// fonction qui permet de recuperer le nom d'un membre de l'equipe a partie du son id
function recupmemebrenom($id){
	global $c;
	$nommembre = mysqli_query($c, "SELECT fname FROM equipe WHERE id = '$id'");
	$res = mysqli_fetch_assoc($nommembre);
	return $res['fname'];
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


function dejardv($jour, $heure, $pers){
	// retourne si il y a deja un rdv avec cette personne à cette heure et ce jour (oui ou non)
	//variable global bdd
	global $c;
	// Je fais une recherche dans la base à partir de la personne, l'heure et la date 
	$rdv = mysqli_query($c, "SELECT * FROM rdv WHERE daterdv = '".$jour."' AND heurerdv = '".$heure."' AND idmembre = '".$pers."'" );
	// on compte le nombre de lignes
	$cpt = mysqli_num_rows($rdv);
	// si on a trouvé un rdv qui correspond : >0 : true
	if ($cpt>0) {
		return true;
	}
	else {
	// sinon faux
		return false;
	}



}

function rdvnonvalide($jour, $heure) {

	$tabDate = explode('-', $jour);
	$jourssemaine = array('dim', 'lun', 'mar', 'mer','jeu', 'ven', 'sam');
	$timestamp = mktime(0, 0, 0, $tabDate[1], $tabDate[2], $tabDate[0]);
	$nomjour = date('w', $timestamp);
	//timestamp retourne un entier (1 opour dim, 2 pour lun ,...)

	// on definit les horraires de travail
	$debmatin = date_create_from_format('H\hi','8h00');
	$finmatin = date_create_from_format('H\hi','12h00');
	$debutap = date_create_from_format('H\hi','14h00');
	$finap = date_create_from_format('H\hi','18h30');

	//si c'est vendredi alors on modifie les horraires (fin de journee = 17h30
	if ($jourssemaine[$nomjour] == 'ven') {
			$finap =  date_create_from_format('H\hi','17h30');
		}

	//on vérifie que le jour n'est pas un dimanche
	if ($jourssemaine[$nomjour] == 'dim'){
		return true;
	}
		// on verifie que l'heure rentree par l'utilisateur est bien dans les bons creaneaux
	
	if (($heure >= $debmatin && $heure <= $finmatin ) or ($heure >= $debutap && $heure <= $finap )) {
			return false; // dans les plages horraires
		}
	else{
		return true;
		}
	}		


		?>

