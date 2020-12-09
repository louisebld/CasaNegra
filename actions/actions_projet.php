
<?php
	//Partie refaite
	$projets = charge_projet($c);
	


   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      increment_nbphotos($c);
      $nbphotos = charge_nbphotos($c);
      	//if (isset($_POST['date']) && isset($_POST['autor']) && isset($_POST['descrition'])){
	      	//On transporte le fichier dans le dossier image
/*			if(file_exists("../images/dispo12.php")){
				unlink("../images/dispo12.php");
			}*/
			//Place it into your "uploads" folder mow using the move_uploaded_file() function
	        move_uploaded_file($file_tmp,"./projets/diapo" . $nbphotos . ".jpg");

	        

/*	        //On le renome pour pouvoir l'ajouter a notre diapo
			$CheminFichier = "projets/". $file_name;
			$CheminCible = "projets/ ". "diapo" . $nbphotos . "." . get_file_extension($file_name);
				
			if (file_exists($CheminFichier)) {

				if (!rename($CheminFichier, $CheminCible)) {
					echo "Probleme pour renommer le répertoire $foldername en $RequeteRefNum<br />\n";
				}
				else {
					echo "Fichier renommé ! <br />\n";
				}
				
			}
			else {
				echo "Le fichier $CheminFichier n'a pas été trouvé.<br />\n";
			}
			*/
			$date_creation = $_POST['date'];
			$autor = $_POST['autor'];
			$description = $_POST['description'];
			$file_new_name = "diapo" . $nbphotos . ".jpg";

			insert_projet($autor, $description, $file_new_name, $date_creation);
	        echo "Success";
	        unset($_FILES['image']);
	        header("Location: index.php?page=projets");
	    //}
   }