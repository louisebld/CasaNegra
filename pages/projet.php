<script type='text/javascript' src='js/veriftypeprojet.js'></script>

<section>
		<?php

		if (isset($_SESSION['idcompte'])){
			if (testif_admin($_SESSION['idcompte'])){
				?>
					<h2>Ajouter un nouveau type de Projet :</h2>
				<?php
					form_newTypeProjet();
				?>
					<h2>Ajouter un projet :</h2>
				<?php
				print_formulaire();

			}
		}
	    ?>  

	    <h2>Nos creations</h2>
	      	

	    <h5> Cherchez les projets par type </h5>
	    <?php
			print_formulairechoixtype();
			?>
		<h5> Cherchez les projets réalisés par un membre de l'équipe </h5>
		<?php 
			listeoptionmembre();

	    	echo "<h1>Projets de " . $titreProjets . "</h1>";
	    	affiche_projet($res);
      		
      	?> 