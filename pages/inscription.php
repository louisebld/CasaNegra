<?php

print_formulaire_ajout();

if (isset($_SESSION['erreur'])) {

	echo "Vous n'avez pas renseigné les champs correctement :";

			echo "<ul>";
			foreach($_SESSION["erreur"] as $erreur)
				echo "<li>$erreur</li>";
			echo "</ul>";

}


?>