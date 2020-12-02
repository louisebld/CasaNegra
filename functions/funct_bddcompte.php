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

function existeemail ($mail) {
// retourne si le mail est déjà associé à un compte dans la base de donnée oui ou non
	global $c;
	// Je fais une recherche dans la base à partir de l'adresse mail
	$email = mysqli_query($c, "SELECT * FROM compte WHERE mail = '".$mail."'");
	$compteur = mysqli_num_rows($email);
	if ($compteur>0) {
		return true;
	}
	else {
		return false;
	}
}

// Fonction pour récupérer l'email d'un compte avec l'adresse mail lors de la connexion
function recupereid($mail) {
	global $c;
// on selectionne le compte que l'on veut à partir de l'email
	$email = mysqli_query($c, "SELECT * FROM compte WHERE mail = '".$mail."'");
	$resultat=mysqli_fetch_assoc($email);
	$id=$resultat['idcompte'];
	return $id;

}



// récupérer les données du compte (sauf mdp) à partir de l'id dans la base de données

function recupedonnees ($id) {
	global $c;
	$donnees = mysqli_query($c, "SELECT * FROM compte WHERE idcompte = '".$id."'");
	$resultat=mysqli_fetch_assoc($donnees);
	return $resultat;
}


// récupérer tous les membres inscrits sur le site

// on récupère le tableau associatif
function charge_compte($c){
	//Fonction recupere le tableau des adresses mail

	//requete
	if (isset($_SESSION['idcompte'])) {
		$sql="SELECT idcompte, nom, prénom, mail FROM compte WHERE idcompte != {$_SESSION['idcompte']} ";

	}
	else {
		$sql="SELECT idcompte, nom, prénom, mail FROM compte";
	}
	

	// pour ne pas afficher dans la liste notre compte (le compte connecté)
	$result=  mysqli_query($c, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}
	//var_dump($tableau);
	return $tableau;
}


// pour supprimer un compte à partir de l'id

function suppr_utilisateur($id) {
	global $c;
	mysqli_query($c, "DELETE FROM compte WHERE idcompte = $id");
// enlever de l'admin
	mysqli_query($c, "DELETE FROM admin WHERE idcompte = $id");

}

// pour ajouter une l'id d'un compte à la table admin

function insert_admin($id) {
	global $c;
	mysqli_query($c, "INSERT INTO admin(idcompte) values ($id)");

}


// fonction qui renvoie le nombre de compte dans la base de données

function countcompte () {
	global $c;
	$req=mysqli_query($c, "SELECT COUNT(*) FROM compte");
	$result=mysqli_fetch_assoc($req);
	return $result;

}





?>