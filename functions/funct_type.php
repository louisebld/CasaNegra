<?php
	
	function affiche_typeProjet($typeProjets){
		// BUT : affiche_typeProjet : affiche tous les types de projets depuis notre variable en paramaetres $typeProjets

		// $typeProjets : liste contenant les types des projets, récupérés depuis la bdd typeprojet

		// echo '<div class="typeProjets">';
		echo '<select name="form_typeProjets">';
		//Affichage de tous les types dans une liste déroulantes
		foreach ($typeProjets as $key => $value) {
			echo '<option value="' . $value['type'] .'"">' . $value['type'] . '</option>';
		}
		echo "</select>";
		// echo "</div>";

	}	

	function form_newTypeProjet(){
		// BUT : form_newTypeProjet : affiche le formulaire permettant d'ajouter un nouveau projet 

		?>
		<div class="form_newTypeProjet">
			<form name="newTypeProjet" action="index.php?page=projets" method="POST" enctype="multipart/form-data" onsubmit='javascript: return remplitypeprojet();'></br>

			    <label>Nouveau Type</label>
			    <input type="newType" id="newType" name="newType">

			    <input type="submit" name="Envoyer_Type">
			</form>
		</div>
		<?php
	}