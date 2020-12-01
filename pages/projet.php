<?php

?>

<section>
		<form action="index.php?page=projets" method="POST" enctype="multipart/form-data"></br>


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
	    	<?php
	    	affiche_projet($projets);
      	
      	?> 




</section>