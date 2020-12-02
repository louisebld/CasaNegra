<?php

print_formulaire_ajout();

?>

<p>Votre mot de passe doit contenir au moins : • Une majuscule • Une minuscule • Un chiffre • Un caractère spécial • 8 caractères</p>


<?php



if (isset($_SESSION['erreur'])) {

	echo "Vous n'avez pas renseigné les champs correctement :";

			echo "<ul>";
			foreach($_SESSION["erreur"] as $erreur)
				echo "<li>$erreur</li>";
			echo "</ul>";

}


?>