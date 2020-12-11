
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
	      	
	    	<form name="affiche_projet" action="index.php?page=projets" method="POST">
	    			<select name="form_typeProjets">
	    			<option value="allProjets">Tous</option>
	    			<?php
					foreach ($typeProjets as $key => $value) {
						echo '<option value="' . $value['type'] . '">' . $value['type'] . '</option>';
					}
					?>

					</select>
	    		<input type="submit" name="Submit">
	    	</form>
	    <?php
	    	echo "<h1>Projets de " . $titreProjets . "</h1>";
	    	affiche_projet($res);
      		
      	?> 