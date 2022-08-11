<?php 
    
	define('TITLE', 'Rólunk');
	
	include_once 'parts/header.php';
	
	include 'includes/titlebox.php';
	
	
?>
<section class='kari'>
	<div class ='main'>
        <div class='container'>
            <div class='row g-0'>
                <div class='col-lg-6 d-flex align-items-center'>
                    <div class='karacsony'>
                            <img src='img/7.jpg' class='img-fluid'>
                            <p></p>
                            <img src='img/7.jpg' class='img-fluid'>
                            <p></p>
                            <img src='img/7.jpg' class='img-fluid'>
                            <p></p>
                    </div>
                </div>
                <div class='col-lg-6 d-flex align-items-center'>
                    <div class='tiktok'>
                        <h2 class='fontok text_dark mb_20'>Dolgozz nálunk!</h2>
                        <p>szia gyere dolgozz nalunk mert 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?'</p>
                        <a href='elerhetosegek.php' class='btn btn_tema mt-2 shadow-none'>Elérhetőség<i class='fas fa-arrow-right'></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class='container'>
        <div id='accordion'>
            <?php
            require_once 'includes/dbh.inc.php';
            require_once 'includes/functions.inc.php';

            $works = getAllWorks($conn);

            if ($works->num_rows > 0) {
            while($row = $works->fetch_assoc()) {
                echo "<div class='card m-3 shadow p-3 mb-5 bg-white rounded'>
                <div class='card-header' id='heading".$row['id']."'>
                    <h5 class='mb-0'>
                        <button class='btn btn-light' data-toggle='collapse' data-target='#collapse".$row['id']."' aria-expanded='false' aria-controls='collapse".$row['id']."'>
                        ".$row['megnevezes']."
                        </button>
                    </h5>
                </div>

                <div id='collapse".$row['id']."' class='collapse show' aria-labelledby='heading".$row['id']."' data-parent='#accordion'>
                    <div class='card-body'>
                        <div class='container'>
                            <div class='row'>
                                <div class='col'>
                                    <h4>Megnevezés:</h4>
                                    <ul>
                                        <li>
                                            <p>".$row['megnevezes']."</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class='col'>
                                    <h4>Fizetés:</h4>
                                    <ul>
                                        <li>
                                            <p>".$row['fizetes']."</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class='col'>
                                    <h4>Elérhetőség:</h4>
                                    <ul>
                                        <li>
                                            <p>".$row['elerhetoseg']."</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class='col'>
                                    <h4>Munkakör:</h4>
                                    <ul>
                                        <li>
                                            <p>".$row['feladat']."</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class='col'>
                                    <a href='elerhetosegek.php?munka=".$row['megnevezes']."' class='btn btn_tema mt-2 shadow-none'>Jelentkezés<i class='fas fa-arrow-right'></i></a>
                                </div>
                            </div>
                        </div>             
                    </div>
                </div>
            </div>";
            }
            } else {
                echo '0 results';
            }
            ?>
        </div>
    </div>
    <br>
    <br>
    <br>
</section>

<?php
    include_once 'parts/footer.php'
?>