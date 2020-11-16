
<h2> Liste des membres inscrits </h2>

<div id="affichemembre">
	<?php
	affichetouscomptes($donneescomptes);
	?>
</div>
<h2> Ajouter un membre dans l'équipe </h2>

<?php


print_formulairenouveauequipe();
?>

<h2> Ajouter un métier </h2>

<?php

printformulairemetier();

if (isset($_SESSION['fautemetier'])) {

	foreach($_SESSION["fautemetier"] as $faute)
		echo $faute;


}



?>

