
<?php
	
	// ------------------Insertion de projet-----------------------


	$projets = charge_projet($c);
	// Chargement des projets depuis la bdd projet

	$typeProjets = charge_typeProjet($c);
	// Chargement des types des projets, depuis la bdd typeprojet


   if(isset($_FILES['image'])){


		$file_name = $_FILES['image']['name'];
		$file_size =$_FILES['image']['size'];
		$file_tmp =$_FILES['image']['tmp_name'];
		$file_type=$_FILES['image']['type'];
		increment_nbphotos($c);
		$nbphotos = charge_nbphotos($c);




        move_uploaded_file($file_tmp,"./projets/diapo" . $nbphotos . ".jpg");
        // Permet de deplacer le fichier initial dans notre dossier projets
        
        // On recupere les information du projet
        if (!empty($_POST['form_typeProjets']) || (isset($_POST['form_typeProjets']))){
			$type = $_POST['form_typeProjets'];
        }

        if (!empty($_POST['date']) || (isset($_POST['date']))){
			$date_creation = $_POST['date'];

			$autor = $_POST['equipe'];
        }

        if (!empty($_POST['equipe']) || (isset($_POST['equipe']))){
			$autor = $_POST['equipe'];
		}

		if (!empty($_POST['description']) || (isset($_POST['description']))){
			$description = $_POST['description'];
		}

		// On recupere le nom du fichier qui va etre inserer.
		$file_new_name = "diapo" . $nbphotos . ".jpg";

		// On insere le projet
		insert_projet($autor, $description, $file_new_name, $date_creation, $type);
        echo "Success";
        unset($_FILES['image']);
        header("Location: index.php?page=projets");

   }