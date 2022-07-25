<?php
/*
    egy header kell ami nem tölt be új fajlt csak ezen az oldalon dolgozik. 
        (js -> diveknek ad lathatosagot vagy nem)

    felhasznalok lekerese egy tablazatba -> szerkesztes gomb ami aztan kinyit egy szerkeszto ablakot
    munkak lekerese egy tablazatba
    uj munka hozzaadasa

    referenciak lekerese egy tablazatba
    uj referencia hozzaadasa

    uzenetek lekerese egy tablazatba -> csak emailben tudnak valaszolni az oldalrol nem
	
	
*/    
?>
<link rel="stylesheet" href="css/admin.css" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<div class="adminlogin">
    <section class="loginstyle">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-2">
                    <h2>Belépés</h2>
                </div>
                <div class="col-lg-1">
                </div>
                <div class="col-lg-7">
                    <div class="contact_form">
                        <form action="includes/admin.inc.php" method="post">
                            <div class="row">
                                <div class="col-lg-5 ">
                                    <div class="mb-4">
                                        <input type="text" name="uid" placeholder="Felhasználónév...">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <input type="password" name="pwd" placeholder="Jelszó...">
                                </div>
                            </div>
                                <button type="submit" name="ssubmit" class="btn btn_tema mt-2 shadow-none">Belépés</button>
                            </div>
	                    </form>
                    </div>
                </div>
            </div>
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
    </section>
</div>
	
