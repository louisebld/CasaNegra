<?php
	/*table projet
		id: int AI
		name : -
		date_creation: date
		idautor: int
		idcom: int*/




//verifs pour l'insertion

function datepaspassee($date){
	//init date ajd
	$dateajd = date('d-m-y');

	if($dateajd>$date){
		return false;
	}

	// si la date rentrée est plus recente que ajd
	else{
		return true;
	}

}

function projetexiste($nom){
	// retourne si le projet existe deja dans la base de donnée oui ou non
	global $c;
	// Je fais une recherche dans la base à partir de l'adresse mail
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
			//Fonction qui insere un projet dans la table projet, permet de stocker les infos lié au projet

			global $c;
			$sql = "INSERT INTO projet (nomprojet, date_creation, autor, description, type) VALUES ('$nomprojet', '$date_creation', '$autor', '$description', '$type')";
			mysqli_query($c, $sql);
		}


		function charge_projet($c){
			//Fonction qui renvoie un tableau de commentaire avec une reponse (si existe) and un auteur sur un projet precis

			
			$sql = "SELECT * FROM projet";
			$result=  mysqli_query($c, $sql);

			//on met dans un tableau
			$tableau = [];
			while ($row=mysqli_fetch_assoc($result)) {
				$tableau[] = $row;
			}
			//var_dump($tableau);
			return $tableau;
		}


		function charge_projetType($aAfficher){
			global $c;
			
			$sql = "SELECT * FROM projet WHERE type = '$aAfficher'";
			$result=  mysqli_query($c, $sql);

			//on met dans un tableau
			$tableau = [];
			while ($row=mysqli_fetch_assoc($result)) {
				$tableau[] = $row;
			}
			//var_dump($tableau);
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
		
//Si besoin de faire apparaitre le nombre de projets
//Ne pas oublier d'incrementer
		
		function charge_nbphotos($c){
			//charge le nombre de photos, permet de recuperer ce nombre de de nommer les fichiers obtenues
	
			$sql = "SELECT nbphotos FROM photos WHERE 1";

			$result=  mysqli_query($c, $sql);

			//on met dans un tableau
			$row=mysqli_fetch_assoc($result);

			//var_dump($tableau);
			return $row['nbphotos'];
		}

		function increment_nbphotos($c){
			//Incremente le nombre de photos
			$sql = "UPDATE photos 
					SET nbphotos = nbphotos + 1 
					WHERE 1";
			mysqli_query($c, $sql);
		}


function countprojet () {
	global $c;
	$req=mysqli_query($c, "SELECT COUNT(*) FROM projet");
	$result=mysqli_fetch_assoc($req);
	return $result;
	
}


