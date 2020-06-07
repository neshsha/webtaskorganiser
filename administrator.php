<?php
session_start();
if(!isset($_SESSION['korisnik_admin_id'])) {
	header('Location: ../index.php');
	die();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Administrator</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="container">

	<h2 class="text-center text-uppercase bg-info text-white font-weight-bold">Administratorska stranica</h2>

	
	<div class="row">
		<a class="btn btn-primary text-uppercase mr-2 col" href="administracija/lista.php">Lista korisnika</a>
		<a class="btn btn-primary text-uppercase mr-2 col" href="administracija/aktivnosti.php">Lista aktivnosti</a>
		<a class="btn btn-success text-uppercase mr-2 col" href="logika/odjavi_se.php">Odjavi se</a>
		<a class="btn btn-success text-uppercase mr-2 col" href="promena_lozinke.php">Promeni lozinku</a>
	</div>
	
</div>

<br><br>

</body>
</html>