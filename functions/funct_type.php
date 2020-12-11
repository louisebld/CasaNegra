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

	function form_newTypeProjet($typeProjets){
		?>
		<div class="form_newTypeProjet">
			<form name="newTypeProjet" action="index.php?page=admin" method="POST" enctype="multipart/form-data"></br>

			    <label>Nouveau Type</label>
			    <input type="type" name="type">

			    <input type="submit" name="Envoyer_Type">
			</form>
		</div>
		<?php
	}