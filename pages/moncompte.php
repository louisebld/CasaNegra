<h2> Mon compte </h2>

<?php
// Appel de la fonction pour afficher les données c-à-d : l'email le nom et le prénom
print_donnescompte($_SESSION['comptedonnee']);
// on affiche ces rendez-vous
affiche_rdv(charge_rdv($_SESSION['idcompte']));


?>
<h2> Changer votre mot de passe </h2>
<?php
// Appel de la fonction qui affiche le formulaire de changement de mot de passe
print_form_mdp();
// Si il y a des erreurs dans les vérifications
if (isset($_SESSION['fautechangementmdp'])) {
	echo "<ul>";
	// on affiche chaque erreur
	foreach($_SESSION["fautechangementmdp"] as $faute)
		echo "<li>$faute</li>";
	echo "</ul>";

}

?>
<!-- On informe l'utilisateur de ce que doit contenir le mot de passe -->
Votre nouveau mot de passe doit contenir au moins : • Une majuscule • Une minuscule • Un chiffre • Un caractère spécial • 8 caractères