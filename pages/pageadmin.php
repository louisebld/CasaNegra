
<center>
<div id="choixadmin">

<ul id="listechoixadmin">
<li><a href="index.php?page=pageadmin#affichemembre"> Voir les membres inscrits/en supprimer </a></li>
<li><a href="index.php?page=pageadmin#membreequipe"> Voir les membre de l'équipe/en supprimer </a></li>
<li><a href="index.php?page=pageadmin#ajoutmembreequipe"> Ajouter un membre à l'équipe </a></li>
</ul>

<ul id="listechoixadmin">
<li><a href="index.php?page=pageadmin#ajoutermetier"> Ajouter un métier </a></li> 
<li><a href="index.php?page=pageadmin#supprimermetier"> Supprimer un métier </a></li>
</ul>

<ul id="listechoixadmin">
<li><a href="index.php?page=pageadmin#listeadmin"> Voir la liste des administrateurs/en supprimer </a></li>
<li><a href="index.php?page=pageadmin#ajouteradmin"> Ajouter un membre à l'administration </a></li>
</ul>

<ul id="listechoixadmin">
<li><a href="index.php?page=pageadmin#contactadmin"> Voir vos messages </a></li>
<li><a href="index.php?page=pageadmin#mescompteurs"> Voir les statistiques </a></li>
</ul>
</div>
</center>








<div id="premiererangee">
<div id="affichemembre">
<h2> Liste des membres inscrits </h2>

	<?php
	affichetouscomptes($donneescomptes);
	?>
</div>


<div id="membreequipe">

<h2> Les membres de l'équipe </h2>

<?php


print_equipeadmin($equipe);

?>
</div>

<div id="ajoutmembreequipe">

<h2> Ajouter un membre dans l'équipe </h2>

<?php


print_formulairenouveauequipe();
?>

<?php
if (isset($_SESSION['fauteequipe'])) {
			echo "<ul>";
			foreach($_SESSION["fauteequipe"] as $faute)
				echo "<li>$faute</li>";
			echo "</ul>";

}
?>

<!-- <script>
var meserreurs = <?php //echo json_encode($_SESSION['fauteequipe']) ?>;
array1.forEach(element => console.log(element));



</script> -->

</div>
</div>

<div id="metier">

<div id="ajoutermetier">
<h2> Ajouter un métier </h2>
<?php

printformulairemetier();

if (isset($_SESSION['fautemetier'])) {

	foreach($_SESSION["fautemetier"] as $faute)
		echo $faute;
}

?>
</div>

<div id="supprimermetier">

<h2> Supprimer un métier </h2>

<?php
print_formulairesupprmetier();


if (isset($_SESSION['metierutilise'])) {

	echo $_SESSION['metierutilise'];
}

?>
</div>
</div>
<div id="admin">


<div id="listeadmin">
<h2> Liste des admins </h2>
<?php
print_listeadmin($listeadmin);
?>

</div>

<div id="ajouteradmin">
<h2> Ajouter un membre à l'administration </h2>

<?php
affichetouscomptesadmin ($donneescomptes);
// On affiche à la fois le nom + l'email car deux emails différentes peuvent avoir les mêmes nom et aussi c'est plus simple :)

?>
</div>

</div>



<div id='contactadmin'> 
<h2>Vos messages non traités :</h2>

<?php

print_contact_notok($contactatraiter);
?>



<h2> Anciens messages (traité) </h2>

<?php

print_contact_ok($contactok);
?>
</div>

<div id='mescompteurs'>
"<div id='compteur'>
<h2> Nombre d'utilisateurs inscrits </h2>
<?php
printcompteur($compteurcompte);

?>
</div>
<div id='compteur'>
<h2> Nombre de projets réalisés </h2>
<?php

printcompteur($compteurprojet);

?>
</div>
</div>
