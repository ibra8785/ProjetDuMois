<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
	<link rel="stylesheet" type="text/css" href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
<h1>BIENVENU SUR IBRASPORT</h1>
<div class="container admin">
	<div class="row">
		<h1><strong>Liste des items  </strong><a href="insert.php" class="btn btn-success btn-lg">Ajouter</a></h1>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Titre</th>
					<th>Description</th>
					<th>Sport</th>
					<th>Action</th>
				</tr>
				<tbody>

				<?php

					require 'database.php';
					$db = $connexion->query('SELECT articles.id, articles.titre, articles.description, categorie.nom AS categorie
											FROM articles LEFT JOIN categorie ON articles.categorie = categorie.id
											ORDER BY articles.id DESC');
					while ($item = $db->fetch())
					{
						echo '<tr>';
							echo '<td>' . $item['titre'] . '</td>';
							echo '<td>' . $item['description'] . '</td>';
							echo '<td>' . $item['categorie'] . '</td>';
							echo'<td width="300">';
								echo'<a class="btn btn-default"a href="view.php?id=' . $item['id'] . '">Voir</a>';
								echo ' ';
								echo '<a class="btn btn-primary" href="update.php?id=' . $item['id'] . '" >Modifier</a>';
								echo ' ';
								echo '<a class="btn btn-danger" href="delete.php?id=' . $item['id'] . '">Supprimer</a>';
							echo '<td>';
						echo '</tr>';
					}


				?>

					<!-- <tr>
						<td>Item1</td>
						<td>Description1</td>
						<td>Categorie1</td>
						<td width="300">
							<a href="view.php?id=1" class="btn btn-default">Voir</a>
							<a href="update.php?id=1" class="btn btn-primary">Modifier</a>
							<a href="delete.php?id=1" class="btn btn-danger">Supprimer</a>
						</td>
					</tr>
					<tr>
						<td>Item2</td>
						<td>Description2</td>
						<td>Categorie2</td>
						<td width="300">
							<a href="view.php?id=2" class="btn btn-default">Voir</a>
							<a href="update.php?id=2" class="btn btn-primary">Modifier</a>
							<a href="delete.php?id=2" class="btn btn-danger">Supprimer</a>
						</td>
					</tr> -->
				</tbody>
			</thead>
		</table>
	</div>
</div>


	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script type="text/javascript" src="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>
</body>
</html>