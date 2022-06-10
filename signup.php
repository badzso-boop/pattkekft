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