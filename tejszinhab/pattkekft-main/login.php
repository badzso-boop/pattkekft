<?php 
   
define("TITLE", "Rólunk");

   include_once 'parts/header.php';
	
	include 'includes/titlebox.php';
?>
    
    <section class="loginstyle">
    <div class="main">
	
	<div class="container">
	
	<div class="row g-0">
	
	
	<div class="col-lg-2">
                
            </div>
			
			<div class="col-lg-1">
                
            </div>
			
			
			
			
			
			
			<div class="col-lg-7">
	
	<div class="contact_form">
        
        <form action="includes/login.inc.php" method="post">
		
		<div class="row">
		
		<div class="col-lg-5 ">
		
		
                                <div class="mb-4">
                                    <input type="text" name="uid" placeholder="Felhasználónév..." class="bejelentkezes_stiluska">
                                    
                                </div>
                            </div>
							
							
							<div class="mb-4">
                                    <input type="password" name="pwd" placeholder="Jelszó..." class="bejelentkezes_stiluska">
                                    
                                </div>
                            </div>
            
            
            <button type="submit" name="submit" class="btn btn_tema mt-2 shadow-none">Belépés</button>
      

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
	
	
	
	</div>
	</form>
	</div>
		
		</div>
	</div>
</div>   

   </div>
	
	</section>


<?php
    include_once 'parts/footer.php'
?>