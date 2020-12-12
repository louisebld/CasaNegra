<?php
/*Table admin:
	//Stock les comptes admins via les id des comptes
idcompte: int*/



function testif_admin($idcompte){
	//Fonction qui recupere un boolean si l'id est contenu dans la table
	// sert à savoir si le compte est admin ou non
// on prend la variable global base de donnée
	global $c;
// on séléctionne les admin qui ont cet id
	$result=  mysqli_query($c, "SELECT idcompte FROM admin WHERE idcompte=$idcompte");
// on compte combien de lignes on a pu récupérer
	$nbcompte=mysqli_num_rows($result);
// si il y a au moins une ligne qui correspond : true
	if ($nbcompte>0){
// si cet id est admin
		return true;
	}
	else {
// si cet id n'est pas admin
		return false;
	}
}


// insertion du nouveau métier dans la base de données

function insert_métier($metier) {
// pour insérer un métier dans la base de donnée
// variable globale base de donnée
	global $c;
// on insère
	mysqli_query($c, "INSERT INTO metier(metier) values ('$metier')");

}

// Pour vérifier qu'on a pas déjà ce métier dans la base de données

function existemetier ($metier) {
// retourne si le métier existe déjà true ou false
	global $c;
	// Je fais une recherche dans la base à partir du métier
	$metier = mysqli_query($c, "SELECT * FROM metier WHERE metier = '".$metier."'");
// on compte le nombre de ligne qui correspondent
	$compteur = mysqli_num_rows($metier);
// si il y a plus de 0 lignes : il y est déjà
	if ($compteur>0) {
// si il y a déjà un métier avec ce nom
		return true;
	}
	else {
// si il n'y en a pas
		return false;
	}
}




// insertion dans la base de donnée
// le membre de l'équipe

function insert_membre($nom, $prénom, $age, $idmetier, $description, $tel) {
// pour insérer un membre dans l'équipe
// variable globale base de donnée
	global $c;
// on insère dans la base de donnée
	mysqli_query($c, "INSERT INTO equipe(name, fname, age, id_metier, description, tel) values ('$nom', '$prénom', $age, $idmetier, '$description', '$tel')");

}


// Cette fonction sert à savoir si il n'y a pas déjà un membre de l'équipe s'appelant comme ça
function verifmembreequipe ($nom, $prénom) {
// but : vérifier si quelqu'un dans l'équipe n'a pas déjà ce nom et ce prénom
	global $c;
	// Je fais une recherche dans la base à partir du nom et du prénom : 2 conditions
	$nomprénom = mysqli_query($c, "SELECT * FROM equipe WHERE name = '".$nom."' and fname = '".$prénom."'");
// compte le nombre de lignes qu'on obtient
	$compteur = mysqli_num_rows($nomprénom);
// si il y a déjà un membre avec ce nom et prénom : on récupère plus de 0 lignes
	if ($compteur>0) {
// on a déjà un membre qui s'appelle comme ça
		return true;
	}
	else {
// on en a pas
		return false;
	}
}


function suppr_métier($metier) {
// pour supprimer un métier de la base de donnée
// variable globale base de donnée
	global $c;
// on supprime
	mysqli_query($c, "DELETE FROM metier WHERE metier = '$metier'");
}



function metierutiliser($idmetier){
// savoir si le métier est utilisé par un membre de l'équipe
//Fonction qui recupere un boolean si le metier est utilisé
// variable globale base de donnée
	global $c;
// on sélectionne
	$result=  mysqli_query($c, "SELECT * FROM equipe WHERE id_metier=$idmetier");
// on compte le nombre de lignes récupéré
	$nbcompte=mysqli_num_rows($result);

// si il y a au moins une ligne qui correspond : true
	if ($nbcompte>0){
		return true;
	}
	else {
		return false;
	}
}


// Pour charger/avoir la liste des admins 

function charge_listeadmin($c) {
// récupérer la liste des admins dans un tableau associatif
	$req = "SELECT compte.idcompte, nom, prénom, mail
	FROM compte
	INNER JOIN admin ON compte.idcompte = admin.idcompte";
// avec une jointure sur la table admin car on veut seulement les comptes qui sont admins
// on exécute
	$result=  mysqli_query($c, $req);
	//on met dans un tableau
	$tableau = [];
// on parcourt l'intégralité
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}
// on retourne le tableau
	return $tableau;
}


// pour supprimer une id de la liste admin 

function suppr_admin($id) {
// variable globale base de donnée
	global $c;
// on supprime
	mysqli_query($c, "DELETE FROM admin WHERE idcompte = $id");


}



