<?php
if (isset($_POST["submit"]))
{
    $nev = $_POST["nev"];
    $feladat = $_POST["feladat"];
    $fizu = $_POST["fizu"];
    $kontakt = $_POST["kontakt"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    //Üres mezők ellenőrzése
    if (emptyInputWorkUpload($nev, $feladat, $fizu, $kontakt) !== false)
    {
        header("location: ../admin.php?error=wemptyinput");
        exit();
    }

    uploadWork($conn, $nev, $feladat, $fizu, $kontakt);
}
?>