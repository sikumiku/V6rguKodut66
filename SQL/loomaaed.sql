/*LOON TABELI*/

CREATE TABLE saasma_loomaaed (
	id integer PRIMARY KEY auto_increment,
	nimi varchar(200),
	vanus integer DEFAULT 1,
	liik varchar(100),
	puur integer DEFAULT 1
);

/*LISAN TABELISSE VÄÄRTUSED*/

INSERT INTO saasma_loomaaed (
	nimi, vanus, liik, puur
) VALUES (
	'Misha', 4, 'karu', 1), (
	'Puppi', 9, 'tiiger', 2), (
	'Charlie', 15, 'orangutang', 3), (
	'Thomas', 2, 'elevant', 5), (
	'Chinchi', 4, 'paabulind', 4), (
	'Suzie', 21, 'karu', 1), (
	'Kalifa', 33, 'ahv', 3), (
	'Angus', 5, 'lumeleopard', 2), (
	'Ringo', 12, 'leopard', 2), (
	'Prince', 18, 'elevant', 5);
	
/*HANGIN KÕIGI MINGIS ÜHES KINDLAS PUURIS ELAVATE LOOMADE NIME JA PUURI NUMBRI */
	
SELECT nimi, puur FROM saasma_loomaaed WHERE puur=2;

/*HANGN VANIMA JA NOORIMA LOOMA VANUSED*/

SELECT max(vanus) as vanim_loom, min(vanus) as noorim_loom FROM saasma_loomaaed;

/*HANGIN PUURI NUMBRI KOOS SELLES ELAVATE LOOMADE ARVUGA*/

SELECT puur, count(*) as loomade_arv_puuris FROM saasma_loomaaed GROUP BY puur;

/*SUURENDAN KÕIGI TABELIS OLEVATE LOOMADE VANUSEID 1 AASTA VÕRRA*/

UPDATE saasma_loomaaed SET vanus=vanus+1;