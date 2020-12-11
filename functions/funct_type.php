<?php
	
	function affiche_typeProjet($typeProjets){
		echo '<div class="typeProjets">';
		echo '<select name="form_typeProjets">';
		foreach ($typeProjets as $key => $value) {
			echo '<option value="' . $value['type'] .'"">' . $value['type'] . '</option>';
		}
		echo "</select>";
		echo "</div>";

	}	

	function form_newTypeProjet(){
		?>
		<div class="form_newTypeProjet">
			<form name="newTypeProjet" action="index.php?page=projets" method="POST" enctype="multipart/form-data"></br>

			    <label>Nouveau Type</label>
			    <input type="newType" name="newType">

			    <input type="submit" name="Envoyer_Type">
			</form>
		</div>
		<?php
	}