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
	//var_dump($tableau);
	return $tableau;
}


function print_formulaire_ajout() {
	//Affiche le formulaire pour ajouter un nouveau membre

	?>

	<form method="post" action="index.php?page=inscription">

		<p><label for="ajout"> Nom </label>
			<input type = "text" name ="nom" id="ajout" value="<?php if (isset($_SESSION['donnee']['nom'])) 
																echo $_SESSION['donnee']['nom']; ?>"></p>

			

		<p><label for="ajout"> Prénom </label>
			<input type = "text" name ="prénom" id="ajout" value="<?php if (isset($_SESSION['donnee']['prénom'])) 
																echo $_SESSION['donnee']['prénom']; ?>"></p>


		<p><label for="ajout"> Adresse Mail </label>
			<input type = "text" name ="mail" id="ajout" value="<?php if (isset($_SESSION['donnee']['mail'])) 
																echo $_SESSION['donnee']['mail']; ?>"></p>

		<p><label for="ajout"> Mot de passe </label>
	<input type = "password" name ="motdepasse" id="ajout" value="<?php if (isset($_SESSION['donnee']['motdepasse'])) 
														echo $_SESSION['donnee']['motdepasse']; ?>"></p>


		<p><input type="submit" name="action" id="action" value="S'inscrire"/></p>
				</form>

				<?php	 
			}



function insert_compte($nom, $prénom, $mail, $motdepasse) {
	//Insère un nouveau compte dans la bdd
					global $c;
					mysqli_query($c, "INSERT INTO compte(nom, prénom, mail, motdepasse) values ('$nom', '$prénom', '$mail', '$motdepasse')");

				}



function print_equipe($equipe){
	//Print toute l'equipe contenue dans la base de donnée
	echo '<div class="equipe">';
	foreach ($equipe as $key => $value) {
		echo '<div class="membre">';
		echo "<h2>" . $value["name"] . "</h2>";
		echo "<p>" . $value["age"] . ", " . $value["metier"] . "</p>" ;
		echo "numéro de téléphone: " . $value["tel"];
		echo "<p>" . $value["description"] . "</p>";

		echo "</div>";
	}
}



?>


