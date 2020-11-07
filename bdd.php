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
