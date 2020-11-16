<?php
	/*table projet
		id: int AI
		date_creation: varchar
		idautor: int
		idcom: int*/



	function insert_projet($date, $nom, $description){
		//Insere un nouveau projet dans la table du meme nom, le nom vient d'un membres de l'equipe 
		global $c;
		$sql = "INSERT INTO projet (date_creation, name, commentary) VALUES ($date, $name, $description)";
		mysqli_query($c, $sql);
	}

	function charge_projet($c){
		//Fonction qui renvoie un tableau associatif des infos sur les projets
		$sql = "SELECT  date_creation, autor, description FROM projet";


		$result=  mysqli_query($c, $sql);

		//on met dans un tableau
		$tableau = [];
		while ($row=mysqli_fetch_assoc($result)) {
			$tableau[] = $row;
		}
		//var_dump($tableau);
		return $tableau;
	}