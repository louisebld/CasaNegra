<!-- Pour le formulaire de connexion -->
<?php



function print_formulaire_ajout() {
	//Affiche le formulaire pour ajouter un nouveau membre

	?>
	<div id="formulaireinscription">
	<form method="post" action="index.php?page=inscription">

		<p>
			<input type = "text" placeholder="Nom" name ="nom" id="ajout" value="<?php if (isset($_SESSION['donnee']['nom'])) 
																echo $_SESSION['donnee']['nom']; ?>"></p>

			

		<p>
			<input type = "text" placeholder="Prénom" name ="prénom" id="ajout" value="<?php if (isset($_SESSION['donnee']['prénom'])) 
																echo $_SESSION['donnee']['prénom']; ?>"></p>


		<p>
			<input type = "text" placeholder="Email" name ="mail" id="ajout" value="<?php if (isset($_SESSION['donnee']['mail'])) 
																echo $_SESSION['donnee']['mail']; ?>"></p>

		<p>
	<input type = "password" placeholder="Mot de passe" name ="motdepasse1" id="ajout" value="<?php if (isset($_SESSION['donnee']['motdepasse1'])) 
														echo $_SESSION['donnee']['motdepasse1']; ?>"></p>

		<p>
	<input type = "password" placeholder="Mot de passe" name ="motdepasse2" id="ajout" value="<?php if (isset($_SESSION['donnee']['motdepasse2'])) 
														echo $_SESSION['donnee']['motdepasse2']; ?>"></p>

		<p><input type="submit" name="action" id="action" value="S'inscrire"/></p>
				</form>
			</div>
				<?php	 
			}




function print_formulaire_connexion() {
	//Affiche le formulaire pour ajouter un nouveau membre

	?>
	<div id="formulaireconnexion">
	<form method="post" action="index.php?page=connexion">

		<p>
			<input type = "text" placeholder="Email" name ="mail" id="ajout" value="<?php if (isset($_SESSION['donneeutil']['mail'])) 
			echo $_SESSION['donneeutil']['mail']; ?>"></p>

			<p>
	<input type = "password" placeholder="Mot de passe"  name ="motdepasse" id="ajout"></p>


		<p><input type="submit" name="connexion" id="action" value="Se connecter"/></p>
				</form>
</div>
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





// Vérification des éléments du mot de passe

function mdpbonformat($motdepasse) {
// le mot de passe doit contenir au moins
	// une majuscule, une minuscule, un chiffre et un caractère spécial -- mot de passe sécurisé
	// le mot de passe doit contenir au moins 8 caractères

	$majuscule = preg_match('@[A-Z]@', $motdepasse);
	$minuscule = preg_match('@[a-z]@', $motdepasse);
	$chiffre = preg_match('@[0-9]@', $motdepasse);
	$car = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
// mis dans une variable sinon les apostrophes faisent bug
	$caracterespecial = preg_match($car, $motdepasse) ;

	// si toutes les conditions sont réunies

	if($majuscule and $minuscule and $chiffre and $caracterespecial and strlen($motdepasse) >= 8) {
		$correct=true;
	}
	else {
		$correct=false;
	}

	return $correct;
}




?>


