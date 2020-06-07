<?php

session_start();

require_once __DIR__ . '/../tabele/Korisnik.php';

$id = $_SESSION['korisnik_id'];
$password = $_POST['nova_lozinka'];
$password_repeat = $_POST['nova_lozinka_ponovljena'];

if($password !== $password_repeat) {
	header('Location: ../promena_lozinke.php?lozinka');
	die();
}

$password = hash('sha512', $password);

Korisnik::promeni_lozinku($id, $password);

header('Location: ../index.php?lozinkapromenjena');



