       <footer class="footerize">
    <div class="container">
        <div class="logocska_lab text-center">
            <a href="./">
                <i ></i>
                <i ></i>
                <i ></i>
                <i ></i>
                <i ></i>
                <h1>PÁTTKE KFT<h1>
				<h6>burkolas meg ize</h6>
            </a>
        </div>
        <div class="labize_felso">
            <div class="row justify-content-center text-center">
                <div class="col-lg-2 col-md-2">
                    <h6><a href="./" class="lablink">Főoldal</a></h6>
                </div>
                <div class="col-lg-2 col-md-2">
                    <h6><a href='rolunk.php' class="lablink">rólunk</a></h6>
                </div>
                <div class="col-lg-2 col-md-2">
                    <h6><a href='karrier.php' class="lablink">karrier</a></h6>
                </div>
                <div class="col-lg-2 col-md-2">
                    <h6><a href='referencia.php' class="lablink">referencia</a></h6>
                </div>
                <div class="col-lg-2 col-md-2">
                    <h6><a href='elerhetoseg.php' class="lablink">elérhetőség</a></h6>
                </div>
            </div>
        </div>
		
		<h1>⠀</h1>

        <div class="footer_address">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-4">
                    <div class="sutemeny_box d-flex justify-content-center align-items-center">
                        <div class="sutemeny">
                            <span>
                                <i class="fas fa-phone-alt"></i>
                            </span>
                        </div>
                        <div class="habcsok">
                            <h6>06 31 666 2020</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="sutemeny_box d-flex justify-content-center align-items-center">
                        <div class="sutemeny">
                            <span>
                                <i class="far fa-envelope"></i>
                            </span>
                        </div>
                        <div class="habcsok">
                            <h6>pattke@gmail.com</h6>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
		
		<h1>⠀</h1>

        <div class="cuki_ikonok">
            <ul class="list-unstyled d-flex justify-content-center">
                <li>
                    <a href="#"><i class="far fa-envelope"></i></a>
                </li>
                <li>
                    <a href="#"><i class="far fa-envelope"></i></a>
                </li>
                <li>
                    <a href="#"><i class="far fa-envelope"></i></a>
                </li>
                
            </ul>
        </div>
    </div>

    <div class="footer_copyright text-capitalize text-center text-white">
        ⠀
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="js/scrip.js"></script>
<script> //ezt majd berkaom fajlba csak megnzem hogy jo e
    var mySwiper = new Swiper('.swiper', {
        loop: true,
        grabCursor: true,
        slidesPerView: 4,
        spaceBetween: 20,
        speed: 800,
        navbargation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 5000,
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            480: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            640: {
                slidesPerView: 3,
                spaceBetween: 20
            },
            780: {
                slidesPerView: 4,
                spaceBetween: 20
            }
        }
    });
</script>
</body>

</html>