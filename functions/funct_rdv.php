<?php


function affiche_rdv($rdv){
	//afficher les rdv 
	echo'<div class="listerdv">';
	echo'<h2> Vos rendez vous : </h2>';
	foreach ($rdv as $key => $value) {

			echo'<div class="rdvbox">';
			echo'<p> Le : ' . changedate($value["daterdv"]) . "</p>"; // voir pour retravailler le format de la date 
			echo'<p> A : ' . $value["heurerdv"] . "</p> </div>";
			echo'<p> RDV avec : ' . recupmemebrenom($value["idmembre"]) . "</p>";
			echo'</div>';

			
		}
		echo"</div>";

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
				?>
		<label> Rendez-vous avec : </label>
		<?php
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
	<select name="equipe">
		<?php

	for ($i = 0; $i < count($listemembres); $i++){
	$membrecourant = $listemembres[$i];
	echo "<option>" . $membrecourant['fname'] . "</option>" ; // equipe ???
}
?>
</select>

<?php


}

?>