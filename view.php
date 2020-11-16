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

			<!-- Pour la connexion -->

			<?php

// Vérification si la variable existe et que l'utilisateur est connecté
			if (isset($_SESSION['connected']) && $_SESSION['connected']) {
				echo "<div id='moncompte'>";
				echo "<a href='index.php?page=moncompte'>" . "Mon compte" . "</a>";
				echo "</div>";

				echo "<div id='deconnexion'>";
				echo "<a href='index.php?page=deconnexion'>" . "Déconnexion" . "</a>";
				echo "</div>";

				echo "<div id='monnom'>";
				printnom($_SESSION['comptedonnee']);
				echo "</div>";

			}

		


			else { ?>
				<div id="inscription">
					<a href="index.php?page=inscription"> Inscription </a>
				</div>

				<div id="connexion">
					<a href="index.php?page=connexion"> Connexion </a>
				</div>

			<?php } ?>

			<!-- Pour l'entête -->
			<?php
			include ("pages/entete.php");

			?>

		</header>
	</main>

	<?php
		//Inclusion de la page selon la valeur de $page
	if ($page == "accueil"){
		include ("pages/accueil.php");
		include("pages/diapo.php");

	}

	elseif ($page == "presentation"){
		include ("pages/presentation.php");
	}

	elseif ($page == "inscription") {
		include ("pages/inscription.php");

	}

	elseif ($page == "connexion") {
		include ("pages/connexion.php");

	}


	elseif ($page == "avis") {
		include ("pages/avis.php");

	}

	elseif ($page == "prendrerdv") {
		include ("pages/rdv.php");

	}

	elseif ($page == "contact") {
		include ("pages/contact.php");

	}

	elseif ($page == "moncompte") {

		if (isset($_SESSION["connected"])) {
			include ("pages/moncompte.php");

		}
		else {
			header('location:index.php');
			// window.open(page,"Vous devez être connecté","menubar=no, status=no, scrollbars=yes,  width=500, height=300");

		}

		

	}

// si déconnexion : redirection vers l'accueil et suppression des variables de session ? suppression ou unset
	elseif ($page == "deconnexion") {
		header('location:.');
		session_destroy();

	}




	?>

	<!-- Pour le footer -->
	<?php
	include("pages/footer.php");
	?>



</body>
</html>
