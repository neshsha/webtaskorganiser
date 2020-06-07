<?php

require_once __DIR__ . '/../tabele/Aktivnost.php';

if(isset($_GET['id'])){

	$id = $_GET['id'];
	Aktivnost::obrisi_aktivnost($id);
	header('Location: ../administracija/aktivnosti.php');
	die();

}

$id = $_POST['id'];

Aktivnost::obrisi_aktivnost($id);

header('Location: ../korisnik.php');