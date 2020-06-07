<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/Database.php';



class Korisnik {

	public $id;
	public $korisnicko_ime;
	public $email;
	public $password;
	public $ime_prezime;
	public $telefon;
	public $slika;
	public $prioritet_korisnika;
	public $status_korisnika;

	public static function registracija($korisnicko_ime,$email,$password,$ime_prezime,$telefon,$slika) {

			$db = Database::getInstance();

			$query = 'INSERT INTO korisnici (korisnicko_ime, email, password, ime_prezime, telefon, slika) VALUES (:k, :e, :p, :ip, :t, :sl)';

			$params = [

				':k' =>$korisnicko_ime,
				':e' => $email,
				':p' => $password,
				':ip' => $ime_prezime,
				':t' => $telefon,
				':sl' => $slika

			];

			try {
				$db->insert('Korisnik', $query, $params);
			} catch (Exception $e) {
				return false;
			}
			return $db->lastInsertId();

	}

		public static function check_username($korisnicko_ime) {

			$db = Database::getInstance();


			$query = 'SELECT * FROM korisnici WHERE korisnicko_ime = :k';

			$params = [
				':k' => $korisnicko_ime

			];

			$korisnici = $db->select('Korisnik', $query, $params);

			foreach($korisnici as $korisnik) {
				return $korisnik;
			}

			return null;
	}

		public static function check_email($email) {

			$db = Database::getInstance();

			$query = 'SELECT * FROM korisnici WHERE email = :e';

			$params = [
				':e' => $email

			];

			$korisnici = $db->select('Korisnik', $query, $params);

			foreach($korisnici as $korisnik) {
				return $korisnik;
			}

			return null;
	}

		public static function prijavi_se($korisnicko_ime,$password) {

			$db = Database::getInstance();

			$query = 'SELECT * FROM korisnici WHERE korisnicko_ime = :k AND password = :p';

			$params = [
				':k' => $korisnicko_ime,
				':p' => $password

			];

			$korisnici = $db->select('Korisnik', $query, $params);

			foreach($korisnici as $korisnik) {
				return $korisnik;
			}

			return null;
	}

		public static function promeni_lozinku($id,$password) {

			$db = Database::getInstance();

			$query = 'UPDATE korisnici SET password = :p WHERE id = :kid';

			$params = [
				':kid' => $id,
				':p' => $password

			];

			$db->update('Korisnik', $query, $params);

		}

		public static function getAll() {
		$db = Database::getInstance();

		$query = 'SELECT * FROM korisnici';

		$params = [];

		return $db->select('Korisnik', $query);

	}

		public static function getById($id) {
			$db = Database::getInstance();

		$query = 'SELECT * FROM korisnici WHERE id = :i';

		$params = [
			':i' => $id
		];

		$korisnici = $db->select('Korisnik', $query, $params);

		foreach ($korisnici as $korisnik) {
			return $korisnik;
		}
		return null;
		}

		public static function odobri_korisnika($id, $status_korisnika) {

			$db = Database::getInstance();

			$query = 'UPDATE korisnici SET status_korisnika = :sk WHERE id = :kid';

			$params = [
				':kid' => $id,
				':sk' => $status_korisnika

			];

			$db->update('Korisnik', $query, $params);

		}

		public static function obrisi_korisnika($id) {
		$db = Database::getInstance();

		$query = 'DELETE FROM korisnici WHERE id= :id';
		$params = [
			':id' => $id
		];

		$db->delete($query,$params);
	}
}