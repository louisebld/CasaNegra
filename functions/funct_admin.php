<?php


function print_formulairenouveauequipe() {
	//Affiche le formulaire pour ajouter un nouveau membre dans l'équipe

	?>
	<div id="formulairequipe">
		<form method="post" action="index.php?page=pageadmin"
		onsubmit='javascript: return remplimembre();'>
<!-- On appelle la fonction javascript pour vérifier si le formulaire est rempli -->
<!-- On affiche une valeur dans le formulaire si il y a des erreurs c-à-d on garde les données -->
			<p>
				<input type = "text" placeholder="Nom" name ="nom" id="nom" value="<?php if (isset($_SESSION['donnee']['nom'])) 
																echo $_SESSION['donnee']['nom']; ?>" ></p>
			<p>
				<input type = "text" placeholder="Prénom" name ="prénom" id="prenom" value="<?php if (isset($_SESSION['donnee']['prénom'])) 
																echo $_SESSION['donnee']['prénom']; ?>" ></p>

			<p>
				<input type = "text" placeholder="Age" name ="age" id="age" value="<?php if (isset($_SESSION['donnee']['age'])) 
																echo $_SESSION['donnee']['age']; ?>" ></p>

			<?php
// appel fonction liste déroulante des métiers
			listederoulmetier ();
			?>

			<p>
				<textarea id="description" placeholder="Description" name="description" rows="10" cols="35" value="<?php if (isset($_SESSION['donnee']['description'])) 
																echo $_SESSION['donnee']['description']; ?>"></textarea>
			</p>
<!-- la description reste pas -->
			
			<p>
				<input type = "text" placeholder="Téléphone" name ="tel" id="tel" value="<?php if (isset($_SESSION['donnee']['tel'])) 
														echo $_SESSION['donnee']['tel']; ?>" ></p>

				<p><input type="submit" name="envoiequipe" id="action" value="Ajouter"/></p>
			</form>
		</div>
		<?php	 
	}

function listederoulmetier () {
// Afficher une liste déroulante des métiers
	global $listemetier;
// on prend la variable dans lequel sont stockées les données des métiers
?>
	<select name="metier" size="1">
<?php
// pour chacun des métiers on le met dans une "case"

for ($i = 0; $i < count($listemetier); $i++){
	$metiercourant = $listemetier[$i];

	echo "<option>" . $metiercourant['metier'];
}
?>
</select>

<?php
}


// Formulaire pour ajouter un métier

function printformulairemetier() {
// Afficher le formulaire d'ajout d'un métier
?>
<div id="formulaireajoutmetier">
	<form method="post" action="index.php?page=pageadmin"
	onsubmit='javascript: return remplimetier();'>
<!-- Appel de la fonction javascript voir si le formulaire est vide -->

		<p><input type = "text" id="newmetier" placeholder="Métier" name ="metier"></p>
		<p><input type="submit" name="envoiemetier" id="action" value="Ajouter"/></p>
	</form>
</div>

<?php
}

function print_formulairesupprmetier() {
	//Affiche le formulaire pour supprimer un métier

	?>
	<div id="formulairesupprmetier">
		<form method="post" action="index.php?page=pageadmin">
<!-- On appelle la fonction pour la liste déroulante des métiers pour le choix pour supprimer un métier -->
			<?php
			listederoulmetier ();
			?>

				<p><input type="submit" name="envoiesupprmetier" id="action" value="Supprimer"/></p>
			</form>
		</div>
		<?php	 
	}


// pour afficher la liste des admins

function print_listeadmin($listeadmin){
	// Affiche la liste des admins à partir de la variable qui stocke
	echo '<div class="listeadmin">';
// pour chaque admin
	foreach ($listeadmin as $key => $value) {
// pour ne pas qu'on puisse se supprimer soit même : mettre des conditions
		// cette condition sert à ne pas avoir d'erreur en utilisant la variable de session
		if (isset($_SESSION['connected'])) {
// sert à afficher seulement les autres admins
// donc si c'est son id on ne l'affiche pas
			if ($value['idcompte']!=$_SESSION['idcompte']) {

				echo "<p>" . $value["prénom"] . " ";
				echo $value["nom"] . " ";
				echo $value["mail"] . "</p> ";
				echo "<form method='post' action='index.php?page=pageadmin'>";
// champ hidden pour récupérer l'id pour supprimer
				echo  "<input id='idadminsuppr' name='idadminsuppr' type='hidden' value= ". $value['idcompte'] . ">" ;
				echo "<input type='submit' name='deladmin' id='action' value='Supprimer'/>" . "</p>";

			}


		}

		
	}
	echo "</div>"; 
}



// pour afficher les compteurs

function printcompteur($compteur) {
// Fonction d'affichage des compteurs
	echo "<p>";
	echo $compteur["COUNT(*)"];
	echo "</p>";
}


// pour changer le format de date dans admin pour les messages et dans rendez-vous
function changedate($date){

	// fonction qui change l'affichage de la date

	setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
	return strftime('%x', strtotime($date));
}




?>