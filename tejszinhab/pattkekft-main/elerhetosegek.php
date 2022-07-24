<?php 
    include_once 'parts/header.php';
	
	define('TITLE', 'Elérhetőségek');
	
	include 'includes/titlebox.php';
?>
    
    
	<section class="loginstyle">
	<div class="main">
	 <div class="container">
	 
	   <div class="row g-3">
	   
	    <div class="col-lg-4">
                <div class="cukielerhetzo">
                    <div class="card mb-sm-3">
                        <div class="card-body text-center">
                            <i class="far fa-envelope fa-2x mb-2"></i>
                            <h4 class="card-title">Vedd fel velunk a kapcsit</h4>
                            <p class="card-text">szia itt segitunk neked lol</p>
							<p class="card-text"></p>
							<p class="card-text"></p>
							<p class="card-text"></p>
							<p class="card-text"></p>
							<p class="card-text"></p>
							<p class="card-text"></p>
                        </div>
                    </div>
                    
                </div>
            </div>
			
			 <div class="col-lg-8">
			 
			 <div class="contact_form">
			 
			 <form action="includes/elerhetosegek.inc.php" method="post">
			 <div class="row">
			 <div class="col-lg-6">
                                <div class="mb-3">
                                    <input type="text" name="felado" placeholder="Feladó..." class ="bejelentkezes_stiluska">
                                    
                                </div>
                            </div>
							
							
							<div class="col-lg-6">
                                <div class="mb-3">
                                    <input type="text" name="elerhetoseg" placeholder="Feladó e-mail címe..." class ="bejelentkezes_stiluska">
                                    
                                </div>
                            </div>
							
							<div class="col-lg-6">
                                <div class="mb-3">
                                    <input type="text" name="cimzett" placeholder="Címzett..." class ="bejelentkezes_stiluska">
                                    
                                </div>
                            </div>
							
							<div class="col-lg-12">
                                <div class="mb-3">
                                    <textarea name="szoveg" id="" cols="30" rows="10" placeholder="Szöveg..." class ="bejelentkezes_stiluska"></textarea>
                                </div>
                                
                            </div>

       

        
            
            
            
            
            <?php
                if (isset($_GET["munka"])) {
                    echo '<input type="text" name="feladat" value="'.$_GET["munka"].'" readonly style="display: none;">';
                } else {
                    echo '<input type="text" name="feladat" value="-1" readonly style="display: none;">';
                }
            ?>
            <button type="submit" name="submit" class = "btn btn_tema mt-2 shadow-none">Küldés</button>
        
    
	
	
	
   
      
           

           
                
                    
                    
                        
                            
                            
                            
                            
                            
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