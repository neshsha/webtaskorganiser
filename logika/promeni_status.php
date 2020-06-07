<?php

require_once __DIR__ . '/../tabele/Aktivnost.php';

$id = $_POST['id'];
$status = 'procitano';

Aktivnost::promeni_status($id, $status);

header('Location: ../korisnik.php');

