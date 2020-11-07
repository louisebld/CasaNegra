<?php
//COnnexion à notre base de donnée

$c = mysqli_connect("localhost", "root", "", "casanegra");
mysqli_set_charset($c, "utf8");

/*
Table equipe:
	idsalarie: int
	age: int
	sex: var
	metier: var
*/



/*
Table compte :
	idcompte : int auto ingrement
	nom : varchar 100
	prénom : varchar 100
	mail : text

d'autres trucs à rajouter par la suite...

*/