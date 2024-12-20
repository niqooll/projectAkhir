<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="stylesheet" href="homePage.css" />
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
      <a href="#" class="navbar-logo">Didikin<span>.com</span></a>
      <!-- Navbar-Extra Start-->
      <div class="navbar-extra">
        <a href="../Login/loginFix.php"><button class="login-btn">Login</button></a>
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
      </div>
      <!-- Navbar-Extra End-->
    </nav>
    <!-- Navbar End -->

    <!-- Hero Section Start -->
    <section class="hero" id="home">
      <main class="content">
        <div class="box">
          <h1>Kursus Ngoding Online Java | PHP | HTML | CSS</h1>
          <p>
            Jika kamu mencari tempat untuk meningkatkan skill dalam hal Ngoding,
            Pembuatan Web, Desain Web, Kamu berada ditempat yang tepat!
          </p>
          <a href="#" class="cta">
            <i class="fa fa-whatsapp" aria-hidden="true"></i
            ><span>Whatsapp</span></a
          >
        </div>
      </main>
    </section>
    <!-- Hero Section End -->

    <!-- Section 1 Start -->
    <section class="Menu">
      <div class="sec1">
        <h2>PROGRAM KELAS</h2>
        <p>Kursus kelas yang ditawarkan</p>
      </div>
      <div class="img">
        <img src="img/java.png" alt="Java" class="img1" />
        <img src="img/php_logo.png" alt="php" class="img2" />
        <img src="img/html.png" alt="html" class="img1" />
        <img src="img/css.png" alt="css" class="img1" />
      </div>
      <h2 class="Untung">Keuntungan Belajar di Didikin!</h2>
      <div class="sec2">
        <div class="side1">
          <img src="img/dollar (1).png" alt="" class="image" />
          <p class="p1">Biaya kelas terjangkau</p>
        </div>
        <div class="side2">
          <img src="img/clock.png" alt="" class="image" />
          <p class="p2">Waktu belajar yang fleksibel</p>
        </div>
        <div class="side3">
          <img src="img/book.png" alt="" class="image" />
          <p class="p3">Materi pembelajaran lengkap</p>
        </div>
      </div>
      <div class="sec3">
        <div class="side4">
          <img src="img/google-docs.png" alt="" class="image" />
          <p class="p4">Dapat Sertifikat</p>
        </div>
        <div class="side5">
          <img src="img/hand-shake.png" alt="" class="image" />
          <p class="p5">Networking yang ahli dalam bidangnya</p>
        </div>
      </div>
    </section>
    <!-- Section 1 Stop -->

    <!-- Profil Start -->
    <div class="intro">
      <h2>Yuk Kenalan sama pengajarnya!</h2>
    </div>

    <div class="pengajar">
      <div class="foto">
        <img src="img/niqo1.jpg" alt="niqo" class="bgProfile" />
        <div class="profil">
          <h3>Niqo Zuriyat Ramadhana</h3>
          <p>Sistem Informasi 2022</p>
          <p>Universitas Brawijaya</p>
        </div>
      </div>
      <div class="foto">
        <img src="img/inad.jpg" alt="niqo" class="bgProfile" />
        <div class="profil">
          <h3>Haniifan Thoriqul Ibad</h3>
          <p>Sistem Informasi 2022</p>
          <p>Universitas Brawijaya</p>
        </div>
      </div>
      <div class="foto">
        <img src="img/zaki.jpg" alt="niqo" class="bgProfile" />
        <div class="profil">
          <h3>Chaizhar Zaky Alrum</h3>
          <p>Sistem Informasi 2022</p>
          <p>Universitas Brawijaya</p>
        </div>
      </div>
    </div>
    <!-- Profile 2 End -->

    <!-- FAQ Start -->
    <div class="FAQ">
      <h3>FAQ</h3>
      <h1>Pertanyaan?</h1>
      <p>
        Gak usah ragu, mungkin pertanyaan kamu bisa terjawab oleh admin kami !
      </p>
      <a href="#" class="wa">
        <i class="fa fa-whatsapp" aria-hidden="true"></i
        ><span>Hubungi Admin!</span></a
      >
    </div>
    <!-- FAQ END -->

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

    <!-- Popup Form Login Start -->

    <!-- Popup Form Login End-->
    <!-- Feather Icons -->
    <script>
      feather.replace();
    </script>
    <script src="login.JS"></script>
  </body>
</html>
