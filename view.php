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

			
		<ul>
			<li><a href="index.php?page=accueil"> Accueil </a>
			</li>
			<!-- Je ne sais pas pourquoi, il veut pas prendre presentation en lien .. -->
			<li><a href="index.php?page=presentation"></a>Presentation</li>
		</ul>
	</main>

	<?php
		//Inclusion de la page selon la valeur de $page
		if ($page == "accueil"){
			include ("pages/accueil.php");
		}

		elseif ($page == "presentation"){
			include ("pages/presentation.php");
		}



	?>

	<footer>

		&copy; CasaNegra 2020

	</footer>

</body>
</html>