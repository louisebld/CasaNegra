<?php


	function insert_typeProjet($newType){
		// BUT : insert_typeProjet : Insere un nouveau type dans la bdd typeprojet

		// $newType : chaine de carractere conetnant le nom du type à ajouter

		global $c;
		$sql = "INSERT INTO typeprojet (type) VALUES ('$newType')";
		mysqli_query($c, $sql);
	}


	function charge_typeProjet($c){
		// BUT : charge_typeProjet : Fonction qui renvoie un tableau de commentaire avec une reponse (si existe) and un auteur sur un projet precis

			
		$sql = "SELECT * FROM typeprojet ";
		$result=  mysqli_query($c, $sql);

		//on met dans un tableau
		$tableau = [];
		while ($row=mysqli_fetch_assoc($result)) {
			$tableau[] = $row;
		}

			return $tableau;
	}


	function recupetypeprojet($type) {
		// pour récuperer l'id d'un projet
// variable globale base de donnée
	global $c;

	// Je fais une recherche dans la base à partir du métier
	$typeprojet = mysqli_query($c, "SELECT id FROM typeprojet WHERE type = '$type'");
	// on selectionne le métier que l'on veut à partir de son nom

	$resultat = mysqli_fetch_assoc($typeprojet);
	// on retourne l'id
	$id=$resultat['id'];
	return $id;

}


function typeutiliser($typeprojet){
// savoir si le métier est utilisé par un membre de l'équipe
//Fonction qui recupere un boolean si le metier est utilisé
// variable globale base de donnée
	global $c;
// on sélectionne
	$result=  mysqli_query($c, "SELECT * FROM projet WHERE type='$typeprojet'");
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

function supprtype($type) {
// pour supprimer un métier de la base de donnée
// variable globale base de donnée
	global $c;
// on supprime
	mysqli_query($c, "DELETE FROM typeprojet WHERE type = '$type'");
}

function existetype ($type) {
// retourne si le métier existe déjà true ou false
	global $c;
	// Je fais une recherche dans la base à partir du métier
	$type = mysqli_query($c, "SELECT * FROM typeprojet WHERE type = '".$type."'");
// on compte le nombre de ligne qui correspondent
	$compteur = mysqli_num_rows($type);
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