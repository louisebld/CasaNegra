<?php

	// -----------------------------Ajoute de commentaire---------------------

	if (isset($_POST['envoyer_com'])) {

		$erreuravis=[];

			if (empty($_POST["com"]) && !trim($_POST["com"])) {
			$erreuravis[]="Vous n'avez pas rentré de commentaire";

			}
			

			if (count($erreuravis)>0) {

				$_SESSION["fauteavis"]= $erreuravis;

			}

			else {

			$idcompte = $_SESSION['idcompte'];
			//On recupere l'id de l'auteur

			$sesdonnees = recupedonnees($idcompte);
			$name = $sesdonnees['prénom'];

			$idprojet = $_POST['idprojet'];
			$com = remplaceApo($_POST["com"]);
			//recuperation de l'id du projet, pour savoir a quel projet correspond le commentaire


			insert_com($com, $name, $idprojet);
			// Insetion du commentaire dans la table avis

			// on informe l'utilisateur qu'il a posté un commentaire
			// redirection vers la page projets
			echo '<script>alert("Vous avez posté un commentaire");
			window.location.href = "./index.php?page=projets";</script>'; 
	  		exit();
	

		}
	}
// -------------------- Suppression de commentaire-----------------------

if (isset($_POST['delcom'])) {
// on récupère
	$idcom = $_POST['idcom'];
// on supprime
	supprime_com($idcom);

	//header('location:index.php?page=pageadmin');
// on informe et on redirige
	echo '<script>alert("Vous avez supprimé un commentaire");
	window.location.href = "./index.php?page=projets";</script>'; 
  	exit();

}

?>