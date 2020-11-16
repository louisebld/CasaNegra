<?php
	//Verifie les données du fomrulaire d'ajout de commentaire.
	
	$erreur = [];

	if (isset($_POST['com'])) {

		// com vide
		if (empty($_POST["com"]) && !trim($_POST['com'])) {
			$erreur[]="Il faut mettre un commentaire";
		}

		//pas connecté
		if (isset($_SESSION['connected']) && $_SESSION['connected']){
			$idcompte = $_SESSION['idcompte'];
		} else{
			$erreur[] = "il faut que vous soyez connecté";
		}


		if (count($erreur)>0) {
				echo "par ici";
				$_SESSION["faute"]= $erreur;
				unset($_SESSION['erreur']);
				
		}else {
				echo "par là";
				$com = $_POST['com'];

				insert_com($com, $idcompte);

				header("Location:index.php?page=avis");
				
				unset($_SESSION['erreur']);
				unset($_SESSION['donnee']);

			}
	}

// Fin INSCRIPTION

?>