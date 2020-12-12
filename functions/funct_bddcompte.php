<?php

// Fonction pour insérer un noveau compte
function insert_compte($nom, $prénom, $mail, $motdepasse) {
	//Insère un nouveau compte dans la bdd
// variable globale base de donnée
	global $c;
// j'insère
	mysqli_query($c, "INSERT INTO compte(nom, prénom, mail, motdepasse) values ('$nom', '$prénom', '$mail', '$motdepasse')");

}



function charge_compte_mailmotdepasse($c){
	//Fonction recupere le tableau des adresses mail et des mots de passe

// requête de sélection
	$sql="SELECT mail, motdepasse FROM compte";
	$result=  mysqli_query($c, $sql);

	//on met dans un tableau
	$tableau = [];
	// on parcourt l'intégralité
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}
// on retourne le tableau associatif
	return $tableau;
}

function existeemail ($mail) {
// retourne si le mail est déjà associé à un compte dans la base de donnée oui ou non
// variable globale base de donnée
	global $c;
	// Je fais une recherche dans la base à partir de l'adresse mail
	$email = mysqli_query($c, "SELECT * FROM compte WHERE mail = '".$mail."'");
	// on compte le nombre de lignes
	$compteur = mysqli_num_rows($email);
	// si on a trouvé un compte qui correspond : >0 : true
	if ($compteur>0) {
		return true;
	}
	else {
	// sinon faux
		return false;
	}
}

// Fonction pour récupérer l'id d'un compte avec l'adresse mail lors de la connexion
function recupereid($mail) {
// variable globale base de donnée
	global $c;
// on selectionne le compte que l'on veut à partir de l'email
	$email = mysqli_query($c, "SELECT * FROM compte WHERE mail = '".$mail."'");
// on exécute
	$resultat=mysqli_fetch_assoc($email);
// on retourne l'id
	$id=$resultat['idcompte'];
	return $id;

}




function recupedonnees ($id) {
// récupérer les données du compte à partir de l'id dans la base de données
// variable globale base de données
	global $c;
// on sélectionne
	$donnees = mysqli_query($c, "SELECT * FROM compte WHERE idcompte = '".$id."'");
// on éxécute
	$resultat=mysqli_fetch_assoc($donnees);
// on retourne le tableau associatif des données
	return $resultat;
}


// récupérer tous les membres inscrits sur le site

// on récupère le tableau associatif
function charge_compte($c){
	//Fonction recupere le tableau des comptes du site

	// on récupère seulement les comptes des autres
	// pour ne pas afficher dans la liste notre compte (le compte connecté)

	if (isset($_SESSION['idcompte'])) {
		$sql="SELECT idcompte, nom, prénom, mail FROM compte WHERE idcompte != {$_SESSION['idcompte']} ";

	}
	// si on est pas connecté par de conditions sinon erreur car idcompte pas défini
	else {
		$sql="SELECT idcompte, nom, prénom, mail FROM compte";
	}

	$result=  mysqli_query($c, $sql);

	//on met dans un tableau
	$tableau = [];
	// on parcourt l'intégralité
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}
// on retourne le tableau associatif
	return $tableau;
}



function suppr_utilisateur($id) {
// Supprime un compte à partir de l'id
// variable globale base de donnée
	global $c;
// on l'enlève de la base de donnée compte
	mysqli_query($c, "DELETE FROM compte WHERE idcompte = $id");
// on l'enlève de l'admin si jamais il y est
	mysqli_query($c, "DELETE FROM admin WHERE idcompte = $id");

}

// pour ajouter une l'id d'un compte à la table admin
function insert_admin($id) {
	// Pour ajouter un compte à l'administration
	// variable globale base de donnée
	global $c;
	// on insère l'id
	mysqli_query($c, "INSERT INTO admin(idcompte) values ($id)");

}


function countcompte () {
// fonction qui renvoie le nombre de compte dans la base de données
// variable globale base de donnée
	global $c;
// on compte le nombre de lignes
	$req=mysqli_query($c, "SELECT COUNT(*) FROM compte");
// on éxécute
	$result=mysqli_fetch_assoc($req);
// on retourne le résultat
	return $result;

}


function changemdp($id, $new) {
	// fonction pour changer le mot de passe d'un compte
	// on prend en paramètre son id et son nouveau mot de passe
// variable globale base de donnée
	global $c;
// réquète update pour changer le mot de passe du compte qui a cet id
	$sql="UPDATE compte SET motdepasse = '$new' WHERE idcompte = $id";
	mysqli_query($c, $sql);
}



?>