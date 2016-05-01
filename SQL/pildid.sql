/*LOON TABELI*/

CREATE TABLE saasma_pildid (
	id integer PRIMARY KEY auto_increment,
	thumb varchar(100),
	pilt varchar(100),
	pealkiri varchar(200),
	autor varchar(200),
	punktid integer DEFAULT 0
);

/*LISAN TABELISSE VÄÄRTUSED*/

INSERT INTO saasma_pildid (
	thumb, pilt, pealkiri, autor, punktid
) VALUES (
	'thumb1.png', 'pilt1.png', 'Elevandid', 'Mari Maasikas', 12), (
	'thumb2.png', 'pilt2.png', 'Lilled', 'Kadi Kollane', 21), (
	'thumb3.png', 'pilt3.png', 'Loodus', 'Teet Torm', 7), (
	'thumb4.png', 'pilt4.png', 'Kadakas', 'Niina Ninakas', 2), (
	'thumb5.png', 'pilt5.png', 'Sild', 'Peeter Pokker', 27), (
	'thumb6.png', 'pilt6.png', 'Hiir', 'Mari Maasikas', 78), (
	'thumb7.png', 'pilt7.png', 'Pudel', 'Kadi Kollane', 61), (
	'thumb8.png', 'pilt8.png', 'Valgus', 'Teet Torm', 36), (
	'thumb9.png', 'pilt9.png', 'Armastus', 'Niina Ninakas', 92), (
	'thumb10.png', 'pilt10.png', 'Must Maa', 'Peeter Pokker', 11);
	
/*LEIAB TABELIST PILDID, MIS ON SAANUD VÄHEM KUI 50 PUNKTI JA SORTEERIN TULEMUSED PUNTKIDE ARVU JÄRGI KAHANEVAS JÄRJEKORRAS	*/
	
SELECT * FROM saasma_pildid WHERE punktid<50 ORDER BY punktid DESC;

/*LEIAN TABELIST ÜHE AUTORI KÕIK PILDID*/

SELECT * FROM saasma_pildid WHERE autor='Teet Torm';

/*LISAN KÕIKIDELE PILTIDELE 3 PUNKTI*/

UPDATE saasma_pildid SET punktid=punktid+3;

/*LEIAN MITU PILTI ON ERINEVATEL AUTORITEL*/

SELECT autor, count(*) as mitu_pilti FROM saasma_pildid GROUP BY autor;

LIIDAN KOKKU PALJU ON SÜSTEEMIS PILTIDELE PUNKTE ANTUD

/*SELECT sum(punktid) FROM saasma_pildid;*/