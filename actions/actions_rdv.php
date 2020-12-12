<?php

// Données de la bdd équipe
$listemembres = recupmembre ($c);

//-------------------------------------------- verif formulaire rdv  -------------------------------

if (isset($_POST['equipe'])){
	$err=[];

	if (empty($_POST["heure"]) || !trim($_POST['heure'])) {
		$erreurmetier[]="Vous n'avez pas rentré d'heure de rdv";
		}

	elseif (empty($_POST["date"]) || !trim($_POST['date'])) {
		$erreurmetier[]="Vous n'avez pas rentré de date de rdv";
	}

	elseif (count($err)>0){
// stockage dans une variable de session
		$_SESSION["fauterdv"]= $err;

	}

	else{
	unset($_SESSION["fauterdv"]);
	$heure = $_POST['heure'];
	$date = $_POST['date'];
	$idclient = $_POST['idclient'];
	$membre = $_POST['equipe'];
	$idmembre = recupmembreid($membre);

	insert_rdv($heure, $date, $idclient, $idmembre);
	header('location:index.php?page=moncompte');

}
}

?>