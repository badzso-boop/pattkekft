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
                <div class="card dobozka shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                    <img class="card-img-top" src="img/4.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card dobozka shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                    <img class="card-img-top" src="img/4.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card dobozka shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                    <img class="card-img-top" src="img/4.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card dobozka shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                    <img class="card-img-top" src="img/4.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card dobozka shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                    <img class="card-img-top" src="img/4.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card dobozka shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                    <img class="card-img-top" src="img/4.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card dobozka shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                    <img class="card-img-top" src="img/4.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card dobozka shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                    <img class="card-img-top" src="img/4.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card dobozka shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                    <img class="card-img-top" src="img/4.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <hr style="margin-top: 10rem;  height: 2px; background-color: #0B212B">
        <h4 class="section_heading_title text_dark text-center" style="padding-top: 25px;">Részletek</h4>
        <h2 class="section_subtitle text_dark text-center mb_70">Referenciáink részletesebben</h2>
        <table style="width: 100%" class="table">
            <tr style="background-color: rgba(11, 33, 43, 0.9); color: white;">
                <td>
                    <h4>Megnevezés</h4></td>
                <td>
                    <h4>Leírás</h4>
                </td>
                <td>
                    <h4>Létrehozás dátuma</h4>
                </td>
                <td>
                </td>
            </tr>
            <?php
                require_once 'includes/dbh.inc.php';
                require_once 'includes/functions.inc.php';

                $referenciak = getAllReferencia($conn);

                if ($referenciak->num_rows > 0) {
                while($row = $referenciak->fetch_assoc()) {
                    echo "<tr>
                            <td class='align-middle' style=' font-size: 20px;'>".$row["megnevezes"]."</td>
                            <td class='align-middle' style='word-break: break-word; max-width: 50%; font-size: 20px;'>".$row["leiras"]."</td>
                            <td class='align-middle' style=' font-size: 20px;'>".$row["letrehozas_datum"]."</td>
                            <td><img style='width: 200px; border-radius: 25px;' src='img/".$row["kepek"]."' alt=''></td>
                        </tr>";
                }
                } else {
                    echo "0 results";
                }
            ?>
        </table>
    </div>
</section>

<?php
    include_once 'parts/footer.php'
?>