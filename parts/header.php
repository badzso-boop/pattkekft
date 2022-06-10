<?php
    session_start();
    include_once 'includes/functions.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Pattke kft</title>
</head>
<body>
    <div>
        <ul>
            <li><a href="index.php">Főoldal</a></li> 
            <li><a href='parts/logout.php'>Kilépés</a></li>           
            <?php
            if (isset($_SESSION["useruid"])) {
                echo "<li>".$_SESSION["useruid"]."</li>";
                echo "<li><a href='parts/logout.php'>Kilépés</a></li>";
            }
            else {
              echo "<li><a href='signup.php'>Regisztráció</a></li>";
              echo "<li><a href='login.php'>Belépés</a></li>";
            }
          ?>
        </ul>
    </div>