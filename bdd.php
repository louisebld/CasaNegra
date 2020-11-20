<?php
//COnnexion à notre base de donnée

$c = mysqli_connect("localhost", "root", "", "casanegra");
mysqli_set_charset($c, "utf8");




/*
Table compte :
	idcompte : int auto ingrement
	nom : varchar 100
	prénom : varchar 100
	mail : text
	motedepasse : varchar 20 valeur par défaut null ?

d'autres trucs à rajouter par la suite...


Table projets
	id: int AI
	nomprojet: varvhar(50)
	date_creation: date
	autor: text (a changer)
	description: text


Fichier fonction table equipe
table equipe:
	id: int
	name: varchar(20)
	fname: varchar(20)
	age: int
	id_metier: int
	description: text
	tel: varchar(10)


Fichier fonction table metier associé a equipe en qlq sorte
table metier:
	id: int
	metier: varchar(50)

*/
