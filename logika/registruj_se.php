<?php

require_once __DIR__ . '/../tabele/Korisnik.php';

$korisnicko_ime = $_POST['korisnicko_ime'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_ponovljen = $_POST['password_ponovljen'];
$ime_prezime = $_POST['ime_prezime'];
$telefon = $_POST['telefon'];


if(empty($_FILES['slika']['name'])) {
	$slika = null;

}else{

	require_once __DIR__ . '/../includes/Upload.php';
	$upload = Upload::factory('/../slike');
	$upload->file($_FILES['slika']);
	$upload->set_allowed_mime_types(['jpg/jpeg', 'image/png', 'image/gif']);
	$upload->set_max_file_size(2);
	$upload->set_filename($_FILES['slika']['name']);
	$upload->save();
	$slika = 'slike/' . $_FILES['slika']['name'];
}



if($password !== $password_ponovljen) {
	header('Location: ../registracija.php?error=lozinka');
	die();
}

$password = hash('sha512', $password);

$username_provera = Korisnik::check_username($korisnicko_ime);
if($username_provera !== null) {
	header('Location: ../registracija.php?error=username');
	die();
}

$email_provera = Korisnik::check_email($email);
if($email_provera !== null) {
	header('Location: ../registracija.php?error=email');
	die();
}


Korisnik::registracija($korisnicko_ime, $email, $password, $ime_prezime, $telefon, $slika);
header('Location: ../index.php');


