<?php
include "../Profile/config.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
if(!isset($_SESSION['username'])){
    header("Location: ../HomePage/home+login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="stylesheet" href="programKelas.css" />
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
    <div class="bgImage"></div>
    <!-- Navbar start -->
    <nav class="navbar">
      <a href="../Home/homeLogin.Html" class="navbar-logo"
        >Didikin<span>.com</span></a
      >
      <div class="navbar-nav">
        <a href="../Home/homeLogin.php">Home</a>
        <a href="#">Program Kelas</a>
        <a href="../Shop/shop.php">Shop</a>
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
      <h1>PROGRAM KELAS</h1>
      <p>Solusi buat kamu yang pengen belajar mengenai hal-hal programming!</p>
    </div>
    <section class="hero">
      <div class="flex-container">
        <div class="flex-box">
          <img src="img/java.png" alt="java" class="logo" />
          <div class="explain">
            <p>
              Kamu bakal diajarin Dasar Java dari awal banget sampai siap jadi
              Programmer!
            </p>
            <p>Materi :</p>
            <ul>
              <li>- Java Dasar</li>
              <li>- Java Database</li>
              <li>- Java Object Oriented Programming</li>
              <li>- Java Unit</li>
            </ul>
            <p>4-5x Pertemuan/Bulan | 1-2 Jam/ Pertemuan</p>
          </div>
        </div>
        <div class="flex-box">
          <img src="img/php_logo.png" alt="java" class="logo1" />
          <div class="explain">
            <p>
              Kamu bakal diajarin Dasar PHP dari awal banget sampai siap jadi
              Programmer!
            </p>
            <p>Materi :</p>
            <ul>
              <li>- PHP Dasar</li>
              <li>- PHP Forms</li>
              <li>- PHP OOP</li>
              <li>- PHP AJAX</li>
            </ul>
            <p>4-5x Pertemuan/Bulan | 1-2 Jam/ Pertemuan</p>
          </div>
        </div>
      </div>
      <div class="flex-container">
        <div class="flex-box">
          <img src="img/html.png" alt="java" class="logo2" />
          <div class="explain">
            <p>
              Kamu bakal diajarin Dasar HTML dari awal banget sampai siap untuk
              bikin WEB!
            </p>
            <p>Materi :</p>
            <ul>
              <li>- HTML Dasar</li>
              <li>- HTML Forms</li>
              <li>- HTML Grafik</li>
              <li>- HTML Media</li>
            </ul>
            <p>4-5x Pertemuan/Bulan | 1-2 Jam/ Pertemuan</p>
          </div>
        </div>
        <div class="flex-box">
          <img src="img/css.png" alt="java" class="logo2" />
          <div class="explain">
            <p>
              Kamu bakal diajarin Dasar PHP dari awal banget sampai siap jadi
              Programmer!
            </p>
            <p>Materi :</p>
            <ul>
              <li>- CSS Dasar</li>
              <li>- CSS Responsive</li>
              <li>- CSS Grid</li>
            </ul>
            <p>4-5x Pertemuan/Bulan | 1-2 Jam/ Pertemuan</p>
          </div>
        </div>
      </div>
    </section>
    <!-- Hero End -->

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

    <!-- Feather Icons -->
    <script>
      feather.replace();
    </script>
    <script src="homeJS.JS"></script>
    <!-- Hero Section Start -->
  </body>
</html>
