<!DOCTYPE html>
<html>
<head>
	<title>Football</title>
	<link rel="stylesheet" type="text/css" href="football.css">
	<link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
	<script src="node_modules/jquery/dist/jquery.min.js" ></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
</head>
<body>
	<header>
		<div id="Ibra">
			<h1>Ibra<span>Sport</span></h1>
		</div>
		<div id="menu">
			<nav>
				<ul>
					<li><a href="acceuil.html">Acceuil</a></li>
					<li><a href="football.php">Football</a></li>
					<li><a href="rugby.php">Rugby</a></li>
					<li><a href="tennis.php">Tennis</a></li>
					<li><a href="basket.php">Basketball</a></li>
					<!-- <li><a href="#">Connexion</a></li> -->
				</ul>
			</nav>
		</div>
	</header>
	<section id="actup">
		<div class="first">
			<a href="#"><img src="images/f3.jpg"  alt="Liverpool" height="650px" width="1000px;"></a>
		</div>
		<div class="titre">
			<h1>PREMIER LEAGUE</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	</section>
	<section id="infos">
		

		<?php 

			require 'admin/database.php';
					$db = $connexion->query('SELECT articles.id, articles.titre, articles.description, articles.fic, categorie.nom AS categorie
											FROM articles LEFT JOIN categorie ON articles.categorie = categorie.id WHERE categorie.id = 1
											ORDER BY articles.id DESC');

			WHILE ($item = $db->fetch())
			{
				echo '<div style="width: 250px; height: 270px;">';
					echo '<a href="admin/view.php?id=' . $item['id'] . '"><img src="images/'. $item['fic'] .'"  alt="LDC" height="210px" width="250px;"></a>';
					echo '<h4>' . $item['titre'].' </h4>';
					/*echo '<p>' . $item['description'].'</p>';*/
				echo '</div>';
			}

		 ?>
		<!-- <div>
			<a href="#"><img src="images/f2.jpg"  alt="BARCA" height="190px" width="250px;"></a>
			<h4>XXX</h4>
			<p>Lorem ipsum .</p>
		</div>
		<div>
			<a href="#"><img src="images/f3.jpg"  alt="MERCATO" height="190px" width="250px;"></a>
			<h4>XXX</h4>
			<p>Lorem ipsum .</p>
		</div>
		<div>
			<a href="#"><img src="images/f4.jpg"  alt="HAALAND" height="190px" width="250px"></a>
			<h4>XXX</h4>
			<p>Lorem ipsum .</p>
		</div>
		<div>
			<a href="#"><img src="images/f5.jpg"  alt="EURO" height="190px" width="250px;"></a>
			<h4>XXX</h4>
			<p>Lorem ipsum .</p>
		</div>
		<div>
			<a href="#"><img src="images/h.jpg"  alt="CDM" height="190px" width="250px;"></a>
			<h4>XXX</h4>
			<p>Lorem ipsum .</p>
		</div> -->
	</section>
	<footer id="footer">
			<p>&copy Copyright IbraSport 2020</p>
      <div>
        <p>Rejoignez Nous Sur</p>
        <a href=""><i class="fa fa-facebook"></i></a>
        <a href=""><i class="fa fa-twitter"></i></a>
        <a href=""><i class="fa fa-instagram"></i></a>
      </div>
	</footer>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
</body>
</html>