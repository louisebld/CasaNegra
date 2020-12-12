<script type='text/javascript' src='js/verifconnexion.js'></script>
<?php
	// appel de la fonction pour afficher le formulaire

	print_formulaire_connexion();
	// si on a des erreurs dans la vérification on les affiche

if (isset($_SESSION['faute'])) {
	echo "<ul>";
	// on affiche chaque erreur
	foreach($_SESSION["faute"] as $faute)
		echo "<li>$faute</li>";
	echo "</ul>";

}
?>
<div id="inscription">
	<a href="index.php?page=inscription"> Inscription </a>
</div>
