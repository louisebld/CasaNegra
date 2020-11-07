<!-- Pour le formulaire de connexion -->
<?php

function charge_equipe($c){
	//Fonction recupere le tableau de la bdd Equipe de salarie + caractéristique

	//requete
	$sql="SELECT * FROM equipe";
	$result=  mysqli_query($c, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}
	var_dump($tableau);
	return $tableau;
}


function print_formulaire() {
	//Affiche le formulaire pour ajouter un nouveau membre

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
	//Insère un nouveau compte dans la bdd
					global $bdd;
					mysqli_query($bdd, "INSERT INTO compte (nom, prénom, adressemail) values ('$nom', '$prénom', $mail)");

				}



function print_equipe($equipe){
	//Print toute l'equipe contenue dans la base de donnée
	echo '<div class="equipe">';
	foreach ($equipe as $key => $value) {
		echo '<div class="membre">';
		echo "<h2>" . $value["name"] . "</h2>";
		echo "<p>" . $value["age"] . ", " . $value["metier"] . "</p>" ;
		echo "<p>" . $value["description"] . "</p>";
		echo "</div>";
	}
}



?>


