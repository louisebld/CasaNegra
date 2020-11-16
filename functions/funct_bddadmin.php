<?php
/*Table admin:
	//Stock les comptes admins via les id des comptes
	idcompte: int*/



/*function testif_admin($idcompte){
	//Fonction qui recupere un boolean si l'id est contenu dans la table
	$admin = 'false';

	global $c;
	$sql = "SELECT idcompte FROM admin WHERE idcompte == '".$idcompte."'";
	$result=  mysqli_query($c, $sql);

	if (!empty($result)){
		$result = 'true';
	}

}*/