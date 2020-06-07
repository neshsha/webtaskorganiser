<?php
	session_start();
	if(isset($_SESSION['korisnik_id'])){
		header('Location: korisnik.php');
		die();
	}

	if(isset($_SESSION['korisnik_admin_id'])) {
		header('Location: administrator.php');
		die();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Prijava</title>
	<script src="js/Cookies.js"></script>
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
	<h2 class="text-center text-uppercase bg-info text-white font-weight-bold">Prijava korisnika</h2>
	<div class="btn-group float-right">
			<a class="btn btn-success text-uppercase mr-2" href="registracija.php">Registruj se</a>
	</div>	
</div>
<br><br>

<div class="container">

	<form class="border border-3 p-3" action="logika/prijavi_se.php" method="post">

	<div class="input-group">
		<div class="input-group-prepend">
        <span class="input-group-text bg-primary"><i class="fas fa-user text-white"></i></span>
      </div>
		<input class="form-control" type="text" name="korisnicko_ime" id="korisnicko_ime" placeholder="Unesite korisnicko ime">
	</div>

	<br>

	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text bg-primary"><i class="fas fa-align-justify text-white"></i></span>
			</div>
			<input class="form-control" type="password" name="lozinka" id="password" placeholder="Unesite loznku"><br>
		
	</div>
    <br>
	<div class="custom-control custom-checkbox mb-3">
		<input type="checkbox" class="custom-control-input"  name="zapamti" value="zapamti" id="zapamti">
		<label for="zapamti" class="custom-control-label"><span class="bg-primary p-1 rounded text-white">Zapamti me</span></label>
		 
	</div>
	
	<input class="form-control btn btn-primary font-weight-bold text-uppercase" type="submit" value="Prijavi se">
</form>

<br><br>

<script>
	var username =  Cookies.get('korisnicko_ime');
	var password =  Cookies.get('password');

	if(username == "" || username == null)
    {
        document.getElementById('korisnicko_ime').value='';
   
    } else {

	document.getElementById('korisnicko_ime').value = username;

	document.getElementById('password').value = password;
}
</script>

<?php if(isset($_GET['error'])): ?>
	<?php if($_GET['error'] == 'podaci'): ?>
		<p class="bg-danger text-white lead text-center font-weight-bold" id="error">Pogresni podaci za prijavu</p>
	<?php elseif($_GET['error'] == 'triputa'): ?>
		<p class="bg-danger text-white lead text-center font-weight-bold"  id="error">Pogresili ste lozinku vise od 3 puta. Molimo vas da kontaktirate administratora</p>
	<?php endif ?>
<?php endif ?>
</div>

</body>
</html>