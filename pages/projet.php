<?php


 print_formulairenouveauprojet();
 
if (isset($_SESSION['faute'])) {
			echo "<ul>";
			foreach($_SESSION["faute"] as $faute)
				echo "<li>$faute</li>";
			echo "</ul>";

}





?>