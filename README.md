# webtaskorganiser
<h2>Web-aplikacija za definisanje radnih aktivnosti korisnika.</h2>
<ul>
	<li>Login strana(index.php) sadrži:
		<ul>
			<li>
				Polјa za prijavu:
				<ul>
					<li>Korisničko ime</li>
					<li>Lozinka</li>
					<li>Checkbox koji kada korisnik štiklira ostaju upamćeni korisničko ime i lozinka u poljima prilikom sledeće prijave (upamtiti podatke u cookieu na godinu dana)</li>
		      </ul></li>
			<li>U slučaju kada korisnik unese pogrešan imejl i lozinku, prikazati poruku ispod forme „Pogrešni podaci za prijavu.“</li>
			<li>U slučaju da korisnik pogreši lozinku više od tri puta zaredom, onemogućiti mu prijavu sve dok mu administrator ne promeni lozinku.</li>
			</ul></li>
	<br><br>
	<li>Strana za promenu lozinke(promena_lozinke.php) sadrži:
		<ul>
			<li>Polјa za prijavu:
				<ul>
					<li>Nova lozinka</li>
					<li>Ponovljena nova lozinka</li>
				</ul>
			<li>Dva linka:
				<ul>
					<li>Link ka strani za prijavu</li>
					<li>Link ka strani za registraciju</li>
				</ul>
			</li>	
				<li>Stranici mogu pristupiti isključivo prijavljeni korisnici</li>
				<li>U slučaju kada korisnik unese različitu novu lozinku i ponovlјenu novu lozinku, prikazuje se poruka ispod forme „Nove lozinke se ne podudaraju.“</li>
			</li>
		</ul>
	</li>
	<br><br>
	<li>Strana za registraciju(registracija.php) sadrži:
		<ul>
			<li>Polјa za prijavu:
				<ul>
					<li>Korisnicko ime</li>
					<li>Email</li>
					<li>Lozinka</li>
					<li>Ponovljena lozinka</li>
					<li>Ime i prezime</li>
					<li>Telefon</li>
					<li>Slika</li>
				</ul>
			<li>Dva linka:
				<ul>
					<li>Link ka strani za prijavu</li>
					<li>Link ka strani za registraciju</li>
				</ul>
			</li>	
				<li>Korisničko ime sme da sadrži isključivo velika i mala slova engleskog alfabeta, cifre i tačku. Minimalna dužina korisničkog imena je 3 karaktera a maksimalna 30. Ukoliko korisnik unese neki od nedozvoljenih karaktera, prikazuje se poruka u alert-u „Korisničko ime sme da sadrži samo velika i mala slova engleskog alfabeta, cifre i karakter tačku, najmanje 3 a najviše 30 karaktera.“</li>
				<li>U slučaju da korisnik unese korisničko ime koje već postoji, prikazati poruku korisniku „Već postoji korisnik sa tim korisničkim imenom.”</li>
				<li>U slučaju da korisnik unese imejl koji već postoji, prikazati poruku korisniku „Već je registrovan nalog sa tom imejl adresom.“</li>
				<li>U slučaju kada korisnik unese različitu lozinku i ponovljenu lozinku, prikazuje se poruka ispod forme „Lozinke se ne podudaraju“</li>
				<li>Omogućiti postavljanje slika isključivo u formatu JPG, GIF ili PNG (image/jpeg, image/png, image/gif) veličine do 2 MB.</li>
				<li>Kada se korisnik uspešno prijavi, preusmerava se na stranicu korisnik.php.</li>
			</li>
		</ul></li>
	<br><br>
	<li>Strana za korisnike(korisnik.php) sadrži:
		<ul>
			<li>Link za promenu lozinke i odjavu korisnika</li>
			<li> Forma za kreiranje aktivnosti koja sadrži:
				<ul>
					<li>Polje za unos Naziv aktivnosti (obavezno polje)</li>
					<li>Polje za unos opisa aktivnosti (proizvoljan broj karaktera – obavezno polje)</li>
					<li>Padajuću lista za biranje korisnika kojima je aktivnost namenjena, ako se ne odabere nijedan korisnik, smatrati da je aktivnost namenjena korisniku koji kreira aktivnost</li>
					<li>Dva radio dugmeta – hitno i nije hitno (obavezno polјe)</li>
					<li>Rok izvršenja – input type="date"</li>
					<li>Dugme „Kreiraj aktivnost“</li>
					<li>Slika</li>
				</ul>
			<li>Ispod forme, prikazuje se lista svih aktivnosti korisnika pri čemu je potrebno da na vrhu budu prikazane aktivnosti kojima je rok kraći.
				<ul>
					<li>U zaglavlju: <ul>
							<li>Malu sliku korisnika koji je kreirao aktivnost i njegovo ime i prezime</li>
							<li>Naziv</li>
							<li>Vreme slanja aktivnosti</li>
							<li>Desno od vremena slanja aktivnosti, dodati dugme „Urađeno“ koje na klik događaj preko ajax-a u bazi upisuje da je aktivnost odrađena.</li>
							<li>Za aktivnosti koje je korisnik sam kreirao koje se ne odnose na njega, desno od vremena kreiranja aktivnosti, umesto dugmeta „Urađeno“, postaviti dugme „Obriši“ koje na klik događaj preko ajax-a iz baze briše kreiranu aktivnost.</li>
						</ul></li><li>Ispod zaglavlja:
							<ul>
								<li>Opis aktivnosti</li>
								<li>Aktivnosti koje su označene kao hitno obojiti narandžasto, a aktivnosti koje nisu obojiti žuto.</li>
								<li>Urađene aktivnosti obojiti zeleno.</li>
								<li>Kreirane su potrebne tabele i veze između tabela u bazi podataka.</li>
							</ul>
					</li>
				</ul>
			</li>	
			</li>
		</ul></li>
	<br><br><li>Ukoliko je korisnik koji se prijavljuje administrator, preusmeriti ga na stranicu administrator.php:
		<ul>
			<li>Ako običan korisnik pokuša ručno da pristupi stranici administrator.php, preusmerava se na korisnik.php</li>
			<li>Na stranici se nalazi link za odjavu, link ka listi korisnika i link ka listi svih aktivnosti.</li>
			<li> Forma za kreiranje aktivnosti koja sadrži:
			<li>Ispod forme, prikazuje se lista svih aktivnosti korisnika pri čemu je potrebno da na vrhu budu prikazane aktivnosti kojima je rok kraći.</li>	
			</ul></li>
	<br><br>
	<li>Na stranici sa listom svih korisnika (lista.php), u tabeli se nalaze izlistani korisnici u sledećem obliku:<br><br>
