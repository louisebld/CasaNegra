<!-- Pour le formulaire de connexion -->
<?php

function print_formulaire() {

	?>

	<form method="post" action="index.php?page=connexion">

		<p><label for="ajout"> Nom </label>
			<input type = "text" name ="nom" id="ajout"></p>
			

		<p><label for="ajout"> Prénom </label>
			<input type = "text" name ="prénom" id="ajout"></p>


		<p><label for="ajout"> Adresse Mail </label>
			<input type = "text" name ="mail" id="ajout"></p>


		<p><input type="submit" name="action" id="action" value="Envoyer"/></p>
				</form>

				<?php	 
			}



function insert_compte($nom, $prénom, $mail) {
					global $bdd;
					mysqli_query($bdd, "INSERT INTO compte (nom, prénom, adressemail) values ('$nom', '$prénom', $mail)");

				}


?>