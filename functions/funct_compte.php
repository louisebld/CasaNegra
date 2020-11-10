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
			<input type = "text" name ="mail" id="ajout" value="<?php if (isset($_SESSION['donneeutil']['mail'])) 
																echo $_SESSION['donneeutil']['mail']; ?>"></p>

		<p><label for="ajout"> Mot de passe </label>
	<input type = "password" name ="motdepasse" id="ajout"></p>


		<p><input type="submit" name="connexion" id="action" value="Se connecter"/></p>
				</form>

				<?php	 
			}



// ne marche pas pour l'instant 

function verificationadressemailmdp($compte, $mail, $motdepasse){
	// Permet de savoir si un mail et un mot de passe donné corresponde bien à un compte
	// verification prend les champs corrects
	$verification=false;
	for ($i = 0; $i < count($compte); $i++){
		$personnecourante=$compte[$i];

// Mettre les deux ensembles sinon marche pas bien
// car les deux sont réliés
		if ($mail == $personnecourante['mail'] && $motdepasse == $personnecourante['motdepasse']) {
			$verification=true;
		}

	}
		return $verification;
}



?>


