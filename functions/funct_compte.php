<!-- Pour le formulaire de connexion -->
<?php



function print_formulaire_ajout() {
	//Affiche le formulaire pour ajouter un nouveau membre

	?>
	<div id="formulaireinscription">
	<form method="post" action="index.php?page=inscription"
	onsubmit='javascript: return rempliinscri();'>
	<!-- On appelle une fonction javascript pour vérifier si les champs sont vides ou non -->

		<p>
			<input type = "text" placeholder="Nom" name ="nom" id="nominscri" value="<?php if (isset($_SESSION['donnee']['nom'])) 
																echo $_SESSION['donnee']['nom']; ?>"></p>
<!-- On donne une valeur pour que s'il y a des erreurs les valeurs restent dans le formulaire -->
			

		<p>
			<input type = "text" placeholder="Prénom" name ="prénom" id="prénominscri" value="<?php if (isset($_SESSION['donnee']['prénom'])) 
																echo $_SESSION['donnee']['prénom']; ?>"></p>


		<p>
			<input type = "text" placeholder="Email" name ="mail" id="emailinscri" value="<?php if (isset($_SESSION['donnee']['mail'])) 
																echo $_SESSION['donnee']['mail']; ?>"></p>
		
		<!-- On informe l'utilisateur de ce que doit contenir le mot de passe -->
		<p>Votre mot de passe doit contenir au moins : • Une majuscule • Une minuscule • Un chiffre • Un caractère spécial • 8 caractères</p>


		<p>

	<input type = "password" placeholder="Mot de passe" name ="motdepasse1" id="mdp1inscri" value="<?php if (isset($_SESSION['donnee']['motdepasse1'])) 
														echo $_SESSION['donnee']['motdepasse1']; ?>"></p>

		<p>
	<input type = "password" placeholder="Mot de passe" name ="motdepasse2" id="mdp2inscri" value="<?php if (isset($_SESSION['donnee']['motdepasse2'])) 
														echo $_SESSION['donnee']['motdepasse2']; ?>"></p>

		<p><input type="submit" name="action" id="action" value="S'inscrire"/></p>
				</form>
			<?php
				// si on a des erreurs dans la vérification on les affiche
				if (isset($_SESSION['erreur'])) {

					echo "Vous n'avez pas renseigné les champs correctement :";

					echo "<ul>";
					// on affiche chaque erreur
					
					foreach($_SESSION["erreur"] as $erreur)
						echo "<li>$erreur</li>";
					echo "</ul>";

				}
			?>
			</div>
				<?php	 
			}


 

function print_formulaire_connexion() {
	//Affiche le formulaire pour se connecter

	?>
	<div id="formulaireconnexion">
	<form method="post" action="index.php?page=connexion"
	onsubmit='javascript: return rempliconn();'>
	<!-- On appelle une fonction javascript pour vérifier si les champs sont vides ou non -->


		<p>
			<input type = "text" placeholder="Email" name ="mail" id="emailconn" value="<?php if (isset($_SESSION['donneeutil']['mail'])) 
			echo $_SESSION['donneeutil']['mail']; ?>"></p>

			<p>
	<input type = "password" placeholder="Mot de passe" id="mdpconn" name ="motdepasse" id="ajout"></p>


		<p><input type="submit" name="connexion" id="action" value="Se connecter"/></p>
				</form>
</div>
				<?php	 
			}
?>

 

<?php

function verificationadressemailmdp($compte, $mail, $motdepasse){
	// Permet de savoir si un mail et un mot de passe donné corresponde bien à un compte
	// le paramètre compte correspond au tableau associatif contenant les comptes
	// verification : le booléen
	$verification=false;
	// on parcourt les comptes
	for ($i = 0; $i < count($compte); $i++){
		$personnecourante=$compte[$i];
// si le mail et le mot de passe correspondent on passe le booléen à vrai
// on ne peut pas avoir deux comptes avec le même mail : pas de soucis de ce côté là
		if ($mail == $personnecourante['mail'] && $motdepasse == $personnecourante['motdepasse']) {
			$verification=true;
		}

	}
// on retourne le booléen
	return $verification;
}





// Vérification des éléments du mot de passe

function mdpbonformat($motdepasse) {
	// pour savoir si le mot de passe est au format que l'on demande
// le mot de passe doit contenir au moins
	// une majuscule, une minuscule, un chiffre et un caractère spécial -- mot de passe sécurisé
	// le mot de passe doit contenir au moins 8 caractères
	// on teste si il y a au moins 1 caractère de chaque 
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
	// sinon
		$correct=false;
	}
	return $correct;
}



function print_donnescompte($donnees){
// Affiche les données d'un compte
// données : données du compte : tableau associatif
	//Affiche les données du compte
	echo '<div id="donnees">';
	echo "<p>" . $donnees["prénom"] . " ";
	echo  $donnees["nom"] . "</p>";
	echo "<p>" . $donnees["mail"] . "</p>";
	echo "</div>";
}

// fonction pour récupérer le nom et le prénom pour l'afficher
function printnom ($donnees) {
// Afficher le nom et le prénom d'un compte
	echo $donnees["prénom"] . " " . $donnees["nom"];
}



function affichetouscomptes ($donneesdescomptes) {
// affiche tous les comptes sur la page admin 
// on parcourt les comptes
	for ($i = 0; $i < count($donneesdescomptes); $i++){
		echo "<div id='compteutilisateur'>";
		$comptecourant = $donneesdescomptes[$i];
		// on appelle la fonction d'affichage
		print_donnescompte($comptecourant);
		// on met un formulaire pour pouvoir supprimer un compte
		// champ hidden qui contient l'id : on s'en sert pour supprimer
		echo "<form method='post' action='index.php?page=pageadmin'>";
		echo  "<input id='idasuppr' name='idasupprcompte' type='hidden' value= ". $comptecourant['idcompte'] . ">" ;
		echo "<input type='submit' name='asupprimercompte' id='action' value='Supprimer'/>";

		echo "</div>";
	}
}



function affichetouscomptesadmin ($donneesdescomptes) {
// Affiche tous les comptes qui ne sont pas des administrateurs
	// on parcourt les comptes
	for ($i = 0; $i < count($donneesdescomptes); $i++){
		
		$comptecourant = $donneesdescomptes[$i];
		// si le compte n'est pas admin
		// on affiche seulement si il n'est pas admin
		if (testif_admin($comptecourant['idcompte'])==False) {
		echo "<div id='compteutilisateur'>";
					print_donnescompte($comptecourant);
		
		// on met un formulaire pour pouvoir supprimer un compte
		// champ hidden qui contient l'id : on s'en sert pour supprimer
					
		echo "<form method='post' action='index.php?page=pageadmin'>";
		echo  "<input id='idajout' name='idajout' type='hidden' value= ". $comptecourant['idcompte'] . ">" ;
		echo "<input type='submit' name='ajouteradmin' id='action' value='Ajouter à ladministration'/> </form>" . "</p>";
		echo "</div>";
		}

		
	}
}


// fonction formulaire changement de mot de passe

function print_form_mdp() {
	//Affiche le formulaire pour changer de mot de passe

	?>
	<div id="formulairemdp">
	<form method="post" action="index.php?page=moncompte">

		<p>
			<input type = "password" placeholder="Votre ancien mot de passe" name ="oldmdp" id="ajout"></p>

			<p>
			<input type = "password" placeholder="Votre nouveau mot de passe"  name ="newmdp" id="ajout"></p>

		<p><input type="submit" name="changementmdp" id="action" value="Changer"/></p>
				</form>
</div>
				<?php	 
			}



?>


