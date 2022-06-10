<?php
if  (isset($_POST["submit"]))
{
    // Először a form adatokat lekérjük az URL-ből
    $name = $_POST["name"];
    $username = $_POST["uid"];
    $email = $_POST["email"];    
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // Üres mezők ellenőrzése
    // We set the functions "!== false" since "=== true" has a risk of giving us the wrong outcome
    if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=emptyinput");
            exit();
    }
        // Helyes felhasznalonev valasztasa
    if (invalidUid($username) !== false) {
        header("location: ../signup.php?error=invaliduid");
            exit();
    }
    // Helyes email valasztasa
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
            exit();
    }
    // A jelszavak eggyeznek?
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=passwordsdontmatch");
            exit();
    }
    // A felhasznalonev foglalt-e
    if (uidExists($conn, $username) !== false) {
        header("location: ../signup.php?error=usernametaken");
            exit();
    }

    // Ha idaig eljutottunk ez azt jelenti nincsenek errorok

    // Beillesztjuk a felhasznalot az adatbazisba
    createUser($conn, $name, $email, $username, $pwd);

} else {
	header("location: ../signup.php");
    exit();
}