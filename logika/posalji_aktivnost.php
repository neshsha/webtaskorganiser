<?php

session_start();

require_once __DIR__ . '/../tabele/Aktivnost.php';


$naziv = $_POST['naziv'];
$aktivnost = $_POST['aktivnost'];
$namenjena = $_POST['namenjena'];
$prioritet = $_POST['prioritet'];
$rok_izvrsenja = $_POST['rok_izvrsenja'];
$korisnik_id = $_SESSION['korisnik_id'];


$aktivnost_id = Aktivnost::posalji_aktivnost($naziv,$aktivnost,$namenjena,$prioritet,$rok_izvrsenja,$korisnik_id);


if($aktivnost_id !== false) {
	header('Location: ../korisnik.php');
	die();
} else {
	header('Location: ../korisnik.php?greska');
}