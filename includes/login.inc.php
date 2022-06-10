<?php

if (isset($_POST["submit"])) {

  // Lekérjük az adatokat az URL-ből
  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];

  require_once "dbh.inc.php";
  require_once 'functions.inc.php';

  // Üres inputok
  if (emptyInputLogin($username, $pwd) === true) {
    header("location: ../login.php?error=emptyinput");
		exit();
  }

  // Bejelentkeztetjük a felhasználót a weboldalra
  loginUser($conn, $username, $pwd);

} else {
	header("location: ../login.php");
    exit();
}
