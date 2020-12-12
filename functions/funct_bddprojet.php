<?php

	function datepaspassee($date){
		// BUT : datepaspassee : 

		// Argument : 

		$dateajd = date('d-m-y');
		// On récupère la date d'aujourd'hui

		if($dateajd>$date){
			return false;
		}

		// si la date rentrée est plus recente que ajd
		else{
			return true;
		}

	}

	function projetexiste($nom){
		// BUT : projetexiste : Cherche dans la base de donnée si le projet existe déjà

		// $nom : nom du projet, string

		global $c;

		// Je fais une recherche dans la base à partir de du $nom

		$projet = mysqli_query($c, "SELECT * FROM projet WHERE name = '".$nom."'");
		$compteur = mysqli_num_rows($projet);
		if ($compteur>0) {
			return true;
		}
		else {
			return false;
		}

	}


?>


<?php


  	function insert_projet($autor, $description, $nomprojet, $date_creation, $type){
		// BUT : insert_projet : Fonction qui insere un 'projet' dans la table projet, permet de stocker les infos lié au projet

  		// tous les paramètres, on se sert des variables en paramètres pour inserer dans la base des données les informations

		global $c;
		$sql = "INSERT INTO projet (nomprojet, date_creation, autor, description, type) VALUES ('$nomprojet', '$date_creation', '$autor', '$description', '$type')";
		mysqli_query($c, $sql);
	}

	function supprime_PhotoProjet($nomProjet){
		unlink($nomProjet);
	}



	function supprime_projet($idprojet) {
		// BUT : fonction pour supprimer quelqu'un un projet
		
		// $id : represente l'id du projet a supprimer, permet de l'identifier dans la bdd

		global $c;
		// on supprime
		mysqli_query($c, "DELETE FROM projet WHERE id = $idprojet");
	}


	function charge_projet($c){
		// BUT : charge_projet : Fonction qui renvoie un tableau de commentaire avec une reponse (si existe) and un auteur sur un projet precis
		// charge les données depuis la bdd 'projet'

		
		$sql = "SELECT * FROM projet";
		$result=  mysqli_query($c, $sql);

		// On met dans un tableau
		$tableau = [];
		while ($row=mysqli_fetch_assoc($result)) {
			$tableau[] = $row;
		}

		return $tableau;
	}


	function charge_projetType($aAfficher){
		// BUT : charge_projetType : prends un type de projet, et charge tous les projets liés à ce type

		// $aAfficher : contient une chaine de caractere avec un type de projet

		global $c;
		
		$sql = "SELECT * FROM projet WHERE type = '$aAfficher'";
		// Effectue une recherche sur le type souhaité dans notre bdd projet

		$result=  mysqli_query($c, $sql);

		// On met dans un tableau
		$tableau = [];
		while ($row=mysqli_fetch_assoc($result)) {
			$tableau[] = $row;
		}

		return $tableau;
	}


	function charge_projetPersonne($aAfficher){
		global $c;
		
		$sql = "SELECT * FROM projet WHERE autor = '$aAfficher'";
		$result=  mysqli_query($c, $sql);

		//on met dans un tableau
		$tableau = [];
		while ($row=mysqli_fetch_assoc($result)) {
			$tableau[] = $row;
		}
		//var_dump($tableau);
		return $tableau;
	}

		

//Si insertion projet, Ne pas oublier d'incrementer


	function charge_nbphotos($c){
		// BUT : charge_nbphotos : charge le nombre de photos, permet de recuperer ce nombre de de nommer les fichiers plus tard


		$sql = "SELECT nbphotos FROM photos WHERE 1";

		$result=  mysqli_query($c, $sql);

		// On met dans un tableau
		$row=mysqli_fetch_assoc($result);


		return $row['nbphotos'];
	}

	function increment_nbphotos($c){
		// BUT : increment_nbphotos : Incremente le nombre de photos dans la base de donnée 

		// augmente de 1 le nombre de photos
		$sql = "UPDATE photos 
				SET nbphotos = nbphotos + 1 
				WHERE 1";
		mysqli_query($c, $sql);
	}

	function decrement_photo($c){
		// BUT : decrement_nbphotos : decremente le nombre de photos dans la base de donnée 

		// decremente de 1 le nombre de photos
		$sql = "UPDATE photos 
				SET nbphotos = nbphotos - 1 
				WHERE 1";
		mysqli_query($c, $sql);
	}




	function countprojet () {
		// BUT : countprojet : Permet d'obtenir le nombre de projets dans la bdd projet

		global $c;
		$req=mysqli_query($c, "SELECT COUNT(*) FROM projet");
		$result=mysqli_fetch_assoc($req);
		return $result;
		
	}


