<?php
session_start();
include ("../Profile/config.php");
    if(!isset($_SESSION['username'])){
        header("Location: ../HomePage/home+login.php");
        exit();
    }

$username = $_SESSION['username'];
$usernameSession = $_SESSION['username'];


// Ambil data pengguna dari database
$stmt = $pdo->prepare("SELECT id,username, foto FROM users WHERE username = ?");
$stmt->execute([$usernameSession]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Fungsi untuk mengambil semua pengumuman
$stmt = $pdo->prepare("SELECT * FROM announcements ORDER BY created_at DESC");
$stmt->execute();
$announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="stylesheet" href="home1.css" />
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
      <div class="navbar-nav">
        <a href="homeLogin.php">Home</a>
        <a href="../ProgramKelas/programKelas.php">Program Kelas</a>
        <a href="../Shop/shop.php">Shop</a>
      </div>

      <!-- Navbar-Extra Start-->
      <div class="navbar-extra">
        <div class="testing">
          <a href="../Profile/profile.php" class="Profile">
            Halo,
            <?= $username;?></a
          >
          <div class="dropdown1">
            <li><a href="../Profile/profile.php">Profile</a></li>
            <li><a href="#" id="button">Logout</a></li>
          </div>
        </div>

        <span>
          <img class="fotoProfile1" id="profile-picture-preview" src="<?php echo '../Profile/uploads/' . ($user['foto'] ? $user['foto'] : 'default-profile.png'); ?>" alt="Foto Profil">
        </span>
      </div>
      <!-- Navbar-Extra End-->
      
    </nav>
    <!-- Navbar End -->

    <!-- Hero Section Start -->
    <!-- Tampilkan Pengumuman -->
    
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
    <section class="pengumuman">
    <h1>PENGUMUMAN</h1>
    <div class="announcement-container">
        <div class="announcement-list">
            <?php foreach ($announcements as $announcement): ?>
                <div class="announcement-item">
                    <h3><?php echo htmlspecialchars($announcement['title']); ?></h3>
                    <p><?php echo nl2br(htmlspecialchars($announcement['content'])); ?></p>
                    <small><?php echo htmlspecialchars($announcement['created_at']); ?></small>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </section>
    
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

    <!-- Section 2 Start -->
    <div class="pembungkus">
      <!-- JAVA SECTION -->
      <div class="dropdown">
        <div class="select">
          <span class="selected">
            <img src="img/java.png" alt="Java" class="imageX" />
            <h2 class="title">JAVA</h2>
          </span>
          <div class="caret"></div>
        </div>
        <div class="menu">
          Kamu bakal diajarin Dasar Java dari awal banget sampai siap jadi
          Programmer! Materi :
          <ul>
            <li>- Java Dasar</li>
            <li>- Java Database</li>
            <li>- Java Object Oriented Programming</li>
            <li>- Java Unit</li>
          </ul>
          <p>Test 4-5x Pertemuan/Bulan | 1-2 Jam/ Pertemuan</p>
        </div>
      </div>
      <!-- PHP SECTION -->
      <div class="dropdown">
        <div class="select">
          <span class="selected">
            <img src="img/php_logo.png" alt="Java" class="image1" />
            <h2 class="title1">PHP</h2>
          </span>
          <div class="caret"></div>
        </div>
        <div class="menu">
          Kamu bakal diajarin Dasar PHP dari awal banget sampai siap jadi
          Programmer! Materi :
          <ul>
            <li>- PHP Dasar</li>
            <li>- PHP Forms</li>
            <li>- PHP OOP</li>
            <li>- PHP AJAX</li>
          </ul>
          <p>Test 4-5x Pertemuan/Bulan | 1-2 Jam/ Pertemuan</p>
        </div>
      </div>
      <!-- HTML SECTION -->
      <div class="dropdown">
        <div class="select">
          <span class="selected">
            <img src="img/html.png" alt="html" class="image2" />
            <h2>HTML</h2>
          </span>
          <div class="caret"></div>
        </div>
        <div class="menu">
          Kamu bakal diajarin Dasar HTML dari awal banget sampai siap untuk
          bikin WEB! Materi :
          <ul>
            <li>- HTML Dasar</li>
            <li>- HTML Forms</li>
            <li>- HTML Grafik</li>
            <li>- HTML Media</li>
          </ul>
          <p>Test 4-5x Pertemuan/Bulan | 1-2 Jam/ Pertemuan</p>
        </div>
      </div>
      <!-- CSS SECTION -->
      <div class="dropdown">
        <div class="select">
          <span class="selected">
            <img src="img/css.png" alt="html" class="image2" />
            <h2>CSS</h2>
          </span>
          <div class="caret"></div>
        </div>
        <div class="menu">
          Kamu bakal diajarin Dasar CSS dari awal banget sampai siap untuk
          MENGHIAS WEB DENGAN CANTIK! Materi :
          <ul>
            <li>- CSS Dasar</li>
            <li>- CSS Responsive</li>
            <li>- CSS Grid</li>
          </ul>
          <p>Test 4-5x Pertemuan/Bulan | 1-2 Jam/ Pertemuan</p>
        </div>
      </div>
    </div>
    <!-- Section 2 End -->

    <!-- Close Statement Start -->
    <section class="close" id="chome">
      <main class="content">
        <div class="box">
          <h1>Video Materi Pembelajaran</h1>
          <a href="../Shop/shop.php" class="buy">
            <i class="fa-solid fa-cart-shopping"></i><span>Beli Disini</span></a
          >
        </div>
        <p>Beli Video Pembelajaran kami untuk kebutuhan belajar kamu!</p>
      </main>
    </section>
    <!-- Close Statement Start -->
    <!-- Popup start -->
    <div class="popup">
      <div class="popup-content">
        <h3>Log Out Akun</h3>
        <p>Anda yakin ingin keluar dari akun Anda ?</p>
        <a href="homeLogin.php" class="button">Tidak</a>
        <a href="../Logout/logout.php" class="button">Yakin</a>
      </div>
    </div>
    <script>
      document.getElementById("button").addEventListener("click", function () {
        document.querySelector(".popup").style.display = "flex";
      });
    </script>
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
  </body>
</html>
