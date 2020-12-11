<?php
	$res = charge_projet($c);

	if (isset($_POST['form_typeProjets']) && $_POST['form_typeProjets'] != "allProjets"){
		//Si on precise un type spéciale
		$res = charge_projetType($_POST['form_typeProjets']);

	} elseif (isset($_POST['form_typeProjets']) && $_POST['form_typeProjets'] = "allProjets") {
		$res = charge_projet($c);
	}
?>