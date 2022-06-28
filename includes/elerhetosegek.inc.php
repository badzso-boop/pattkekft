<?php 
    require_once "dbh.inc.php";
    require_once 'functions.inc.php';

    if (isset($_POST["submit"])) {
        $felado = $_POST["felado"];
        $elerhetoseg = $_POST["elerhetoseg"];
        $cimzett = $_POST["cimzett"];
        $szoveg = $_POST["szoveg"];
        $allapot = "olvasatlan";
        $munka = $_POST["feladat"];

        if (emptyInputMessage($felado, $elerhetoseg, $cimzett, $szoveg, $munka)) {
            header("location: ../elerhetosegek.php?error=emptyinput");
		    exit();
        } else {
            uploadMessage($conn, $felado, $elerhetoseg, $cimzett, $szoveg, $allapot, $munka);
        }


    }

?>