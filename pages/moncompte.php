<h2> Mon compte </h2>

<?php
// je mets ces données dans une variables
if (isset($_SESSION['connected'])) {
	
// je print les données
	print_donnescompte($_SESSION['comptedonnee']);
}




?>