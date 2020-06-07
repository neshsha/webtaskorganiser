<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/Database.php';
require_once __DIR__ . '/Korisnik.php';

class Aktivnost {
	
	public $id;
	public $naziv;
	public $aktivnost;
	public $namenjena;
	public $prioritet;
	public $rok_izvrsenja;
	public $vreme_slanja;
	public $korisnik_id;
	public $status;

	public function getKorisnik() {
		return Korisnik::getById($this->korisnik_id);
	}

	public static function posalji_aktivnost($naziv,$aktivnost,$namenjena,$prioritet,$rok_izvrsenja,$korisnik_id) {

			$db = Database::getInstance();

			$query = 'INSERT INTO aktivnosti (naziv, aktivnost, namenjena, prioritet, rok_izvrsenja, korisnik_id) VALUES (:n, :a, :nam, :p, :ri, :kid)';

			$params = [

				':n' =>$naziv,
				':a' => $aktivnost,
				':nam' => $namenjena,
				':p' => $prioritet,
				':ri' => $rok_izvrsenja,
				':kid' => $korisnik_id

			];

			try {
				$db->insert('Aktivnost', $query, $params);
			} catch (Exception $e) {
				return false;
			}
			return $db->lastInsertId();

	}

	public static function getAll() {

			$db = Database::getInstance();

			$query = 'SELECT * FROM aktivnosti ORDER BY rok_izvrsenja DESC';

			$params = [];

			return $db->select('Aktivnost', $query);

	}

	public static function promeni_status($id,$status) {

			$db = Database::getInstance();

			$query = 'UPDATE aktivnosti SET status = :s WHERE id = :id';

			$params = [
				':id' => $id,
				':s' => $status

			];

			$db->update('Akrivnost', $query, $params);

	}

	public static function obrisi_aktivnost($id) {

		$db = Database::getInstance();

		$query = 'DELETE FROM aktivnosti WHERE id= :id';
		$params = [
			':id' => $id
		];

		$db->delete($query,$params);
	}

	public static function obrisi_kreirane($korisnik_id) {
		$db = Database::getInstance();

		$query = 'DELETE FROM aktivnosti WHERE korisnik_id = :kid';
		$params = [
			':kid' => $korisnik_id
		];

		$db->delete($query,$params);
	}

	public static function obrisi_namenjene($namenjena) {
		$db = Database::getInstance();

		$query = 'DELETE FROM aktivnosti WHERE namenjena = :n';
		$params = [
			':n' => $namenjena
		];

		$db->delete($query,$params);
	}


}