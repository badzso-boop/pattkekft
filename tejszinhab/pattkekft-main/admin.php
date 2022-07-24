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


define("TITLE", "admin");
	
	include_once 'parts/header.php';
	
	include 'includes/titlebox.php';


?>


<section class="loginstyle">
<div class="adminlogin">

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
                                   <input type="text" name="uid" placeholder="Felhasználónév..." class="bejelentkezes_stiluska">
                                    
                                </div>
                            </div>
							
							<div class="mb-4">
                                  <input type="password" name="pwd" placeholder="Jelszó..." class = "bejelentkezes_stiluska">
                                    
                                </div>
                            </div>
        
        
        <button type="submit" name="ssubmit" class="btn btn_tema mt-2 shadow-none">Belépés</button>
    
	
	</div>
	</form>
	
	
		</div>
		
		</div>
	</div>
</div>

</section>

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
	
	


<div class="main" style="display: none;">
    <div class="header">
        <ul>
            <li><button onclick="felhasznalok()">Felhasznalok</button></li>
            <li><button onclick="munkak()">Munkak</button></li>
            <li><button onclick="referenciak()">Referenciak</button></li>
            <li><button onclick="uzenetek()">Uzenetek</button></li>
            <li><a href='parts/logout.php'>Kilépés</a></li>
        </ul>
    </div>

    <h1>Üdvözlet az admin oldalon</h1>

    <hr>
    
   
	
        <h3>felhasznalok</h3>
        <table>
            <tr>
                <td>Id</td>
                <td>Teljes Név</td>
                <td>Felhasználónév</td>
                <td>Email</td>
                <td>Pozíció</td>
                <td>Reg. Dátum</td>
            </tr>
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
                        <td><button onclick='userSzerkesztes(".$row['id'].",".json_encode($row['teljes_nev']).",".json_encode($row['felhasznalonev']).",".json_encode($row['email']).",".json_encode($row['pozicio']).")'>Szerkesztés</button></td>
                        <td><button onclick='specificUserDelete(".$row['id'].",".json_encode($row['teljes_nev']).")'>Törlés</button></form></td>
                    </tr>";
            }
            } else {
                echo "0 results";
            }

            echo '
            </table>
            <div id="udelete" style="display: none;">
                <h3 id="dname">Biztos törölni akarja?</h3>
                <form action="includes/admin.inc.php" method="post">
                    <input readonly name="did" value="0" style="display: none;">
                    <button type="submit" name="tsubmit">Törlés</button>
                </form>
            </div>
            <div id="uszerk" style="display: none;">
                <form action="includes/admin.inc.php" method="post">
                    <input readonly type="number" name="id" placeholder="ID">
                    <input type="text" name="name" placeholder="Teljes Név">
                    <input type="text" name="uid" placeholder="Felhasználónév">
                    <input type="text" name="email" placeholder="Email">
                    <input type="text" name="position" placeholder="Pozíció">
                    <button type="submit" name="submit">Mentés</button>
                </form>
            </div>';
        ?>
    

    <hr>

    
	<section class="loginstyle">
	<div id="munkak">
	
	<div class="container">
	
	<div class="row g-0">
	
	
	<div class="col-lg-2">
                
            </div>
			
			<div class="col-lg-1">
                
            </div>
			
			<div class="col-lg-7">
	
	<div class="contact_form">
	
	
	
        <h3>munkak</h3>
        <h3>Munka feltöltése</h3>
        <form action="includes/workUpload.inc.php" method="post">
		
		<div class="row">
		
		<div class="col-lg-5 ">
		
		
                                <div class="mb-4">
                                    <input type="text" name="nev" placeholder="Megnevezés" class="bejelentkezes_stiluska">
                                    
                                </div>
                            </div>
							
							<div class="col-lg-5 ">
		
		
                                <div class="mb-4">
                                    <input type="text" name="feladat" placeholder="Munkakör" class="bejelentkezes_stiluska">
                                    
                                </div>
                            </div>
							
							<div class="col-lg-5 ">
		
		
                                <div class="mb-4">
                                    <input type="number" name="fizu" placeholder="Fizetes" class="bejelentkezes_stiluska">
                                    
                                </div>
                            </div>
							
							<div class="col-lg-5 ">
		
		
                                <div class="mb-4">
                                    <input type="text" name="kontakt" placeholder="Elérhetőség" class="bejelentkezes_stiluska">
                                    
                                </div>
                            </div>
							
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
        <table>
            <tr>
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
                        <td><button onclick='workEdit(".$row['id'].",".json_encode($row['megnevezes']).",".json_encode($row['feladat']).",".$row['fizetes'].",".json_encode($row['elerhetoseg']).")'>Szerkesztés</button></td>
                        <td><button onclick='specificWorkDelete(".$row['id'].",".json_encode($row['megnevezes']).")'>Törlés</button></form></td>
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
                    <button type="submit" name="wdsubmit">Törlés</button>
                </form>
            </div>
            <div id="wszerk" style="display: none;">
                <form action="includes/admin.inc.php" method="post">
                    <input readonly type="number" name="wid" placeholder="ID">
                    <input type="text" name="wnev" placeholder="Megnevezes">
                    <input type="text" name="wfeladat" placeholder="Feladat">
                    <input type="number" name="wfizetes" placeholder="Fizetes">
                    <input type="text" name="welerhetoseg" placeholder="Elerhetoseg">
                    <button type="submit" name="wsubmit">Mentés</button>
                </form>
            </div>';
        ?>
    
	</div>
	</form>
	</div>
		
	
	</div>
	</div>
