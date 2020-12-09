<script type='text/javascript' src='js/verifconnexion.js'></script>
<?php

print_formulaire_connexion();

if (isset($_SESSION['faute'])) {
	echo "<ul>";
	foreach($_SESSION["faute"] as $faute)
		echo "<li>$faute</li>";
	echo "</ul>";

}
?>
<div id="inscription">
	<a href="index.php?page=inscription"> Inscription </a>
</div>
