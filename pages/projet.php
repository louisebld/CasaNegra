<?php

?>

<section>
		<?php

		if (isset($_SESSION['idcompte'])){
			if (testif_admin($_SESSION['idcompte'])){
				?>
					<h2>Ajouter un projet:</h2>
				<?php
				print_formulaire();
			}
		}

	    ?>  
	    <h2>Nos creations</h2>
	      
	    <?php

	    ?>
	    	<?php
	    	affiche_projet($projets);
      	
      	?> 




</section>