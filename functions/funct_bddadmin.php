<?php
/*Table admin:
	//Stock les comptes admins via les id des comptes
	idcompte: int*/



function testif_admin($idcompte){
	//Fonction qui recupere un boolean si l'id est contenu dans la table
	global $c;
	$result=  mysqli_query($c, "SELECT idcompte FROM admin WHERE idcompte=$idcompte");
	$nbcompte=mysqli_num_rows($result);
// si il y a au moins une ligne qui correspond : true
	if ($nbcompte>0){
		return true;
		}
	else {
		return false;
	}
}


// insertion du nouveau métier dans la base de données

function insert_métier($metier) {
	global $c;
	mysqli_query($c, "INSERT INTO metier(metier) values ('$metier')");

}

// Pour vérifier qu'on a pas déjà ce métier dans la base de données

function existemetier ($metier) {
// retourne si le métier existe déjà true ou false
	global $c;
	// Je fais une recherche dans la base à partir du métier
	$metier = mysqli_query($c, "SELECT * FROM metier WHERE metier = '".$metier."'");
	$compteur = mysqli_num_rows($metier);
// si il y a plus de 0 lignes : il y est déjà
	if ($compteur>0) {
		return true;
	}
	else {
		return false;
	}
}