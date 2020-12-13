<section class="avis">
	<h2>Ajouter un avis</h2>
		<?php
			// JE CROIS QUE CETTE PAGE SERT A R
			print_form_avis();


			if (isset($_SESSION['faute'])) {
				echo "<ul>";
			// on affiche chaque erreur
				foreach($_SESSION["faute"] as $faute){
					echo "<li>$faute</li>";
				}
				echo "</ul>";
			}

			
		?>
	<h2>Vous nous faites confiance, voici les avis des clients:</h2>
		<?php
			
		?>

</section>