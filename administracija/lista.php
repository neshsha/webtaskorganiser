<?php 

session_start();

if(!isset($_SESSION['korisnik_admin_id'])) {
	header('Location: ../index.php');
	die();
}

require_once __DIR__ . '/../tabele/Korisnik.php';
$korisnici = Korisnik::getAll();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Lista korisnika</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="../js/jquery-3.3.1.min.js"></script>

	<script>
		$(function() {
			$('.snimi').on('click', function(e){

				var id = $(this).attr('data-id');
				var new_password = $(this).parent().parent().find('input').val();

				$.ajax({

					'url':'../logika/admin_promeni_lozinku.php',
					'method':'post',
					'data': {
						'id':id,
						'password':new_password
					},

					'success': function(odgovor) {
						console.log(odgovor);
						alert('Lozinka je uspesno promenjena');

					}
				})
			})

			$('.odobri').on('click', function(e){

				var id = $(this).attr('data-id');
			

				$.ajax({

					'url':'../logika/odobri_korisnika.php',
					'method':'post',
					'data': {
						'id':id,
					},

					'success': function(odgovor) {
						console.log(odgovor);
						alert('Korisnik je odobren');
					}

				})

				$(this).remove();
			})

			$('.obrisi1').on('click', function(e){

				var id = $(this).attr('data-id');
			

				$.ajax({

					'url':'../logika/admin_obrisi_korisnika.php',
					'method':'post',
					'data': {
						'id':id,
					},

					'success': function(odgovor) {
						console.log(odgovor);
						
					}

				})

				var red = $(this).parent().parent();
				red.remove();
			})



		})
	</script>

</head>

<body>

<div class="container">

	<h2 class="text-center text-uppercase bg-info text-white font-weight-bold">Administratorska stranica - lista korisnika</h2>

	
	<div class="row">
		<a class="btn btn-primary text-uppercase mr-2 col disabled" href="administracija/lista.php">Lista korisnika</a>
		<a class="btn btn-primary text-uppercase mr-2 col" href="aktivnosti.php">Lista aktivnosti</a>
		<a class="btn btn-success text-uppercase mr-2 col" href="../logika/odjavi_se.php">Odjavi se</a>
		<a class="btn btn-success text-uppercase mr-2 col" href="../promena_lozinke.php">Promeni lozinku</a>
	</div>
	
</div>

<br><br>

<div class="container">

<table class="table table-striped table-bordered table-hover border-3">

	<thead class="thead-dark">
		<tr class="text-center">

			<th>Ime i prezime</th>
			<th>Email</th>
			<th>Telefon</th>
			<th>Korisnicko ime</th>
			<th>Lozinka</th>
			<th>Slika</th>
			<th>Obrisi/Odobri/Snimi</th>

		</tr>
	</thead>

	<tbody>

		<?php foreach($korisnici as $korisnik): ?>

		<tr>

			<td><?=$korisnik->ime_prezime?></td>
			<td><?=$korisnik->email?></td>
			<td><?=$korisnik->telefon?></td>
			<td><?=$korisnik->korisnicko_ime?></td>
			<td><input type="password" name="password" data-id="<?=$korisnik->id?>" placeholder="Unesite novu lozinku"></td>
			<td><img src="../<?=$korisnik->slika?>"></td>
			<td>
				<button class="obrisi1 butlist btn btn-danger mb-1" data-id="<?=$korisnik->id?>">Obrisi</button>
				<?php if($korisnik->status_korisnika !== 'odobren'): ?>
				<button class="odobri butlist btn btn-success mb-1" data-id="<?=$korisnik->id?>">Odobri</button>
				<?php endif ?>
				<button class="snimi butlist btn btn-info" data-id="<?=$korisnik->id?>">Snimi</button>
			</td>

		</tr>

		<?php endforeach ?>

	</tbody>

</table>

</div>


</body>
</html>