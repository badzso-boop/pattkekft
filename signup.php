<?php 
    include_once 'parts/header.php'
?>
    
    <div class="main">
        <h2>Regisztráció</h2>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="name" placeholder="Teljes név...">
            <input type="text" name="uid" placeholder="Felhasználónev...">
            <input type="text" name="email" placeholder="Email...">
            <input type="password" name="pwd" placeholder="Jelszó...">
            <input type="password" name="pwdrepeat" placeholder="Jelszó mégegyszer...">
            <button type="submit" name="submit">Regisztráció</button>
			
			
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <style>
                .card
                {
                    position: relative;
                    top:120px;
                    width:450px;
                    
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

        </form>
    </div>

    <?php
        //Error messages
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
            echo "<p>Kérem töltse ki az összes mezőt!</p>";
            }
            else if ($_GET["error"] == "invaliduid") {
            echo "<p>Hibás felhasználónév!</p>";
            }
            else if ($_GET["error"] == "invalidemail") {
            echo "<p>Hibás email cím!</p>";
            }
            else if ($_GET["error"] == "passwordsdontmatch") {
            echo "<p>A jelszavak nem egyeznek!</p>";
            }
            else if ($_GET["error"] == "stmtfailed") {
            echo "<p>Szerver hiba!</p>";
            }
            else if ($_GET["error"] == "usernametaken") {
            echo "<p>A felhasználónév foglalt!</p>";
            }
            else if ($_GET["error"] == "none") {
            echo "<p>Sikeres regisztráció!</p>";
            }
        }
    ?>
<?php
    include_once 'parts/footer.php'
?>