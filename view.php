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

// si il est connecté on affiche moncompte, déconnexion et son nom
				echo "<div id='moncompte'>";
				echo "<a href='index.php?page=moncompte'>" . "Mon compte" . "</a>";
				echo "</div>";

				echo "<div id='deconnexion'>";
				echo "<a href='index.php?page=deconnexion'>" . "Déconnexion" . "</a>";
				echo "</div>";


				echo "<div id='monnom'>";
				printnom($_SESSION['comptedonnee']);
				echo "</div>";

// en plus de ça, si il est admin on va afficher les membres inscrits sur le site
				if (testif_admin($_SESSION['idcompte'])) {
					echo "<div id='pageadmin'>";
					echo "<a href='index.php?page=pageadmin'>" . "Admin" . "</a>";
					echo "</div>";
					
				}

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

	elseif ($page == "projets"){
		include ("pages.catalogue.php");
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
		include ("pages/moncompte.php");

	}

	elseif ($page == "pageadmin") {

// si c'est un admin on include
		if (testif_admin($_SESSION['idcompte'])) {
				include ("pages/pageadmin.php");

				}
// sinon on redirige
		else {
			header('location:index.php');

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
