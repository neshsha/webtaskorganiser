<?php

require_once __DIR__ . '/../tabele/Aktivnost.php';
require_once __DIR__ . '/../tabele/Korisnik.php';
 
$id = $_POST['id'];

$korisnik = Korisnik::getById($id);

$korisnik_id = $korisnik->id;
$namenjena = $korisnik->ime_prezime;


Aktivnost::obrisi_kreirane($korisnik_id);
Aktivnost::obrisi_namenjene($namenjena);
Korisnik::obrisi_korisnika($id);

