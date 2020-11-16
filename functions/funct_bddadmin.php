<?php
/*Table admin:
	//Stock les comptes admins via les id des comptes
	idcompte: int*/



function testif_admin($idcompte){
	//Fonction qui recupere un boolean si l'id est contenu dans la table
	global $c;
	$result=  mysqli_query($c, "SELECT idcompte FROM admin WHERE idcompte=$idcompte");
	$nbcompte=mysqli_num_rows($result);
// si il y a au moins une ligne qui correspond : true
	if ($nbcompte>0){
		return true;
		}
	else {
		return false;
	}
}