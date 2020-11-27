<?php


function insert_contact($id, $tel, $message, $date){
	//fonction qui ajoute un contact
	global $c;

	$sql = "INSERT INTO contact(idcompte, tel, message, ladate) VALUES ($id, '$tel', '$message', '$date')";


	mysqli_query($c, $sql);
}


function charge_contactnotok($c){
	//Fonction recupere le tableau des adresses mail

	//requete
	$sql="SELECT idcontact, idcompte, tel, message, ladate FROM contact WHERE etat = 'atraiter' ";

	$result=  mysqli_query($c, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}
	//var_dump($tableau);
	return $tableau;
}


function charge_contactok($c){
	//Fonction recupere le tableau des adresses mail

	//requete
	$sql="SELECT idcontact, idcompte, tel, message, ladate FROM contact WHERE etat = 'ok' ";

	$result=  mysqli_query($c, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}
	//var_dump($tableau);
	return $tableau;
}



function changestatusok($id) {

	global $c;
	$sql="UPDATE contact SET etat = 'ok' WHERE idcontact= $id";
	mysqli_query($c, $sql);

}

function supprime_contact($id) {

	global $c;
	$sql="DELETE FROM contact WHERE idcontact = $id";
	mysqli_query($c, $sql);


}