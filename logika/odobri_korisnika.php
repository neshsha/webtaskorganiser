<?php

require_once __DIR__ . '/../tabele/Korisnik.php';

$id = $_POST['id'];
$status_korisnika = 'odobren';

Korisnik::odobri_korisnika($id,$status_korisnika);

header('Location: ../administracija/lista.php?uspesno');