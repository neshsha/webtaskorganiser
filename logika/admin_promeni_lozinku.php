<?php

require_once __DIR__ . '/../tabele/Korisnik.php';

$id = $_POST['id'];
$password = $_POST['password'];
$password = hash('sha512', $password);

Korisnik::promeni_lozinku($id,$password);

header('Location: ../administracija/lista.php?uspesno');
