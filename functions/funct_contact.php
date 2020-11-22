<?php

function print_formulaire_contact() {
	//Affiche le formulaire pour ajouter un nouveau membre

	?>
	<div id="formulairecontact">
	<form method="post" action="index.php?page=contact">

		<p>
			<input type = "text" placeholder="Votre téléphone" name ="tel" id="ajout" ></p>

			<p>
	<p>
			<textarea id="message" placeholder="Votre message.." name="message"
			rows="10" cols="35"></textarea>
		</p>


		<p><input type="submit" name="contact" id="action" value="Envoyer"/></p>
				</form>
</div>
				<?php	 
			}


?>