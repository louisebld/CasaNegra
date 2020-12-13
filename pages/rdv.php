<section class="rdv">
	<h2>Prendre rendez vous avec nous:</h2>

	<?php 
	if (isset($_SESSION['connected'])){

		echo "<h2>Ajouter un RDV</h2>";
		print_form_rdv($_SESSION['idcompte']);
		
		
		if (testif_admin($_SESSION['idcompte'])){
			affiche_rdv(charge_rdv_admin());

		}
	}

	else {
// on informe qu'il doit être connecté pour aller sur cette page
// redirection vers connexion du coup
		echo '<script>alert("Vous devez être connecté pour accéder à cette page");
		window.location.href = "./index.php?page=connexion";</script>'; 
		exit();
	}

	
	?>

</section>