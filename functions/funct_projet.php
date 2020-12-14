
<?php


	//Partie refaite
	function get_file_extension($file) {
		// BUT : get_file_extension : permet d'obtenir extension d'un fichier, decoupe le nom d'un fichier a partir d'un point

		// $file : contient le nom d'un fichier

	    return substr(strrchr($file,'.'),1);
	}

	function affiche_image($nomprojet){
		// BUT : affiche_image : Prends en argument un nom d'image, et ressort une balise img avec cette derniere qui permet de l'afficher

		// $nomprojet : contient le nom du projet à inserer

		return $img = '<img src="./projets/' . $nomprojet . '" alt="projets" class="img_projet"/>';

	}

	function filter_number($nomimg){

		$int = (int) filter_var($nomimg, FILTER_SANITIZE_NUMBER_INT); 
	}

	function affiche_projet($projets){
		// BUT : affiche_projet : Affiche les differents projets

		// $projets : tableau de projets

		foreach ($projets as $key => $value) {

			echo '<figure class="projet" id="' . $value['nomprojet'] . '">';

			echo affiche_image($value['nomprojet']);

			echo '<div class="fig_projet"><div class="dateCrea"><h2>Date de création :</h2><p>' . $value['date_creation'] . "</p></div></br>";
			echo '<div class="realProjet"><h2>Realisation :</h2><p>' . $value['autor'] .'</p></div></br>';
			echo '<div class="description"><h2>Description :</h2><p>' . $value['description'] . "</p></div></div>";



			if (isset($_SESSION['connected'])){

				echo '<div class="commentaire">';
				echo "<h2>Ajouter un commentaire :</h2>";
				print_form_avis($value['id']);
				echo "</div>";
			
			}


			$avis = charge_avis($value['id']);
			if (!empty($avis)) {
					echo '<div class="sectionCommentaire">';
					echo "<h2>Commentaire: </h2></br>";	
					print_avis($avis);
					echo "</div>";
			}

						if (isset($_SESSION['connected'])) {
				if (testif_admin($_SESSION['idcompte'])) {
					echo "<form method='post' action='index.php?page=projets'>";
// champ hidden pour récupérer l'id pour supprimer
					echo  "<input id='idprojetsuppr' name='idprojetsuppr' type='hidden' value= ". $value['id'] . ">" ;
					echo  "<input id='nomprojetsuppr' name='nomprojetsuppr' type='hidden' value= ". $value['nomprojet'] . ">" ;

					echo "<input type='submit' name='delprojet' id='boutonsupprprojet' value='Supprimer le projet'/>" . "</p>";
				}	
			}




			echo "</figure>";

			

		}
		
	}

	function print_formulaire(){
		global $c;
		$typeProjets = charge_typeProjet($c);


		?>
			<form action="index.php?page=projets" method="POST" enctype="multipart/form-data"
			onsubmit='javascript: return rempliprojet();'>

			    <label>Date</label>
			    <input type="date" id="date" name="date" value="<?php if (isset($_SESSION['donneesprojet']['date'])) 
																echo $_SESSION['donneesprojet']['date']; ?>"><br/>
			    <label> Auteur : </label>
				<?php
					listederoulemembres();
				?>

		      	<!-- <label>Description</label> -->
		      	<textarea name="description" placeholder="Description" id="description"><?php if (isset($_SESSION['donneesprojet']['description'])) 
																echo $_SESSION['donneesprojet']['description'];?></textarea></br>

		      	<label> Type : </label>
		      	<?php
		      		affiche_typeProjet($typeProjets);
		      	?>
		      	<br/>
		        <input type="file" name="image" accept="image/jpeg"/></br>
				Le fichier doit être un .jpeg
		        <input type="submit" name="projet"/>
      		</form>
		<?php
	}



function print_formulairechoixtype() {
	global $typeProjets;
?>
	    	<form name="affiche_projet" action="index.php?page=projets" method="POST">
	    			<!-- <select name="form_typeProjets"> -->
	    			<!-- <option value="allProjets">Tous</option> -->
	    			<input type='radio' id='equipe' name='form_typeProjets' value="allProjets" checked >
	    			<label for='fname'>Tous</label>

	    			<?php
					foreach ($typeProjets as $key => $value) {
  						echo "<input type='radio' id='equipe' name='form_typeProjets' value=" . "'" . $value['type'] . "'" . ">";
						echo "<label for='fname'>" . $value['type'] . "</label>";

					}

					?>
<!-- echo '<option value="' . $value['type'] . '">' . $value['type'] . '</option>'; -->
					<!-- </select> -->
	    		<input type="submit" name="Submit" value="Chercher">
	    	</form>
<?php

}


function listederoultype() {
// Afficher une liste déroulante des types de projets
	global $typeProjets;
// on prend la variable dans lequel sont stockées les données des types de projets
?>
	<select name="typeprojet" size="1">
<?php
// pour chacun des types de projets on le met dans une "case"

for ($i = 0; $i < count($typeProjets); $i++){
	$typecourant = $typeProjets[$i];

	echo "<option>" . $typecourant['type'];
}
?>
</select>

<?php
}

function print_formulairesupprtypeprojet() {
	//Affiche le formulaire pour supprimer un type projet

	?>
	<div id="formulairesupprtypeprojet">
		<form method="post" action="index.php?page=projets">
<!-- On appelle la fonction pour la liste déroulante des types projets pour le choix pour supprimer un type projets -->
			<?php
			listederoultype ();
			?>

				<p><input type="submit" name="envoiesupprtype" id="action" value="Supprimer"/></p>
			</form>
		</div>
		<?php	 
	}









?>