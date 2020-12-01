
<?php
	//Partie refaite


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

			$avis = charge_avis($value['id']);
			if (!empty($avis)) {
					echo "<h2>Commentaire: </h2></br>";	
			}

			print_avis($avis);

			echo "</figcaption></figure>";

			

		}
		
	}









?>