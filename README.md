# Szükséges elemek a weboldal futtatásához
- XAMPP
    1. https://www.apachefriends.org/hu/download.html itt tudod letölteni
    2. Installáld fel
    3. Ahova telepitetted az xampp-t a mappában van egy htdocs nevezetű mappa ide másold fel az egész git mappa tartalmát
    4. Az admin felületből indítsd el az **Apache** és **MySQL** programokat
    5. nyisd meg a böngésződben a localhost/phpmyadmin oldalt
    6. felhasznalonev: root, jelszo: nincsen
    7. hozz létre az **"új"** menüpont alatt (bal oldalt) egy új adatbázist aminek a neve legyen: **pattke**
    8. Amikor megvan lépj be ebbe az adatbázisba és felül az "SQL" menüpontba illeszd be a következőket:
        - CREATE TABLE felhasznalok (id INT(11) AUTO_INCREMENT PRIMARY KEY, teljes_nev VARCHAR(255), felhasznaonev VARCHAR(255) UNIQUE, email VARCHAR55) UNIQUE, jelszo VARCHAR(255), pozicio VARCHAR(255), reg_datum TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);
        - CREATE TABLE uzenetek (id INT(11) AUTO_INCREMENT PRIMARY KEY, felado VARCHAR(255), elerhetoseg VARCHAR(255), cimzett VARCHAR(255), szoveg VARCHAR(512), allapot VARCHAR(255), letrehozas_datum TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);
        - CREATE TABLE munkak (id INT(11) AUTO_INCREMENT PRIMARY KEY, megnevezes VARCHAR(255), feladat VARCHAR(512), fizetes INT(11),elerhetoseg VARCHAR(255), letrehozas_datum TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);
        - CREATE TABLE referenciak (id INT(11) AUTO_INCREMENT PRIMARY KEY, megnevezes VARCHAR(255), leiras VARCHAR(512), kepek VARCHAR(255), letrehozas_datum TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);
    9. Ha ezek megvannak akkor elméletben a localhost oldalt megnyitva a böngésződben megnyílik az oldal