<table style="border:1px solid; border-collapse: collapse;">
			<thead style="border:1px solid; border-collapse: collapse;">
				<tr style="border:1px solid; border-collapse: collapse;">
					<th style="border:1px solid; border-collapse: collapse;">Ime i prezime</th>
					<th style="border:1px solid; border-collapse: collapse;">Email</th>
					<th style="border:1px solid; border-collapse: collapse;">Telefon</th>
					<th style="border:1px solid; border-collapse: collapse;">Korisnicko ime</th>
					<th style="border:1px solid; border-collapse: collapse;">Lozinka</th>
					<th style="border:1px solid; border-collapse: collapse;">Slika</th>
					<th style="border:1px solid; border-collapse: collapse;">
						<ul>
							<li>Dugme OBRISI</li>
							<li>Dugme ODOBRI</li>
							<li>Dugme SNIMI</li>
						</ul>
					</th>
				</tr>
			</thead>
		</table>
		<br><br>
		<ul>
<li>Na mestu lozinke, nalazi se prazno input polje za promenu lozinke koja se preko ajax-a čuva u bazi klikom na Dugme Snimi a zatim u alertu prikazuje poruku („Uspešno je promenjena lozinka“)</li>
<li>Kada se klikne na Dugme Obriši, preko ajax-a se iz baze briše korisnik i sve aktivnosti koje je on kreirao kao i aktivnosti koje su mu drugi korisnici dodelili.</li>
<li>Dugme odobri se prikazuje samo ako nalog korisnika još nije odobren (korisnik se tek registrovao). Klikom na Dugme odobri, preko ajax-a se u bazi menja status korisnika u “odobren“ i Dugme Odobri se više ne prikazuje.</li>
</ul>
	</li>
	<li>Na stranici sa listom svih aktivnosti (aktivnosti.php), nalazi se tabela sa listom svih aktivnosti koje postoje u bazi.<br><br>
<table style="border:1px solid; border-collapse: collapse;">
			<thead style="border:1px solid; border-collapse: collapse;">
				<tr style="border:1px solid; border-collapse: collapse;">
					<th style="border:1px solid; border-collapse: collapse;">Korisnik koji je kreirao aktivnost</th>
					<th style="border:1px solid; border-collapse: collapse;">Korisnik kome je aktivnost namenjena</th>
					<th style="border:1px solid; border-collapse: collapse;">Naslov aktivnosti</th>
					<th style="border:1px solid; border-collapse: collapse;">Rok izvršenja aktivnosti</th>
					<th style="border:1px solid; border-collapse: collapse;">Lozinka</th>
					<th style="border:1px solid; border-collapse: collapse;">Status</th>
					<th style="border:1px solid; border-collapse: collapse;">Link Obrisi</th>
				</tr>
			</thead>
		</table>
		<br><br>
		<ul>
			<li>Na mestu Status napisati rečima u kom je statusu zadatak Hitno/Nije hitno</li>
			<li>Ukoliko je aktivnost odrađena obojiti ceo red zelenom bojom.</li>
			<li>Link Obriši vodi na stranu za brisanje aktivnosti (logika/obrisi_aktivnost.php?id=## gde je ## id aktivnosti) i nakon brisanja, vraća administratora nazad na stranu aktivnosti.php</li>	
			<li>Za sve stranice i aktivnosti koje su namenjene administratoru, onemogućiti pristup običnom korisniku!</li>	
		</ul>
	</li>
</ul>
