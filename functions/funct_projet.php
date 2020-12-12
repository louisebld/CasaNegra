
<?php


	//Partie refaite
	function get_file_extension($file) {
		    return substr(strrchr($file,'.'),1);
	}

	function affiche_image($nomprojet){
		//Prends en argument un nom d'image, et ressort une balise img avec cette derniere

		return $img = '<img src="./projets/' . $nomprojet . '" alt="projets" class="img_projet"/>';

	}

	function filter_number($nomimg){

		$int = (int) filter_var($nomimg, FILTER_SANITIZE_NUMBER_INT); 
	}

	function affiche_projet($projets){
		//Affiche les differents projets

		foreach ($projets as $key => $value) {

			echo '<figure class="projet" id="' . $value['nomprojet'] . '">';

			echo affiche_image($value['nomprojet']);

			echo '<div class="fig_projet">Date de création' . $value['date_creation'] . "</br>";
			echo "Realisation: " . $value['autor'] .'</br>';
			echo $value['description'];


			if (isset($_SESSION['connected'])){

				echo "<h2>Ajouter un commentaire</h2>";
				print_form_avis($value['id']);
			
			}


			$avis = charge_avis($value['id']);
			if (!empty($avis)) {
					echo "<h2>Commentaire: </h2></br>";	
					print_avis($avis);
			}




			echo "</figure>";

			

		}
		
	}


	function print_formulaire(){
		global $c;
		$typeProjets = charge_typeProjet($c);


		?>
			<form name="projet" action="index.php?page=projets" method="POST" enctype="multipart/form-data"></br>


			    <label>Date</label>
			    <input type="date" name="date">

				<?php
					listederoulemembres();
				?>

		      	<label>Description</label>
		      	<textarea name="description"></textarea></br>

		      	<?php
		      		affiche_typeProjet($typeProjets);
		      	?>

		        <input type="file" name="image" accept="image/jpeg"/></br>
		        <input type="submit" name="projet"/>
      		</form>
		<?php
	}



function print_formulairechoixtype() {
	global $typeProjets;
?>
	    	<form name="affiche_projet" action="index.php?page=projets" method="POST">
	    			<!-- <select name="form_typeProjets"> -->
	    			<!-- <option value="allProjets">Tous</option> -->
	    			<input type='radio' id='equipe' name='form_typeProjets' value="allProjets" checked >
	    			<label for='fname'>Tous</label>

	    			<?php
					foreach ($typeProjets as $key => $value) {
  						echo "<input type='radio' id='equipe' name='form_typeProjets' value=" . "'" . $value['type'] . "'" . ">";
						echo "<label for='fname'>" . $value['type'] . "</label>";

					}

					?>
<!-- echo '<option value="' . $value['type'] . '">' . $value['type'] . '</option>'; -->
					<!-- </select> -->
	    		<input type="submit" name="Submit" value="Chercher">
	    	</form>
<?php

}












?>