<?php

	require 'database.php';

	if (isset($_GET['id']))
	{
		$id = $_GET['id'];
	}
	//$db = $connexion->query('SELECT articles.id, articles.titre, articles.description, from articles');

	$db = $connexion->prepare("SELECT articles.id, articles.titre, articles.description, articles.fic, categorie.nom AS categorie
		FROM articles LEFT JOIN categorie ON articles.categorie = categorie.id
		WHERE articles.id = ?");
	$a = $db->execute(array($id));
	$item = $db->fetch();


	/*function checkinput($data);
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}*/

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
	<link rel="stylesheet" type="text/css" href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
<header>
		<div id="Ibra">
			<h1>Ibra<span>Sport</span></h1>
		</div>
		<div id="menu">
			<nav>
				<ul>
					<li><a href="../acceuil.html">Acceuil</a></li>
					<li><a href="../football.php">Football</a></li>
					<li><a href="../rugby.php">Rugby</a></li>
					<li><a href="../tennis.php">Tennis</a></li>
					<li><a href="../basket.php">Basketball</a></li>
					<li><a href="#">Connexion</a></li>
				</ul>
			</nav>
		</div>
	</header>

<div class="container admin">
<?php 

		echo '<section class="contenu">';
		echo '<div class="image">';
			echo '<img src="../images/'. $item['fic'] .'" width="80%" height="65%" style=" margin-left: 100px; ">';
		echo '</div>';
		echo '<div class="titre">';
			echo '<h1 style="font-size: 45px; text-align: center;">'. $item['titre'].'</h1>';
		echo '</div class="description">';
			echo '<p style="text-align: center:"> '. $item['description'].'</p>';
		echo '</section>';
?>
	<!-- <div class="row">
	<div class="col-sm-6">
		<h1><strong>Voir un article  </strong></h1>
		<br>

		<form >
			<div class="form-group">
				<label>Titre:</label>
			</div>
			<div class="form-group">
				<label>Description:</label><?php echo' ' .$item['description'].''; ?>
			</div>
			<div class="form-group">
				<label>Sport:</label><?php echo' '. $item['categorie'].''; ?>
			</div>
			<div class="form-group">
				<label>Image:</label><?php echo' '. $item['fic'].''; ?>
			</div>
		</form>
		<div class="form-actions">
			<a class="btn btn-primary" href="index.php">Retour</a>
		</div>

	</div> -->
	<div class="col-sm-6">
		
	</div>
		




<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script type="text/javascript" src="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>
</body>
</html>