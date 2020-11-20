<?php


/* print_formulairenouveauprojet();
 
if (isset($_SESSION['faute'])) {
			echo "<ul>";
			foreach($_SESSION["faute"] as $faute)
				echo "<li>$faute</li>";
			echo "</ul>";

}*/


//Partie refaite:
//Utilisation de enctype, justifie par le fait qu'on encode l'upload
?>

<section>
		<form action="index.php?page=projet" method="POST" enctype="multipart/form-data"></br>


		    <label>Date</label>
		    <input type="date" name="date">

		  	<label>Auteur</label>
		  	<input type="text" name="autor"></br>

	      	<label>Description</label>
	      	<textarea name="description"></textarea></br>

	        <input type="file" name="image" accept="image/jpeg"/></br>
	        <input type="submit"/>
      	</form>
	      
	    <h2>Nos creations</h2>
	      
	    <?php

	    ?>
	    	<p>NBPHOTOS:</p><?php var_dump($nbphotos);
	    	affiche_projet($projets);
      	
      	?> 




</section>