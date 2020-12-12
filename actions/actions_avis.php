<?php

	// -----------------------------Ajoute de commentaire---------------------

	if (isset($_POST['envoyer_com'])) {



			
			$idcompte = $_SESSION['idcompte'];
			//On recupere l'id de l'auteur


			
			$sesdonnees = recupedonnees($idcompte);
			$name = $sesdonnees['prénom'];

			if (empty($_POST["com"]) || !trim($_POST['com'])){
				$com = $_POST['com'];
			}
			
			$idprojet = $_POST['idprojet'];
			//recuperation de l'id du projet, pour savoir a quel projet correspond le commentaire


			insert_com($com, $name, $idprojet);
			// Insetion du commentaire dans la table avis

			header("Location:index.php?page=projets");
			// Redirection vers la page projet
	

		}


?>