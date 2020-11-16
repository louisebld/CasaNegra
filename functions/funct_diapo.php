<?php

function affiche_diapo(){ 
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
}
?>