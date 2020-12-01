<?php
	//Verifie les données du fomrulaire d'ajout de commentaire.
	

	if (isset($_POST['envoyer_com'])) {



		//pas connecté
		if (!empty($_POST['nom'])){
	

			$idcompte = $_SESSION['idcompte'];
			var_dump($idcompte);
			
			$sesdonnees =recupedonnees($idcompte);
			$name = $sesdonnees['prénom'];
			$com = $_POST['com'];
			$idprojet = $_POST['idprojet'];


			insert_com($com, $name, $idprojet);

			header("Location:index.php?page=projets");
				
		}

		}

/*		var_dump($_POST);*/


// Fin INSCRIPTION

?>