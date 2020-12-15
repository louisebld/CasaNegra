<?php
	function affiche_distrib($distrib)
	{
		?>
		<div class="distributeurs">
			<h2>Voici la liste de nos distributeurs/fournisseurs :</h2>
			<ul>
			<?php
			foreach ($distrib as $key => $value) {
				echo '<li><a target="_blank" style="color:black;"href="' . $value["link"] . '">' . $value["name"] . "</a></li>";
			}
			echo "</ul>";
		echo "</div>";
	}

	function form_ajouterDistrib(){
		?>
		<div class="distributeurForm">
			<h2>Ajouter un distributeur :</h2>
			<form method="post" class="formCommentaire" action="index.php?page=presentation">

			<p>
				<label class="nameDistrib" name="nameDistrib">Nom du distributeur à ajouter</label>
				<input type="text" name="name">
			</p>

			<p>
				<label class="linkDistrib" name="linkDistrib">lien du site du distributeur à ajouter</label>
				<input type="text" name="link">
			</p>

			<p><input type="submit" name="ajouterDistrib" id="ajouterDistrib" value="Ajouter"/></p>
			</form>
		</div>
		<?php
	}


	function form_suppDistrib($distrib){
		// BUT : form_suppDistrib : affiche un formulaire qui permet de supprimer un distributeur

		// $distrib : liste contenant les types des projets, récupérés depuis la bdd typeprojet

		?>
		<div class="distrib">
			<form method="post" class="delcom" action="index.php?page=presentation">
			<select name="suppDistrib">
			<?php
			//Affichage de tous les types dans une liste déroulantes
			foreach ($distrib as $key => $value) {
				echo '<option value="' . $value['name'] .'"">' . $value['name'] . '</option>';
			}
			?>
			</select>
			<input type="submit" name="deldistrib" value="Supprimer">
			</form>
		</div>
		<?php
	}	
	