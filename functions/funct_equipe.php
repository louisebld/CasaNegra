<?php


function print_equipe($equipe){
	//Print toute l'equipe contenue dans la base de donnée
	echo '<div class="equipe">';
	foreach ($equipe as $key => $value) {
		echo '<div class="membre_equipe">';
		echo "<h2>" . $value["name"];
		echo " " . $value["fname"] . "</h2>";
		echo "<p>" . $value["age"] . "ans, " . $value["metier"] . "</p>" ;
		echo "numéro de téléphone: " . $value["tel"];
		echo "<p>" . $value["descrip"] . "</p>";

		echo "</div>";
	}
	echo "</div>"; 
}


function print_equipeadmin($equipe){
// fonction qui affiche les membres de l'équipe
// on ajoute un champ vide qui contient l'id pour pouvoir le supprimer
echo '<div class="equipeadmin">';
	foreach ($equipe as $key => $value) {
		echo '<div class="membre_equipeadmin">';
		echo "<p>" . $value["name"];
		echo " " . $value["fname"] . "</p>";

		echo "<form method='post' action='index.php?page=pageadmin'>";
		echo  "<input id='idasuppr' name='idasuppr' type='hidden' value= ". $value['id'] . ">" ;
		echo "<input type='submit' name='asupprimer' id='action' value='Supprimer'/> </form>";

		echo "</div>";
	}
	echo "</div>"; 
}


function listeoptionmembre(){
	global $listemembres; // le pb vient de la ????
	?>		
	<form name="affiche_projetequipe" action="index.php?page=projets" method="POST">
	    			<!-- <select name="form_typeProjets"> -->
	    			<!-- <option value="allProjets">Tous</option> -->
	    			<input type='radio' id='equipe' name='projetequipe' value="allProjets" checked >
	    			<label for='fname'>Tous</label>
	    <?php
	foreach ($listemembres as $key => $value) {
  					echo "<input type='radio' id='equipe' name='projetequipe' value=" . "'" . $value['fname'] . "'" . ">";
					echo "<label for='fname'>" . $value['fname'] . "</label>";
					} ?>
		    <input type="submit" name="Submit" value="Chercher">
	    	</form>
<?php	
}



?>