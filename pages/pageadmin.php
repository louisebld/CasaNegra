
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

<?php
if (isset($_SESSION['fauteequipe'])) {
			echo "<ul>";
			foreach($_SESSION["fauteequipe"] as $faute)
				echo "<li>$faute</li>";
			echo "</ul>";

}
?>



<h2> Ajouter un métier </h2>

<?php

printformulairemetier();

if (isset($_SESSION['fautemetier'])) {

	foreach($_SESSION["fautemetier"] as $faute)
		echo $faute;


}

?>

<h2> Supprimer un métier </h2>
<?php
print_formulairesupprmetier();



?>

