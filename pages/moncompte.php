<h2> Mon compte </h2>

<?php

print_donnescompte($_SESSION['comptedonnee']);
affiche_rdv(charge_rdv($_SESSION['idcompte']));


?>
<h2> Changer votre mot de passe </h2>
<?php
print_form_mdp();

if (isset($_SESSION['fautechangementmdp'])) {
	echo "<ul>";
	foreach($_SESSION["fautechangementmdp"] as $faute)
		echo "<li>$faute</li>";
	echo "</ul>";

}

?>

Votre nouveau mot de passe doit contenir au moins : • Une majuscule • Une minuscule • Un chiffre • Un caractère spécial • 8 caractères