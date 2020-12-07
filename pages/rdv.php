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
				
?>

</section>