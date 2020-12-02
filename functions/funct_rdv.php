<?php

function affiche_rdv($rdv){
	//afficher les rdv 
	foreach ($rdv as $key => $value) {

			echo'<div class="rdvbox">';
			echo'<p> idclient : ' . $value["idclient"] . "</p>";
			echo'<p> idmembre : ' . $value["idmembre"] . "</p>";
			echo'<p> date : ' . $value["date"] . "</p>";
			echo'<p> heure : ' . $value["heure"] . "</p> </div>";

			
		}

	}



function print_form_rdv($idclient){
	//Fonction qui permet d'afficher le formulaire qui ajoute un rdv
	//Obligation d'etre connecté, sinon redirection
	?>

	<form method="post" action="index.php?page=prendrerdv">

		<label> Date </label>
		<input type="date" name="date">

		<label>Heure</label>
		<input type="time" name="heure">

		<p>
			<?php	
				echo  '<input id="idclient" name="idclient" type="hidden" value= '. $idclient . ">" ;

				listederoulemembres();
			?>
		</p>

		<p><input type="submit" name="envoyer_rdv" id="envoyer_rdv" value="Enregistrer"/></p>
	</form>

		<?php	 
	}

// a revoir : ne fonctionne pas 
function listederoulemembres(){
	global $listemembres; // le pb vient de la ????
	?>
	<select name="equipe" size="1">
		<?php

	for ($i = 0; $i < count($listemembres); $i++){
	$membrecourant = $listemembres[$i];

	echo "<option>" . $metiercourant['equipe']; // equipe ???
}
?>
</select>

<?php


}

?>