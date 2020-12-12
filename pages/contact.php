<!-- On importe le script de vérification du formulaire -->
<script type='text/javascript' src='js/verifcontact.js'></script>

<section class="contact">
	<h2>Nous contacter:</h2>

	<?php
	// on affiche le formulaire seulement si on est connecté
	if (isset($_SESSION['connected'])) {
	// appel de la fonction pour afficher le formulaire
		print_formulaire_contact();
	// si on a des erreurs dans la vérification on les affiche
		if (isset($_SESSION['fautecontact'])) {
			echo "<ul>";
			foreach($_SESSION["fautecontact"] as $faute)
				echo "<li>$faute</li>";
			echo "</ul>";

		}
	}
	else {
// on informe qu'il doit être connecté pour aller sur cette page
// redirection vers connexion du coup
		echo '<script>alert("Vous devez être connecté pour accéder à cette page");
		window.location.href = "./index.php?page=connexion";</script>'; 
		exit();
	}


	?>
</section>