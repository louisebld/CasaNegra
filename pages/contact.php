<section class="contact">
	<h2>Nous contacter:</h2>

<?php

print_formulaire_contact();

if (isset($_SESSION['fautecontact'])) {
	echo "<ul>";
	foreach($_SESSION["fautecontact"] as $faute)
		echo "<li>$faute</li>";
	echo "</ul>";

}



?>
</section>