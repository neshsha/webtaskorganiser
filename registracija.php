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

	<title>Registracija</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script>
		$(function() {
			$('#korisnicko_ime').on('keyup', function(e) {
				var test = /^[a-zA-Z0-9.]+$/.test($(this).val());
				if(test === false) {
					alert('Korisnicko ime sme da sadrzi samo velika i mala slova engleskog alfabeta, cifre i karakter tacku, najmanje 3 a najvise 30 karaktera');
				}
			})
		})
	</script>
	
</head>

<body>

<div class="container">
	<h2 class="text-center text-uppercase bg-info text-white font-weight-bold">Registracija korisnika</h2>
	<div class="btn-group float-right">
		<a class="btn btn-success text-uppercase" href="index.php">Prijavi se</a>
	</div>	
</div>

<br><br>

<div class="container">


<form class="border border-3 p-3" action="logika/registruj_se.php" method="post" enctype="multipart/form-data">

	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text bg-primary"><i class="fas fa-user text-white"></i></span>
		</div>
		<input class="form-control"br type="text" name="korisnicko_ime" id="korisnicko_ime" minlength="3" maxlength="30" placeholder="Unesite korisnicko ime" required>
	</div>

	<br>

	<div class="input-group"> 
		<div class="input-group-prepend">
			<span class="input-group-text bg-primary text-white font-weight-bold">@</i></span>
		</div>
		<input class="form-control" type="email" name="email" placeholder="Unesite email">
	</div>

	<br>

	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text bg-primary"><i class="fas fa-align-justify text-white"></i></span>
		</div>
		<input class="form-control" type="password" name="password" placeholder="Unesite lozinku">
	</div>

	<br>


	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text bg-primary"><i class="fas fa-align-justify text-white"></i></span>
		</div>
		<input class="form-control" type="password" name="password_ponovljen" placeholder="Unesite ponovo lozinku">
	</div>

	<br>

	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text bg-primary"><i class="fas fa-address-card text-white"></i></span>
		</div>
		<input class="form-control" type="text" name="ime_prezime" placeholder="Unesite ime i prezime">
	</div>

	<br>

	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text bg-primary"><i class="fas fa-phone text-white"></i></span>
		</div>
		<input class="form-control" type="text" name="telefon" placeholder="Unesite telefon" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
	</div>
	<p>* Telefon mora biti ispisan u obliku: <i>xxx-xxx-xxxx</i></p>

	<br>

	<div class="custom-file" style="width: 50%;">
		<input class="custom-file-input" type="file" name="slika" id="slika">
			<label for="slika" class="custom-file-label" id="customFile">Odaberite profilnu sliku</label>

		<script>

			$(".custom-file-input").on("change", function() {
	  		var fileName = $(this).val().split("\\").pop();
	  		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
			});
		</script>
	</div>


	<br><br><br>

	<input class="form-control btn btn-primary font-weight-bold text-uppercase" type="submit" value="Registruj se">
	
</form>

<br><br>

<?php if(isset($_GET['error'])): ?>
	<?php if($_GET['error'] == 'username'): ?>
		<p class="bg-danger text-white lead text-center font-weight-bold" id="error">Vec postoji korisnik sa tim korisnickim imenom</p>
	<?php elseif ($_GET['error'] == 'email'): ?>
		<p class="bg-danger text-white lead text-center font-weight-bold" id="error">Vec postoji korisnik sa tom email adresom</p>
	<?php elseif ($_GET['error'] == 'lozinka'): ?>
		<p class="bg-danger text-white lead text-center font-weight-bold" id="error">Lozinke se ne podudaraju</p>
	<?php endif ?>
<?php endif ?>

</div>

</body>
</html>