</div>   

   
	
	</section>


    <hr>

<section class="loginstyle">
    <div id="referenciak">
	
	<div class="container">
	
	<div class="row g-0">
	
	
	<div class="col-lg-2">
                
            </div>
			
			<div class="col-lg-1">
                
            </div>
			
			<div class="col-lg-7">
	
	<div class="contact_form">
        <h3>referenciak</h3>
        <h3>Referencia feltöltése</h3>
        <form action="includes/referenciaUpload.inc.php" method="post" enctype="multipart/form-data">
		
		<div class="row">
		
		
		<div class="col-lg-5 ">
		
		
                                <div class="mb-4">
                                    <input type="text" name="megnevezes" placeholder="Megnevezés" class="bejelentkezes_stiluska">
                                    
                                </div>
                            </div>
							
							
							<div class="col-lg-5 ">
		
		
                                <div class="mb-4">
                                    <input type="text" name="leiras" placeholder="Leiras" class="bejelentkezes_stiluska">
                                    
                                </div>
                            </div>
							
							<div class="col-lg-5 ">
		
		
                                <div class="mb-4">
                                    <input type="file" name="myFile" class="bejelentkezes_stiluska">
                                    
                                </div>
                            </div>
							
							</div>
            
            <button type="submit" name="submit" class="btn btn_tema mt-2 shadow-none">Feltöltés</button>
       
	   
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
        <table>
            <tr>
                <td>Id</td>
                <td>Megnevezes</td>
                <td>Leiras</td>
                <td>Kepek</td>
                <td>Létrehozás Dátum</td>
            </tr>
        <?php
            include "includes/admin.inc.php";
            require_once 'includes/dbh.inc.php';
            require_once 'includes/functions.inc.php';

            if ($referenciak->num_rows > 0) {
            while($row = $referenciak->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["megnevezes"]."</td>
                        <td>".$row["leiras"]."</td>
                        <td>".$row["kepek"]."</td>
                        <td><img style='width: 150px' src='img/".$row["kepek"]."' alt=''></td>
                        <td>".$row["letrehozas_datum"]."</td>
                        <td><button onclick='referenciaEdit(".$row['id'].",".json_encode($row['megnevezes']).",".json_encode($row['leiras']).",".json_encode($row['kepek']).")'>Szerkesztés</button></td>
                        <td><button onclick='referenciaDelete(".$row['id'].",".json_encode($row['megnevezes']).")'>Törlés</button></form></td>
                    </tr>";
            }
            } else {
                echo "0 results";
            }

            echo '
            </table>
            <div id="refdelete" style="display: none;">
                <h3 id="rname">Biztos törölni akarja?</h3>
                <form action="includes/admin.inc.php" method="post">
                    <input readonly name="rid" value="0" style="display: none;">
                    <button type="submit" name="rdsubmit">Törlés</button>
                </form>
            </div>
            <div id="refszerk" style="display: none;">
                <form action="includes/admin.inc.php" method="post">
                    <input readonly type="number" name="rid" placeholder="ID">
                    <input type="text" name="rmegnevezes" placeholder="Megnevezes">
                    <input type="text" name="rleiras" placeholder="Leiras">
                    <input type="text" name="rkepek" placeholder="Kepek">
                    <button type="submit" name="rszsubmit">Mentés</button>
                </form>
            </div>';
        ?>
    </div>
	</form>
	</div>
		
	
	</div>
	</div>
</div>   

   
	
	</section>

    <hr>

    <div id="uzenetek">
        <h3>uzenetek</h3>
        <table>
            <tr>
                <td>Id</td>
                <td>Felado</td>
                <td>ELerhetoseg</td>
                <td>Cimzett</td>
                <td>Szoveg</td>
                <td>Allapot</td>
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
                        <td><button onclick='messageOpen(".$row['id'].",".json_encode($row['felado']).",".json_encode($row['elerhetoseg']).",".json_encode($row['cimzett']).",".json_encode($row['szoveg']).",".json_encode($row['allapot']).")'>Megnyitás</button></td>
                    </tr>";
            }
            } else {
                echo "0 results";
            }

            echo '
            </table>
            <div id="uzenetmegtekint" style="display: none;">
                <form action="includes/admin.inc.php" method="post">
                    <input readonly type="number" name="uzid" placeholder="ID">
                    <input readonly type="text" name="felado" placeholder="Felado">
                    <input readonly type="text" name="elerhetoseg" placeholder="Elerhetoseg">
                    <input readonly type="text" name="cimzett" placeholder="Cimzett">
                    <textarea readonly name="szoveg" cols="30" rows="10"></textarea>
                    <input readonly type="text" name="allapot" placeholder="allapot">
                    <button type="submit" name="udsubmit">Törlés</button>
                    <button type="submit" name="ubsubmit">Vissza</button>
                </form>
            </div>';
        ?>
    </div>
</div>

<script src="js/adminscript.js"></script>