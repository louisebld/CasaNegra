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




// insertion dans la base de donnée
// le membre de l'équipe

function insert_membre($nom, $prénom, $age, $idmetier, $description, $tel) {

	// var_dump($nom);
	// var_dump($prénom);
	// var_dump($age);
	// var_dump($idmetier);

	// var_dump($description);
	// var_dump($tel);
	global $c;
	mysqli_query($c, "INSERT INTO equipe(name, fname, age, id_metier, description, tel) values ('$nom', '$prénom', $age, $idmetier, '$description', '$tel')");

}


// Cette fonction sert à savoir si il n'y a pas déjà un membre de l'équipe s'appelant comme ça
function verifmembreequipe ($nom, $prénom) {

	global $c;
	// Je fais une recherche dans la base à partir de l'adresse mail
	$nomprénom = mysqli_query($c, "SELECT * FROM equipe WHERE name = '".$nom."' and fname = '".$prénom."'");
	$compteur = mysqli_num_rows($nomprénom);
	if ($compteur>0) {
		return true;
	}
	else {
		return false;
	}
}


function suppr_métier($metier) {
	global $c;
	mysqli_query($c, "DELETE FROM metier WHERE metier = '$metier'");
}



function metierutiliser($idmetier){
	//Fonction qui recupere un boolean si le metier est utilisé
	global $c;
	$result=  mysqli_query($c, "SELECT * FROM equipe WHERE id_metier=$idmetier");
	$nbcompte=mysqli_num_rows($result);

// si il y a au moins une ligne qui correspond : true
	if ($nbcompte>0){
		return true;
	}
	else {
		return false;
	}

	
	
}



