<?php 
    include_once 'parts/header.php';
?>
    
    <div class="main">
        <h2>Belépés</h2>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="uid" placeholder="Felhasználónév...">
            <input type="password" name="pwd" placeholder="Jelszó...">
            <button type="submit" name="submit">Belépés</button>
        </form>
    </div>

    <?php
        // Hiba üzenetek
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
            echo "<p>Kérem töltse ki az összes mezőt!</p>";
            }
            else if ($_GET["error"] == "wronglogin") {
            echo "<p>Hibás adatok!</p>";
            }
        }
    ?>

<?php
    include_once 'parts/footer.php'
?>