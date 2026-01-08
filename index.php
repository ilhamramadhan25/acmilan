<?php
include "koneksi.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AC MILAN</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <script 
       src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" 
        crossorigin="anonymous">
    </script>
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">AC MILAN</a>
            <span id="tanggal"></span>
            <h1>-</h1>
            <span id="jam"></span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#article">Article</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gallery">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#schedule">Schedule</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#aboutme">About Me</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php" target="_blank">Login</a>
                </li>
                <li class="nav-item">
                    <button id="abutton"><i class="bi bi-moon-stars-fill"></i></button>
                </li>
                <li class="nav-item">
                    <button id="zbutton"><i class="bi bi-sun-fill"></i></button>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <section id="hero" class="text-center p-5 bg-danger text-sm-start">
        <div class="container">
            <div class="d-sm-flex flex-sm-row-reverse align-items-center">
                <img src="img/banner.jpg" class="img-fluid" width="300">
                <div>
                    <h1 class="t fw-bold display-4" style="color: white;">Associazione Calcio Milan</h1>
                    <h4 class="t lead display-6" style="color: white;">Associazione Calcio Milan, sering disebut sebagai AC Milan, adalah klub Italia yang berbasis di Milan, Lombardia, yang bermain di Serie A.</h4>
                </div>
            </div>
        </div>
    </section>

    <section id="article" class="text-center p-5 bg-dark">
        <div class="container">
            <h1 class="t fw-bold display-4 pb-3" style="color: white;" id="t">article</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
                <?php
                $sql="select * from article order by tanggal desc";
                $hasil=$conn->query($sql);
                
                while($row=$hasil->fetch_assoc())
                {
                ?>

                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="img/<?=$row["gambar"]?>" class="card-img-top" alt="serie a">
                        <div class="card-body bg-danger">
                            <h5 class="t card-title" style="color: white;" id="t"><?=$row["judul"]?></h5>
                            <p class="t card-text" style="color: white;" id="t"><?=$row["isi"]?></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary"><?=$row["tanggal"]?></small>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </section>

    <section id="gallery" class="text-center p-5 bg-danger">
         <div class="container">
            <h1 class="t fw-bold display-4 pb-3" style="color: white;" id="t">gallery</h1>
            <div id="carouselExample" class="carousel slide carousel-fade">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="img/acs.jpg" class="d-block w-100" alt="a">
                    </div>
                    <div class="carousel-item">
                    <img src="img/acc.jpg" class="d-block w-100" alt="b">
                    </div>
                    <div class="carousel-item">
                    <img src="img/accl.jpg" class="d-block w-100" alt="c">
                    </div>
                    <div class="carousel-item">
                    <img src="img/acus.jpg" class="d-block w-100" alt="d">
                    </div>
                    <div class="carousel-item">
                    <img src="img/accwc.jpg" class="d-block w-100" alt="e">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <section id="schedule" class="text-center p-5 bg-dark">
        <div class="container bg-dark">
            <h1 class="t fw-bold display-4 pb-3" style="color: white;" id="t">Schedule</h1>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4 justify-content-between">
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <i class="bi bi-book h3 p-2 text-danger"></i>
                        <div class="card-body">
                            <h5 class="card-title">Membaca</h5>
                            <p class="card-text">Menambah wawasan setiap pagi sebelum beraktifitas</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <i class="bi bi-laptop h3 p-2 text-danger"></i>
                        <div class="card-body">
                            <h5 class="card-title">Menulis</h5>
                            <p class="card-text">Mencatat setiap pengalaman harian di jurnal pribadi</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <i class="bi bi-people h3 p-2 text-danger"></i>
                        <div class="card-body">
                            <h5 class="card-title">Diskusi</h5>
                            <p class="card-text">Bertukar ide dengan teman dalam kelompok belajar</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <i class="bi bi-bicycle h3 p-2 text-danger"></i>
                        <div class="card-body">
                            <h5 class="card-title">Olahraga</h5>
                            <p class="card-text">Menjaga kesehatan dengan bersepeda sore hari</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <i class="bi bi-film h3 p-2 text-danger"></i>
                        <div class="card-body">
                            <h5 class="card-title">Movie</h5>
                            <p class="card-text">Menonton film yang bagus di bioskop</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <i class="bi bi-bag h3 p-2 text-danger"></i>
                        <div class="card-body">
                            <h5 class="card-title">Belanja</h5>
                            <p class="card-text">Membeli kebutuhan bulanan di supermarket</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="aboutme" class="text-center p-5 bg-danger">
        <h1 class="t fw-bold display-4 pb-3" style="color: white;" id="t">About Me</h1>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                 Universitas Dian Nuswantoro Semarang
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>This is the first item’s accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  SMA Negeri 1 KayuAgung
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>This is the second item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  SMP Negeri 6 KayuAgung
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>This is the third item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
              </div>
            </div>
          </div>
    </section>

    <footer class="text-center p-5 bg-dark">
        <div>
            <a href="https://www.instagram.com/acmilan/"><i class="bi bi-instagram h1 p-2"></i></a>
            <a href="https://www.facebook.com/ACMilan?locale=id_ID"><i class="bi bi-facebook h1 p-2"></i></a>
            <a href=https://www.youtube.com/acmilan><i class="bi bi-youtube h1 p-2"></i></a>
        </div>
        <div>
            <h1 style="color: white;" class="t">A11.2024.15626</h1>
        </div>
    </footer>

    <button
      id="backToTop"
      class="btn btn-light rounded-circle position-fixed bottom-0 end-0 m-3"
    >
      <i class="bi bi-arrow-up" title="Back to Top"></i>
    </button>

    <script type="text/javascript">
       document.getElementById("zbutton").onclick = function() 
       {
            var elements = document.querySelectorAll(".t");
            elements.forEach(function(el) 
            {
                el.style.color = "black";
            });

            var darkElements = document.querySelectorAll(".bg-dark");
            darkElements.forEach(function(el) 
            {
                el.classList.remove("bg-dark");
                el.classList.add("bg-white");
            });
            var darkElements = document.querySelectorAll(".btn-light");
            darkElements.forEach(function(el) 
            {
                el.classList.remove("btn-light");
                el.classList.add("btn-dark");
            });
        };
    </script>

    <script type="text/javascript">
       document.getElementById("abutton").onclick = function() 
       {
            var elements = document.querySelectorAll(".t");
            elements.forEach(function(el) 
            {
                el.style.color = "white";
            }); 
            var darkElements = document.querySelectorAll(".bg-white");
            darkElements.forEach(function(el) 
            {
                el.classList.remove("bg-white");
                el.classList.add("bg-dark");
            });
            var darkElements = document.querySelectorAll(".btn-dark");
            darkElements.forEach(function(el) 
            {
                el.classList.remove("btn-dark");
                el.classList.add("btn-light");
            });
        };
    </script>

    <script type="text/javascript">
        function tampilwaktu()
        {
            const waktu = new Date();

            const tanggal = waktu.getDate();
            const bulan = waktu.getMonth();
            const tahun = waktu.getFullYear();
            const jam = waktu.getHours();
            const menit = waktu.getMinutes();
            const detik = waktu.getSeconds();

            const arrBulan = ["1", "2", "3", "4","5","6","7","8","9","10","11","12"];

            const tanggal_full = tanggal + "/" + arrBulan[bulan] + "/" + tahun;
            const jam_full = jam + ":" + menit + ":" + detik;

            console.log(tanggal_full);
            console.log(jam_full);
            console.log(arrBulan[bulan]);
            document.getElementById("tanggal").innerHTML=tanggal_full;
            document.getElementById("jam").innerHTML=jam_full;
        }
        setInterval(tampilwaktu, 1000);
    </script>

    <script type="text/javascript"> 
        const backToTop = document.getElementById("backToTop");

        backToTop.addEventListener("click", function () {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    </script>

  </body>
</html>