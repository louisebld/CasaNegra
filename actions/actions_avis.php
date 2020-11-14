<?php
	//Verifie les données du fomrulaire d'ajout de commentaire.

	$erreur = [];

	if (isset($_POST['avis'])) {


		// com vide
		if (empty($_POST["com"]) && !trim($_POST['com'])) {
			$erreur[]="Il faut mettre un commentaire";
		}

		//pas connecté
		if (!isset($_SESSION['monadressemail'])){
			$erreur[] = "il faut que vous soyez connecté";
		} else{
			$idcompte = recupere_id_autor($c);
		}


		if (count($erreur)>0) {

				$_SESSION["faute"]= $erreur;

		}else {

				$com = $_POST['com'];

				insert_com($com, $idcompte);

				header("Location:index.php?page=avis");
				
				unset($_SESSION['erreur']);
				unset($_SESSION['donnee']);

			}
	}

// Fin INSCRIPTION

?>