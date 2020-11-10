<!-- Pour le formulaire de connexion -->
<?php



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




function print_formulaire_connexion() {
	//Affiche le formulaire pour ajouter un nouveau membre

	?>

	<form method="post" action="index.php?page=connexion">

		<p><label for="ajout"> Adresse Mail </label>
			<input type = "text" name ="mail" id="ajout" value="<?php if (isset($_SESSION['donnee']['mail'])) 
																echo $_SESSION['donnee']['mail']; ?>"></p>

		<p><label for="ajout"> Mot de passe </label>
	<input type = "password" name ="motdepasse" id="ajout" value="<?php if (isset($_SESSION['donnee']['motdepasse'])) 
														echo $_SESSION['donnee']['motdepasse']; ?>"></p>


		<p><input type="submit" name="connexion" id="action" value="S'inscrire"/></p>
				</form>

				<?php	 
			}




function verificationadressemailmdp($compte, $mail, $motdepasse){
	// Permet de savoir si un mail et un mot de passe donné corresponde bien à un compte
	// verification prend les champs corrects
	$verification=[];
	for ($i = 0; $i < count($compte); $i++){
		$personnecourante=$compte[$i];

		if ($mail == $personnecourante['mail']) {
			$verification[]='Adressemail';
		}

		if ($motdepasse = $personnecourante['motdepasse']) {
			$verification[]='Motdepasse';
		}


	}
}



?>


