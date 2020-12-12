<!-- On importe le script de vérification du formulaire -->
<script type='text/javascript' src='js/verifinscription.js'></script>

<?php
// appel de la fonction pour afficher le formulaire
print_formulaire_ajout();

?>
<!-- On informe l'utilisateur de ce que doit contenir le mot de passe -->
<p>Votre mot de passe doit contenir au moins : • Une majuscule • Une minuscule • Un chiffre • Un caractère spécial • 8 caractères</p>


<?php


// si on a des erreurs dans la vérification on les affiche
if (isset($_SESSION['erreur'])) {

	echo "Vous n'avez pas renseigné les champs correctement :";

	echo "<ul>";
	// on affiche chaque erreur
	
	foreach($_SESSION["erreur"] as $erreur)
		echo "<li>$erreur</li>";
	echo "</ul>";

}


?>