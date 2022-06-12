<?php 
    include_once 'parts/header.php'
?>
    
    <div class="main">
        <h2>Elérhetőségek</h2>

        <form action="">
            <input type="text" name="felado" placeholder="Feladó...">
            <input type="text" name="elerhetoseg" placeholder="Feladó e-mail címe...">
            <input type="text" name="cimzett" placeholder="Címzett...">
            <textarea name="szoveg" id="" cols="30" rows="10" placeholder="Szöveg..."></textarea>
            <input type="text" name="allapot" value="olvasatlan">
            <button>Küldés</button>
        </form>
    </div>

<?php
    include_once 'parts/footer.php'
?>