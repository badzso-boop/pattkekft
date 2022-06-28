<?php
    //session_start();
    include_once 'includes/functions.inc.php';
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/responziv.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        .card
        {
            position: relative;
            top:100px;
        }
        a,a:hover
        {
            text-decoration: none;
            color: white;
        }
        body
        {
            background: url('reviewback.jpg') no-repeat;
        
            
        }
    </style>
    <title>Pattke kft</title>
</head>
<body>
<header class="heather">
        <nav class="navbar navbar-expand-md p-0">
            <div class="container">
                <a href="./" class="navbargacica">
                 
				
				<i></i>
				 <i></i>
                    <i></i>
				<i></i>
				 <i></i>
                    <i></i>
                    <h1> itt a logo  </h1>
					
					
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navbargation">
                    <i class="fas fa-bars" style="color:#ffffff;"></i>
                </button>
    <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-auto" >
            <li class="nav-item" ><a href="index.php" class="nav-link">Főoldal</a></li> 
			
            <li class="nav-item"><a href='admin.php'  class="nav-link">Admin felület</a></li>      
            <li class="nav-item"><a href='referenciak.php'  class="nav-link">Referenciák</a></li>
            <li class="nav-item"><a href='karrier.php'  class="nav-link">Karrier</a></li>
            <li class="nav-item"><a href='rolunk.php'  class="nav-link">Rólunk</a></li>
            <li class="nav-item"><a href='elerhetosegek.php'  class="nav-link">Elérhetőségek</a></li>
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
	 </div>
           
        </nav>
    </header>