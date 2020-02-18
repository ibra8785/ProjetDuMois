<?php 

	require 'database.php';

	if(!empty($_GET['id'])) 
	{
		$id = $_GET['id'];
	}

	if(!empty($_POST))
	{
		$id = $_POST['id'];
		$statement = $connexion->prepare('DELETE FROM articles WHERE id = ?');
		$statement->execute(array($id));
		var_dump($a);
		header("Location: index.php");
	}

	/*function checkinput($data)
	{
		$data = trim($data);
		$data =  stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data                                                           
	}*/

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
		<h1><strong>Supprimer un articles</strong></h1>
			<br>

			<form class="form" action="delete.php" role="form" method="POST">
				
			<input type="hidden" name="id" value="<?php echo $id;  ?>">
			<p class="alerte-warning">Etes vous sur de vouloir supprimer.</p>
			<div class="form-actions">
					<button type="submit" class="btn btn-warning" >Oui</button>
					<a class="btn btn-primary" href="index.php">non</a>
			</div>
			</form>
			<br>
			

	</div>
	
		
</div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>
</body>
</html>