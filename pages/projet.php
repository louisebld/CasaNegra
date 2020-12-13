<!-- On importe le script de vérification du formulaire -->
<script type='text/javascript' src='js/veriftypeprojet.js'></script>

<section>
		<?php
		// On affiche seulement si le compte est admin
		if (isset($_SESSION['idcompte'])){
			if (testif_admin($_SESSION['idcompte'])){
				?>
					<div class="fromAjouterTypeProjet">
					<h2>Ajouter un nouveau type de Projet :</h2>
				<?php
				// Appel de la fonction d'affichage du formulaire pour ajouter un type de projet
					form_newTypeProjet();
					echo "</div>";
				?>

					<div class="formAjouterProjet">
					<h2>Ajouter un projet :</h2>
				<?php
				// Appel de la fonction d'affichage du formulaire pour ajouter un projet
				print_formulaire();
				echo "</div>";

			}
		}
	    ?>  

	    <h2>Nos creations</h2>
	      	
	    <div class="searchByType">
	    <h5> Cherchez les projets par type :</h5>
	    <?php
	    // Appel de la fonction d'affichage du formulaire pour selectionner un type de projet
			print_formulairechoixtype();
			?>
		</div>
		<div class="seachByAutor">
		<h5> Cherchez les projets réalisés par un membre de l'équipe :</h5>
		<?php 
	    // Appel de la fonction d'affichage du formulaire radio pour selectionner les projets d'un membre de l'équipe
			listeoptionmembre();
			echo "</div>";
			// On change le titre en fonction de ce que l'on affiche
	    	echo "<h1>Projets de " . $titreProjets . "</h1>";
	    	// Appel de la fonction d'affichage des projets
	    	affiche_projet($res);
      		
      	?> 
