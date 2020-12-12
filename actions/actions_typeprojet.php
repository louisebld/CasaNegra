<?php
	//----------------Partie concernant l'affichage des projets -----------------

	$res = charge_projet($c);
	$titreProjets = "toutes nos réalisations";
	if (isset($_POST['form_typeProjets']) && $_POST['form_typeProjets'] != "allProjets"){
		//Si on precise un type spéciale
		$res = charge_projetType($_POST['form_typeProjets']);
		$titreProjets = $_POST['form_typeProjets'];

	} elseif (isset($_POST['form_typeProjets']) && $_POST['form_typeProjets'] = "allProjets") {
		$res = charge_projet($c);
		$titreProjets = "toutes nos réalisations";
	}


	//----------------- Partie concerannt l'insertion d'un nouveau type de projet ----------------------------

	if (isset($_POST['newType']) && !empty($_POST['newType']) && trim($_POST['newType'])){
	// verif à faire : si il y est pas déjà
		$newType = $_POST['newType'];
		insert_typeProjet($newType);
		header('Location: index.php?page=projets');	

	}

// peut-être suppression de type
// on peut insérer un projet vide : verif
// supprimer un projet
// ------------------------------ AFFICHAGE PROJET EQUIPE ---------------------------------------




	if (isset($_POST['projetequipe']) && $_POST['projetequipe'] != "allProjets"){
		//Si on precise un type spéciale
		$res = charge_projetPersonne($_POST['projetequipe']);
		$titreProjets = $_POST['projetequipe'];

	} elseif (isset($_POST['projetequipe']) && $_POST['projetequipe'] = "allProjets") {
		$res = charge_projet($c);
		$titreProjets = "toutes nos réalisations";
	}



?>