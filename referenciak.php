<?php 
    include_once 'parts/header.php'
?>
    
    <div class="main">
        <h2>Referenciák</h2>
        <table>
            <tr>
                <td>Megnevezes</td>
                <td>Leiras</td>
                <td></td>
                <td>Létrehozás Dátum</td>
            </tr>
        <?php
            require_once 'includes/dbh.inc.php';
            require_once 'includes/functions.inc.php';

            $referenciak = getAllReferencia($conn);

            if ($referenciak->num_rows > 0) {
            while($row = $referenciak->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["megnevezes"]."</td>
                        <td>".$row["leiras"]."</td>
                        <td><img style='width: 150px' src='img/".$row["kepek"]."' alt=''></td>
                        <td>".$row["letrehozas_datum"]."</td>
                    </tr>";
            }
            } else {
                echo "0 results";
            }
        ?>
        </table>
    </div>

<?php
    include_once 'parts/footer.php'
?>