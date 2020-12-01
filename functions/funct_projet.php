
<?php
	//Partie refaite
	function get_file_extension($file) {
		    return substr(strrchr($file,'.'),1);
	}

	function affiche_image($nomprojet){
		//Prends en argument un nom d'image, et ressort une balise img avec cette derniere

		return $img = '<img src="./projets/' . $nomprojet . '" alt="projets" class="img_projet"/>';

	}

	function affiche_projet($projets){
		//Affiche les differents projets

		foreach ($projets as $key => $value) {

			echo '<figure class="projet">';

			echo affiche_image($value['nomprojet']);

			echo '<figcaption class="fig_projet">Date de création' . $value['date_creation'] . "</br>";
			echo "Realisation: " . $value['autor'] .'</br>';
			echo $value['description'];


			if ($_SESSION['connected']){

				echo "<h2>Ajouter un commentaire</h2>";
				print_form_avis($value['id']);
			
			}



			$avis = charge_avis($value['id']);
			if (!empty($avis)) {
					echo "<h2>Commentaire: </h2></br>";	
					print_avis($avis);
			}




			echo "</figcaption></figure>";

			

		}
		
	}


	function print_formulaire(){
		?>
			<form name="projet" action="index.php?page=projets" method="POST" enctype="multipart/form-data"></br>


			    <label>Date</label>
			    <input type="date" name="date">

			  	<label>Auteur</label>
			  	<input type="text" name="autor"></br>

		      	<label>Description</label>
		      	<textarea name="description"></textarea></br>

		        <input type="file" name="image" accept="image/jpeg"/></br>
		        <input type="submit" name="projet"/>
      		</form>
		<?php
	}









?>