<?php

session_start();

if(!isset($_SESSION['korisnik_id'])){
	header('Location: index.php');
	die();
}

require_once __DIR__ . '/tabele/Korisnik.php';
require_once __DIR__ . '/tabele/Aktivnost.php';

$korisnici = Korisnik::getAll();
$korisnik_trenutni = Korisnik::getById($_SESSION['korisnik_id']);
$aktivnosti = Aktivnost::getAll();

?>


<!DOCTYPE html>
<html>
<head>

	<title>Logovan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script>
		$(function() {
			$('.uradjeno').on('click', function(e){

				var id = $(this).attr('data-id');
				
				$.ajax({

					'url': 'logika/promeni_status.php',
					'method': 'post',
					'ajax': true,
					'data': {
						'id': id
					},

					'success': function(odgovor) {
						
					}
				})
				var red = $(this).parent().parent();
				red.find('div:last-of-type').attr('class', 'procitano bg-success pl-5 text-white');
				$(this).remove();

			})

			$('.obrisi').on('click', function(e){

				var id = $(this).attr('data-id');
				
				$.ajax({

					'url': 'logika/obrisi_aktivnost.php',
					'method': 'post',
					'ajax': true,
					'data': {
						'id': id
					},

					'success': function(odgovor) {
						
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
	<h2 class="text-center text-uppercase bg-info text-white font-weight-bold">Moje aktivnosti</h2>
	<div class="btn-group float-right">
			<a class="btn btn-success text-uppercase mr-2" href="logika/odjavi_se.php">Odjavi se</a>
			<a class="btn btn-success text-uppercase mr-2" href="promena_lozinke.php">Promeni lozinku</a>
	</div>
</div>

<br><br>

<div class="container">

<form class="border rounded border-3 p-3" action="logika/posalji_aktivnost.php" method="post">
	<input class="form-control" type="text" name="naziv" placeholder="Unesite naziv aktivnosti" required><br>
	<textarea class="form-control" name="aktivnost" placeholder="Unesite opis aktivnosti" required></textarea><br>

	<label for="namenjena" required>Aktivnost namenjena:</label>
	<select class="form-control" name="namenjena" id="namenjena">
		<?php foreach ($korisnici as $korisnik): ?>
		<option><?=$korisnik->ime_prezime?></option>
		<?php endforeach ?>
	</select><br>

	<label for="hitno">Hitno je</label>
	<input class="mr-5" type="radio" name="prioritet" id="hitno" value="hitno" required>

	<label for="nije_hitno">Nije hitno</label>
	<input type="radio" name="prioritet" id="nije_hitno" value="nije_hitno" required><br>

	<label for="rok_izvrsenja">Rok izvrsenja:</label>
	<input class="form-control" type="date" name="rok_izvrsenja" id="rok_izvrsenja" required><br>
	<input class="form-control btn btn-primary" type="submit" value="Posalji aktivnost">
</form>

</div>

<br><br>

<hr>

<?php foreach($aktivnosti  as $aktivnost): ?>
<?php if($aktivnost->namenjena == $korisnik_trenutni->ime_prezime || $aktivnost->getKorisnik()->id == $_SESSION['korisnik_id']): ?>

	<div class="container border-3 border border-info rounded pl-0 pr-0 mb-2">
	
  		<div class="container-fluid text-center pl-0 clearfix">

					  	<?php if($aktivnost->namenjena == $korisnik_trenutni->ime_prezime AND $aktivnost->getKorisnik()->id !== $_SESSION['korisnik_id'] AND $aktivnost->status !== 'procitano' ): ?>
								<button class="uradjeno btn btn-info mt-1 float-right" data-id="<?=$aktivnost->id?>">Uradjeno</button>

						<?php elseif($aktivnost->getKorisnik()->id == $_SESSION['korisnik_id']): ?>
								<button class="obrisi btn btn-danger mt-1 float-right" data-id="<?=$aktivnost->id?>">Obrisi</button>

						<?php endif ?>

					  	<img src="<?=$aktivnost->getKorisnik()->slika?>" alt="John Doe" class="float-left mr-3" style="width:100px;height: 100px;">
					    <h4>
					    	<span class="small font-italic">Aktivnost kreirao:</span> <?=$aktivnost->getKorisnik()->ime_prezime?> <br> 
					    	<small class="small font-italic">Naziv aktivnosti:</small> <?=$aktivnost->naziv?> <br>
					    	<small><i>Posted on <b><?=$aktivnost->vreme_slanja?></b></i></small>
					    </h4>

		</div>

  		<div class="container-fluid pl-0 pr-0  mb-0">
    
					    <?php if($aktivnost->prioritet == 'hitno' AND $aktivnost->status !== 'procitano'): ?>

						<div class="hitno bg-danger pl-5 pr-5 text-white" style="text-align: justify;">
							<?=$aktivnost->aktivnost?>
						</div>

						<?php elseif($aktivnost->prioritet == 'nije_hitno' AND $aktivnost->status !== 'procitano'): ?>
						<div class="nije_hitno bg-warning pl-5 pr-5 text-white" style="text-align: justify;">
							<?=$aktivnost->aktivnost?>
						</div>

						<?php elseif($aktivnost->status == 'procitano'): ?>
						<div class="procitano bg-success pl-5 pr-5 text-white" style="text-align: justify;">
							<?=$aktivnost->aktivnost?>
						</div>

						<?php endif?>

  		</div>

	</div>

<?php endif ?>
<?php endforeach?>

	<br><br><br>
</div>

</body>
</html>

