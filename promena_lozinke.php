<?php
	session_start();
	if(!isset($_SESSION['korisnik_id'])){
		header('Location: index.php');
		die();
	}

	if(!isset($_SESSION['korisnik_admin_id'])) {
		header('Location: index.php');
		die();
	}
?>



<!DOCTYPE html>
<html>
<head>

	<title>Promena lozinke</title>
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
	<h2 class="text-center text-uppercase bg-info text-white font-weight-bold">Promena lozinke</h2>
	<div class="btn-group float-right">
			<a class="btn btn-success text-uppercase mr-2" href="index.php">Prijavi se</a>
			<a class="btn btn-success text-uppercase mr-2" href="registracija.php">Registruj se</a>
	</div>
</div>

<br><br>

<div class="container">
	<form class="border border-3 p-3" action="logika/promeni_lozinku.php" method="post">
	<input class="form-control" type="password" name="nova_lozinka" placeholder="Unesite novu lozinku"><br>
	<input class="form-control" type="password" name="nova_lozinka_ponovljena" placeholder="Unesite ponovo novu lozinku"><br>
	<input class="form-control btn btn-primary font-weight-bold text-uppercase" type="submit" value="Promeni lozinku">
</form>

<?php if(isset($_GET['lozinka'])): ?>
	<p id="error">Nove lozinke se ne podudaraju</p>
<?php endif ?>

</div>

</body>
</html>