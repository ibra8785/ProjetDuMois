<?php 

	require 'database.php';

	$titreError = $descriptionError = $categorieError = $ficError = $titre = $description = $categorie = $fic = "";

	if(!empty($_POST))
	{
		$titre = $_POST['titre'];
		$description = $_POST['description'];
		$categorie = $_POST['categorie'];
		$fic = ($_FILES["fic"]['name']);
		$ficPath = '../images/' . basename($fic);
		$ficExtension = pathinfo($ficPath, PATHINFO_EXTENSION);
		$isSuccess = true;
		$isUploadedSuccess = false;

		if(empty($titre))
		{
			$titreError = "Remplissez ce champ svp !";
			$isSuccess = false;
		}
		if(empty($description))
		{
			$descriptionError = "Remplissez ce champ svp !";
			$isSuccess = false;
		}
	/*	if(empty($categorie))
		{
			$categorieError = "Remplissez ce champ svp !";
			$isSuccess = false;
		}*/
		if(empty($fic))
		{
			$ficError = "Remplissez ce champ svp !";
			$isSuccess = false;
		}
		else
		{
			$isUploadedSuccess = true;
			if($ficExtension != "jpg" && $ficExtension != "png" && $ficExtension != "jpeg" && $ficExtension != "gif")
			{
				$ficError = "Les fichiers autorisés sont: .jpg, .png, .jpeg, gif";
				$isUploadedSuccess = false;
			}
		/*	if(file_exists($ficPath))
			{
				$ficError = "Le fichier existe deja";
				$isUploadedSuccess = false;
			}*/
			if($_FILES['fic']["size"] > 500000)
			{
				$ficError = "Le fichier ne doit pas depassé 500Kb";
				$isUploadedSuccess = false;
			}
			if($isUploadedSuccess)
			{
				if(!move_uploaded_file($_FILES['fic']['tmp_name'], $ficPath))
				{
					$ficError = "il y'a eu uner erreur lors de l'uploaded";
					$isUploadedSuccess = false;
				}
			}
		}
		if($isSuccess && $isUploadedSuccess)
		{
			$statement = $connexion->prepare("INSERT INTO articles(titre,description,fic,categorie) VALUES(?, ?, ?, ?)");
			$a=$statement->execute(array($titre,$description,$fic,$categorie));
			header("Location: index.php");
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" type="text/css" href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

	<h1>BIENVENU SUR IBRASPORT</h1>
<div class="container admin">
	<div class="row">
	<div class="col-sm-6">
		
	<h1><strong>Modifier un article</strong></h1>
			<br>

			<form class="form" action="<?php echo 'update.php?id=' . $id;?>" role="form" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Titre:</label>
					<input type="text" class="form-control" id="name" name="titre" value="<?php echo $titre; ?>">
				<span class="help-inline"><?php echo $titreError; ?></span>
				</div>
				<div class="form-group">
				<label for="description">Descrption:</label>
					<input type="text" class="form-control" id="descrption" name="description" value="<?php echo $description; ?>">
				<span class="help-inline"><?php echo $descriptionError; ?></span>
					
				</div>
				<div class="form-group">
				<label for="sport">Sport:</label>
					<select class="form-control" id="categorie" name="categorie">
						
						<?php

						foreach($connexion->query('SELECT * FROM categorie') as $row)
							{
								if($row['id']== $category)
								echo '<option selected="selected" value="'. $row['id'] . '">' .$row['nom'] . '</option>';
								else
								echo '<option value="'. $row['id'] . '">' .$row['nom'] . '</option>';
							}
						

						?>

					</select>
				<span class="help-inline"><?php echo $categorieError; ?></span>
				</div>
				<div class="form-group">
				<label>Image</label>
				<p><?php echo $fic ; ?></p>
					<label for="fic">Selectionner une Image:</label>
					<input type="file" name="fic" id="fic">
					<span class="help-inline"> <?php echo $ficError;?></span>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-success" >Modifier</button>
					<a class="btn btn-primary" href="index.php">Retour</a>
			</div>
			</form>

	</div>
		
			<br>
			

	</div>
	
		
</div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>
</body>
</html>