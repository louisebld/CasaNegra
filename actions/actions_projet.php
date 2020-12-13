
<?php

	// ------------------Insertion de projet-----------------------


$projets = charge_projet($c);
// Chargement des projets depuis la bdd projet

$typeProjets = charge_typeProjet($c);
// Chargement des types des projets, depuis la bdd typeprojet


// Si soumission du formulaire d'insertion de projet
if (isset($_POST['projet'])) {
	// Tableau qui accueilera des erreurs si il y en a
	$erreur=[];

	// Détéction des erreurs.
	if (empty($_POST['form_typeProjets'])){
		$erreur[]= "Le type n'est pas rempli";
	}

	if (empty($_POST['date']) ){
		$erreur[]= "Le date n'est pas remplie";
	}

	if (empty($_POST['equipe']) ){
		$erreur[]= "L'auteur n'est pas rempli";
	}

	if (empty($_POST['description']) && !trim($_POST['description'])){
		$erreur[]= "Le description n'est pas remplie";
	}


	if(empty($_FILES['image']['name'])){
		$erreur[]= "Vous n'avez pas mis de fichier";


	}

	if (count($erreur)>0) {
		// Stockage de notre tableau d'erreurs dans une variable de session afin de pouvoir les afficher plus tard
		$_SESSION["fauteprojet"]= $erreur;
		$_SESSION["donneesprojet"]=$_POST;
	}

	else {
		// Stockage des informations depuis la varibale $_POST
		$type = $_POST['form_typeProjets'];	
		$date_creation = $_POST['date'];
		$autor = $_POST['equipe'];	
		$autor = $_POST['equipe'];
		$description = $_POST['description'];

		$file_name = $_FILES['image']['name'];
		$file_size =$_FILES['image']['size'];
		$file_tmp =$_FILES['image']['tmp_name'];
		$file_type=$_FILES['image']['type'];

		// Incrementation du nombre de photos dans notre bdd nbphotos
		increment_nbphotos($c);

		// Recuperation du nombre de photos, pour pouvoir renommer notre projet en cours d'insertion
		$nbphotos = charge_nbphotos($c);


		move_uploaded_file($file_tmp,"./projets/diapo" . $nbphotos . ".jpg");
        // Permet de deplacer le fichier initial dans notre dossier projets
	

		// On recupere le nom du fichier qui va etre inserer.
		$file_new_name = "diapo" . $nbphotos . ".jpg";

		// On insere le projet
		insert_projet($autor, $description, $file_new_name, $date_creation, $type);
		unset($_FILES['image']);
		unset($_SESSION["fauteprojet"]);
		unset($_SESSION["donneesprojet"]);
        header("Location: index.php?page=projets");

	}

}