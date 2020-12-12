<?php

/*function affiche_diapo(){ 
	?>
	<div class="cadre-diapo">
<?php
for ($i = 1; $i <= 11; $i++){
	echo"<img class='diapo' src='images/diapo" . $i .".jpg' alt>";
}
?>
<button class="precedent" aria-label="précédent" onclick="boutons(-1)">❮</button>
<button class="suivant" aria-label="suivant" onclick="boutons(1)">❯</button>
</div>

<script type="text/javascript" src="js/diapo.js"></script>
<?php
}*/

function affiche_diapo(){ 
	// BUT : affiche_diapo : Affiche les diapositives de chaque image des projets

	global $c;

	?>

	<div class="cadre-diapo">
	<?php
	for ($i = 1; $i <= charge_nbphotos($c); $i++){

		echo'<div class="compGen" id="diapo' . $i . '"/><a href="index.php?page=projets#diapo' . $i . '.jpg"><img class="diapo_img" src="projets/diapo' . $i .'.jpg"></a></div>';

	}


	?>
	<div class="suivant" id="leftArrow"><h1>❯</h1></div>
	<!-- Bouton droit -->

	<div class="precedent" id="rightArrow"><h1>❮</h1></div>
	<!-- bouton gauche -->

	</div>

	<script type="text/javascript" src="js/diapo.js" ></script>
	<!-- script concernant le diapo, permet de faire defiler les images -->

<?php

}

?>