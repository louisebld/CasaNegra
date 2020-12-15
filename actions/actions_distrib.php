<?php
	$distrib = charge_distrib($c);


	// -----------------------------Ajout d'un distributeur---------------------

	if (isset($_POST['ajouterDistrib'])) {

		$erreurDistrib=[];

		if (empty($_POST["name"]) && !trim($_POST["name"])) {
		$erreurDistrib[]="Vous n'avez pas rentré de nom";

		}

		if (empty($_POST["link"]) && !trim($_POST["link"])) {
			$erreurDistrib[]="Vous n'avez pas rentré de lien";

		}

		

		if (count($erreurDistrib)>0) {

			$_SESSION["fauteDistrib"]= $erreurDistrib;

		}

		else {



			$link = remplaceApo ($_POST['link']);
			$name = remplaceApo ($_POST["name"]);
			//recuperation du lien entré, et du nom du distributeur


			insert_distrib($name, $link);
			// Insetion du distributeur dans la table avis

			// on informe l'admin qu'il a ajouté un distributeur
			// redirection vers la page de presentation
			echo '<script>alert("Vous avez ajouté un distributeur");
			window.location.href = "./index.php?page=presentation";</script>'; 
	  		exit();
	

		}
	}
// -------------------- Suppression de commentaire-----------------------

if (isset($_POST['deldistrib'])) {
// on récupère
	$name = $_POST['suppDistrib'];
// on supprime
	supprime_distrib($name);

	//header('location:index.php?page=pageadmin');
// on informe et on redirige
	echo '<script>alert("Vous avez supprimé un distributeur");
	window.location.href = "./index.php?page=presentation";</script>'; 
  	exit();

}

?>