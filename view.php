<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Casa Negra</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<main>
		<header>

			<?php
			include 'entete.php';
			?>


		</header>

		<ul>
			<li><a href="index.php?page=accueil"> Accueil </a></li>
		</ul>


		<?php



		if (!isset($_GET['page'])) {
			header("location:index.php?page=accueil");

		}


		?>



		<footer>

			&copy; CasaNegra 2020

		</footer>

	</body>
	</html>