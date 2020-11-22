<?php


function print_formulairenouveauequipe() {
	//Affiche le formulaire pour ajouter un nouveau membre

	?>
	<div id="formulairequipe">
		<form method="post" action="index.php?page=pageadmin">

			<p>
				<input type = "text" placeholder="Nom" name ="nom" id="ajout" value="<?php if (isset($_SESSION['donnee']['nom'])) 
																echo $_SESSION['donnee']['nom']; ?>" ></p>
			<p>
				<input type = "text" placeholder="Prénom" name ="prénom" id="ajout" value="<?php if (isset($_SESSION['donnee']['prénom'])) 
																echo $_SESSION['donnee']['prénom']; ?>" ></p>

			<p>
				<input type = "text" placeholder="Age" name ="age" id="ajout" value="<?php if (isset($_SESSION['donnee']['age'])) 
																echo $_SESSION['donnee']['age']; ?>" ></p>

			<?php
			listederoulmetier ();
			?>

			<p>
				<textarea id="com" placeholder="Description" name="description" rows="10" cols="35" value="<?php if (isset($_SESSION['donnee']['description'])) 
																echo $_SESSION['donnee']['description']; ?>"></textarea>
			</p>
<!-- la description reste pas -->
			
			<p>
				<input type = "text" placeholder="Téléphone" name ="tel" id="ajout" value="<?php if (isset($_SESSION['donnee']['tel'])) 
														echo $_SESSION['donnee']['tel']; ?>" ></p>

				<p><input type="submit" name="envoiequipe" id="action" value="Ajouter"/></p>
			</form>
		</div>
		<?php	 
	}

function listederoulmetier () {
	global $listemetier;
?>
	<select name="metier" size="1">
<?php


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

?>
<div id="formulaireajoutmetier">
	<form method="post" action="index.php?page=pageadmin">
		<p><input type = "text" placeholder="Métier" name ="metier" id="ajout" ></p>
		<p><input type="submit" name="envoiemetier" id="action" value="Ajouter"/></p>
	</form>
</div>

<?php
}

function print_formulairesupprmetier() {
	//Affiche le formulaire pour ajouter un nouveau membre

	?>
	<div id="formulairesupprmetier">
		<form method="post" action="index.php?page=pageadmin">

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
	//Print toute l'avis contenue dans la base de donnée
	echo '<div class="listeadmin">';
	foreach ($listeadmin as $key => $value) {
// pour ne pas qu'on puisse se supprimer soit même : mettre des conditions
		if (isset($_SESSION['connected'])) {
// si ce n'est pas son compte qui est connecté 
			if ($value['idcompte']!=$_SESSION['idcompte']) {

				echo "<p>" . $value["prénom"] . " ";
				echo $value["nom"] . " ";
				echo $value["mail"] . "</p> ";
				echo "<form method='post' action='index.php?page=pageadmin'>";
				echo  "<input id='idadminsuppr' name='idadminsuppr' type='hidden' value= ". $value['idcompte'] . ">" ;
				echo "<input type='submit' name='deladmin' id='action' value='Supprimer'/>" . "</p>";

			}


		}

		
	}
	echo "</div>"; 
}




?>