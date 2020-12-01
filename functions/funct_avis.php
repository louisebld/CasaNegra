<?php

function print_avis($avis){
	//Print toute l'avis contenue dans la base de donnée
	echo '<div class="galery_avis">';
	foreach ($avis as $key => $value) {
		echo '<div class="box_avis">';
		
			echo '<div class="autor"><p>Pseudo: ' . $value["name"] . "</p></div>";
			echo '<div class="commentary"><p>Commentaire: ' . $value["commentary"] . "</p></div>";
			if (isset($value["answer"])){
				echo '<div class="answer"><p>Reponse :' . $value["answer"] . "</p></div>";
			}

		echo "</div>";
	}
	echo '</div>';
}

function print_form_avis($idprojet){
	//Fonction qui permet d'afficher le formulaire qui ajoute un avis
	//Obligation d'etre connecté, sinon redirection
	?>

	<form method="post" action="index.php?page=projets">

		<p>
			<textarea id="com" placeholder="Votre avis.." name="com"
			rows="10" cols="35"></textarea>
		</p>

		<p>
			<?php	
				echo  '<input id="idprojet" name="idprojet" type="hidden" value= '. $idprojet . ">" ;
			?>
		</p>

		<p><input type="submit" name="envoyer_com" id="envoyer_com" value="Enregistrer"/></p>
	</form>

		<?php	 
	}




?>