<div class="fooldal" style="margin-top: 20px!important;">
    <div id="navigation" class="mx-auto" style="width: 50%;">
        <h1 class="text-uppercase font-weight-bold text-center">Üdvözlet az admin oldalon</h1>
        <ul id="menu" class="d-flex justify-content-center" >
            <li class="listitem">
                <button class="btn btn-secondary" onclick="felhasznalok()">Felhasznalok</button>
            </li>
            <li class="listitem">
                <button class="btn btn-secondary" onclick="munkak()">Munkak</button>
            </li>
            <li class="listitem">
                <button class="btn btn-secondary" onclick="referenciak()">Referenciak</button>
            </li>
            <li class="listitem">
                <button class="btn btn-secondary" onclick="uzenetek()">Uzenetek</button>
            </li>
            <li class="listitem">
                <a href='parts/logout.php'>
                    <button class="btn btn-secondary">Kilépés</button>
                </a>
            </li>
        </ul>
    </div>

    <div id="felhasznalok" style="width: 90%" class="mx-auto">
        <hr class="rounded">
        <div class="container">
            <div class="row">
                <div class="col-sm"></div>
                <div class="col-sm">
                    <h3 class="text-uppercase font-weight-bold">felhasználók</h3>
                </div>
                <div class="col-sm"></div>
            </div>
        </div>
        <table class="table  table-hover">
            <thead>
                <tr class="text-uppercase font-weight-bold">
                    <td>Id</td>
                    <td>Teljes Név</td>
                    <td>Felhasználónév</td>
                    <td>Email</td>
                    <td>Pozíció</td>
                    <td>Reg. Dátum</td>
                </tr>
            </thead>
            <tbody>
        <?php 
            include "includes/admin.inc.php";
            require_once 'includes/dbh.inc.php';
            require_once 'includes/functions.inc.php';

            if ($users->num_rows > 0) {
            while($row = $users->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["teljes_nev"]."</td>
                        <td>".$row["felhasznalonev"]."</td>
                        <td>".$row["email"]."</td>
                        <td>".$row["pozicio"]."</td>
                        <td>".$row["reg_datum"]."</td>
                        <td><button class='btn btn-light' onclick='userSzerkesztes(".$row['id'].",".json_encode($row['teljes_nev']).",".json_encode($row['felhasznalonev']).",".json_encode($row['email']).",".json_encode($row['pozicio']).")'>Szerkesztés</button></td>
                        <td><button class='btn btn-light' onclick='specificUserDelete(".$row['id'].",".json_encode($row['teljes_nev']).")'>Törlés</button></form></td>
                    </tr>";
            }
            } else {
                echo "0 results";
            }

            echo '
            </tbody>
            </table>
            <div id="udelete" style="display: none;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                        </div>
                        <div class="col-sm">
                            <h3 id="dname">Biztos törölni akarja?</h3>
                            <form action="includes/admin.inc.php" method="post">
                                <input readonly name="did" value="0" style="display: none;">
                                <button class="btn btn-light" type="submit" name="tsubmit">Törlés</button>
                            </form>
                        </div>
                        <div class="col-sm">
                        </div>
                    </div>
                </div>
            </div>
            <div id="uszerk" style="display: none;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                        
                        </div>
                        <div class="col-sm">
                            <form action="includes/admin.inc.php" method="post">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">ID</span>
                                    </div>
                                    <input readonly type="number" name="id" placeholder="ID" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Teljes név</span>
                                    </div>
                                    <input type="text" name="name" placeholder="Teljes Név" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Felhasználónév</span>
                                    </div>
                                    <input  type="text" name="euid" placeholder="Felhasználónév" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                                    </div>
                                    <input type="text" name="email" placeholder="Email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Pozíció</span>
                                    </div>
                                    <input type="text" name="position" placeholder="Pozíció" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>

                                <button class="btn btn-light" type="submit" name="submit">Mentés</button>
                            </form>
                        </div>
                        <div class="col-sm">
                        
                        </div>
                    </div>
                </div>
            </div>';
        ?>
    </div>

    <div id="munkak" style="width: 90%" class="mx-auto">
        <hr class="rounded">
        <div class="container">
            <div class="row">
                <div class="col-sm text-center">
                    <h3 class="text-uppercase font-weight-bold">Munka feltöltése</h3>
                    <form action="includes/workUpload.inc.php" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Megnevezés</span>
                            </div>
                            <input type="text" name="nev" placeholder="Megnevezés" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Munkakör</span>
                            </div>
                            <input type="text" name="feladat" placeholder="Munkakör" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Fizetés</span>
                            </div>
                            <input type="number" name="fizu" placeholder="Fizetes" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Elérhetőség</span>
                            </div>
                            <input type="text" name="kontakt" placeholder="Elérhetőség" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <button type="submit" name="submit" class="btn btn_tema mt-2 shadow-none">Feltöltés</button>    
                        <?php
                            // Hiba üzenetek
                            if (isset($_GET["error"])) {
                                if ($_GET["error"] == "wemptyinput") {
                                    echo "<p>Kérem töltse ki az összes mezőt!</p>";
                                }
                            }
                        ?>
                    </form>
                </div>
                <div class="col-xl">
                    <h3 class="text-uppercase font-weight-bold text-center">munkák</h3>
                    <table class="table">
                    <tr class="text-uppercase font-weight-bold">
                        <td>Id</td>
                        <td>Megnevezes</td>
                        <td>Feladat</td>
                        <td>Fizetés</td>
                        <td>Elérhetőség</td>
                        <td>Létrehozás Dátum</td>
                    </tr>
                    <?php 
                        include "includes/admin.inc.php";
                        require_once 'includes/dbh.inc.php';
                        require_once 'includes/functions.inc.php';

                        if ($works->num_rows > 0) {
                        while($row = $works->fetch_assoc()) {
                            echo "<tr>
                                    <td>".$row["id"]."</td>
                                    <td>".$row["megnevezes"]."</td>
                                    <td>".$row["feladat"]."</td>
                                    <td>".$row["fizetes"]."</td>
                                    <td>".$row["elerhetoseg"]."</td>
                                    <td>".$row["letrehozas_datum"]."</td>
                                    <td><button class='btn btn-light' onclick='workEdit(".$row['id'].",".json_encode($row['megnevezes']).",".json_encode($row['feladat']).",".$row['fizetes'].",".json_encode($row['elerhetoseg']).")'>Szerkesztés</button></td>
                                    <td><button class='btn btn-light' onclick='specificWorkDelete(".$row['id'].",".json_encode($row['megnevezes']).")'>Törlés</button></form></td>
                                </tr>";
                        }
                        } else {
                            echo "0 results";
                        }

                        echo '
                        </table>
                        <div id="wdelete" style="display: none;">
                            <h3 id="wname">Biztos törölni akarja?</h3>
                            <form action="includes/admin.inc.php" method="post">
                                <input readonly name="wid" value="0" style="display: none;">
                                <button class="btn btn-light" type="submit" name="wdsubmit">Törlés</button>
                            </form>
                        </div>
                        <div id="wszerk" style="display: none;">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <form action="includes/admin.inc.php" method="post">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">ID</span>
                                                </div>
                                                <input readonly type="number" name="swid" placeholder="ID" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                            
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Megnevezés</span>
                                                </div>
                                                <input type="text" name="wnev" placeholder="Megnevezes" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Munkakör</span>
                                                </div>
                                                <input type="text" name="wfeladat" placeholder="Feladat" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Fizetés</span>
                                                </div>
                                                <input type="text" name="wfizetes" placeholder="Fizetes" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Elérhetőség</span>
                                                </div>
                                                <input type="text" name="welerhetoseg" placeholder="Elerhetoseg" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                            <button class="btn btn-light" type="submit" name="wsubmit">Mentés</button>
                                        </form>
                                    </div>
                                    <div class="col"></div>
                                </div>
                            </div>
                        </div>';
                    ?>
                </div>
            </div>
        </div>
    </div>   

    <div id="referenciak" style="width: 90%" class="mx-auto">
        <hr class="rounded">
        <div id="feltoltes">
            <div class="container">
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col-xl text-center">
                        <h3 class="text-uppercase font-weight-bold">Referencia feltöltése</h3>
                        <form action="includes/referenciaUpload.inc.php" method="post" enctype="multipart/form-data">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                                </div>
                                <input type="text" name="megnevezes" placeholder="Megnevezés" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Leirás</span>
                                </div>
                                <input type="text" name="leiras" placeholder="Leirás" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>


                            

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Feltöltés</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="myFile" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">fájl feltöltés</label>
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn_tema mt-2 shadow-none">Feltöltés</button>
                        </form>
                        <?php
                            // Hiba üzenetek
                            if (isset($_GET["error"])) {
                                if ($_GET["error"] == "remptyinput") {
                                    echo "<p>Kérem töltse ki az összes mezőt!</p>";
                                }
                                else if ($_GET["error"] == "rbigfile") {
                                    echo "<p>Túl nagy képet töltött fel!</p>";
                                }
                                else if ($_GET["error"] == "rwrongfile") {
                                    echo "<p>Hibás fájl!</p>";
                                }
                                else if ($_GET["error"] == "rwrongfileext") {
                                    echo "<p>Rossz a fájl kiterjesztése! Támogatott kiterjesztések: jpg, jpeg, png!</p>";
                                }
                            }
                        ?>
                    </div>
                    <div class="col">
                    </div>
                </div>
            </div>
        </div>

        <div id="tablazat" class="m-4">
            <h3 style="margin-top: 6rem;" class="text-uppercase font-weight-bold text-center">referenciák</h3>
            <table class="table table-hover">
                <thead>
                    <tr class="text-uppercase font-weight-bold">
                        <td>Id</td>
                        <td>Megnevezes</td>
                        <td>Leiras</td>
                        <td>Létrehozás Dátum</td>
                    </tr>
                </thead>
                <tbody>
            <?php
                include "includes/admin.inc.php";
                require_once 'includes/dbh.inc.php';
                require_once 'includes/functions.inc.php';

                if ($referenciak->num_rows > 0) {
                while($row = $referenciak->fetch_assoc()) {
                    echo "<tr>
                            <td class='align-middle'>".$row["id"]."</td>
                            <td class='align-middle'>".$row["megnevezes"]."</td>
                            <td class='align-middle'>".$row["leiras"]."</td>
                            <td class='align-middle'>".$row["letrehozas_datum"]."</td>
                            <td><img style='width: 150px; border-radius: 15px;' src='img/".$row["kepek"]."' alt=''></td>
                            <td class='align-middle'><button class='btn btn-light' onclick='referenciaEdit(".$row['id'].",".json_encode($row['megnevezes']).",".json_encode($row['leiras']).",".json_encode($row['kepek']).")'>Szerkesztés</button></td>
                            <td class='align-middle'><button class='btn btn-light' onclick='referenciaDelete(".$row['id'].",".json_encode($row['megnevezes']).")'>Törlés</button></form></td>
                        </tr>";
                }
                } else {
                    echo "0 results";
                }

                echo '
                </tbody>
                </table>
                <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <div id="refszerk" style="display: none;">
                                    <form action="includes/admin.inc.php" method="post">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">ID</span>
                                        </div>
                                        <input readonly type="number" name="rid" placeholder="ID" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Megnevezés</span>
                                        </div>
                                        <input type="text" name="rmegnevezes" placeholder="Megnevezes" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Leírás</span>
                                        </div>
                                        <input type="text" name="rleiras" placeholder="Leiras" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Képek</span>
                                        </div>
                                        <input type="text" name="rkepek" placeholder="Kepek" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>


                                    <button clasS="btn btn-light" type="submit" name="rszsubmit">Mentés</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div id="refdelete" style="display: none;">
                                    <h3 id="rname">Biztos törölni akarja?</h3>
                                    <form action="includes/admin.inc.php" method="post">
                                        <input readonly name="rid" value="0" style="display: none;">
                                        <button class="btn btn-light" type="submit" name="rdsubmit">Törlés</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>';
            ?>
        </div>
    </div>  

    <div id="uzenetek" style="width: 90%" class="mx-auto">
        <hr class="rounded">
        <h3 class="text-uppercase font-weight-bold text-center">üzenetek</h3>
        <table class="table">
            <tr class="text-uppercase font-weight-bold">
                <td>Id</td>
                <td>Feladó</td>
                <td>Elérhetőség</td>
                <td>Címzett</td>
                <td>Szöveg</td>
                <td>Állapot</td>
                <td>Jelentkezett Munka</td>
                <td>Létrehozás Dátum</td>
            </tr>
        <?php 
            include "includes/admin.inc.php";
            require_once 'includes/dbh.inc.php';
            require_once 'includes/functions.inc.php';

            if ($messages->num_rows > 0) {
            while($row = $messages->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["felado"]."</td>
                        <td>".$row["elerhetoseg"]."</td>
                        <td>".$row["cimzett"]."</td>
                        <td>".$row["szoveg"]."</td>
                        <td>".$row["allapot"]."</td>
                        <td>".$row["munka"]."</td>
                        <td>".$row["letrehozas_datum"]."</td>
                        <td><button class='btn btn-light' onclick='messageOpen(".$row['id'].",".json_encode($row['felado']).",".json_encode($row['elerhetoseg']).",".json_encode($row['cimzett']).",".json_encode($row['szoveg']).",".json_encode($row['allapot']).")'>Megnyitás</button></td>
                    </tr>";
            }
            } else {
                echo "0 results";
            }

            echo '
            </table>
            <div class="container">
                <div class="row">
                    <div class="col-sm"></div>

                    <div class="col-sm">
                        <div id="uzenetmegtekint" style="display: none;">
                            <form action="includes/admin.inc.php" method="post">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">ID</span>
                                    </div>
                                    <input readonly type="number" name="uzid" placeholder="ID" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Feladó</span>
                                    </div>
                                    <input readonly type="text" name="felado" placeholder="Felado" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Elérhetőség</span>
                                    </div>
                                    <input readonly type="text" name="elerhetoseg" placeholder="Elerhetoseg" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Címzett</span>
                                    </div>
                                    <input readonly type="text" name="cimzett" placeholder="Cimzett" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Állapot</span>
                                    </div>
                                    <input readonly type="text" name="allapot" placeholder="allapot" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>

                                <div style="margin-bottom: 15px;" class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Üzenet</span>
                                    </div>
                                    <textarea readonly name="szoveg" cols="30" rows="10" class="form-control" aria-label="With textarea"></textarea>
                                </div>
                                
                                <div class="text-center">
                                    <button class="btn btn-light" type="submit" name="udsubmit">Törlés</button>
                                    <button class="btn btn-light" type="submit" name="ubsubmit">Vissza</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-sm"></div>
                </div>
            </div>';
        ?>
    </div>
</div>    

    



<script src="js/adminscript.js"></script>