<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<main>
		<header>
			<h1><?php echo $title ?></h1>
		</header>

		<!-- Pour la connexion -->

		<div id="inscription">
			<a href="index.php?page=inscription"> Inscription </a>
		</div>

		<!-- Pour l'entête -->
		<?php
		include ("pages/entete.php");

		?>

	</main>

	<?php
		//Inclusion de la page selon la valeur de $page
	if ($page == "accueil"){
		include ("pages/accueil.php");
	}

	elseif ($page == "presentation"){
		include ("pages/presentation.php");
	}

	elseif ($page == "inscription") {
		include ("pages/inscription.php");

	}



	?>

	<footer>

		&copy; CasaNegra 2020

	</footer>

</body>
</html>