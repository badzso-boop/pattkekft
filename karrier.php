<?php 
    include_once 'parts/header.php'
?>
    
    <div class="main">
        <h2>Karrier</h2>
        <table>
            <tr>
                <td>Megnevezes</td>
                <td>Feladat</td>
                <td>Fizetés</td>
                <td>Elérhetőség</td>
            </tr>
        <?php
            require_once 'includes/dbh.inc.php';
            require_once 'includes/functions.inc.php';

            $works = getAllWorks($conn);

            if ($works->num_rows > 0) {
            while($row = $works->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["megnevezes"]."</td>
                        <td>".$row["feladat"]."</td>
                        <td>".$row["fizetes"]."</td>
                        <td>".$row["elerhetoseg"]."</td>
                        <td><a href='elerhetosegek.php'><button>Jelentkezés</button></a></td>
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