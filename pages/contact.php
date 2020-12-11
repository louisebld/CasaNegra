<script type='text/javascript' src='js/verifcontact.js'></script>

<section class="contact">
	<h2>Nous contacter:</h2>

<?php
if (isset($_SESSION['connected'])) {
print_formulaire_contact();

if (isset($_SESSION['fautecontact'])) {
	echo "<ul>";
	foreach($_SESSION["fautecontact"] as $faute)
		echo "<li>$faute</li>";
	echo "</ul>";

}
}
else {

echo '<script>alert("Vous devez être connecté pour accéder à cette page");
		window.location.href = "./index.php?page=connexion";</script>'; 
  		exit();
}


?>
</section>