<?php
session_start();
if(isset($_COOKIE['broj_poseta'])) {
	if ($_COOKIE['broj_poseta']>=3){
	header('Location: ../index.php?error=triputa');
	die();
	}
}
require_once __DIR__ . '/../tabele/Korisnik.php';


$korisnicko_ime = $_POST['korisnicko_ime'];
$password = $_POST['lozinka'];

$password = hash('sha512', $password);

$korisnik = Korisnik::prijavi_se($korisnicko_ime,$password);

if($korisnik !==null) {
	if($korisnik->prioritet_korisnika == 'administrator') {

		$_SESSION['korisnik_admin_id'] = $korisnik->id;

		if(isset($_POST['zapamti'])){
		setcookie('korisnicko_ime', $korisnicko_ime, time() + 60*60*24*365, '/');
		setcookie('password', $_POST['lozinka'], time() + 60*60*24*365, '/');
		header('Location: ../administrator.php');
		die();
		} else {
		header('Location: ../administrator.php');
		die();
		}

			if (isset($_COOKIE['broj_poseta'])) {
			setcookie('broj_poseta', $_COOKIE['broj_poseta'] + 1, time() + 60*60*24*365, '/');
			header('Location: ../index.php?error=podaci');
			die();
			}else{
				setcookie('broj_poseta', 1, time() + 60*60*24*365, '/');
				header('Location: ../index.php?error=podaci');
			}

	}else{

	$_SESSION['korisnik_id'] = $korisnik->id;

	if(isset($_POST['zapamti'])){
	setcookie('korisnicko_ime', $korisnicko_ime, time() + 60*60*24*365, '/');
	setcookie('password', $_POST['lozinka'], time() + 60*60*24*365, '/');
	header('Location: ../korisnik.php');
	die();
	}else{
	header('Location: ../korisnik.php');
	die();
}
}
}
else {
	if (isset($_COOKIE['broj_poseta'])) {
	setcookie('broj_poseta', $_COOKIE['broj_poseta'] + 1, time() + 60*60*24*365, '/');
	header('Location: ../index.php?error=podaci');
	die();
} else {
	setcookie('broj_poseta', 1, time() + 60*60*24*365, '/');
	header('Location: ../index.php?error=podaci');
}

}

