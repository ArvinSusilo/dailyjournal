<?php
//menyertakan code dari file koneksi
include "koneksi.php";
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Berita Gempa Bumi Bantul</title>
  <link rel="icon" href="img/logo.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <style>
    /* TEMA TERANG */
    body.light-theme {
      background-color: #ffffff;
      color: #000000;
    }

    body.light-theme h1,
    body.light-theme h2,
    body.light-theme h3,
    body.light-theme h4,
    body.light-theme h5,
    body.light-theme h6,
    body.light-theme p,
    body.light-theme span,
    body.light-theme a,
    body.light-theme i,
    body.light-theme .accordion-body {
      color: #000000 !important;
    }

    /* TEMA GELAP */
    body.dark-theme {
      background-color: #121212;
      color: #ffffff;
    }

    body.dark-theme h1,
    body.dark-theme h2,
    body.dark-theme h3,
    body.dark-theme h4,
    body.dark-theme h5,
    body.dark-theme h6,
    body.dark-theme p,
    body.dark-theme span,
    body.dark-theme a,
    body.dark-theme i,
    body.dark-theme .accordion-body {
      color: #ffffff !important;
    }

    /* Card & Accordion */
    body.dark-theme .card,
    body.dark-theme .accordion-item {
      background-color: #1e1e1e;
    }

    body.light-theme .card,
    body.light-theme .accordion-item {
      background-color: #ffffff;
    }

    body.dark-theme .accordion-button {
      background-color: #1e1e1e;
      color: #ffffff;
    }

    body.light-theme .accordion-button {
      background-color: #ffffff;
      color: #000000;
    }

    /* FOOTER */
    .footer-light {
      background-color: #f8f9fa;
      color: #000000;
    }

    .footer-dark {
      background-color: #000000;
      color: #ffffff;
    }
  </style>
</head>

<body class="light-theme">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">Gempa Bumi Bantul</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#article">Article</a></li>
        <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="#schedule">Schedule</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">About Me</a></li>

        <!-- TOMBOL TEMA -->
        <li class="nav-item ms-3">
          <button class="btn btn-sm btn-outline-secondary" onclick="toggleTheme()">🌙 / ☀️</button>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- HERO -->
<section class="text-center p-5 bg-danger-subtle">
  <div class="container d-sm-flex flex-sm-row-reverse align-items-center">
    <img src="Gallery1.jpg" class="img-fluid" width="300">
    <div>
      <h1 class="display-4 fw-bold">Berita Gempa Bumi Bantul</h1>
      <h4 class="lead">Informasi & Sejarah Gempa Bumi</h4>
      <span id="tanggal"></span> | <span id="jam"></span>
    </div>
  </div>
</section>

<!-- ARTICLE begin -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="display-4 fw-bold pb-3">Artikel</h1>
    <div class="row row-cols-1 row-cols-lg-3 g-4">
 	<?php
        $sql = "SELECT * FROM article ORDER BY tanggal DESC";
        $hasil = $conn->query($sql); 

    while($row = $hasil->fetch_assoc()){
    ?>
<!-- col begin -->
      <div class="col">
        <div class="card h-100">
            <img src=img/<?= $row["gambar"]?> class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title"><?= $row["judul"]?></h5>
            <p class="card-text">
                <?= $row["isi"]?>
          </div>
        <div class="card-footer">
            <small class="text-body-secondary">
                <?= $row["tanggal"]?>
            </small>
        </div>
      </div>
    </div>
    <!-- col end -->
    <?php
    }
    ?>
    </div>
  </div>
</section>

<!-- GALLERY -->
<section id="gallery" class="text-center p-5 bg-danger-subtle">
  <div class="container">
    <h1 class="display-4 fw-bold pb-3">Gallery</h1>
    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="Gallery4.jpg" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="Gallery4.jpg" class="d-block w-100">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SCHEDULE -->
<section id="schedule" class="text-center p-5">
  <div class="container">
    <h1 class="display-4 fw-bold pb-3">Schedule</h1>

    <div class="row g-4">
      <div class="col-sm-4"><div class="card"><div class="card-body"><i class="bi bi-book fs-1"></i><h5>Membaca</h5><p>Mempelajari laporan gempa.</p></div></div></div>
      <div class="col-sm-4"><div class="card"><div class="card-body"><i class="bi bi-laptop fs-1"></i><h5>Menulis</h5><p>Menyusun dokumentasi bencana.</p></div></div></div>
      <div class="col-sm-4"><div class="card"><div class="card-body"><i class="bi bi-people fs-1"></i><h5>Diskusi</h5><p>Diskusi mitigasi bencana.</p></div></div></div>
      <div class="col-sm-4"><div class="card"><div class="card-body"><i class="bi bi-bicycle fs-1"></i><h5>Olahraga</h5><p>Menjaga kesehatan fisik.</p></div></div></div>
      <div class="col-sm-4"><div class="card"><div class="card-body"><i class="bi bi-film fs-1"></i><h5>Movie</h5><p>Menonton dokumenter bencana.</p></div></div></div>
      <div class="col-sm-4"><div class="card"><div class="card-body"><i class="bi bi-bag fs-1"></i><h5>Belanja</h5><p>Mempersiapkan logistik darurat.</p></div></div></div>
    </div>
  </div>
</section>

<!-- ABOUT -->
<section id="about" class="text-center p-5 bg-danger-subtle">
  <h1 class="display-4 fw-bold pb-3">About Me</h1>

  <div class="accordion container" id="accordionAbout">

    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#aboutOne">
          Kapan Terjadi Gempa di Bantul?
        </button>
      </h2>
      <div id="aboutOne" class="accordion-collapse collapse show">
        <div class="accordion-body">27 Mei 2006</div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#aboutTwo">
          Berapa Rumah yang Rusak?
        </button>
      </h2>
      <div id="aboutTwo" class="accordion-collapse collapse">
        <div class="accordion-body">10 Unit Rumah</div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#aboutThree">
          Berapa Korban Jiwa?
        </button>
      </h2>
      <div id="aboutThree" class="accordion-collapse collapse">
        <div class="accordion-body">26.299 Jiwa</div>
      </div>
    </div>

  </div>
</section>

<!-- FOOTER TERANG -->
<footer id="footerLight" class="footer-light text-center p-4">
  <i class="bi bi-whatsapp"></i>
  <i class="bi bi-instagram"></i>
  <i class="bi bi-twitter"></i>
  <div>Stefanus Arvin Susilo</div>
</footer>

<!-- FOOTER GELAP -->
<footer id="footerDark" class="footer-dark text-center p-4 d-none">
  <i class="bi bi-whatsapp"></i>
  <i class="bi bi-instagram"></i>
  <i class="bi bi-twitter"></i>
  <div>Stefanus Arvin Susilo</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<script>
function tampilwaktu(){
  const w = new Date();
  document.getElementById("tanggal").innerHTML =
    w.getDate()+"/"+(w.getMonth()+1)+"/"+w.getFullYear();
  document.getElementById("jam").innerHTML =
    w.getHours()+":"+w.getMinutes()+":"+w.getSeconds();
}
setInterval(tampilwaktu,1000);

function toggleTheme(){
  const body = document.body;
  const footerLight = document.getElementById("footerLight");
  const footerDark = document.getElementById("footerDark");

  if(body.classList.contains("light-theme")){
    body.classList.replace("light-theme","dark-theme");
    footerLight.classList.add("d-none");
    footerDark.classList.remove("d-none");
  } else {
    body.classList.replace("dark-theme","light-theme");
    footerDark.classList.add("d-none");
    footerLight.classList.remove("d-none");
  }
}
</script>

</body>
</html>
