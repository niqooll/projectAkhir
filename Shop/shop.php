<?php
include "../Profile/config.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['username'])){
    header("Location: ../HomePage/home+login.php");
    exit();
}
// Fungsi untuk mendapatkan data video dari database
$stmt = $pdo->prepare("SELECT * FROM videos");
$stmt->execute();
$videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="stylesheet" href="tes.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet" />
    <!-- Feather Icons -->
    <script
      src="https://kit.fontawesome.com/a3736883c4.js"
      crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Home</title>
  </head>
  <body>
    <!-- Navbar start -->
    <nav class="navbar">
      <a href="../Home/homeLogin.php" class="navbar-logo"
        >Didikin<span>.com</span></a
      >
      <div class="navbar-nav">
        <a href="../Home/homeLogin.php">Home</a>
        <a href="../ProgramKelas/programKelas.php">Program Kelas</a>
        <a href="#">Shop</a>
      </div>

      <!-- Navbar-Extra Start-->
      <div class="navbar-extra">
        <a href="../Profile/profile.php" class="Profile"
          >Profile<span
            ><i class="fa fa-user-circle-o" aria-hidden="true"></i></span
        ></a>
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
      </div>
      <!-- Navbar-Extra End-->
    </nav>
    <!-- Navbar End -->
    <!-- Hero Start -->
    <div class="titleHero">
      <h1>SHOP</h1>
      <p>
        Kelas Online Berbasis Video, Sekali bayar bisa akses selamanya. Kapanpun
        & Dimanapun
      </p>
    </div>
    <section class="hero">
      <div class="flex-container">
        <div class="flex-box">
          <div class="flex-box1">
            <img src="img/java.png" alt="java" class="logo" />
            <div class="explain">
              <p>Rp.150.000</p>
              <a href="#" class="buy-now" data-product-id="1">Beli Sekarang</a>
            </div>
          </div>
        </div>
        <div class="flex-box">
          <div class="flex-box1">
            <img src="img/php_logo.png" alt="java" class="logo1" />
            <div class="explain">
              <p>Rp.150.000</p>
              <a href="#" class="buy-now" data-product-id="2">Beli Sekarang</a>
            </div>
          </div>
        </div>
      </div>
      <div class="flex-container">
        <div class="flex-box">
          <div class="flex-box1">
            <img src="img/html.png" alt="java" class="logo2" />
            <div class="explain">
              <p>Rp.150.000</p>
              <a href="#" class="buy-now" data-product-id="3">Beli Sekarang</a>
            </div>
          </div>
        </div>
        <div class="flex-box">
          <div class="flex-box1">
            <img src="img/css.png" alt="java" class="logo2" />
            <div class="explain">
              <p>Rp.150.000</p>
              <a href="#" class="buy-now" data-product-id="4">Beli Sekarang</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Hero End -->
    <!-- eClass Box Start -->
    <div class="boxClass">
      <div class="boxCover">
        <div class="boxContent">
          <div>
            <h1>Keuntungan membeli eClass!</h1>
            <ul>
              <li>- Video HD 1080</li>
              <li>- Bebas konsultasi 24 Jam</li>
              <li>- Bebas mengakses video tanpa batas waktu</li>
              <li>- Materi ter-update</li>
            </ul>
          </div>
          <div>
            <i class="fa-solid fa-circle-play"></i>
          </div>
        </div>
      </div>
    </div>
    <!-- eClass Box Start -->

     <!-- Popup start -->
     <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <h2>Detail Produk</h2>
            <?php foreach ($videos as $video): ?>
                <div id="product-details">
                    <h3><?= $video['title']; ?></h3>
                    <p><?= $video['description']; ?></p>
                    <p>Harga: <?= $video['price']; ?></p>
                    <!-- Add more dynamic content as needed -->
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Footer -->
    <section class="closeEnd">
      <div class="footer1">
        <h2>Didikin</h2>
        <p>
          Tempat Kursus & Belajar Programming yang berdedikasi untuk membantu
          Calon Programmer yang mempunyai kesulitan untuk belajar Programming
        </p>
        <a href="#" class="WA"><i class="fa-brands fa-whatsapp"></i></a>
        <a href="#" class="IG"><i class="fa-brands fa-instagram"></i></a>
      </div>
      <div class="footer2">
        <p class="copy">Copyright © 2024 - Didikin</p>
      </div>
    </section>
    <!-- Footer End -->
    <!-- Additional scripts here -->
    <script src="shop.js"></script>
  </body>
</html>
