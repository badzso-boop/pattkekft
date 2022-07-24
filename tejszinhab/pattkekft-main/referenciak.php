<?php 
    define("TITLE", "Referenciák");
	
	include_once 'parts/header.php';
	
	include 'includes/titlebox.php';
?>
    
    
        <section class="refike">
    <div class="container">
        <h4 class="section_heading_title text_dark text-center">Referenciák</h4>
        <h2 class="section_subtitle text_dark text-center mb_70">nezd meg a kepeket</h2>
        <div class="row g-0">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="dobozka">
                    <img src="img/4.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="dobozka">
                    <img src="img/4.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="dobozka">
                    <img src="img/4.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="dobozka">
                    <img src="img/4.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="dobozka">
                    <img src="img/4.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="dobozka">
                    <img src="img/4.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="dobozka">
                    <img src="img/4.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="dobozka">
                    <img src="img/4.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="dobozka">
                    <img src="img/4.jpg" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
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