<?php


	function insert_typeProjet($newType){

		global $c;
		$sql = "INSERT INTO typeprojet (type) VALUES ('$newType')";
		mysqli_query($c, $sql);
	}


	function charge_typeProjet($c){
		//Fonction qui renvoie un tableau de commentaire avec une reponse (si existe) and un auteur sur un projet precis

			
		$sql = "SELECT * FROM typeprojet ";
		$result=  mysqli_query($c, $sql);

		//on met dans un tableau
		$tableau = [];
		while ($row=mysqli_fetch_assoc($result)) {
			$tableau[] = $row;
		}
		//var_dump($tableau);
			return $tableau;
	}